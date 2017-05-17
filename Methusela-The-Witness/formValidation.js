var frmvalidator  = new Validator("emailForm");

frmvalidator.EnableOnPageErrorDisplay();
frmvalidator.EnableMsgsTogether();
frmvalidator.addValidation("name","req","Please provide your name");

frmvalidator.addValidation("email","req","Please provide your email address");

frmvalidator.addValidation("email","email","Please provide a valid email address");

frmvalidator.addValidation("message","req","Please leave us a comment or a question in the message section.");
