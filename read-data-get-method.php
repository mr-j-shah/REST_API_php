<?php 
    header("Access-Control-Allow-Headers: Authorization, Content-Type");
    header("Access-Control-Allow-Origin: *");
    header('content-type: application/json; charset=utf-8');
    header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Cache-Control, Pragma, Authorization, Accept, Accept-Encoding");
    include("config.php")
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    else {
        $loaninfo = array();    
        if($_SERVER["REQUEST_METHOD"] == "GET")
        {
	        $sql="SELECT * FROM flutter";

            $result = $conn->query($sql) or die("Error in Selecting " . mysqli_error($conn));
	        if ($result) {    
                while($row=$result->fetch_assoc()){
			        $loaninfo[]=$row;
		        }
	        } else {
		        $loaninfo[] ="Sorry";	
	        }
	        echo json_encode($loaninfo);
        }
        $conn->close();
    }
?>