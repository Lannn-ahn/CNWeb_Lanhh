
<?php
session_start(); // Khởi tạo session ngay lập tức

// Kiểm tra nếu form đã được submit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy giá trị từ form
    $sanpham = $_POST['sanpham'];  // Tên sản phẩm
    $gia = $_POST['Gia'];          // Giá sản phẩm

    // Kiểm tra nếu session chưa có mảng products thì khởi tạo
    if (!isset($_SESSION['products'])) {
        $_SESSION['products'] = array();
    }

    // Thêm sản phẩm vào mảng trong session
    $_SESSION['products'][] = array('sanpham' => $sanpham, 'Gia' => $gia);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Form</title>
    <style>
        <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        /* Form Container Style */
        .form-container {
            max-width: 800px;
            margin: 40px auto;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        /* Form Styles */
        form {
            display: flex;
            align-items: center;
            gap: 20px;
            flex-wrap: wrap;
        }
        button[type="submit"] {
            padding: 12px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 14px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 10px;
        }
    </style>
    </style>
</head>
<body>
    <?php include 'header.php'; ?>
    
    <div class="form-container">
        <form action="add.php" method="post">
            <label for="sanpham">Tên sản phẩm:</label>
            <input type="text" name="sanpham" placeholder="Nhập tên sản phẩm">
            
            <label for="Gia">Giá:</label>
            <input type="number" name="Gia" placeholder="Nhập giá sản phẩm">
            
            <button type="submit">Thêm sản phẩm</button>
        </form>
    </div>

    <?php include 'footer.php'; ?>
</body>
</html>
