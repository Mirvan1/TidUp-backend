<?php
include("project_connect.php");
error_reporting(0);
$mail=mysqli_real_escape_string($connect,$_POST["email"]);
$passwordHash=mysqli_real_escape_string($connect,$_POST["password"]);

$control=mysqli_query($connect,"select * from project_table where email='$mail'");
$count=mysqli_num_rows($control);

class UserLogin
{
		public $id;
		public $username;
		public $mail;
		public $password;
		public $role;
		public $tf;
		public $text;
		public $companyID;
		public $companyName;
}
$user=new UserLogin();

if($count>0){
	$parse=mysqli_fetch_assoc($control);
	$status=$parse["status"];
	$id=$parse["id"];
	$username=$parse["username"];
	$mail=$parse["email"];
	$password=$parse["password"];
	$role=$parse["role"];
	$companyID=$parse["companyID"];
	$companyName=$parse["companyName"];
//error_reporting(0);		
if(password_verify($passwordHash, $password)){
	if($status==1){	
			if($companyID!="null"){
			$user->id=$id;	
			$user->username=$username;
			$user->mail=$mail;
			$user->password=$password;
			$user->role=$role;
			$user->tf=true;
			$user->text="Success to login";
			$user->companyID=$companyID;
			$user->companyName=$companyName;
			echo (json_encode($user));}
		else{
		$user->tf=false;
		$user->text="You have to join or create any company";
		$user->id=$id;
		$user->password=$password;
		$user->role=$role;
		$user->username=$username;
		$user->mail=$mail;
		$user->companyID=$companyID;
		$user->companyName=$companyName;
		echo (json_encode($user));
		}

	}
	else{
		$user->tf=false;
		$user->text="You have to approve account using mail";
		$user->id=$id;
		$user->password=$password;
		$user->role=$role;
		$user->username=$username;
		$user->mail=$mail;
		$user->companyID=$companyID;
		$user->companyName=$companyName;
		echo (json_encode($user));
		}
	}
	else{//passwrod
		
			$user->id=$id;	
			$user->username=$username;
			$user->mail=$mail;
			$user->password=$password;
			$user->tf=false;
			$user->text="Wrong password";
			$user->companyID=$companyID;
			$user->companyName=$companyName;
			echo (json_encode($user));
	}

}
else{
		$user->tf=false;
		$user->text="there is no user in database";
		$user->id="null";
		$user->password="null";
		$user->role="null";
		$user->username="null";
		$user->mail="null";
		$user->companyID="null";
		$user->companyName="null";
		echo (json_encode($user));
}

?>