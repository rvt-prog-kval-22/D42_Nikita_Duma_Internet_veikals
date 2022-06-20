<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>orders</title>
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<section class="orders">

   <h1 class="heading">Pasūtījumi</h1>

   <div class="box-container">

   <?php
      if($user_id == ''){
         echo '<p class="empty">Lūdzam ienākt profilā, lai izmantotu šo funkciju</p>';
      }else{
         $select_orders = $conn->prepare("SELECT * FROM `orders`, users WHERE user_id = ?");
         $select_orders->execute([$user_id]);
         if($select_orders->rowCount() > 0){
            while($fetch_orders = $select_orders->fetch(PDO::FETCH_ASSOC)){
   ?>
   <div class="box">

      <p>Pasūtījuma statuss  : <span style="color:<?php if($fetch_orders['payment_status'] == 'procesā'){ echo 'red'; }else{ echo 'green'; }; ?>"><?= $fetch_orders['payment_status']; ?></span> </p>

      <table style="width:100%">
  <tr>
    <td><p>Datums  : <span><?= $fetch_orders['placed_on']; ?></span></p></td>
    <td><p>Vārds  : <span><?= $fetch_orders['name']; ?></span></p></td>
    <td><p>e-pasts  : <span><?= $fetch_orders['email']; ?></span></p></td>
  </tr>
  <tr>
    <td><p>Adrese : <span><?= $fetch_orders['address']; ?></span></p></td>
    <td><p>Apmaksas veids  : <span><?= $fetch_orders['method']; ?></span></p></td>
    <td><p>Preces  : <span><?= $fetch_orders['total_products']; ?></span></p></td>
    <td><p>Kopēja cena  : <span>€<?= $fetch_orders['total_price']; ?></span></p></td>
  </tr>
</table>
   </div>
   <?php
      }
      }else{
         echo '<p class="empty">Nav pasūtījumu!</p>';
      }
      }
   ?>

   </div>

</section>


<script src="js/script.js"></script>

</body>
</html>