<?php
   if(isset($message)){
      foreach($message as $message){
         echo '
         <div class="message">
            <span>'.$message.'</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
         </div>
         ';
      }
   }
?>

<header class="header">

   <section class="flex">

      <a href="home.php" class="logo">Pārtika mājās</a>

      <nav class="navbar">


         <a href="orders.php">pasūtījumi</a>
         <a href="about.php">par mums</a> 
         <a href="contact.php">saziņa</a>

      </nav>

      <div class="icons">
         <?php

            $count_cart_items = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
            $count_cart_items->execute([$user_id]);
            $total_cart_counts = $count_cart_items->rowCount();
         ?>
         <div id="menu-btn" class="fas fa-bars"></div>
         <a href="search_page.php"><i class="fas fa-search"></i></a>

         <a href="cart.php"><i class="fas fa-shopping-cart"></i><span><?= $total_cart_counts; ?></span></a>
         <div id="user-btn" class="fas fa-user"></div>
      </div>

      <div class="profile">
         <?php          
            $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
            $select_profile->execute([$user_id]);
            if($select_profile->rowCount() > 0){
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
         <p><?= $fetch_profile["name"]; ?></p>
         <a href="update_user.php" class="btn">Mainīt datus</a>
         <div class="flex-btn">

         </div>
         <a href="components/user_logout.php" class="delete-btn" onclick="return confirm('logout from the website?');">Iziet</a> 
         <?php
            }else{
         ?>
         <p>Lūdzam autorizēties vai registrēties!</p>
         <div class="flex-btn">
            <a href="user_register.php" class="option-btn">Registrācija</a>
            <a href="user_login.php" class="option-btn">Autorizācija</a>
         </div>
         <?php
            }
         ?>      
         
         
      </div>

   </section>

</header>
