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

$nameOfCompany     = $_POST['nameOfCompany'];
$contactPerson    = $_POST['contactPerson'];
$contactPersonEmail    = $_POST['contactPersonEmail'];
$industryCompany    = $_POST['industryCompany'];
$revenue    = $_POST['revenue'];
$product    = $_POST['product'];
$companyAddress  = $_POST['address'];
$phoneCompany  = $_POST['phoneCompany'];
$website  = $_POST['website'];
$msg = $_POST['messageCompany'];

if(trim($nameOfCompany) == '') {
	echo '<div class="error_message"> <i class="fa fa-close"></i> Please enter your company name.</div>';
	exit();
} else if(trim($phoneCompany) == '') {
	echo '<div class="error_message"><i class="fa fa-close"></i>  Please enter a valid phone number.</div>';
	exit();
} else if(trim($contactPersonEmail) == '') {
	echo '<div class="error_message"><i class="fa fa-close"></i>  Please enter a valid email.</div>';
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
$e_subject = 'You\'ve been contacted by ' . $nameOfCompany . '.';



// You can change this if you feel that you need to.

$e_body = '<html><body style=\"text-align: center; font-size:14px; color:#000;\>';
$e_body .= '<h1>Hello there</h1>';
$e_body .= '<h2>This company wants to get in touch with you:</h2>';
$e_body .= "<p>Name of Company/Brand: <strong>".$nameOfCompany."</strong><br><br>Contact person name: <strong>".$contactPerson."</strong><br><br>Contact person email: <strong>".$contactPersonEmail."</strong><br><br>Industry: <strong>".$industryCompany."</strong><br><br>Annual Revenue: <strong>".$revenue."</strong><br><br>Product/Service: <strong>".$product."</strong><br><br>Address: <strong>".$companyAddress."</strong><br><br>Phone Number: <strong>".$phoneCompany."</strong><br><br>Website: <strong>".$website."</strong><br><br>Message: <strong>".$msg."</strong></p>";
$e_body .= "</body></html>";

$msg = wordwrap( $e_body, 70 );

$headers = "From: $contactPersonEmail". "\r\n";
$headers .= "Reply-To: $contactPersonEmail". "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
$headers .= "Content-Transfer-Encoding: quoted-printable";

if(mail($address, $e_subject, $msg, $headers)) {

	// Email has sent successfully, echo a success page.

	echo "<fieldset>";
	echo "<div id='success_page'>";
	echo "<h2>Email Sent Successfully.</h2>";
	echo "<p>Thank you <strong>$nameOfCompany</strong>, your message has been submitted to us.</p>";
	echo "<p>We will get back to you shortly :)</p>";
	echo "</div>";
	echo "</fieldset>";

} else {

	echo 'ERROR!';

}