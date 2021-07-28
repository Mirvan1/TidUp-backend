<?php
include("project_connect.php");

$search=$_POST["searchText"];
$companyID=$_POST["companyID"];

$sql=mysqli_query($connect,"select * from project_product where companyID='$companyID' and productName like '$search%'");

$count=mysqli_num_rows($sql);

class searchItem{
	public $productIDList;
	public $userIDList;
	public $companyIDList;
	public $usernameList;
	public $productNameList;
	public $productPriceList;
	public $productQuantityList;	
	public $productDateList;
	public $productBarcodeList;
	public $productNoteList;
	public $productPhotoList;
	public $productFolderList;
	public $text;
	public $tf;
}

$searchPro=new searchItem();

$sayac=0;

if($count>0){

	echo ("[");
		while($bilgi=mysqli_fetch_assoc($sql))
		{
			$sayac=$sayac+1;
			$searchPro->productIDList=$bilgi["productID"];
			$searchPro->userIDList=$bilgi["userID"];
			$searchPro->companyIDList=$bilgi["companyID"];
			$searchPro->usernameList=$bilgi["username"];
			$searchPro->productNameList=$bilgi["productName"];
			$searchPro->productPriceList=$bilgi["productPrice"];
			$searchPro->productQuantityList=$bilgi["productQuantity"];
			$searchPro->productDateList=$bilgi["productDate"];
			$searchPro->productBarcodeList=$bilgi["productBarcode"];
			$searchPro->productNoteList=$bilgi["productNote"];
			$searchPro->productPhotoList=$bilgi["productPhoto"];
			$searchPro->text="found";

			$searchPro->productFolderList=$bilgi["productFolder"];
			
			if($searchPro->productNameList!=="null"){
				$searchPro->tf=true;
			echo (json_encode($searchPro));
			}
			else{
				$searchPro->tf=false;
				echo (json_encode($searchPro));
			}
			if($count>$sayac){
			echo(",");
			}
		}
		echo("]");
}
else{
	echo ("[");

			$searchPro->productIDList=null;
			$searchPro->userIDList=null;
			$searchPro->companyIDList=null;
			$searchPro->usernameList=null;
			$searchPro->productNameList=null;
			$searchPro->productPriceList=null;
			$searchPro->productQuantityList=null;
			$searchPro->productDateList=null;
			$searchPro->productBarcodeList=null;
			$searchPro->productNoteList=null;
			$searchPro->productPhotoList=null;
			$searchPro->productFolderList=null;
			$searchPro->text="not found";
			$searchPro->tf=false;
			echo (json_encode($searchPro));
	echo ("]");
}

?>