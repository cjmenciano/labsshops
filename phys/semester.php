<?php
date_default_timezone_set("Asia/Manila");

$year = date("Y");
$month = date("n");
$sem = '';
$stringSem = '';
$stringSY = '';
    if($month >= 8 && $month <= 12){
        $sem = '1st';

        $stringSem = $sem;
        $stringSY = $year.'-'.($year+1);

    }else if($month >= 1 && $month <= 5){
        $year -= 1;
        $sem = '2nd';

        $stringSem = $sem;
        $stringSY = $year.'-'.($year+1);

    }else{
        $sem = 'Summer';
        $year-=1;

        $stringSem = $sem;
        $stringSY = $year.'-'.($year+1);
    }

    
?>