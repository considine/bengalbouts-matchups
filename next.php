<?php



#send email:

$message = "Here are your pix from the bb matchups\n";
$winners = $_POST['email'] . ",";
$content = $winners;
$rand = generateRandomString(25);
for ($x = 1; $x <= intval($_POST['numberBouts']) + 1; $x++) {
    $content = $content . $_POST['bout'. $x] . ", ";
    $message = $message . $_POST['bout'. $x] . "\n";
    $winners += $_POST['bout'. $x] . ",";
}  

$content = $content . $rand;
$content = $content . "," . time();
$message = $message . " And your verification code is: \n" . $rand;
$message = $message . "\n PLEASE SAVE THIS EMAIL TO BE ELIGIBLE TO WIN GLOVES!";
$email = $_POST['email'];
$item = exec("python scripts/sendemail.py $email '$message' '$content'");

$url = 'http://159.203.163.157/submissions';
$data = array('submission' => $content);

// use key 'http' even if you send the request to https://...
$options = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data)
    )
);
$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);
if ($result === FALSE) { /* Handle error */ }



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
