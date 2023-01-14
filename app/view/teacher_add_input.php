<!DOCTYPE html>
<html lang="vi">
<head>
  <title>Thêm mới giáo viên</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
<?php
session_start();

$specialized = array("0" => "",
                    "001" => "Khoa học máy tính",
                    "002" => "Khoa học dữ liệu",
                    "003" => "Hải dương học"
);

$degrees = array("0" => "",
                    "001" => "Cử nhân",
                    "002" => "Thạc sĩ",
                    "003" => "Tiến sĩ",
                    "004" => "Phó giáo sư",
                    "005" => "Giáo sư"
);

$isValid = true;
$error_name = "";
$error_specialized = "";
$error_degree = "";
$error_avatar = "";
$error_description = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $error_name = "Hãy nhập tên giáo viên.";
        $isValid = false;
    } else if (strlen($_POST["name"]) > 100) {
        $error_name = "Không nhập quá 100 ký tự.";
        $isValid = false;
    }
    if ($_POST["specialized"] == "0") {
        $error_specialized = "Hãy chọn bộ môn.";
        $isValid = false;
    }
    if ($_POST["degree"] == "0") {
        $error_degree = "Hãy chọn bằng cấp.";
        $isValid = false;
    }
    if (empty($_FILES['avatar']['name'])) {
        $error_avatar = "Hãy chọn avatar";
        $isValid = false;
    }
    if (empty($_POST["description"])) {
        $error_description = "Hãy nhập mô tả chi tiết";
        $isValid = false;
    } else if (strlen($_POST["description"]) > 1000) {
        $error_description = "Không nhập quá 1000 ký tự";
        $isValid = false;
    }
    if ($isValid) {
        $_SESSION["name"] = $_POST["name"];
        $_SESSION["specialized"] = $_POST["specialized"];
        $_SESSION["degree"] = $_POST["degree"];
        $_SESSION["avatar"] = $_FILES['avatar']['name'];
        $_SESSION["description"] = $_POST["description"];
        $target_path = "../../web/avatar/";
        $target_path = $target_path . basename($_FILES['avatar']['name']); 
        if(copy($_FILES['avatar']['tmp_name'], $target_path)) {
            header('location: teacher_add_confirm.php');
            unset($_SERVER["REQUEST_METHOD"]);
        }
        exit();
    }
}
?>


<div class="container" style="border:1px solid; margin: auto; height: 600px; width: 700px;">
    <h2 style="text-align:center">Đăng ký thông tin giáo viên</h2>
    
    <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
        <!-- Họ và tên -->
        <div class="form-group">
            <?php if (!$isValid) { 
                echo '<label class="sr-only control-label col-sm-4" ></label>';
                echo '<span class="control-label col-sm-6" style="color:red; text-align:left">' . $error_name . '</span>';
            } ?>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-4" style="text-align:right">Họ và tên</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="name"
                    value="<?php 
                                if ($_SERVER['REQUEST_METHOD'] == "POST") {
                                    echo isset($_POST["name"]) ? $_POST["name"] : ''; 
                                } else {
                                    echo isset($_SESSION['name']) ? $_SESSION['name'] : '';
                                }
                            ?>"
                >
            </div>
        </div>

        <!-- Bộ môn -->
        <div class="form-group">
            <?php if (!$isValid) { 
                echo '<label class="sr-only control-label col-sm-4" ></label>';
                echo '<span class="control-label col-sm-6" style="color:red; text-align:left">' . $error_specialized . '</span>';
            } ?>
        </div>
        <div class="form-group">         
            <label class="control-label col-sm-4" >Bộ môn</label>
            <div class="col-sm-6">          
                <select class="form-control" name="specialized" id="specialized">
                            <?php
                                foreach ($specialized as $key => $value) {
                                    echo "<option value=". $key . ">" . $value . "</option>"; 
                                }
                            ?>
                </select>
            </div>
        </div>
        <script type="text/javascript">
            document.getElementById('specialized').value = "<?php
                if ($_SERVER['REQUEST_METHOD'] == "POST") {
                    echo $_POST['specialized'];
                } else {
                    echo $_SESSION['specialized'];
                }
            ?>";
        </script>

        <!-- Học vị -->
        <div class="form-group">
            <?php if (!$isValid) { 
                echo '<label class="sr-only control-label col-sm-4" ></label>';
                echo '<span class="control-label col-sm-6" style="color:red; text-align:left">' . $error_degree . '</span>';
            } ?>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-4" >Học vị</label>
            <div class="col-sm-6">
                <select class="form-control" name="degree" id="degree">
                    <?php
                    foreach ($degrees as $key => $value) {
                        echo "<option value=" . $key . ">" . $value . "</option>"; 
                    }
                    ?>   
                </select>     
            </div>
        </div>
        <script type="text/javascript">
            document.getElementById('degree').value = "<?php
                if ($_SERVER['REQUEST_METHOD'] == "POST") {
                    echo $_POST['degree'];
                } else {
                    echo $_SESSION['degree'];
                }
            ?>";
        </script>

        <!-- Avatar -->
        <div class="form-group">
            <label class="sr-only control-label col-sm-4" >Avatar</label>
            <?php if (!$isValid) { 
                echo '<span class="control-label col-sm-6" style="color:red; text-align:left">' . $error_avatar . '</span>';
            } ?>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-4" >Avatar</label>
            <div>       
				<div class="col-sm-6" id="browse">
					<!-- <div class="form_item_filename" id="filename"></div> -->
					<div class="form-control">
						<!-- <label class="form_item_upload" for="avatar"></label> -->
						<input type="file" id="avatar" name="avatar" accept="image/*"/>
					</div>
				</div>
			</div>
        </div>
        
        <!-- Mô tả -->
        <div class="form-group">
            <?php if (!$isValid) { 
                echo '<label class="sr-only control-label col-sm-4" ></label>';
                echo '<span class="control-label col-sm-6" style="color:red; text-align:left">' . $error_description . '</span>';
            } ?>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-4">Mô tả</label>
            <div class="col-sm-6">
                <textarea class="form-control" name="description" id="description" ></textarea>
            </div>
            
        </div>
        <script type="text/javascript">
            document.getElementById('description').value = "<?php
                if ($_SERVER['REQUEST_METHOD'] == "POST") {
                    echo $_POST['description'];
                } else {
                    echo $_SESSION['description'];
                }
            ?>";
        </script>

        <!-- Nút xác nhận -->
        <div class="col-sm-offset-5 col-sm-10">
            <input class="btn btn-default" type="submit" value="Xác nhận">
        </div>
    </form>
    </div>
</body>

<script>
	$('#avatar').change(function() {
		var i = $(this).prev('label').clone();
		var file = $('#avatar')[0].files[0].name;
		document.getElementById("filename").innerHTML = file;
		document.getElementById("avatar").src = window.URL.createObjectURL(this.files[0]);
	});
</script>
</html>