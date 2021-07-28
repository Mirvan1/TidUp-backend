<?php
include("project_connect.php");
$userID=$_POST["userID"];

$sql=mysqli_query($connect,"select * from project_table where id='$userID'");

class RoleAssign{
	public $roleVar;
	public $tf;
	public $text;
}
$role=new RoleAssign();


if($sql){
	$fetch=mysqli_fetch_assoc($sql);
	$role->roleVar=$fetch["role"];
	$role->tf=true;
	$role->text="success";
	echo (json_encode($role));

}
else{
$role->roleVar="null";
	$role->tf=false;
	$role->text="fail";	
	echo (json_encode($role));
}

?>