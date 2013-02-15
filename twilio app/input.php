<?php
// page located at http://example.com/process_gather.php
 //echo "<Response><Say>You entered " . $_REQUEST['Digits'] . "</Say></Response>";

header("content-type: text/xml");
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
if($_REQUEST['Digits'] ==1)
	$choice="book";
else
	$choice="lyrics";	
 ?>
<Response><Sms>
choice is <?php echo $choice; ?> 
</Sms>
</Response>
