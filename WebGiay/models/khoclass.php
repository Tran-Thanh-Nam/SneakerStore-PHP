<?php
    require_once("db.php");
    class khoclass{
        private $dbconnect ;
        public function __construct(){}
        public function select_all()
        {
            try{
                $dbconnect = DB::GetDB();// GetDB la ham static trong
                $select = "select * from kho";
                $kq = $dbconnect->query($select);// goi query cho cau 
                $arr = $kq->fetchAll();
                $dbconnect=null; //dong connection lai
                return $arr;
            }
            catch( PDOException $ex){
                return array();
            }
        }

        public function add_new_kho($mahh,$tenhh,$mancc,$tthang,$tinhtrang,$soluong,$dongia,$ngaycapnhat,$hinhanh)
        {
            try{
                $dbconnect = DB::getDB();
                $insert ="INSERT INTO kho(ma_hh, ten_hh, ma_ncc, tt_hang, tinhtrang, so_luong, don_gia, ngay_cap_nhat, hinhanh ) 
                            VALUES (:mahh, :tenhh, :mancc, :tthang, :tinhtrang, :soluong, :dongia, :ngaycapnhat, :hinhanh)";
                $stmt= $dbconnect->prepare($insert);            
                $stmt->bindParam(":mahh", $mahh);
                $stmt->bindParam(":tenhh", $tenhh);
                $stmt->bindParam(":mancc", $mancc);
                $stmt->bindParam(":tthang", $tthang);
                $stmt->bindParam(":tinhtrang", $tinhtrang);
                $stmt->bindParam(":soluong", $soluong);    
                $stmt->bindParam(":dongia", $dongia);   
                $stmt->bindParam(":ngaycapnhat", $ngaycapnhat);
                $stmt->bindParam(":hinhanh", $hinhanh);

                $result = $stmt->execute();
                $stmt->debugDumpParams();
                //var_dump($stmt);
                $dbconnect=null;
                return $result;
            }
            catch(PDOException $ex){
                echo $ex;
            }
        }

        public function get_One_kho($mahh) {
            try{
                $dbconnect = DB::getDB();
                $select ="SELECT * FROM kho s WHERE mahh=:mahh";
                $stmt= $dbconnect->prepare($select);
                $stmt->bindParam(":mahh", $mahh);
                $kq = $stmt->execute();
                $arr = $stmt->fetchAll();
                $dbconnect=null;
                return $arr;
            }
            catch(PDOException $ex){
                return array();
            }
        }


        public function update_One_kho($mahh) {
            try{
                $dbconnect = DB::getDB();
                $update ="UPDATE kho";
                $stmt= $dbconnect->prepare($update);
                $stmt->bindParam(":mahh", $mahh);
                $result = $stmt->execute();
                $dbconnect=null;
                return $result;
            }
            catch(PDOException $ex){
                return 0;
            }
        }


        // su dung preparedstatemet - ham co tham so
        public function edit_kho($mahh,$tenhh,$mancc,$tthang,$tinhtrang,$soluong,$dongia,$ngaycapnhat,$hinhanh){
            try{
                $dbconnect = DB::GetDB();
                $update = "UPDATE kho SET ten_hh=:ten, ma_ncc=:ncc, tt_hang=:tth, tinhtrang=:ttrang, so_luong=:sl, don_gia=:price, ngay_cap_nhat=:ncn, hinhanh=:anh
                            WHERE ma_hh =:ma   ";
                $stmt = $dbconnect->prepare($update);
                //gan gia tri cua bien vao cac tham so               
                $stmt->bindParam(":ten",$tenhh);               
                $stmt->bindParam(":ncc",$mancc);
                $stmt->bindParam(":tth",$tthang);
                $stmt->bindParam(":ttrang",$tinhtrang);
                $stmt->bindParam(":sl",$soluong);
                $stmt->bindParam(":price",$dongia);
                $stmt->bindParam(":ncn",$ngaycapnhat);
                $stmt->bindParam(":anh",$hinhanh);
                $stmt->bindParam(":ma",$mahh);               
                $kq = $stmt->execute(); // thuc thi cau truy van
                $dbconnect=null; // dong ket noi
                return $kq; // tra ve dong da update
            }   
            catch(PDOException $ex){
                return 0;   
            }
        }

        public function delete_kho($mahh){
            try{
                $dbconnect = DB::GetDB();
                $update = "DELETE FROM kho WHERE ma_hh=:ma";
                $stmt = $dbconnect->prepare($update);
                //gan gia tri cua bien vao cac tham so
                $stmt->bindParam(":ma",$mahh);

                $kq = $stmt->execute(); // thuc thi cau truy van
                $dbconnect=null; // dong ket noi
                return $kq; // tra ve dong da update
            }   
            catch( PDOException $ex){
                return 0;   
            }
        }

        public function select_kho($ma)
        {
            try{
                $dbconnect = DB::GetDB();// GetDB la ham static trong
                $select = "select * from kho where ma_hh=".$ma;
                $kq = $dbconnect->query($select);// goi query cho cau 
                $arr = $kq->fetchAll();
                $dbconnect=null; //dong connection lai
                return $arr;
            }
            catch( PDOException $ex){
                return array();
            }
        }
        
    }


?>