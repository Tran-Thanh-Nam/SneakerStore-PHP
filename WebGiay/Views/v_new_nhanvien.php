<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../fontawesome/css/all.css">
    </head>
    <?php
        require_once("../models/nhanvienclass.php");
    ?>
    <body>
        <div class="container">
        
        <?php

            if(isset($_POST["btnCapNhat"])){
                $manv = $_POST["manv"];
                $hoten =$_POST["hoten"];
                $chucvu =$_POST["chucvu"];
                $sdt =$_POST["sdt"];
                $diachi =$_POST["diachi"];
                $ngaysinh =$_POST["ngaysinh"];
                $cmnd =$_POST["cmnd"];
                $s = new nhanvienclass();
                $kq = $s->add_new_nhanvien($manv,$hoten,$chucvu,$sdt,$diachi,$ngaysinh,$cmnd);
                var_dump($kq);
                if($kq) {
                    
                    header("Location:v_new_nhanvien.php?m=1");
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
        <form method="post" action="v_new_nhanvien.php">
        <div class="form-group">
            <label>Ma Nhan Vien </label>
            <input type="text" name="manv" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Ten Nhan Vien </label>
            <input type="text" name="hoten" class="form-control"/>
        </div>    
        <div class="form-group">
            <label>Chuc Vu </label>
            <input type="text" name="chucvu" class="form-control"/>
        </div> 
        <div class="form-group">
            <label>So Dien Thoai </label>
            <input type="text" name="sdt" class="form-control"/>
        </div> 
        <div class="form-group">
            <label>Dia Chi </label>
            <input type="text" name="diachi" class="form-control"/>
        </div> 
        <div class="form-group">
            <label>Ngay Sinh</label>
            <input type="text" name="ngaysinh" class="form-control"/>
        </div> 
        <div class="form-group">
            <label>CMND </label>
            <input type="text" name="cmnd" class="form-control"/>
        </div> 
        
        <div class="form-group">
            <button type="submit" name="btnCapNhat" class="btn btn-primary">Thêm mới</button>
        </div>
        <div class="form-group">    
            <a href="../nhanvien.php">Quay ve</a>
        </div>
        </form>
    </body>
</html>