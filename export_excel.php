<?php
require 'vendor/autoload.php';
include 'services/db.php';


use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$book_id = $_GET['id'];
$sql = "SELECT * FROM books WHERE id = ?";
$temp = $conn->prepare($sql);
$temp->bind_param("i", $book_id); // Assuming 'id' is an integer in the database
$temp->execute();
$result = $temp->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    $title = $row['title'];
    $description = $row['description'];
    $total = $row['total'];
    $category = $row['category'];

    // Your data (example data)
    $data = array(
        array('Book ID', 'Book Title', 'Book Description', 'Book Category', 'Book Total'),
        array($book_id, $title, $description, $category, $total),
        // Add more data rows as needed
    );
} else {
    die("No Data Detected" . $conn->error);
}

// Create a new Spreadsheet object
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Add data to the worksheet
foreach ($data as $rowIndex => $rowData) {
    foreach ($rowData as $columnIndex => $value) {
        $sheet->setCellValueByColumnAndRow($columnIndex + 1, $rowIndex + 1, $value);
    }
}

// Set the headers for downloading the Excel file
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="' . $title . '.xlsx"');
header('Cache-Control: max-age=0');

// Save the Excel file to the browser
$writer = new Xlsx($spreadsheet);
$writer->save('php://output');
