<!-- Tìm kiếm, xem chi tiết thông tin giáo viên -->
<?php
include 'connect.php';
?>
<?php
// Tìm kiếm giáo viên
if(isset($_POST['search']))
{
    $search = $_POST['search'];
    $sql = "SELECT * FROM teacher WHERE name LIKE '%$search%'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_assoc($result))
        {
            echo "<div class='teacher'>";
            echo "<div class='teacher-img'>";
            echo "<img src='images/teacher/".$row['image']."'>";
            echo "</div>";
            echo "<div class='teacher-info'>";
            echo "<h3>".$row['name']."</h3>";
            echo "<p>".$row['info']."</p>";
            echo "</div>";
            echo "</div>";
        }
    }
    else
    {
        echo "Không tìm thấy giáo viên";
    }
}
?>
<?php
// Xem chi tiết thông tin giáo viên
if(isset($_GET['id']))
{
    $id = $_GET['id'];
    $sql = "SELECT * FROM teacher WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_assoc($result))
        {
            echo "<div class='teacher'>";
            echo "<div class='teacher-img'>";
            echo "<img src='images/teacher/".$row['image']."'>";
            echo "</div>";
            echo "<div class='teacher-info'>";
            echo "<h3>".$row['name']."</h3>";
            echo "<p>".$row['info']."</p>";
            echo "</div>";
            echo "</div>";
        }
    }
    else
    {
        echo "Không tìm thấy giáo viên";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Trường học</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="web/css/style.css">
</head>
<body>
    <div class="header">
        <div class="logo">
            <a href="index.php"><img src="web/images/logo.png"></a>
        </div>
        <div class="menu">
            <ul>
                <li><a href="index.php">Trang chủ</a></li>
                <li><a href="student.php">Học sinh</a></li>
                <li><a href="teacher.php">Giáo viên</a></li>
                <li><a href="class.php">Lớp học</a></li>
            </ul>
        </div>
    </div>
    <div class="content">
        <div class="search">
            <form action="teacher.php" method="POST">
                <input type="text" name="search" placeholder="Tìm kiếm giáo viên">
                <input type="submit" name="submit" value="Tìm kiếm">
            </form>
        </div>
    </div>
    <div class="footer">
        <p>Trường học</p>
    </div>
</body>
</html>


