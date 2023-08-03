<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Add Expense</title>
  <link rel="stylesheet" href="css/add_expense.css">
</head>
<body>
<?php 
session_start();
require_once ('connection.php');
if(!isset($_SESSION["UserID"] )&&empty($_SESSION["UserID"] )) {header("location:login.php");}
if(isset($_POST['submit'])) {
  
 // echo '<script>alert("Category added successfully");</script>';

   try{ 
  //  $catname = $_POST['categoryname'];
   $CategoryID = $_SESSION["CategoryID"];
    $expamount = $_POST['amount'];
    $expdate = $_POST['date'];
    $userID = $_SESSION["UserID"];
    $comment = $_POST['comment'];

    $CategoryID = $_SESSION["CategoryID"];
    
    $paymentType = $_POST['payment'];

    $sql = "INSERT INTO expensetable (Expamount	, ExpDate, CategoryID, UserID, comment , PaymentType,) VALUES 
    ('$expamount', $expdate, '$CategoryID',  '$userID',  '$comment', '$paymentType' )";
if ($conn->query($sql) === TRUE) {
  echo "تم إدخال بيانات الفئة الجديدة بنجاح";
// echo '<script>alert("Category added successfully");</script>';

} else {
  echo "حدث خطأ أثناء إدخال بيانات الفئة الجديدة: " . $conn->error;
}
// إغلاق اتصال قاعدة البيانات
//$conn->close();
}catch(exception $e){
echo 'error',$e->getMessage();
}
}

?>

<header>
    <div class="logo">
      <img src="img/money.png" alt="Logo">
      <h1>Expense Tracker</h1>
    </div>
    <nav>
      <ul>
       
   
      

 

    <li><a href="logout.php">log out</a></li>

    <li><a href="addcategory.php">Add Categories</a></li>

   

<li><a href="rate.php">rate website</a></li>

<li><a href="transfer.php">transfer</a></li>


   <?php if(isset($_SESSION['UserName'])): ?>
          <li class = "welcome"><?php echo "Welcome, ".$_SESSION['UserName'];?></li>

 <?php else: ?>
 
    <?php endif; ?>
      </ul>
    </nav>
  </header>


  <main>
    <div class="container">
      <div class="card">
        <h2>Add Expense</h2>
        <form method="post">
          <div class="form-group">
            <label for="date">Date</label>
            <input type="date" id="date" name="date" required>
          </div>
          <div class="form-group">
            <label for="amount">Amount</label>
            <input type="number" id="amount" name="amount" required>
          </div>
          <div class="form-group">
            <label for="comment">Comment</label>
            <input type="text" id="comment" name="comment" required>
          </div>
          <div class="form-group">
            <label for="comment">category name</label>
            <input type="text" id="catname" name="catname" required>
          </div>
          <div class="form-group">
            <label for="payment">Payment Method</label>
            <select id="payment" name="payment" required>
        
              <option value="bank">Bank Card</option>
              <option value="check">Check</option>
              <option value="cash">Cash</option>
            </select>
          </div>
          <button type="submit" class="btn btn-primary" name="submit">Add Expense</button>
        </form>
      </div>
    </div>
  </main>


  <footer><hr>
 
 <div class="contact-info">
   <h2>Contact Information:</h2>
   <p>Tripoli - Sarraj </p>
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