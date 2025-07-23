<?php
$moduleName = array(
   'dashboard'            =>  'dashboard'
  ,'login'                =>  'login'
  ,'profile'              =>  'profile'

  ,'partners'             =>  'partners'
  ,'leaders'              =>  'leaders'
  ,'news'                 =>  'news'
  ,'banner'               =>  'banner'
  ,'contact'              =>  'contact'
  ,'focus'                =>  'focus'
  ,'summary-area'         =>  'summary'
  ,'what-we-do'           =>  'we_do'
  ,'what-we-do-features'  =>  'wedo_features'
  ,'policies'             =>  'policies'
  ,'about'                =>  'about'
  ,'reviews'              =>  'reviews'
);
include "include/header.php";
// include "include/sidebar.php";
if (array_key_exists(ZONE, $moduleName)) {
  include ($moduleName[ZONE].'.php');
} 
else { 
  header("Location: ".SITE_URL_PORTAL."dashboard");
}
include "include/footer.php";
?>
    