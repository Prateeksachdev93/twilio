<?php
// make an associative array of senders we know, indexed by phone number
// // if the sender is known, then greet them by name
// // otherwise, consider them just another monkey
$body=$_REQUEST['Body'];
/*$body = "viditg99@gmail.com
prateek.sachdev93@gmail.com 
trial
this is a try";*/

$FilePointer = fopen("userRequest",'w') or die("can not open");
fwrite($FilePointer,$body);
fclose($FilePointer);
exec("python ./bodyParser.py");
$FilePointer = fopen("category",'r');
$category = strtolower(fgets($FilePointer));
fclose($FilePointer);
$FilePointer = fopen("query",'r');
$query = strtolower(fgets($FilePointer));
fclose($FilePointer);
$output1=""; //tp
if($category=="book") 
{
	$output1=exec("python ./script.py ");
	$FilePointer = fopen("test",'w+') or die("can not open");
	fwrite($FilePointer, $output1);
	fclose($FilePointer);
        header("content-type: text/xml");

echo"<Response>
	<Sms>".$output1."</Sms>
</Response>";
}
elseif($category=="mail"){
	header("content-type: text/xml");

	echo"<Response>
		<Sms>Type the following to send an e-mail: 
		To:
		From:
		Subject:
		Body:
		</Sms>
		</Response>";
}
elseif($category=="lyrics") {
	$finalString = $query;
	$ourFileName = "lyrics.txt";
	$ourFileHandle = fopen($ourFileName, 'w+') or die("can't open file");
	fwrite($ourFileHandle, $finalString);
	fclose($ourFileHandle);

	exec("python ./parsing.py");
	$file = fopen("output.txt","r");
$output = "";
	while(!feof($file)){
		$output .= fgets($file);
		$output .= " ";
	}
	$outputArray = str_split($output);
	$output1 = "";
	for($i=0;$i<150 && $i<count($outputArray);$i+=1)
		$output1 .= $outputArray[$i];
	$output2 = "";
	for($i=0;$i<150 && $i<count($outputArray);$i+=1)
		$output2 .= $outputArray[$i+150];
	$output3 = "";
	for($i=0;$i<150 && $i<count($outputArray);$i+=1)
		$output3 .= $outputArray[$i+300];
	$output4 = "";
	for($i=0;$i<150 && $i<count($outputArray);$i+=1)
		$output4 .= $outputArray[$i+450];
	$output5 = "";
	for($i=0;$i<150 && $i<count($outputArray);$i+=1)
		$output5 .= $outputArray[$i+600];
	$output6 = "";
	for($i=0;$i<150 && $i<count($outputArray);$i+=1)
		$output6 .= $outputArray[$i+750];
header("content-type: text/xml");

echo"<Response>
	<Sms>".$output1."</Sms>
</Response>";
}
else
{
	$fp = fopen("./details",'w+') or die("can't open file");
	//fwrite($fp,$_REQUEST['Body']);
	fwrite($fp, $body);
	fclose($fp);
	exec("php ./index.php");
}
//header("content-type: text/xml");

//echo"<Response>
//	<Sms>".$output1."</Sms>
//</Response>";
?>
