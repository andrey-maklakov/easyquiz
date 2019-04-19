<?php
namespace ZECHENDORF\Easyquiz\Controller;

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

use ZECHENDORF\Easyquiz\Domain\Model\Answers;
use ZECHENDORF\Easyquiz\Domain\Model\Questions;
use ZECHENDORF\Easyquiz\Domain\Model\QuizParticipation;
use ZECHENDORF\Easyquiz\Domain\Model\Result;
use TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Context\Context;

/**
 * QuizController
 */
class QuizController extends ActionController
{
    /**
     * quizRepository
     *
     * @var \ZECHENDORF\Easyquiz\Domain\Repository\QuizRepository
     * @TYPO3\CMS\Extbase\Annotation\Inject
     */
    protected $quizRepository = NULL;

    /**
     * quizParticipationRepository
     *
     * @var \ZECHENDORF\Easyquiz\Domain\Repository\QuizParticipationRepository
     * @TYPO3\CMS\Extbase\Annotation\Inject
     */
    protected $quizParticipationRepository = NULL;

    /**
     * questionsRepository
     *
     * @var \ZECHENDORF\Easyquiz\Domain\Repository\QuestionsRepository
     * @TYPO3\CMS\Extbase\Annotation\Inject
     */
    protected $questionsRepository = NULL;

    /**
     * answersRepository
     *
     * @var \ZECHENDORF\Easyquiz\Domain\Repository\AnswersRepository
     * @TYPO3\CMS\Extbase\Annotation\Inject
     */
    protected $answersRepository = NULL;

    /**
     * @throws \TYPO3\CMS\Extbase\Mvc\Exception\NoSuchArgumentException
     * @throws \TYPO3\CMS\Extbase\Mvc\Exception\StopActionException
     * @throws \TYPO3\CMS\Extbase\Mvc\Exception\UnsupportedRequestTypeException
     * @throws \TYPO3\CMS\Extbase\Persistence\Exception\IllegalObjectTypeException
     * @throws \TYPO3\CMS\Extbase\Persistence\Exception\UnknownObjectException
     */
    public function displayAction()
    {
        // configuration
        $config = ['showExplanations' => !($this->settings['doNotShowAnswers'])];

        // if there is a quiz defined in the plugin
        if ($this->settings['entries']) {
            /**
             * get the quiz
             * @var \ZECHENDORF\Easyquiz\Domain\Model\Quiz $quiz
             */
            $quiz = $this->quizRepository->findByUid($this->settings['entries']);

            if ($quiz) {
                // default values for display and nextDisplay
                $display = ['question' => 0, 'showExplanation' => 0];

                // determine which question to show
                if ($this->request->hasArgument('display')) {
                    $argumentDisplay = (array) $this->request->getArgument('display');
                    $display['question'] = $argumentDisplay['question'];
                    $display['showExplanation'] = $argumentDisplay['showExplanation'];
                }

                // determine what to show next
                if ($config['showExplanations'] && !$display['showExplanation']) {
                    $nextDisplay = ['question' => $display['question'], 'showExplanation' => true];
                } else {
                    $nextDisplay = ['question' => $display['question'] + 1, 'showExplanation' => false];
                }

                // get the quizParticipation
                /** @var QuizParticipation $quizParticipation */
                if ($this->request->hasArgument('quizParticipation')) {
                    $quizParticipation = $this->quizParticipationRepository->findByUid($this->request->getArgument('quizParticipation'));
                    $this->quizParticipationRepository->update($quizParticipation);
                } else {
                    $quizParticipation = $this->objectManager->get(QuizParticipation::class);

                    $quizParticipation->setQuiz($quiz);
                    $quizParticipation->setUser(GeneralUtility::makeInstance(Context::class)->getPropertyFromAspect('frontend.user', 'id', 0));

                    $pages = GeneralUtility::trimExplode(',', $this->configurationManager->getContentObject()->data['pages'], true);
                    if (empty($pages)) {
                        $quizParticipation->setPid($this->configurationManager->getContentObject()->data['pid']);
                    } else {
                        $quizParticipation->setPid($pages[0]);
                    }

                    $this->quizParticipationRepository->add($quizParticipation);
                }

                if ($this->request->hasArgument('question') && is_array($this->request->getArgument('question'))) {
                    foreach ((array) $this->request->getArgument('question') as $questionUid => $questionResult) {
                        // get the question
                        /** @var Questions $question */
                        $question = $this->questionsRepository->findByUid($questionUid);

                        // remove all answers to that question from quizParticipation
                        /** @var Answers $answer */
                        foreach ($quizParticipation->getAnswers() as $answer) {
                            foreach ($question->getAnswers() as $questionAnswer) {
                                if ($questionAnswer->getUid() == $answer->getUid()) {
                                    $quizParticipation->removeAnswer($answer);
                                }
                            }
                        }

                        // add new answers to quizParticipation
                        if (is_array($questionResult['answer'])) {
                            // multiple answers
                            if (count($questionResult['answer'])) {
                                foreach ($questionResult['answer'] as $answerUid) {
                                    $answer = $this->answersRepository->findByUid($answerUid);
                                    $quizParticipation->addAnswer($answer);
                                }
                            }
                        } else {
                            // not multiple answers
                            $answer = $this->answersRepository->findByUid($questionResult['answer']);
                            if ($answer) {
                                // but we got an answer - we add it to the participation
                                $quizParticipation->addAnswer($answer);
                            } else {
                                // we didnt get an answer - show the question again
                                $display = ['question' => $this->request->getArgument('expectAnswersForQuestion'), 'showExplanation' => false];
                                $this->view->assign('inputMissing', true);
                                $nextDisplay['question']--;
                            }
                        }
                    }
                } else if ($this->request->hasArgument('expectAnswersForQuestion')) {
                    // we expected answers but didn't get any - show the question again
                    $display = ['question' => $this->request->getArgument('expectAnswersForQuestion'), 'showExplanation' => false];
                    $this->view->assign('inputMissing', true);
                    $nextDisplay['question']--;
                }

                if ($display['question'] >= count($quiz->getQuestions())) {
                    // get the participants points
                    $points = 0;
                    foreach ($quizParticipation->getAnswers() as $answer) {
                        $points += $answer->getPoints();
                    }

                    // check which result the participant matches
                    /** @var Result $result */
                    foreach ($quiz->getResults() as $result) {
                        if ($result->getMinPoints() <= $points && $result->getMaxPoints() >= $points) {
                            // the point range matches - we redirect
                            $this->redirectToURI(
                                $this->uriBuilder->reset()
                                    ->setTargetPageUid($result->getPage())
                                    ->build()
                            );
                        }
                    }
                }

                $persistenceManager = $this->objectManager->get(PersistenceManager::class);
                $persistenceManager->persistAll();

                $this->view->assign('quizParticipation', $quizParticipation);
                $this->view->assign('config', $config);
                $this->view->assign('display', $display);
                $this->view->assign('nextDisplay', $nextDisplay);
                $this->view->assign('quiz', $quiz);
            }
        }
    }
}