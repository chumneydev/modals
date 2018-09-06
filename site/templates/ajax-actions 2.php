<?php namespace ProcessWire;

if ($config->ajax && $input->urlSegment1 == 'count-specials') {
    $demo = $pages->find("template=management");
    $count = count($demo);
    echo $count;
} else if ($config->ajax && $input->urlSegment1 == 'titles') {
    $demo = $pages->find("template=management");
    foreach ($demo as $d) {
        echo "<li>" . $d->title . "</li>";
    }
} else if ($config->ajax && $input->urlSegment1 == 'specials-running') {
    
    $specials = $pages->find("template=management");
    
    foreach ($specials as $special) {

        $cacoupon = 0;
	
        $todaysDate = date("F j, Y H:i");
        $convertedTodaysDate = strtotime($todaysDate);
    
        $startDate = $special->specials_start_date;
        $convertedStartDate = strtotime($startDate);
        
        $endDate = $special->specials_end_date;
        $convertedEndDate = strtotime($endDate);
    
        if($convertedEndDate > $convertedTodaysDate) {
            echo "<li>" . $special->parent->title . ": " . $special->title . "</li>";

        } else {}

    }
} else if ($config->ajax && $input->urlSegment1 == 'specials-expired') {
    
    $specials = $pages->find("template=management");
    
    foreach ($specials as $special) {

        $cacoupon = 0;
	
        $todaysDate = date("F j, Y H:i");
        $convertedTodaysDate = strtotime($todaysDate);
    
        $startDate = $special->specials_start_date;
        $convertedStartDate = strtotime($startDate);
        
        $endDate = $special->specials_end_date;
        $convertedEndDate = strtotime($endDate);
    
        if($convertedEndDate < $convertedTodaysDate) {
            echo "<li>" . $special->parent->title . ": " . $special->title . "</li>";

        } else {}

    }
} else if ($config->ajax && $input->urlSegment1 == 'count-clicks') {
    $parentPageId = $input->get->name;
    $repeaterId = $input->get->repeater;

    $p = $pages->get($repeaterId);
    $counter = $p->dev_counter;
    
    $p->of(false);
    $p->dev_counter =  $p->dev_counter + 1;
    $p->save();
}

else{}





?>
