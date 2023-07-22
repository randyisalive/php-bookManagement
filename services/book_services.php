<?php
include 'db.php';
session_start();

// Check if user has session
if (!isset($_SESSION['username'])) {
    header("Location: ../templates/login_template.php");
}

/* 
The $_FILES['input_name'] array contains the following elements:

name: The original name of the file.

type: The MIME type of the file (e.g., "image/jpeg" for JPEG images).

tmp_name: The temporary filename on the server where the uploaded file is stored before processing.

error: The error code associated with the file upload (0 if no errors).

size: The size of the uploaded file in bytes. */

//user_id
$user_id = $_SESSION['user_id'];

// declare book post variable
$book_title = $_POST['title'];
$book_category = $_POST['category'];
$book_description = $_POST['description'];
$book_quantity = $_POST['quantity'];


// Book Files Variable
$bookFile = $_FILES['bookFile'];
$bookFileName = $bookFile['name'];
$bookFileTmp = $bookFile['tmp_name'];

// Book Cover Variable
$bookCover = $_FILES['bookCover'];
$bookCoverName = $bookCover['name'];
$bookCoverTmp = $bookCover['tmp_name'];



$sql = "INSERT INTO books (title, category, description, total, book_file, cover_page, user_id) VALUES ('$book_title', '$book_category', '$book_description', '$book_quantity', '$bookFileName', '$bookCoverName', '$user_id')";
$temp = $conn->prepare($sql);
if ($temp === false) {
    echo "Error executing query" . $conn->error;
}

if ($temp->execute()) {
    $conn->commit();
    // upload file to folder bookData
    $targetDir = "../bookData/"; //target directory
    $tagetFile = $targetDir . basename($_FILES['bookFile']['name']);
    if (move_uploaded_file($bookFileTmp, $tagetFile)) {
        // upload book cover
        move_uploaded_file($bookCoverTmp, $targetDir . basename($bookCoverName));
        echo "The file " . basename($bookFileName) . " has been uploaded.";
        header("Location: ../index.php");
    } else {
        echo "Error uploading file...";
    }
}
