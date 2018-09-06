<?php
	namespace ProcessWire;
	header_remove("X-Frame-Options");
	header("Access-Control-Allow-Origin: *");
?>

<!DOCTYPE html>
<html lang="en">

<head>
<title><?php echo $page->title; ?></title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="<?php echo $config->urls->templates?>styles/grid.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo $config->urls->templates?>styles/main.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo $config->urls->templates?>styles/specials.dashboard.css" />

  <link rel="stylesheet" type="text/css" href="<?php echo $config->urls->templates?>styles/iziModal.min.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo $config->urls->templates?>styles/print.min.css" />
</head>

<body>

<div id="specials" class="ca-container">

<?php if($page->specials_sort->value === "single" && $page->specials_select->value === "specials"): ?>
<?php include("./partials/specials/specials.single.php"); ?>


<?php elseif($page->specials_sort->value === "double" && $page->specials_select->value === "specials"): ?>
<?php include("./partials/specials/specials.double.php"); ?>

<?php elseif($page->specials_sort->value === "tripple" && $page->specials_select->value === "specials"): ?>
<?php include("./partials/specials/specials.tripple.php"); ?>


<?php elseif($page->specials_sort->value === "single" && $page->specials_select->value === "service"): ?>
<?php include("./partials/specials/service.single.php"); ?>


<?php elseif($page->specials_sort->value === "double" && $page->specials_select->value === "service"): ?>
<?php include("./partials/specials/service.double.php"); ?>

<?php elseif($page->specials_sort->value === "tripple" && $page->specials_select->value === "service"): ?>
<?php include("./partials/specials/service.tripple.php"); ?>


<?php else: ?>
<?php include("./partials/specials/blank.php"); ?>

<?php endif; ?>	

</div> <!-- End Container -->



<script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>    <script src="<?php echo $config->urls->templates?>/scripts/print.min.js"></script>
    <script src="<?php echo $config->urls->templates?>/scripts/iziModal.min.js"></script>

    <script src="<?php echo $config->urls->templates; ?>scripts/fontawesome-all.min.js"></script>
    <script src="<?php echo $config->urls->templates; ?>scripts/ajax-calls.js"></script>


<script type="text/javascript">
       $("#modal-iframe").iziModal({
            title: "Currently editing <?=$page->title;?>",
            headerColor: "#6d7d8d",
            iframe: true,
            width: 1200, 
            iframeHeight: 940, 
            iframeURL: "<?=$page->editUrl; ?>"
                
        });
</script>
</body>





</body>

<script type="text/javascript">
    //setInterval(ajaxChart, 3000);
    //setInterval(ajaxCall, 3000);
    //setInterval(ajaxTitles, 3000);

    //setInterval(ajaxSpecialsRunning, 3000);
    //setInterval(ajaxSpecialsExpired, 3000);
    //setInterval(ajaxClickCount, 3000);


</script>




</html>


<!-- <img src="https://source.unsplash.com/random/207x210" alt=""> -->
