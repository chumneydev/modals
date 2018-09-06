<?php
	namespace ProcessWire;
	header_remove("X-Frame-Options");
	header("Access-Control-Allow-Origin: *");
?>

<!DOCTYPE html>
<html lang="en">

<head>
<title>Project: Nova</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--<link rel="stylesheet" type="text/css" href="<?php //echo $config->urls->templates?>styles/grid.css" />-->
  <link rel="stylesheet" type="text/css" href="<?php echo $config->urls->templates?>styles/main.css" />
</head>

<body>
<?php

/**$http = new WireHttp();
// Get the contents of a URL
$response = $http->get("https://jsonplaceholder.typicode.com/posts");
if($response !== false) {
    $test = json_decode($response);
    foreach($test as $car) {
        $newName = $car->title . $car->id;
        $u = new Page();
        $u->template = $templates->get("basic-page");
        $u->parent = $pages->get("/development/");
        $u->name = $newName;
        $u->title = $car->title;
        $u->body = $car->body;
        $u->save();
        $u->setOutputFormatting(false);
    }
} else {
    echo "HTTP request failed: " . $http->getError();
} **/





/*****************************************************
 *  New JSON decoding with crc32 checksum
 */



/*$http = new WireHttp();
$response = $http->get("https://jsonplaceholder.typicode.com/posts");

if($response !== false) {
    $decodedFeed = json_decode($response);

    foreach($decodedFeed as $feed) {
        $feedID = $feed->id;
        $crc32 = crc32($feed->title . $feed->body); //feed->status for sold, pending, new

        $p = $pages->get("template=feed-item, parent=/development/, feed_id={$feedID}");

        if(0 == $p->id) {
            // no page with that id in the system
            $p = createNewPageFromFeed($feed, $feedID, $crc32);
            $pages->uncache($p);
            continue;
        }

        // page already exists, compare checksum
        if($crc32 == $p->crc32) {
            $pages->uncache($p);
            continue;
        }

        $p = updatePageFromFeed($p, $feed, $crc32);


    } // end foreach

} else {
    echo "http request failed: " . $http->getError;
}*/



/************************/
?>





<div id="sidebar">
    <h3>Sidebar</h3>
    <form id="searchform" method="GET">
        <input type="text" name="s" value="purple unicorns" />
    </form>
    

</div>


<div id="content">
<!-- Output "cars" -->  
<?php
    $cars = $pages->find("template=feed-item,limit=15");
    $pagination = $cars->renderPager();
?>

<div class="top">
    <div class="count"></div>

    <?=$pagination; ?>
</div>

<?php foreach($cars as $car): ?>
    <div class="car">
        <h2><?=$car->title;?></h2>
        <p><?=$car->body;?></p>
</div>

<?php endforeach; ?>

<div class="top">
    <?=$pagination; ?>
</div>

</div>







    <script src="<?php echo $config->urls->templates; ?>scripts/jquery.js"></script>
    <script src="<?php echo $config->urls->templates; ?>scripts/fontawesome-all.min.js"></script>
    <script src="<?php echo $config->urls->templates; ?>scripts/ajax-calls.js"></script>


</body>

<script type="text/javascript">
    //setInterval(ajaxChart, 3000);
    //setInterval(ajaxCall, 3000);
    //setInterval(ajaxTitles, 3000);

    //setInterval(ajaxSpecialsRunning, 3000);
    //setInterval(ajaxSpecialsExpired, 3000);


</script>

<script type="text/javascript">
    //setTimeout('window.location.href=window.location.href;', 30000);
</script>
</html>

</html>


<!-- <img src="https://source.unsplash.com/random/207x210" alt=""> -->
