<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">
    </head>
    <?php
        require_once("models/nhanvienclass.php");
    ?>
    <body>
        <div class="container">
        
        <?php
            $ma =$_GET["id"];
            $nv = new nhanvienclass();
            $arr = $nv->select_nv($ma);
            if(isset($_POST["btnCapNhat"])){
                $ten =$_POST["hoten"];
                $chucvu =$_POST["chucvu"];
                $sdt =$_POST["sdt"];
                $diachi =$_POST["diachi"];
                $ngaysinh =$_POST["ngaysinh"];
                $cmnd =$_POST["cmnd"];               
                $nv = new nhanvienclass();
                $kq = $nv->edit_nhanvien($ma,$ten,$chucvu,$sdt,$diachi,$ngaysinh,$cmnd);
                if($kq) {
                    
                    header("Location:editnhanvien.php?id=".$ma."&m=1");
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
        <form method="post" action="editnhanvien.php?id=<?php echo $ma; ?>">
        <div class="form-group">
            <label>Ma nhan vien </label>
            <input type="text" readonly value=<?php echo $arr[0][0]; ?> name="manv" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Ten nhan vien </label>
            <input type="text" value=<?php echo $arr[0][1]; ?> name="hoten" class="form-control"/>
        </div>    
        <div class="form-group">
            <label>Chuc vu </label>
            <input type="text" value=<?php echo $arr[0][2]; ?> name="chucvu" class="form-control"/>
        </div>
        <div class="form-group">
            <label>So dien thoai </label>
            <input type="text" value=<?php echo $arr[0][3]; ?> name="sdt" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Dia chi </label>
            <input type="text" value=<?php echo $arr[0][4]; ?> name="diachi" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Ngay sinh </label>
            <input type="text" value=<?php echo $arr[0][5]; ?> name="ngaysinh" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Chung minh nhan dan </label>
            <input type="text" value=<?php echo $arr[0][6]; ?> name="cmnd" class="form-control"/>
        </div>

        <div class="form-group">
            <button type="submit" name="btnCapNhat" class="btn btn-primary">Cap nhat</button>
        </div>
        <div class="form-group">
            <a href="nhanvien.php">Quay ve</a>
            <input type="hidden" name="del" value="<?php echo $delete; ?>">
        </div>
        </form>
    </body>
</html>