<?php
    require_once("db.php");
    class nccclass{
        private $dbconnect ;
        public function __construct(){}
        public function select_all()
        {
            try{
                $dbconnect = DB::GetDB();// GetDB la ham static trong
                $select = "select * from ncc";
                $kq = $dbconnect->query($select);// goi query cho cau 
                $arr = $kq->fetchAll();
                $dbconnect=null; //dong connection lai
                return $arr;
            }
            catch( PDOException $ex){
                return array();
            }
        }

        public function add_new_ncc($mancc,$tenncc,$diachi)
        {
            try{
                $dbconnect = DB::getDB();
                $insert ="INSERT INTO ncc(ma_ncc, ten_ncc, dia_chi ) VALUES (:mancc, :tenncc, :diachi)";
                $stmt= $dbconnect->prepare($insert);            
                $stmt->bindParam(":mancc", $mancc);
                $stmt->bindParam(":tenncc", $tenncc);
                $stmt->bindParam(":diachi", $diachi);                                
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

        public function get_One_ncc($mancc) {
            try{
                $dbconnect = DB::getDB();
                $select ="SELECT * FROM ncc nv WHERE mancc=:mancc";
                $stmt= $dbconnect->prepare($select);
                $stmt->bindParam(":mancc", $mancc);
                $kq = $stmt->execute();
                $arr = $stmt->fetchAll();
                $dbconnect=null;
                return $arr;
            }
            catch(PDOException $ex){
                return array();
            }
        }


        public function update_One_ncc($mancc) {
            try{
                $dbconnect = DB::getDB();
                $update ="UPDATE ncc";
                $stmt= $dbconnect->prepare($update);
                $stmt->bindParam(":mancc", $mancc);
                $result = $stmt->execute();
                $dbconnect=null;
                return $result;
            }
            catch(PDOException $ex){
                return 0;
            }
        }


        // su dung preparedstatemet - ham co tham so
        public function edit_ncc($mancc,$tenncc,$diachi){
            try{
                $dbconnect = DB::GetDB();
                $update = "UPDATE ncc SET ten_ncc =:ten, dia_chi =:dc
                            WHERE ma_ncc =:ma   ";
                $stmt = $dbconnect->prepare($update);
                //gan gia tri cua bien vao cac tham so               
                $stmt->bindParam(":ten",$tenncc);       
                $stmt->bindParam(":dc",$diachi);                       
                $stmt->bindParam(":ma",$mancc);               
                $kq = $stmt->execute(); // thuc thi cau truy van
                $dbconnect=null; // dong ket noi
                return $kq; // tra ve dong da update
            }   
            catch(PDOException $ex){
                return 0;   
            }
        }

        public function delete_ncc($mancc){
            try{
                $dbconnect = DB::GetDB();
                $update = "DELETE FROM mancc WHERE ma_ncc=:ma";
                $stmt = $dbconnect->prepare($update);
                //gan gia tri cua bien vao cac tham so
                $stmt->bindParam(":ma",$mancc);

                $kq = $stmt->execute(); // thuc thi cau truy van
                $dbconnect=null; // dong ket noi
                return $kq; // tra ve dong da update
            }   
            catch( PDOException $ex){
                return 0;   
            }
        }

        public function select_ncc($ma)
        {
            try{
                $dbconnect = DB::GetDB();// GetDB la ham static trong
                $select = "select * from ncc where ma_ncc=".$ma;
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