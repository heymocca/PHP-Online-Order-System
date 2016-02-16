<?php
error_reporting("~E_NOTICE & ~E_WARNING");
include_once 'Config.inc.php';
function alertRedirect($flag,$url){
	echo"<script language='javascript'>";
	if($flag){
		echo"alert('Successful !');";
	}else{
		echo"alert('Failure !');";
	}
	echo"window.location.href='".$url."';";
	echo"</script>";
}

function alertResult($flag){
	echo"<script language='javascript'>";
	if($flag){
		echo"alert('Successful !');";
	}else{
		echo"alert('Failure !');";
	}
	echo"</script>";
}

function Redirect($url){
	echo"<script language='javascript'>";
	echo"window.location.href='".$url."';";
	echo"</script>";
}

function alertMessage($msg){
	echo"<script language='javascript'>";
	echo"alert('".$msg."');";
	echo"</script>";
}

set_error_handler("errorHandler");
function errorHandler($errno, $errstr, $errfile, $errline){
	//dirname(__FILE__);
	$filePth = constant("LOG_PATH").date('Ymd').'-log.txt';
	$br = "\r\n";
	$file = @fopen($filePth, 'a+');
	if($file){
		@fwrite($file, "----------------Error Information Start----------------".$br);
		@fwrite($file, "date time : ".date('Y-m-d H:i:s').$br);
		@fwrite($file, 'err no: '.$errno.$br);
		@fwrite($file, 'err str: '.$errstr.$br);
		@fwrite($file, 'err file: '.$errfile.$br);
		@fwrite($file, 'err line: '.$errline.$br);
		@fwrite($file, "----------------Error Infromation End----------------".$br);
	}
	@fclose($file);
	echo"<script language='javascript'>";
	echo"window.location.href='../ErrorPage.html';";
	echo"</script>";
}

function showOptions($sql){
	$service = new BaseService();
	$results = $service->GetRows($sql);
	$id=0;
	$i=0;
	foreach ($results as $row){
		if($i==0){
			$id = $row[0];
		}
		echo "<option value='".$row[0]."'>".$row[1]."</option>";
		$i++;
	}
	return $id;
}

function sendMail($email,$userName,$pwd){
	
	$to = $email;
	$subject = "Thank you for registering CRAZY HATS";
	$message = "Welcome ".$userName.":\r\n";
	$message.="Your register is sucessful, this is your user information:\r\n";
	$message.="Your userName : ".$userName."\r\n";
	$message.="Your password : ".$pwd."\r\n";
	$message.="Don't forget your username and password.Enjoy your shopping on CRAZY HATS!";
	$from = "luanw02@myunitec.ac.nz";
	$headers = "From: ".$from;
	mail($to,$subject,$message,$headers);
}
 function getOrderNumber($id){
 	return "NO.".$id."-".date('ymdHis');
 }

?>