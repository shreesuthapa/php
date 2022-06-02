<?php
/*when we have to write same code in multiple file then we make one file and that file is included eveywhere using require_once 'filename'*/
require_once 'DatabaseConnectivity.php';
try
{
if(isset($_POST['submit']))
$username=$_POST['username'];
$password=$_POST['password'];
$query="select londonMet_id ,password,username from student_register where username=:username";
$statement=$pdo->prepare($query);
$statement->bindValue(':username',$username);
$statement->execute();

$user=$statement->fetch();


if($user && password_verify($password, $user['password']))
{
	echo "sucess";
}
else
{

	header("Location:login.html");
}

}
catch(PDOException $e)
{
	echo $e->getMessage();
}

?>