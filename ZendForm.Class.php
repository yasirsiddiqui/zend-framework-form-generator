<?php

/**
 * Zend Form code Generator
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 */

include_once 'Zend_Form_Base_class.php';

Class ZendForm extends Zend_form_Base {
	
	/**
	 * Class constructor
	 *
	 * @param Class name $calssname    // Name of the class which will extend Zend_Form. You have to create object of this class when using form
	 *
	 * @param Form Method $formmethod  // Http method of the form i.e either POST or GET this will be populated as <form method="POST or GET">
	 *
	 * @param Form Action $formaction  // Controller on which form will be posted. This represents form action property i.e. <form action="contactuscontroller/contactusaction">
	 * 							       // If this value is left blank then form will be posted to the same contoller/action from which form object was created
	 *
	 * @param Attributes $attributes   // An array of form attirbutes like form name, form id, and enctype if form contains file upload field e.g. <form name='contactus' id='contctusid'> etc
	 *
	 */
	
	function __construct($calssname,$formmethod,$formaction,$attributes) {
		
		parent::__construct($calssname, $formmethod, $formaction, $attributes);	
	}
	
	/**
	 * Function addTextField
	 *
	 * Adds text field to the form
	 *
	 * @param Button name $fieldname        // $fieldname represents id,name html preperty of the submit button i.e <input type="text" id="buttonid">
	 *									    // $fieldname should be unique and should not be similar to any other form field id
	 *
	 * @param Field label $fieldlabel       // Field label that should appear to the right of the field
	 *
	 * @param Attributes $attributes        // An array of form attirbutes like filed name, css class  e.g. <input type="text" name='firstname' class='txtfield'> etc
	 *
	 * @param Filters array $filters        // Array of filters those should be applied to the field
	 *
	 * @param Validators array $validators  // Array of validators those should be applied to the filed
	 *
	 */
	
	function addTextField($fieldname, $fieldlabel, $attributes, $filters, $validators) {
		
		parent::addTextField($fieldname, $fieldlabel, $attributes, $filters, $validators);
	}
	
	/**
	 * Function addSubmitButton
	 *
	 * Adds Submit button to the form
	 *
	 * @param Button id $buttonid           // $buttonid represents id html preperty of the submit button i.e <input type="submit" id="buttonid">
	 *									    // $buttonid should be unique and should not be similar to any other form field id
	 *
	 * @param Title $title                  // Button title that should appear on button
	 *
	 */
	
	function addSubmitButton($buttonid,$title) {
		
		parent::addSubmitButton($buttonid,$title);
	}
	
	/**
	 * Function addButton
	 *
	 * Adds simple button to the form
	 *
	 * @param Button id $buttonid           // $buttonid represents id html preperty of the submit button i.e <input type="button" id="buttonid">
	 *									    // $buttonid should be unique and should not be similar to any other form field id
	 *
	 * @param Title $title                  // Button title that should appear on button
	 *
	 */
	
	public function addButton($buttonid,$title) {
		
		parent::addButton($buttonid,$title);
	}
	
	/**
	 * Function addFigletCaptcha
	 *
	 * Adds Figlet Captcha to the form
	 *
	 * @param Captch id $captchaid           // $captchaid represents id html preperty of the figlet captcha
	 *									     // $captchaid should be unique and should not be similar to any other form field id
	 *
	 * @param Captch Label $captchlabel      // Lable that should appear right before captch e.g. Are you human? Please verify
	 *
	 * @param Word length $wordlength        // Length of the word that will appear as captcha
	 *
	 * @param Error Message $errormessage    // Error message that should appear on the form when user gives wrong captcha value
	 *
	 * @param Time out $timeout              // Time in seconds upto  which captch should be valid.
	 *
	 */
	
	public function addFigletCaptcha($captchaid,$captchlabel, $wordlength,$errormessage,$timeout) {
		
		parent::addFigletCaptcha($captchaid,$captchlabel, $wordlength,$errormessage,$timeout);	
	}
	
	/**
	 * Function addImageCaptcha
	 *
	 * Adds Image Captcha to the form
	 *
	 * @param Captch id $captchaid           // $captchaid represents id html preperty of the figlet captcha
	 *									     // $captchaid should be unique and should not be similar to any other form field id
	 *
	 * @param Captch Label $captchlabel      // Lable that should appear right before captch e.g. Are you human? Please verify
	 *
	 * @param expiration time $expiration    // Time in seconds after which captcha will expire
	 *
	 * @param Word length $wordlength        // Length of the word that will appear as captcha
	 *
	 * @param Image width $imagewidth        // Captcha image width
	 *
	 * @param Image height $imageheight      // Captcha image height
	 *
	 * @param Error Message $errormessage    // Error message that should appear on the form when user gives wrong captcha value
	 *
	 * @param Font size $fontsize            // Font size of the captcha word
	 *
	 * @param Font name $fontname            // Path to the font file which should be used as font
	 *
	 * @param Image directory $imagedir      // Path to the directory where captcha images should be saved. he default is "./images/captcha/", relative to the bootstrap script.
	 *
	 * @param Image url $imageurl            // Path to a CAPTCHA image to use for HTML markup. The default is "/images/captcha/".
	 *
	 */
	
	public function addImageCaptcha($captchaid,$captchlabel,$expiration,$wordlength,$imagewidth,$imageheight,$errormessage,$fontsize,$fontname,$imagedir,$imageurl) {
		
		parent::addImageCaptcha($captchaid,$captchlabel,$expiration,$wordlength,$imagewidth,$imageheight,$errormessage,$fontsize,$fontname,$imagedir,$imageurl);	
	}
	
	/**
	 * Function addReCaptcha
	 *
	 * Adds Google Recaptcha to the form
	 *
	 * @param Captch id $captchaid           // $captchaid represents id html preperty of the figlet captcha
	 *									     // $captchaid should be unique and should not be similar to any other form field id
	 *
	 * @param Captch Label $captchlabel      // Lable that should appear right before captch e.g. Are you human? Please verify
	 *
	 * @param Public key $publickey          // Public key which you get from Google after sign up
	 *
	 * @param Private key $privatekey        // Private key which you get from Google after sign up
	 *
	 * @param Error Message $errormessage    // Error message that should appear on the form when user gives wrong captcha value
	 *
	 * @param Theme $theme                   // Captcha theme. Possible values are white,red
	 *
	 */
	
	public function addReCaptcha($captchaid,$captchlabel,$publickey,$privatekey,$errormessage,$theme="white") {
		
		parent::addReCaptcha($captchaid, $captchlabel, $publickey, $privatekey,$errormessage,$theme);
	}
	
	/**
	 * Function addCheckBox
	 *
	 * Adds check box to the form
	 *
	 * @param id $checboxid           		// $checboxid represents id html preperty of the submit button i.e <input type="checkbox" id="buttonid">
	 *									    // $checboxid should be unique and should not be similar to any other form field id
	 *
	 * @param Field label $label            // Field label that should appear to the right of the field
	 *
	 * @param Attributes $attributes        // An array of form attirbutes like filed name, css class  e.g. <input type="checkbox" class='checkbox'> etc
	 *
	 * @param Filters array $filter         // Array of filters those should be applied to the field
	 *
	 * @param Validators array $validators  // Array of validators those should be applied to the field
	 *
	 */
	
	public function addCheckBox($checboxid,$label,$attributes,$filters,$validators) {
		
		parent::addCheckBox($checboxid, $label, $attributes,$filters, $validators);
	}
	
	/**
	 * Function addMultiCheckBox
	 *
	 * Adds multiple check boxes to the form
	 *
	 * @param id $checboxid           		// $checboxid represents id html preperty of the submit button i.e <input type="checkbox" id="buttonid">
	 *									    // $checboxid should be unique and should not be similar to any other form field id
	 *
	 * @param Field label $label            // Field label that should appear to the right of the field
	 *
	 * @param Values $values                // Array of key value pairs for the checkboxes those should appear
	 *
	 * @param Attributes $attributes        // An array of form attirbutes like filed name, css class  e.g. <input type="checkbox" name='firstname' class='txtfield'> etc
	 *
	 * @param Filters array $filter         // Array of filters those should be applied to the field
	 *
	 * @param Validators array $validators  // Array of validators those should be applied to the field
	 *
	 */
	
	public function addMultiCheckBox($checboxid,$label,$values,$attributes,$filters,$validators) {
		
		parent::addMultiCheckBox($checboxid, $label, $values, $attributes,$filters, $validators);
	}
	
	/**
	 * Function addSelectField
	 *
	 * Adds Drop downs field to the  form
	 *
	 * @param id $filedid           		// $filedid represents id html preperty of the submit button i.e <input type="select" id="buttonid">
	 *									    // $filedid should be unique and should not be similar to any other form field id
	 *
	 * @param Field label $filedlabel       // Field label that should appear to the right of the field
	 *
	 * @param Values $values                // Array of key value pairs that will serve as values for the drop down
	 *
	 * @param Attributes $attributes        // An array of form attirbutes like filed name, css class  e.g. <input type="select" name='firstname' class='txtfield'> etc
	 *
	 * @param Filters array $filter         // Array of filters those should be applied to the field
	 *
	 * @param Validators array $validators  // Array of validators those should be applied to the field
	 *
	 */
	
	public function addSelectField($fieldid,$fieldlabel,$values,$attributes,$filters,$validators) {
		
		parent::addSelectField($fieldid, $fieldlabel, $values, $attributes,$filters ,$validators);
	}
	
	/**
	 * Function addMultiSelectField
	 *
	 * Adds Multi select Drop downs field to the  form
	 *
	 * @param id $filedid           		// $filedid represents id html preperty of the submit button i.e <input type="select" id="buttonid">
	 *									    // $filedid should be unique and should not be similar to any other form field id
	 *
	 * @param Field label $filedlabel       // Field label that should appear to the right of the field
	 *
	 * @param Values $values                // Array of key value pairs that will serve as values for the drop down
	 *
	 * @param Attributes $attributes        // An array of form attirbutes like filed name, css class  e.g. <input type="select" name='firstname' class='txtfield'> etc
	 *
	 * @param Filters array $filter         // Array of filters those should be applied to the field
	 *
	 * @param Validators array $validators  // Array of validators those should be applied to the field
	 *
	 */
	
	public function addMultiSelectField($fieldid,$fieldlabel,$values,$attributes,$filters,$validators) {
		
		parent::addMultiSelectField($fieldid, $fieldlabel, $values, $attributes,$filters ,$validators);
	}
	
	/**
	 * Function addFileUploadField
	 *
	 * Adds File upload field to the form
	 *
	 * @param Fieldid $filedid           	// $filedid represents id html preperty of the submit button i.e <input type="file" id="buttonid">
	 *									    // $filedid should be unique and should not be similar to any other form field id
	 *
	 * @param Field label $fieldlabel       // Field label that should appear to the right of the field
	 *
	 * @param File size $filesize           // Maximum file size in Bytes that can be uploaded
	 *
	 * @param File size error $filesizerror // Error message that should appear when uploaded file size exceeds the allowed file size
	 *
	 * @param File exteniosn $extensions    // Allowed file extenisons e.g. pdf,doc,docx
	 *
	 * @param Error $extensionserror        // Error message that should appear when file with dis allowed extenion is uploaded
	 *
	 * @param Destination $destination      // Path to the directory where uploaded file should be moved
	 *
	 * @param Validators $validators        // Array of validators those should be applied to the field
	 */
	
	public function addFileUploadField($fieldid,$fieldlabel,$filesize,$filesizerror,$extensions,$extensionserror,$destination,$validators) {
		
		parent::addFileUploadField($fieldid,$fieldlabel,$filesize,$filesizerror,$extensions,$extensionserror,$destination,$validators);
	}
	
	/**
	 * Function addHiddenField
	 *
	 * Adds hidden form filed
	 *
	 * @param id $filedid           		// $filedid represents id html preperty of the submit button i.e <input type="hidden" id="buttonid">
	 *									    // $filedid should be unique and should not be similar to any other form field id
	 *
	 * @param Field value $value            // Field value
	 *
	 * @param Attributes $attributes        // An array of form attirbutes like filed name, css class  e.g. <input type="hidden" name='firstname' class='txtfield'> etc
	 *
	 * @param Filters array $filter         // Array of filters those should be applied to the field
	 *
	 * @param Validators array $validators  // Array of validators those should be applied to the field
	 *
	 */
	
	public function addHiddenField($fieldid,$value,$attributes,$filter,$validators) {
		
		parent::addHiddenField($fieldid,$value,$attributes,$filter,$validators);
	}
	
	/**
	 * Function addHash
	 *
	 * Adds csrf Hash to the form to prevent CSRF attacks
	 *
	 * @param Fieldid $filedid           	// $filedid represents id html preperty of the submit button i.e <input type="hidden" id="buttonid">
	 *									    // $filedid should be unique and should not be similar to any other form field id
	 *
	 * @param Salt value $salt              // Salt that should be added. It is recommended to use the salt option for the element- two hashes with same names and different salts would not collide
	 *
	 * @param Time out $timeout        		// Time in seconds after which form will expire and needs to be reloaded again.
	 *
	 * @param Error Message $errormessage   // Error message that should appear there is CSRF attack
	 *
	 */
	
	public function addHash($fieldid,$salt,$timeout,$errormessage) {
		
		parent::addHash($fieldid, $salt, $timeout, $errormessage);
	}
	
	/**
	 * Function addImageField
	 *
	 * Adds Submit button with image on form
	 *
	 * @param Fieldid $filedid           	// $filedid represents id html preperty of the submit button i.e <input type="image" id="buttonid">
	 *									    // $filedid should be unique and should not be similar to any other form field id
	 *
	 * @param Image sourcs $imagesrc        // Path to the button image
	 *
	 * @param Attributes $attributes        // An array of form attirbutes like filed name, css class  e.g. <input type="image"  class='submit'> etc
	 *
	 */
	
	public function addImageField($fieldid,$imagesrc,$attributes) {
		
		parent::addImageField($fieldid,$imagesrc,$attributes);
		
	}
	
	/**
	 * Function addPasswordField
	 *
	 * Adds password field to the form
	 *
	 * @param Button name $fieldid          // $fieldid represents id,name html preperty of the submit button i.e <input type="password" id="buttonid">
	 *									    // $fieldid should be unique and should not be similar to any other form field id
	 *
	 * @param Field label $fieldlabel       // Field label that should appear to the right of the field
	 *
	 * @param Attributes $attributes        // An array of form attirbutes like filed name, css class  e.g. <input type="text" name='firstname' class='txtfield'> etc
	 *
	 * @param Filters array $filters        // Array of filters those should be applied to the field
	 *
	 * @param Validators array $validators  // Array of validators those should be applied to the filed
	 *
	 */
	
	public function addPasswordField($fieldid,$fieldlabel,$attributes,$filters,$validators) {
		
		parent::addPasswordField($fieldid, $fieldlabel, $attributes,$filters, $validators);
	}
	
	/**
	 * Function addRadioButton
	 *
	 * Adds Radio button to the form
	 *
	 * @param Button name $fieldid          // $fieldid represents id,name html preperty of the submit button i.e <input type="radio" id="buttonid">
	 *									    // $fieldid should be unique and should not be similar to any other form field id
	 *
	 * @param Field label $fieldlabel       // Field label that should appear to the right of the field
	 *
	 * @param Values $values  				// Array of key value pairs that will serve as values for the radio button
	 *
	 * @param Selected value $selectedvalue // Array of key value pairs that will serve as values for the radio button
	 *
	 * @param Attributes $attributes        // An array of form attirbutes like filed name, css class  e.g. <input type="text" name='firstname' class='txtfield'> etc
	 *
	 * @param Filters array $filters        // Array of filters those should be applied to the field
	 *
	 * @param Validators array $validators  // Array of validators those should be applied to the filed
	 *
	 */
	
	public function addRadioButton($fieldid, $fieldlabel,$values,$selectedvalue, $attributes,$filters, $validators) {
		
		parent::addRadioButton($fieldid, $fieldlabel, $values, $selectedvalue,$attributes, $filters, $validators);
	}
	
	/**
	 * Function addResetButton
	 *
	 * Adds Reset button to the form
	 *
	 * @param Button name $fieldid          // $fieldid represents id,name html preperty of the submit button i.e <input type="reset" id="buttonid">
	 *									    // $fieldid should be unique and should not be similar to any other form field id
	 *
	 * @param Field label $fieldtitle       // Button label that should on the button
	 *
	 * @param Attributes $attributes        // An array of form attirbutes like filed name, css class  e.g. <input type="reset" name='firstname' class='txtfield'> etc
	 *
	 */
	
	public function addResetButton($fieldid, $fieldtitle,$attributes) {
		
		parent::addResetButton($fieldid,$fieldtitle,$attributes);
	}
	
	/**
	 * Function addTextAreaField
	 *
	 * Adds Text area field to the  form
	 *
	 * @param id $fieldname           		// $fieldname represents id html preperty of the submit button
	 *									    // $fieldname should be unique and should not be similar to any other form field id
	 *
	 * @param Field label $filedlabel       // Field label that should appear to the right of the field
	 *
	 * @param Attributes $attributes        // An array of form attirbutes like filed name, css class  e.g. <textarea rows="10" cols="40" class='txtfield'> etc
	 *
	 * @param Filters array $filter         // Array of filters those should be applied to the field
	 *
	 * @param Validators array $validators  // Array of validators those should be applied to the field
	 *
	 */
	
	public function addTextAreaField($fieldname, $fieldlabel, $attributes, $filters, $validators) {
	
		parent::addTextAreaField($fieldname, $fieldlabel, $attributes, $filters, $validators);
	}
	 
	/**
	 * Function saveToFile
	 *
	 * Saves whole form code to the file
	 *
	 * @param File name $filename      // $filename Name of the file to save form code
	 *									    
	 */
	
	public function saveToFile($filename) {
		
		$classcode =  parent::getClassCode();
		$fp = fopen($filename, "w");
		if($fp) {
		
			fwrite($fp, $classcode);
			fclose($fp);
			return true;
		}
		else return false;
		
	}
}

