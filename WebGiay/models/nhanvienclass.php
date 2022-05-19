<?php
    require_once("db.php");
    class nhanvienclass{
        private $dbconnect ;
        public function __construct(){}
        public function select_all()
        {
            try{
                $dbconnect = DB::GetDB();// GetDB la ham static trong
                $select = "select * from nhanvien";
                $kq = $dbconnect->query($select);// goi query cho cau 
                $arr = $kq->fetchAll();
                $dbconnect=null; //dong connection lai
                return $arr;
            }
            catch( PDOException $ex){
                return array();
            }
        }

        public function add_new_nhanvien($manv,$hoten,$chucvu,$sdt,$diachi,$ngaysinh,$cmnd)
        {
            try{
                $dbconnect = DB::getDB();
                $insert ="INSERT INTO nhanvien(id_nv, ten_nv, chucvu, sdt, dia_chi, ngay_sinh, cmnd ) VALUES (:manv, :hoten, :chucvu, :sdt, :diachi, :ngaysinh, :cmnd)";
                $stmt= $dbconnect->prepare($insert);            
                $stmt->bindParam(":manv", $manv);
                $stmt->bindParam(":hoten", $hoten);
                $stmt->bindParam(":chucvu", $chucvu);
                $stmt->bindParam(":sdt", $sdt);
                $stmt->bindParam(":diachi", $diachi);
                $stmt->bindParam(":ngaysinh", $ngaysinh);
                $stmt->bindParam(":cmnd", $cmnd);                                     
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

        public function get_One_nhanvien($manv) {
            try{
                $dbconnect = DB::getDB();
                $select ="SELECT * FROM nhanvien nv WHERE manv=:manv";
                $stmt= $dbconnect->prepare($select);
                $stmt->bindParam(":manv", $manv);
                $kq = $stmt->execute();
                $arr = $stmt->fetchAll();
                $dbconnect=null;
                return $arr;
            }
            catch(PDOException $ex){
                return array();
            }
        }


        public function update_One_nhanvien($manv) {
            try{
                $dbconnect = DB::getDB();
                $update ="UPDATE nhanvien";
                $stmt= $dbconnect->prepare($update);
                $stmt->bindParam(":manv", $manv);
                $result = $stmt->execute();
                $dbconnect=null;
                return $result;
            }
            catch(PDOException $ex){
                return 0;
            }
        }


        // su dung preparedstatemet - ham co tham so
        public function edit_nhanvien($manv,$hoten,$chucvu,$sdt,$diachi,$ngaysinh,$cmnd){
            try{
                $dbconnect = DB::GetDB();
                $update = "UPDATE nhanvien SET ten_nv =:ten, chucvu =:cv, sdt =:dt, dia_chi =:dc, ngay_sinh =:ns, cmnd =:cd
                            WHERE id_nv =:ma   ";
                $stmt = $dbconnect->prepare($update);
                //gan gia tri cua bien vao cac tham so               
                $stmt->bindParam(":ten",$hoten);       
                $stmt->bindParam(":cv",$chucvu);
                $stmt->bindParam(":dt",$sdt);
                $stmt->bindParam(":dc",$diachi);        
                $stmt->bindParam(":ns",$ngaysinh);
                $stmt->bindParam(":cd",$cmnd);               
                $stmt->bindParam(":ma",$manv);               
                $kq = $stmt->execute(); // thuc thi cau truy van
                $dbconnect=null; // dong ket noi
                return $kq; // tra ve dong da update
            }   
            catch(PDOException $ex){
                return 0;   
            }
        }

        public function delete_nhanvien($manv){
            try{
                $dbconnect = DB::GetDB();
                $update = "DELETE FROM nhanvien WHERE id_nv=:ma";
                $stmt = $dbconnect->prepare($update);
                //gan gia tri cua bien vao cac tham so
                $stmt->bindParam(":ma",$manv);

                $kq = $stmt->execute(); // thuc thi cau truy van
                $dbconnect=null; // dong ket noi
                return $kq; // tra ve dong da update
            }   
            catch( PDOException $ex){
                return 0;   
            }
        }

        public function select_nv($ma)
        {
            try{
                $dbconnect = DB::GetDB();// GetDB la ham static trong
                $select = "select * from nhanvien where id_nv=".$ma;
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