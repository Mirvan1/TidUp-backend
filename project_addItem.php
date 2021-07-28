<?php
include("project_connect.php");
$userID=$_POST["userID"];
$companyID=$_POST["companyID"];
$companyName=$_POST["companyName"];
$username=$_POST["username"];
$productName=$_POST["productName"];
$productPrice=$_POST["productPrice"];
$productQuantity=$_POST["productQuantity"];
$productDate=$_POST["productDate"];
$productBarcode=$_POST["productBarcode"];
$productNote=$_POST["productNote"];
$productPhoto=$_POST["productPhoto"];
$productFolder=$_POST["productFolder"];

// 'a','a','a','a','a','a','a','a','a','a','a','a'

$name=rand(0,1000000).rand(0,1000000).rand(0,1000000);
$path="/wamp64/www/images/$name.jpg";
$imagePath="http://192.168.1.107/images/$name.jpg";

$addSl=mysqli_query($connect,"insert into project_product(userID,companyID,companyName,username,productName,productPrice,productQuantity,
	productDate,productBarcode,productNote,productPhoto,productFolder) values('$userID','$companyID','$companyName','$username',
	'$productName','$productPrice','$productQuantity','$productDate','$productBarcode','$productNote','$imagePath','$productFolder')");
$selectSql=mysqli_query($connect,"select * from project_product where companyID='$companyID' and productBarcode='$productBarcode'");//barkodu deyisdir
$count=mysqli_num_rows($selectSql);
class addItemClass{
	public $username;
	public $productFolder;
	public $tf;
	public $text;
	// "insert into project_table(email,username,password,verificationCode, status,companyID) values('$mail','$username','$password','$verificationCode','$status','$companyID')"
}
$addItem=new addItemClass();

$info=mysqli_fetch_assoc($selectSql);

if($selectSql){
	
	file_put_contents($path,base64_decode($productPhoto));
	// $st=$info["productBarcode"];
	// if($count==0){}
	$addItem->username=$info["username"];
	$addItem->productFolder=$info["productFolder"];
	$addItem->tf=true;
	$addItem->text="Item added successfully";

	echo (json_encode($addItem));


}
else{
	//$infor=mysqli_fetch_assoc($addSql);
	//file_put_contents($path,base64_decode($productPhoto));
	$addItem->username=null;
	$addItem->productFolder=null;
	$addItem->tf=false;
	$addItem->text="www";	
	echo (json_encode($addItem));
}

?>