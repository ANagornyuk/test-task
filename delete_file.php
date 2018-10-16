<?php

require 'mysql.php';



if(!empty($id = $_POST["id"])){
	$sql = 'DELETE FROM file WHERE  id='.$id.'';
	if ($conn->query($sql) === TRUE) {
    	echo "Record deleted successfully";
	} else {
    	echo "Error deleting record: " . $conn->error;
	}
	unlink($_POST["file_path"]);
}


?>
