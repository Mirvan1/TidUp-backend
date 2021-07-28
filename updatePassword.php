<?php
include("project_connect.php");
$id=101;//$_POST["id"];
//101;//
$companyID="7da386APCf";//$_POST["companyID"];
//"7da386APCf";//
$currentPassword="Trytry123";//$_POST["currentPassword"];
//"Trytry12";//
$newPassword="Trytry1233";//$_POST["newPassword"];
//"Trytry12345";//

$sql=mysqli_query($connect,"select * from project_table where id='$id' and companyID='$companyID'");
$count=mysqli_num_rows($sql);
class updatePass{
	public $username;
	public $text;
	public $tf;
}
$pass=new updatePass();

if($count==1){

$checkCurrent=password_hash($currentPassword, PASSWORD_BCRYPT);
$parse=mysqli_fetch_assoc($sql);
// echo($parse["password"]);
// password_verify($currentPassword, $parse["password"])
	if(password_verify($currentPassword, $parse["password"])){
$newPassword_hash=password_hash($newPassword, PASSWORD_BCRYPT);
$updateSql=mysqli_query($connect,"update project_table set password='$newPassword_hash' where id='$id' and companyID='$companyID'");

$pass->username=$parse["username"];
$pass->text="Password changed succesfully";
$pass->tf=true;
echo(json_encode($pass));
	
	}
	else {
	$pass->username=$parse["username"];
$pass->text="Current password is wrong";
$pass->tf=false;
echo(json_encode($pass));
	}
}
else{
	
$pass->username="null";
$pass->text="User can not find.Please try again";
$pass->tf=false;
echo(json_encode($pass));
}


?>