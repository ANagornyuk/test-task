<?php

$uploaddir = 'uploads';
$destination = dirname(__FILE__).DIRECTORY_SEPARATOR.$uploaddir.DIRECTORY_SEPARATOR;
$uploadfile = $destination.basename($_FILES['userfile']['name']);

//echo '<pre>';
if (is_uploaded_file($_FILES['userfile']['tmp_name'])){
	echo "Файл загружен";
} else {
	echo "Ошибка загрузки";
}
if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
    echo "Файл корректен и был успешно загружен.\n";
} else {
    echo "Возможная атака с помощью файловой загрузки!\n";
}

echo 'Некоторая отладочная информация:';
print_r($_FILES);
print($destination);

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
