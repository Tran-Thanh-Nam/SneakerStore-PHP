<?php
       include_once("./models/nccclass.php");
?>
<div class="row">
    <h3>Danh Sách Nhà Cung Cấp</h3>
</div>
<div class="row">
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <td> Ma NCC </td>
                <td> Ten NCC</td> 
                <td> Dia Chi</td>                      
            </tr>          
        </thead>      
        <?php
            $ncc = new nccclass();
            $arr = $ncc->select_all();
            
            if(isset($_GET["xoa"])){
                if($_GET["xoa"] == 1) { 
                    $ma = $_GET["id"];
                    $nv = new nccclass();
                    $kq = $nv->delete_ncc($ma);
                    var_dump($kq);
                    if($kq) {
                        
                        header("Location:ncc.php?id=".$ma."&m=1");
                    } else {
                        echo 'Chua thanh cong!';
                    }
                }
                
            }

            foreach( $arr as $item){
                echo "<tr>";
                echo "<td>".$item['ma_ncc']."</td>";
                echo "<td>".$item['ten_ncc']."</td>";
                echo "<td>".$item['dia_chi']."</td>";               
                echo "<td>";
                echo "<a class='btn btn-danger' href='editncc.php?id=".$item['ma_ncc']."'>
                <i class='far fa-edit'></i></a>";
                echo "<a class='btn btn-warning' href='ncc.php?id=".$item['ma_ncc']."&xoa=1'>
                <i class='far fa-trash-alt'></i></a>";
                echo "</td>";
                echo "</tr>";
                }
        ?>
    </table>
    <a href="Views/v_new_nhanvien.php"><input type="submit" value="Them NCC "/></a>
</div>
