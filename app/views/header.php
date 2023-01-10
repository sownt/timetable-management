<header class="bg-dark text-white py-3 mb-4">
  <div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
      <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
        <li><a href="." class="nav-link px-2 text-secondary">Trang chủ</a></li>
        <li><a href="#" class="nav-link px-2 text-white">Môn học</a></li>
        <li><a href="#" class="nav-link px-2 text-white">Giáo viên</a></li>
        <li><a href="#" class="nav-link px-2 text-white">Thời khóa biểu</a></li>
      </ul>

      <div class="text-end">
        <button type="button" class="btn btn-outline-light me-2" id="login">Đăng nhập</button>
        <button type="button" class="btn btn-warning" disabled>Đăng ký</button>
      </div>
    </div>
  </div>
</header>
<script type="text/javascript">
  document.getElementById("login").onclick = function() {
    window.location.href = location.protocol + '//' + location.host + location.pathname + "?controller=auth&action=login";
  };
</script>