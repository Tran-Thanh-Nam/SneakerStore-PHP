<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">
    </head>
    <?php
        require_once("models/nccclass.php");
    ?>
    <body>
        <div class="container">
        
        <?php
            $ma =$_GET["id"];
            $nv = new nccclass();
            $arr = $nv->select_ncc($ma);
            if(isset($_POST["btnCapNhat"])){
                $tenncc =$_POST["tenncc"];
                $diachi =$_POST["diachi"];             
                $nv = new nccclass();
                $kq = $nv->edit_ncc($mancc,$tenncc,$diachi);
                if($kq) {
                    
                    header("Location:editncc.php?id=".$ma."&m=1");
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
        <form method="post" action="editncc.php?id=<?php echo $ma; ?>">
        <div class="form-group">
            <label>Ma Nha Cung Cap </label>
            <input type="text" readonly value=<?php echo $arr[0][0]; ?> name="mancc" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Ten NCC </label>
            <input type="text" value=<?php echo $arr[0][1]; ?> name="tenncc" class="form-control"/>
        </div>    
        <div class="form-group">
            <label>Dia Chi </label>
            <input type="text" value=<?php echo $arr[0][2]; ?> name="diachi" class="form-control"/>
        </div>

        <div class="form-group">
            <button type="submit" name="btnCapNhat" class="btn btn-primary">Cap nhat</button>
        </div>
        <div class="form-group">
            <a href="ncc.php">Quay ve</a>
            <input type="hidden" name="del" value="<?php echo $delete; ?>">
        </div>
        </form>
    </body>
</html>