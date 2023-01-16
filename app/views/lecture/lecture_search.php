<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel='stylesheet' href='lecture_search.css'>
    <style type='text/css'>
        .td {
            padding: 10px 15px 5px 35px;
        }

        table {
            border-spacing: 10px;
        }

        .box {
            border: 2px solid steelblue;
            line-height: 17px;
            padding: 3px 0px 5px 0px;
        }

        #input {
            width: 165px;
        }

        button {
            width: 110px;
            height: 40px;
            margin-top: 10px;
            background-color: steelblue;
            font-size: 14px;
            font-family: 'Times New Roman', Times, serif;
            font-weight: normal;
            color: white;
            border: 3px solid rgb(32, 106, 163);
            border-radius: 8px;
            margin-left: 150px;
            text-align: center;
        }

        .result {
            display: flex;
            text-align: left;
            flex-direction: row;
            margin-left: 10px;
            margin-top: 15px;
            justify-content: space-between;
        }

        .btn_add {
            width: 50px;
            height: 20px;
            padding-top: 3px;
            padding-bottom: 1px;
            margin-top: 20px;
            margin-right: 30px;
            text-align: center;
            color: white;
            font-size: 14px;
            font-weight: normal;
            font-family: 'Times New Roman', Times, serif;
            background-color: steelblue;
            border: 3px solid rgb(32, 106, 163);
            border-radius: 8px;
            text-decoration: none;
        }


        .result {
            margin-top: 5px;
        }

        td {
            text-align: left;
            padding: 3px;
        }

        th {
            font-weight: normal;
            text-align: left;
            padding: 3px;
        }

        .action {
            color: white;
            display: inline-table;
            font-size: 12px;
            padding-left: 10px;
            padding-right: 10px;
            padding-top: 2px;
            padding-bottom: 2px;
            background-color: rgb(125, 174, 216);
            border: 2px solid steelblue;
            text-decoration: none;
            margin-right: 8px;
        }
    </style>    
</head>

<?php
    // $course = array("" => "", "LT" => "Lập trình", "VE" => "Vẽ", "AN" => "Âm nhạc");
    $server_name="localhost";

    $username="root";

    $password="";

    $database_name="timetable_management";
    $conn = mysqli_connect($server_name, $username, $password, $database_name);
    $sql = "SELECT * FROM subjects";

        $result = mysqli_query($conn, $sql);
        $course = array("" => "");
        while($row = mysqli_fetch_assoc($result)){
            array_push($course, $row["school_year"]);
        }
        // if (isset($_GET["search"]) && !empty($_GET["search"])){
        //     $key = $_GET["search"];
        //     $sql_search = "SELECT * FROM subjects WHERE description LIKE '%key%' OR name LIKE '%key%' OR school_year LIKE '%key%'";
        // }else{
        //     $sql_search = "SELECT * FROM subjects";
        // }
        // $search_result = mysqli_query($conn, $sql_search);
        
?>
<body>
    <form method='get' action='lecture_search.php' name=''>
    <div class="fieldset" style = "width: 600px;
                                height: 520px;
                                padding-left: 15px;
                                border: 2px solid steelblue;">
        <div class='field'>
            <table>
                <tr>
                    <td class='td'><label>Khóa học</label></td>
                    <td>
                        <select class="box" name='course' style = 'border-color:#82cd79;height: 100%;width: 80%;' 
                        id="department_in" onkeyup='saveValue(this);'>
                            <?php
                                foreach ($course as $key => $value) {
                                    echo "<option";
                                    // echo (isset($_POST['faculty']) && $_POST['faculty'] == $key) ? " selected " : "";
                                    echo " value='" . $value . "'>" . $value . "</option>";
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

            $search_string = "SELECT * FROM subjects WHERE ";
            if  (isset($_GET['course']) ? $_GET['course'] : ''){
                $search_key = trim($_GET['course']);
                $search_string .= "school_year = '$search_key'";
                $course_query = mysqli_query($conn, $search_string);
                $result_count = mysqli_num_rows($course_query);

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
                        while ($row_course = mysqli_fetch_assoc($course_query)){
                            $id = $row_course["id"];
                            $name = $row_course["name"];
                            $school_year = $row_course["school_year"];
                            $description = $row_course["description"];
                            echo
                            "
                            <tr>
                                <td>".$id."</td>
                                <td>".$name."</td>
                                <td>".$school_year."</td>
                                <td>".$description."</td>
                                <td>
                                    <a class='action' onclick='myFunction()'>Xóa</a>
                                    <a class='action' href='lecture_edit.php'>Sửa</a>
                                </td>
                            </tr>";
                            
                        }
                        echo "</table>";
                        
                    }else{
                    echo "find nothing";
                }

            }

            if (isset($_GET['key']) ? $_GET['key'] : ''){
                $key = trim($_GET['key']);
                $display_words = "";
        
                $search_string .= "description LIKE '%$key%' OR name LIKE '%$key%'";
        
                // run the query in the db and search through each of the records returned
                $query = mysqli_query($conn, $search_string);
                $result_count_1 = mysqli_num_rows($query);
    
                echo "
                <div class ='result'>
                    <p>Số môn học tìm thấy: ".$result_count_1."</p>
                </div>
                ";
    
                if ($result_count_1 > 0){
                
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
                                    <a class='action' href='lecture_search_delete.php' id='"; echo $row["id"]; echo "'
                                    onClick='return confirm('Bạn có thự sự muốn xóa?');'>Xóa</a>
                                    <a class='action' href='lecture_edit.php'>Sửa</a>
                                </td>
                            </tr>";
                            
                        }
                        echo "</table>";
                        
                    }else{
                    echo "find nothing";
                }
            }
           
        ?>
        <!-- <script>
            function myFunction() {
                var x;
                var r = confirm("Bấm Ok để xóa");
                if (r == true) {
                x = "You pressed OK!";
                }
                else {
                x = "You pressed Cancel!";
                }
                document.getElementById("demo").innerHTML = x;
            }
        </script>           -->
</body>
</html>