<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../fontawesome/css/all.css">
    </head>
    <?php
        require_once("../models/nccclass.php");
    ?>
    <body>
        <div class="container">
        
        <?php

            if(isset($_POST["btnCapNhat"])){
                $mancc = $_POST["mancc"];
                $tenncc =$_POST["tenncc"];
                $diachi =$_POST["diachi"];
                $s = new nccclass();
                $kq = $s->add_new_ncc($mancc, $tenncc, $diachi);
                var_dump($kq);
                if($kq) {
                    
                    header("Location:v_new_ncc.php?m=1");
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
        <form method="post" action="v_new_ncc.php">
        <div class="form-group">
            <label>Ma Nha Cung Cap </label>
            <input type="text" name="manv" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Ten Nha Cung Cap </label>
            <input type="text" name="hoten" class="form-control"/>
        </div>    
        <div class="form-group">
            <label>Dia Chi </label>
            <input type="text" name="diachi" class="form-control"/>
        </div> 
        
        <div class="form-group">
            <button type="submit" name="btnCapNhat" class="btn btn-primary">Thêm mới</button>
        </div>
        <div class="form-group">    
            <a href="../ncc.php">Quay ve</a>
        </div>
        </form>
    </body>
</html>