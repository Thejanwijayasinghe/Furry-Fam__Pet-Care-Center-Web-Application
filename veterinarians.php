<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="foot.png">
  <title>Our_veterinarians</title>
  <link rel="stylesheet" href="Css/our_veterinarians.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  
</head>
<body>
      <?php include 'Header.php' ?>
    
 <!--our_veterinarians--> 
<div class="wrapper">
    <h1>Our veterinarians</h1>
    <div class="our_team">
        <div class="team_member">
          <div class="member_img">
              <img src="images/vet01.png" >
            <div class="social_media">
               <div class="facebook item"><i class="fab fa-facebook-f"></i></div>
               <div class="twitter item"><i class="fab fa-twitter"></i></div>
               <div class="instagram item"><i class="fab fa-instagram"></i></div>
             </div>
          </div>
          <h3>Dr.Maurice Allen</h3>
          <span>DVM</span>
          <p>Specialization: Pet Nutrition, Preventive Care, Surgery</p>
          <p>Dr.Maurice Allen is a licensed veterinarian with years of experience in providing exceptional care to animals of all kinds.</p>
          <p>He graduated from a reputable veterinary school and is passionate about promoting pet health and well-being. </p>
          <p><b>Email: maurice@gmail.com</b></p> 
          <p><b>Contact: 0763456789M</b></p> 
        </div>
        <div class="team_member">
           <div class="member_img">
               <img src="images/vet02.webp">
             <div class="social_media">
               <div class="facebook item"><i class="fab fa-facebook-f"></i></div>
               <div class="twitter item"><i class="fab fa-twitter"></i></div>
               <div class="instagram item"><i class="fab fa-instagram"></i></div>
             </div>
          </div>
          <h3>Dr.Chris Brown</h3>
          <span>DVM</span>
          <p>Specialization:Preventive Care, Surgery
          <p>He graduated with honors from a renowned veterinary school and has been practicing for over 15 years.</p>
          <p>Dr.Chris Brown is known for her excellent communication skills, always taking the time to explain medical conditions and treatment options to pet owners.</p>
          <p><b>Email:chris@gmail.com</b></p> 
          <p><b>Contact: 0713356789</b></p> 
      </div>
        <div class="team_member">
           <div class="member_img">
               <img src="images/vet03.png">
             <div class="social_media">
               <div class="facebook item"><i class="fab fa-facebook-f"></i></div>
               <div class="twitter item"><i class="fab fa-twitter"></i></div>
               <div class="instagram item"><i class="fab fa-instagram"></i></div>
             </div>
          </div>
          <h3>Dr.Agara Dickens</h3>
          <span>DVM,PHD</span>
          <p>Specialization:Anesthesia,Behavior, Pet Nutrition, Preventive Care, Surgery</p>
          <p>Dr.Agara Dickens is a highly specialized veterinarian with a background in both clinical practice and research. He holds a dual degree in veterinary medicine and a Ph.D. in veterinary pharmacology.He often lectures at veterinary conferences.</p>
          <p><b>Email:agara@gmail.com</b></p> 
          <p><b>Contact: 0763656778</b></p> 
        </div>
        <div class="team_member">
           <div class="member_img">
               <img src="images/vet_04.png">
             <div class="social_media">
               <div class="facebook item"><i class="fab fa-facebook-f"></i></div>
               <div class="twitter item"><i class="fab fa-twitter"></i></div>
               <div class="instagram item"><i class="fab fa-instagram"></i></div>
             </div>
          </div>
          <h3>Dr.Anika Lawson</h3>
          <span>DVM - Rabbit Specialist</span>
          <p>Specialization:dental health, nutrition, and preventive medicine</p>
          <p>Dr.Anika Lawsonis an experienced veterinarian who has devoted his career to the well-being of rabbits.</p>
          <p>With a deep understanding of rabbit physiology and behavior, Dr.Anika provides expert care for these adorable, furry creatures.</p>
          <p><b>Email:anika@gmail.com</b></p> 
          <p><b>Contact: 0712567890</b></p> 
        </div>  
    </div>
</div>
 <?php
// db_connection.php

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'furryfam';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Database error: ' . $e->getMessage();
}

include 'Classes/DbConnector.php'; // Include the database connection


try {
    // Query to retrieve veterinarian availability data
    $sql = "SELECT vet_id, vet_name, availability FROM veterinarian_availability";
    $stmt = $pdo->query($sql);
    $vetData = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo 'Database error: ' . $e->getMessage();
}
?>
<!-- Display the table loaded from the database -->
<div class="vet-availability">
    <h2><b>Veterinarian Availability</b></h2>
</div>
<table>
    <tr>
        <th>Veterinarians ID</th>
        <th>Veterinarians Name</th>
        <th>Availability</th>
        <th></th>
    </tr>
    <?php
    foreach ($vetData as $vet) {
        echo '<tr>';
        echo '<td>' . $vet['vet_id'] . '</td>';
        echo '<td>' . $vet['vet_name'] . '</td>';
        echo '<td>' . $vet['availability'] . '</td>';
        echo '<td>';
        echo '<div class="button">';
        // Pass the vet's name as a query parameter in the URL
        echo '<a href="vetbooking.php?vet_id=' . urlencode($vet['vet_id']) . '&vet_name=' . urlencode($vet['vet_name']) . '">Make an Appointment</a>';

        echo '</div>';
        echo '</td>';
        echo '</tr>';
    }
    ?>
</table>
<br>





<?php include 'Footer.php' ?>
</body>
</html>

  