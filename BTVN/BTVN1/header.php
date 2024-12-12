<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* General Navbar Styling */
.navbar {
  background-color: #f8f9fa; /* Light gray background */
  padding: 10px 20px;
  display: flex;
  border-bottom: 1px solid #ddd;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Soft shadow */
}

/* Navbar Logo Styling */
.logo h1 {
  font-size: 24px;
  font-weight: bold;
  margin: 0;
  color: #333; /* Dark text color */
}

/* Navbar Links Container */
.nav-links {
  display: flex;
  gap: 20px; /* Spacing between links */
  margin-left: 50px;
}

/* Individual Link Styling */
.nav-item {
  text-decoration: none; /* Remove underline */
  color: #333; /* Dark text color */
  font-size: 16px;
  font-weight: normal;
  padding: 5px 10px;
  transition: color 0.3s ease, background-color 0.3s ease; /* Smooth hover effect */
}

/* Hover Effect */
.nav-item:hover {
  color: #007bff; /* Change text color on hover */
  background-color: #e9ecef; /* Light background color on hover */
  border-radius: 5px; /* Rounded corners */
}
.container {
  width: 80%;
  margin: 20px auto;
}
    </style>
</head>
<body>
<div class="navbar">
    <div class="logo">
        <h1>Administration</h1>
    </div>
    <div class="nav-links">
        <a href="#home" class="nav-item">Trang chủ</a>
        <a href="#external" class="nav-item">Trang ngoài</a>
        <a href="#categories" class="nav-item">Thể loại</a>
        <a href="#authors" class="nav-item">Tác giả</a>
        <a href="#articles" class="nav-item">Bài viết</a>
    </div>
</div>


</body>
</html>