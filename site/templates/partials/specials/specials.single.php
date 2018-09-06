<?php
	namespace ProcessWire;
	header_remove("X-Frame-Options");
	header("Access-Control-Allow-Origin: *");
?>

<?php if($user->isLoggedIn()): ?>

    <div class="header">
    
    <ul id="page-actions">
        <li class='edit' data-izimodal-open="#modal-iframe">Edit</li>
    </ul>



    <ul id="admin-actions">
            <li><a href="./"><i class="far fa-columns"></i>Your Dashboard</a></li>
            <li><i class="far fa-browser"></i>Add New Client</li>
            <li><i class="far fa-clone"></i>Add New Special</li>
        </ul>
            
    </div>



<?php endif; ?>


<div class="ca-row">
	<div class="ca-col-12">
		<h1>Specials Single</h1>
	</div>
</div>

<!-- Dealer Message and Youtube Video -->
<div class="ca-row">
	<?php if(!$page->specials_video): ?>
		<div class="ca-col-12 message">
			<?php echo $page->specials_message; ?>
		</div>

	<?php else: ?>

		<div class="ca-col-7 message">
			<?php echo $page->specials_message; ?>
		</div>

		<div class="ca-col-5">
			<div class="ca-video">
			<iframe width="560" height="315" src="<?php echo $page->specials_video; ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>

			</div>
		</div>



	<?php endif; ?>



</div>





<div class="ca-row">

<?php
	$buttons = $page->specials_cta;
	$countButtons = count($buttons);
	//echo $countButtons;

	if ($countButtons == 2) {
		$class = 6;
	} else if ($countButtons == 3) {
		$class = 4;
	} else if ($countButtons == 4) {
		$class = 3;
	}

	else {}

?>

<!-- CTA Buttons -->

<?php foreach($page->specials_cta as $button): ?>
		<div class="ca-col-<?=$class;?>">
			<a href="<?php echo $button->specials_cta_url; ?>" class="ca-btn-demo"><?php echo $button->specials_cta_text; ?></a>
		</div>

	<?php endforeach; ?>
</div>

<!-- Date and Time -->

<?php
	$cacoupon = 0;
	
	$todaysDate = date("F j, Y g:i a");
	$convertedTodaysDate = strtotime($todaysDate);

	$startDate = $page->specials_start_date;
	$convertedStartDate = strtotime($startDate);
	
	$endDate = $page->specials_end_date;
	$convertedEndDate = strtotime($endDate);

?>

<!-- Begin Time Test; -->
<?php
    $parentPage = $page->id;
?>

<div class="ca-row">
	<div class="ca-col-12">
        <?php foreach($page->specials as $content): ?>
            <div class="special cacoupon<?=$cacoupon; ?>">
                <ul>
                    <li ><?=$content->specials_start_date; ?></li>
                    <li><?=$content->specials_end_date; ?></li>
                    <li><a href="#" class="counter" data-parent="<?=$parentPage;?>" data-repeater="<?=$content->id;?>"><?=$content->specials_url; ?></li></a>
                </ul>
            </div>





        <?php $cacoupon++; ?>

        <?php endforeach; ?>


	</div>
</div>

<!-- Begin Specials -->








<?php
    $pizza  = "piece1 piece2 piece3 piece4 piece5 piece6";
    $pieces = explode(" ", $pizza);
    //echo $pieces[0]; // piece1
    //echo $pieces[1]; // piece2
?>