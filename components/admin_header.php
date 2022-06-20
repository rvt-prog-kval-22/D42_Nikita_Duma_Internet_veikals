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

      <a href="../admin/dashboard.php" class="logo">Admin panel</a>

      <nav class="navbar">

         <a href="../admin/placed_orders.php">pasūtījumi</a>
         <a href="../admin/messages.php">vēstules

            <?php
               $select_messages = $conn->prepare("SELECT * FROM `messages`");
               $select_messages->execute();
               $number_of_messages = $select_messages->rowCount()
            ?>
            <?= $number_of_messages; ?>
         </a>
      </nav>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="user-btn" class="fas fa-user"></div>
      </div>

      <div class="profile">
         <?php
            $select_profile = $conn->prepare("SELECT * FROM `admins` WHERE id = ?");
            $select_profile->execute([$admin_id]);
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
         <p><?= $fetch_profile['name']; ?></p>
         <a href="../components/admin_logout.php" class="delete-btn" onclick="return confirm('Iziet?');">Iziet</a> 
      </div>

   </section>

</header>