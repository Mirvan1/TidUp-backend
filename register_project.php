<?php
include("project_connect.php");
//error_reporting(0);
$mail=$_POST["email"];
$username=$_POST["username"];
$password=$_POST["password"];
$verificationCode=rand(0,10000).rand(0,10000); 
$status="0";
$companyID="null";
$control=mysqli_query($connect,"select * from project_table where email='$mail' ");
$count=mysqli_num_rows($control);

class User{
    public $text;
    public $tf;
}
$user=new User();

$password_hash=password_hash($password, PASSWORD_BCRYPT);

//if($count>0){
        // $user->text="This email used before please try ankjkjkkjother email";
        // $user->name=$username;
        // $user->apmail=$mail;
//$bilgi=mysqli_fetch_assoc($sql)
  if($count>0){

    $user->text=" This email is exist.";
    $user->tf=false;
//     $tf=false;
//         $value = array( 
//     "name"=>$username, 
//     "email"=>$mail,
// "tf"=>$tf);
//         $jsonto=json_encode($value);
        echo(json_encode($user));
}
else{

$addUser=mysqli_query($connect,"insert into project_table(email,username,password,verificationCode, status,companyID) values('$mail','$username','$password_hash','$verificationCode','$status','$companyID')");
//echo "Success";
    //mail
    $website="http://robertrobert.rf.gd/verificationAccount.php?email=".$mail."&verificationCode=".$verificationCode."";
    $to=$mail;
    $subject="Activate user account";
    $text="Hi,".$username."\n Please activate account ,project <a href='".$website."'>Approve </a>\n";
$from="from: info@mirvan.com";
$from .="MIME-Version: 1.0\r\n";
$from .="Content-Type: text/html; charset=UTF-8\r\n";
mail($to,$subject,$text,$from);


//   $user->text="you have to verificate account using email then log in account";
//         $user->name=$username;
// //          $user->apmail=$mail;
// $value = array( 
//     "name"=>$username, 
//     "email"=>$mail,
// "tf"=>$tf);
  $user->text=" Successful";
    $user->tf=true;

echo(json_encode($user));
}

?>

