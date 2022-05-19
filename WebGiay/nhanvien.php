
<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <link href="css/bootstrap.min.css" type="text/css" rel="stylesheet">
        <link href="fontawesome/css/all.min.css" type="text/css" rel="stylesheet">
        <script language="JavaScript" type="text/javascript" src="js/jquery-1.12.4.js"></script>
        <title>Quan ly nhan vien</title>
    </head>
    <body>
    <header class="bg-secondary   p-4 mb-4" style="background:#29cecef2!important; color:#fff; font-weight:bold">
                
            <div class="row" >
                <div class="col">
                    <h3>TRẦN THÀNH NAM</h3>
                </div>
                <div class="col">
                    <h1 style="font-weight:bold">SHOP BÁN GIÀY</h1>
                </div>
            </div>
            <img src="images/nike.jpg" width="100%" height="350px">
        </header>

        <div id="wrapper">
            
                <div class="row">
                    <div id="dLeft" class="col-md-4 col-sm-4 col-lg-2 col-xs-0">
                         <?php include_once("Views/v_left_sidebar.php"); ?> 
                    </div>
                    <div id="dRight" class="col-md-8 col-sm-8 col-lg-10 col-xs-12">
                        <?php
                            include_once("Views/v_nhanvien.php");
                            
                        ?>
                    </div>
                </div>
            
        </div>
        <div id="footer">
            <?php
                include_once("Views/v_footer.php");
            ?>
        </div>
    </body>
</html>