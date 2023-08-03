<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">

  <title>Add Category</title>
  <link rel="stylesheet" href="css/addcategory.css">
</head>
<body>

<?php 
session_start();
require_once ('connection.php');

if(isset($_POST['submit'])) { 
  // تعريف البيانات الجديدة
  $catamount = $_POST['value'];
  $date = $_POST['date'];
  $catName = $_POST['name'];
  $userID = $_SESSION["UserID"];
  
  // تحقق من عدم وجود القيمة في الجدول
  $sql = "SELECT * FROM categorytable WHERE catname='$catName' AND UserID='$userID'";
  $result = mysqli_query($conn, $sql);
  if(mysqli_num_rows($result) > 0) {
    echo '<script>alert("Error: Category already exists");</script>';
  } else {
    // إدخال البيانات الجديدة إلى جدول categorytable
    $sql = "INSERT INTO categorytable (catamount, date, catname, UserID) VALUES 
    ('$catamount', '$date', '$catName', '$userID')";
    $result = mysqli_query($conn, $sql);
    if($result){
      echo '<script>alert("Category added successfully");</script>';
    } else {
      echo '<script>alert("Error: Could not add category");</script>';
    }    
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

  <main>
    <div class="container">
      <div class="card">
        <h2>Add Category</h2>
        <form method="post">
        <div class="form-group">
  <label for="category">Category</label>
  <select id="category" name="name" required>
    <option value="food">Food</option>
    <option value="house">House</option>
    <option value="debt">Debt</option>
    <option value="gifts">Gifts</option>
    <option value="cards">Cards</option>
  </select>
</div>
          <div class="form-group">
            <label for="value">Value</label>
            <input type="number" id="value" name="value" required>
          </div>
          <div class="form-group">
            <label for="date">Date</label>
            <input type="date" id="date" name="date" required>
 </div>
        </select>
          <button type="submit" class="btn btn-primary" name="submit">Add Category</button>
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