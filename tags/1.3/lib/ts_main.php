<?php
$opic_ts_categories_lang = array();

$opicts_lang_list = array(
    'ara' => ['title'=> 'العربية' ,'link' => 'http://ar.truth-seeker.info'],
    'eng' => ['title'=> 'English' ,'link' => 'http://www.truth-seeker.info'],
    /*,'rom'=>'Romanian','rus'=>'Russian','spa'=>'Spanish','hin'=>'Hindi','tag'=>'Tagalog','ben'=>'Bengali','sin'=>'Sinhalese','nep'=>'Nepali','tam'=>'Tamil','tel'=>'Telugu','mal'=>'Malayalm'*/);

// ======================   Titles ==============================


$tscategories["truth_seeker"]= array(
    'title'=>"Truth Seeker",
    'url'=>"http://www.truth-seeker.info",
    'logo'=>"truth_seeker.png"
    );
    
foreach($opicts_lang_list as $key => $value)
{	
    // =================== Define English ===========================
    $opic_ts_categories_lang[$key]['truth_seeker']['url'] 					=  $value['link'];
    $opic_ts_categories_lang[$key]['truth_seeker']['cat'] 					=  $value['link'].'/api/get_category_index/';
    $opic_ts_categories_lang[$key]['truth_seeker']['importurl'] 			    =  $value['link'].'/api/get_category_posts/?slug=';       
}






?>