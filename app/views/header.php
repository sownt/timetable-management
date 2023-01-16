<?php
function isSelected($controller) {
  if (isset($_GET['controller']) && $_GET['controller'] == $controller) {
    return 'text-secondary';
  }
  return 'text-white';
}
?>
<header class="bg-dark text-white py-3 mb-4">
  <div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
      <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
        <li><a href="." class="nav-link px-2 <?= isSelected('home') ?>">Trang chủ</a></li>
        <li><a href="./?controller=teacher&action=search" class="nav-link px-2 <?= isSelected('teacher') ?>">Giáo viên</a></li>
        <li><a href="./?controller=lecture&action=search" class="nav-link px-2 <?= isSelected('lecture') ?>">Môn học</a></li>
        <li><a href="./?controller=schedule&action=search" class="nav-link px-2 <?= isSelected('schedule') ?>">Thời khóa biểu</a></li>
      </ul>

      <?php
      session_start();
      if (!isset($_SESSION['username'])) {
      ?>
      <div class="text-end">
        <button type="button" class="btn btn-outline-light me-2" id="login">Đăng nhập</button>
        <!-- <button type="button" class="btn btn-warning" disabled>Đăng ký</button> -->
      </div>
      <?php } else { ?>
      <div class="text-end">
        <button type="button" class="btn btn-outline-light me-2" id="login">Xin chào, <?= $_SESSION['username'] ?></button>
        <button type="button" class="btn btn-warning" id="logout">Đăng xuất</button>
      </div>
      <?php } ?>
    </div>
  </div>
</header>
<script type="text/javascript">
  document.getElementById("login").onclick = function() {
    window.location.href = location.protocol + '//' + location.host + location.pathname + "?controller=auth&action=login";
  };
</script>