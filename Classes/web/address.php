<?php
    include '../../lib/database.php';
    include '../../helpers/format.php';

    class address{
        private $db;
        private $fm;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }


        public function get_listAddress(){

            $IdAccount = Session::get('userId');
            $query = "SELECT * FROM `info` WHERE `IdAccount` = '$IdAccount'";
            $result = $this->db->select($query);
            return $result;
        }
        public function create_address($addr, $status, $phone, $name){

            $addr = $this->fm->validation($addr);
            $status = $this->fm->validation($status);
            $phone = $this->fm->validation($phone);
            $name = $this->fm->validation($name);
            $IdAccount = Session::get('userId');

            if($status == 0){
                $queryInsert = "INSERT INTO `info` (
                    `IdAccount`, 
                    `Address`,
                    `StatusInfo`, 
                    `PhoneNumber`,
                    `Name`
                    ) VALUES (
                        '$IdAccount', 
                        '$addr', 
                        '$status', 
                        '$phone',
                        '$name');
                    ";
               
                $resultInsert = $this->db->insert($queryInsert);
                if($resultInsert == true){
                    header('Location:user_address.php');
                    return "Địa chỉ không tồn tại!";
                }else{
                    return "Địa chỉ đã tồn tại!";
                    echo '123';
                }
            }elseif($status == 1){
                $querySetDefault = "UPDATE `info` 
                    SET `StatusInfo`= '0' 
                    WHERE `Address` = (
                        SELECT `Address` 
                        FROM `info` 
                        WHERE `StatusInfo` = 1 
                        AND `IdAccount` = '$IdAccount'
                    );
                ";
                $resultSetDefault = $this->db->update($querySetDefault);
                if($resultSetDefault == true){
                    $queryInsert = "INSERT INTO `info` (
                        `IdAccount`, 
                        `Address`,
                        `StatusInfo`, 
                        `PhoneNumber`,
                        `Name`
                        ) VALUES (
                            '$IdAccount', 
                            '$addr', 
                            '$status', 
                            '$phone',
                            '$name');
                        ";
                    $resultInsert = $this->db->insert($queryInsert);
                    if($resultInsert == true){
                        header('Location:user_address.php');
                    }else{
                        return "Địa chỉ đã tồn tại!";
                    }
                }
            }  
        }
        public function update_address($addNew, $status, $phone, $name, $idAddress){

            $addr = $this->fm->validation($addNew);
            $status = $this->fm->validation($status);
            $phone = $this->fm->validation($phone);
            $name = $this->fm->validation($name);
            $IdAccount = Session::get('userId');

            if($status == 0){
                $queryInsert = "UPDATE `info` 
                    SET `Address`='$addr',
                        `StatusInfo`='$status',
                        `PhoneNumber`='$phone', 
                        `Name` = '$name'
                    WHERE  `Address` = '$idAddress' AND IdAccount = '$IdAccount';
                    ";
                $resultInsert = $this->db->insert($queryInsert);
                if($resultInsert == true){
                    header('Location: user_address.php');
                }else{
                    return "Haiizz lỗi!!";
                }
            }elseif($status == 1){
                $querySetDefault = "UPDATE `info` 
                    SET `StatusInfo`= '0' 
                    WHERE `Address` = (
                        SELECT `Address` 
                        FROM `info` 
                        WHERE `StatusInfo` = 1 
                        AND `IdAccount` = '$IdAccount'
                    );
                ";
                $resultSetDefault = $this->db->update($querySetDefault);
                if($resultSetDefault == true){
                    $queryInsert = "UPDATE `info` 
                    SET `Address`='$addr',
                        `StatusInfo`='$status',
                        `PhoneNumber`='$phone' 
                    WHERE `Address` = '$idAddress' AND IdAccount = '$IdAccount';
                    ";
                    $resultInsert = $this->db->insert($queryInsert);
                    if($resultInsert == true){
                        header('Location: user_address.php');
                    }else{
                        return "Haiizz lỗi!!";
                    }
                }
            }  
        }
        public function get_address_where($address, $IdAccount){
            $query = "SELECT * 
                FROM `info` 
                WHERE `Address` = '$address' AND IdAccount = '$IdAccount';
            ";
            return $result = $this->db->select($query);
        }
        public function delete_address($id, $address){
            $query = "DELETE 
                FROM `info` 
                WHERE `info`.`IdAccount` = '$id' 
                AND `info`.`Address` = '$address'
            ";
            return $result = $this->db->delete($query);
        }
            

    }
?>