<?php
namespace ZECHENDORF\Easyquiz\Controller;

/***************************************************************
 *
 *    Copyright notice
 *
 *    (c) 2017 Christopher Zechendorf <christopher@zechendorf.com>, ZECHENDORF
 *
 *    All rights reserved
 *
 *    This script is part of the TYPO3 project. The TYPO3 project is
 *    free software; you can redistribute it and/or modify
 *    it under the terms of the GNU General Public License as published by
 *    the Free Software Foundation; either version 3 of the License, or
 *    (at your option) any later version.
 *
 *    The GNU General Public License can be found at
 *    http://www.gnu.org/copyleft/gpl.html.
 *
 *    This script is distributed in the hope that it will be useful,
 *    but WITHOUT ANY WARRANTY; without even the implied warranty of
 *    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.    See the
 *    GNU General Public License for more details.
 *
 *    This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * QuizController
 */
class QuizController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
    * quizRepository
    *
    * @var \ZECHENDORF\Easyquiz\Domain\Repository\QuizRepository
    * @inject
    */
    protected $quizRepository = NULL;

    /**
    * quizParticipationRepository
    *
    * @var \ZECHENDORF\Easyquiz\Domain\Repository\QuizParticipationRepository
    * @inject
    */
    protected $quizParticipationRepository = NULL;

    /**
    * questionsRepository
    *
    * @var \ZECHENDORF\Easyquiz\Domain\Repository\QuestionsRepository
    * @inject
    */
    protected $questionsRepository = NULL;

    /**
    * answersRepository
    *
    * @var \ZECHENDORF\Easyquiz\Domain\Repository\AnswersRepository
    * @inject
    */
    protected $answersRepository = NULL;

    /**
    * action display
    *
    * @return void
    */
    public function displayAction()
    {
        // configuration
        $config = array('showExplanations'=>!($this->settings['doNotShowAnswers']));

        // if there is a quiz defined in the plugin
        if($this->settings['entries']){
            // get the quiz
            $uid = $this->settings['entries'];
            $quiz = $this->quizRepository->findByUid($this->settings['entries']);

            if($quiz){
                // default values for display and nextDisplay
                $display = array('question'=>0,'showExplanation'=>0);

                // determine which question to show
                if($this->request->hasArgument('display')){
                    $argumentDisplay = $this->request->getArgument('display');
                    $display['question'] = $argumentDisplay['question'];
                    $display['showExplanation'] =    $argumentDisplay['showExplanation'];
                }

                // determine what to show next
                if($config['showExplanations'] && !$display['showExplanation']){
                    $nextDisplay = array('question'=>$display['question'],'showExplanation'=>true);
                } else {
                    $nextDisplay = array('question'=>$display['question']+1,'showExplanation'=>false);
                }

                // get the quizParticipation
                if($this->request->hasArgument('quizParticipation')){
                    $quizParticipation = $this->quizParticipationRepository->findByUid($this->request->getArgument('quizParticipation'));
                    $this->quizParticipationRepository->update($quizParticipation);
                } else {
                    $quizParticipation = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('ZECHENDORF\\Easyquiz\\Domain\\Model\\QuizParticipation');
                    $this->quizParticipationRepository->add($quizParticipation);
                }

                if($this->request->hasArgument('question') && is_array($this->request->getArgument('question'))){
                    foreach($this->request->getArgument('question') as $questionUid=>$questionResult){
                        // get the question
                        $question = $this->questionsRepository->findByUid($questionUid);

                        // remove all answers to that question from quizParticipation
                        foreach($quizParticipation->getAnswers() as $answer){
                            foreach($question->getAnswers() as $questionAnswer){
                                if($questionAnswer->getUid()==$answer->getUid()){
                                    $quizParticipation->removeAnswer($answer);
                                }
                            }
                        }

                        // add new answers to quizParticipation
                        if(is_array($questionResult['answer'])){
                            // multiple answers
                            if(count($questionResult['answer'])){
                                foreach($questionResult['answer'] as $answerUid){
                                    $answer = $this->answersRepository->findByUid($answerUid);
                                    $quizParticipation->addAnswer($answer);
                                }
                            }
                        } else{
                            // not multiple answers
                            $answer = $this->answersRepository->findByUid($questionResult['answer']);
                            if($answer){
                                // but we got an answer - we add it to the participation
                                $quizParticipation->addAnswer($answer);
                            } else {
                                // we didnt get an answer - show the question again
                                $display = array('question'=>$this->request->getArgument('expectAnswersForQuestion'),'showExplanation'=>false);
                                $this->view->assign('inputMissing',true);
                                $nextDisplay['question']--;
                            }
                        }
                    }
                } else if($this->request->hasArgument('expectAnswersForQuestion')){
                    // we expected answers but didn't get any - show the question again
                    $display = array('question'=>$this->request->getArgument('expectAnswersForQuestion'),'showExplanation'=>false);
                    $this->view->assign('inputMissing',true);
                    $nextDisplay['question']--;
                }

                if($display['question']>=count($quiz->getQuestions())){
                    // initialize the showForm variable...
                    $display['showForm'] = false;

                    // check if the form is to be shown
                    if($quiz->isRequireForm() && $quiz->getRecipientMail()) {
                        if($this->request->hasArgument('mailform')) {
                            // get form information for mail
                            $mailform = $this->request->getArgument('mailform');

                            // build the mail..
                            $mailBody = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\CMS\Fluid\View\StandaloneView');

                            $mailBody->setFormat('html');

                            $mailBody->setTemplatePathAndFilename('typo3conf/ext/easyquiz/Resources/Private/Templates/Quiz/Mail.html');

                            $mailBody->assignMultiple(
                                array(
                                    'quizParticipation' => $quizParticipation,
                                    'mailform' => $mailform
                                )
                            );

                            $mail = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Core\\Mail\\MailMessage');
                            $mail
                                ->setSubject($quiz->getTitle())
                                ->setTo($quiz->getRecipientMail())
                                ->setBody($mailBody->render(),'text/html')
                                ->send();
                        } else {
                            $display['showForm'] = true;
                        }
                    }

                    if(!$display['showForm']){
                        // get the participants points
                        $points = 0;
                        foreach($quizParticipation->getAnswers() as $answer){
                            $points += $answer->getPoints();
                        }

                        // check which result the participant matches
                        foreach($quiz->getResults() as $result){
                            if($result->getMinPoints()<=$points && $result->getMaxPoints()>=$points){
                                // the point range matches - we redirect
                                $this->redirectToURI(
                                    $this->uriBuilder->reset()
                                    ->setTargetPageUid($result->getPage())
                                    ->build()
                                );
                            }
                        }
                    }
                }
                $persistenceManager = $this->objectManager->get("TYPO3\\CMS\\Extbase\\Persistence\\Generic\\PersistenceManager");
                $persistenceManager->persistAll();
                $this->view->assign('quizParticipation',$quizParticipation);
                $this->view->assign('config',$config);
                $this->view->assign('display',$display);
                $this->view->assign('nextDisplay',$nextDisplay);
                $this->view->assign('quiz',$quiz);
            }
        }
    }

}
