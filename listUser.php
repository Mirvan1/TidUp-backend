<?php
include("project_connect.php");
$userID=$_POST["userID"];
$companyID=$_POST["companyID"];

$selectSql=mysqli_query($connect,"select * from project_table where companyID='$companyID' and role='employee'");
$count=mysqli_num_rows($selectSql);

class manageWorker{
	
	public $username;
	public $email;
	public $role;
	public $userID;
	public $text;
	public $tf;
}
$manage=new manageWorker();
$sayac=0;

if($count>0){
	echo ("[");
	while($parse=mysqli_fetch_assoc($selectSql)){
		$sayac=$sayac+1;
		$manage->username=$parse["username"];
		$manage->email=$parse["email"];
		$manage->role=$parse["role"];
		$manage->userID=$parse["id"];
		$manage->text="Users";
		$manage->tf=true;
		echo (json_encode($manage));
			if($count>$sayac){
			echo(",");
			}


	}
echo("]");

}
else{
echo ("[");
		$manage->username="null";
		$manage->email="null";
		$manage->role="null";
		$manage->userID="null";
		$manage->text="Fail";
		$manage->tf=false;
		echo (json_encode($manage));
echo("]");
}
?>