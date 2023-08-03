<!DOCTYPE html>



<?php
session_start();

require_once ('connection.php');

if(isset($_POST['submit'])){
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    // التحقق من وجود اسم المستخدم وكلمة المرور في قاعدة البيانات
    $stmt = $conn->prepare("SELECT * FROM usertable WHERE UserName=? AND Password=?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // إذا وجدت سجلًا متطابقًا في قاعدة البيانات ، قم بتخزين معلومات المستخدم في الجلسة
        $row = $result->fetch_assoc();
        $_SESSION['id'] = $row['id'];
        $_SESSION['Name'] = $row['Name'];
        $_SESSION['UserName'] = $row['UserName'];
        $_SESSION['Email'] = $row['Email'];
      $_SESSION["UserID"] = $row['UserID'];
        $_SESSION['NumberPhone'] = $row['NumberPhone'];
        $_SESSION['Gender'] = $row['Gender'];


        header("Location: homee2.php");

        echo ("Welcome to ".$_SESSION['UserName']);
        exit;
    } else {
       
      
      die ("Incorrect username or password");
    }
}
?>



	
<html>

<head>
<meta charset="UTF-8">
  <title>login page </title>
</head>

<link rel="stylesheet" href="css/login.css">


<body>

<header>
  <div class="logo">
    <img src="img/money.png" alt="Logo">
    <h1>Expense Tracker</h1>
  </div>
  <nav class="navbar">
    <ul>
      <li><a href="sign up.php">Sign Up</a></li>
     
    </ul>
  </nav>
</header>



 <form action ="login.php" method="post" >

<div class="main">

<h2>LOGIN FORM</h2>

 <p>
   
 <input type="text" name= "username" placeholder="enter your username"  class="box" required >
 </p>

 <p>
 

 <input type="password" name="password" placeholder="enter your password"  class="box" required>
 </p>


 
    <p>
      
    <input type="submit" value="submit" name="submit" class="button">
    <input type="reset" value="Clear" class="button2">
    </p>


</div>

    </form>
   </body>
   </html>

   