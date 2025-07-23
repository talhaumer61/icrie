<?php
	// error_reporting(0);
	ob_start();
	ob_clean();

	// DATABASE VARIABLES
    define( 'LMS_HOSTNAME'      , 'localhost' );
    define( 'LMS_NAME'          , 'gptech_icrie' );
    define( 'LMS_USERNAME'      , 'root');
    define( 'LMS_PASSWORD'      , '' );

	// DATABASE TABLES
	define('ADMINS'					, 'el_admins');
	define('BLOGS'					, 'el_blog');
	define('CHOOSEUS'				, 'el_chooseus');
	define('CONTACT'				, 'el_contact');
	define('EVENTS'					, 'el_event');
	define('GALLERY'				, 'el_gallery');
	define('GRANTS'					, 'el_grant_funding');
	define('MOUS'					, 'el_mous');
	define('NEWSLETTER'				, 'el_newsletter');
	define('SEMINARS'				, 'el_seminar');
	define('SLIDER'					, 'el_slider');
	define('TEAMS'					, 'el_team');
	define('TUTORS'					, 'el_tutors');
	define('COURSE'					, 'el_course');
	define('INFO'					, 'el_info');
	define('ABOUT'					, 'el_about');
	define('NOTICE'					, 'el_notice');
	define('FEATURE'				, 'el_features');
	define('SETTING'				, 'el_setting');
	define('REGISTER'				, 'el_registration');
	define('FUNCTIONS'				, 'el_functions');
	define('FAQ'					, 'el_faqs');

	// VARIABLES
	$ip	  							= (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] != '') ? $_SERVER['REMOTE_ADDR'] : '';
	$page							= (isset($_REQUEST['page']) && $_REQUEST['page'] != '') ? $_REQUEST['page'] : 0;
	$control 						= (isset($_REQUEST['control']) 		&& $_REQUEST['control'] != '') 			? $_REQUEST['control'] 		: '';
	$zone 	 						= (isset($_REQUEST['zone']) 		&& $_REQUEST['zone'] != '') 			? $_REQUEST['zone'] 		: '';
	$view 							= (isset($_REQUEST['view']) 		&& $_REQUEST['view'] != '') 			? $_REQUEST['view'] 		: '';
	$edit_id                        = (isset($_REQUEST['edit_id']) && $_REQUEST['edit_id'] != '') ? $_REQUEST['edit_id'] : '';
	$ip	  							= (isset($_SERVER['REMOTE_ADDR']) 	&& $_SERVER['REMOTE_ADDR'] != '') 		? $_SERVER['REMOTE_ADDR'] 	: '';
	$do	  							= (isset($_REQUEST['do']) 			&& $_REQUEST['do'] != '') 				? $_REQUEST['do'] 			: '';
	$current_page					= (isset($_REQUEST['page']) 		&& $_REQUEST['page'] != '') 			? $_REQUEST['page'] 		: 1;
	$Limit							= (isset($_REQUEST['Limit']) 		&& $_REQUEST['Limit'] != '') 			? $_REQUEST['Limit'] 		: '';

	define('CONTROLER'				, strtolower($control));
	define('ZONE'					, $zone);
	define('LMS_IP'					, $ip);
	define('LMS_DO'					, $do);
	define('LMS_EPOCH'				, date("U"));
	define('LMS_VIEW'				, $view);
	define('LMS_EDIT_ID'            , $edit_id);
	define('TITLE_HEADER'			, 'ICRIE');
	define("SITE_NAME"				, "ICRIE");
	define("SITE_URL"	    	    , "https://localhost/GPT/icrie/");
	define("SITE_URL_PORTAL"	    	    , "https://localhost/GPT/icrie/admin/");
	define("IMG_URL"	    	    , "https://icrie.org.pk/admin/images/");
	define("COPY_RIGHTS"			, "Green Professional Technologies.");
	define("COPY_RIGHTS_ORG"		, "&copy; ".date("Y")." - All Rights Reserved.");
	define("COPY_RIGHTS_URL"		, "https://www.gptech.pk/");

	$courses = array(
		'1' => 'Quran Course',
		'2' => 'Other Course',
		'3' => 'Language Course'
	);
?>