<?php namespace ProcessWire;

if ($config->ajax && $input->urlSegment1 == 'count-specials') {

} else if ($config->ajax && $input->urlSegment1 == 'counter') {
    $query = [
        "title",
        "body",
    ];

    $json = $pages->find('template=feed-item')->pageQueryJson($query);
    //$count = count($json);
    echo $json;

} else if ($config->ajax && $input->urlSegment1 == 'search') {
    $s = $input->get->text('s');
    
    $results = $pages->find("template=feed-item,title%={$s}, limit=15");
    
    $results_markup = "<h2>{$results->count} results found for “{$s}”:</h2>";
    foreach($results as $r) {
        $results_markup .= "<div class=\"car\">";
        $results_markup .= "{$r->title}";
        $results_markup .= "{$r->body}";
        $results_markup .= "</div>";
    }

    //if we’r﻿e live-searching, output only the results markup,
    //without <html>, <body> etc.
    if($config->ajax) {
        echo $results_markup;
        return $this->halt();
    }
    
    echo $results_markup;
} 

else{}



    

?>
