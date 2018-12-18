<?php
$opicts_categories_lang = array();



// ======================   Titles ==============================

											
$tscategories["truth_seeker"]			 		= array(
													'title'=>"Truth Seeker",
													'url'=>"http://www.truth-seeker.info",
													'logo'=>"truth_seeker.png"
													);												
// =================== Arabic ===========================
$opicts_categories_lang['ara']['truth_seeker']['url'] 					= $tscategories["truth_seeker"]['url'].'/ar';
$opicts_categories_lang['ara']['truth_seeker']['cat'] 					= $tscategories["truth_seeker"]['url'].'/ar/api/get_category_index/';
$opicts_categories_lang['ara']['truth_seeker']['importurl'] 			= $tscategories["truth_seeker"]['url'].'/ar/api/get_category_posts/?slug=';
// =================== English ===========================


$opicts_categories_lang['eng']['truth_seeker']['url'] 					=  $tscategories["truth_seeker"]['url'] ;
$opicts_categories_lang['eng']['truth_seeker']['cat'] 					=  $tscategories["truth_seeker"]['url'].'/api/get_category_index/';
$opicts_categories_lang['eng']['truth_seeker']['importurl'] 			=  $tscategories["truth_seeker"]['url'].'/api/get_category_posts/?slug=';



?>