<!DOCTYPE html>




<?php


session_start();
require_once ('connection.php');



if (isset($_POST['name']) && isset($_POST['user_name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirm_password']) && isset($_POST['gender'])) {
    $name = $_POST['name'];
    $username = $_POST['user_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $gender = $_POST['gender'];

   

    if (empty($name) || empty($username) || empty($email) || empty($password) || empty($confirm_password) || empty($gender)) {
      die("All fields must be filled out  ");
    }


    if ($password !== $confirm_password) {
      die("The two passwords do not match  ");
    }


    if (strlen($password) < 10 || strlen($password) > 14 ||
        !preg_match("#[0-9]+#", $password) ||
        !preg_match("#[a-z]+#", $password) ||
        !preg_match("#[A-Z]+#", $password) ||
        !preg_match("#[\+\$\#\@\%\^\&\*\<\>\(\)\[\]\{\}\|\:\;]+#", $password)) {
          die( "The password must contain an uppercase letter, a lowercase letter,
           a number, a special character, and between 10 and 14 characters  ");
    }

  
    if (strlen($username) < 10 || strlen($username) > 15) {
      die("Username must be between 10 and 15 characters long  ");
    }


    if ($gender !== "Male" && $gender !== "Female") {
     die("Please specify the gender correctly  ");
    }


    $welcome_message = "welcome  $name! \n";
    $welcome_message .= "user name:  $username \n";
    $welcome_message .= "email:  $email \n";
    $welcome_message .= "sex:  $gender \n";


   
    echo $welcome_message;
}

if(isset($_POST['submit']))
{
$name=$_POST['name'];
$user_name=$_POST['user_name'];
$Email= $_POST['email'];
$password= $_POST['password'];
$number_phone= $_POST['number_phone'];
$gender= $_POST['gender'];


$sql = "INSERT INTO usertable (Name, UserName, Email, Password,NumberPhone,Gender)
VALUES ('$name', '$user_name', '$Email', '$password', '$number_phone', '$gender')";
$result = mysqli_query($conn, $sql);
if($result){
echo"inseet true";
}else {
  echo"insert false";
}


}


?>




<html>

<head>
<meta charset="UTF-8">
  <title>sign up page </title>
</head>

<link rel="stylesheet" href="css/signup.css">


<body>

<header>
  <div class="logo-wrapper">
    <div class="logo">
      <img src="img/money.png" alt="Logo">
      <h1>Expense Tracker</h1>
    </div>
  
  </div>
  <nav>
    <ul>
      <li><a href="login.php">Log In</a></li>
    </ul>
  </nav>
</header>




 <form method="POST">

 <div class="main">


<h2>SIGN UP FORM</h2>

 <p>
 <input type="text" name="name" class="box" placeholder="enter your name" required>
 </p>



 <p>
<input type="text" name="user_name"  class="box" placeholder="enter your user name" required>
 </p>
 

 <p>
<input type="text" name="email"  class="box" placeholder="enter your email" required>
 </p>



 <p>
 <input type="password" name="password"  class="box" maxlength="14"  placeholder="enter your password" required>
 </p>



 <p>
 <input type="password" name="confirm_password"  class="box" maxlength="14"  placeholder="confirm password" required>
 </p>


  <p>
 <input type="number" name="number_phone"  class="box" placeholder="enter your number phone" required>
  </p>


 <label>Gender:</label>

 <p>
    <input type="radio" id="female" name="gender" value="Female"  required>
    <label>Female</label><br>
    <input type="radio" id="male" name="gender" value="Male" required>
    <label for="male">Male</label><br>
    </p>
  
    <p>
    <input type="checkbox" name="accepts_tos" value="yes"> I agree to the
    <a href="/html-css-practice-test/" target="_blank">terms of service</a>
    </p>
    
    <p>
    <input type="submit" value="Sign up" class="button" name="submit">
    <input type="reset" value="Clear" class="button2">
    </p>


 </div>

 
    </form>
   </body>
   </html>

   