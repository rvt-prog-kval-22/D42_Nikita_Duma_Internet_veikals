<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

if(isset($_POST['send'])){


   $msg = $_POST['msg'];
   $msg = filter_var($msg, FILTER_SANITIZE_STRING);

   $select_message = $conn->prepare("SELECT * FROM `messages` WHERE message = ?");
   $select_message->execute([$msg]);

   if($select_message->rowCount() > 0){
      $message[] = 'Vēstule jau atsūtīta!';
   }else{
      $insert_message = $conn->prepare("INSERT INTO `messages`(user_id, message) VALUES(?,?)");
      $insert_message->execute([$user_id, $msg]);
      $message[] = 'Vēstule atsūtīta!';
   }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>contact</title>
   
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<section class="contact">

   <form action="" method="post">
      <h3>Saziņa ar mums</h3>

      <input type="name" name="name" placeholder="<?= $fetch_profile["name"]; ?>" required maxlength="50" class="box" disabled>
      <input type="email" name="email" placeholder="<?= $fetch_profile["email"]; ?>" required maxlength="50" class="box" disabled>
      <textarea name="msg" class="box" placeholder="Ievadiet tekstu" cols="30" rows="10"></textarea>
      <input type="submit" value="Atsūtīt" name="send" class="btn">
      
   </form>

</section>










<script src="js/script.js"></script>

</body>
</html>