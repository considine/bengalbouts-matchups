<?php



#send email:

$message = "Here are your pix from the bb matchups\n";
for ($x = 0; $x <= intval($_POST['numberBouts']); $x++) {
    $message = $message . $_POST['bout'. $x] . "\n";
}  
$email = $_POST['email'];
exec("python scripts/sendemail.py $email '$message'");


?>