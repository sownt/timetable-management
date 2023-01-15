<?php
session_start();
if(!isset($_SESSION['IS_LOGIN'])){
	header('location:login.php');
	die();
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <!-- base style  -->
  <link rel="stylesheet" href="styles.css">

  <!-- bootstrap -->
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
  <title>Home</title>
</head>

<body>
  <body class="mx-auto p-5 " >
    <div class='border p-5'>
    <div class="container-box">
      <div class="search-box">
        <form id="search-form" action="" method="get">
          <div class="info-col">
            <p>Tên login :</p>
          </div>
          <div class="info-col">
            <p>Thời gian login :</p>
          </div>
        </form>
      </div>
    </br>
      <table class="table table-bordered ">
      <thead>
        <tr>
          <th scope="col">Phòng học</th>
          <th scope="col">Giáo viên</th>
          <th scope="col">Môn học</th>
          <th scope="col">Thời khóa biểu</th>
        </tr>
        <thead>
        <tbody>
        <tr>
          <td scope="row"><a>Tìm kiếm</a></td>
          <td><a>Tìm kiếm</a></td>
          <td><a>Tìm kiếm</a></td>
          <td> <a>Tìm kiếm</a> </td>
        </tr>
        <tr>
          <td scope="row"><a>Thêm mới</a></td>
          <td><a>Thêm mới</a></td>
          <td><a>Thêm mới</a></td>
          <td> <a>Thêm mới</a> </td>
        </tr>
        <tbody>
      </table>
    </div>
</div>
  </body>
</html>