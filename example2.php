<?php
include_once 'ZendForm.Class.php';

$formattributes = array('id' =>'submitresume','enctype' => 'multipart/form-data'); // Don't forget to add this attribute if uploading file

$zendform = new ZendForm("SubmitResume", "POST", "", $formattributes);

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

/// Value array must be in "Value shown to user" => "Backend value"
$inarrayvalidator = array('name' => IN_ARRAY_VALIDATOR,'haystack' => array('Male' => 'm' ,'Female' => 'f'),'strict' => 'false','message'=>'Invalid value for Gender','stopexecution' => "true");
$values = array('m' => 'Male' ,'f' => 'Female');

/// Note order is important. Validators will run in the same order as pushed in the Array
$genedervalidators = array($inarrayvalidator);
$zendform->addRadioButton("radiobutton", "Gender:", $values,'m', array(), array(), $genedervalidators);
/// Once form is valid get Name value as $form->getValue('radiobutton');


$notemptyvalidator = array('name' => NOT_EMPTY_VALIDATOR,'message' => "Please provide your Date of Birth",'stopexecution' => "true");

/// list of supported locales can be viewed at http://framework.zend.com/manual/1.12/en/zend.locale.appendix.html
$dobvalidator = array('name' => DATE_VALIDATOR,'format' =>'dd/mm/YYYY','locale' => 'en_US', 'message' => 'Please provide a valid date','stopexecution' => "true");

/// Note order is important. Validators will run in the same order as pushed in the Array
$datevalidators = array($notemptyvalidator,$dobvalidator);

$zendform->addTextField("dob", "Date of Birth: (dd/mm/YYYY)", array(), array(), $datevalidators);
/// Once form is valid get Name value as $form->getValue('dob');

$notemptyvalidator = array('name' => NOT_EMPTY_VALIDATOR,'message' => "Please select atleast one programming language",'stopexecution' => "true");

/// Value array must be in "Value shown to user" => "Backend value" format
$inarrayvalidator = array('name' => IN_ARRAY_VALIDATOR,'haystack' => array('RUBY' => 'ruby' ,'JAVA' => 'java','PHP' => 'php', 'PERL' => 'perl','ASP' => 'asp'),'strict' => 'false','message'=>'Invalid value for Skills','stopexecution' => "true");

$skillsvalidator = array($notemptyvalidator,$inarrayvalidator);

/// Values array must in the "drop down backend value" => "Value shown to user" format
$values = array('ruby' => 'RUBY', 'java' => 'JAVA', 'php' => 'PHP','perl' => 'PERL', 'asp' => 'ASP');
$filters = array(STRING_TRIM,HTML_ENTETIES_FILTER,STRING_TRIM,STRIP_TAGS);

$attributes = array('style' => 'width:300px;');
$zendform->addMultiSelectField("skills", "Your Programing Skills", $values, $attributes, $filters, $skillsvalidator);
/// Once form is valid get Name value as $form->getValue('skills');

$notemptyvalidator = array('name' => NOT_EMPTY_VALIDATOR,'message' => "Please upload your resume",'stopexecution' => "true");
$all_validators = array($notemptyvalidator);

/// 1048576 bytes = 1 MB
$zendform->addFileUploadField("cv", "Upload your resume (pdf,doc,docx)", 1048576, "Max file size allowed is 1 MB", "pdf,doc,docx", "Upload file having extension pdf,doc,docx", "./public/images", $all_validators);

$zendform->addImageCaptcha("Imagecaptcha", "Enter the text below", 30, 8, 200, 50,"Please provide valid image code",20,"C:/Windows/Fonts/arial.ttf","./public/images/captcha","/zfonepointtwelveforms/public/images/captcha");

$zendform->addSubmitButton("submit", "Submit");
$zendform->saveToFile("./SubmitResume.php");

