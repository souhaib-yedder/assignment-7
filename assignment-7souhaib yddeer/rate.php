<!DOCTYPE html>
<html>
<head>
	<title>Website Rating</title>
	<link rel="stylesheet" type="text/css" href="css/rate2.css">
</head>
<body>


<?php
session_start();
require_once 'connection.php'; // تعريف الاتصال بقاعدة البيانات

if(isset($_POST['submit'])) { 

  $rating = $_POST['rating'];
  $comment = $_POST['comment'];
 

//if (isset($_SESSION["UserID"])) {
 $userID = $_SESSION["UserID"];

    // تحقق من أن المستخدم لم يقم بتقييم الموقع من قبل
    $result = $conn->query("SELECT * FROM ratings WHERE UserID = $userID");

    if ($result->num_rows === 0) {
        if (isset($_POST['rating']) && isset($_POST['comment'])) {
            // أضف تقييم المستخدم إلى قاعدة البيانات
            $rating = $_POST['rating'];
            $comment = $_POST['comment'];
            $sql = "INSERT INTO ratings (UserID, rating, comment) VALUES ($userID, $rating, '$comment')";
            
            if ($conn->query($sql) === TRUE) {
                // تأكيد التقييم والتعليق
              
                echo '<script>alert("Thank you for rating the website and leaving a comment!");</script>';
             //   echo 'Thank you for rating the website and leaving a comment!';
                // يمكنك إضافة أي فعل خاص بعد تقييم المستخدم هنا
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
                
            }
          }}}
         
            ?>
          

          <header>
    <div class="logo">
      <img src="img/money.png" alt="Logo">
      <h1>Expense Tracker</h1>
    </div>
    <nav>
      <ul>
       
        <li><a href="addcategory.php">Add Categories</a></li>

   
        <li><a href="add_expense.php">Add Expense</a></li>


        <li><a href="transfer.php">transfer</a></li>
    
        

     <li><a href="logout.php">log out</a></li>

   <?php if(isset($_SESSION['UserName'])): ?>
          <li class = "welcome"><?php echo "Welcome, ".$_SESSION['UserName'];?></li>

 <?php else: ?>
  <li><a href="login.php">Log in</a></li>
    <?php endif; ?>



      </ul>
    </nav>
  </header>
    
	<div class="container">
		<h1>Website Rating</h1>
		<form method="post" >
			<p>Please rate the website:</p>
			<div class="rating">
				<input type="radio" id="star1" name="rating" value="1" required>
				<label for="star1" title="Poor"></label>

				<input type="radio" id="star2" name="rating" value="2" required>
				<label for="star2" title="Fair"></label>

				<input type="radio" id="star3" name="rating" value="3" required>
				<label for="star3" title="Good"></label>

				<input type="radio" id="star4" name="rating" value="4" required>
				<label for="star4" title="Very Good"></label>

				<input type="radio" id="star5" name="rating" value="5" required>
				<label for="star5" title="Excellent"></label>
			</div>
			<p>Please enter a comment:</p>
			<textarea name="comment" rows="4" cols="50"></textarea>
			<br>
			<input type="submit" value="Rate" name="submit" >
		</form>
	</div>





  <footer><hr>
 
    <div class="contact-info">
      <h2>Contact Information:</h2>
      <p>Tripoli - Sarraj </p>
      <p>Phone: <?php echo $_SESSION['NumberPhone']?></p>
      <p>Email: <?php echo $_SESSION['Email']?></p>
    </div>
    <div class="social-media-icons">
      <h3>Follow Us</h3>
      <ul>
        
        <li><a href="#"><img src="img/imeg  (2).png" alt="facebook icon"></a></li>
        <li><a href="#"><img src="img/imeg  (5).png" alt="twitter icon"></a></li>
        <li><a href="#"><img src="img/imeg  (10).png" alt="instagram icon"></a></li>
        <li><a href="#"><img src="img/imeg  (3).png" alt="linkedin icon"></a></li>
        <li><a href="#"><img src="img/imeg  (7).png" alt="twitter icon"></a></li>
        <li><a href="#"><img src="img/imeg  (8).png" alt="instagram icon"></a></li>
        <li><a href="#"><img src="img/imeg  (9).png" alt="linkedin icon"></a></li>
        <li><a href="#"><img src="img/imeg  (11).png" alt="instagram icon"></a></li>
        <li><a href="#"><img src="img/imeg  (6).png" alt="linkedin icon"></a></li>
      </ul>
    </div>
    <div class="copyright">
      <p>&copy; 2023 My Website. All rights reserved.</p>
    </div>


 </footer>
</body>
</html>

