<?php
    define("TITLE", "Menu | Franklin's Fine Dining");

    include('includes/header.php');
?>

<div id="menu-items">

<h1>Meniu</h1>
<p>Kaip ir mūsų grupė, meniu pasirinkimas yra labai mažas &mdash;
  bet kam tai rūpi!</p>
<p><em>Paspauskite ant produkto, norėdami sužinoti daugiau apie jį:</em></p>

<hr>

<ul>

<?php
foreach ($menuItems as $dish => $item) { ?>
    <li><a href="dish.php?item=<?php echo $dish; ?>"><?php echo $item["title"]; ?>
  </a>  <?php echo $item["kaina"]; ?><sup>eur</sup></li>

<?php } ?>

</ul>

</div><!--menu itemai-->



<?php include('includes/footer.php') ?>
