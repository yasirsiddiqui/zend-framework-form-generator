<?php
include_once 'ZendForm.Class.php';

// Don't forget to add this attribute if uploading file
$formattributes = array('id' =>'profilesubmission','enctype' => 'multipart/form-data'); 

$zendform = new ZendForm("SUbmitProfile", "POST", "", $formattributes);

$filters = array(HTML_ENTETIES_FILTER,STRING_TRIM,STRIP_TAGS);
$fieldattributes = array('id' =>'yourname','class' => 'textfield');

$notemptyvalidator = array('name' => NOT_EMPTY_VALIDATOR,'message' => "Please provide your First Name",'stopexecution' => "true");
$alphabetsvalidator = array('name' => ALPHABETS_VALIDATOR,'allowhitespaces' => 'true','message' => "First name can only contain Alphabets",'stopexecution' => "true");

/// Note order is important. Validators will run in the same order as pushed in the Array
$namevalidators = array($notemptyvalidator,$alphabetsvalidator);

/// Once form is valid get Name value as $form->getValue('yourname');
$zendform->addTextField("yourname", "Your Name:", $fieldattributes,$filters, $namevalidators);

$selectfiledvalidaoder = array('name' => NOT_EMPTY_VALIDATOR,'message' => "Please select your Gender",'stopexecution' => "true");

/// Value array must be in "Value shown to user" => "Backend value" format
$inarrayvalidator = array('name' => IN_ARRAY_VALIDATOR,'haystack' => array('MALE' => 'male' ,'FEMALE' => 'female'),'strict' => 'false','message'=>'Please provide a valid gender','stopexecution' => "true");

/// Note order is important. Validators will run in the same order as pushed in the Array
$countryvalidators = array($selectfiledvalidaoder,$inarrayvalidator);

/// Value array must be in "Backend value" => "Value shown to user" format
$values = array('' => 'Select Gender', 'male' => 'Male','female' => 'Female');

$filters = array(STRING_TRIM,HTML_ENTETIES_FILTER,STRIP_TAGS);
$zendform->addSelectField("country", "Select country", $values, array(),$filters, $countryvalidators);

$notempty = array('name' => NOT_EMPTY_VALIDATOR,'message' => "Enter your Age",'stopexecution' => "true");
$agevalidator = array('name' => DIGITS_VALIDATOR, 'message' => "Age can only contain digits",'stopexecution' => "true");

$allvalidators = array($notempty,$agevalidator);
$zendform->addTextField("age", "Your Age:", array(),array(), $allvalidators);

$floatvalidator = array('name' => FLOAT_VALIDATOR , 'message' => 'Height must be floating point number','stopexecution' => "true");
$notempty = array('name' => NOT_EMPTY_VALIDATOR,'message' => "Enter your Height",'stopexecution' => "true");

/// Note order is important. Validators will run in the same order as pushed in the Array
$allvalidators = array($notempty,$floatvalidator);

$zendform->addTextField("height", "Your Height:", array(),array(), $allvalidators);
/// Once form is valid get Name value as $form->getValue('height');

$checkboxvalidator = array('name' => NOT_EMPTY_VALIDATOR,'message' => "Please select your Nationality",'stopexecution' => "true");

/// Note order is important. Validators will run in the same order as pushed in the Array
$allvalidators = array($checkboxvalidator);
$filters = array(STRING_TRIM,HTML_ENTETIES_FILTER,STRIP_TAGS);

/// Values array must in the "check box backend value" => "Check box value shown to user" format
$values = array('us' => 'USA','ar' => 'Armenian','au' => 'Australian','be' => 'Belgian','gb' => 'Brithish');

$zendform->addMultiCheckBox("nationality", "Your Nationality", $values, array(), $filters, $allvalidators);

$notemptyvalidator = array('name' => NOT_EMPTY_VALIDATOR,'message' => "Please upload your pic",'stopexecution' => "true");
$all_validators = array($notemptyvalidator);
/// 1048576 bytes = 1 MB
$zendform->addFileUploadField("picture", "Upload your picture (png,jpg,jpeg)", 1048576, "Max file size allowed is 1 MB", "png,jpg,jpeg", "Upload file having extension png,jpg,jpeg", "./public/images", $all_validators);

$checkboxvalidator = array('name' => NOT_EMPTY_VALIDATOR,'message' => "You must agree our Terms and conditions",'stopexecution' => "false");
$allvalidators = array($checkboxvalidator);
$zendform->addCheckBox("checkbox", "Do you agree our trems and conditions", array(),array(), $allvalidators);

$zendform->addReCaptcha("googlecaptcha","Enter the code as shown","YOUR_PUBLIC_KEY","YOUR_PRIVATE_KEY","Provid valid captch code","white");

$zendform->addSubmitButton("submit", "Submit");
$zendform->saveToFile("./SubmitProfile.php");
