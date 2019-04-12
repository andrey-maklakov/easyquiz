#
# Table structure for table 'tx_easyquiz_domain_model_quiz'
#
CREATE TABLE tx_easyquiz_domain_model_quiz (
	title varchar(255) DEFAULT '' NOT NULL,
	questions int(11) unsigned DEFAULT '0' NOT NULL,
	results int(11) unsigned DEFAULT '0' NOT NULL,
);

#
# Table structure for table 'tx_easyquiz_domain_model_questions'
#
CREATE TABLE tx_easyquiz_domain_model_questions (
	sorting_quiz int(11) DEFAULT '0' NOT NULL,

	quiz int(11) unsigned DEFAULT '0' NOT NULL,

	title varchar(255) DEFAULT '' NOT NULL,
	question text NOT NULL,
	explanation text NOT NULL,
	image int(11) unsigned NOT NULL default '0',
	multiple_answers tinyint(1) unsigned DEFAULT '0' NOT NULL,
	answers int(11) unsigned DEFAULT '0' NOT NULL,
);

#
# Table structure for table 'tx_easyquiz_domain_model_answers'
#
CREATE TABLE tx_easyquiz_domain_model_answers (
	sorting_questions int(11) DEFAULT '0' NOT NULL,

	questions int(11) unsigned DEFAULT '0' NOT NULL,

	answer varchar(255) DEFAULT '' NOT NULL,
	points int(11) DEFAULT '0' NOT NULL,
);

#
# Table structure for table 'tx_easyquiz_domain_model_result'
#
CREATE TABLE tx_easyquiz_domain_model_result (
	quiz int(11) unsigned DEFAULT '0' NOT NULL,

	min_points int(11) DEFAULT '0' NOT NULL,
	max_points int(11) DEFAULT '0' NOT NULL,
	page int(11) DEFAULT '0' NOT NULL,
);

#
# Table structure for table 'tx_easyquiz_domain_model_quizparticipation'
#
CREATE TABLE tx_easyquiz_domain_model_quizparticipation (
	session varchar(255) DEFAULT '' NOT NULL,
	user int(11) DEFAULT '0' NOT NULL,
	quiz int(11) unsigned DEFAULT '0',
	answers int(11) unsigned DEFAULT '0' NOT NULL,
);

#
# Table structure for table 'tx_easyquiz_quizparticipation_answers_mm'
#
CREATE TABLE tx_easyquiz_quizparticipation_answers_mm (
	uid_local int(11) unsigned DEFAULT '0' NOT NULL,
	uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
	sorting int(11) unsigned DEFAULT '0' NOT NULL,
	sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,

	KEY uid_local (uid_local),
	KEY uid_foreign (uid_foreign)
);
