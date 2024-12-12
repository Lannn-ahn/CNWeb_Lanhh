<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sinh viên</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php
// Đường dẫn tới tệp CSV
$filename = "KTPM3_Danh_sach_diem_danh.csv";

// Mảng chứa dữ liệu sinh viên
$sinhvien = [];

// Kiểm tra tệp có tồn tại không
if (file_exists($filename)) {
    // Mở tệp CSV
    if (($handle = fopen($filename, "r")) !== FALSE) {
        // Đọc tiêu đề cột (dòng đầu tiên)
        $headers = fgetcsv($handle, 1000, ",");

        // Đọc từng dòng dữ liệu
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            // Kết hợp tiêu đề cột và giá trị để tạo mảng liên kết
            $sinhvien[] = array_combine($headers, $data);
        }
        // Đóng tệp
        fclose($handle);
    }
} else {
    echo "Tệp $filename không tồn tại.";
}

// Kiểm tra mảng dữ liệu (tạm thời)
 //print_r($sinhvien);

?>

    <div class="container mt-5">
        <h1 class="text-center mb-4">Danh sách sinh viên</h1>
        <!-- Kiểm tra dữ liệu sinh viên -->
        <?php if (!empty($sinhvien)) : ?>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Lastname</th>
                    <th>Firstname</th>
                    <th>Class</th>
                    <th>Email</th>
                    <th>Course</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Duyệt qua từng sinh viên và hiển thị
                foreach ($sinhvien as $sv) {
                    echo "<tr>";
                    echo "<td>{$sv['username']}</td>";
                    echo "<td>{$sv['password']}</td>";
                    echo "<td>{$sv['lastname']}</td>";
                    echo "<td>{$sv['firstname']}</td>";
                    echo "<td>{$sv['city']}</td>";
                    echo "<td>{$sv['email']}</td>";
                    echo "<td>{$sv['course1']}</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <?php else : ?>
        <div class="alert alert-warning text-center">
            Không có dữ liệu sinh viên để hiển thị.
        </div>
        <?php endif; ?>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>