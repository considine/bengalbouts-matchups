<?php



#send email:
$output = passthru("python scripts/sendemail.py jconsidi@nd.edu");

echo "Sent email!"
?>