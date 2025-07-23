<?php 

function get_borrowertype($id) {
	$listborrowertype = array (
	'1' => 'Employee'	, 
	'2' => 'Student'		
);
	return $listborrowertype[$id];
}
//--------------- Status ------------------
$admstatus = array (
							array('status_id'=>1, 'status_name'=>'Active')		, array('status_id'=>0, 'status_name'=>'Inactive')
				   );
$ad_status = array (
							array('status_id'=>1, 'status_name'=>'Active')		, array('status_id'=>0, 'status_name'=>'Inactive')
				   );
function get_admstatus($id) {
	$listadmstatus= array (
							'1' => '<span class="badge badge-success p-1" id="bns-status-badge">Active</span>', 
							'0' => '<span class="badge badge-danger p-1" id="bns-status-badge">Inactive</span>');
	return $listadmstatus[$id];
}
// -------------- Registration -----------------

$countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");

$course_plans = array(
    '1' => array('title'=> 'Weekdays - WD'),
    '2' => array('title'=> 'Weekends - WE')
);

$time_slots = array("00:00","00:30","01:00","01:30","02:00","02:30","03:00","03:30","04:00","04:30","05:00","05:30","06:00","06:30","07:00","07:30","08:00","08:30","09:00","09:30","10:00","10:30","11:00","11:30","12:00","12:30","13:00","13:30","14:00","14:30","15:00","15:30","16:00","16:30","17:00","17:30","18:00","18:30","19:00","19:30","20:00","20:30","21:00","21:30","22:00","22:30","23:00","23:30");

$refrences = array("Google","Facebook","Minhaj Websites","Family of Friend","Some individual","eLearning Coordinator");

//--------------- GRANTS & FUNDINGS ------------------
$isinternational = array (
	array('id'=>1, 'name'=>'National')			,
	array('id'=>2, 'name'=>'International')
);
function get_isinternational($id) {
$listisinternational = array (
		'1' => '<span class="label label-info" id="bns-status-badge">National</span>', 
		'2' => '<span class="label label-primary" id="bns-status-badge">International</span>');
return $listisinternational[$id];
}
//--------------- GRANTS & FUNDINGS ------------------
$granttype = array (
	array('id'=>1, 'name'=>'Recurring')			,
	array('id'=>2, 'name'=>'Non-Recurring')
);
function get_granttype($id) {
	$listgrants = array (
			'1' => '<span class="label label-info" id="bns-status-badge">Recurring</span>', 
			'2' => '<span class="label label-primary" id="bns-status-badge">Non-Recurring</span>');
	return $listgrants[$id];
}

//--------------- EVENTS ------------------
$eventtype = array (
	array('id'=>1, 'name'=>'Seminar')	,
	array('id'=>2, 'name'=>'Webinar')	,
	array('id'=>3, 'name'=>'Training')	,
	array('id'=>4, 'name'=>'Workshop')
);
function get_eventtype($id) {
	$listevents = array (
			'1' => 'Seminar'	, 
			'2' => 'Webinar'	, 
			'3' => 'Training'	, 
			'4' => 'Workshop'	);
	return $listevents[$id];
}

//--------------- TEAM TYPE ------------------
$teamtype = array (
	array('id'=>1, 'name'=>'Professional')	,
	array('id'=>2, 'name'=>'Core')			,
	array('id'=>3, 'name'=>'Both')
);
function get_teamtype($id) {
	$listeam = array (
		'1' => 'Professional'	, 
		'2' => 'Core'			, 
		'3' => 'Both'	
	);
	return $listeam[$id];
}

//--------------- Status ------------------
$status = array (
							array('id'=>1, 'name'=>'Active')		, array('id'=>2, 'name'=>'Inactive')
				);
function get_status($id) {
		$liststatus= array (
								'1' => '<span class="label label-success" id="bns-status-badge">Active</span>', 
								'2' => '<span class="label label-danger" id="bns-status-badge">Inactive</span>');
		return $liststatus[$id];
}
//------------------------------------
function cleanvars($str){ 
	return $str;	
	// return is_array($str) ? array_map('cleanvars', $str) : str_replace("\\", "\\\\", htmlspecialchars((get_magic_quotes_gpc() ? stripslashes($str) : $str), ENT_QUOTES)); 
}

//----------------------------------------
function to_seo_url($str){
		// if($str !== mb_convert_encoding( mb_convert_encoding($str, 'UTF-32', 'UTF-8'), 'UTF-8', 'UTF-32') )
			//  $str = mb_convert_encoding($str, 'UTF-8', mb_detect_encoding($str));
		$str = htmlentities($str, ENT_NOQUOTES, 'UTF-8');
		$str = preg_replace('`&([a-z]{1,2})(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig);`i', '\1', $str);
	$str = html_entity_decode($str, ENT_NOQUOTES, 'UTF-8');
	$str = preg_replace(array('`[^a-z0-9]`i','`[-]+`'), '-', $str);
	$str = trim($str, '-');
	return $str;
}
//-------Rupees in Word-------------------------------
function get_classroomtypes($id) {
		$listclassroomtypes	= array (
										'1' => 'Lecture Room'		, 
										'2' => 'Lab'				,
										'3' => 'Board Room'			,
										'4' => 'Auditorium'			,
										'5' => 'Conference Room'	,
										'6' => 'Center Room'		,
										'7' => 'Marquee 1'			,
										'8' => 'Marquee 2'		
								);
		return $listclassroomtypes[$id];
}
//--------------- Arrary Search ------------------
function arrayKeyValueSearch($array, $key, $value)
{
		$results = array();
		if (is_array($array)) {
			if (isset($array[$key]) && $array[$key] == $value) {
				$results[] = $array;
			}
			foreach ($array as $subArray) {
					$results = array_merge($results, arrayKeyValueSearch($subArray, $key, $value));
			}
		}
	return $results;
}
	//--------------- Get Uploaded file size ------------------
function formatSizeUnits($bytes) {
	if ($bytes >= 1073741824) {
		$bytes = number_format($bytes / 1073741824, 2) . ' GB';
	} elseif ($bytes >= 1048576) {
		$bytes = number_format($bytes / 1048576, 2) . ' MB';
	} elseif ($bytes >= 1024) {
		$bytes = number_format($bytes / 1024, 2) . ' KB';
	} elseif ($bytes > 1) {
		$bytes = $bytes . ' bytes';
	} elseif ($bytes == 1) {
		$bytes = $bytes . ' byte';
	} else {
		$bytes = '0 bytes';
	}
	return $bytes;
}
//--------------- Generate Random Password ------------------
function generatePassword( $length = 8 ) {
		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
		$password = substr( str_shuffle( $chars ), 0, $length );
		return $password;
}

//--------------- Current Page Url ------------------
function currentPageURL() {
		$pageURL = 'http';
		if (isset($_SERVER["HTTPS"]) == "on") {$pageURL .= "s";}
	$pageURL .= "://";
		if ($_SERVER["SERVER_PORT"] != "80") {
			$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	} else {
			$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	}
		return $pageURL;
}
//--------------- addOrdinalNumberSuffix ------------------
function addOrdinalNumberSuffix($num) {
	if (!in_array(($num % 100),array(11,12,13))){
			switch ($num % 10) {
		// Handle 1st, 2nd, 3rd
				case 1:  return $num.'st';
				case 2:  return $num.'nd';
				case 3:  return $num.'rd';
		}
	}
		return $num.'th';
}
//-----------------------------------------
function thousandsCurrencyFormat($num) {
	if($num>1000) {
		$x = round($num);
		$x_number_format = number_format($x);
		$x_array = explode(',', $x_number_format);
		$x_parts = array('k', 'm', 'b', 't');
		$x_count_parts = count($x_array) - 1;
		$x_display = $x;
		$x_display = $x_array[0] . ((int) $x_array[1][0] !== 0 ? '.' . $x_array[1][0] : '');
		$x_display .= $x_parts[$x_count_parts - 1];
		return $x_display;
	}
	return $num;
}
function print_number_count($number) {
	$units = array( '', 'K', 'M', 'B');
	$power = $number > 0 ? floor(log($number, 1000)) : 0;
	if($power > 0)
		return @number_format($number / pow(1000, $power), 2, ',', ' ').' '.$units[$power];
	else
		return @number_format($number / pow(1000, $power), 0, '', '');
}
//---------------Remove multiple space with single--------------------------
function removeWhiteSpace($text) {
	$text = preg_replace('/[\t\n\r\0\x0B]/', '', $text);
	$text = preg_replace('/([\s])\1+/', ' ', $text);
	$text = trim($text);
	return $text;
}
//---------------Months Names--------------------------
$months = array('January', 'February', 'March', 'April', 'May', 'June', 'July ', 'August', 'September', 'October', 'November', 'December');
//---------------------------------------
function generateCode($characters) { 
	$possible = '234567-89ABCDEFGHJKLMNPQR-STUVWXYZabcdefghijklmnopqrstuvwxyz-'; 
	$possible = $possible.$possible.'2345678923456789'; 
	$code = ''; 
	$i = 0; 
	while ($i < $characters) {  
		$code .= substr($possible, mt_rand(0, strlen($possible)-1), 1); 
		$i++; 
	} 
	return $code; 
}
function curPageURL( $trim_query_string = false ) {
	$pageURL = (isset( $_SERVER['HTTPS'] ) && $_SERVER['HTTPS'] == 'on') ? "https://" : "http://";
	$pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
	if( ! $trim_query_string ) {
		return $pageURL;
	} else {
			$url = explode( '?', $pageURL );
			return $url[0];
	}
}
// remove words from a string
function substrwords($text, $maxchar, $end='...') {
	if (strlen($text) > $maxchar || $text == '') {
		$words = preg_split('/\s/', $text);      
		$output = '';
		$i      = 0;
		while (1) {
			$length = strlen($output)+strlen($words[$i]);
			if ($length > $maxchar) {
				break;
			} 
			else {
				$output .= " " . $words[$i];
				++$i;
			}
		}
		$output .= $end;
	} 
	else {
		$output = $text;
	}
	return $output;
}
function titleMaker($title) {
	if (!empty($title)) {
		return '
			<div class="page__banner">
				<div class="page__banner-image" data-background="'.SITE_URL.'assets/img/banner/page-banner.jpg"></div>
				<div class="container">
					<div class="row">
						<div class="col-xl-12">
							<div class="page__banner-content">
								<h1>'.ucwords($title).'</h1>
								<ul>
									<li>
										<a href="'.SITE_URL.'index">Home</a>
										<span>|</span>
									</li>
									<li>'.ucwords($title).'</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		';
	} else {
		return false;
	}
}

function navBarMaker() {
	$listNav = array(
						  "index"			=> array( "name" => "home"				,   "links" => "" )
						, "team"			=> array( "name" => "team"				,   "links" => "" )
						, "blog"			=> array( "name" => "blog"				,   "links" => "" )
						, "functions"		=> array( "name" => "functions"			,   "links" => 
													array(
															  "function/1"	=> array( "name" => "research"							,	"links" => "")
															, "functions/2"	=> array( "name" => "publications"						,	"links" => "")
															, "functions/3"	=> array( "name" => "training and capacity building"	,	"links" => "")
														)
													)
						, "about"			=> array( "name" => "Contact Info"		,   "links" => 
													array(
															  "about-us"		=> array( "name" => "about us"								,   "links" => "" )
															, "contact"		=> array( "name" => "contact us"							,   "links" => "" )
															, "faq"			=> array( "name" => "FAQ"									,   "links" => "" )
														)
							  						)
					);
	return $listNav;

	// , "services"		=> array( "name" => "services"			,   "links" => "" )

}
function get_functiontypes($id = "") {

	$array	= array (
						  '1' => 'Research'
						, '2' => 'Publications'
						, '3' => 'Training And Capacity Building'			
					);

	return (!empty($id))? $array[$id]: $array;
	
}


function get_FileType($flag = "", $id = "") {

	$wordExt	= array (
							  '0' => 'doc'
							, '1' => 'docx'	
						);
	$excelExt	= array (
						      '0' => 'xlsx'
						);
	$imgExt		= array (
							  '0' => 'jpeg'
							, '1' => 'jpg'
							, '2' => 'png'
				  		);
	$powerpointExt	= array (
								  '0' => 'ppt'
								, '1' => 'pptx'
					  		);

	if ($flag == '1') {
		return (!empty($id))? $wordExt[$id]: $wordExt;
	} else if ($flag == '2') {
		return (!empty($id))? $excelExt[$id]: $excelExt;
	} else if ($flag == '3') {
		return (!empty($id))? $imgExt[$id]: $imgExt;
	} else if ($flag == '4') {
		return (!empty($id))? $powerpointExt[$id]: $powerpointExt;
	} else {
		return false;
	}
	
}


function moduleName($flag = true) {
	$fileName = strstr(basename($_SERVER['REQUEST_URI']), '.php', true);
	if (gettype($flag) == 'string') {		
		$flag = str_replace('_',' ',$flag);
		$flag = str_replace('-',' ',$flag);
		$flag = ucwords(strtolower($flag));
		return $flag;
	}
	if ($flag) {
		return strtolower($fileName);
	} else {
		$fileName = str_replace('_',' ',$fileName);
		$fileName = str_replace('-',' ',$fileName);
		return ucwords(strtolower($fileName));
	}
}

// CHECK FILE EXISTS
function check_file_exists($file_url){
	if(!empty($file_url)){
		// Initialize cURL session
		$ch = curl_init($file_url);
	
		// Set cURL options
		curl_setopt($ch, CURLOPT_NOBODY, true);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, false);
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
		curl_setopt($ch, CURLOPT_TIMEOUT, 10);
	
		// Execute cURL session
		curl_exec($ch);
	
		// Check if HTTP status is 200 (OK)
		$http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);
	
		if ($http_status == 200) {
			return true;
		} else {
			return false;
		}
	}else{		
		return false;
	}
}					
					

function sessionMsg($title = "", $msg = "", $color = "") {
	if (!empty($title) && !empty($msg)&& !empty($color)){
		$_SESSION['msg']['title'] 	= ''.$title.'';
		$_SESSION['msg']['text'] 	= ''.$msg.'';
		$_SESSION['msg']['type'] 	= ''.$color.'';
		if (!empty($_SESSION['msg']['title']) && !empty($_SESSION['msg']['text'])&& !empty($_SESSION['msg']['type'])){
			return true;
		}else{
			return false;
		}	
	}else{
		return false;
	}
}

function sendRemark($remarks = "", $action = "", $id_record = "") {
	if (!empty($remarks) && !empty($action) && !empty($id_record)) {
		require_once("config/dbsetting/lms_vars_config.php");
		require_once("config/dbsetting/classdbconection.php");
		$dblms = new dblms();

		$values = array (
							 'id_user'		=>	cleanvars($_SESSION['userlogininfo']['LOGINIDA'])
							,'filename'		=>	strstr(basename($_SERVER['REQUEST_URI']), '.php', true)
							,'action'		=>	cleanvars($action)
							,'id_record'	=>	cleanvars($id_record)
							,'dated'		=>	date('Y-m-d G:i:s')
							,'ip'			=>	cleanvars(LMS_IP)
							,'remarks'		=>	cleanvars($remarks)
						);
		if($action == '3'){
			$values['id_deleted']	= cleanvars($_SESSION['userlogininfo']['LOGINIDA']);
			$values['ip_deleted']	= cleanvars(LMS_IP);
			$values['date_deleted']	= date('Y-m-d G:i:s');
		}

		$sqlRemarks = $dblms->insert(LOGS, $values);
		if ($sqlRemarks) {
			return true;
		} else {
			return false;
		}
	} else {
		return false;
	}
}

// WELCOME
function welcome($H){
	if ($H < 12) {
    	return "Good Morning";
   	} elseif ($H > 11 && $H < 18) {
    	return "Good Afternoon";
   	} elseif ($H > 17) {
    	return "Good Evening";
   	}
}

function get_admtypes($id) {
	$listadmrights = array (
							'1'	=> 'Super Admin',
							'2'	=> 'Administrator',
							'3'	=> 'Simple'
						);
	if (!empty($id)) {
		return $listadmrights[$id];
	} else {		
		return $listadmrights;
	}
}

function get_logintypes($id = '') {
	$listlogintypes = array (
								  '1'	=> 'headoffice'				
								, '2'	=> 'campus'					
								, '3'	=> 'teacher'				
								, '4'	=> 'parent'					
								, '5'	=> 'student'				
								, '6'	=> 'donor'					
								, '7'	=> 'coordinator'
							);
	if(!empty($id)){
		return $listlogintypes[$id];
	}else{
		return $listlogintypes;
	}
}



?>