<?php
include("project_connect.php");
$companyID=$_POST["companyID"];
$userID=$_POST["userID"];
$productFolder=$_POST["productFolder"];
$oldFolder=$_POST["oldFolder"];


$secondSql=mysqli_query($connect,"select  * from project_product where companyID='$companyID' and productFolder='$oldFolder' ");

$count=mysqli_num_rows($secondSql);


class updateFolder{
	public $productID;
	public $userID;
	public $companyID;
	public $companyName;
	public $username;
	public $productName;
	public $tf;
	public $text;
}


$update=new updateFolder();
$counter=0;

if($count>0){
	echo ("[");
		while($fetch=mysqli_fetch_assoc($secondSql)){
			$counter=$counter+1;
			$update->productID=$fetch["productID"];
			$update->userID=$fetch["userID"];
			$update->companyID=$fetch["companyID"];
			$update->companyName=$fetch["companyName"];
			$update->username=$fetch["username"];
			$update->productName=$fetch["productName"];
			$update->tf=true;
			$update->text="Updated Succefully.";

$sql=mysqli_query($connect,"update project_product set productFolder='$productFolder' where companyID='$companyID' and productFolder='$oldFolder'");
			echo (json_encode($update));
			if($count>$counter){
			echo(",");
			}
		}
		echo ("]");

}
else{
echo ("[");
			$update->productID=$fetch["productID"];
			$update->userID="null";
			$update->companyID="null";
			$update->companyName="null";
			$update->username="null";
			$update->productName="null";
			$update->tf=false;
			$update->text="CANNOT Updated .";

echo ("]");
}

?>