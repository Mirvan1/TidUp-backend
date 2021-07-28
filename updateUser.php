<?php
include("project_connect.php");

$id=$_POST["id"];
$companyID=$_POST["companyID"];
//
//
$username=$_POST["username"];
//"hastryuser";
$currentPassword=$_POST["currentPassword"];
//"hashpass";
$newPassword=$_POST["newPassword"];
//"hash";


$selectSql=mysqli_query($connect,"select * from project_table where id='$id' and companyID='$companyID'");
$count=mysqli_num_rows($selectSql);
//$newPassword_hash=password_hash($newPassword, PASSWORD_BCRYPT);
class updateUser{
	
	public $text;
	public $tf;
	public $username;
	public $companyID; 
}
$update=new updateUser();
//$currentPassword==$parse["password"]

if($selectSql){
	$parse=mysqli_fetch_assoc($selectSql);
	// echo($currentPassword);
	// echo ($parse["password"]);
	// echo($currentPassword==$parse["password"]);
	if($currentPassword==$parse["password"]){
		$newPassword_hash=password_hash($newPassword, PASSWORD_BCRYPT);
$updateSql=mysqli_query($connect,"update project_table set username='$username', 
	password='$newPassword_hash' where id='$id' and companyID='$companyID'");	
	$update->username=$parse["username"];
	$update->companyID=$parse["companyID"];
	$update->tf=true;
	$update->text="updated successfully";
	echo(json_encode($update));
}
else{$update->username=null;
	$update->companyID=null;
	$update->tf=false;
	$update->text="current password incorrect";
	echo(json_encode($update));

}
}
else{
	$update->username=null;
	$update->tf=false;
	$update->text="can not updated.try again..";
	echo(json_encode($update));
}
?>