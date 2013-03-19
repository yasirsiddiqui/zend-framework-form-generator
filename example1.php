<?php
include_once 'ZendForm.Class.php';

$formattributes = array('id' =>'contactusform');

$zendform = new ZendForm("ContactUS", "POST", "", $formattributes);

$filters = array(HTML_ENTETIES_FILTER,STRING_TRIM,STRIP_TAGS);
$fieldattributes = array('id' =>'yourname','class' => 'textfield');

$notemptyvalidator = array('name' => NOT_EMPTY_VALIDATOR,'message' => "Please provide your First Name",'stopexecution' => "true"); 
$alphabetsvalidator = array('name' => ALPHABETS_VALIDATOR,'allowhitespaces' => 'true','message' => "First name can only contain Alphabets",'stopexecution' => "true");

/// Note order is important. Validators will run in the same order as pushed in the Array
$namevalidators = array($notemptyvalidator,$alphabetsvalidator); 

/// Once form is valid get Name value as $form->getValue('yourname');
$zendform->addTextField("yourname", "Your Name:", $fieldattributes,$filters, $namevalidators);

$notemptyvalidator = array('name' => NOT_EMPTY_VALIDATOR,'message' => "Please provide your Email Address",'stopexecution' => "true");
$emailvalidator = array('name' => ENAILADDRESS_VALIDATOR,"message" => "Please provide a valid Email Address",'stopexecution' => "true" );
$filters = array(STRING_TRIM,HTML_ENTETIES_FILTER,STRING_TRIM,STRIP_TAGS);

/// Note order is important. Validators will run in the same order as pushed in the Array
$emailvalidators = array($notemptyvalidator,$emailvalidator);

$zendform->addTextField("emailaddress", "Your Email", array(), $filters, $emailvalidators);
/// Once form is valid get Name value as $form->getValue('emailaddress');

$notemptyvalidator = array('name' => NOT_EMPTY_VALIDATOR,'message' => "Please provide your Phone Number",'stopexecution' => "true");
$digitsvalidator = array('name' => DIGITS_VALIDATOR , 'message' => 'Phone number can only contain digits','stopexecution' => "true");
$filters = array(STRING_TRIM,HTML_ENTETIES_FILTER,STRIP_TAGS);

/// Note order is important. Validators will run in the same order as pushed in the Array
$phonevalidators = array($notemptyvalidator,$digitsvalidator);

$zendform->addTextField("phonenumber", "Your Phone Number", array(), $filters, $phonevalidators);
/// Once form is valid get Name value as $form->getValue('phonenumber');


$selectfiledvalidaoder = array('name' => NOT_EMPTY_VALIDATOR,'message' => "Please select a country",'stopexecution' => "true");

/// Value array must be in "Value shown to user" => "Backend value" format
$inarrayvalidator = array('name' => IN_ARRAY_VALIDATOR,'haystack' => array('USA' => 'usa' ,'Canada' => 'cancada','United Kingdom' => 'uk','Pakistan' => 'pakistan'),'strict' => 'false','message'=>'Invalid value for Country','stopexecution' => "true");

/// Note order is important. Validators will run in the same order as pushed in the Array
$countryvalidators = array($selectfiledvalidaoder,$inarrayvalidator);

/// Value array must be in "Backend value" => "Value shown to user" format
$values = array('' => 'Select Country', 'usa' => 'USA','cancada' => 'Canada','uk' => 'United Kingdom','pakistan' => 'Pakistan');

$filters = array(STRING_TRIM,HTML_ENTETIES_FILTER,STRIP_TAGS);
$zendform->addSelectField("country", "Select country", $values, array(),$filters, $countryvalidators);
/// Once form is valid get Name value as $form->getValue('country');

$commentsfiledvalidator = array('name' => NOT_EMPTY_VALIDATOR,'message' => "Please provide your comments",'stopexecution' => "true");
$stringlengthvalidator = array('name'=>STRING_LENGTH_VALIDATOR,'message'=>"Comments can have minimum lenght of length of 10 characters and maximum lenght of 60 characters.",'max'=>60,'min' => 10,'stopexecution' => "true");

/// Note order is important. Validators will run in the same order as pushed in the Array
$validators = array($commentsfiledvalidator,$stringlengthvalidator);
$filters = array(STRING_TRIM,HTML_ENTETIES_FILTER,STRIP_TAGS);
$attributes = array('rows' => 10, 'cols' => 50 ,'size' => 70);

$zendform->addTextAreaField("comments", "Your Comments", $attributes, $filters, $validators);
/// Once form is valid get Name value as $form->getValue('comments');

$zendform->addFigletCaptcha("captcha", "Are You Human?", 8,"Invalid captch code please try again", 20);

$zendform->addHash("csrftokenfield", md5(uniqid(rand(), TRUE)), 300, "Form has timed out (probably), or you are attempting a cross-site request forgery. Please submit form again.");

$zendform->addSubmitButton("submit", "Submit");

$zendform->saveToFile("./ContactUs.php");

