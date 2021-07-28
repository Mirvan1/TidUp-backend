<?php
include("project_connect.php");
$startShift=$_POST["startShift"];
//"27.05.2021-15:30";
//
$endShift=$_POST["endShift"];
//"27.05.2021-15:30";
//
$userID=$_POST["id"];

$sql=mysqli_query($connect,"select * from project_table where id='$userID'");
$count=mysqli_num_rows($sql);

class shiftDate{
	public $userID;
	public $startShift;
	public $endShift;
	public $username;
	public $role;
	public $text;
	public $tf;

}
$shift=new shiftDate();

if($count==1){
	$parse=mysqli_fetch_assoc($sql);
	$updateSql=mysqli_query($connect,"update project_table set startShift='$startShift',endShift='$endShift' where id='$userID'");
	$shift->userID=$parse["id"];
	$shift->startShift=$parse["startShift"];
	$shift->endShift=$parse["endShift"];
	$shift->username=$parse["username"];
	$shift->role=$parse["role"];
	$shift->text="Added to database";
	$shift->tf=true;
	echo (json_encode($shift));
}
else{
	$shift->userID="null";
	$shift->startShift="null";
	$shift->endShift="null";
	$shift->username="null";
	$shift->role="null";
	$shift->text="Can not find user";
	$shift->tf=false;
	echo (json_encode($shift));	


}
?>