<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../fontawesome/css/all.css">
    </head>
    <?php
        require_once("../models/khoclass.php");
    ?>
    <body>
        <div class="container">
        
        <?php

            if(isset($_POST["btnCapNhat"])){
                $mahh = $_POST["mahh"];
                $tenhh =$_POST["tenhh"];
                $mancc =$_POST["mancc"];
                $tthang =$_POST["tthang"];
                $tinhtrang =$_POST["tinhtrang"];
                $soluong =$_POST["soluong"];
                $dongia =$_POST["dongia"];
                $ngaycapnhat =$_POST["ngaycapnhat"];
                $hinhanh =$_POST["hinhanh"];
                $s = new khoclass();
                $kq = $s->add_new_kho($mahh,$tenhh,$mancc,$tthang,$tinhtrang,$soluong,$dongia,$ngaycapnhat,$hinhanh);
                var_dump($kq);
                if($kq) {
                    
                    header("Location:v_new_kho.php?m=1");
                }
            }

            

            if(isset($_GET["m"])) {
                if($_GET["m"] == 1) {
                    echo 'Thanh cong';
                } else {
                    echo 'That bai!';
                }
            }

            
        
        ?>
        <form method="post" action="v_new_kho.php">
        <div class="form-group">
            <label>Ma hang hoa </label>
            <input type="text" name="mahh" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Ten hang hoa </label>
            <input type="text" name="tenhh" class="form-control"/>
        </div>    
        <div class="form-group">
            <label>Ma nha cung cap </label>
            <input type="text" name="mancc" class="form-control"/>
        </div> 
        <div class="form-group">
            <label>Thong tin hang </label>
            <input type="text" name="tthang" class="form-control"/>
        </div> 
        <div class="form-group">
            <label>Tinh trang </label>
            <input type="text" name="tinhtrang" class="form-control"/>
        </div> 
        <div class="form-group">
            <label>So luong</label>
            <input type="text" name="soluong" class="form-control"/>
        </div> 
        <div class="form-group">
            <label>Don Gia </label>
            <input type="text" name="dongia" class="form-control"/>
        </div> 
        <div class="form-group">
            <label>Ngay cap nhat </label>
            <input type="text" name="ngaycapnhat" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Hinh anh </label>
            <input type="text" name="hinhanh" class="form-control"/>
        </div>


        <div class="form-group">
            <button type="submit" name="btnCapNhat" class="btn btn-primary">Thêm mới</button>
        </div>
        <div class="form-group">    
            <a href="../kho.php">Quay ve</a>
        </div>
        </form>
    </body>
</html>