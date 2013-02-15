<?php include './SendGrid_loader.php'; ?>
<?php
$sendgrid = new SendGrid('natani', 'natani123');
$mail = new SendGrid\Mail();
$file=fopen("details","r");


$to= (string)fgets($file);
$from = (string)fgets($file);
$subject= (string)fgets($file);
$text="";
while(! feof($file))
  {
 	$text= $text.(string)fgets($file);
	
  }

$to = trim($to);
$from = trim($from);
$mail->
  addTo($to)->
  setFrom($from)->
  setSubject($subject)->
  setText($text);
  $sendgrid-> smtp -> send($mail);

fclose($file);
?>
