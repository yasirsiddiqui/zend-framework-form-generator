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

////// Constants for form Validators

/// For more information on Zend Validators visit http://framework.zend.com/manual/1.12/en/zend.validate.set.html

define("ALPHA_NUMERIC_VALIDATOR", "alpha_numeric"); /// Allows you to validate if a given value contains only alphabetical characters and digits
define("ALPHABETS_VALIDATOR", "alphabets");         /// Allows you to validate if a given value contains only alphabetical characters
define("IN_BETWEEN_VALIDATOR", "in_between");       /// Allows you to validate if a given value is between two other values
define("CREDITCARD_VALIDATOR","creditcard");		/// Allows you to validate if a given value could be a credit card number
define("DATE_VALIDATOR","date");					/// Allows you to validate if a given value contains a date. List of supported locales http://framework.zend.com/manual/1.12/en/zend.locale.appendix.html
define("DB_RECORD_EXSITS_VALIDATOR","db_record_exsists");  /// Provides a means to test whether a record exists in a given table of a database, with a given value
define("DB_NO_RECORD_EXSITS_VALIDATOR","db_no_record_exsists");   /// Provides a means to test whether a record does not exist in a given table of a database, with a given value
define("DIGITS_VALIDATOR", "digits");				/// Validates if a given value contains only digits
define("ENAILADDRESS_VALIDATOR", "emailaddress");	/// Allows you to validate an email address
define("FLOAT_VALIDATOR","float");                  /// Allows you to validate if a given value contains a floating-point value
define("GREATER_THAN_VALIDATOR","greaterthan");     /// Allows you to validate if a given value is greater than a minimum border value
define("HEXADECIMAL_VALIDATOR","hexadecimal");		/// Allows you to validate if a given value contains only hexadecimal characters
define("HOSTNAME_VALIDATOR", "hostname");			/// Allows you to validate a hostname against a set of known specifications
define("INTER_BANK_ACCOUNT_VALIDATOR","inter_bank_account");    /// Validates if a given value could be a IBAN number. IBAN is the abbreviation for "International Bank Account Number".
define("INTEGER_VALIDATOR", "integer");				/// Validates if a given value is an integer
define("IP_ADDRESS_VALIDATOR", "ip_address");		/// Allows you to validate if a given value is an IP address
define("ISBN_VALIDATOR", "isbn");					/// Allows you to validate an ISBN-10 or ISBN-13 value
define("LESSTHAN_VALIDATOR", "lessthan");			/// Allows you to validate if a given value is less than a maximum border value
define("NOT_EMPTY_VALIDATOR", "not_epmty");			/// Allows you to validate if a given value is not empty
define("REGEXP_VALIDATOR", "regexp");				/// Allows you to validate if a given string conforms a defined regular expression
define("STRING_LENGTH_VALIDATOR", "string_length"); /// Allows you to validate if a given string is between a defined length
define("IN_ARRAY_VALIDATOR","in_array");            /// Allows you to validate if a given value is contained within an array
///// End of constants for form Validators

////// Constants for form Filters

/// For more information on Zend Filters visit http://framework.zend.com/manual/1.12/en/zend.filter.set.html

define("ALPHA_NUMERIC_FILTER", "alpha_numeric_filter");  /// Filter which returns only alphabetic characters and digits. All other characters are supressed
define("ALPHABETS_FILTER", "alphabets_filter"); 		 /// Filter which returns the string $value, removing all but alphabetic characters
define("DIGITS_FILTER", "digits_filter");                /// Returns the string value, removing all but digits
define("HTML_ENTETIES_FILTER", "html_entities_filter");  /// Returns the string value, converting characters to their corresponding HTML entity equivalents where they exist.
define("INTEGER_FILTER", "integer_filter");              /// Allows you to transform a sclar value which contains into an integer.
define("STRING_TRIM", "string_trim_filter");			 /// This filter modifies a given string such that certain characters are removed from the beginning and end
define("STRIP_NEW_LINES", "strip_new_lines_filter");     /// This filter modifies a given string and removes all new line characters within that string.
define("STRIP_TAGS", "strip_tags_filter");				 /// This filter can strip XML and HTML tags from given content

///// End of Constants for form Filters

Class Zend_form_Base {
	
	private $classcode;
	
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
		
		$this->classcode = "";
		
		$this->classcode.= $this->addClassBeginCode($calssname, $formaction, $formmethod, $attributes);
	}
	
	/**
	 * Function addClassBeginCode
	 *
	 * @param Class name $calssname    // Name of the class which will extend Zend_Form. You have to create object of this class when using form
	 *
	 * @param Form Action $action      // Controller on which form will be posted. This represents form action property i.e. <form action="contactuscontroller/contactusaction">
	 * 							       // If this value is left blank then form will be posted to the same contoller/action from which form object was created
	 * 
	 * @param Form Method $formmethod  // Http method of the form i.e either POST or GET this will be populated as <form method="POST or GET">
	 * 
	 * @param Attributes $attributes   // An array of form attirbutes like form name, form id, and enctype if form contains file upload field e.g. <form name='contactus' id='contctusid'> etc
	 * 							   
	 */
	
	private function addClassBeginCode($classname,$action,$formmethod,$attributes) {
		
		$classcode = "<?php ".PHP_EOL." Class ".$classname.' extends Zend_Form { '. PHP_EOL. PHP_EOL .' public function __construct($options = null)'.PHP_EOL.' {'. PHP_EOL .' parent::__construct($options); '. PHP_EOL .' $this->setAction(\''.$action.'\');'. PHP_EOL .' $this->setMethod("'.$formmethod.'");'. PHP_EOL .'';
		
		foreach ($attributes as $key => $value) {
			
			$classcode.= ' $this->setAttrib("'.$key.'","'.$value.'");'. PHP_EOL .'';
		}
		
		$this->classcode.= $classcode;
	}
	
	/**
	 * Function addClassEndCode
	 * Adds ending closing brackets to the class
	 */
	
	private function addClassEndCode() {
		
		$this->classcode.="}". PHP_EOL ."}";
	}
	
	/**
	 * Function addValidators
	 * 
	 * Adds validtors to a form field. All validators are defined above
	 * 
	 * @param Field $field                       // Field on which validator should be applied
	 * 
	 * @param Validators array $validatorsarray  // Array of validators which should be applied on a form field
	 */
	
	private function addValidators ($field,$validatorsarray) {
		
		$validatorcode = "";

		if(is_array($validatorsarray)) {
			
			foreach ($validatorsarray as $validator) {
				
				if($validator['name']==ALPHA_NUMERIC_VALIDATOR) {
					
					$validatorcode.=''. PHP_EOL .' $validator = new Zend_Validate_Alnum(array("allowWhiteSpace" =>'.$validator['allowhitespaces'].'));'. PHP_EOL .'';
					$validatorcode.=' $validator->setMessage("'.$validator['message'].'");'. PHP_EOL .'';
					$addtofield = " ".$field.'->addValidator($validator,'.$validator['stopexecution'].');'. PHP_EOL .'';
					$validatorcode.= $addtofield;	
				}
				else if($validator['name']==ALPHABETS_VALIDATOR) {
					
					$validatorcode.=''. PHP_EOL .' $validator = new Zend_Validate_Alpha(array("allowWhiteSpace" => '.$validator['allowhitespaces'].'));'. PHP_EOL .'';
					$validatorcode.=' $validator->setMessage("'.$validator['message'].'");'. PHP_EOL .'';
					$addtofield = " ".$field.'->addValidator($validator,'.$validator['stopexecution'].');'. PHP_EOL .'';
					$validatorcode.= $addtofield;
				}
				else if($validator['name']==IN_BETWEEN_VALIDATOR) {
				
					$validatorcode.=''. PHP_EOL .' $validator = new Zend_Validate_Between(array("min"=>'.$validator['min'].',"max"=>'.$validator['max'].'));'. PHP_EOL .'';
					$validatorcode.=' $validator->setMessage("'.$validator['message'].'");'. PHP_EOL .'';
					$addtofield = " ".$field.'->addValidator($validator,'.$validator['stopexecution'].');'. PHP_EOL;
					$validatorcode.= $addtofield;
				}
				else if($validator['name']==CREDITCARD_VALIDATOR) {
				
					$validatorcode.=''. PHP_EOL .' $validator = new Zend_Validate_CreditCard();'. PHP_EOL .'';
					$validatorcode.=' $validator->setMessage("'.$validator['message'].'");'. PHP_EOL .'';
					$addtofield = " ".$field.'->addValidator($validator,'.$validator['stopexecution'].');'. PHP_EOL .'';
					$validatorcode.= $addtofield;
				}
				else if($validator['name']==DATE_VALIDATOR) {
				
					// List of supported locale http://framework.zend.com/manual/1.12/en/zend.locale.appendix.html
					
					$validatorcode.=''. PHP_EOL .' $validator = new Zend_Validate_Date(array("locale" => "'.$validator['locale'].'"));'. PHP_EOL .'';
					$validatorcode.=' $validator->setFormat("'.$validator['format'].'");';
					$validatorcode.=' $validator->setMessage("'.$validator['message'].'");'. PHP_EOL .'';
					$addtofield = " ".$field.'->addValidator($validator,'.$validator['stopexecution'].');'. PHP_EOL .'';
					$validatorcode.= $addtofield;
				}
				else if($validator['name']==DB_RECORD_EXSITS_VALIDATOR) {
				
					$validatorcode.=''. PHP_EOL .' $validator = new new Zend_Validate_Db_RecordExists(array("table" => "'.$validator['tablename'].'","field" => "'.$validator['fieldname'].'"));'. PHP_EOL .'';
					$validatorcode.=' $validator->setMessage("'.$validator['message'].'");'. PHP_EOL .'';
					$addtofield = " ".$field.'->addValidator($validator,'.$validator['stopexecution'].');'. PHP_EOL .'';
					$validatorcode.= $addtofield;
				}
				else if($validator['name']==DB_NO_RECORD_EXSITS_VALIDATOR) {
				
					$validatorcode.=''. PHP_EOL .' $validator = new new Zend_Validate_Db_NoRecordExists(array("table" => "'.$validator['tablename'].'","field" => "'.$validator['fieldname'].'"));'. PHP_EOL .'';
					$validatorcode.=' $validator->setMessage("'.$validator['message'].'");'. PHP_EOL .'';
					$addtofield = " ".$field.'->addValidator($validator,'.$validator['stopexecution'].');'. PHP_EOL .'';
					$validatorcode.= $addtofield;
				}
				else if($validator['name']==DIGITS_VALIDATOR) {
				
					$validatorcode.=''. PHP_EOL .' $validator = new Zend_Validate_Digits();'. PHP_EOL .'';
					$validatorcode.=' $validator->setMessage("'.$validator['message'].'");'. PHP_EOL .'';
					$addtofield = " ".$field.'->addValidator($validator,'.$validator['stopexecution'].');'. PHP_EOL .'';
					$validatorcode.= $addtofield;
				}
				else if($validator['name']==ENAILADDRESS_VALIDATOR) {
				
					$validatorcode.=''. PHP_EOL .' $validator = new Zend_Validate_EmailAddress();'. PHP_EOL .'';
					$validatorcode.=' $validator->setMessage("'.$validator['message'].'");'. PHP_EOL .'';
					$addtofield = " ".$field.'->addValidator($validator,'.$validator['stopexecution'].');'. PHP_EOL .'';
					$validatorcode.= $addtofield;
				}
				else if($validator['name']==FLOAT_VALIDATOR) {
				
					$validatorcode.=''. PHP_EOL .' $validator = new Zend_Validate_Float();'. PHP_EOL .'';
					$validatorcode.=' $validator->setMessage("'.$validator['message'].'");'. PHP_EOL .'';
					$addtofield = " ".$field.'->addValidator($validator,'.$validator['stopexecution'].');'. PHP_EOL .'';
					$validatorcode.= $addtofield;
				}
				else if($validator['name']==GREATER_THAN_VALIDATOR) {
				
					$validatorcode.=''. PHP_EOL .' $validator = new Zend_Validate_GreaterThan(array("min" => "'.$validator['min'].'"));'. PHP_EOL .'';
					$validatorcode.=' $validator->setMessage("'.$validator['message'].'");'. PHP_EOL .'';
					$addtofield = " ".$field.'->addValidator($validator,'.$validator['stopexecution'].');'. PHP_EOL .'';
					$validatorcode.= $addtofield;
				}
				else if($validator['name']==HEXADECIMAL_VALIDATOR) {
				
					$validatorcode.=''. PHP_EOL .' $validator = new Zend_Validate_Hex();'. PHP_EOL .'';
					$validatorcode.=' $validator->setMessage("'.$validator['message'].'");'. PHP_EOL .'';
					$addtofield = " ".$field.'->addValidator($validator,'.$validator['stopexecution'].');'. PHP_EOL .'';
					$validatorcode.= $addtofield;
				}
				else if($validator['name']==HOSTNAME_VALIDATOR) {
				
					$validatorcode.=''. PHP_EOL .' $validator = new Zend_Validate_Hostname();'. PHP_EOL .'';
					$validatorcode.=' $validator->setMessage("'.$validator['message'].'");'. PHP_EOL .'';
					$addtofield = " ".$field.'->addValidator($validator,'.$validator['stopexecution'].');'. PHP_EOL .'';
					$validatorcode.= $addtofield;
				}
				else if($validator['name']==INTER_BANK_ACCOUNT_VALIDATOR) {
				
					$validatorcode.=''. PHP_EOL .' $validator = new Zend_Validate_Iban();'. PHP_EOL .'';
					$validatorcode.=' $validator->setMessage("'.$validator['message'].'");'. PHP_EOL .'';
					$addtofield = " ".$field.'->addValidator($validator,'.$validator['stopexecution'].');'. PHP_EOL .'';
					$validatorcode.= $addtofield;
				}
				else if($validator['name']==INTEGER_VALIDATOR) {
				
					$validatorcode.=''. PHP_EOL .' $validator = new Zend_Validate_Int();'. PHP_EOL .'';
					$validatorcode.=' $validator->setMessage("'.$validator['message'].'");'. PHP_EOL .'';
					$addtofield = " ".$field.'->addValidator($validator,'.$validator['stopexecution'].');'. PHP_EOL .'';
					$validatorcode.= $addtofield;
				}
				else if($validator['name']==IP_ADDRESS_VALIDATOR) {
				
					$validatorcode.=''. PHP_EOL .' $validator = new Zend_Validate_Ip();'. PHP_EOL .'';
					$validatorcode.=' $validator->setMessage("'.$validator['message'].'");'. PHP_EOL .'';
					$addtofield = " ".$field.'->addValidator($validator,'.$validator['stopexecution'].');'. PHP_EOL .'';
					$validatorcode.= $addtofield;
				}
				else if($validator['name']==ISBN_VALIDATOR) {
				
					$validatorcode.=''. PHP_EOL .' $validator = new Zend_Validate_Isbn();'. PHP_EOL .'';
					$validatorcode.=' $validator->setMessage("'.$validator['message'].'");'. PHP_EOL .'';
					$addtofield = " ".$field.'->addValidator($validator,'.$validator['stopexecution'].');'. PHP_EOL .'';
					$validatorcode.= $addtofield;
				}
				else if($validator['name']==LESSTHAN_VALIDATOR) {
				
					$validatorcode.=''. PHP_EOL .' $validator = new Zend_Validate_LessThan(array("max" => "'.$validator['max'].'"));'. PHP_EOL .'';
					$validatorcode.=' $validator->setMessage("'.$validator['message'].'");'. PHP_EOL .'';
					$addtofield = " ".$field.'->addValidator($validator,'.$validator['stopexecution'].');'. PHP_EOL .'';
					$validatorcode.= $addtofield;
				}
				else if($validator['name']==NOT_EMPTY_VALIDATOR) {
					
					$addtofield = "";
					
					if($field=='$fileelement') {
						
						$addtofield = " ".$field.'->setRequired(true);'. PHP_EOL;
						$addtofield.= " ".$field.'->getValidator("Upload")->setMessage("'.$validator['message'].'",Zend_Validate_File_Upload::NO_FILE);'. PHP_EOL;	
					}
					
					else {
					
						$validatorcode.=''. PHP_EOL .' $validator = new Zend_Validate_NotEmpty();'. PHP_EOL .'';
						$validatorcode.=' $validator->setMessage("'.$validator['message'].'");'. PHP_EOL .'';
						$addtofield = " ".$field.'->addValidator($validator,'.$validator['stopexecution'].');'. PHP_EOL .'';
						$addtofield.= " ".$field.'->setRequired(true);'. PHP_EOL;
						
						if($field=='$checkbox') {
							
							$addtofield.= " ".$field."->setUncheckedValue('');";
						}	
					}
					
					$validatorcode.= $addtofield;
					
				}
				else if($validator['name']==REGEXP_VALIDATOR) {
				
					$validatorcode.=''. PHP_EOL .' $validator = new Zend_Validate_Regex(array("pattern" => "'.$validator['pattern'].'"));'. PHP_EOL .'';
					$validatorcode.=' $validator->setMessage("'.$validator['message'].'");'. PHP_EOL .'';
					$addtofield = " ".$field.'->addValidator($validator,'.$validator['stopexecution'].');'. PHP_EOL .'';
					$validatorcode.= $addtofield;
				}
				else if($validator['name']==STRING_LENGTH_VALIDATOR) {
				
					$validatorcode.=''. PHP_EOL .' $validator = new Zend_Validate_StringLength(array("min" => '.$validator['min'].', "max" => '.$validator['max'].'));'. PHP_EOL .'';
					$validatorcode.=' $validator->setMessage("'.$validator['message'].'");'. PHP_EOL .'';
					$addtofield = " ".$field.'->addValidator($validator,'.$validator['stopexecution'].');'. PHP_EOL .'';
					$validatorcode.= $addtofield;
				}
				else if($validator['name']==IN_ARRAY_VALIDATOR) {
					
					$validatorcode.=''. PHP_EOL .' $validator = new Zend_Validate_InArray(array("strict" =>'.$validator['strict'].'));'. PHP_EOL .'';
					
					$string = "";
					foreach ($validator['haystack'] as $key => $value) {
						
						$string.= "'".$key."'" ." => '".$value."' ,"; 
					}
					
					$haystrackstring = 'array('.$string.')';
					$validatorcode.= ' $validator->setHaystack('.$haystrackstring.');'. PHP_EOL ;
					$validatorcode.= ' $validator->setStrict('.$validator['strict'].');'. PHP_EOL ;
					
					$validatorcode.=' $validator->setMessage("'.$validator['message'].'");'. PHP_EOL .'';
					$addtofield = " ".$field.'->addValidator($validator,'.$validator['stopexecution'].');'. PHP_EOL .'';
					$validatorcode.= $addtofield;
				}
				
			}
		}
		
		return $validatorcode;	
	}
	
	/**
	 * Function addFilters
	 *
	 * Adds filters to a form field. All filters are defined above
	 *
	 * @param Field $field                 // Field on which filter should be applied
	 *
	 * @param Filters array $filtersarray  // Array of filters which should be applied on a form field
	 * 
	 */
	
	
	private function addFilters($field,$filtersarray) {
		
		$filtercode = "";
		
		if(is_array($filtersarray)) {
		
			foreach ($filtersarray as $filter) {
				
				if($filter==ALPHA_NUMERIC_FILTER) {
					
					$filtercode.= PHP_EOL .' $filter = new Zend_Filter_Alnum();'. PHP_EOL .'';
					$addtofield = " ".$field.'->addFilter($filter);'. PHP_EOL .'';
					$filtercode.= $addtofield;
				}
				else if($filter==ALPHABETS_FILTER) {
					
					$filtercode.= PHP_EOL .' $filter = new Zend_Filter_Alpha();'. PHP_EOL .'';
					$addtofield = " ".$field.'->addFilter($filter);'. PHP_EOL .'';
					$filtercode.= $addtofield;
				}
				else if($filter==DIGITS_FILTER) {
				
					$filtercode.= PHP_EOL. ' $filter = new Zend_Filter_Digits();'. PHP_EOL .'';
					$addtofield = " ".$field.'->addFilter($filter);'. PHP_EOL .'';
					$filtercode.= $addtofield;
				}
				else if($filter==HTML_ENTETIES_FILTER) {
				
					$filtercode.= PHP_EOL .' $filter = new Zend_Filter_HtmlEntities();'. PHP_EOL .'';
					$addtofield = " ".$field.'->addFilter($filter);'. PHP_EOL .'';
					$filtercode.= $addtofield;
				}
				else if($filter==INTEGER_FILTER) {
				
					$filtercode.= PHP_EOL .' $filter = new Zend_Filter_Int();'. PHP_EOL .'';
					$addtofield = " ".$field.'->addFilter($filter);'. PHP_EOL .'';
					$filtercode.= $addtofield;
				}
				else if($filter==STRING_TRIM) {
				
					$filtercode.= PHP_EOL .' $filter = new Zend_Filter_StringTrim();'. PHP_EOL .'';
					$addtofield = " ".$field.'->addFilter($filter);'. PHP_EOL .'';
					$filtercode.= $addtofield;
				}
				else if($filter==STRIP_NEW_LINES) {
				
					$filtercode.= PHP_EOL .' $filter = new Zend_Filter_StripNewLines();'. PHP_EOL .'';
					$addtofield = " ".$field.'->addFilter($filter);'. PHP_EOL .'';
					$filtercode.= $addtofield;
				}
				else if($filter==STRIP_TAGS) {
				
					$filtercode.= PHP_EOL .' $filter = new Zend_Filter_StripTags();'. PHP_EOL .'';
					$addtofield = " ".$field.'->addFilter($filter);'. PHP_EOL .'';
					$filtercode.= $addtofield;
				}
				
			}
		}
		
		return $filtercode;
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
	
	public function addSubmitButton($buttonid,$title) {
		
		$submitbuttoncode = PHP_EOL;
		$submitbuttoncode.= ' $submitbutton = new Zend_Form_Element_Submit("'.$buttonid.'");'. PHP_EOL;
		$submitbuttoncode.= ' $submitbutton->setLabel("'.$title.'");'. PHP_EOL;
		$submitbuttoncode.= $this->addToForm('$submitbutton');
		
		$this->classcode.= $submitbuttoncode;
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
		
		$buttoncode = PHP_EOL;
		$buttoncode.= ' $button = new Zend_Form_Element_Button("'.$buttonid.'");'. PHP_EOL;
		$buttoncode.= ' $button->setLabel("'.$title.'");'. PHP_EOL;
		$buttoncode.= $this->addToForm('$button');
		
		$this->classcode.= $buttoncode;
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
	
	
	public function addFigletCaptcha($captchaid,$captchlabel,$wordlength,$errormessage,$timeout) {
		
		$captchcode = PHP_EOL;
		$captchcode.= ' $captcha = new Zend_Form_Element_Captcha("'.$captchaid.'", array(
		"label" => "'.$captchlabel.'",
		"captcha" => array(
		"captcha" => "Figlet",
		"wordLen" => '.$wordlength.',
		"timeout" => '.$timeout.',
		"messages" => array(
        "badCaptcha" => "'.$errormessage.'")
		),
		));'. PHP_EOL;
		
		$captchcode.= $this->addToForm('$captcha');
		$this->classcode.= $captchcode;
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
	
		$fontstring =  PHP_EOL;
		if(!is_null($fontname)) {
			
			$fontstring.= '"font"      => "'.$fontname.'",';
		}
		
		$imagedirstring = "";
		if(!is_null($imagedirstring)) {
		
			$imagedirstring.= '"imgDir"      => "'.$imagedir.'",';
		}
		
		$imgurlstring = "";
		if(!is_null($imgurlstring)) {
		
			$imgurlstring.= '"imgUrl"      => "'.$imageurl.'",';
		}
		
		$captchcode = PHP_EOL;
		$captchcode.= ' $captcha = new Zend_Form_Element_Captcha("'.$captchaid.'", array(
		"label"     => "'.$captchlabel.'",
		"captcha"   => array(
		"captcha"   => "Image", 
		"wordLen"   => '.$wordlength.',       
		"width"     => '.$imagewidth.',    
		"height"    => '.$imageheight.',
		"fontSize"  => '.$fontsize.',     
		"expiration"=> '.$expiration.','.$fontstring.' '.$imagedirstring.' '.$imgurlstring.' 
		"gcFreq"    => 5,
		"messages" => array(
        "badCaptcha" => "'.$errormessage.'")       
		),
		));'. PHP_EOL;
		
		$captchcode.= $this->addToForm('$captcha');
		$this->classcode.= $captchcode;
	
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
		
		$captchcode = PHP_EOL;
		$captchcode = ' $recaptcha = new Zend_Service_ReCaptcha("'.$publickey.'","'.$privatekey.'",NULL, array("theme" => "'.$theme.'"));'.PHP_EOL;
		$captchcode.= '
		$captcha = new Zend_Form_Element_Captcha("'.$captchaid.'",
		array(
		"label" => "'.$captchlabel.'",
		"captcha" =>  "ReCaptcha",
		"captchaOptions"        => array(
		"service" => $recaptcha,
		"messages" => array(
        "badCaptcha" => "'.$errormessage.'") 
		)
		)
		);'. PHP_EOL;
		
		$captchcode.= $this->addToForm('$captcha');
		$this->classcode.= $captchcode;
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
	
	
	public function addTextField($fieldname, $fieldlabel, $attributes, $filters, $validators) {
		
		$textfiledcode = PHP_EOL;
		$textfiledcode.= ' $text_filed = new Zend_Form_Element_Text(\''.$fieldname."');". PHP_EOL;
		$textfiledcode.= ' $text_filed->setLabel(\''.$fieldlabel."');". PHP_EOL ;
		
		foreach ($attributes as $key => $value) {
		
			$textfiledcode.= ' $text_filed->setAttrib("'.$key.'","'.$value.'");'. PHP_EOL .'';
		}
		
		$textfiledcode.= $this->addValidators('$text_filed', $validators);
		$textfiledcode.= $this->addFilters('$text_filed', $filters);
		$textfiledcode.= $this->addToForm('$text_filed');
		
		$this->classcode.= $textfiledcode;
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
	
	public function addHiddenField($filedid,$value,$attributes,$filter,$validators) {
		
		$hiddenfiledcode = PHP_EOL;
		$hiddenfiledcode.= ' $hidden_filed = new Zend_Form_Element_Hidden(\''.$filedid."');". PHP_EOL;
		$hiddenfiledcode.= ' $hidden_filed->setValue("'.$value.'");'. PHP_EOL;
		
		foreach ($attributes as $key => $value) {
		
			$hiddenfiledcode.= ' $hidden_filed->setAttrib("'.$key.'","'.$value.'");'. PHP_EOL .'';
		}
		
		$hiddenfiledcode.= $this->addValidators('$hidden_filed', $validators);
		$hiddenfiledcode.= $this->addFilters('$hidden_filed', $filters);
		$hiddenfiledcode.= $this->addToForm('$hidden_filed');
		$this->classcode.= $hiddenfiledcode;
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
	
	public function addHash($filedid,$salt,$timeout,$errormessage) {
		
		$hashcode = PHP_EOL;
		$hashcode.= ' $hash_field = new Zend_Form_Element_Hash(\''.$filedid."');". PHP_EOL;
		$hashcode.= ' $hash_field->setSalt("'.$salt.'");'. PHP_EOL;
		$hashcode.= ' $hash_field->setTimeout('.$timeout.');'. PHP_EOL;
		$hashcode.= ' $hash_field->setErrorMessages(array("Identical" => "'.$errormessage.'"));'. PHP_EOL;
		
		$hashcode.= $this->addToForm('$hash_field');
		$this->classcode.= $hashcode;
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
	
	
	public function addImageField($filedid,$imagesrc,$attributes) {
		
		$imagefiledcode = PHP_EOL;
		$imagefiledcode.= ' $image_field = new Zend_Form_Element_Image(\''.$filedid."');". PHP_EOL;
		$imagefiledcode.= ' $image_field->setImage("'.$imagesrc.'");'. PHP_EOL;
		
		foreach ($attributes as $key => $value) {
		
			$imagefiledcode.= ' $image_field->setAttrib("'.$key.'","'.$value.'");'. PHP_EOL .'';
		}
		
		$imagefiledcode.= $this->addToForm('$image_field');
		$this->classcode.= $imagefiledcode;
		
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
	
	public function addFileUploadField($filedid,$filedlabel,$filesize,$filesizerror,$extensions,$extensionserror,$destination,$validators) {
		
		$fileuploadcode = PHP_EOL;
		$fileuploadcode.= ' $fileelement = new Zend_Form_Element_File("'.$filedid.'");'. PHP_EOL;
		$fileuploadcode.= ' $fileelement->setLabel("'.$filedlabel.'");'. PHP_EOL;
		$fileuploadcode.= ' $fileelement->setDestination("'.$destination.'");'. PHP_EOL;
		$fileuploadcode.= ' $fileelement->addValidator("Count", false, 1);'. PHP_EOL;
		$fileuploadcode.= ' $fileelement->addValidator("Size", false, '.$filesize.');'. PHP_EOL;
		$fileuploadcode.= ' $fileelement->addValidator("Extension", false, "'.$extensions.'");'. PHP_EOL;
		
		$fileuploadcode.= $this->addValidators('$fileelement', $validators);
		
		if($filesizerror) {
			
			$fileuploadcode.=' $fileelement->getValidator("Size")->setMessage("'.$filesizerror.'");'. PHP_EOL;	
		}
		if($extensionserror) {
			
			$fileuploadcode.=' $fileelement->getValidator("Extension")->setMessage("'.$extensionserror.'");'. PHP_EOL;
		}
		
		$fileuploadcode.= $this->addToForm('$fileelement');
		$this->classcode.= $fileuploadcode;
		
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
		
		$checkboxcode = PHP_EOL;
		
		$checkboxcode.= ' $checkbox = new Zend_Form_Element_Checkbox("'.$checboxid.'");'. PHP_EOL;
		$checkboxcode.= ' $checkbox->setLabel(\''.$label."');". PHP_EOL ;
		
		foreach ($attributes as $key => $value) {
		
			$checkboxcode.= ' $checkbox->setAttrib("'.$key.'","'.$value.'");'. PHP_EOL .'';
		}
		
		$checkboxcode.= $this->addValidators('$checkbox', $validators). PHP_EOL;
		$checkboxcode.= $this->addFilters('$checkbox', $filters). PHP_EOL;
		$checkboxcode.= $this->addToForm('$checkbox');
		
		$this->classcode.= $checkboxcode;
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
		
		$multicheckboxcode = PHP_EOL;
		
		$multicheckboxcode.= ' $multicheckbox = new Zend_Form_Element_MultiCheckbox("'.$checboxid.'");'. PHP_EOL;
		$multicheckboxcode.= ' $multicheckbox->setLabel(\''.$label."');". PHP_EOL ;
		
		foreach ($values as $key => $value) {
		
			$multicheckboxcode.= ' $multicheckbox->addMultiOption("'.$key.'","'.$value.'");'. PHP_EOL;
		}
		
		foreach ($attributes as $key => $value) {
		
			$multicheckboxcode.= ' $multicheckbox->setAttrib("'.$key.'","'.$value.'");'. PHP_EOL .'';
		}
		
		$multicheckboxcode.= $this->addValidators('$multicheckbox', $validators). PHP_EOL;
		$multicheckboxcode.= $this->addFilters('$multicheckbox', $filters). PHP_EOL;
		$multicheckboxcode.= $this->addToForm('$multicheckbox');
		
		$this->classcode.= $multicheckboxcode;
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
	
	public function addSelectField($filedid,$filedlabel,$values,$attributes,$filters,$validators) {
		
		$selectfiledcode = PHP_EOL;
		$selectfiledcode.= ' $selectfiled = new Zend_Form_Element_Select("'.$filedid.'");'. PHP_EOL;
		$selectfiledcode.= ' $selectfiled->setLabel(\''.$filedlabel."');". PHP_EOL ;
		
		foreach ($values as $key => $value) {
			
			$selectfiledcode.= ' $selectfiled->addMultiOption("'.$key.'","'.$value.'");'. PHP_EOL;
		}
		
		foreach ($attributes as $key => $value) {
		
			$selectfiledcode.= ' $selectfiled->setAttrib("'.$key.'","'.$value.'");'. PHP_EOL .'';
		}
		
		$selectfiledcode.= $this->addValidators('$selectfiled', $validators). PHP_EOL;
		$selectfiledcode.= $this->addFilters('$selectfiled', $filters). PHP_EOL;
		$selectfiledcode.= $this->addToForm('$selectfiled');
		
		$this->classcode.= $selectfiledcode;	
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
	
	public function addMultiSelectField($filedid,$filedlabel,$values,$attributes,$filters, $validators) {
		
		$multiselectfiledcode = PHP_EOL;
		$multiselectfiledcode.= ' $multiselectfiled = new Zend_Form_Element_Multiselect("'.$filedid.'");'. PHP_EOL;
		$multiselectfiledcode.= ' $multiselectfiled->setLabel(\''.$filedlabel."');". PHP_EOL ;
		
		foreach ($values as $key => $value) {
		
			$multiselectfiledcode.= ' $multiselectfiled->addMultiOption("'.$key.'","'.$value.'");'. PHP_EOL;
		}
		
		foreach ($attributes as $key => $value) {
		
			$multiselectfiledcode.= ' $multiselectfiled->setAttrib("'.$key.'","'.$value.'");'. PHP_EOL .'';
		}
		
		$multiselectfiledcode.= $this->addValidators('$multiselectfiled', $validators). PHP_EOL;
		$multiselectfiledcode.= $this->addFilters('$multiselectfiled', $filters). PHP_EOL;
		$multiselectfiledcode.= $this->addToForm('$multiselectfiled');
		
		$this->classcode.= $multiselectfiledcode;
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
		
		$passwprdfiledcode = PHP_EOL;
		$passwprdfiledcode.= ' $passwordfiled = new Zend_Form_Element_Password("'.$fieldid.'");'. PHP_EOL;
		$passwprdfiledcode.= ' $passwordfiled->setLabel(\''.$fieldlabel."');". PHP_EOL ;
		
		foreach ($attributes as $key => $value) {
		
			$passwprdfiledcode.= ' $passwordfiled->setAttrib("'.$key.'","'.$value.'");'. PHP_EOL .'';
		}
		
		$passwprdfiledcode.= $this->addValidators('$passwordfiled', $validators). PHP_EOL;
		$passwprdfiledcode.= $this->addFilters('$passwordfiled', $filters);
		$passwprdfiledcode.= $this->addToForm('$passwordfiled');
		$this->classcode.= $passwprdfiledcode;
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
		
		$radiobuttoncode = PHP_EOL;
		$radiobuttoncode.= ' $radiobutton = new Zend_Form_Element_Radio("'.$fieldid.'");'. PHP_EOL;
		$radiobuttoncode.= ' $radiobutton->setLabel(\''.$fieldlabel."');". PHP_EOL ;
		$radiobuttoncode.= ' $radiobutton->setValue(\''.$selectedvalue."');". PHP_EOL ;
		
		foreach ($values as $key => $value) {
		
			$radiobuttoncode.= ' $radiobutton->addMultiOption("'.$key.'","'.$value.'");'. PHP_EOL;
		}
		
		foreach ($attributes as $key => $value) {
		
			$radiobuttoncode.= ' $radiobutton->setAttrib("'.$key.'","'.$value.'");'. PHP_EOL .'';
		}
		
		$radiobuttoncode.= $this->addValidators('$radiobutton', $validators). PHP_EOL;
		$radiobuttoncode.= $this->addFilters('$radiobutton', $filters);
		$radiobuttoncode.= $this->addToForm('$radiobutton');
		$this->classcode.= $radiobuttoncode;
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
		
		$resetbuttoncode = PHP_EOL;
		$resetbuttoncode.= ' $resetbutton = new Zend_Form_Element_Reset("'.$fieldid.'");'. PHP_EOL;
		$resetbuttoncode.= ' $resetbutton->setLabel("'.$fieldtitle.'");'. PHP_EOL;
		
		foreach ($attributes as $key => $value) {
		
			$resetbuttoncode.= ' $resetbutton->setAttrib("'.$key.'","'.$value.'");'. PHP_EOL .'';
		}
		
		$resetbuttoncode.= $this->addToForm('$resetbutton');
		$this->classcode.= $resetbuttoncode;
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
		
		$textareafiledcode = PHP_EOL;
		$textareafiledcode.= ' $text_area = new Zend_Form_Element_Textarea(\''.$fieldname."');". PHP_EOL;
		$textareafiledcode.= ' $text_area->setLabel(\''.$fieldlabel."');". PHP_EOL ;
		
		foreach ($attributes as $key => $value) {
		
			$textareafiledcode.= ' $text_area->setAttrib("'.$key.'","'.$value.'");'. PHP_EOL .'';
		}
		
		$textareafiledcode.= $this->addValidators('$text_area', $validators);
		$textareafiledcode.= $this->addFilters('$text_area', $filters);
		$textareafiledcode.= $this->addToForm('$text_area');
		
		$this->classcode.= $textareafiledcode;
	}
	
	/**
	 * Function addToForm
	 *
	 * Adds a field to the form
	 *
	 * @param Field $fieldtoadd      // $fieldtoadd field to be added to the form
	 *									    
	 */
	
	public function addToForm ($fieldtoadd) {
		
		return PHP_EOL.' $this->addElement('.$fieldtoadd.');'. PHP_EOL;
		
	}
	
	/**
	 * Function getClassCode
	 *
	 * Returns whole form class code
	 *
	 */

	public function getClassCode() {
		
		$this->addClassEndCode();
		return $this->classcode;
	}
		
}