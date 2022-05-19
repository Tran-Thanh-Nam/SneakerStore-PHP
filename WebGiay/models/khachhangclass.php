<?php
    require_once("db.php");
    class khachhangclass{
        private $dbconnect ;
        public function __construct(){}
        public function select_all()
        {
            try{
                $dbconnect = DB::GetDB();// GetDB la ham static trong
                $select = "select * from khachhang";
                $kq = $dbconnect->query($select);// goi query cho cau 
                $arr = $kq->fetchAll();
                $dbconnect=null; //dong connection lai
                return $arr;
            }
            catch( PDOException $ex){
                return array();
            }
        }

        public function add_new_khachhang($makh,$tenkh,$diachi,$sdt,$ngaysinh,$username,$password,$quyen)
        {
            try{
                $dbconnect = DB::getDB();
                $insert ="INSERT INTO khachhang(id_kh, ten_kh, dia_chi, sdt, ngay_sinh, username, password, quyen ) VALUES (:makh, :tenkh, :diachi, :sdt, :ngaysinh, :username, :password, :quyen)";
                $stmt= $dbconnect->prepare($insert);            
                $stmt->bindParam(":makh", $makh);
                $stmt->bindParam(":tenkh", $tenkh);
                $stmt->bindParam(":diachi", $diachi);
                $stmt->bindParam(":sdt", $sdt);
                $stmt->bindParam(":ngaysinh", $ngaysinh);
                $stmt->bindParam(":username", $username);
                $stmt->bindParam(":password", $password);    
                $stmt->bindParam(":quyen", $quyen);                           
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

        public function get_One_khachhang($makh) {
            try{
                $dbconnect = DB::getDB();
                $select ="SELECT * FROM khachhang kh WHERE makh=:makh";
                $stmt= $dbconnect->prepare($select);
                $stmt->bindParam(":makh", $makh);
                $kq = $stmt->execute();
                $arr = $stmt->fetchAll();
                $dbconnect=null;
                return $arr;
            }
            catch(PDOException $ex){
                return array();
            }
        }


        public function update_One_khachhang($makh) {
            try{
                $dbconnect = DB::getDB();
                $update ="UPDATE khachhang";
                $stmt= $dbconnect->prepare($update);
                $stmt->bindParam(":makh", $makh);
                $result = $stmt->execute();
                $dbconnect=null;
                return $result;
            }
            catch(PDOException $ex){
                return 0;
            }
        }


        // su dung preparedstatemet - ham co tham so
        public function edit_khachhang($makh,$tenkh,$diachi,$sdt,$ngaysinh,$username,$password,$quyen){
            try{
                $dbconnect = DB::GetDB();
                $update = "UPDATE khachhang SET ten_kh =:ten, dia_chi=:dc, sdt=:dt, ngay_sinh =:ns, username =:usr, password =:pass, quyen =:q
                            WHERE id_kh =:ma   ";
                $stmt = $dbconnect->prepare($update);
                //gan gia tri cua bien vao cac tham so               
                $stmt->bindParam(":ten",$tenkh);               
                $stmt->bindParam(":dc",$diachi);
                $stmt->bindParam(":dt",$sdt);
                $stmt->bindParam(":ns",$ngaysinh);
                $stmt->bindParam(":usr",$username);
                $stmt->bindParam(":pass",$password);
                $stmt->bindParam(":q",$quyen);
                $stmt->bindParam(":ma",$makh);               
                $kq = $stmt->execute(); // thuc thi cau truy van
                $dbconnect=null; // dong ket noi
                return $kq; // tra ve dong da update
            }   
            catch(PDOException $ex){
                return 0;   
            }
        }

        public function delete_khachhang($makh){
            try{
                $dbconnect = DB::GetDB();
                $update = "DELETE FROM khachhang WHERE id_kh=:ma";
                $stmt = $dbconnect->prepare($update);
                //gan gia tri cua bien vao cac tham so
                $stmt->bindParam(":ma",$makh);

                $kq = $stmt->execute(); // thuc thi cau truy van
                $dbconnect=null; // dong ket noi
                return $kq; // tra ve dong da update
            }   
            catch( PDOException $ex){
                return 0;   
            }
        }

        public function select_kh($ma)
        {
            try{
                $dbconnect = DB::GetDB();// GetDB la ham static trong
                $select = "select * from khachhang where id_kh=".$ma;
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