<?php
include("project_connect.php");
$companyIDM=$_POST["companyID"];
//"7da386APCf";
$invited=$_POST["invited"];
//"while";

$control=mysqli_query($connect,"select * from project_table where email='$invited' or username='$invited'");
$count=mysqli_num_rows($control);

class invite{
	public $username;
	public $email;
	public $tf;
	public $text;

}
$inviteUser=new invite();
if($count==1){
	//var
	$parse=mysqli_fetch_assoc($control);
	//$username=$parse["username"];
	$email=$parse["email"];
	$companyID=$parse["companyID"];

	if($companyID=="null"){
	$addUser=mysqli_query($connect,"update project_table set companyID='$companyIDM' where email='$invited' or username='$invited'");
	if($addUser){
	$inviteUser->username=$parse["username"];
	$inviteUser->email=$parse["email"];
	$inviteUser->tf=true;
	$inviteUser->text="Successfully completed";
	echo(json_encode($inviteUser));
}
else{
$inviteUser->username="null";	
	$inviteUser->email="null";
	$inviteUser->tf=false;
	$inviteUser->text="Can not invite";
	echo(json_encode($inviteUser));

}
	}
	else{
		//already
	$inviteUser->username="null";	
	$inviteUser->email="null";
	$inviteUser->tf=false;
	$inviteUser->text="The user already join company";
	echo(json_encode($inviteUser));
	}

}

else{
	//
	$inviteUser->username="null";	
	$inviteUser->email="null";
	$inviteUser->tf=false;
	$inviteUser->text="Can not find this user";
	echo(json_encode($inviteUser));
}