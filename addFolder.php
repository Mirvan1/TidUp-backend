<?php
include("project_connect.php");
$userID=$_POST["userID"];
$companyID=$_POST["companyID"];
$productFolder=$_POST["productFolder"];

//$sql=mysqli_query($connect,"insert into project_product(productFolder,userID,$companyID) values('$productFolder','$userID','$companyID')");
$sql_control=mysqli_query($connect,"select productFolder from project_product where productFolder ='$productFolder'");
$count=mysqli_num_rows($sql_control);
$parse_cont=mysqli_fetch_assoc($sql_control);
if($count<1){
$sqla=mysqli_query($connect,"insert into project_product(productFolder,userID,companyID,companyName,username,productName,productPrice,productDate,productBarcode,productNote,productPhoto,productQuantity) values('$productFolder','$userID','$companyID','null','null','null','null','ddd','ddd','ddd','null',0)");
$parse=mysqli_fetch_assoc($sqla);
//$value=array('projecFolder'=> $productFolder,'comp'=>$companyID,'user'=>$userID);
$resultstring = $parse['productFolder'];
$arr=array("productFolder"=>$productFolder,"tf"=>true);
echo (json_encode($arr));
}
else{
	$resultstring = $parse_cont['productFolder'];
$arr=array("productFolder"=>$productFolder,"tf"=>false);
echo (json_encode($arr));

}






?>