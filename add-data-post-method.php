<?php 
    header("Access-Control-Allow-Headers: Authorization, Content-Type");
    header("Access-Control-Allow-Origin: *");
    header('content-type: application/json; charset=utf-8');
    header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Cache-Control, Pragma, Authorization, Accept, Accept-Encoding");
    include("config.php");
    if ($conn->connect_error) {
        die("Connection Failed". $conn->connect_error);
    }
    else{
        $_POST= json_decode(file_get_contents('php://input'),true);
        if ($_SERVER["REQUEST_METHOD"]=='POST') {
            $name = $_POST["name"];
            $sql="INSERT INTO flutter(name) VALUES ('$name')";
            if ($conn->query($sql)) {
                echo "Success";
            }
            else {
                die("Error in Data insert");
            }
        }
    }
    $conn->close();
?>