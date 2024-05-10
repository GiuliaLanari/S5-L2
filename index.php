<?php

require_once __DIR__ . '/includes/header.php'; 
if($language === "it"){
    $stmt= $pdo->query('SELECT id, titolo_italiano AS titolo, contenuto_italiano AS contenuto  FROM post');
  

}
if($language === "en"){
    $stmt= $pdo->query('SELECT id, titolo_inglese AS titolo, contenuto_inglese AS contenuto FROM post');
    
}
if($language === "fr"){
    $stmt= $pdo->query('SELECT id, titolo_francese AS titolo, contenuto_francese AS contenuto FROM post');

}


$stmt->execute();
$resolt_db =$stmt->fetchAll();

?>
    <h1><?= $labels[$language]['site_benvenuto'] ?></h1>
    <div class="row">
    <div class="col-12 col-md-7 mx-auto">
       <?php
       foreach($resolt_db as $date){?>
       <div>
        <h1 class="display-6">
        <?=
           $date['titolo'];
           ?>
        </h1>
         <p>
           <?= $date['contenuto'];?>
         </p>
       </div>
       <?php
       }
       ?>
    </div>
    </div>
    <?php
require_once __DIR__ . '/includes/footer.php';