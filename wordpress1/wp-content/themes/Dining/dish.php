<?php
define("TITLE", "Dish | Franklin's Fine Dining");
include('includes/header.php');

function strip_bad_chars($input) {
  $output = preg_replace("/[^a-zA-Z0-9_-]/", "", $input);
  return $output;
}

if (isset($_GET['item'])){
  $menuItem = strip_bad_chars($_GET['item']);

  $dish = $menuItems[$menuItem];
}

//tip'o skaiciavimas
function suggestedTip($kaina, $tip){
  $totalTip = $kaina * $tip;
  echo money_format('%.2n', $totalTip);
}

 ?>

 <hr>

 <div id="dish">

<h1><?php echo $dish["title"];?><span class="kaina"><sup>Eur</sup>
<?php echo $dish["kaina"];?></h1>
<p><?php echo $dish["apie"]; ?></p>

<br>

<p><strong>Suggested beverage: <?php echo $dish["gerimas"]; ?>
</strong></p>

<p><em>Suggested tip: <sup>Eur</sup>
<?php suggestedTip($dish["kaina"], 0.15); ?></em></p>

 </div>

 <hr>

 <a href="menu.php" class="button previous">&laquo; Back to menu </a>


 <?php
include('includes/footer.php');
  ?>
