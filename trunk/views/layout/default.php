<form method="post" action="<?php admin_url( 'options-general.php?page='.OPICTS_Page_SLUG ); ?>">
<?php
	echo wp_nonce_field(OPICTS_Page_SLUG,OPICTS_Page_SLUG."-settings-page"); 
	
	$TSHtmlHelper = new html_ts_helper();
	$TSHtmlHelper->opic_ts_admin_tabs();
	$TSHtmlHelper->MainContent($mainViewFile);
?>
   <p class="submit" style="clear: both;">
      <input type="submit" name="Submit"  class="button-primary" value="<?php echo $TSHtmlHelper->getLang('btn-updatesetting') ?>" />
      <input type="hidden" name="ilc-settings-submit" value="Y" />
   </p>
</form>