<?php
include("project_connect.php");
$userID=$_POST["userID"];
$companyID=$_POST["companyID"];

$sql=mysqli_query($connect,"select *, COUNT(*) as count 
            from project_product 
            where companyID  = '$companyID' 
            GROUP BY productFolder
            ORDER BY count(*) DESC LIMIT 100");
$secondSql=mysqli_query($connect,"select  * from project_product where companyID='$companyID' ");

$count=mysqli_num_rows($sql);
// $folderSQL=mysqli_query($connect,"select projectFolder, COUNT(*) as count 
//             from project_product 
//             where companyID  = '$companyID' 
//             GROUP BY projectFolder
//             ORDER BY count(*) DESC LIMIT 3 ");
// $countFolder=mysqli_num_rows($folderSQL);
// echo ($countFolder);
//userID='$userID'
class itemClass{
	//public $productID;
	public $username;
	public $productName;
	 public $productPrice;
	 public $productQuantity;
	 public $productDate;
	 public $productBarcode;
	 public $productNote;
	public $productFolder;
	
	 public $tf;

}
$item=new itemClass();
$sayac=0;

if($count>0){
	//

	echo ("[");

		while($bilgi=mysqli_fetch_assoc($sql))
		{	//	if($countFolder)
			//$bilgi=mysqli_fetch_assoc($secondSql);
			$sayac=$sayac+1;
			//$item->productID=$bilgi["productID"];
			$item->username=$bilgi["username"];
			$item->productName=$bilgi["productName"];
			$item->productPrice=$bilgi["productPrice"];
			$item->productQuantity=$bilgi["productQuantity"];
			$item->productDate=$bilgi["productDate"];
			$item->productBarcode=$bilgi["productBarcode"];
			$item->productNote=$bilgi["productNote"];
			$item->productFolder=$bilgi["productFolder"];
			// $item->productPhoto=$bilgi["productPhoto"];
			// $item->userID=$bilgi["userID"];
			// $item->companyID=$bilgi["companyID"];
			// $item->companyName=$bilgi["companyName"];
			$item->tf=true;
			echo (json_encode($item));
			if($count>$sayac){
			echo(",");
			}
		}
		echo("]");
}
else{
	echo ("[");
				$item->username=null;
			$item->productName=null;
			$item->productPrice=null;
			$item->productQuantity=null;
			$item->productDate=null;
			$item->productBarcode=null;
			$item->productNote=null;
			$item->productFolder=null;
			$item->tf=false;
			echo (json_encode($item));
	echo ("]");
}
?>