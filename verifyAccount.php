<?php
include("project_connect.php");
$userID=$_POST["userID"];
$verifyCode=$_POST["verifyCode"];

$sql=mysqli_query($connect,"select * from project_table where email='$userID'");
$count=mysqli_num_rows($sql);

class verifyAccount{
	public $username;
	public $email;
	public $verificationCode;
	public $companyID;
	public $status;
	public $tf;
	public $text;
}
$verify=new verifyAccount();

if($count==1){
$fetch=mysqli_fetch_assoc($sql);
$verify->verificationCode=$fetch["verificationCode"];
if(strcasecmp($verify->verificationCode, $verifyCode) == 0){
	$verify->username=$fetch["username"];
	$verify->email=$fetch["email"];
	$verify->verificationCode=$fetch["verificationCode"];
	$verify->companyID=$fetch["companyID"];
	$verify->status=1;
	$verify->tf=true;
	$verify->text="You verified account.";
	$update_status=mysqli_query($connect,"update project_table set status='1' where email='$userID'");
	echo (json_encode($verify));
	}
else{
	$verify->username=$fetch["username"];
	$verify->email=$fetch["email"];
	$verify->verificationCode=$fetch["verificationCode"];
	$verify->companyID=$fetch["companyID"];
	$verify->status=1;
	$verify->tf=false;
	$verify->text="Verification code is not match";
	echo (json_encode($verify));	
	}
}

else{
	$verify->username="null";
	$verify->email="null";
	$verify->verificationCode="null";
	$verify->companyID="null";
	$verify->status=0;
	$verify->tf=false;
	$verify->text="The user can not find";
	echo (json_encode($verify));

}
?>