<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["fileToUpload"])) {
        // Set the target directory
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        
        // Check the file size (limit: 500 KB)
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            echo "Xin lỗi, tệp tin của bạn quá lớn.";
            exit;
        }

        // Check the file type
        $imageFileType = strtolower(pathinfo($_FILES["fileToUpload"]["name"], PATHINFO_EXTENSION));
        // Allow only certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo "Xin lỗi, chỉ các tệp JPG, JPEG, PNG & GIF mới được cho phép.";
            exit;
        }

        // Move the uploaded file to the target directory if validation passes
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "Tệp " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " đã được tải lên.";
            echo '<br><img src="' . $target_file . '" alt="Uploaded Image">';
        } else {
            echo "Xin lỗi, đã có lỗi xảy ra trong quá trình tải tệp tin của bạn.";
        }
    }
    ?>
