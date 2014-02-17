<?php

$errors = array();
$firstname = $_POST["firstName"];
$lastname  = $_POST["lastName"];
$email     = $_POST["email"];
$phone     = $_POST["billingPhone"];
$address   = $_POST["address"];
$city      = $_POST["city"];
$zip       = $_POST["zip"];
$country   = $_POST["country"];
$state     = $_POST["state"];

$WE_hide_cost= $_POST["WE_hide_cost"];

$informationSubmitted = $_POST["informationSubmitted"];
$WE_payment_hide = $_POST["WE_payment_hide"];


//Widget Title
$WEwidgettitle1 = $_POST["WE_widget_name_1"].":";
$WEwidgettitle2 = $_POST["WE_widget_name_2"].":";
$WEwidgettitle3 = $_POST["WE_widget_name_3"].":";
$WEwidgettitle4 = $_POST["WE_widget_name_4"].":";
$WEwidgettitle5 = $_POST["WE_widget_name_5"].":";
$WEwidgettitle6 = $_POST["WE_widget_name_6"].":";
$WEwidgettitle7 = $_POST["WE_widget_name_7"].":";
$WEwidgettitle8 = $_POST["WE_widget_name_8"].":";

//Your Message to client
$yourMessage = $_POST["WE_yourMessage"];

$total = $_POST["total"];

$myEmail = $_POST["WE_myEmail"];

//---------------------------
//YOUR EMAIL ADDRESS HERE:
//---------------------------
if ($WE_hide_cost=="yes"){
$to = $myEmail;
}
else{
$to = $myEmail . ", " . $email;
	}

$date   = $_POST["W_E-days"];
$pages  = $_POST["W_E-pages2"];
$cms    = $_POST["cms"];
$design = $_POST["designHidden"];


//COLORS
$colors = $_POST["colors"];

//Sites they like
$sitesLike = $_POST["sitesDescription"];

//Design instructions
$specialDesignInstructions = $_POST["specialDesignInstructions"];
//EXTRAS 

$WE_extra_title = $_POST["WE_extra_title"];
$extra1  = $_POST["W_E-extra1"];
$extra2  = $_POST["W_E-extra2"];
$extra3  = $_POST["W_E-extra3"];
$extra4  = $_POST["W_E-extra4"];
$extra5  = $_POST["W_E-extra5"];
$extra6  = $_POST["W_E-extra6"];
$extra7  = $_POST["W_E-extra7"];
$extra8  = $_POST["W_E-extra8"];
$extra9  = $_POST["W_E-extra9"];
$extra10 = $_POST["W_E-extra10"];


//Titles:
$WE_step1  = $_POST["WE_step1"];
$WE_step2  = $_POST["WE_step2"];
$WE_step3  = $_POST["WE_step3"];
$WE_step4  = $_POST["WE_step4"];
$WE_design_title  = $_POST["WE_design_title"];
$WE_order_summary_date  = $_POST["WE_order_summary_date"];
$WE_order_summary_title  = $_POST["WE_order_summary_title"];
$WE_pages_title  = $_POST["WE_pages_title"];
$WE_order_summary_CMS  = $_POST["WE_order_summary_CMS"];
$WE_order_summary_total  = $_POST["WE_order_summary_total"];


//Form values:
$WE_form_firstName  = $_POST["WE_form_firstName"];
$WE_form_lastName  = $_POST["WE_form_lastName"];
$WE_form_phone  = $_POST["WE_form_phone"];
$WE_form_email  = $_POST["WE_form_email"];
$WE_form_address  = $_POST["WE_form_address"];
$WE_form_city  = $_POST["WE_form_city"];
$WE_form_state  = $_POST["WE_form_state"];
$WE_form_zip  = $_POST["WE_form_zip"];
$WE_form_country  = $_POST["WE_form_country"];


//Widgets
$imgGallery  = $_POST["imgGalleryHidden"];
if (strlen($WEwidgettitle1) < 2) {
    $imgGallery = "";
	$WEwidgettitle1 ="";
}
$slideShow   = $_POST["slideShowHidden"];
if (strlen($WEwidgettitle2) < 2) {
    $slideShow = "";
	$WEwidgettitle2 ="";
}
$lightBox    = $_POST["lightboxHidden"];
if (strlen($WEwidgettitle3) < 2) {
    $lightBox  = "";
	$WEwidgettitle3 ="";
}
$shareThis   = $_POST["shareThisHidden"];
if (strlen($WEwidgettitle4) < 2) {
    $shareThis = "";
	$WEwidgettitle4 ="";
}
$carousel    = $_POST["carouselHidden"];
if (strlen($WEwidgettitle5) < 2) {
    $carousel = "";
	$WEwidgettitle5 ="";
}
$accordion   = $_POST["accordionHidden"];
if (strlen($WEwidgettitle6) < 2) {
    $accordion = "";
	$WEwidgettitle6 ="";
}
$customForms = $_POST["customFormsHidden"];
if (strlen($WEwidgettitle7) < 2) {
    $customForms = "";
	$WEwidgettitle7 ="";
}
$flyOutMenu  = $_POST["flyoutMenuHidden"];
if (strlen($WEwidgettitle8) < 2) {
    $flyOutMenu = "";
	$WEwidgettitle8 ="";
}

if (strlen($firstname) < 1) {
    $errors[] = "First name is required.";
}

if (strlen($lastname) < 1) {
    $errors[] = "Last name is required.";
}

if (strlen($email) < 1) {
    $errors[] = "Email is required.";
}

if (strlen($phone) < 1) {
    $errors[] = "Phone number is required.";
}


if (count($errors) == 0) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

$subject = "New website estimate: " . $firstname . " " . $lastname;
$message = "$yourMessage\r\n";
$message .= "----------------------------------\r\n";
$message .= "$WE_form_firstName $firstname\r\n"; 
$message .= "$WE_form_lastName $lastname\r\n"; 
$message .= "$WE_form_email $email\r\n"; 
$message .= "$WE_form_phone $phone\r\n"; 
$message .= "$WE_form_address $address\r\n"; 
$message .= "$WE_form_state $state\r\n"; 
$message .= "$WE_form_city $city\r\n"; 
$message .= "$WE_form_zip $zip\r\n"; 
$message .= "$WE_form_country $country\r\n"; 
$message .= "----------------------------------\r\n";
$message .= "$WE_order_summary_title\r\n";
$message .= "----------------------------------\r\n";
$message .= "$WE_order_summary_date $date\r\n"; 
$message .= "$WE_pages_title $pages\r\n"; 
$message .= "$WE_order_summary_CMS $cms\r\n"; 
$message .= "$WE_order_summary_total $total\r\n";
$message .= "----------------------------------\r\n";
$message .= "$WE_design_title $design\r\n";
$message .= "----------------------------------\r\n";
$message .= "$colors\r\n";
$message .= "$sitesLike\r\n";
$message .= "$specialDesignInstructions\r\n";
$message .= "----------------------------------\r\n";
$message .= "$WE_extra_title\r\n";
$message .= "----------------------------------\r\n";
$message .= "$extra1\r\n";
$message .= "$extra2\r\n";
$message .= "$extra3\r\n";
$message .= "$extra4\r\n";
$message .= "$extra5\r\n";
$message .= "$extra6\r\n";
$message .= "$extra7\r\n";
$message .= "$extra8\r\n";
$message .= "$extra9\r\n";
$message .= "$extra10\r\n";
$message .= "----------------------------------\r\n";
$message .= "$WE_step3\r\n";
$message .= "----------------------------------\r\n";
$message .= "$WEwidgettitle1 $imgGallery\r\n";
$message .= "$WEwidgettitle2 $slideShow\r\n";
$message .= "$WEwidgettitle3 $lightBox\r\n";
$message .= "$WEwidgettitle4 $shareThis\r\n";
$message .= "$WEwidgettitle5 $carousel\r\n";
$message .= "$WEwidgettitle6 $accordion\r\n";
$message .= "$WEwidgettitle7 $customForms\r\n";
$message .= "$WEwidgettitle8 $flyOutMenu";
$from    = $myEmail;
$headers = "From:" . $from;
$send_contact =mail($to,$subject,$message,$headers);

if ($send_contact) {
			if($WE_payment_hide=='yes'){
			 echo "
<div class='W_E_success'>$informationSubmitted</div>
<script type=\"text/javascript\">

jQuery('#W_E_TopMessage').show();
jQuery('#W_E_submit, #W_E_reset, #W_E-accordion, #W_E-floatingTotal').hide();
jQuery('#W_E-webEstimate input').each( function(){
jQuery(this).attr('disabled', 'disabled');});

</script>";
				
				}
			else{
            echo "
<div class='W_E_success'>$informationSubmitted</div>
<script type=\"text/javascript\">

jQuery('.payment, #W_E_TopMessage').show();
jQuery('#W_E_submit, #W_E_reset, #W_E-accordion, #W_E-floatingTotal').hide();
jQuery('#W_E-webEstimate input').each( function(){
jQuery(this).attr('disabled', 'disabled');});

</script>";
            }
        }
        
        else {
            echo "<div class='W_E_errors'>There was an error when trying to submit the form.</div>";
        }
        
    }
    
    else {
        echo "<div class='W_E_errors'>You have entered an invalid email address.</div>";
    }
    
    
    
}

//errors > 0		
else {
    $reply = "";
    foreach ($errors as $issue)
        $reply .= "<li>" . $issue . "</li>";
    echo "<div class='W_E_errors'>$reply</div>";
    
}

?>