<?php
include("project_connect.php");
$userID="101";
//$_POST["id"];
$selectSql=mysqli_query($connect,"select * from project_table where id='$userID'");
$count=mysqli_num_rows($selectSql);

class getShift{
	public $startShift;
	public $endShift;
	public $userID;
	public $username;
	public $email;
	public $role;
	public $tf;
	public $text;

}
$shift=new getShift();

if($count==1){
	$parse=mysqli_fetch_assoc($selectSql);
	$shift->startShift=$parse["startShift"];
	$shift->endShift=$parse["endShift"];
	$shift->userID=$parse["id"];
	$shift->username=$parse["username"];
	$shift->email=$parse["email"];
	$shift->role=$parse["role"];
	$shift->tf=true;
	$shift->text="get";
	echo(json_encode($shift));
}

else{
	$shift->startShift="null";
	$shift->endShift="null";
	$shift->userID="null";
	$shift->username="null";
	$shift->tf=false;
	$shift->text="Fail to get";	
echo(json_encode($shift));
}

?>