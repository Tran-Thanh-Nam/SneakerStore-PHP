<?php
       include_once("./models/khoclass.php");
?>
<div class="row">
    <h3>Danh Mục Giày</h3>
</div>
<div class="row">
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <td> Ma Giay </td>
                <td> Ten Giay</td> 
                <td> Ma NCC</td> 
                <td> Thong Tin Hang</td> 
                <td> Tinh Trang</td> 
                <td> So Luong</td> 
                <td> Don Gia</td> 
                <td> Ngay Cap Nhat</td> 
                <td> Hinh Anh</td> 
                <td>#</td>                                        
            </tr>          
        </thead>      
        <?php
            $kho = new khoclass();
            $arr = $kho->select_all();
            
            if(isset($_GET["xoa"])){
                if($_GET["xoa"] == 1) { 
                    $ma = $_GET["id"];
                    $s = new khoclass();
                    $kq = $s->delete_kho($ma);
                    var_dump($kq);
                    if($kq) {
                        
                        header("Location:kho.php?id=".$ma."&m=1");
                    } else {
                        echo 'Chua thanh cong!';
                    }
                }
                
            }

            foreach( $arr as $item){
                echo "<tr>";
                echo "<td>".$item['ma_hh']."</td>";
                echo "<td>".$item['ten_hh']."</td>"; 
                echo "<td>".$item['ma_ncc']."</td>";
                echo "<td>".$item['tt_hang']."</td>";
                echo "<td>".$item['tinhtrang']."</td>";
                echo "<td>".$item['so_luong']."</td>";
                echo "<td>".$item['don_gia']."</td>";
                echo "<td>".$item['ngay_cap_nhat']."</td>";
                echo "<td>".$item['hinhanh']."</td>";                          
                echo "<td>";
                echo "<a class='btn btn-danger' href='editkho.php?id=".$item['ma_hh']."'>
                <i class='far fa-edit'></i></a>";
                echo "<a class='btn btn-warning' href='kho.php?id=".$item['ma_hh']."&xoa=1'>
                <i class='far fa-trash-alt'></i></a>";
                echo "</td>";
                echo "</tr>";
                }
        ?>
    </table>
    <a href="Views/v_new_kho.php"><input type="submit" value="Them 1 sp"/></a>
</div>
