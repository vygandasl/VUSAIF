<?php
    define("TITLE", "Team | Franklin's Fine Dining");

    include('includes/header.php');
?>

<div id="team-members" class="cf">
  <h1>Our Team at Franklin's</h1>
  <p>Our team is awesome!</p>

  <hr>

  <?php
  foreach ($teamMembers as $member) {
  ?>

    <div class="member">

      <img src="img/<?php echo "$member[img]"; ?>.png"
      alt="<?php echo "$member[name]"; ?>">
      <h2><?php echo "$member[name]"; ?></h2>
      <h2><?php echo "$member[position]"; ?></h2>
      <h5><?php echo "$member[bio]"; ?></h5>

    </div>

  <?php
}
   ?>


</div>



<?php include('includes/footer.php') ?>
