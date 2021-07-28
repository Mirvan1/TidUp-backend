<?php
include("project_connect.php");

//$companyName=$_POST["companyName"];
$mail=$_POST["email"];
$companyID=$_POST["companyID"];

$control=mysqli_query($connect,"select *from project_table where companyID='$companyID' ");
$count=mysqli_num_rows($control);
$companyName=mysqli_query($connect,"select companyName from project_table where companyID='$companyID'");
$result = mysqli_fetch_assoc($companyName);
$resultstring = $result['companyName'];
if($count>0){

$joinCompany=mysqli_query($connect,"update project_table set companyID='$companyID', companyName='$resultstring',role='employee' where email='$mail'");

}

$arr=array(
	"IDJoin"=>$companyID,
	"NameJoin"=>$resultstring
	);
$jsons=json_encode($arr);
echo ($jsons);
?>