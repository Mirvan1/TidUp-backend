<?php
include("project_connect.php");
$userID=$_POST["userID"];
$productBarcode=$_POST["productBarcode"];

$selectSql=mysqli_query($connect,"select * from project_product where userID='$userID' and productBarcode='$productBarcode'");

$count=mysqli_num_rows($selectSql);

class findBarcode{
	public $companyID;
	public $companyName;
	public $username;
	public $productName;
	public $productPrice;
	public $productQuantity;
	public $productDate;
	public $productBarcode;
	public $productNote;
	public $productPhoto;
	public $productFolder;
	public $tf;
	public $text;

}

$barcode=new findBarcode;
if($count==1){
		$parse=mysqli_fetch_assoc($selectSql);
		$barcode->companyID=$parse["companyID"];
		$barcode->companyName=$parse["companyName"];
		$barcode->username=$parse["username"];
		$barcode->productName=$parse["productName"];
		$barcode->productPrice=$parse["productPrice"];
		$barcode->productQuantity=$parse["productQuantity"];
		$barcode->productDate=$parse["productDate"];
		$barcode->productBarcode=$parse["productBarcode"];
		$barcode->productNote=$parse["productNote"];
		$barcode->productPhoto=$parse["productPhoto"];
		$barcode->productFolder=$parse["productFolder"];
		$barcode->tf=true;
		$barcode->text="Product find";
		echo (json_encode($barcode));
}

else{

		$barcode->companyID=null;
		$barcode->companyName=null;
		$barcode->username=null;
		$barcode->productName=null;
		$barcode->productPrice=null;
		$barcode->productQuantity=null;
		$barcode->productDate=null;
		$barcode->productBarcode=null;
		$barcode->productNote=null;
		$barcode->productPhoto=null;
		$barcode->productFolder=null;
		$barcode->tf=false;
		$barcode->text="Product can not find";	
	echo (json_encode($barcode));


}

?>