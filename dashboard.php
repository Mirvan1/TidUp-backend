<?php
include("project_connect.php");
$companyID="7da386APCf";//$_POST["companyID"];


$totalQuantity=mysqli_query($connect,"select sum(productQuantity) as quantity from project_product where companyID='$companyID'");
$row = mysqli_fetch_assoc($totalQuantity); 
$sumQuantity = $row['quantity'];

$item=mysqli_query($connect,"select productName from project_product where companyID='$companyID' and 
productName<>'null'");
$numItem=mysqli_num_rows($item);

$folder=mysqli_query($connect,"select productName from project_product where companyID='$companyID' and productName='null'");
$numFolder=mysqli_num_rows($folder);

$totalPrice=mysqli_query($connect,"select sum(productPrice) as price from project_product where companyID='$companyID'");
$rowPrice = mysqli_fetch_assoc($totalPrice); 
$sumPrice = $rowPrice['price'];

$countManagers=mysqli_query($connect,"select role from project_table where companyID='$companyID' and role='manager'");
$numManager=mysqli_num_rows($countManagers);

$countEmployees=mysqli_query($connect,"select role from project_table where companyID='$companyID' and role='employee'");
$numEmployees=mysqli_num_rows($countEmployees);

class Dashboard{
	public $quantity;
	public $item;
	public $folder;
	public $price;
	public $manager;
	public $employee;

}

$dash=new Dashboard();

if($totalQuantity && $item && $folder && $totalPrice && $countManagers && $countEmployees)
{
	$dash->quantity="".$sumQuantity;
	$dash->item="".$numItem;
	$dash->folder="".$numFolder;
	$dash->price="".$sumPrice;
	$dash->manager="".$numManager;
	$dash->employee="".$numEmployees;
	echo(json_encode($dash));

}
else{
	$dash->quantity="null";
	$dash->item="null";
	$dash->folder="null";
	$dash->price="null";
	$dash->manager="null";
	$dash->employee="null";
	echo(json_encode($dash));


}
?>