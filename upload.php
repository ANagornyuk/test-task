<?php

require 'mysql.php';

$uploaddir = 'uploads';
$destination = dirname(__FILE__).DIRECTORY_SEPARATOR.$uploaddir.DIRECTORY_SEPARATOR;
$uploadfile = $destination.basename($_FILES['userfile']['name']);

//echo '<pre>';
if (is_uploaded_file($_FILES['userfile']['tmp_name'])){
	echo "Файл загружен";
	$upl_time = time();
	if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
    	echo "Файл корректен и был успешно загружен.\n";
    	$name = $_FILES['userfile']['name'];
    	$path = addslashes($uploaddir.DIRECTORY_SEPARATOR.basename($_FILES['userfile']['name']));
    	$type = $_FILES['userfile']['type'];
    	$size = $_FILES['userfile']['size'];
    	//$upl_time = date ("F d Y H:i:s.", filemtime($_FILES['userfile']['name']));
    	$sql = 'INSERT INTO file(name, path, type, size, upl_time) VALUES '.
			"('$name', '$path', '$type', $size, $upl_time)";
		if ($conn->query($sql) === TRUE) {
    		echo "New record created successfully".'<br>';
		} else {
    		echo "Error: " . $sql . "<br>" . $conn->error . '<br>';
		}
	} else {
    	echo "Возможная атака с помощью файловой загрузки!\n";
	}
} else {
	echo "Ошибка загрузки";
}


// echo 'Некоторая отладочная информация:';
// print_r($_FILES);
// print($destination);

//print "</pre>";



// Каталог, в который мы будем принимать файл:
// $uploaddir = './files/';
// $uploadfile = $uploaddir.basename($_FILES['userfile']['name']);

// // Копируем файл из каталога для временного хранения файлов:
// if (copy($_FILES['userfile']['tmp_name'], $uploadfile))
// {
// echo "<h3>Файл успешно загружен на сервер</h3>";
// }
// else { echo "<h3>Ошибка! Не удалось загрузить файл на сервер!</h3>"; exit; }

// // Выводим информацию о загруженном файле:
// echo "<h3>Информация о загруженном на сервер файле: </h3>";
// echo "<p><b>Оригинальное имя загруженного файла: ".$_FILES['userfile']['name']."</b></p>";
// echo "<p><b>Mime-тип загруженного файла: ".$_FILES['userfile']['type']."</b></p>";
// echo "<p><b>Размер загруженного файла в байтах: ".$_FILES['userfile']['size']."</b></p>";
// echo "<p><b>Временное имя файла: ".$_FILES['userfile']['tmp_name']."</b></p>";

?>
