
<?php
    require_once("db.php");
    class giohangclass{
        private $dbconnect ;
        public function __construct(){}
        public function select_all()
        {
            try{
                $dbconnect = DB::GetDB();// GetDB la ham static trong
                $select = "select * from giohang";
                $kq = $dbconnect->query($select);// goi query cho cau 
                $arr = $kq->fetchAll();
                $dbconnect=null; //dong connection lai
                return $arr;
            }
            catch( PDOException $ex){
                return array();
            }
        }

        public function add_new_sp($ma_hh, $ma_kh,$so_luong, $tong_tien)
        {
            try{
                $dbconnect = DB::getDB();
                $insert ="INSERT INTO giohang(ma_hh, ma_kh, so_luong, tong_tien) VALUES (:ma_hh, :ma_kh, :so_luong, :tong_tien)";
                $stmt= $dbconnect->prepare($insert);            
                $stmt->bindParam(":ma_hh", $ma_hh);
                $stmt->bindParam(":ma_kh", $ma_kh);
                $stmt->bindParam(":so_luong", $so_luong);
                $stmt->bindParam(":tong_tien", $tong_tien);
                $result = $stmt->execute();
                // $stmt->debugDumpParams();
                //var_dump($stmt);
                $dbconnect=null;
                return $result;
            }
            catch(PDOException $ex){
                echo $ex;
            }
        }

        public function get_SP_One_khachhang($ma_kh) {
            try{
                $dbconnect = DB::getDB();
                $select ="SELECT gh.*, k.ten_hh, k.don_gia FROM giohang gh LEFT JOIN khachhang kh ON gh.ma_kh = kh.id_kh LEFT JOIN kho k ON gh.ma_hh = k.ma_hh WHERE ma_kh=:makh";
                $stmt= $dbconnect->prepare($select);
                $stmt->bindParam(":makh", $ma_kh);
                $stmt->execute();
                $arr = $stmt->fetchAll();
                $dbconnect=null;
                return $arr;
            }
            catch(PDOException $ex){
                return array();
            }
        }

        public function delete_magh($magh){
            try{
                $dbconnect = DB::GetDB();
                $update = "DELETE FROM giohang WHERE ma_gh=:ma";
                $stmt = $dbconnect->prepare($update);
                //gan gia tri cua bien vao cac tham so
                $stmt->bindParam(":ma",$magh);

                $kq = $stmt->execute(); // thuc thi cau truy van
                $dbconnect=null; // dong ket noi
                return $kq; // tra ve dong da update
            }   
            catch( PDOException $ex){
                return 0;   
            }
        }
        
    }


?>