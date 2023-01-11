<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel='stylesheet' href='../../app/common/classroom_search_style.css'>
</head>

<?php
    // $course = array("" => "", "LT" => "Lập trình", "VE" => "Vẽ", "AN" => "Âm nhạc");
    $server_name="localhost";

    $username="root";

    $password="";

    $database_name="test";
    $conn = mysqli_connect($server_name, $username, $password, $database_name);
    $sql = "SELECT * FROM subject";

        $result = mysqli_query($conn, $sql);
        $course = array("" => "");
        while($row = mysqli_fetch_assoc($result)){
            array_push($course, $row["name"]);
        }
        // if (isset($_GET["search"]) && !empty($_GET["search"])){
        //     $key = $_GET["search"];
        //     $sql_search = "SELECT * FROM subject WHERE description LIKE '%key%' OR name LIKE '%key%' OR school_year LIKE '%key%'";
        // }else{
        //     $sql_search = "SELECT * FROM subject";
        // }
        // $search_result = mysqli_query($conn, $sql_search);
        
?>
<body>
    <form method='get' action='../../app/controller/classroom_search.php' name=''>
    <div class="fieldset" style = "width: 600px;
                                height: 520px;
                                padding-left: 15px;
                                border: 2px solid steelblue;">
        <div class='field'>
            <table>
                <tr>
                    <td class='td'><label>Khóa học</label></td>
                    <td>
                        <select class="box" name='department' style = 'border-color:#82cd79;height: 100%;width: 80%;' 
                        id="department_in" onkeyup='saveValue(this);'>
                            <?php
                                foreach ($course as $key => $value) {
                                    echo "<option";
                                    // echo (isset($_POST['faculty']) && $_POST['faculty'] == $key) ? " selected " : "";
                                    echo " value='" . $key . "'>" . $value . "</option>";
                                }
                            ?> 
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class='td'><label>Từ khóa</label></td>
                    <td>
                        <input type='text' class='box' name='key' id='key_input' value=''
                        <?php
                          if (isset($_GET["key"])){
                            echo $_GET["key"];
                          }  
                        ?>
                        ">
                    </td>
                </tr>
            </table>
            <button name='submit' value='submit'>Tìm kiếm</button>
        </div>
            
        
        <?php
            if (isset($_GET['key']) ? $_GET['key'] : ''){
                $key = trim($_GET['key']);
                print($key);
                $search_string = "SELECT * FROM subject WHERE ";
                $display_words = "";
        
                $search_string .= "description LIKE '%$key%' OR school_year LIKE '%$key%' OR name LIKE '%$key%'";
        
                // run the query in the db and search through each of the records returned
                $query = mysqli_query($conn, $search_string);
                $result_count = mysqli_num_rows($query);
    
                echo "
                <div class ='result'>
                    <p>Số môn học tìm thấy: ".$result_count."</p>
                </div>
                ";
    
                if ($result_count > 0){
                
                    echo"
                        <table style='width:100%'>
                        <!-- <colgroup>
                            <col span='1' style='width: 5%;'>
                            <col span='1' style='width: 28%;'>
                            <col span='1' style='width: 37%;'>
                            <col span='1' style='width: 40%;'>
                        </colgroup> -->
                        <tr>
                            <th style='10%'>No</th>
                            <th>Tên môn học</th>
                            <th style='10%'>Khóa</th>
                            <th>Mô tả chi tiết</th>
                            <th style='40%'>Action</th>
                        </tr>";
                        while ($row = mysqli_fetch_assoc($query)){
                            $id = $row["id"];
                            $name = $row["name"];
                            $school_year = $row["school_year"];
                            $description = $row["description"];
                            echo
                            "
                            <tr>
                                <td>".$id."</td>
                                <td>".$name."</td>
                                <td>".$school_year."</td>
                                <td>".$description."</td>
                                <td>
                                    <a class='action' href=''>Xóa</a>
                                    <a class='action' href=''>Sửa</a>
                                </td>
                            </tr>";
                            
                        }
                        echo "</table>";
                        
                    }else{
                    echo "find nothing";
                }
            }
           
        ?>
                   
    <!-- <script type="text/javascript">
        document.getElementById("department_in").value = getSavedValue("department_in");    // set the value to this input
        document.getElementById("key_input").value = getSavedValue("key_input");   // set the value to this input
        /* Here you can add more inputs to set value. if it's saved */

        //Save the value function - save it to localStorage as (ID, VALUE)
        function saveValue(e){
            var id = e.id;  // get the sender's id to save it . 
            var val = e.value; // get the value. 
            localStorage.setItem(id, val);// Every time user writing something, the localStorage's value will override . 
        }

        //get the saved value function - return the value of "v" from localStorage. 
        function getSavedValue  (v){
            if (!localStorage.getItem(v)) {
                return "";// You can change this to your defualt value. 
            }
            return localStorage.getItem(v);
        }
    </script>

    <script src="index.js"></script> -->
</body>
</html>