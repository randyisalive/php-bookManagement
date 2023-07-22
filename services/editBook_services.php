<?php
include 'db.php';

$bookTitle = $_POST['bookTitle'];
$bookCategory = $_POST['bookCategory'];
$bookDescription = $_POST['bookDescription'];
$bookQuantity = $_POST['bookQuantity'];


// file 
$bookCover = $_FILES['bookCover'];
$bookCoverName = $bookCover['name'];
$bookCoverTmp = $bookCover['tmp_name'];
