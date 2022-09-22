<php 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- CSS only -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/850a319b00.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <?php 
        include_once "navbar.php";
    ?>
    <?php 
      include_once "header.php";
    ?>
    <?php 
     include_once "connect.php";
     $reqAddHouse = "SELECT * FROM maisons";
     $send = $bdd->prepare($reqAddHouse);
     $send->execute();
     $HouseListing = $send->fetchAll();
    ?>
    <main class="main">
    <div class="cars-page">LISTE DES APPARTEMENTS</div>
    <div class="containers-wrapper">
        <div class="big-container">
           <?php 
           foreach($HouseListing as $House) :?>
            <div class="house-image">
            <img src= "<?php echo  $House["photo"]; ?>" alt="" width="300px" height="300px">
            <div>
                <span  class="in-house-image"><?php echo  $House["nom"]; ?> </span>
            </div>
            <div class="localisation">
                <img src="Assets/location-dot-solid-2.png" alt="" width="20px">
                <span><?php echo  $House["emplacement"]; ?></span>
            </div>
            <div class="stars-cov">
                <div class="stars">
                    <?php  for ($i=0; $i < $House["notation"]; $i++) :?>
                       
                            <label><img src="Assets\star-solid.png "alt="" width="20px" height="20px"></label >
                        <?php endfor; ?>
                    
                </div>
                <div class="tarif">
                    <span><?php echo  $House["prix"]; ?>/nuit</span>
                </div>
            </div>
            <button class="houses-rev-btn">RESERVER</button>
        </div> 
         <?php endforeach;  ?>
        
           
    </div>
<main>
<?php 
    include_once "footer.php";
?>
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>