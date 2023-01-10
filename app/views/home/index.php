<body>
  <?php include_once('app/views/header.php'); ?>
  <div class="container">
    <div class="border m-auto p-5">
      <table class="table table-borderless mb-5">
        <tr>
          <th scope="row">Tên login:</th>
          <td><?= $user ?></td>
        </tr>
        <tr>
          <th scope="row">Thời gian login:</th>
          <td><?= $last_active ?></td>
        </tr>
      </table>
      <table class="table table-borderless">
        <tr>
          <th class="text-center" scope="col">Giáo viên</th>
          <th class="text-center" scope="col">Môn học</th>
          <th class="text-center" scope="col">Thời khóa biểu</th>
        </tr>
        <tr>
          <td class="text-center"><a href="./?controller=teacher&action=search">Tìm kiếm</a></td>
          <td class="text-center"><a href="./?controller=lecture&action=search">Tìm kiếm</a></td>
          <td class="text-center"><a href="./?controller=schedule&action=search">Tìm kiếm</a></td>
        </tr>
        <tr>
          <td class="text-center"><a href="./?controller=teacher&action=register">Đăng ký</a></td>
          <td class="text-center"><a href="./?controller=lecture&action=register">Đăng ký</a></td>
          <td class="text-center"><a href="./?controller=schedule&action=register">Đăng ký</a></td>
        </tr>
        <tr>
          <td class="text-center"><a href="./?controller=teacher&action=register">Chỉnh sửa</a></td>
          <td class="text-center"><a href="./?controller=lecture&action=register">Chỉnh sửa</a></td>
          <td class="text-center"><a href="./?controller=schedule&action=register">Chỉnh sửa</a></td>
        </tr>
      </table>
    </div>
  </div>
  <script type="text/javascript">
    document.getElementById("addTeacher").onclick = function() {
      window.location.href = window.location.href + "?controller=teacher&action=register";
    };
  </script>
  <?php include_once('app/views/footer.php'); ?>
</body>