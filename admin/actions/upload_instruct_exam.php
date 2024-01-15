<?php
session_start();
include "../../connection.php";

// load thư viện đọc file excel
require "../../vendor/autoload.php";

use PhpOffice\PhpSpreadsheet\IOFactory;

function set_message($message)
{
    $_SESSION['message'] = $message;
    header('Location: ' . $_SERVER['HTTP_REFERER']); // Chuyển hướng người dùng trở lại trang trước
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["submit_file"])) {
    if (!isset($_FILES['excel_file'])) {
        set_message("Không có file nào được tải lên.");
    }

    $file = $_FILES['excel_file'];
    $file_extension = pathinfo($file['name'], PATHINFO_EXTENSION);

    if ($file_extension !== 'xlsx') {
        set_message("File tải lên không phải là file Excel.");
    }

    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($file["name"]);

    if (!move_uploaded_file($file["tmp_name"], $target_file)) {
        set_message("Có lỗi xảy ra khi di chuyển file.");
    }

    $spreadsheet = IOFactory::load($target_file);
    $worksheet = $spreadsheet->getActiveSheet();
    $columnNames = $worksheet->rangeToArray('A1:H1')[0];

    foreach ($worksheet->getRowIterator(2) as $row) {
        $cellIterator = $row->getCellIterator('A', 'H');
        $cells = [];
        foreach ($cellIterator as $cell) {
            $cells[] = $cell->getValue();
        }

        if (array_filter($cells)) {
            $columns = implode(", ", $columnNames);
            $values = implode("', '", $cells);
            $sql = "INSERT INTO questions ($columns) VALUES ('$values')";


            if (!mysqli_query($link, $sql)) {
                set_message("Error: " . $sql . "<br>" . $link->error);
            }
        }
    }

    set_message("New record created successfully");
}
