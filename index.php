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


<div class="row">
<div class="col-12 col-md-4 mx-auto">
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong class="me-2"><ion-icon name="checkmark-circle-outline"></ion-icon></strong><?= $labels[$language]['cambio_lingua'] ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
</div>

<div class="titolo">
<h1 class="display-4"><?= $labels[$language]['site_benvenuto'] ?></h1>
</div>
    
   
    <div class="col-12 col-md-7 mx-auto my-4">
       <?php
       foreach($resolt_db as $date){?>
       <div>
        <h1 class="display-6 mb-4">
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