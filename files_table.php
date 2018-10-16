<?php
	include 'mysql.php';

	$sql = "SELECT  id, name, path, type, size, upl_time FROM file";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	    echo "<table><tr><th>Name</th><th>Type</th><th>Size</th><th>Upload time</th><th>Download</th><th>Delete</th></tr>";
	    // output data of each row
	    $form = '<form method="POST" action="delete_file.php">
		    	<input type="hidden" name="row" value="$row" />
		    	<input type="submit" value="Удалить" />
			</form>';
	    while($row = $result->fetch_assoc()) {
	        echo "<tr>
	        <td>".$row["name"]."</td>
	        <td>".$row["type"]."</td>
	        <td>".strval(intval($row["size"])/1024)."Kb"."</td>
	        <td>".date("Y-m-d H:i:s", $row["upl_time"])."</td>
	        <td><a href=".$row["path"]." download>Скачать файл</a></td>
	        <td>".'<form method="POST" action="delete_file.php">
		    	<input type="hidden" name="id" value="'.$row["id"].'" />
		    	<input type="hidden" name="file_path" value="'.$row["path"].'" />
		    	<input type="submit" value="Удалить" />
			</form>'."</td>
	        
	        </tr>";
	    }
	    echo "</table>";
	} else {
	    echo "0 results";
	}
	//$conn->close();
?>