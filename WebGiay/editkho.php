<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">
    </head>
    <?php
        require_once("models/khoclass.php");
    ?>
    <body>
        <div class="container">
        
        <?php
            $ma =$_GET["id"];
            $s = new khoclass();
            $arr = $s->select_kho($ma);
            if(isset($_POST["btnCapNhat"])){
                $ten =$_POST["tenhh"];
                $mancc =$_POST["mancc"];
                $tthang =$_POST["tthang"];
                $tinhtrang =$_POST["tinhtrang"];
                $soluong =$_POST["soluong"];
                $dongia =$_POST["dongia"];
                $ngaycapnhat =$_POST["ngaycapnhat"];
                $hinhanh =$_POST["hinhanh"];
                $s = new khoclass();
                $kq = $s->edit_kho($ma,$ten,$mancc,$tthang,$tinhtrang,$soluong,$dongia,$ngaycapnhat,$hinhanh);
                if($kq) {
                    
                    header("Location:editkho.php?id=".$ma."&m=1");
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
        <form method="post" action="editkho.php?id=<?php echo $ma; ?>">
        <div class="form-group">
            <label>Ma hang hoa </label>
            <input type="text" readonly value=<?php echo $arr[0][0]; ?> name="mahh" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Ten hang hoa </label>
            <input type="text" value=<?php echo $arr[0][1]; ?> name="tenhh" class="form-control"/>
        </div>    
        <div class="form-group">
            <label>Ma nha cung cap </label>
            <input type="text" value=<?php echo $arr[0][2]; ?> name="mancc" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Thong tin hang </label>
            <input type="text" value=<?php echo $arr[0][3]; ?> name="tthang" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Tinh trang </label>
            <input type="text" value=<?php echo $arr[0][4]; ?> name="tinhtrang" class="form-control"/>
        </div>
        <div class="form-group">
            <label>So luong </label>
            <input type="text" value=<?php echo $arr[0][5]; ?> name="soluong" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Don Gia </label>
            <input type="text" value=<?php echo $arr[0][6]; ?> name="dongia" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Ngay cap nhat </label>
            <input type="text" value=<?php echo $arr[0][7]; ?> name="ngaycapnhat" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Hinh anh </label>
            <input type="text" value=<?php echo $arr[0][8]; ?> name="hinhanh" class="form-control"/>
        </div>





        <div class="form-group">
            <button type="submit" name="btnCapNhat" class="btn btn-primary">Cap nhat</button>
        </div>
        <div class="form-group">
            <a href="kho.php">Quay ve</a>
            <input type="hidden" name="del" value="<?php echo $delete; ?>">
        </div>
        </form>
    </body>
</html>