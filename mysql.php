<?php
$conn = new mysqli('127.0.0.1', 'root', '1', 'adyax');
if ($conn->connect_errno) {
    echo "Не удалось подключиться к MySQL: (" . $conn->connect_errno . ") " . $conn->connect_error;
}