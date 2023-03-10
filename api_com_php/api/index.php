<?php

$data = [];

// Request
if(isset($_GET["option"])){

    switch($_GET["option"]){

        case "status":
            $data["status"] = "SUCCESS";
            $data["data"] = "API running OK!";
            break;
        
        default:
            $data["status"] = "ERROR";
            break;
    }

}else{
    $data["status"] = "ERROR";
}

// Send response of API
response($data);

// ===============================================================
// Construction of the response
function response($data_response){

    header("Content-Type:application/json");
    echo json_encode($data_response);
}

