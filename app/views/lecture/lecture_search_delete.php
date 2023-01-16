<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

</head>

<body>
    <?php
        $conn = mysqli_connect('localhost', 'root', '', 'timetable_management');
        $id = $_GET['id'];
        $sql = "DELETE FROM subjects WHERE id = $id";
        mysqli_query($conn, $sql);
        // header('Location: lecture_search.php');
    ?>
</body>