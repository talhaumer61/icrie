<?php
// LOGIN TYPES
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

// LOGIN FILE ACTION
function get_logfile($id = '') {
	$listlogfile = array (
							  '1' => 'Add'		 
							, '2' => 'Update'		 
							, '3' => 'Delete'		
							, '4' => 'Login'	
						 );
	if(!empty($id)){
		return $listlogfile[$id];
	}else{
		return $listlogfile;
	}
}

// ARRAY SEARCH
function arrayKeyValueSearch($array, $key, $value){
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

// GET CURRENT URL
function curPageURL() {
	$pageURL = 'http';
	if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
		$pageURL .= "://";
	if ($_SERVER["SERVER_PORT"] != "80") {
		$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	} else {
		$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	}
 	return $pageURL;
}

// STATUS (ACTIVE & INACTIVE)
function get_status($id = '') {
	$liststatus= array (
						  '1' => 'Active' 
						, '2' => 'Inactive'
					   );
	if(!empty($id)){
		$liststatuslabel= array (
									  '1' => '<span class="badge badge-primary">Active</span>' 
									, '2' => '<span class="badge badge-warning">Inactive</span>'
								); 
		return $liststatuslabel[$id];
	} else {
		return $liststatus;
	}
}
// STATUS (ACTIVE & INACTIVE)
$publication_type= array (
						  '1' => 'Book' 
						, '2' => 'Article'
						, '3' => 'Report'
					   );
function get_publication_type($id = '') {
	$listpublicationtype= array (
						  '1' => 'Book' 
						, '2' => 'Article'
						, '3' => 'Report'
					   );
	if(!empty($id)){
		// $listpublicationtype= array (
		// 							  '1' => '<span class="badge badge-primary">Active</span>' 
		// 							, '2' => '<span class="badge badge-warning">Article</span>'
		// 							, '3' => '<span class="badge badge-success">Inactive</span>'
		// 						); 
		return $listpublicationtype[$id];
	} else {
		return $listpublicationtype;
	}
}
// Course Type
function get_course_type($id = '') {
	$liststatus= array (
						  '1' => 'Course' 
						, '2' => 'Training'
						, '3' => 'Seminar'
					   );
	if(!empty($id)){
		$liststatuslabel= array (
									  '1' => '<span class="badge badge-secondary">Course</span>' 
									, '2' => '<span class="badge badge-warning">Training</span>'
									, '3' => '<span class="badge badge-success">Seminar</span>'
								); 
		return $liststatuslabel[$id];
	} else {
		return $liststatus;
	}
}

// STATUS YES NO
function get_status_yes_no($id = '') {
	$list_status_yes_no = array (
										  '1' => 'Yes'
										, '2' => 'No'
									);
	if(!empty($id)){
		$label_status_yes_no= array (
									 '1' => '<span class="badge badge-primary">Yes</span>' 
									,'2' => '<span class="badge badge-warning">No</span>'
								); 
		return $label_status_yes_no[$id];
	} else {
		return $list_status_yes_no;
	}
}

// TIMEZONES
function get_timezonetypes($id = '') {
	$listtimezonetypes = array (
									 '1'	=> 'Asia'
									,'2'	=> 'USA'
									,'3'	=> 'UK'
								);
	if(!empty($id)){
		return $listtimezonetypes[$id];
	}else{
		return  $listtimezonetypes;
	}
}

// GENDERS
function get_gendertypes($id = '') {
	$gendertypes = array (
							 '1'	=> 'Male'
							,'2'	=> 'Female'
							,'3'	=> 'Others'
						);
	if(!empty($id)){
		return $gendertypes[$id];
	}else{
		return $gendertypes;
	}
}

// FILE TYPE
function get_FileTypes($id = '') {
	$fileTypes = array (
							 '1'	=> 'Image'
							,'2'	=> 'Video'
						 );
	if(!empty($id)){
		return $fileTypes[$id];
	}else{
		return $fileTypes;
	}
}

//Get Application Status
function get_applicationstatus($id = '') {
	$listapplicationstatus = array (
								 '1'	=> 'Approved'
								,'2'	=> 'Not Approved'
								,'3'	=> 'Pending'
							);
	if (!empty($id)) {
		$listapplicationstatus = array (
											'1'	=> '<span class="badge bg-success">Approved</span>',
											'2'	=> '<span class="badge bg-danger">Not Approved</span>',
											'3'	=> '<span class="badge bg-warning">Pending</span>'
									);
		return $listapplicationstatus[$id];
	} else {
		return $listapplicationstatus;
	}
}

// Salutation
function get_salutationtypes($id = '') {
	$listsalutationtypes = array (
									 '1'	=> 'Mr.'
									,'2'	=> 'Mrs.'
									,'3'	=> 'Other'
								);
	if(!empty($id)){
		return $listsalutationtypes[$id];
	} else {
		return $listsalutationtypes;
	}
}

// Payments Status
function get_payments($id = '') {
	$listpayments = array (
						 '1' => 'Paid' 
						,'2' => 'Pending' 
						,'3' => 'Unpaid'
				   );
	if(!empty($id)){
		$listpayments = array (
								'1' => '<span class="badge badge-soft-success">Paid</span>'		, 
								'2' => '<span class="badge badge-soft-warning">Pending</span>'	,
								'3' => '<span class="badge badge-soft-danger">Unpaid</span>'
							);
		return $listpayments[$id];
	} else {		
		return $listpayments;
	}
}

// Admins Rights
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

// Ordders Status
function get_saletypes($id = '') {	
	$saletypes = array (
							array('id'=>1, 'name'=>'Pending')			,
							array('id'=>2, 'name'=>'Save & Hold')		,
							array('id'=>3, 'name'=>'Confirmed')			,
							array('id'=>4, 'name'=>'Dispatched')		,
							array('id'=>5, 'name'=>'Completed')			,
							array('id'=>6, 'name'=>'Cancel')
						);
	if (!empty($id)) {
		$list = array (
							'1'	=> '<span class="label label-warning" id="bns-status-badge">Pending</span>'		,
							'2'	=> '<span class="label label-danger" id="bns-status-badge">Save & Hold</span>'	,
							'3'	=> '<span class="label label-success" id="bns-status-badge">Confirmed</span>' 	,
							'4'	=> '<span class="label label-info" id="bns-status-badge">Dispatched</span>'		,
							'5'	=> '<span class="label bg-primary-dark" id="bns-status-badge">Completed</span>'	,
							'6'	=> '<span class="label label-danger" id="bns-status-badge">Cancel</span>'
				);
		return $list[$id];
	} else {
		return $saletypes;
	}
}

// MONTHS
function get_month($id = '') {
	$months = array (
						'01'	=> 'January',
						'02'	=> 'February',
						'03'	=> 'March',
						'04'	=> 'April',
						'05'	=> 'May',
						'06'	=> 'June',
						'07'	=> 'July',
						'08'	=> 'August',
						'09'	=> 'September',
						'10'	=> 'October',
						'11'	=> 'November',
						'12'	=> 'December',
					);
	if(!empty($id)){
		return $months[$id];
	} else {
		return $months;
	}
}

// CLEANVARS
function cleanvars($str){ 
	$str = trim($str);
	return is_array($str) ? array_map('cleanvars', $str) : str_replace("\\", "\\\\", htmlspecialchars((stripslashes($str)), ENT_QUOTES)); 
}

// SEO URL
function to_seo_url($str){
    $str = htmlentities($str, ENT_NOQUOTES, 'UTF-8');
    $str = preg_replace('`&([a-z]{1,2})(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig);`i', '\1', $str);
    $str = html_entity_decode($str, ENT_NOQUOTES, 'UTF-8');
    $str = preg_replace(array('`[^a-z0-9]`i','`[-]+`'), '-', $str);
    $str = trim($str, '-');
	$str = strtolower($str);
    return $str;
}

// roletypes
function get_roletypes($id = '') {	
	$roletypes = array (
						array('id'=>1,  'name'=>'Sales')			, 
						array('id'=>2,  'name'=>'Purchase')			,
						array('id'=>3,  'name'=>'Vendors')			,
						array('id'=>4,  'name'=>'Payments')			,
						array('id'=>5,  'name'=>'Customers')		,
						array('id'=>6,  'name'=>'Items')			,
						array('id'=>7,  'name'=>'Ledgers')			,
						array('id'=>9,  'name'=>'Reporting')		,
						array('id'=>8,  'name'=>'Setting')									
				   );
	if(!empty($id)){
		$listroletypes = array (
								'1'  => 'Sales'			,
								'2'  => 'Purchase'		,
								'3'  => 'Vendors'		,
								'4'  => 'Payments'		,
								'5'  => 'Customers'		,
								'6'  => 'Items'			,
								'7'  => 'Ledgers'		,
								'8'  => 'Setting'		,
								'9'  => 'Reporting'									
							);
		return $listroletypes[$id];
	} else {
		return $roletypes;
	}
}

// NICE NUMBER
function nice_number($n) {
	// first strip any formatting;
	$n = (0+str_replace(",", "", $n));

	// is this a number?
	if (!is_numeric($n)) return false;

	// now filter it;
	if ($n > 1000000000000) return round(($n/1000000000000), 4).' T';
	elseif ($n > 1000000000) return round(($n/1000000000), 4).' B';
	elseif ($n > 1000000) return round(($n/1000000), 4).' M';
	elseif ($n > 1000) return round(($n/1000), 4).' K';

	return number_format($n);
}

//Rupees in Word
function convert_number_to_words($number) {

    $hyphen      = '-';
    $conjunction = ' and ';
    $separator   = ', ';
    $negative    = 'negative ';
    $decimal     = ' point ';
    $dictionary  = array(
        0                   => 'zero',
        1                   => 'one',
        2                   => 'two',
        3                   => 'three',
        4                   => 'four',
        5                   => 'five',
        6                   => 'six',
        7                   => 'seven',
        8                   => 'eight',
        9                   => 'nine',
        10                  => 'ten',
        11                  => 'eleven',
        12                  => 'twelve',
        13                  => 'thirteen',
        14                  => 'fourteen',
        15                  => 'fifteen',
        16                  => 'sixteen',
        17                  => 'seventeen',
        18                  => 'eighteen',
        19                  => 'nineteen',
        20                  => 'twenty',
        30                  => 'thirty',
        40                  => 'fourty',
        50                  => 'fifty',
        60                  => 'sixty',
        70                  => 'seventy',
        80                  => 'eighty',
        90                  => 'ninety',
        100                 => 'hundred',
        1000                => 'thousand',
        1000000             => 'million',
        1000000000          => 'billion',
        1000000000000       => 'trillion',
        1000000000000000    => 'quadrillion',
        1000000000000000000 => 'quintillion'
    );

    if (!is_numeric($number)) {
        return false;
    }

    if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
        // overflow
        trigger_error(
            'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
            E_USER_WARNING
        );
        return false;
    }

    if ($number < 0) {
        return $negative . convert_number_to_words(abs($number));
    }

    $string = $fraction = null;

    if (strpos($number, '.') !== false) {
        list($number, $fraction) = explode('.', $number);
    }

    switch (true) {
        case $number < 21:
            $string = $dictionary[$number];
            break;
        case $number < 100:
            $tens   = ((int) ($number / 10)) * 10;
            $units  = $number % 10;
            $string = $dictionary[$tens];
            if ($units) {
                $string .= $hyphen . $dictionary[$units];
            }
            break;
        case $number < 1000:
            $hundreds  = $number / 100;
            $remainder = $number % 100;
            $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
            if ($remainder) {
                $string .= $conjunction . convert_number_to_words($remainder);
            }
            break;
        default:
            $baseUnit = pow(1000, floor(log($number, 1000)));
            $numBaseUnits = (int) ($number / $baseUnit);
            $remainder = $number % $baseUnit;
            $string = convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
            if ($remainder) {
                $string .= $remainder < 100 ? $conjunction : $separator;
                $string .= convert_number_to_words($remainder);
            }
            break;
    }

    if (null !== $fraction && is_numeric($fraction)) {
        $string .= $decimal;
        $words = array();
        foreach (str_split((string) $fraction) as $number) {
            $words[] = $dictionary[$number];
        }
        $string .= implode(' ', $words);
    }

    return $string;
}

$days = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');

//Time Format
function get_hours_range( $start = 0, $end = 86400, $step = 1800, $format = 'g:i a' ) {
        $times = array();
        foreach ( range( $start, $end, $step ) as $timestamp ) {
                $hour_mins = gmdate( 'H:i', $timestamp );
                if ( ! empty( $format ) )
                        $times[$hour_mins] = gmdate( $format, $timestamp );
                else $times[$hour_mins] = $hour_mins;
        }
        return $times;
}

function searchArrayKeyVal($sKey, $id, $array) {
	foreach ($array as $key => $val) {
		if ($val[$sKey] == $id) {
			return $key;
		}
	}
	return null;
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

// SEND REMARKS
function sendRemark($remarks = "", $action = "", $id_record = "") {
	if (!empty($remarks) && !empty($action) && !empty($id_record)) {
		require_once("include/dbsetting/lms_vars_config.php");
		require_once("include/dbsetting/classdbconection.php");
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

// SESSION MESSAGE
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

// ORDERING
function get_ordering($dbName  = '') {
	if (!empty($dbName)) {
		require_once("include/dbsetting/lms_vars_config.php");
		require_once("include/dbsetting/classdbconection.php");
		$dblms = new dblms();
		$colName        = $dblms->querylms("SELECT COLUMN_NAME
											FROM INFORMATION_SCHEMA.COLUMNS
											WHERE TABLE_NAME = '".$dbName."'");
		$colName        = mysqli_fetch_array($colName)[0];

		$conOrdering = array ( 
								  'select'      => $colName
								, 'where'		=> array( 'id_campus' => cleanvars($_SESSION['userlogininfo']['LOGINCAMPUS']) )
								, 'order_by' 	=> ''.$colName.' DESC'
								, 'return_type' => 'single'
							); 
		$Ordering  = $dblms->getRows($dbName,$conOrdering);
		$number = (!empty($Ordering))?($Ordering[$colName]+1):1;
		return $number;
	} else {
		return false;
	}
}

// MODULE NAME
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

// TIME AGO
function timeAgo($time_ago){
	$time_ago = strtotime($time_ago);
	$cur_time   = time();
	$time_elapsed   = $cur_time - $time_ago;
	$seconds    = $time_elapsed ;
	$minutes    = round($time_elapsed / 60 );
	$hours      = round($time_elapsed / 3600);
	$days       = round($time_elapsed / 86400 );
	$weeks      = round($time_elapsed / 604800);
	$months     = round($time_elapsed / 2600640 );
	$years      = round($time_elapsed / 31207680 );
	// Seconds
	if($seconds <= 60){
		return "just now";
	}
	//Minutes
	else if($minutes <=60){
		if($minutes==1){
			return "one minute ago";
		}
		else{
			return "$minutes minutes ago";
		}
	}
	//Hours
	else if($hours <=24){
		if($hours==1){
			return "1 hour ago";
		}else{
			return "$hours hrs ago";
		}
	}
	//Days
	else if($days <= 7){
		if($days==1){
			return "yesterday";
		}else{
			return "$days days ago";
		}
	}
	//Weeks
	else if($weeks <= 4.3){
		if($weeks==1){
			return "1 week ago";
		}else{
			return "$weeks weeks ago";
		}
	}
	//Months
	else if($months <=12){
		if($months==1){
			return "1 month ago";
		}else{
			return "$months months ago";
		}
	}
	//Years
	else{
		if($years==1){
			return "1 year ago";
		}else{
			return "$years years ago";
		}
	}
}

// COUPON CODE
function generateCouponCode() {
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*';
    $couponCode = '';
    for ($i = 0; $i < 9; $i++) {
        $randomIndex = rand(0, strlen($characters) - 1);
        $couponCode .= $characters[$randomIndex];
    }
    return $couponCode;
}

function navBarMaker() {
	$listNav = array(
						  "index"			=> array( "name" => "home"				,   "links" => "" )
						// , "team"			=> array( "name" => "team"				,   "links" => "" )
						, "functions"		=> array( "name" => "functions"			,   "links" => 
													array(
															"function/consultancy-advisory-services"	=> array( "name" => "Consultancy & Advisory Services"	,	"links" => "")
															,"function/training-and-capacity-building"	=> array( "name" => "training and capacity building"	,	"links" => "")
															, "function/course"	=> array( "name" => "Course"	,	"links" => "")
															, "function/aaoifi-certificate-registration"	=> array( "name" => "AAOIFI Certificate Registration"	,	"links" => "")
														)
													)
						, "events"		=> array( "name" => "events"			,   "links" => 
													array(
															  "events/wiefc"	=> array( "name" => "wiefc"							,	"links" => "")
															, "events/symposium"	=> array( "name" => "symposium"						,	"links" => "")
															, "events/guest-lecture"	=> array( "name" => "guest lecture"	,	"links" => "")
															, "events/workshop-and-seminar"	=> array( "name" => "workshop and seminar"	,	"links" => "")
														)
													)
						, "journals"		=> array( "name" => "journals"				,   "links" => "" )
						, "publications"		=> array( "name" => "publications"			,   "links" => 
													array(
															"publications/books"	=> array( "name" => "books"	,	"links" => "")
															,"publications/articles"	=> array( "name" => "articels"	,	"links" => "")
															, "publications/reports"	=> array( "name" => "reports"	,	"links" => "")
														)
													)
						, "blog"			=> array( "name" => "blog"				,   "links" => "" )
						, "ask_your_question"			=> array( "name" => "ask_your_question"				,   "links" => "" )
						, "about"			=> array( "name" => "About"		,   "links" => 
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
//--------------- TEAM ------------------
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
//--------------- EVENTS ------------------
$eventtype = array (
	array('id'=>1, 'name'=>'WIEFC')	,
	array('id'=>2, 'name'=>'Symposium')	,
	array('id'=>3, 'name'=>'Guest Lectures')	,
	array('id'=>4, 'name'=>'Workshop and Seminar')
);
function get_eventtype($id='') {
	$listevents = array (
			'1' => 'WIEFC'	, 
			'2' => 'Symposium'	, 
			'3' => 'Guest Lectures'	, 
			'4' => 'Workshop and Seminar'	);
	if(!empty($id)){
		// $listeventlabel= array (
		// 							'1' => '<span class="badge badge-secondary">Seminar</span>' 
		// 							, '2' => '<span class="badge badge-warning">Webinar</span>'
		// 							, '3' => '<span class="badge badge-success">Training</span>'
		// 							, '4' => '<span class="badge badge-success">Workshop</span>'
		// 						); 
		return $listevents[$id];
	} else {
		return $listevents;
	}
}
$function_type = [
    [
        'type_id' => 1,
        'type_name' => 'Consultancy & Advisory Services',
        'type_href' => 'consultancy-advisory-services',
    ],
    [
        'type_id' => 2,
        'type_name' => 'Training and Capacity Building',
        'type_href' => 'training-capacity-building',
    ],
];

$pub_type = [
    [
        'type_id' => 1,
        'type_name' => 'Books',
        'type_href' => 'books',
    ],
    [
        'type_id' => 2,
        'type_name' => 'Articles',
        'type_href' => 'articles',
    ],
    [
        'type_id' => 2,
        'type_name' => 'reports',
        'type_href' => 'reports',
    ],
];

?>