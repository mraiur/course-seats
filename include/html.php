<?php
function htmlHeader(){
    include HTML_TEMPLATES . "header.php";
}

function htmlFooter(){
    include HTML_TEMPLATES . "footer.php";
}

function getDeskColor(){
    static $color = 0;

    $colors = array('alert-success', 'alert-info', 'alert-warning', 'alert-danger');

    $color++;
    if( $color > count($colors)-1 ){
        $color = 0;
    }
    return $colors[$color];
}

function htmlDeskLabel($number){
    return '<div><div class="label label-default" style="font-size: 22pt;">Desk '.$number.'</div></div>';
}