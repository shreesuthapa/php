<?php 
if(isset($_POST['submitRecord']))
{
    $first_Name=$_POST['first_Name'];
    $last_Name=$_POST['last_Name'];
    $birth_Date=$_POST['birth_Date'];
    $gender=$_POST['gender'];
    $username=$_POST['username'];
    $password=password_hash($_POST['password'],PASSWORD_DEFAULT);
    $phone_Number=$_POST['phone_Number'];
    $subject=$_POST['subject'];

    echo $first_Name."<br/>";
    echo $last_Name."<br/>";
    echo $birth_Date."<br/>";
    echo $gender."<br/>";
    echo $username."<br/>";
    echo $password."<br/>";
    echo $phone_Number."<br/>";
    echo $subject."<br/>";
    
    $server="localhost";
    $dataBaseName="islingtoncollege";
    $user="root";
    $pass="";
    try
    {
    $pdo=new PDO("mysql:host=$server;dbname=$dataBaseName",$user,$pass);
    if($pdo)
    {
        echo "our $dataBaseName is connected sucessfully";
    }
    

   $query='insert into student_register(first_Name, last_Name, birth_Date, gender, username, password, phone_Number, subject) values(:first_Name, :last_Name, :birth_Date, :gender, :username, :password, :phone_Number, :subject)';
   $statement=$pdo->prepare($query);
   $statement->execute([
    ':first_Name'=>$first_Name,
    ':last_Name'=>$last_Name,
    ':birth_Date'=>$birth_Date,
    ':birth_Date'=>$birth_Date,
    ':gender'=>$gender,
    ':username'=>$username,
    ':password'=>$password,
    ':phone_Number'=>$phone_Number,
    ':subject'=>$subject
   ]);
   header('Location:login.html');
   exit();
}
catch(PDOException $e)
{
    echo $e->getMessage(); 
}
finally
{
    unset($pdo);
    unset($statement);
}
}
?>