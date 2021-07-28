<?php
include("project_connect.php");
$userID=$_POST["userID"];
$productFolder=$_POST["productFolder"];
$selectSql=mysqli_query($connect,"select *  from project_product where userID='$userID' and productFolder='$productFolder'");
// $sql=mysqli_query($connect,"delete from project_product where userID='$userID' and productFolder='$productFolder'");
$count=mysqli_num_rows($selectSql);
class deleteFolder{
		public $username;
		public $productFolder;
		public $tf;
		public $text;
}

$delete=new deleteFolder();
$counter=0;	

// if($selectSql){
// 	$par=mysqli_fetch_assoc($selectSql);
// 	$checkFolder=$par["productFolder"];
// 	if($checkFolder){
		if($count>0){
		echo ("[");
		while($parse=mysqli_fetch_assoc($selectSql)){
			$counter=$counter+1;
			$delete->username=$parse["username"];
			$delete->productFolder=$parse["productFolder"];
			$delete->tf=true;
			$delete->text="folder deleted successfully";
			echo (json_encode($delete));
			if($count>$counter){
			echo(",");
			}
		}
		echo ("]");
		}
	//}
else{
	echo ("[");
	$delete->username=null;
	$delete->productFolder=null;
	$delete->tf=false;
	$delete->text="there is no folder";
	echo (json_encode($delete));
	echo ("]");
	}
//}
// else{
// 	echo ("[");
// $delete->username=null;
// 	$delete->productFolder=null;
// 	$delete->tf=false;
// 	$delete->text="folder can not deleted";
// 	echo (json_encode($delete));	
// echo ("]");
// }
$sql=mysqli_query($connect,"delete from project_product where userID='$userID' and productFolder='$productFolder'");
	
?>