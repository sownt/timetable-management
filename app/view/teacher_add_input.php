<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Teacher</title>
    <link rel="stylesheet" href="../../web/css/teacher_add_input.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
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
        $error_specialized = "Hãy chọn chuyên ngành.";
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

    <div class="container">
    <form action="" method="POST" enctype="multipart/form-data">

        <?php if (!$isValid) { 
            echo '<div class="error"> <label>' . $error_name . '</label> </div>';
        } ?>
        <div class="form-input-line">
            <label class="input-label">
                Họ và tên
            </label>
            <input type="text" name="name" style="width: 192px; background-color: #e1eaf4; padding: 5px 0px 5px 5px;" 
            value="<?php 
                if ($_SERVER['REQUEST_METHOD'] == "POST") {
                    echo isset($_POST["name"]) ? $_POST["name"] : ''; 
                } else {
                    echo isset($_SESSION['name']) ? $_SESSION['name'] : '';
                }
            ?>">
        </div>

        <?php if (!$isValid) { 
            echo '<div class="error"> <label>' . $error_specialized . '</label> </div>';
        } ?>
        <div class="form-input-line">
            <label class="input-label">
                Chuyên ngành
            </label>
            <select name="specialized" id="specialized" style="width: 200px; background-color: #e1eaf4; padding: 5px 0px 5px 5px;">
                <?php
                    foreach ($specialized as $key => $value) {
                        echo "<option value=". $key . ">" . $value . "</option>"; 
                    }
                ?>
            </select>
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

        <?php if (!$isValid) { 
            echo '<div class="error"> <label>' . $error_degree . '</label> </div>';
        } ?>
        <div class="form-input-line">
            <label class="input-label">
                Học vị
            </label>
            <select name="degree" id="degree" style="width: 200px; background-color: #e1eaf4; padding: 5px 0px 5px 5px;">
                <?php
                foreach ($degrees as $key => $value) {
                    echo "<option value=" . $key . ">" . $value . "</option>"; 
                }
                ?>
                
            </select>
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

        <?php if (!$isValid) { 
            echo '<div class="error"> <label>' . $error_avatar . '</label> </div>';
        } ?>
        <div class="form-input-line" >
            <label class="input-label">
                Avatar
            </label>
            <div>   
				<div class="form_item_file" id="browse">
					<div class="form_item_filename" id="filename"></div>
					<div class="form_item_button">
						<label class="form_item_upload" for="avatar">Browse</label>
						<input type="file" id="avatar" name="avatar" accept="image/*"/>
					</div>
				</div>
			</div>
        </div>
        
        <?php if (!$isValid) { 
            echo '<div class="error"> <label>' . $error_description . '</label> </div>';
        } ?>
        <div class="form-input-line">
            <label class="input-label">
                Mô tả thêm
            </label>
            <textarea name="description" id="description" style="width: 350px; height: 100px; background-color: #e1eaf4;"></textarea>
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
        <div class="form-input-line" style="align-items: center; display: flex; justify-content: center;">
            <input class="submit-button" type="submit" value="Xác nhận">
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