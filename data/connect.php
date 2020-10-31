<?php

$conn = null;

try {
    $conn = new PDO("mysql:host=localhost;dbname=testdb", "root", "");
} catch(PDOException $e) {
    echo "Connection to data failed: " . $e->getMessage();
}

?>