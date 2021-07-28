<?php
include("project_connect.php");
//include("signup.php");

//$companyID=$_GET["companyID"];
$companyName=$_POST["companyName"];
$mail=$_POST["email"];
function generateRandomString($length = 10) {
    return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
}
$generateRandom=generateRandomString();
$control=mysqli_query($connect,"select *from project_table where companyID='$generateRandom' ");
$count=mysqli_num_rows($control);
if($count==0){
	$companyID=$generateRandom; 
	$generateCompanyID=mysqli_query($connect,"update project_table set companyID = '$companyID',companyName='$companyName',role='manager' where email='$mail' ");


		//update ignore  project_table set companyID = 1 where id = (select id from (select MAX(id) maxID from project_table) as t));

		//"update project_table set companyID='$companyID', companyName='$companyName' where id=(select max(id) from project_table)");
}
$arr = array( 
    "name"=>$companyName, 
    "ID"=>$companyID);
        $jso=json_encode($arr);
        echo ($jso);
//echo $companyID;
?>
