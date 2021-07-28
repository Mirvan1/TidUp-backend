<?php
include("project_connect.php");
$userID=$_POST["userID"];
$productID=$_POST["productID"];

$productName=$_POST["productName"];
$productPrice=$_POST["productPrice"];
$productQuantity=$_POST["productQuantity"];
$productDate=$_POST["productDate"];
$productBarcode=$_POST["productBarcode"];
$productNote=$_POST["productNote"];


$updateSql=mysqli_query($connect,"update project_product set productName='$productName',productPrice='$productPrice',productQuantity='$productQuantity', productDate='$productDate',productBarcode='$productBarcode', productNote='$productNote' where userID='$userID' and productID='$productID'");

$selectSql=mysqli_query($connect,"select * from project_product where userID='$userID' and productID='$productID'");

$count=mysqli_num_rows($selectSql);

class updateItem{
	public $productID;
	public $userID;
	public $companyID;
	public $companyName;
	public $username;
	public $productName;
	public $tf;
	public $text;
}

$update=new updateItem();

if($count==1){
	$info=mysqli_fetch_assoc($selectSql);
	$update->productID=$info["productID"];
	$update->userID=$info["userID"];
	$update->companyID=$info["companyID"];
	$update->companyName=$info["companyName"];
	$update->username=$info["username"];
	$update->productName=$info["productName"];
	$update->tf=true;
	$update->text="item updated succesfully";
	echo (json_encode($update));
}
else{
	
	
	$update->productID=null;
	$update->userID=null;
	$update->companyID=null;
	$update->companyName=null;
	$update->username=null;
	$update->productName=null;
	$update->tf=false;
	$update->text="item can not updated ";
	echo (json_encode($update));
}
?>