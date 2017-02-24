<?php



#send email:
#exec("python scripts/sendemail.py jconsidi@nd.edu");

for ($x = 0; $x <= intval($_POST['numberBouts']); $x++) {
    echo $_POST['bout' . $x];
}  


?>