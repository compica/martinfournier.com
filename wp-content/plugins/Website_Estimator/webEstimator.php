<?php

/*
Plugin Name: Website Estimator by Designs by Mitch
Plugin URI: http://www.designsbymitch.com/envato/webEstimator/index.html
Description: Allows your potential clients to estimate the cost of a new website. Use shortcode: [webEstimator] to add to pages; You must setup the variables in the settings panel. Click on "Settings" in the WordPress left nav and then choose "Website Estimator."
Author: M. Gunnels
Version: 2.0
Author URI: http://www.designsbymitch.com
License: contact mgunnels@designsbymitch.com/ MUST Purchase License
*/

//4-28-12: Updated the echo to be an include. This fixed the issue of adding text above the estimator. Changed the email header to use the email address in the settings instead of the host URL.  

//2-2-12: Added a form reset to fix a bug. 

//12-18-11: Remove the cost and sidebar. Also, made it so you can hide individual CMS options. 

//12-4-11: Change the next button to be customizable. Turn off payment gateways. hide pricing. Fix firefox comment issue. 

//12-3-11: This version has update for dates, google checkout, fixed extra titles and widget titles in contact form. Added ability to change order summary names. Added message to client in contact form. Added return option to paypal. Added message customization after the form is submitted. 


/* Set up the plugin. */
add_action('plugins_loaded', 'WEBESTIMATOR_setup');

/**
 * WEBESTIMATOR plugin setup function.
 *
 */
function WEBESTIMATOR_setup()
{
    /* Get the plugin directory URI. */
    define('WEBESTIMATOR_URI', trailingslashit(plugin_dir_url(__FILE__)));
    
    /* Register the shortcode. */
    add_action('init', 'webEstimator_register_shortcodes');
   
}

/**
 *Create admin page
 **/

function webEstimator_settings_init()
{
    //General Settings
	register_setting('webEstimator_options', 'WE_myEmail');
    register_setting('webEstimator_options', 'WE_page_amount');
    register_setting('webEstimator_options', 'WE_phone_num');
    register_setting('webEstimator_options', 'WEpageHide');
    register_setting('webEstimator_options', 'WEdaysHide');
    
    
    //design
    register_setting('webEstimator_options', 'WE_design_title');
    register_setting('webEstimator_options', 'WE_design_description');
    register_setting('webEstimator_options', 'WE_design_hide');
    register_setting('webEstimator_options', 'WE_design_amount');
    
    //Steps
    register_setting('webEstimator_options', 'WE_step1');
    register_setting('webEstimator_options', 'WE_step2');
    register_setting('webEstimator_options', 'WE_step3');
    register_setting('webEstimator_options', 'WE_step4');
    register_setting('webEstimator_options', 'WE_pages_title');
    register_setting('webEstimator_options', 'WE_days_title');
    
    //Descriptions
    register_setting('webEstimator_options', 'WE_intro');
    register_setting('webEstimator_options', 'WE_cms_description');
    
    
    //paypal options
    register_setting('webEstimator_options', 'WE_currency');
    register_setting('webEstimator_options', 'WE_currency_code');
    register_setting('webEstimator_options', 'WE_paypal_email');
    register_setting('webEstimator_options', 'WE_paypal_item_name');
    register_setting('webEstimator_options', 'WE_paypal_button_text');
    
    
    //CMS
    register_setting('webEstimator_options', 'WE_cms_title');
    register_setting('webEstimator_options', 'WE_CMS_none');
    register_setting('webEstimator_options', 'WE_CMS_joomla');
    register_setting('webEstimator_options', 'WE_CMS_wordpress');
    register_setting('webEstimator_options', 'WE_CMS_drupal');
    
    //Widgets
    register_setting('webEstimator_options', 'WEwidgettitle1');
    register_setting('webEstimator_options', 'WEwidgettitle2');
    register_setting('webEstimator_options', 'WEwidgettitle3');
    register_setting('webEstimator_options', 'WEwidgettitle4');
    register_setting('webEstimator_options', 'WEwidgettitle5');
    register_setting('webEstimator_options', 'WEwidgettitle6');
    register_setting('webEstimator_options', 'WEwidgettitle7');
    register_setting('webEstimator_options', 'WEwidgettitle8');
    
    register_setting('webEstimator_options', 'WEwidgetTXT1');
    register_setting('webEstimator_options', 'WEwidgetTXT2');
    register_setting('webEstimator_options', 'WEwidgetTXT3');
    register_setting('webEstimator_options', 'WEwidgetTXT4');
    register_setting('webEstimator_options', 'WEwidgetTXT5');
    register_setting('webEstimator_options', 'WEwidgetTXT6');
    register_setting('webEstimator_options', 'WEwidgetTXT7');
    register_setting('webEstimator_options', 'WEwidgetTXT8');
    
    register_setting('webEstimator_options', 'WEwidgetHide1');
    register_setting('webEstimator_options', 'WEwidgetHide2');
    register_setting('webEstimator_options', 'WEwidgetHide3');
    register_setting('webEstimator_options', 'WEwidgetHide4');
    register_setting('webEstimator_options', 'WEwidgetHide5');
    register_setting('webEstimator_options', 'WEwidgetHide6');
    register_setting('webEstimator_options', 'WEwidgetHide7');
    register_setting('webEstimator_options', 'WEwidgetHide8');
    
    
    register_setting('webEstimator_options', 'WEwidgetPrice1');
    register_setting('webEstimator_options', 'WEwidgetPrice2');
    register_setting('webEstimator_options', 'WEwidgetPrice3');
    register_setting('webEstimator_options', 'WEwidgetPrice4');
    register_setting('webEstimator_options', 'WEwidgetPrice5');
    register_setting('webEstimator_options', 'WEwidgetPrice6');
    register_setting('webEstimator_options', 'WEwidgetPrice7');
    register_setting('webEstimator_options', 'WEwidgetPrice8');
    
    //Extras
	
	register_setting('webEstimator_options', 'WE_extra_title');
	register_setting('webEstimator_options', 'WE_extra_description');
	
    register_setting('webEstimator_options', 'WEextraHide');
    register_setting('webEstimator_options', 'WECMSHide');
    
    register_setting('webEstimator_options', 'WEextra1Price');
    register_setting('webEstimator_options', 'WEextra2Price');
    register_setting('webEstimator_options', 'WEextra3Price');
    register_setting('webEstimator_options', 'WEextra4Price');
    register_setting('webEstimator_options', 'WEextra5Price');
    register_setting('webEstimator_options', 'WEextra6Price');
    register_setting('webEstimator_options', 'WEextra7Price');
    register_setting('webEstimator_options', 'WEextra8Price');
    register_setting('webEstimator_options', 'WEextra9Price');
    register_setting('webEstimator_options', 'WEextra10Price');
    
    register_setting('webEstimator_options', 'WEextra1TXT');
    register_setting('webEstimator_options', 'WEextra2TXT');
    register_setting('webEstimator_options', 'WEextra3TXT');
    register_setting('webEstimator_options', 'WEextra4TXT');
    register_setting('webEstimator_options', 'WEextra5TXT');
    register_setting('webEstimator_options', 'WEextra6TXT');
    register_setting('webEstimator_options', 'WEextra7TXT');
    register_setting('webEstimator_options', 'WEextra8TXT');
    register_setting('webEstimator_options', 'WEextra9TXT');
    register_setting('webEstimator_options', 'WEextra10TXT');
    
    register_setting('webEstimator_options', 'WEextra1Hide');
    register_setting('webEstimator_options', 'WEextra2Hide');
    register_setting('webEstimator_options', 'WEextra3Hide');
    register_setting('webEstimator_options', 'WEextra4Hide');
    register_setting('webEstimator_options', 'WEextra5Hide');
    register_setting('webEstimator_options', 'WEextra6Hide');
    register_setting('webEstimator_options', 'WEextra7Hide');
    register_setting('webEstimator_options', 'WEextra8Hide');
    register_setting('webEstimator_options', 'WEextra9Hide');
    register_setting('webEstimator_options', 'WEextra10Hide');
    
    //max days	
    register_setting('webEstimator_options', 'WEmaxDays');
	
	//Date Format
	register_setting('webEstimator_options', 'WE_date_format');
	
	//message to client
	register_setting('webEstimator_options', 'WE_yourMessage');
	
	//Paypal/Google Hide
	register_setting('webEstimator_options', 'WE_google_hide');
	register_setting('webEstimator_options', 'WE_paypal_hide');
	
	//Google Checkout
	register_setting('webEstimator_options', 'WE_google_merchant');
	register_setting('webEstimator_options', 'WE_google_button');
	
	//Order Summary
	register_setting('webEstimator_options', 'WE_order_summary_title');
	register_setting('webEstimator_options', 'WE_order_summary_date');
	register_setting('webEstimator_options', 'WE_order_summary_pages');
	register_setting('webEstimator_options', 'WE_order_summary_base');
	register_setting('webEstimator_options', 'WE_order_summary_CMS');
	register_setting('webEstimator_options', 'WE_order_summary_options');
	register_setting('webEstimator_options', 'WE_order_summary_widgets');
	register_setting('webEstimator_options', 'WE_order_summary_total');
	
	register_setting('webEstimator_options', 'returnURL');
	
	//information submitted
	register_setting('webEstimator_options', 'informationSubmitted');
	
	
	//submit button title
	register_setting('webEstimator_options', 'WE_SB');
	
	//Payment Hide
	register_setting('webEstimator_options', 'WE_payment_hide');
	
	//Design Settings
	register_setting('webEstimator_options', 'WE_design_colors');
	register_setting('webEstimator_options', 'WE_design_sampleSites');
	register_setting('webEstimator_options', 'WE_design_specialInstructions');
	
	
	//Form titles
	register_setting('webEstimator_options', 'WE_form_firstName');
	register_setting('webEstimator_options', 'WE_form_lastName');
	register_setting('webEstimator_options', 'WE_form_phone');
	register_setting('webEstimator_options', 'WE_form_email');
	register_setting('webEstimator_options', 'WE_form_address');
	register_setting('webEstimator_options', 'WE_form_city');
	register_setting('webEstimator_options', 'WE_form_state');
	register_setting('webEstimator_options', 'WE_form_zip');
	register_setting('webEstimator_options', 'WE_form_country');
	
	register_setting('webEstimator_options', 'WE_hide_cost');
	
	
}

add_action('admin_init', 'webEstimator_settings_init');

function webEstimator_admin_page()
{
?>
<style type="text/css">
.required {
	border: 2px solid #f00 !important;
}
.wrap {
	padding:20px;
	border: 1px solid #CCC;
	-moz-border-radius:10px;
	-webkit-border-radius:10px;
	border-radius:10px;
}
.blue {
	color:#21759B !important;
}
.W_E_success, .W_E_errors {
	border: 1px solid;
	margin: 15px 0px;
	padding:15px 10px 15px 70px;
	background-repeat: no-repeat;
	background-position: 10px center;
	-moz-border-radius:10px;
	-webkit-border-radius: 10px;
	border-radius: 10px;
}
.W_E_success {
	color: #4F8A10;
	background-color: #DFF2BF;
}
.W_E_errors {
	color: #D8000C;
	background-color: #FFBABA;
}
</style>
<div class="wrap">
		<?php
    screen_icon();
?>
		<h2 class="blue">Website Estimator</h2>
		<h3 class="blue">You must fill in settings before you can use the website estimator. If you would like to see a sample click <a href="http://www.designsbymitch.com/envato/webEstimator/" target="_blank">here</a> .<br />
				Please note: that the website estimator must be uploaded to a production server and not a localhost in order to work properly. </h3>
		<div id="W_E_message"></div>
		<form action="options.php" method="post" id="web-estimator-settings-form">
				<?php
    settings_fields('webEstimator_options');
?>
				<h2 class="blue">Main Settings</h2>
				<h3>Hide Cost &amp; Sidebar:<br />
						<input type="radio" name="WE_hide_cost" value="yes" id="WE_hide_cost_yes"/>
						Yes
						<input type="radio" name="WE_hide_cost" id="WE_hide_cost_no" value="no" />
						No</h3>
				<p>This will hide the total sidebar and remove all costs from view of the potential client. You will still be sent the cost details. <span style="color:red;">WARNING: If you choose "Yes" an email will NOT be sent to the potential client.I suggest chaning the form submission message to something like: &quot;We have recieved your message. We will contact you within the next bussiness day.&quot; </span></p>
				</h3>
				<h3>
						<label for="WE_myEmail">Your Email: </label>
						<input id="WE_myEmail" type="text" name="WE_myEmail" value="<?php
    echo esc_attr(get_option('WE_myEmail'));
?>" />
				</h3>
				<h3>
						<label for="WE_yourMessage">Message to client on confirmation email: </label>
						<br />
						<textarea name="WE_yourMessage" cols="100" rows="4" id="WE_yourMessage" />
						<?php echo esc_attr(get_option('WE_yourMessage'));?>
						</textarea>
				</h3>
				<h3>
						<label for="informationSubmitted">Message after form is submitted: </label>
						<br />
						<textarea name="informationSubmitted" cols="100" rows="4" id="informationSubmitted" />
						<?php echo esc_attr(get_option('informationSubmitted'));?>
						</textarea>
				</h3>
				<h3>
						<label for="WE_currency">Currency Symbol: </label>
						<input id="WE_currency" type="text" name="WE_currency" value="<?php
    echo esc_attr(get_option('WE_currency'));
?>" />
				</h3>
				<h3>Date Format:
						<input type="radio" name="WE_date_format" value="mm-dd-yy" id="WE_date_format1"/>
						MM-DD-YYYY
						<input type="radio" name="WE_date_format" id="WE_date_format2" value="dd-mm-yy" />
						DD-MM-YYYY</h3>
				</h3>
				<p>Title for the next button found in step four of the demo. If you turn off the payment gateways. I suggest naming it Submit or something similiar instead of next.</p>
				<h3>
						<label for="WE_SB">Title of form submission button: </label>
						<input id="WE_SB" type="text" name="WE_SB" value="<?php
    echo esc_attr(get_option('WE_SB'));
?>" />
				</h3>
				<p>Titles for each main section. Their are four major sections.</p>
				<h3>
						<label for="WE_step1">Step 1 Title: </label>
						<input id="WE_step1" type="text" name="WE_step1" value="<?php
    echo esc_attr(get_option('WE_step1'));
?>" />
				</h3>
				<h3>
						<label for="WE_step2">Step 2 Title: </label>
						<input id="WE_step2" type="text" name="WE_step2" value="<?php
    echo esc_attr(get_option('WE_step2'));
?>" />
				</h3>
				<h3>
						<label for="WE_step3">Step 3 Title: </label>
						<input id="WE_step3" type="text" name="WE_step3" value="<?php
    echo esc_attr(get_option('WE_step3'));
?>" />
				</h3>
				<h3>
						<label for="WE_step4">Step 4 Title: </label>
						<input id="WE_step4" type="text" name="WE_step4" value="<?php
    echo esc_attr(get_option('WE_step4'));
?>" />
				</h3>
				<h3>
						<label for="WE_intro">Intro Description: </label>
						<br />
						<textarea name="WE_intro" cols="100" rows="4" id="WE_intro" />
						<?php echo esc_attr(get_option('WE_intro'));?>
						</textarea>
				</h3>
				<h3>
						<label for="WE_pages_title">Pages Title: </label>
						<input id="WE_pages_title" type="text" name="WE_pages_title" value="<?php
    echo esc_attr(get_option('WE_pages_title'));
?>" />
						<br />
						<br />
						Do you want to hide the pages slider?
						<input type="radio" name="WEpageHide" value="yes" id="WEpageHideYes"/>
						Yes
						<input type="radio" name="WEpageHide" id="WEpageHideNo" value="no" />
						No </h3>
				<h3>
						<label for="WE_days_title">Days Title: </label>
						<input id="WE_days_title" type="text" name="WE_days_title" value="<?php
    echo esc_attr(get_option('WE_days_title'));
?>" />
						<br />
						<br />
						Do you want to hide the days slider?
						<input type="radio" name="WEdaysHide" value="yes" id="WEdaysHideYes"/>
						Yes
						<input type="radio" name="WEdaysHide" id="WEdaysHideNo" value="no" />
						No </h3>
				<p>This is the amount that you would charge per page of development. IMPORTANT: THEN multiply that by 10!!!!!</p>
				<h3>
						<label for="WE_page_amount">Per page amount (multiplied by 10): </label>
						<input id="WE_page_amount" type="text" name="WE_page_amount" value="<?php
    echo esc_attr(get_option('WE_page_amount'));
?>" />
				</h3>
				<p>Max days variable is slightly hard to describe but here it goes. The program is setup to reduce/increase the per page amount based on the amount of days selected. This obviously will make it so that if less days are selected they higher the per page cost. The more pages selected the less each page will cost. This could be an issue if someone wants to get a VERY cheap site and moves the day indicator to the most (15 days). This variable makes it possible to stop reducing the per page price after a set amount of days. So if you want to give NO reduction based on days...change this to 1. This will then disable this feature. If you do change it to 1 then you must also change your per page price to be a standard price. In the default example you would change $1000 to $100. IMPORTANT: if you do set this to 1 then most clients will see that the day indicator does not change the price and will probably request all sites done in 1 day. VALUE can't = 0. </p>
				<h3>
						<label for="WEmaxDays">Max Days to reduce price: </label>
						<input id="WEmaxDays" type="text" name="WEmaxDays" value="<?php
    echo esc_attr(get_option('WEmaxDays'));
?>" />
				</h3>
				<hr />
				<h2 class="blue">Order Summary</h2>
				<p>This is the floating total found on the right side of the screen. </p>
				<h3>
						<label for="WE_order_summary_title">Title of Summary: </label>
						<input id="WE_order_summary_title" type="text" name="WE_order_summary_title" value="<?php
    echo esc_attr(get_option('WE_order_summary_title'));
?>" />
				</h3>
				<h3>
						<label for="WE_order_summary_date">Title for date: </label>
						<input id="WE_order_summary_date" type="text" name="WE_order_summary_date" value="<?php
    echo esc_attr(get_option('WE_order_summary_date'));
?>" />
				</h3>
				<h3>
						<label for="WE_order_summary_pages">Title for pages: </label>
						<input id="WE_order_summary_pages" type="text" name="WE_order_summary_pages" value="<?php
    echo esc_attr(get_option('WE_order_summary_pages'));
?>" />
				</h3>
				<h3>
						<label for="WE_order_summary_base">Title for base cost: </label>
						<input id="WE_order_summary_base" type="text" name="WE_order_summary_base" value="<?php
    echo esc_attr(get_option('WE_order_summary_base'));
?>" />
				</h3>
				<h3>
						<label for="WE_order_summary_CMS">Title for CMS: </label>
						<input id="WE_order_summary_CMS" type="text" name="WE_order_summary_CMS" value="<?php
    echo esc_attr(get_option('WE_order_summary_CMS'));
?>" />
				</h3>
				<h3>
						<label for="WE_order_summary_options">Title for site options: </label>
						<input id="WE_order_summary_options" type="text" name="WE_order_summary_options" value="<?php
    echo esc_attr(get_option('WE_order_summary_options'));
?>" />
				</h3>
				<h3>
						<label for="WE_order_summary_widgets">Title for widgets: </label>
						<input id="WE_order_summary_widgets" type="text" name="WE_order_summary_widgets" value="<?php
    echo esc_attr(get_option('WE_order_summary_widgets'));
?>" />
				</h3>
				<h3>
						<label for="WE_order_summary_total">Title for total: </label>
						<input id="WE_order_summary_total" type="text" name="WE_order_summary_total" value="<?php
    echo esc_attr(get_option('WE_order_summary_total'));
?>" />
				</h3>
				<hr />
				<h2 class="blue">General Payment Settings</h2>
				<h3> Would you like to turn off the payment gateway(s)? - some items may still need to be required but will never be used. For these items dummy information can be entered.<br />
						<input type="radio" name="WE_payment_hide" value="yes" id="WE_payment_hideYes"/>
						Yes
						<input type="radio" name="WE_payment_hide" id="WE_payment_hideNo" value="no" />
						No </h3>
				<h3>
						<label for="WE_paypal_item_name"> Item Name: </label>
						<input id="WE_paypal_item_name" type="text" name="WE_paypal_item_name" value="<?php
    echo esc_attr(get_option('WE_paypal_item_name'));
?>" />
				</h3>
				<h3>
						<label for="returnURL">Return URL after processing. </label>
						<input id="returnURL" type="text" name="returnURL" value="<?php
    echo esc_attr(get_option('returnURL'));
?>" />
				</h3>
				<h3>
						<label for="WE_currency_code">Currency Code: </label>
						<input id="WE_currency_code" type="text" name="WE_currency_code" value="<?php
    echo esc_attr(get_option('WE_currency_code'));
?>" />
						<a href="https://cms.paypal.com/us/cgi-bin/?cmd=_render-content&content_ID=developer/e_howto_api_nvp_currency_codes" target="_blank" style="font-size:12px;">List of possible PayPal currency codes</a> </h3>
				<h2 class="blue">PayPal Specific</h2>
				<h3> Do you want to hide PayPal?
						<input type="radio" name="WE_paypal_hide" value="yes" id="WE_paypal_hide_Yes"/>
						Yes
						<input type="radio" name="WE_paypal_hide" id="WE_paypal_hide_No" value="no" />
						No <br />
						<br />
						<label for="WE_paypal_email">PayPal Business Email: </label>
						<input id="WE_paypal_email" type="text" name="WE_paypal_email" value="<?php
    echo esc_attr(get_option('WE_paypal_email'));
?>" />
				</h3>
				<h3>
						<label for="WE_paypal_button_text">PayPal Button Name: </label>
						<input id="WE_paypal_button_text" type="text" name="WE_paypal_button_text" value="<?php
    echo esc_attr(get_option('WE_paypal_button_text'));
?>" />
				</h3>
				<h2 class="blue">Google Checkout Specific</h2>
				<h3> Do you want to hide Google Checkout?
						<input type="radio" name="WE_google_hide" value="yes" id="WE_google_hide_Yes"/>
						Yes
						<input type="radio" name="WE_google_hide" id="WE_google_hide_No" value="no" />
						No <br />
						<br />
						<label for="WE_google_merchant">Google Merchant Number: </label>
						<input id="WE_google_merchant" type="text" name="WE_google_merchant" value="<?php
    echo esc_attr(get_option('WE_google_merchant'));
?>" />
				</h3>
				<h3>
						<label for="WE_google_button">Google Button Name: </label>
						<input id="WE_google_button" type="text" name="WE_google_button" value="<?php
    echo esc_attr(get_option('WE_google_button'));
?>" />
				</h3>
				<hr />
				<h2 class="blue">Design</h2>
				<h3>Do you want to hide the design section?
						<input type="radio" name="WE_design_hide" value="yes" id="WE_design_hideYes"/>
						Yes
						<input type="radio" name="WE_design_hide" id="WE_design_hideNo" value="no" />
						No</h3>
				<h3>
						<label for="WE_design_title">Design Title: </label>
						<input id="WE_design_title" type="text" name="WE_design_title" value="<?php
    echo esc_attr(get_option('WE_design_title'));
?>" />
				</h3>
				<h3>
						<label for="WE_design_description">Design Description: </label>
						<input id="WE_design_description" type="text" name="WE_design_description" value="<?php
    echo esc_attr(get_option('WE_design_description'));
?>" />
				</h3>
				<h3>
						<label for="WE_design_amount">Price to create design: </label>
						<input id="WE_design_amount" type="text" name="WE_design_amount" value="<?php
    echo esc_attr(get_option('WE_design_amount'));
?>" />
				</h3>
				<h2 class="blue">If user chooses "Yes" to the design. There are 3 areas (1 input box and 2 text areas).</h2>
				<h3>
						<label for="WE_design_colors">Title for input box: (In example setup I asked what the primary colors of the site would be).</label>
						<input id="WE_design_colors" type="text" name="WE_design_colors" value="<?php
    echo esc_attr(get_option('WE_design_colors'));
?>" />
				</h3>
				<h3>
						<label for="WE_design_sampleSites">Title for text area: (In example setup I asked what some sample sites are that they like).</label>
						<input id="WE_design_sampleSites" type="text" name="WE_design_sampleSites" value="<?php
    echo esc_attr(get_option('WE_design_sampleSites'));
?>" />
				</h3>
				<h3>
						<label for="WE_design_specialInstructions">Title for text area: (In example its title is "Special Instructions").</label>
						<input id="WE_design_specialInstructions" type="text" name="WE_design_specialInstructions" value="<?php
    echo esc_attr(get_option('WE_design_specialInstructions'));
?>" />
				</h3>
				<hr />
				<h2 class="blue">Confirmation Email</h2>
				<h3>
						<label for="WE_yourMessage">Message to client on confirmation email: </label>
						<br />
						<textarea name="WE_yourMessage" cols="100" rows="4" id="WE_yourMessage" />
						<?php echo esc_attr(get_option('WE_yourMessage'));?>
						</textarea>
				</h3>
				<hr />
				<h2 class="blue">CMS</h2>
				<h3>Would you like to hide the CMS section?
						<input type="radio" name="WECMSHide" value="2" id="WEcmsHideYes"/>
						Yes
						<input type="radio" name="WECMSHide" id="WEcmsHideNo" value="0" />
						No</h3>
				<h3>
						<label for="WE_cms_title">CMS title: </label>
						<input id="WE_cms_title" type="text" name="WE_cms_title" value="<?php
    echo esc_attr(get_option('WE_cms_title'));
?>" />
				</h3>
				<h3>
						<label for="WE_cms_description">CMS Description: </label>
						<br />
						<textarea name="WE_cms_description" cols="100" rows="4" id="WE_cms_description" />
						<?php echo esc_attr(get_option('WE_cms_description'));?>
						</textarea>
				</h3>
				<p>If the user chooses to use a CMS this is how much you charge to configure and install that.</p>
				<h3>
						<label for="WE_CMS_none">No CMS Price: </label>
						<input id="WE_CMS_none" type="text" name="WE_CMS_none" value="<?php
    echo esc_attr(get_option('WE_CMS_none'));
?>" />
				</h3>
				<h3>
						<label for="WE_CMS_joomla">Joomla Price: </label>
						<input id="WE_CMS_joomla" type="text" name="WE_CMS_joomla" value="<?php
    echo esc_attr(get_option('WE_CMS_joomla'));
?>" />
				</h3>
				<h3>
						<label for="WE_CMS_wordpress">Wordpress Price: </label>
						<input id="WE_CMS_wordpress" type="text" name="WE_CMS_wordpress" value="<?php
    echo esc_attr(get_option('WE_CMS_wordpress'));
?>" />
				</h3>
				<h3>
						<label for="WE_CMS_drupal">Drupal Price: </label>
						<input id="WE_CMS_drupal" type="text" name="WE_CMS_drupal" value="<?php
    echo esc_attr(get_option('WE_CMS_drupal'));
?>" />
				</h3>
				<hr />
				<h2 class="blue">Extras</h2>
				<h3>Would you like to hide the extras section?
						<input type="radio" name="WEextraHide" value="1" id="WEextraHideYes" />
						Yes
						<input type="radio" name="WEextraHide" id="WEextraHideNo" value="0" />
						No</h3>
				<h3>
						<label for="WE_extra_title">Title for the Extra Section: </label>
						<input id="WE_extra_title" type="text" name="WE_extra_title" value="<?php
    echo esc_attr(get_option('WE_extra_title'));
?>" />
				</h3>
				<h3>
						<label for="WE_extra_description">Extra description: </label>
						<br />
						<textarea name="WE_extra_description" cols="100" rows="4" id="WE_extra_description" />
						<?php echo esc_attr(get_option('WE_extra_description'));?>
						</textarea>
				</h3>
				<h3>
						<label for="WEextra1Price">Extra Price 1: </label>
						<input id="WEextra1Price" type="text" name="WEextra1Price" value="<?php
    echo esc_attr(get_option('WEextra1Price'));
?>" />
						<label for="WEextra1TXT">Extra Text 1: </label>
						<input id="WEextra1TXT" type="text" name="WEextra1TXT" value="<?php
    echo esc_attr(get_option('WEextra1TXT'));
?>" />
						Hide:
						<input type="radio" name="WEextra1Hide" value="yes" id="WEextra1HideYes"/>
						Yes
						<input type="radio" name="WEextra1Hide" id="WEextra1HideNo" value="no" />
						No </h3>
				<h3>
						<label for="WEextra2Price">Extra Price 2: </label>
						<input id="WEextra2Price" type="text" name="WEextra2Price" value="<?php
    echo esc_attr(get_option('WEextra2Price'));
?>" />
						<label for="WEextra2TXT">Extra Text 2: </label>
						<input id="WEextra2TXT" type="text" name="WEextra2TXT" value="<?php
    echo esc_attr(get_option('WEextra2TXT'));
?>" />
						Hide:
						<input type="radio" name="WEextra2Hide" value="yes" id="WEextra2HideYes"/>
						Yes
						<input type="radio" name="WEextra2Hide" id="WEextra2HideNo" value="no" />
						No </h3>
				<h3>
						<label for="WEextra3Price">Extra Price 3: </label>
						<input id="WEextra3Price" type="text" name="WEextra3Price" value="<?php
    echo esc_attr(get_option('WEextra3Price'));
?>" />
						<label for="WEextra3TXT">Extra Text 3: </label>
						<input id="WEextra3TXT" type="text" name="WEextra3TXT" value="<?php
    echo esc_attr(get_option('WEextra3TXT'));
?>" />
						Hide:
						<input type="radio" name="WEextra3Hide" value="yes" id="WEextra3HideYes"/>
						Yes
						<input type="radio" name="WEextra3Hide" id="WEextra3HideNo" value="no" />
						No </h3>
				<h3>
						<label for="WEextra4Price">Extra Price 4: </label>
						<input id="WEextra4Price" type="text" name="WEextra4Price" value="<?php
    echo esc_attr(get_option('WEextra4Price'));
?>" />
						<label for="WEextra4TXT">Extra Text 4: </label>
						<input id="WEextra4TXT" type="text" name="WEextra4TXT" value="<?php
    echo esc_attr(get_option('WEextra4TXT'));
?>" />
						Hide:
						<input type="radio" name="WEextra4Hide" value="yes" id="WEextra4HideYes"/>
						Yes
						<input type="radio" name="WEextra4Hide" id="WEextra4HideNo" value="no" />
						No </h3>
				<h3>
						<label for="WEextra5Price">Extra Price 5: </label>
						<input id="WEextra5Price" type="text" name="WEextra5Price" value="<?php
    echo esc_attr(get_option('WEextra5Price'));
?>" />
						<label for="WEextra5TXT">Extra Text 5: </label>
						<input id="WEextra5TXT" type="text" name="WEextra5TXT" value="<?php
    echo esc_attr(get_option('WEextra5TXT'));
?>" />
						Hide:
						<input type="radio" name="WEextra5Hide" value="yes" id="WEextra5HideYes"/>
						Yes
						<input type="radio" name="WEextra5Hide" id="WEextra5HideNo" value="no" />
						No </h3>
				<h3>
						<label for="WEextra6Price">Extra Price 6: </label>
						<input id="WEextra6Price" type="text" name="WEextra6Price" value="<?php
    echo esc_attr(get_option('WEextra6Price'));
?>" />
						<label for="WEextra6TXT">Extra Text 6: </label>
						<input id="WEextra6TXT" type="text" name="WEextra6TXT" value="<?php
    echo esc_attr(get_option('WEextra6TXT'));
?>" />
						Hide:
						<input type="radio" name="WEextra6Hide" value="yes" id="WEextra6HideYes"/>
						Yes
						<input type="radio" name="WEextra6Hide" id="WEextra6HideNo" value="no" />
						No </h3>
				<h3>
						<label for="WEextra7Price">Extra Price 7: </label>
						<input id="WEextra7Price" type="text" name="WEextra7Price" value="<?php
    echo esc_attr(get_option('WEextra7Price'));
?>" />
						<label for="WEextra7TXT">Extra Text 7: </label>
						<input id="WEextra7TXT" type="text" name="WEextra7TXT" value="<?php
    echo esc_attr(get_option('WEextra7TXT'));
?>" />
						Hide:
						<input type="radio" name="WEextra7Hide" value="yes" id="WEextra7HideYes"/>
						Yes
						<input type="radio" name="WEextra7Hide" id="WEextra7HideNo" value="no" />
						No </h3>
				<h3>
						<label for="WEextra8Price">Extra Price 8: </label>
						<input id="WEextra8Price" type="text" name="WEextra8Price" value="<?php
    echo esc_attr(get_option('WEextra8Price'));
?>" />
						<label for="WEextra8TXT">Extra Text 8: </label>
						<input id="WEextra8TXT" type="text" name="WEextra8TXT" value="<?php
    echo esc_attr(get_option('WEextra8TXT'));
?>" />
						Hide:
						<input type="radio" name="WEextra8Hide" value="yes" id="WEextra8HideYes"/>
						Yes
						<input type="radio" name="WEextra8Hide" id="WEextra8HideNo" value="no" />
						No </h3>
				<h3>
						<label for="WEextra9Price">Extra Price 9: </label>
						<input id="WEextra9Price" type="text" name="WEextra9Price" value="<?php
    echo esc_attr(get_option('WEextra9Price'));
?>" />
						<label for="WEextra9TXT">Extra Text 9: </label>
						<input id="WEextra9TXT" type="text" name="WEextra9TXT" value="<?php
    echo esc_attr(get_option('WEextra9TXT'));
?>" />
						Hide:
						<input type="radio" name="WEextra9Hide" value="yes" id="WEextra9HideYes"/>
						Yes
						<input type="radio" name="WEextra9Hide" id="WEextra9HideNo" value="no" />
						No </h3>
				<h3>
						<label for="WEextra10Price">Extra Price 10: </label>
						<input id="WEextra10Price" type="text" name="WEextra10Price" value="<?php
    echo esc_attr(get_option('WEextra10Price'));
?>" />
						<label for="WEextra10TXT">Extra Text 10: </label>
						<input id="WEextra10TXT" type="text" name="WEextra10TXT" value="<?php
    echo esc_attr(get_option('WEextra10TXT'));
?>" />
						Hide:
						<input type="radio" name="WEextra10Hide" value="yes" id="WEextra10HideYes"/>
						Yes
						<input type="radio" name="WEextra10Hide" id="WEextra10HideNo" value="no" />
						No </h3>
				<hr />
				<h2 class="blue">Widgets</h2>
				<h3> Hide Widget 1:
						<input type="radio" name="WEwidgetHide1" value="yes" id="WEwidgetHide1Yes"/>
						Yes
						<input type="radio" name="WEwidgetHide1" id="WEwidgetHide1No" value="no" />
						No<br />
						<label for="WEwidgettitle1">Widget Title 1: </label>
						<input id="WEwidgettitle1" type="text" name="WEwidgettitle1" value="<?php
    echo esc_attr(get_option('WEwidgettitle1'));
?>" />
						<br />
						<label for="WEwidgetPrice1">Widget Price 1: </label>
						<input id="WEwidgetPrice1" type="text" name="WEwidgetPrice1" value="<?php
    echo esc_attr(get_option('WEwidgetPrice1'));
?>" />
						<br />
						<label for="WEwidgetTXT1">Widget Description 1: </label>
						<br />
						<textarea id="WEwidgetTXT1" cols="100" rows="4" name="WEwidgetTXT1"><?php echo esc_attr(get_option('WEwidgetTXT1'));
?></textarea>
						<br />
				</h3>
				<h3> Hide Widget 2:
						<input type="radio" name="WEwidgetHide2" value="yes" id="WEwidgetHide2Yes"/>
						Yes
						<input type="radio" name="WEwidgetHide2" id="WEwidgetHide2No" value="no" />
						No<br />
						<label for="WEwidgettitle2">Widget Title 2: </label>
						<input id="WEwidgettitle2" type="text" name="WEwidgettitle2" value="<?php echo esc_attr(get_option('WEwidgettitle2'));?>" />
						<br />
						<label for="WEwidgetPrice2">Widget Price 2: </label>
						<input id="WEwidgetPrice2" type="text" name="WEwidgetPrice2" value="<?php echo esc_attr(get_option('WEwidgetPrice2'));?>" />
						<br />
						<label for="WEwidgetTXT2">Widget Description 2: </label>
						<br />
						<textarea id="WEwidgetTXT2" cols="100" rows="4" name="WEwidgetTXT2"><?php echo esc_attr(get_option('WEwidgetTXT2'));?></textarea>
						<br />
				</h3>
				<h3> Hide Widget 3:
						<input type="radio" name="WEwidgetHide3" value="yes" id="WEwidgetHide3Yes"/>
						Yes
						<input type="radio" name="WEwidgetHide3" id="WEwidgetHide3No" value="no" />
						No<br />
						<label for="WEwidgettitle3">Widget Title 3: </label>
						<input id="WEwidgettitle3" type="text" name="WEwidgettitle3" value="<?php
    echo esc_attr(get_option('WEwidgettitle3'));
?>" />
						<br />
						<label for="WEwidgetPrice3">Widget Price 3: </label>
						<input id="WEwidgetPrice3" type="text" name="WEwidgetPrice3" value="<?php
    echo esc_attr(get_option('WEwidgetPrice3'));
?>" />
						<br />
						<label for="WEwidgetTXT3">Widget Description 3: </label>
						<br />
						<textarea id="WEwidgetTXT3" cols="100" rows="4" name="WEwidgetTXT3"><?php
    echo esc_attr(get_option('WEwidgetTXT3'));?>
</textarea>
						<br />
				</h3>
				<h3> Hide Widget 4:
						<input type="radio" name="WEwidgetHide4" value="yes" id="WEwidgetHide4Yes"/>
						Yes
						<input type="radio" name="WEwidgetHide4" id="WEwidgetHide4No" value="no" />
						No<br />
						<label for="WEwidgettitle4">Widget Title 4: </label>
						<input id="WEwidgettitle4" type="text" name="WEwidgettitle4" value="<?php
    echo esc_attr(get_option('WEwidgettitle4'));
?>" />
						<br />
						<label for="WEwidgetPrice4">Widget Price 4: </label>
						<input id="WEwidgetPrice4" type="text" name="WEwidgetPrice4" value="<?php echo esc_attr(get_option('WEwidgetPrice4'));
?>" />
						<br />
						<label for="WEwidgetTXT4">Widget Description 4: </label>
						<br />
						<textarea id="WEwidgetTXT4" cols="100" rows="4" name="WEwidgetTXT4"><?php echo esc_attr(get_option('WEwidgetTXT4'));?></textarea>
						<br />
				</h3>
				<h3> Hide Widget 5:
						<input type="radio" name="WEwidgetHide5" value="yes" id="WEwidgetHide5Yes"/>
						Yes
						<input type="radio" name="WEwidgetHide5" id="WEwidgetHide5No" value="no" />
						No<br />
						<label for="WEwidgettitle5">Widget Title 5: </label>
						<input id="WEwidgettitle5" type="text" name="WEwidgettitle5" value="<?php
    echo esc_attr(get_option('WEwidgettitle5'));
?>" />
						<br />
						<label for="WEwidgetPrice5">Widget Price 5: </label>
						<input id="WEwidgetPrice5" type="text" name="WEwidgetPrice5" value="<?php
    echo esc_attr(get_option('WEwidgetPrice5'));
?>" />
						<br />
						<label for="WEwidgetTXT5">Widget Description 5: </label>
						<br />
						<textarea id="WEwidgetTXT5" cols="100" rows="4" name="WEwidgetTXT5"><?php echo esc_attr(get_option('WEwidgetTXT5'));?></textarea>
						<br />
				</h3>
				<h3> Hide Widget 6:
						<input type="radio" name="WEwidgetHide6" value="yes" id="WEwidgetHide6Yes"/>
						Yes
						<input type="radio" name="WEwidgetHide6" id="WEwidgetHide6No" value="no" />
						No<br />
						<label for="WEwidgettitle6">Widget Title 6: </label>
						<input id="WEwidgettitle6" type="text" name="WEwidgettitle6" value="<?php echo esc_attr(get_option('WEwidgettitle6'));?>" />
						<br />
						<label for="WEwidgetPrice6">Widget Price 6: </label>
						<input id="WEwidgetPrice6" type="text" name="WEwidgetPrice6" value="<?php echo esc_attr(get_option('WEwidgetPrice6'));
?>" />
						<br />
						<label for="WEwidgetTXT6">Widget Description 6: </label>
						<br />
						<textarea id="WEwidgetTXT6" cols="100" rows="4" name="WEwidgetTXT6"><?php echo esc_attr(get_option('WEwidgetTXT6'));?></textarea>
						<br />
				</h3>
				<h3> Hide Widget 7:
						<input type="radio" name="WEwidgetHide7" value="yes" id="WEwidgetHide7Yes"/>
						Yes
						<input type="radio" name="WEwidgetHide7" id="WEwidgetHide7No" value="no" />
						No<br />
						<label for="WEwidgettitle7">Widget Title 7: </label>
						<input id="WEwidgettitle7" type="text" name="WEwidgettitle7" value="<?php
    echo esc_attr(get_option('WEwidgettitle7'));
?>" />
						<br />
						<label for="WEwidgetPrice7">Widget Price 7: </label>
						<input id="WEwidgetPrice7" type="text" name="WEwidgetPrice7" value="<?php
    echo esc_attr(get_option('WEwidgetPrice7'));
?>" />
						<br />
						<label for="WEwidgetTXT7">Widget Description 7: </label>
						<br />
						<textarea id="WEwidgetTXT7" cols="100" rows="4" name="WEwidgetTXT7"><?php echo esc_attr(get_option('WEwidgetTXT7'));?></textarea>
						<br />
				</h3>
				<h3> Hide Widget 8:
						<input type="radio" name="WEwidgetHide8" value="yes" id="WEwidgetHide8Yes"/>
						Yes
						<input type="radio" name="WEwidgetHide8" id="WEwidgetHide8No" value="no" />
						No<br />
						<label for="WEwidgettitle8">Widget Title 8: </label>
						<input id="WEwidgettitle8" type="text" name="WEwidgettitle8" value="<?php
    echo esc_attr(get_option('WEwidgettitle8'));
?>" />
						<br />
						<label for="WEwidgetPrice8">Widget Price 8: </label>
						<input id="WEwidgetPrice8" type="text" name="WEwidgetPrice8" value="<?php
    echo esc_attr(get_option('WEwidgetPrice8'));
?>" />
						<br />
						<label for="WEwidgetTXT8">Widget Description 8: </label>
						<br />
						<textarea id="WEwidgetTXT8" cols="100" rows="4" name="WEwidgetTXT8"><?php echo esc_attr(get_option('WEwidgetTXT8'));?></textarea>
						<br />
				</h3>
				<hr />
				<h2 class="blue">Contact Form</h2>
				<h3>
						<label for="WE_form_firstName">First Name Label: </label>
						<input id="WE_form_firstName" type="text" name="WE_form_firstName" value="<?php
    echo esc_attr(get_option('WE_form_firstName'));
?>" />
				</h3>
				<h3>
						<label for="WE_form_lastName">Last Name Label: </label>
						<input id="WE_form_lastName" type="text" name="WE_form_lastName" value="<?php
    echo esc_attr(get_option('WE_form_lastName'));
?>" />
				</h3>
				<h3>
						<label for="WE_form_phone">Phone # Label: </label>
						<input id="WE_form_phone" type="text" name="WE_form_phone" value="<?php
    echo esc_attr(get_option('WE_form_phone'));
?>" />
				</h3>
				<h3>
						<label for="WE_form_email">Email Label: </label>
						<input id="WE_form_email" type="text" name="WE_form_email" value="<?php
    echo esc_attr(get_option('WE_form_email'));
?>" />
				</h3>
				<h3>
						<label for="WE_form_address">Address Label: </label>
						<input id="WE_form_address" type="text" name="WE_form_address" value="<?php
    echo esc_attr(get_option('WE_form_address'));
?>" />
				</h3>
				<h3>
						<label for="WE_form_city">City Label: </label>
						<input id="WE_form_city" type="text" name="WE_form_city" value="<?php
    echo esc_attr(get_option('WE_form_city'));
?>" />
				</h3>
				<h3>
						<label for="WE_form_state">State Label: </label>
						<input id="WE_form_state" type="text" name="WE_form_state" value="<?php
    echo esc_attr(get_option('WE_form_state'));
?>" />
				</h3>
				<h3>
						<label for="WE_form_zip">Zip/Postal Label: </label>
						<input id="WE_form_zip" type="text" name="WE_form_zip" value="<?php
    echo esc_attr(get_option('WE_form_zip'));
?>" />
				</h3>
				<h3>
						<label for="WE_form_country">Country Label: </label>
						<input id="WE_form_country" type="text" name="WE_form_country" value="<?php
    echo esc_attr(get_option('WE_form_country'));
?>" />
				</h3>
				<hr />
				<input type="submit" value="Save" name="submit"/>
		</form>
</div>
<?php
    
    
    $errors = array();
	
	$WE_myEmail = get_option('WE_myEmail');
    
	//Section hides
    $WEpageHide     = get_option('WEpageHide');
    $WECMSHide      = get_option('WECMSHide');
    $WEextraHide    = get_option('WEextraHide');
    $WEdaysHide     = get_option('WEdaysHide');
    $WE_design_hide = get_option('WE_design_hide');
    
    //Extra Hides
    $WEextra1Price  = get_option('WEextra1Price');
    $WEextra2Price  = get_option('WEextra2Price');
    $WEextra3Price  = get_option('WEextra3Price');
    $WEextra4Price  = get_option('WEextra4Price');
    $WEextra5Price  = get_option('WEextra5Price');
    $WEextra6Price  = get_option('WEextra6Price');
    $WEextra7Price  = get_option('WEextra7Price');
    $WEextra8Price  = get_option('WEextra8Price');
    $WEextra9Price  = get_option('WEextra9Price');
    $WEextra10Price = get_option('WEextra10Price');
    
    $WEextra1TXT  = get_option('WEextra1TXT');
    $WEextra2TXT  = get_option('WEextra2TXT');
    $WEextra3TXT  = get_option('WEextra3TXT');
    $WEextra4TXT  = get_option('WEextra4TXT');
    $WEextra5TXT  = get_option('WEextra5TXT');
    $WEextra6TXT  = get_option('WEextra6TXT');
    $WEextra7TXT  = get_option('WEextra7TXT');
    $WEextra8TXT  = get_option('WEextra8TXT');
    $WEextra9TXT  = get_option('WEextra9TXT');
    $WEextra10TXT = get_option('WEextra10TXT');
    
    $WEextra1Hide  = get_option('WEextra1Hide');
    $WEextra2Hide  = get_option('WEextra2Hide');
    $WEextra3Hide  = get_option('WEextra3Hide');
    $WEextra4Hide  = get_option('WEextra4Hide');
    $WEextra5Hide  = get_option('WEextra5Hide');
    $WEextra6Hide  = get_option('WEextra6Hide');
    $WEextra7Hide  = get_option('WEextra7Hide');
    $WEextra8Hide  = get_option('WEextra8Hide');
    $WEextra9Hide  = get_option('WEextra9Hide');
    $WEextra10Hide = get_option('WEextra10Hide');
    
    $WEwidgetHide1 = get_option('WEwidgetHide1');
    $WEwidgetHide2 = get_option('WEwidgetHide2');
    $WEwidgetHide3 = get_option('WEwidgetHide3');
    $WEwidgetHide4 = get_option('WEwidgetHide4');
    $WEwidgetHide5 = get_option('WEwidgetHide5');
    $WEwidgetHide6 = get_option('WEwidgetHide6');
    $WEwidgetHide7 = get_option('WEwidgetHide7');
    $WEwidgetHide8 = get_option('WEwidgetHide8');
	
	
	$WEwidgetPrice1 = get_option('WEwidgetPrice1');
    $WEwidgetPrice2 = get_option('WEwidgetPrice2');
    $WEwidgetPrice3 = get_option('WEwidgetPrice3');
    $WEwidgetPrice4 = get_option('WEwidgetPrice4');
    $WEwidgetPrice5 = get_option('WEwidgetPrice5');
    $WEwidgetPrice6 = get_option('WEwidgetPrice6');
    $WEwidgetPrice7 = get_option('WEwidgetPrice7');
    $WEwidgetPrice8 = get_option('WEwidgetPrice8');
    
    $WEmaxDays = get_option('WEmaxDays');
	$WE_page_amount = get_option('WE_page_amount');
	 
    $WE_CMS_none  = get_option('WE_CMS_none');
    $WE_CMS_joomla = get_option('WE_CMS_joomla');
    $WE_CMS_wordpress = get_option('WE_CMS_wordpress');
    $WE_CMS_drupal = get_option('WE_CMS_drupal');
    
    $WE_design_amount= get_option('WE_design_amount');
	
	//date
	$WE_date_format= get_option('WE_date_format');
	
	
	//Google 
	$WE_google_hide = get_option('WE_google_hide');
	$WE_paypal_hide = get_option('WE_paypal_hide');
	
	  
	 	//Return URL
	$returnURL = get_option('returnURL'); 
	
	//Information submitted message
	$informationSubmitted = get_option('informationSubmitted');
	
	//Submit button title
	$WE_SB = get_option('WE_SB');
	
	//Hide payment Gateway
	$WE_payment_hide = get_option('WE_payment_hide');
	
	
	
    //erorr checking
if(strlen($WE_SB) <1){
	$errors[] = "The submission button title is required.";
	echo "<script>jQuery('#WE_SB').addClass('required');</script>";}

if(strlen($informationSubmitted) <1){
	$errors[] = "Message upon submission is required. This is the message the user will see once they have submitted the form.";
	echo "<script>jQuery('#informationSubmitted').addClass('required');</script>";}
	
if(strlen($returnURL) <1){
	$errors[] = "Return URL is required. You can just use your site address or create a new page.";
	echo "<script>jQuery('#returnURL').addClass('required');</script>";}	
    
if(strlen($WE_myEmail) <1){
	$errors[] = "Your email address is required. Please add it.";
	echo "<script>jQuery('#WE_myEmail').addClass('required');</script>";}	
	
if(strlen($WE_page_amount) > 0 && !is_numeric($WE_page_amount)){
	$errors[] = "The pages amount must be a numeric value.";
	echo "<script>jQuery('#WE_page_amount').addClass('required');</script>";}	
	
if(strlen($WE_design_amount) > 0 && !is_numeric($WE_design_amount)){
	$errors[] = "The design amount must be a numeric value.";
	echo "<script>jQuery('#WE_design_amount').addClass('required');</script>";}		
	
if(strlen($WEmaxDays) > 0 && !is_numeric($WEmaxDays) || $WEmaxDays==0){
	$errors[] = "Max days to reduce price must be a numeric value greater than 0.";
	echo "<script>jQuery('#WEmaxDays').addClass('required');</script>";}	
	
if(strlen($WE_CMS_none) > 0 && !is_numeric($WE_CMS_none) || strlen($WE_CMS_joomla) > 0 && !is_numeric($WE_CMS_joomla) || strlen($WE_CMS_wordpress) > 0 && !is_numeric($WE_CMS_wordpress) || strlen($WE_CMS_drupal) > 0 && !is_numeric($WE_CMS_drupal)){
	$errors[] = "CMS PRICES must be numeric values. They can\'t contain any other variables.";}	
	
if (strlen($WEwidgetPrice1) > 0 && !is_numeric($WEwidgetPrice1) || strlen($WEwidgetPrice2) > 0 && !is_numeric($WEwidgetPrice2) || strlen($WEwidgetPrice3) > 0 && !is_numeric($WEwidgetPrice3) || strlen($WEwidgetPrice4) > 0 && !is_numeric($WEwidgetPrice4)  || strlen($WEwidgetPrice5) > 0 && !is_numeric($WEwidgetPrice5) || strlen($WEwidgetPrice6) > 0 && !is_numeric($WEwidgetPrice6) || strlen($WEwidgetPrice7) > 0 && !is_numeric($WEwidgetPrice7) || strlen($WEwidgetPrice8) > 0 && !is_numeric($WEwidgetPrice8))
	{$errors[] = "Widget PRICES must be numeric values. They can\'t contain any other variables.";}
	
if (strlen($WEextra1Price) > 0 && !is_numeric($WEextra1Price) || strlen($WEextra2Price) > 0 && !is_numeric($WEextra2Price) || strlen($WEextra3Price) > 0 && !is_numeric($WEextra3Price) || strlen($WEextra4Price) > 0 && !is_numeric($WEextra4Price)  || strlen($WEextra5Price) > 0 && !is_numeric($WEextra5Price) || strlen($WEextra6Price) > 0 && !is_numeric($WEextra6Price) || strlen($WEextra7Price) > 0 && !is_numeric($WEextra7Price) || strlen($WEextra8Price) > 0 && !is_numeric($WEextra8Price) || strlen($WEextra9Price) > 0 && !is_numeric($WEextra9Price) || strlen($WEextra10Price) > 0 && !is_numeric($WEextra10Price))
	{$errors[] = "Extra PRICES must be numeric values. It can\'t contain any other variables.";}
	
if (count($errors) > 0) {	
	$reply = "";
    foreach ($errors as $issue)
        $reply .= "<li>" . $issue . "</li>";
    echo "<script>jQuery('#W_E_message').html('<div class=\"W_E_errors\">$reply</div>');</script>";
}
	
	 //check radio buttons	
	 
	 $WE_hide_cost = get_option('WE_hide_cost');
	 
	  if ($WE_hide_cost == 'yes') {
        echo "<script>jQuery('#WE_hide_cost_yes').attr('checked', 'checked');</script>";
    } else {
        echo "<script>jQuery('#WE_hide_cost_no').attr('checked', 'checked');</script>";
    }	
	 
	
	 if ($WE_payment_hide == 'yes') {
        echo "<script>jQuery('#WE_payment_hideYes').attr('checked', 'checked');</script>";
    } else {
        echo "<script>jQuery('#WE_payment_hideNo').attr('checked', 'checked');</script>";
    }	
	 
	   if ($WE_date_format == 'dd-mm-yy') {
        echo "<script>jQuery('#WE_date_format2').attr('checked', 'checked');</script>";
    } else {
        echo "<script>jQuery('#WE_date_format1').attr('checked', 'checked');</script>";
    }	
	
    if ($WEwidgetHide1 == 'yes') {
        echo "$WEextra1Price";
    } else {
        echo "<script>jQuery('#WEwidgetHide1No').attr('checked', 'checked');</script>";
    }
    
    if ($WEwidgetHide2 == 'yes') {
        echo "<script>jQuery('#WEwidgetHide2Yes').attr('checked', 'checked');</script>";
    } else {
        echo "<script>jQuery('#WEwidgetHide2No').attr('checked', 'checked');</script>";
    }
    
    if ($WEwidgetHide3 == 'yes') {
        echo "<script>jQuery('#WEwidgetHide3Yes').attr('checked', 'checked');</script>";
    } else {
        echo "<script>jQuery('#WEwidgetHide3No').attr('checked', 'checked');</script>";
    }
    
    if ($WEwidgetHide4 == 'yes') {
        echo "<script>jQuery('#WEwidgetHide4Yes').attr('checked', 'checked');</script>";
    } else {
        echo "<script>jQuery('#WEwidgetHide4No').attr('checked', 'checked');</script>";
    }
    
    if ($WEwidgetHide5 == 'yes') {
        echo "<script>jQuery('#WEwidgetHide5Yes').attr('checked', 'checked');</script>";
    } else {
        echo "<script>jQuery('#WEwidgetHide5No').attr('checked', 'checked');</script>";
    }
    
    if ($WEwidgetHide6 == 'yes') {
        echo "<script>jQuery('#WEwidgetHide6Yes').attr('checked', 'checked');</script>";
    } else {
        echo "<script>jQuery('#WEwidgetHide6No').attr('checked', 'checked');</script>";
    }
    
    if ($WEwidgetHide7 == 'yes') {
        echo "<script>jQuery('#WEwidgetHide7Yes').attr('checked', 'checked');</script>";
    } else {
        echo "<script>jQuery('#WEwidgetHide7No').attr('checked', 'checked');</script>";
    }
    
    if ($WEwidgetHide8 == 'yes') {
        echo "<script>jQuery('#WEwidgetHide8Yes').attr('checked', 'checked');</script>";
    } else {
        echo "<script>jQuery('#WEwidgetHide8No').attr('checked', 'checked');</script>";
    }
    
    
    if ($WE_design_hide == 'yes') {
        echo "<script>jQuery('#WE_design_hideYes').attr('checked', 'checked');</script>";
    } else {
        echo "<script>jQuery('#WE_design_hideNo').attr('checked', 'checked');</script>";
    }
    
    if ($WEpageHide == 'yes') {
        echo "<script>jQuery('#WEpageHideYes').attr('checked', 'checked');</script>";
    } else {
        echo "<script>jQuery('#WEpageHideNo').attr('checked', 'checked');</script>";
    }
    
    if ($WEdaysHide == 'yes') {
        echo "<script>jQuery('#WEdaysHideYes').attr('checked', 'checked');</script>";
    } else {
        echo "<script>jQuery('#WEdaysHideNo').attr('checked', 'checked');</script>";
    }
    
    //Extras section
    if ($WEextraHide == 1) {
        echo "<script>jQuery('#WEextraHideYes').attr('checked', 'checked');</script>";
    } else {
        echo "<script>jQuery('#WEextraHideNo').attr('checked', 'checked');</script>";
    }
    
    if ($WEextra1Hide == 'yes') {
        echo "<script>jQuery('#WEextra1HideYes').attr('checked', 'checked');</script>";
    } else {
        echo "<script>jQuery('#WEextra1HideNo').attr('checked', 'checked');</script>";
    }
    
    if ($WEextra2Hide == 'yes') {
        echo "<script>jQuery('#WEextra2HideYes').attr('checked', 'checked');</script>";
    } else {
        echo "<script>jQuery('#WEextra2HideNo').attr('checked', 'checked');</script>";
    }
    
    if ($WEextra3Hide == 'yes') {
        echo "<script>jQuery('#WEextra3HideYes').attr('checked', 'checked');</script>";
    } else {
        echo "<script>jQuery('#WEextra3HideNo').attr('checked', 'checked');</script>";
    }
    
    if ($WEextra4Hide == 'yes') {
        echo "<script>jQuery('#WEextra4HideYes').attr('checked', 'checked');</script>";
    } else {
        echo "<script>jQuery('#WEextra4HideNo').attr('checked', 'checked');</script>";
    }
    
    if ($WEextra5Hide == 'yes') {
        echo "<script>jQuery('#WEextra5HideYes').attr('checked', 'checked');</script>";
    } else {
        echo "<script>jQuery('#WEextra5HideNo').attr('checked', 'checked');</script>";
    }
    
    if ($WEextra6Hide == 'yes') {
        echo "<script>jQuery('#WEextra6HideYes').attr('checked', 'checked');</script>";
    } else {
        echo "<script>jQuery('#WEextra6HideNo').attr('checked', 'checked');</script>";
    }
    
    if ($WEextra7Hide == 'yes') {
        echo "<script>jQuery('#WEextra7HideYes').attr('checked', 'checked');</script>";
    } else {
        echo "<script>jQuery('#WEextra7HideNo').attr('checked', 'checked');</script>";
    }
    
    if ($WEextra8Hide == 'yes') {
        echo "<script>jQuery('#WEextra8HideYes').attr('checked', 'checked');</script>";
    } else {
        echo "<script>jQuery('#WEextra8HideNo').attr('checked', 'checked');</script>";
    }
    
    if ($WEextra9Hide == 'yes') {
        echo "<script>jQuery('#WEextra9HideYes').attr('checked', 'checked');</script>";
    } else {
        echo "<script>jQuery('#WEextra9HideNo').attr('checked', 'checked');</script>";
    }
    
    if ($WEextra10Hide == 'yes') {
        echo "<script>jQuery('#WEextra10HideYes').attr('checked', 'checked');</script>";
    } else {
        echo "<script>jQuery('#WEextra10HideNo').attr('checked', 'checked');</script>";
    }
    
    
    //CMS section
    if ($WECMSHide == 2) {
        echo "<script>jQuery('#WEcmsHideYes').attr('checked', 'checked');</script>";
    } else {
        echo "<script>jQuery('#WEcmsHideNo').attr('checked', 'checked');</script>";
    }
    
    
	 if ($WE_paypal_hide == 'yes') {
        echo "<script>jQuery('#WE_paypal_hide_Yes').attr('checked', 'checked');</script>";
    } else {
        echo "<script>jQuery('#WE_paypal_hide_No').attr('checked', 'checked');</script>";
    }
	
	
	 if ($WE_google_hide == 'yes') {
        echo "<script>jQuery('#WE_google_hide_Yes').attr('checked', 'checked');</script>";
    } else {
        echo "<script>jQuery('#WE_google_hide_No').attr('checked', 'checked');</script>";
    }
    
}

//Setings menu creation

function webEstimator_menu()
{
    add_options_page('Website Estimator Settings', 'Website Estimator', 'manage_options', 'web-estimator-plugin', 'webEstimator_admin_page');
    
}
add_action('admin_menu', 'webEstimator_menu');


/**
 * Registers new shortcodes.
 *
 */
function webEstimator_register_shortcodes()
{
    add_shortcode('webEstimator', 'website_estimator');
}

function website_estimator()
{
    //variables
    
    //main
	
	$WE_myEmail = get_option('WE_myEmail');
	
    $WE_page_amount = get_option('WE_page_amount');
    if (strlen($WE_page_amount) < 1) {
        $WE_page_amount = 0;
    }
    
    $WEpageHide = get_option('WEpageHide');
    $WEdaysHide = get_option('WEdaysHide');
    
    
    //Design
    $WE_design_hide        = get_option('WE_design_hide');
    $WE_design_title       = get_option('WE_design_title');
    $WE_design_description = get_option('WE_design_description');
    $WE_design_amount      = get_option('WE_design_amount');
    if (strlen($WE_design_amount) < 1) {
        $WE_design_amount = 0;
    }
    
    
    //paypal
    $WE_currency           = get_option('WE_currency');
    $WE_currency_code      = get_option('WE_currency_code');
    $WE_paypal_email       = get_option('WE_paypal_email');
    $WE_paypal_item_name   = get_option('WE_paypal_item_name');
    $WE_paypal_button_text = get_option('WE_paypal_button_text');
    $WE_phone_num          = get_option('WE_phone_num');
    
    
    //CMS 
    $WE_cms_title = get_option('WE_cms_title');
    $WECMSHide    = get_option('WECMSHide');
    $WE_CMS_none  = get_option('WE_CMS_none');
    if (strlen($WE_CMS_none) < 1) {
        $WE_CMS_none = 0;
    }
    $WE_CMS_joomla = get_option('WE_CMS_joomla');
    if (strlen($WE_CMS_joomla) < 1) {
        $WE_CMS_joomla = 0;
    }
    $WE_CMS_wordpress = get_option('WE_CMS_wordpress');
    if (strlen($WE_CMS_wordpress) < 1) {
        $WE_CMS_wordpress = 0;
    }
    $WE_CMS_drupal = get_option('WE_CMS_drupal');
    if (strlen($WE_CMS_drupal) < 1) {
        $WE_CMS_drupal = 0;
    }
    
    //widgets
    $WEwidgettitle1 = get_option('WEwidgettitle1');
    $WEwidgettitle2 = get_option('WEwidgettitle2');
    $WEwidgettitle3 = get_option('WEwidgettitle3');
    $WEwidgettitle4 = get_option('WEwidgettitle4');
    $WEwidgettitle5 = get_option('WEwidgettitle5');
    $WEwidgettitle6 = get_option('WEwidgettitle6');
    $WEwidgettitle7 = get_option('WEwidgettitle7');
    $WEwidgettitle8 = get_option('WEwidgettitle8');
    
    
    $WEwidgetTXT1 = get_option('WEwidgetTXT1');
    $WEwidgetTXT2 = get_option('WEwidgetTXT2');
    $WEwidgetTXT3 = get_option('WEwidgetTXT3');
    $WEwidgetTXT4 = get_option('WEwidgetTXT4');
    $WEwidgetTXT5 = get_option('WEwidgetTXT5');
    $WEwidgetTXT6 = get_option('WEwidgetTXT6');
    $WEwidgetTXT7 = get_option('WEwidgetTXT7');
    $WEwidgetTXT8 = get_option('WEwidgetTXT8');
    
    $WEwidgetHide1 = get_option('WEwidgetHide1');
    $WEwidgetHide2 = get_option('WEwidgetHide2');
    $WEwidgetHide3 = get_option('WEwidgetHide3');
    $WEwidgetHide4 = get_option('WEwidgetHide4');
    $WEwidgetHide5 = get_option('WEwidgetHide5');
    $WEwidgetHide6 = get_option('WEwidgetHide6');
    $WEwidgetHide7 = get_option('WEwidgetHide7');
    $WEwidgetHide8 = get_option('WEwidgetHide8');
    
    $WEwidgetPrice1 = get_option('WEwidgetPrice1');
    $WEwidgetPrice2 = get_option('WEwidgetPrice2');
    $WEwidgetPrice3 = get_option('WEwidgetPrice3');
    $WEwidgetPrice4 = get_option('WEwidgetPrice4');
    $WEwidgetPrice5 = get_option('WEwidgetPrice5');
    $WEwidgetPrice6 = get_option('WEwidgetPrice6');
    $WEwidgetPrice7 = get_option('WEwidgetPrice7');
    $WEwidgetPrice8 = get_option('WEwidgetPrice8');
    
    if (strlen($WEwidgetPrice1) < 1) {
        $WEwidgetPrice1 = 0;
    }
    if (strlen($WEwidgetPrice2) < 1) {
        $WEwidgetPrice2 = 0;
    }
    if (strlen($WEwidgetPrice3) < 1) {
        $WEwidgetPrice3 = 0;
    }
    if (strlen($WEwidgetPrice4) < 1) {
        $WEwidgetPrice4 = 0;
    }
    if (strlen($WEwidgetPrice5) < 1) {
        $WEwidgetPrice5 = 0;
    }
    if (strlen($WEwidgetPrice6) < 1) {
        $WEwidgetPrice6 = 0;
    }
    if (strlen($WEwidgetPrice7) < 1) {
        $WEwidgetPrice7 = 0;
    }
    if (strlen($WEwidgetPrice8) < 1) {
        $WEwidgetPrice8 = 0;
    }
	
    
	$WE_extra_title = get_option('WE_extra_title');
	$WE_extra_description = get_option('WE_extra_description');
	
    $WEextraHide = get_option('WEextraHide');
    
    $WEextra1Price  = get_option('WEextra1Price');
    $WEextra2Price  = get_option('WEextra2Price');
    $WEextra3Price  = get_option('WEextra3Price');
    $WEextra4Price  = get_option('WEextra4Price');
    $WEextra5Price  = get_option('WEextra5Price');
    $WEextra6Price  = get_option('WEextra6Price');
    $WEextra7Price  = get_option('WEextra7Price');
    $WEextra8Price  = get_option('WEextra8Price');
    $WEextra9Price  = get_option('WEextra9Price');
    $WEextra10Price = get_option('WEextra10Price');
    
    if (strlen($WEextra1Price) < 1) {
        $WEextra1Price = 0;
    }
    if (strlen($WEextra2Price) < 1) {
        $WEextra2Price = 0;
    }
    if (strlen($WEextra3Price) < 1) {
        $WEextra3Price = 0;
    }
    if (strlen($WEextra4Price) < 1) {
        $WEextra4Price = 0;
    }
    if (strlen($WEextra5Price) < 1) {
        $WEextra5Price = 0;
    }
    if (strlen($WEextra6Price) < 1) {
        $WEextra6Price = 0;
    }
    if (strlen($WEextra7Price) < 1) {
        $WEextra7Price = 0;
    }
    if (strlen($WEextra8Price) < 1) {
        $WEextra8Price = 0;
    }
    if (strlen($WEextra9Price) < 1) {
        $WEextra9Price = 0;
    }
    if (strlen($WEextra10Price) < 1) {
        $WEextra10Price = 0;
    }
    
    
    if (strlen($WEextra1Price) < 1) {
        $WEextra1Price = 0;
    }
    
    
    
    
    $WEextra1TXT  = get_option('WEextra1TXT');
    $WEextra2TXT  = get_option('WEextra2TXT');
    $WEextra3TXT  = get_option('WEextra3TXT');
    $WEextra4TXT  = get_option('WEextra4TXT');
    $WEextra5TXT  = get_option('WEextra5TXT');
    $WEextra6TXT  = get_option('WEextra6TXT');
    $WEextra7TXT  = get_option('WEextra7TXT');
    $WEextra8TXT  = get_option('WEextra8TXT');
    $WEextra9TXT  = get_option('WEextra9TXT');
    $WEextra10TXT = get_option('WEextra10TXT');
    
    $WEextra1Hide  = get_option('WEextra1Hide');
    $WEextra2Hide  = get_option('WEextra2Hide');
    $WEextra3Hide  = get_option('WEextra3Hide');
    $WEextra4Hide  = get_option('WEextra4Hide');
    $WEextra5Hide  = get_option('WEextra5Hide');
    $WEextra6Hide  = get_option('WEextra6Hide');
    $WEextra7Hide  = get_option('WEextra7Hide');
    $WEextra8Hide  = get_option('WEextra8Hide');
    $WEextra9Hide  = get_option('WEextra9Hide');
    $WEextra10Hide = get_option('WEextra10Hide');
    
    
    //Steps
    $WE_step1       = get_option('WE_step1');
    $WE_step2       = get_option('WE_step2');
    $WE_step3       = get_option('WE_step3');
    $WE_step4       = get_option('WE_step4');
    $WE_pages_title = get_option('WE_pages_title');
    $WE_days_title  = get_option('WE_days_title');
    
	
	//date
	$WE_date_format= get_option('WE_date_format');
	
	if (strlen($WE_date_format) < 1) {
        $WE_date_format = "mm-dd-yy";
    }
    
    //Descriptions
    $WE_intro           = get_option('WE_intro');
    $WE_cms_description = get_option('WE_cms_description');
    
    $WEmaxDays = get_option('WEmaxDays');
    if (strlen($WEmaxDays) < 1) {
        $WEmaxDays = 11;
    }
	
	//Message to client
	$WE_yourMessage = get_option('WE_yourMessage');
    
	
	//ORDER SUMMARY
	$WE_order_summary_title = get_option('WE_order_summary_title');
	$WE_order_summary_date =get_option('WE_order_summary_date');
	$WE_order_summary_pages =get_option('WE_order_summary_pages');
	$WE_order_summary_base =get_option('WE_order_summary_base');
	$WE_order_summary_CMS =get_option('WE_order_summary_CMS');
	$WE_order_summary_options =get_option('WE_order_summary_options');
	$WE_order_summary_widgets =get_option('WE_order_summary_widgets');
	$WE_order_summary_total =get_option('WE_order_summary_total');
	
	//Google Checkout
	$WE_google_merchant = get_option('WE_google_merchant');
	$WE_google_button = get_option('WE_google_button');
	
	
	//HIDE paypal/google
	$WE_google_hide = get_option('WE_google_hide');
	$WE_paypal_hide = get_option('WE_paypal_hide');
	
	//Return URL
	$returnURL = get_option('returnURL');
	
	
	//Information submitted message
	$informationSubmitted = get_option('informationSubmitted');
	
	
	//Submit button title
	$WE_SB = get_option('WE_SB');
	
	//Hide payment Gateway
	$WE_payment_hide = get_option('WE_payment_hide');
	
	//webEstimator Script
	$webEstimatorLink    = WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__)) . 'js/webEstimator.js';
	
	//CSS
	$masterCSS    = WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__)) . 'css/master.css';
	
	//Design Settings
	$WE_design_colors = get_option('WE_design_colors');
	$WE_design_sampleSites = get_option('WE_design_sampleSites');
	$WE_design_specialInstructions = get_option('WE_design_specialInstructions');
	
	//Form Titles
	$WE_form_firstName = get_option('WE_form_firstName');
	$WE_form_lastName = get_option('WE_form_lastName');
	$WE_form_phone = get_option('WE_form_phone');
	$WE_form_email = get_option('WE_form_email');
	$WE_form_address = get_option('WE_form_address');
	$WE_form_city = get_option('WE_form_city');
	$WE_form_state = get_option('WE_form_state');
	$WE_form_zip = get_option('WE_form_zip');
	$WE_form_country = get_option('WE_form_country');
	
	//Hide Costs
	$WE_hide_cost = get_option('WE_hide_cost');
	
    //images	 
    $plugin_dir_path_loader    = WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__)) . 'images/loader.png';
    $plugin_dir_path_none      = WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__)) . 'images/none.png';
    $plugin_dir_path_drupal    = WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__)) . 'images/drupal.png';
    $plugin_dir_path_wordpress = WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__)) . 'images/wordpress.png';
    $plugin_dir_path_joomla    = WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__)) . 'images/joomla.png';
    $plugin_dir_path_contact   = WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__)) . 'contact.php';
	
	
	 include 'estimator.php';

	//hide Google/Paypal
	if ($WE_google_hide == 'yes') {
        echo "<script>jQuery('#WE_googleCheckout').hide();</script>";
    }
    if ($WE_paypal_hide == 'yes') {
        echo "<script>jQuery('#payPalForm').hide();</script>";
    }
    
    //hide pages
    if ($WEpageHide == 'yes') {
        echo "<script>jQuery('.pages').hide();</script>";
    }
    if ($WEdaysHide == 'yes') {
        echo "<script>jQuery('.days').hide();</script>";
    }
    
    //Extra Section Hide
    if ($WEextraHide == 1) {
        echo "<script>jQuery('#W_E-extrasSection').hide();</script>";
    }
    
    
    //CMS section hide	
    if ($WECMSHide == 2) {
        echo "<script>jQuery('.W_E_CMS').hide();</script>";
    }
    
    //Hides
	
    
	if ($WE_hide_cost == 'yes') {
        echo "<script>jQuery('.W_E-Cost').hide();</script>";
    }
	
	
    if ($WEwidgetHide1 == 'yes') {
        echo "<script>jQuery('.WEwidget1').hide();</script>";
    }
    if ($WEwidgetHide2 == 'yes') {
        echo "<script>jQuery('.WEwidget2').hide();</script>";
    }
    if ($WEwidgetHide3 == 'yes') {
        echo "<script>jQuery('.WEwidget3').hide();</script>";
    }
    if ($WEwidgetHide4 == 'yes') {
        echo "<script>jQuery('.WEwidget4').hide();</script>";
    }
    if ($WEwidgetHide5 == 'yes') {
        echo "<script>jQuery('.WEwidget5').hide();</script>";
    }
    if ($WEwidgetHide6 == 'yes') {
        echo "<script>jQuery('.WEwidget6').hide();</script>";
    }
    if ($WEwidgetHide7 == 'yes') {
        echo "<script>jQuery('.WEwidget7').hide();</script>";
    }
    if ($WEwidgetHide8 == 'yes') {
        echo "<script>jQuery('.WEwidget8').hide();</script>";
    }

    if ($WE_design_hide == 'yes') {
        echo "<script>jQuery('.design').hide();</script>";
    }
    if ($WEextra1Hide == 'yes') {
        echo "<script>jQuery('#W_E-extra1, #W_E-extra1txt').hide();</script>";
    }
    if ($WEextra2Hide == 'yes') {
        echo "<script>jQuery('#W_E-extra2, #W_E-extra2txt').hide();</script>";
    }
    if ($WEextra3Hide == 'yes') {
        echo "<script>jQuery('#W_E-extra3, #W_E-extra3txt').hide();</script>";
    }
    if ($WEextra4Hide == 'yes') {
        echo "<script>jQuery('#W_E-extra4, #W_E-extra4txt').hide();</script>";
    }
    if ($WEextra5Hide == 'yes') {
        echo "<script>jQuery('#W_E-extra5, #W_E-extra5txt').hide();</script>";
    }
    if ($WEextra6Hide == 'yes') {
        echo "<script>jQuery('#W_E-extra6, #W_E-extra6txt').hide();</script>";
    }
    if ($WEextra7Hide == 'yes') {
        echo "<script>jQuery('#W_E-extra7, #W_E-extra7txt').hide();</script>";
    }
    if ($WEextra8Hide == 'yes') {
        echo "<script>jQuery('#W_E-extra8, #W_E-extra8txt').hide();</script>";
    }
    if ($WEextra9Hide == 'yes') {
        echo "<script>jQuery('#W_E-extra9, #W_E-extra9txt').hide();</script>";
    }
    if ($WEextra10Hide == 'yes') {
        echo "<script>jQuery('#W_E-extra10, #W_E-extra10txt').hide();</script>";
    }
    
}

?>
