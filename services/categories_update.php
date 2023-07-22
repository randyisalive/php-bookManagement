<?php

include "db.php";
$categoriesName = $_POST['categoryName'];
$categoriesId = $_GET['id'];
$sql = "UPDATE bookcategories SET categories = '$categoriesName' WHERE id = '$categoriesId'";

$temp = $conn->prepare($sql);

if ($temp->execute()) {
    $conn->commit();
    header("Location: ../templates/categories_template.php");
} else {
    die("UPDATE FAILED" . $conn->error);
}
