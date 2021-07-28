<?php
include("project_connect.php");

$productID=$_POST["productID"];
$userID=$_POST["userID"];

$selectSql=mysqli_query($connect,"select * from project_product where productID='$productID' and userID='$userID'");
$deleteSql=mysqli_query($connect,"delete from project_product where productID='$productID' and userID='$userID'");

$count=mysqli_num_rows($selectSql);

class deleteItem{
	public $productID;
	public $userID;
	public $companyID;
	public $companyName;
	public $username;
	public $productName;
	public $tf;
	public $text;
}
$delete=new deleteItem();

if($count>0){
$parse=mysqli_fetch_assoc($selectSql);
		$delete->productID=$parse["productID"];
		$delete->userID=$parse["userID"];
		$delete->companyID=$parse["companyID"];
		$delete->companyName=$parse["companyName"];
		$delete->username=$parse["username"];
		$delete->productName=$parse["productName"];
		$delete->tf=true;
		$delete->text="item deleted successfully";
echo(json_encode($delete));

}
else{
		$delete->productID=null;
		$delete->userID=null;
		$delete->companyID=null;
		$delete->companyName=null;
		$delete->username=null;
		$delete->productName=null;
		$delete->tf=false;
		$delete->text="item can not deleted";	
		echo(json_encode($delete));
}
?>