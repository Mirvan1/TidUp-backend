<?php
include("project_connect.php");
$userID=$_POST["userID"];
$sql=mysqli_query($connect,"select * from project_table where id='$userID'");
$count=mysqli_num_rows($sql);

class doManager{
	public $userID;
	public $companyID;
	public $tf;
	public $text;


}
$do=new doManager();

if($count==1){
$parse=mysqli_fetch_assoc($sql);
$update=mysqli_query($connect,"update project_table set role='manager' where id='$userID'");
$do->userID=$parse["id"];
$do->companyID=$parse["companyID"];
$do->tf=true;
$do->text="succesfully ";
	
	echo (json_encode($do));

}
else{
	
	$do->userID="null";
$do->companyID="null";
$do->tf=false;
$do->text="Try Again..";
echo (json_encode($do));
}
?>