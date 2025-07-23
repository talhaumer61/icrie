<?php
error_reporting(0);
ob_start();
ob_clean();
date_default_timezone_set("Asia/Karachi");


define( 'LMS_HOSTNAME'          , 'localhost' );
define( 'LMS_NAME'              , 'gptech_icrie' );
define( 'LMS_USERNAME'          , 'root');
define( 'LMS_USERPASS'          , '' );

// ADMIN TABLES
define('ADMINS'                 , 'ic_admins');
define('LOGIN_HISTORY'          , 'ic_login_history');
define('LOGS'                   , 'ic_logfile');

// DB TABLES
define('BLOGS'					, 'ic_blog');
define('CHOOSEUS'				, 'ic_chooseus');
define('QUERIES'				, 'ic_queries');
define('EVENTS'					, 'ic_event');
define('GALLERY'				, 'ic_gallery');
define('GRANTS'					, 'ic_grant_funding');
define('MOUS'					, 'ic_mous');
define('NEWSLETTER'				, 'ic_newsletter');
define('SEMINARS'				, 'ic_seminar');
define('SLIDER'					, 'ic_slider');
define('TEAMS'					, 'ic_team');
define('TUTORS'					, 'ic_tutors');
define('COURSE'					, 'ic_course');
define('COURSE_REQUESTS'		, 'ic_course_requests');
define('FATWA_REQUESTS'		, 'ic_fatwa_requests');
define('CONTACT_INFO'			, 'ic_contact_info');
define('ABOUT'					, 'ic_about');
define('NOTICE'					, 'ic_notice');
define('FEATURE'				, 'ic_features');
define('SETTING'				, 'ic_setting');
define('REGISTER'				, 'ic_registration');
define('FUNCTIONS'				, 'ic_functions');
define('FUNCTION_TYPES'			, 'ic_function_types');
define('FAQ'					, 'ic_faqs');

$control 		= (isset($_REQUEST['control']) && $_REQUEST['control'] != '') ? $_REQUEST['control'] : '';
$zone 	 		= (isset($_REQUEST['zone']) && $_REQUEST['zone'] != '') ? $_REQUEST['zone'] : '';
$ip	  			= (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] != '') ? $_SERVER['REMOTE_ADDR'] : '';
$do	  			= (isset($_REQUEST['do']) && $_REQUEST['do'] != '') ? $_REQUEST['do'] : '';
$view 			= (isset($_REQUEST['view']) && $_REQUEST['view'] != '') ? $_REQUEST['view'] : '';
$edit_id        = (isset($_REQUEST['edit_id']) && $_REQUEST['edit_id'] != '') ? $_REQUEST['edit_id'] : '';
$page			= (isset($_REQUEST['page']) && $_REQUEST['page'] != '') ? $_REQUEST['page'] : '';
$current_page	= (isset($_REQUEST['page']) && $_REQUEST['page'] != '') ? $_REQUEST['page'] : 1;
$Limit			= (isset($_REQUEST['Limit']) && $_REQUEST['Limit'] != '') ? $_REQUEST['Limit'] : '';
$do             = '';
$redirection    = '';


define('LMS_IP'             , $ip);
define('ZONE'               , $zone);
define('CONTROLER'          , $control);
define('LMS_DO'             , $do);
define('LMS_VIEW'           , $view);
define('LMS_EDIT_ID'        , $edit_id);
define('LMS_EPOCH'          , date("U"));
define('TITLE_HEADER'       , 'ICRIE');
define("SITE_NAME"          , "International Centere of Research on Islamic Economics");
define("SITE_PHONE"         , "+92 300 000 0000");
define("SITE_WHATSAPP"      , "+92 300 000 0000");
define("SITE_EMAIL"         , "info@icrie.com");
define("SITE_URL"           , "https://localhost/GPT/icrie/admin/");
define("SITE_URL_WEB"       , "https://localhost/GPT/icrie/");
define("SITE_ADDRESS"       , "Township Lahore.");
define("COPY_RIGHTS"        , "Green Professional Technologies");
define("COPY_RIGHTS_ORG"    , "&copy; ".date("Y")." - All Rights Reserved.");
define("COPY_RIGHTS_URL"    , "https://www.gptech.pk/");
?>