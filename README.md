zend-framework-form-generator
=============================

This class can generate complex code of Zend Framework forms version 1.12 using simple functions which class provides. 
You can add Zend Filters, Zend Validators by just writing one line of code and class will magically generate 
complex and lengthy Zend Form code with Validators and filters automatically applied thus saving lot of coding effort.

This class is simplified to this level that you can add any Zend Form Captcha with just one line of code and saves 
lot of coding effort.This class supports all Zend Form elements with almost every Zend validator and Zend filters.

Example
==========================
<pre><code>

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

$zendform->addFigletCaptcha("captcha", "Are You Human?", 8,"Invalid captch code please try again", 20);

$zendform->addHash("csrftokenfield", md5(uniqid(rand(), TRUE)), 300, "Form has timed out (probably), or you are attempting a cross-site request forgery. Please submit form again.");

$zendform->addSubmitButton("submit", "Submit");

$zendform->saveToFile("./ContactUs.php");
</code></pre>
