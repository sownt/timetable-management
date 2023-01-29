<body>
  <?php include_once('app/views/header.php'); session_start();?>
  <div class="container">
    <div class="border m-auto p-5">
      <table class="table table-borderless mb-3">
        <tr>
          <th scope="row">Tên login:</th>
          <td>
            <?php if ($_SESSION['username']) {
              echo $_SESSION['username'];
            } else {
              echo "null";
            } ?>
          </td>
        </tr>
        <tr>
          <th scope="row">Thời gian login:</th>
          <td>
            <?php if ($_SESSION['last_active']) {
              echo $_SESSION['last_active'];
            } else {
              echo "null";
            } ?>
          </td>
        </tr>
      </table>
      <table class="table table-borderless">
        <tr>
          <th scope="col">Phòng học</th>
          <th scope="col">Giáo viên</th>
          <th scope="col">Môn học</th>
          <th scope="col">Thời khóa biểu</th>
        </tr>
        <tr>
          <td><a>Tìm kiếm</a></td>
          <td><a href="./?controller=teacher&action=search">Tìm kiếm</a></td>
          <td><a href="./?controller=lecture&action=search">Tìm kiếm</a></td>
          <td><a href="./?controller=schedule&action=search">Tìm kiếm</a></td>
        </tr>
        <tr>
          <td><a>Đăng ký</a></td>
          <td><a href="./?controller=teacher&action=register">Đăng ký</a></td>
          <td><a href="./?controller=lecture&action=register">Đăng ký</a></td>
          <td><a href="./?controller=schedule&action=register">Đăng ký</a></td>
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