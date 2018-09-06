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
  <link rel="stylesheet" type="text/css" href="<?php echo $config->urls->templates?>styles/specials.dashboard.css" />
</head>

<body class="dashboard">


<div class="container">
    <div class="header"><p>Header</p></div>
    <div class="sidebar"><p>Sidebar</p></div>
    <div class="content">
        <div class="content-overview">
            <div class="content-overview--item"><i class="fal fa-chart-line"></i></div>
            <div class="content-overview--item"><i class="fal fa-chart-line"></i></div>
            <div class="content-overview--item"><i class="fal fa-chart-line"></i></div>
            <div class="content-overview--item"><i class="fal fa-chart-line"></i></div>
        </div>

        <div id="code">
            <h3>Code</h3>

            <?php
            
                countSpecials();

            ?>
            
            <h1 id="totalTodos">0</h1>


        </div>



    </div>
</div> <!-- End Container -->







    <script src="<?php echo $config->urls->templates; ?>scripts/jquery.js"></script>
    <script src="<?php echo $config->urls->templates; ?>scripts/fontawesome-all.min.js"></script>


</body>
    <script type="text/javascript">
    $.ajax({
        url: "/ajax-actions/",
        success: function( response ) {
        $('#totalTodos').text( response );
  }
});
    
    </script>



</html>


<!-- <img src="https://source.unsplash.com/random/207x210" alt=""> -->
