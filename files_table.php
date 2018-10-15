<?php
	include 'mysql.php';

	$sql = "SELECT name, path, type, size, upl_time FROM file";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	    echo "<table><tr><th>Name</th><th>Type</th><th>Size</th><th>Upload time</th><th>Download</th><th>Delete</th></tr>";
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
	        echo "<tr>
	        <td>".$row["name"]."</td>
	        <td>".$row["type"]."</td>
	        <td>".strval(intval($row["size"])/1024)."Kb"."</td>
	        <td>".date("Y-m-d H:i:s", $row["upl_time"])."</td>
	        <td><a href=".$row["path"]." download>Скачать файл</a></td>
	        <td></td>
	        </tr>";
	    }
	    echo "</table>";
	} else {
	    echo "0 results";
	}
	//$conn->close();
?>