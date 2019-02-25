<!doctype html>
<html>
<head>
<title>Registeration form</title>
    <style> 
        body{
            
    margin-top: 100px;
    margin-bottom: 100px;
    margin-right: 150px;
    margin-left: 80px;
    background-color: azure ;
    color: palevioletred;
    font-family: verdana;
    font-size: 100%
    
        }
            h1 {
    color: indigo;
    font-family: verdana;
    font-size: 100%;
}
         h2 {
    color: indigo;
    font-family: verdana;
    font-size: 100%;
}
            
        
    </style>
</head>
<body>
   
    <center><h1>CREATE REGISTRATION AND LOGIN FORM USING PHP AND MYSQL</h1></center>
   
<p><a href="register.php">Register</a> | <a href="login.php">Login</a></p>
    <center><h2>Registration Form</h2></center>
<form action="" method="POST">
    <legend>
    <fieldset>
        
Username: <input type="text" name="user"><br />
Password: <input type="password" name="pass"><br />	
<input type="submit" value="Register" name="submit" />
            
        </fieldset>
        </legend>

</form>
    
<?php
if(isset($_POST["submit"])){

if(!empty($_POST['user']) && !empty($_POST['pass'])) {
	$user=$_POST['user'];
	$pass=$_POST['pass'];

	$con=mysql_connect('localhost','root','') or die(mysql_error());
	mysql_select_db('user_registration') or die("cannot select DB");

	$query=mysql_query("SELECT * FROM login WHERE username='".$user."'");
	$numrows=mysql_num_rows($query);
	if($numrows==0)
	{
	$sql="INSERT INTO login(username,password) VALUES('$user','$pass')";

	$result=mysql_query($sql);


	if($result){
	echo "Account Successfully Created";
	} else {
	echo "Failure!";
	}

	} else {
	echo "That username already exists! Please try again with another.";
	}

} else {
	echo "All fields are required!";
}
}
?>

</body>
</html>
