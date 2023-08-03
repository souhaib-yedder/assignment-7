<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Transfer</title>
  <link rel="stylesheet" href="css/transfer.css">
</head>
<body>

<?php 
session_start();
require_once ('connection.php');

if(!isset($_SESSION["UserID"] )&&empty($_SESSION["UserID"] )) {header("location:login.php");}

if(isset($_POST['submit'])) { 
  $amount = $_POST['amount'];
  $fromCategory = $_POST['fromCategory'];
  $tocategory = $_POST['tocategory'];
  $transferDate = $_POST['transferDate'];
  $transferReason = $_POST['transferReason'];

  $userID = $_SESSION["UserID"];
  
  // تحقق من صحة البيانات الواردة من المستخدم
  try {
    if($fromCategory == $tocategory) {
      throw new Exception('Error: Categories must be different');
    }
    // تحقق من توفر الرصيد الكافي في الفئة المحول منها
    $sql = "SELECT * FROM categorytable WHERE catname='$fromCategory' AND UserID='$userID'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if(isset($row['catamount']) && $row['catamount'] < $amount) {
      throw new Exception('Error: Not enough funds in selected category');
    } else if ($amount < 0) {
      throw new Exception('Error: Invalid transfer amount');
    } else {
      // تحديث قيمة الرصيد لكل فئة
      $sql = "UPDATE categorytable SET catamount = catamount - $amount WHERE catname='$fromCategory' AND UserID='$userID'";
      $result = mysqli_query($conn, $sql);
      $sql = "UPDATE categorytable SET catamount = catamount + $amount WHERE catname='$tocategory' AND UserID='$userID'";
      $result = mysqli_query($conn, $sql);
      echo '<script>alert("Transfer successful");</script>';
// إضافة إلى جدول الحوالات 
      
      $sql = "INSERT INTO transfertable (fromcategory,tocategory,Amount,TransferDate,TransferReason, UserID) VALUES 
      ('$fromCategory','$tocategory', '$amount', '$transferDate','$transferReason','$userID')";
      $result = mysqli_query($conn, $sql);

    }
  } catch (Exception $e) {
      echo '<script>alert("'.$e->getMessage().'");</script>';
  }
}
mysqli_close($conn);
?>

<header>
    <div class="logo">
      <img src="img/money.png" alt="Logo">
      <h1>Expense Tracker</h1>
    </div>
    <nav>
      <ul>
        <li><a href="#">Add Expense</a></li>
        <li><a href="addcategory.php">Add Category</a></li>
        <li><a href="logout.php">log out</a></li>

        <li><a href="rate.php">rate website</a></li>
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
        <h2>Transfer</h2>
        <form method="post">


        <div class="form-group">
  <label for="fromCategory">from Category</label>
  <select id="fromCategory" name="fromCategory" required>
    <option value="food">Food</option>
    <option value="house">House</option>
    <option value="debt">Debt</option>
    <option value="gifts">Gifts</option>
    <option value="cards">Cards</option>
  </select>
</div>


<div class="form-group">
         <label for="toCategory">to Category</label>
  <select id="toCategory" name="tocategory" required>
    <option value="food">Food</option>
    <option value="house">House</option>
    <option value="debt">Debt</option>
    <option value="gifts">Gifts</option>
    <option value="cards">Cards</option>
  </select>
</div>



          <div class="form-group">
            <label for="amount">Amount</label>
            <input type="number" id="amount" name="amount" required>
          </div>


          <div class="form-group">
    <label for="transferDate">Transfer Date</label>
    <input type="date" id="transferDate" name="transferDate" required>
  </div>

  <div class="form-group">
    <label for="transferReason">Transfer Reason</label>
    <input type="text" id="transferReason" name="transferReason" required>
  </div>


          <button type="submit" class="btn btn-primary" name="submit">Transfer</button>
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

