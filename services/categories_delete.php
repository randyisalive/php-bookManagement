<?php
include "db.php";
$cateogires_id = $_GET['id'];
$sql = "DELETE FROM bookcategories WHERE id = '$cateogires_id'";
$temp = $conn->prepare($sql);

if ($temp->execute()) {
    $conn->commit();
    header("Location: ../templates/categories_template.php");
} else {
    die("SQL Execute Error");
}
