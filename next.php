<?php



#send email:

$message = "Here are your pix from the bb matchups\n";
for ($x = 0; $x <= intval($_POST['numberBouts']); $x++) {
    $message = $message .  $_POST['bout' . $x] . "\n";
}  
#exec("python scripts/sendemail.py jconsidi@nd.edu" $message);

echo $_POST['bout' . 0];

?>