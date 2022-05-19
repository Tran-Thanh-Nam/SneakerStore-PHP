<?php
       include_once("./models/khoclass.php");
?>
<div class="row">
    <h2>Shop Bán Giày Online</h2>
</div>
<?php
    $kho = new khoclass();
    $arr = $kho->select_all();
?>

<div class="danhsach">
   <div class="row">
   <?php foreach($arr as $item){
    ?>        
        <div class="kho col-md-4">
            <div class="tieude" style="color:blue; font-weight:bold;">                           
                <?php echo $item["ten_hh"]; ?>
            </div>

            <div class="hinh">
                <img width="290" height="200" src="<?php echo $item["hinhanh"]; ?>" />
            </div>        
            <div class="gia">
                <span>Giá: </span>
                <span class="gia-sp"><?php  echo $item["don_gia"]; ?></span>
            </div>
            <div class="sl"><strong>Số lượng:</strong>
                <input type="number" name="number" value="1" min="1" id="num">
            </div>
            <input type="hidden" id="mahh" value="<?php echo $item["ma_hh"] ?>" />
            <a class="mua" style="background-color: #fed610; border:none;">Đăt hàng</a>
            <hr>
        </div>
   <?php } ?>
   </div>
</div>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    //đoạn javascript để bấm nút mua được hàng
    $(document).ready(function() {
        $('.mua').click(function() {
                //Lấy mã, mã hàng hóa, số lượng, đơn giá và tính tổng tiền
                var makh = <?php echo $_SESSION['usrId'] ?>;
                var mahh = $(this).parent().find('#mahh').val();
                var soluong = parseInt($(this).parent().find('#num').val());
                var dongia = parseFloat($(this).parent().find('.gia-sp').text());
                var tongtien = dongia * soluong;
                /////////////////////////////////
                //Thêm sự kiện để thêm vào giỏ hàng khi click nút mua
                $(this).attr('href', 'themgiohang.php?ma_hh='+ mahh +'&ma_kh='+ makh +'&so_luong=' + soluong + '&tong_tien=' + tongtien);
        }) 
    })
</script>




               
            