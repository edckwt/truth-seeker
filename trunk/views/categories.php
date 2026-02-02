<?php
$TSHtml = new html_ts_helper();
global $tscategories,$opic_ts_categories_lang;
 
$category_slug = esc_attr($_GET['cat_slug']);

$opicts_lang = get_option(OPICTS_Input_SLUG.'language');
$link = $opic_ts_categories_lang[$opicts_lang][$category_slug]['url'];
$jsoncaturl = $opic_ts_categories_lang[$opicts_lang][$category_slug]['cat'];
$slug = $category_slug.'_'.$opicts_lang;
$cat_options = $TSHtml->categoryFromTransient($jsoncaturl,$slug);
?>
<div class="category-head">
	<table width="100%">
		<tr>
			<td width="80px"><span class="category-logo"><?php echo opicts_cat_logo($category_slug,array('width'=>'80px','class'=>$category_slug)) ?></span></td>
			<td><h1 class="category-title"><a target="_blank" href="<?php echo $link; ?>"><?php echo $this->getLang($category_slug); ?></a></h1></td>
		</tr>
	</table>

</div>
<hr />
<?php
	echo $TSHtml->Input('checkbox',array('name'=>'category_'.$opicts_lang.'_'.$category_slug.'[]','options'=>$cat_options));
?>
