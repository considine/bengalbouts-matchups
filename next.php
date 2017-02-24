<?php



#send email:

$message = "Here are your pix from the bb matchups\n";
$content = "";
$winners = $_POST['email'] . ",";
for ($x = 0; $x <= intval($_POST['numberBouts']) + 1; $x++) {
    $content = $content . $_POST['bout'. $x] . ", ";
    $message = $message . $_POST['bout'. $x] . "\n";
    $winners += $_POST['bout'. $x] . ",";
}  

$content = $content . generateRandomString(25);
$message = $message . " And your verification code is: \n" . generateRandomString(25);
$message = $message . "\n PLEASE SAVE THIS EMAIL TO BE ELIGIBLE TO WIN GLOVES!";
$email = $_POST['email'];
$item = exec("python scripts/sendemail.py $email '$message' '$content'");
echo $item;

$dir = 'myDir';

 // create new directory with 744 permissions if it does not exist yet
 // owner will be the user/group the PHP script is run under
 if ( !file_exists($dir) ) {
     $oldmask = umask(0);  // helpful when used in linux server  
     mkdir ($dir, 0744);
 }



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