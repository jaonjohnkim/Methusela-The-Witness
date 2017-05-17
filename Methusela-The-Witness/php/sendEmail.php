<?PHP
/*
    Contact Form from HTML Form Guide
    This program is free software published under the
    terms of the GNU Lesser General Public License.
    See this page for more info:
    http://www.html-form-guide.com/php-form/php-form-validation.html
*/
require_once("fgcontactform.php");
require_once("formvalidator.php");

$formproc = new FGContactForm();

//Initialize the contact form
$formproc->AddRecipient('eliasyoon@gmail.com');
$formproc->SetFormRandomKey('CnRrspl1FyEylUj');

$validation_errors='';
if(isset($_POST['submitted']))
{// We need to validate only after the form is submitted

    //Setup Server side Validations
    //Please note that the element name is case sensitive
    $validator = new FormValidator();
    $validator->addValidation("name","req","Please fill in Name");
    $validator->addValidation("email","email","The input for Email should be a valid email value");
    $validator->addValidation("email","req","Please fill in Email");

    //Then validate the form
    if($validator->ValidateForm())
    {
        //If the validations succeeded, proceed with form processing
        if($formproc->ProcessForm())
        {
            $formproc->RedirectToURL("thank-you.html");
        }
    }
    else
    {
        //Validations failed. Display Errors.
        $error_hash = $validator->GetErrors();
        foreach($error_hash as $inpname => $inp_err)
        {
           $validation_errors .= "<p>$inpname : $inp_err</p>\n";
        }
    }
}//if
$disp_name  = isset($_POST['name'])?$_POST['name']:'';
$disp_email = isset($_POST['email'])?$_POST['email']:'';
$disp_subject = isset($_POST['subject'])?$_POST['subject']:'';
$disp_message = isset($_POST['message'])?$_POST['message']:'';


?>
