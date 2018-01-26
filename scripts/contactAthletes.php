<?php

if(!$_POST) exit;



/*------------------------------------
 * just replace email address with your email address
 ---------------------------------------------*/
$address = "Support@qwerkz.com"; 






// Email address verification, do not edit this part.
function isEmail($email) {
	return(preg_match("/^[-_.[:alnum:]]+@((([[:alnum:]]|[[:alnum:]][[:alnum:]-]*[[:alnum:]])\.)+(ad|ae|aero|af|ag|ai|al|am|an|ao|aq|ar|arpa|as|at|au|aw|az|ba|bb|bd|be|bf|bg|bh|bi|biz|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|com|coop|cr|cs|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|edu|ee|eg|eh|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gh|gi|gl|gm|gn|gov|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|in|info|int|io|iq|ir|is|it|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|me|mg|mh|mil|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|museum|mv|mw|mx|my|mz|na|name|nc|ne|net|nf|ng|ni|nl|no|np|nr|nt|nu|nz|om|org|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|pro|ps|pt|pw|py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw)$|(([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5])\.){3}([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5]))$/i",$email));
}

if (!defined("PHP_EOL")) define("PHP_EOL", "\r\n");

$name     = $_POST['name'];
$email    = $_POST['email'];
$sport    = $_POST['sport'];
$league    = $_POST['league'];
$team    = $_POST['team'];
$twitter    = $_POST['twitter'];
//$interest  = $_POST['interest'];
//$industry  = $_POST['industry'];
//$selectIndustry = $_POST['selectIndustry'];
$msg = $_POST['message'];

if($_POST['selectInterest']=='business')
{
     $selectInterest = "Business/entrepreneurship";
}
else if($_POST['selectInterest']=='partnerships')
{
     $selectInterest = "Partnerships";
}
else if($_POST['selectInterest']=='investors')
{
     $selectInterest = "Find Investors";
}
else if($_POST['selectInterest']=='otherInterest')
{
     $selectInterest = "Other";
}


if($_POST['selectIndustry']=='tech')
{
     $selectIndustry = "Tech";
}
else if($_POST['selectIndustry']=='realEstate')
{
     $selectIndustry = "Real Estate";
}
else if($_POST['selectIndustry']=='restaurant')
{
     $selectIndustry = "Restaurant";
}
else if($_POST['selectIndustry']=='nonProfit')
{
     $selectIndustry = "Non Profit";
}
else if($_POST['selectIndustry']=='ventureCapital')
{
     $selectIndustry = "Venture Capital";
}
else if($_POST['selectIndustry']=='otherIndustry')
{
     $selectIndustry = "Other";
}

if(trim($name) == '') {
	echo '<div class="error_message"> <i class="fa fa-close"></i> Please enter your name.</div>';
	exit();
} else if(trim($email) == '') {
	echo '<div class="error_message"><i class="fa fa-close"></i>  Please enter a valid email address.</div>';
	exit();
} else if(!isEmail($email)) {
	echo '<div class="error_message"><i class="fa fa-close"></i> You have enter an invalid e-mail address.</div>';
	exit();
}



if(get_magic_quotes_gpc()) {
	$msg = stripslashes($msg);
}










/*------------------------------------
// Configuration option.
// i.e. The standard subject will appear as, "You've been contacted by XpeedStudio ."
// Example, $e_subject = '$name . ' has contacted you via Your Website.';
 ---------------------------------------------*/
$e_subject = 'You\'ve been contacted by ' . $name . '.';



// You can change this if you feel that you need to.

$e_body = '<html><body style=\"text-align: center; font-size:14px; color:#000;\>';
$e_body .= '<h1>Hello there</h1>';
$e_body .= '<h2>This athelete wants to get in touch with you:</h2>';
$e_body .= "<p>Name: <strong>".$name."</strong><br><br>Email: <strong>".$email."</strong><br><br>Sport: <strong>".$sport."</strong><br><br>League: <strong>".$league."</strong><br><br>Team: <strong>".$team."</strong><br><br>Twitter handle: <strong>".$twitter."</strong><br><br>Interest: <strong>".$selectInterest."</strong><br><br>Industry: <strong>".$selectIndustry."</strong><br><br>Message: <strong>".$msg."</strong></p>";
$e_body .= "</body></html>";

$msg = wordwrap( $e_body, 70 );

$headers = "From: $email". "\r\n";
$headers .= "Reply-To: $email". "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
$headers .= "Content-Transfer-Encoding: quoted-printable";

if(mail($address, $e_subject, $msg, $headers)) {

	// Email has sent successfully, echo a success page.

	echo "<fieldset>";
	echo "<div id='success_page'>";
	echo "<h2>Email Sent Successfully.</h2>";
	echo "<p>Thank you <strong>$name</strong>, your message has been submitted to us.</p>";
	echo "<p>We will get back to you shortly :)</p>";
	echo "</div>";
	echo "</fieldset>";

} else {

	echo 'ERROR!';

}