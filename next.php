<?php



#send email:

$message = "Here are your pix from the bb matchups\n";
for ($x = 0; $x <= intval($_POST['numberBouts']) + 1; $x++) {
    $message = $message . $_POST['bout'. $x] . "\n";
}  

$message = $message . "And your verification code is: \n" . generateRandomString(25);
// $email = $_POST['email'];


var_dump(json_decode(file_get_contents("php://input")));



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