<?php

require 'mysql.php';



if(!empty($row = $_POST["row"])){
	$sql = "DELETE FROM adyax WHERE  id=".$row["id"]."";
	if ($conn->query($sql) === TRUE) {
    	echo "Record deleted successfully";
	} else {
    	echo "Error deleting record: " . $conn->error;
	}
	unlink($row["path"]);
}


?>
