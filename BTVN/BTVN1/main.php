<?php
session_start(); // Khởi tạo session

// Kiểm tra nếu session chứa sản phẩm
if (isset($_SESSION['products'])) {
    $products = $_SESSION['products']; // Lấy dữ liệu sản phẩm từ session
} else {
    $products = array(); // Nếu chưa có sản phẩm nào
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <style>
        /* Các style bảng */
    </style>
</head>
<body>
    <div class="container">
        <a href="add.php">
            <button class="add-button">Thêm mới</button>
        </a>
        <table>
            <thead>
                <tr>
                    <th>Sản phẩm</th>
                    <th>Giá thành</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody id="productTable">
                <?php if (empty($_SESSION['products'])) : ?>
                    <tr>
                        <td colspan="4">Không có sản phẩm nào.</td>
                    </tr>
                <?php else : ?>
                     <?php foreach ($_SESSION['products'] as $index => $product) : ?>
                        <tr>
                            <td><?= htmlspecialchars($product['sanpham']); ?></td>
                            <td><?= htmlspecialchars($product['Gia']); ?> VND</td>
                            <!-- Chỉnh sửa link để thêm index vào -->
                            <td><a href="edit.php?id=<?= $index ?>" class="edit-icon">✏️</a></td>
                            <td><span class="delete-icon" onclick="deleteProduct(this)">🗑️</span></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <script>
        function deleteProduct(element) {
            // Xử lý xóa sản phẩm (có thể sử dụng AJAX hoặc form gửi yêu cầu)
            var row = element.parentNode;
            row.parentNode.removeChild(row);
        }
    </script>
</body>
</html>
