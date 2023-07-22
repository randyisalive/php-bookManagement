<?php

include 'db.php';


$categoryName = $_POST['categoryName'];



function check_categories($categoryName, $conn) // function to check if POST categories already exist
{
    // get all the categories
    $temp = $conn->prepare("SELECT * FROM bookcategories");
    $temp->execute();
    $result = $temp->get_result();


    // check category if its already exist
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if ($categoryName == $row['categories']) {
                die("Category " . $categoryName . " already exist");
            }
        }
    }
}

check_categories($categoryName, $conn);
// INSERT NEW CATEGORIES
$sql = "INSERT INTO bookcategories (categories) VALUES ('$categoryName')";

$temp = $conn->prepare($sql);
if ($temp->execute()) {
    $conn->commit();
    header("Location: ../templates/categories_template.php");
}
