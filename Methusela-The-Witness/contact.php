<?PHP
/*
    Contact Form from HTML Form Guide
    This program is free software published under the
    terms of the GNU Lesser General Public License.
    See this page for more info:
    http://www.html-form-guide.com/php-form/php-form-validation.html
*/
require_once("php/fgcontactform.php");
require_once("php/formvalidator.php");

$formproc = new FGContactForm();

//Initialize the contact form
$formproc->AddRecipient('kim.jaon79@gmail.com');
$formproc->SetFormRandomKey('CnRrspl1FyEylUj');

$validation_errors='';
if(isset($_POST['submitted']))
{// We need to validate only after the form is submitted

    //Setup Server side Validations
    //Please note that the element name is case sensitive
    $validator = new FormValidator();
    $validator->addValidation("name","req","Please fill in your name.");
    $validator->addValidation("email","email","Please enter a valid e-mail address.");
    $validator->addValidation("email","req","Please fill in your email.");
    $validator->addValidation("message","req","Please leave us a comment or a question.");

    //Then validate the form
    if($validator->ValidateForm())
    {
        //If the validations succeeded, proceed with form processing
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        $from = 'From: $email';
        $to = 'kim.jaon79@gmail.com';
        $subject = 'New Message From Methusela Contact Form';
        $body = "From: $name\n E-Mail: $email\n Message:\n $message";
        mail($to,$subject,$body,$from);
        //redirect to the 'thank you' page
        header('Location: thank-you.html');

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


<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:100,300,400,600" rel="stylesheet" type="text/css"/>
    <link type="text/css" rel="stylesheet" href="style.css" />
    <title>Contact - Methusela - The Witness</title>
  </head>

  <body>
    <header>
      <div id="navToggle" class="menuUp">
        <a href="#">Menu</a>
      </div>
      <nav>
        <ul>
          <li><a href="index.html">Home</a></li>
          <li><a href="about.html">About</a></li>
          <li><a href="music.html" target="_blank">Music</a></li>
          <li><a href="https://www.youtube.com" target="_blank">Theodox</a></li>
          <li><a href="contact.php">Contact</a></li>
        </ul>
      </nav>
    </header>

    <main id="contact">
      <h1>Contact</h1>
      <div class=form>
        <form action="<?php echo $formproc->GetSelfScript(); ?>" id="emailForm" method="post" autocomplete="on">
          <input type='hidden' name='submitted' id='submitted' value='1'/>
          <input type='hidden' name='<?php echo $formproc->GetFormIDInputName(); ?>' value='<?php echo $formproc->GetFormIDInputValue(); ?>'/>
          <input type='text'  class='spmhidip' name='<?php echo $formproc->GetSpamTrapInputName(); ?>' />

          <span class='error'><?php echo $formproc->GetErrorMessage(); ?></span>
          <span class='error'><?php echo $validation_errors; ?></span>

          <div class='short_explanation'>* required fields</div>
          <label>Full Name *:</label>
            <input type="text" name="name" id="name" value="<?php echo htmlentities($disp_name) ?>" placeholder="Full Name" autofocus><br />
            <span id='contactus_name_errorloc' class='error'></span>
          <label>E-mail *:</label>
            <input type="email" name="email" id="email" value="<?php echo htmlentities($disp_email) ?>" placeholder="Email Address"><br />
            <span id='contactus_email_errorloc' class='error'></span>
          <label>Subject:</label>
            <input type="text" name="subject" id="subject" value="<?php echo htmlentities($disp_subject) ?>" placeholder="Subject"/><br />
          <label>Message *:</label>
            <textarea name='message' id="message" placeholder="Type here" autocomplete="off"><?php echo htmlentities($disp_message) ?></textarea>
            <span id='contactus_message_errorloc' class='error'></span>
          <input type="submit" id="submit" value="submit"/>
        </form>
      </div>
    </main>

    <footer>
      <div class="socialIcons">
        <a href="https://www.facebook.com" target="_blank" class="svg">
          <object type="image/svg+xml" data="media/facebook.svg">
            <img src="media/facebook.svg" alt="facebook link icon" />
          </object>
        </a>
        <a href="https://www.instagram.com" target="_blank" class="svg">
          <object type="image/svg+xml" data="media/instagram.svg">
            <img src="media/instagram.svg" alt="instagram link icon"/>
          </object>
        </a>
        <a href="https://www.twitter.com" target="_blank" class="svg">
          <object type="image/svg+xml" data="media/twitter.svg">
            <img src="media/twitter.svg" alt="twitter link icon" />
          </object>
        </a>
      </div>
    </footer>
    <!-- <script src="script/gen_validatorv31.js"></script> -->
    <!-- <script src="formValidation.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="menuToggle.js"></script>
  </body>
</html>
