<?php



#send email:

$message = "Here are your pix from the bb matchups\n";
$content = "";
$winners = $_POST['email'] . ",";
for ($x = 0; $x <= intval($_POST['numberBouts']) + 1; $x++) {
    $content = $content . $_POST['bout'. $x] . ",";
    $winners += $_POST['bout'. $x] . ",";
}  

$content = $content . generateRandomString(25);
$email = $_POST['email'];
#exec("python scripts/sendemail.py $email '$message' '$winners'");
echo $content;


function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

?>