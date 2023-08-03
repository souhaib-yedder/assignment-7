<!DOCTYPE html>




<?php

session_start();

?>


<html>
<head>
<meta charset="UTF-8"/>
<title>home page</title>
<link rel="stylesheet" href="css/style.css">


</head>

<body> 




  <header>
    <div class="logo">
      <img src="img/money.png" alt="Logo">
      <h1>Expense Tracker</h1>
    </div>
    <nav>
      <ul>
       

        <li><a href="addcategory.php">Add Categories</a></li>

   
        <li><a href="add_expense.php">Add Expense</a></li>

        <li><a href="rate.php">rate website</a></li>

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




  <form action="home page.php" method="post">



</form>



<main>

  

  <div class="div2"> 
<h1> Welcome  <?php echo $_SESSION['UserName'];?>  to the Expense Tracker website </h1>
<p> Welcome to Expense Tracker website! Keeping track of your expenses is an essential part of managing your finances, and our website is here to help you do just that. With our user-friendly interface and powerful tools, you can easily track your income and expenses, set budgets, and gain insights into your spending habits.

  Our website is designed to be intuitive and easy to use, even for those who are not familiar with financial management. You can quickly create an account, add your income and expenses, and start tracking your finances right away. You can also set up categories for your expenses to get a better understanding of where your money is going.
  
  Our website also includes helpful features such as reports and charts that give you a visual representation of your financial situation. You can see your spending trends over time, identify areas where you can cut back on expenses, and set goals for saving and budgeting.
  
  At Expense Tracker, we take your privacy and security seriously. All your data is encrypted and stored securely, ensuring that your financial information is safe and protected.
  
  We hope you find our website useful in managing your finances and achieving your financial goals. </p> 
  
 
  
  </div>

  <div class="line1" >

   
    <img  class = "img1" src= "img/imgexp.webp" >

    <div class="text1"> 
 <h1 > You can add   </h1>
 <h1 > categories and add expenses  </h1>
 

 <button type="button" class="button1" onclick="window.location.href='addcategory.php'">Add Categories</button>
 <button type="button" class="button2" onclick="window.location.href='add_expense.php'">Add Expense</button>


 <p> </p>

  </div>
  
    </div>
</main>


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


