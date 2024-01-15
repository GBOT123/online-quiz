<?php
include "../../connection.php";

// load thư viện đọc file excel
require "../../vendor/autoload.php";

use PhpOffice\PhpSpreadsheet\IOFactory;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Kiểm tra xem file có được tải lên không
    if (isset($_FILES['excel_file'])) {
        $file = $_FILES['excel_file'];

        // Lấy phần mở rộng của file
        $file_extension = pathinfo($file['name'], PATHINFO_EXTENSION);

        // Kiểm tra xem file có phải là file Excel không
        if ($file_extension === 'xlsx') {
            // Xác định vị trí lưu file
            $target_dir = "../uploads/";
            $target_file = $target_dir . basename($file["name"]);

            // Di chuyển file tải lên vào thư mục uploads
            if (move_uploaded_file($file["tmp_name"], $target_file)) {
                // Đọc file Excel
                $spreadsheet = IOFactory::load($target_file);
                $worksheet = $spreadsheet->getActiveSheet();

                // Lấy tên cột từ hàng đầu tiên từ cột A đến H cho column table
                $columnNames = $worksheet->rangeToArray('A1:H1')[0];

                // Lưu dữ liệu vào cơ sở dữ liệu
                foreach ($worksheet->getRowIterator() as $row) {
                    $cellIterator = $row->getCellIterator('A', 'H'); // Chỉ lấy các cột từ A đến H

                    $cells = [];
                    foreach ($cellIterator as $cell) {
                        $cells[] = $cell->getValue();
                    }

                    // Tạo câu lệnh INSERT
                    $columns = implode(", ", $columnNames);
                    $values = implode("', '", $cells);
                    $sql = "INSERT INTO questions ($columns) VALUES ('$values')";

                    $res = mysqli_query($link, $sql);

                    // // Thực hiện câu lệnh INSERT
                    if ($res) {
                        echo "New record created successfully";
                    } else {
                        echo "Error: " . $sql . "<br>" . $link->error;
                    }
                }
            } else {
                echo "Có lỗi xảy ra khi di chuyển file.";
            }
        } else {
            echo "File tải lên không phải là file Excel.";
        }
    } else {
        echo "Không có file nào được tải lên.";
    }
}
