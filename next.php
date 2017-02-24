<?php



#send email:
#exec("python scripts/sendemail.py jconsidi@nd.edu");
$message = "Here are your pix from the bb matchups\n";
for ($x = 0; $x <= intval($_POST['numberBouts']); $x++) {
    echo $_POST['bout'. $x];
}  


echo "All Clear!"

?>