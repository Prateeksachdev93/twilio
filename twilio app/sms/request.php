<?php
// make an associative array of senders we know, indexed by phone number
// // if the sender is known, then greet them by name
// // otherwise, consider them just another monkey
$body=$_REQUEST['Body']];

 header("content-type: text/xml");
 echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
 ?>
 <Response>
 <Sms><?php echo $body ?>is you body of the message</Sms>
 </Response>
