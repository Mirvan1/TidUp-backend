<?php
include("project_connect.php");
$productFolder=$_POST["productFolder"];
$companyID=$_POST["companyID"];
//echo $productFolder." - ".$companyID;
$sql=mysqli_query($connect,"select * from project_product where productFolder='$productFolder' and companyID='$companyID' and productName<>'null'");
$count=mysqli_num_rows($sql);

class itemClass{
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
	public $tf;
	public $tx;

}
$item=new itemClass();
$sayac=0;

if($count>0){

	echo ("[");
		while($bilgi=mysqli_fetch_assoc($sql))
		{
			$sayac=$sayac+1;
			$item->productIDList=$bilgi["productID"];
			$item->userIDList=$bilgi["userID"];
			$item->companyIDList=$bilgi["companyID"];
			$item->usernameList=$bilgi["username"];
			$item->productNameList=$bilgi["productName"];
			$item->productPriceList=$bilgi["productPrice"];
			$item->productQuantityList=$bilgi["productQuantity"];
			$item->productDateList=$bilgi["productDate"];
			$item->productBarcodeList=$bilgi["productBarcode"];
			$item->productNoteList=$bilgi["productNote"];
			$item->productPhotoList=$bilgi["productPhoto"];
			$item->productFolderList=$bilgi["productFolder"];
			
				$item->tf=true;
				$item->tx="while1";
			echo (json_encode($item));
			if($count>$sayac){
			echo(",");
			}
			// if($item->productNameList!=="null" && $count>$sayac){
				
				
			
			// 	// if( || ){
			
			// 	//  }
			// }
			// else{
			// 	$item->tf=false;
			// 	$item->tx="while0";
			// 	echo (json_encode($item));
			// }
			
		}
		echo("]");
}
else{
	echo ("[");

			$item->productIDList="null";
			$item->userIDList="null";
			$item->companyIDList="null";
			$item->usernameList="null";
			$item->productNameList="null";
			$item->productPriceList="null";
			$item->productQuantityList="null";
			$item->productDateList="null";
			$item->productBarcodeList="null";
			$item->productNoteList="null";
			$item->productPhotoList="null";
			$item->productFolderList="null";
			$item->tf=false;
			$item->tx="false";
			echo (json_encode($item));
	echo ("]");
}
?>