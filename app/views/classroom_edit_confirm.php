<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./edit.css">
</head>
<body>
    <main>
        <form 
            action="<?php echo $SERVER['PHP_SELF']; ?>",
            method="GET"
        >
        <div class="center">
            <div class="khoahoc">
                <div class="label">
                    <label for="khoahoc">Khóa học</label>
                </div>
                <input class= "cf" type="text" name="" value="năm 2" disabled="disabled"/>
            </div>

            <div class="monhoc">
                <div class="label">
                    <label for="monhoc">Môn học</label>
                </div>
                <input class= "cf" type="text" name="" value="Toán" disabled="disabled" />
            </div>

            <div class="giaovien">
                <div class="label">
                    <label for="giaovien">Giáo viên</label>
                </div>
                <input class= "cf" type="text" name="" value="Thanh" disabled="disabled" />
            </div>

            <div class="thu">
                <div class="label">
                    <label for="thu">Thứ</label>
                </div>
                <input class= "cf" type="text" name="" value="Thứ 2" disabled="disabled" />
            </div>

            <div class="tiethoc">
                <div class="label">
                    <label for="tiethoc">Tiết học</label>
                </div>
                <div class="khung">
                    <div class="dong1">
                        <span class="chontiethoc">
                            <input type="checkbox" name="" value="" checked="checked" disabled="disabled"/>
                            <p>Tiết 1</p>
                        </span>
                        <span class="chontiethoc">
                            <input type="checkbox" name="" value="" checked="checked" disabled="disabled"/>
                            <p>Tiết 2</p>
                        </span>
                        <span class="chontiethoc">
                            <input type="checkbox" name="" value="" checked="checked" disabled="disabled"/>
                            <p>Tiết 3</p>
                        </span>
                        <span class="chontiethoc">
                            <input type="checkbox" name="" value="" checked="checked" disabled="disabled"/>
                            <p>Tiết 4</p>
                        </span>
                        <span class="chontiethoc">
                            <input type="checkbox" name="" value="" checked="checked" disabled="disabled"/>
                            <p>Tiết 5</p>
                        </span>
                    </div>
                    
                    <div class="dong2">
                        <span class="chontiethoc">
                            <input type="checkbox" name="" value="" disabled="disabled" />
                            <p>Tiết 6</p>
                        </span>
                        <span class="chontiethoc">
                            <input type="checkbox" name="" value="" disabled="disabled"/>
                            <p>Tiết 7</p>
                        </span>
                        <span class="chontiethoc">
                            <input type="checkbox" name="" value="" disabled="disabled"/>
                            <p>Tiết 8</p>
                        </span>
                        <span class="chontiethoc">
                            <input type="checkbox" name="" value="" disabled="disabled"/>
                            <p>Tiết 9</p>
                        </span>
                        <span class="chontiethoc">
                            <input type="checkbox" name="" value="" disabled="disabled"/>
                            <p>Tiết 10</p>
                        </span>
                    </div>
                </div>
            </div>

            <div class="chuy">
                <div class="label">
                    <label for="chuy">Chú ý</label>
                </div>
                <textarea rows="5" cols="20" maxlength="60" disabled="disabled">háhfàhaljkhfjhf</textarea>
            </div>

            <div class="button1">
                <input class="button" type="submit" name="" value="Sửa lại" />
                <input class="button" type="submit" name="" value="Sửa" />
            </div>
        </div>
        </form>
    </main>
</body>
</html>