<?php
include("project_connect.php");

$id=$_POST["id"];
//101;//
$companyID=$_POST["companyID"];
//"7da386APCf";//

$selectSql=mysqli_query($connect,"select * from project_table where id='$id' and companyID='$companyID'");

$count=mysqli_num_rows($selectSql);

class userProfile{
	public $email;
	public $username;
	public $password;
	public $companyID;
	public $companyName;
	public $role;
	public $text;
	public $tf;
}

$profile=new userProfile();

if($count==1){
	$parse=mysqli_fetch_assoc($selectSql);
	$profile->email=$parse["email"];
	$profile->username=$parse["username"];
	$profile->password=$parse["password"];
	$profile->companyID=$parse["companyID"];
	$profile->companyName=$parse["companyName"];
	$profile->role=$parse["role"];
	$profile->text="success";
	$profile->tf=true;
	echo (json_encode($profile));
}
else{
	
	$profile->email=null;
	$profile->username=null;
	$profile->password=null;
	$profile->companyID=null;
	$profile->companyName=null;
	$profile->role="null";
	$profile->text="did not find any profile";
	$profile->tf=false;
	echo (json_encode($profile));
}

?>

