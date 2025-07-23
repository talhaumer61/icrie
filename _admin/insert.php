<?php


include "dbsetting/lms_vars_config.php";

 

include "dbsetting/classdbconection.php";

$dblms = new dblms();

include "functions/login_func.php";

include "functions/functions.php";




// //------------------------------------------
// $funds_json = file_get_contents("../data/grants&funds.json");
// $funds = json_decode($funds_json,true);
// //------------------------------------------
// foreach($funds as $fund){

//     $date = date("Y-m-d", strtotime($fund['dated']));
//     //------------------------------------------------
//         $sqllms  = $dblms->querylms("INSERT INTO ".GRANTS."(
//                                                         grant_status                   ,
//                                                         grant_photo                     ,
//                                                         grant_title                    ,
//                                                         grant_type                     ,
//                                                         grant_href                     ,
//                                                         grant_date                     ,
//                                                         grant_brief_detail             ,
//                                                         grant_detail                   ,
//                                                         id_added                       ,
//                                                         date_added                      
//                                                         )
//                                                     VALUES(
//                                                         '1'	                                            ,
//                                                         '".cleanvars($fund['img'])."'		            ,
//                                                         '".cleanvars($fund['title'])."'		            ,
//                                                         '".cleanvars($fund['type'])."'		                 ,
//                                                         '".cleanvars(generateSeoURL($fund['title']))."'	,
//                                                         '".cleanvars($date)."'		                            ,
//                                                         '".cleanvars($fund['detail'])."'		    ,
//                                                         '".cleanvars($fund['detail'])."'		            ,
//                                                         '".cleanvars($_SESSION['LOGINID_DT'])."'	            ,
//                                                         NOW()   
//                                                         )"
//                             );

// }



// //------------------------------------------
// $events_json = file_get_contents("../data/news&events.json");
// $events = json_decode($events_json,true);
// //------------------------------------------
// foreach($events as $event){
// $date = date("Y-m-d", strtotime($event['news_date']));
// //------------------------------------------------
//     $sqllms  = $dblms->querylms("INSERT INTO ".BLOGS."(
//                                                     blog_status                   ,
//                                                     blog_photo                    ,
//                                                     blog_title                    ,
//                                                     blog_href                     ,
//                                                     blog_date                     ,
//                                                     blog_brief_detail             ,
//                                                     blog_detail                                       
//                                                     )
//                                                 VALUES(
//                                                     '1'	                                                    ,
//                                                     '".cleanvars($event['news_img'])."'		            ,
//                                                     '".cleanvars($event['news_title'])."'		            ,
//                                                     '".cleanvars(generateSeoURL($event['news_title']))."'	,
//                                                     '".cleanvars($date)."'		                            ,
//                                                     '".cleanvars($event['news_detail'])."'		    ,
//                                                     '".cleanvars($event['news_detail'])."'		             
//                                                     )"
//                         );
// }


// //------------------------------------------
// $mous_json = file_get_contents("../data/mous.json");
// $mous = json_decode($mous_json,true);
// //------------------------------------------
// foreach($mous as $mou){ 
// //------------------------------------------------
// $date = date("Y-m-d", strtotime($mou['mou_date']));
// //------------------------------------------------
//     $sqllms  = $dblms->querylms("INSERT INTO ".MOUS."(
//                                                     mou_status                   ,
//                                                     mou_title                    ,
//                                                     mou_href                     ,
//                                                     mou_org                      ,
//                                                     mou_date                     ,
//                                                     mou_detail                   ,
//                                                     id_added                     ,
//                                                     date_added                      
//                                                     )
//                                                 VALUES(
//                                                     '".cleanvars($mou['mou_status'])."'	                ,
//                                                     '".cleanvars($mou['mou_title'])."'		            ,
//                                                     '".cleanvars(generateSeoURL($mou['mou_title']))."'	,
//                                                     '".cleanvars($mou['mou_org'])."'  		            ,
//                                                     '".cleanvars($date)."'		                            ,
//                                                     '".cleanvars($mou['mou_detail'])."'		            ,
//                                                     '".cleanvars($_SESSION['LOGINID_DT'])."'	            ,
//                                                     NOW()   
//                                                     )"
//                         );
// }

//------------------------------------------
// $mous_json = file_get_contents("../data/gallery.json");
// $mous = json_decode($mous_json,true);
// //------------------------------------------
// foreach($mous as $mou){ 

//  $sqllms  = $dblms->querylms("INSERT INTO ".GALLERY."(
//                                                     gallery_status                   ,
//                                                     gallery_title                    ,
//                                                     gallery_href                     ,
//                                                     gallery_photo                           
//                                                     )
//                                                 VALUES(
//                                                     '1'	                  ,
//                                                     '".cleanvars($mou['imgTitle'])."'		              ,
//                                                     '".cleanvars(generateSeoURL($imgTitle))."'             ,
//                                                     '".cleanvars($mou['img'])."'   
//                                                     )"
//                         );
//                     }






?>