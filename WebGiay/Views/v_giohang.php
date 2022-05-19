    <?php
        require_once("./models/giohang.php");

        
    ?>

<div class="row">
    <h3>GIỏ hàng</h3>
<table class="table">
                <thead>
                    <th>STT</th>
                    <th>Mã SP</th>
                    <th>Tên SP</th>
                    <th>Số lượng</th>
                    <th>Đơn giá</th>
                    <th>Tổng đơn giá</th>
                </thead>
                <tbody>
                    <?php 
                        $makh = null;
                        if(isset($_GET["makh"])) {
                            $makh = $_GET["makh"];
                        }
                        $giohang = new giohangclass();
                        
                        if(isset($_GET["xoa"])) {
                             if($_GET["xoa"] == 1) {
                                if(isset($_GET["magh"])) {
                                    
                                    $magh = $_GET["magh"];
                                    $giohang->delete_magh($magh);
                                }
                             } 

                             
                        } 
                        
                        $result = $giohang->get_SP_One_khachhang($makh);
                        $tinhtong = 0;
                        $count = 1;
                        foreach( $result as $item){
                            $tinhtong += (float)$item['tong_tien'];
                            echo "<tr>";
                            echo "<td>".$count."</td>";
                            echo "<td>".$item['ma_hh']."</td>";
                            echo "<td>".$item['ten_hh']."</td>"; 
                            echo "<td>".$item['so_luong']."</td>";
                            echo "<td>".$item['don_gia']."</td>";
                            echo "<td>".$item['tong_tien']."</td>";                          
                            echo "<td>";
                            echo "<a class='btn btn-warning' href='giohang.php?makh=".$makh."&magh=".$item['ma_gh']."&xoa=1'>
                            <i class='far fa-trash-alt'></i></a>";
                            echo "</td>";
                            echo "</tr>";
                            $count++;
                        }
                        
                        
                            
                    ?>
                    
                </tbody>
        </table>
        <div style="margin: 30px 0;">
        <hr>
        <h4>Tổng tiền: </h4>
        <input type="text" value="<?php echo $tinhtong; ?>" readonly disabled/>
        </div>
</div>

