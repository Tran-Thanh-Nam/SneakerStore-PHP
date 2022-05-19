<?php 
    include_once("models/giohang.php");

    $mahh = null;
    $makh = null;
    $soluong = null;
    $tongtien = null;

    if(isset($_GET["ma_hh"])) {
        $mahh = $_GET["ma_hh"];
    }
    if(isset($_GET["ma_kh"])) {
        $makh = $_GET["ma_kh"];
    }
    if(isset($_GET["so_luong"])) {
        $soluong = $_GET["so_luong"];
    }
    if(isset($_GET["tong_tien"])) {
        $tongtien = $_GET["tong_tien"];
    }


    $giohang = new giohangclass();
    $result = $giohang->add_new_sp($mahh, $makh, $soluong, $tongtien);
    if($result) {
        
        header("Location:giohang.php?makh=".$makh);
    }

?>

