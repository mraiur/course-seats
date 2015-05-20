<?php
function getStudentList()
{
    if(file_exists(ROOT . "list.json")){
        $listData = file_get_contents( ROOT . "list.json" );
        $listJson = json_decode( $listData );

        return $listJson;
    }
    else
    {

        echo "list.json is missing in the root of your app.";

        // IF error reporting is enabled throw and error.
        throw new ErrorException("list.json is missing.");
    }
}

function isStudentInClass($id){
    if(in_array($id, $_SESSION['inClass']) ){
        return true;
    }
    return false;
}

function getInClassList(){
    return $_SESSION['inClass'];
}

function addInClass($id){
    $_SESSION['inClass'][] = $id;
}

function removeFromClass($id){
    $key = array_search($id, $_SESSION['inClass']);

    if($key !== false){
        unset($_SESSION['inClass'][$key]);
    }
}