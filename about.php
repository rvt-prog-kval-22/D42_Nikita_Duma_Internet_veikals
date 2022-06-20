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
   <title>about</title>

   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<section class="about">

   <div class="row">

      <div class="image">
         <img src="images/about-img.svg" alt="">
      </div>

      <div class="content">
         <h3>Kāpēc mēs?</h3>
         <p>Mēs esam piegādes firma kura nodrošina kvalitatīvo produktu piegādi uz jūsu adresi. Mūsu cenas ir izdevigākas tirgū. Piegāde ātrāka tirgū.</p>
         <a href="contact.php" class="btn">Sazināties ar mums</a>
      </div>

   </div>

</section>

<section class="reviews">
   
   <h1 class="heading">Kur mēs atrodamies</h1>


   <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d792622.768082126!2d23.85873840221935!3d56.72009195276875!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46eecfb0e5073ded%3A0x400cfcd68f2fe30!2z0KDQuNCz0LA!5e0!3m2!1sru!2slv!4v1655090691455!5m2!1sru!2slv" width="100%" height="450" class="content" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>


</body>
</html>