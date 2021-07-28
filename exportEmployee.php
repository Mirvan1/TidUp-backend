<?php
include("project_connect.php");
$companyID=$_POST["companyID"];
 
 $sql=mysqli_query($connect,"select * from project_table where companyID='$companyID'");

 $count=mysqli_num_rows($sql);

 class exportEmployee{

 	public $username;
 	public $role;
 	public $startShift;
 	public $endShift;
 	public $companyName;
 	public $tf;
 	public $text;

 }
 $export=new exportEmployee();
$sayac=0;
 if($count>0){
	echo("[");
 	while($parse=mysqli_fetch_assoc($sql)){
 		$sayac=$sayac+1;
 		$export->username=$parse["username"];
  		$export->role=$parse["role"];
   		$export->startShift=$parse["startShift"];
		$export->endShift=$parse["endShift"];
   	    $export->companyName=$parse["companyName"];
		$export->tf=true;
		$export->text="Succesfully load data";

		echo (json_encode($export));
		if($count>$sayac){
		echo(",");
		}   	    

	}	
	echo("]");
 }
 else{	
 echo ("[");
		$export->username="null";
  		$export->role="null";
   		$export->startShift="null";
		$export->endShift="null";
   	    $export->companyName="null";
		$export->tf=false;
		$export->text="Fail load data";

		echo (json_encode($export));
		echo ("]");

 }
 ?>