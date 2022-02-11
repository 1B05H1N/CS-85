<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <title>Contact Me</title>
</head>
<body>

<?php

//function validates errors by checking if the data form field is empty
//it will trim/stripslashes from the input if data exists
//an errorCount increment global var is present in event of an error
function validateInput($data, $fieldName){
    global $errorCount;
    if(empty($data)) {
        echo "\"$fieldName\" is a required feild.<br />\n";
        ++$errorCount;
        $retval = "";
    }
    else{
        $retval = trim($data);
        $retval = stripslashes($retval);
    }

    return($retval); }

//similar to the previous function, it checks if the field is empty
//input is sanitized/checked if valid
//an errorCount increment global var is present in event of an error
function validateEmail($data, $fieldName){
    global $errorCount;

    if (empty($data)) {
        echo "\"$fieldName\" is a required feild.<br />\n";
        ++$errorCount; $retval = "";
    }
    else{
        $retval = filter_var($data,FILTER_SANITIZE_EMAIL);

        if (!filter_var($retval,FILTER_VALIDATE_EMAIL)){
            echo "\"$fieldName\" is not a valid email.<br />\n";
        }
    }
    return($retval);
}

//displays form, clear form/submit butts by passing in info stored from above functions
function displayForm($Sender, $Email, $Subject, $Message) {
    ?> <h2 style = "text-align: center">Contact Me</h2>
    <form name="contact" action="ContactForm.php" method="post">
        <p>Your Name:
            <input type="text" name="Sender" value="<?php echo $Sender;?>" /></p>
        <p>Your E-mail:
            <input type="text" name="Email" value="<?php echo $Email;?>" /></p>
        <p>Subject:
            <input type="text" name="Subject" value="<?php echo $Subject;?>" /></p>
        <p>Message: <br />
            <textarea name="Message"><?php echo $Message; ?></textarea></p>
        <p><input type="reset" value="Clear Form" />&nbsp; &nbsp;
            <input type="submit" name="Submit" value="Send Form" /></p>
    </form>

<?php }

//setting vars
$ShowForm = TRUE;
$errorCount = 0;
$Sender = "";
$Subject = "";
$Email = "";
$Message = "";

//this checks if the submit button was pressed and a post request was submitted
//it validates the submitted fields/function and stores error info
if(isset($_POST['Submit'])){
    $Sender = validateInput($_POST['Sender'],"Your Name");
    $Email = validateEmail($_POST['Email'],"Your E-mail");
    $Subject = validateInput($_POST['Subject'],"Subject");
    $Message = validateInput($_POST['Message'],"Message");
    if($errorCount==0){
        $ShowForm = FALSE;
    }
    else{
        $ShowForm = TRUE;
    }
}

//if the ShowForm var is true then this if/else will prompt to re-enter form info
//otherwise it will return the form input and send the message otherwise it wil display an error
if($ShowForm == TRUE){
    if($errorCount > 0)
        echo "<p>Please re-enter the form information below </p>";
        displayForm($Sender,$Email,$Subject,$Message);
}
else{
    $SenderAddress = "$Sender <$Email>";
    $Headers = "From: $SenderAddress\nCC: $SenderAddress\n";

    $result = mail("recipient@example.com ",$Subject,$Message,$Headers);

    if($result){
        echo "<p>your Message is Successfully Sent. Thank You</p>";
    }else{
        echo "<p> There is an error sending your message, ".$Sender." </p>";
    }
}

//this whole page is insecure and would be a problem if encountered in my line of work lol

?>

</body>
</html>