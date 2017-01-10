<?php
require_once "config.php";

class model {
    private static $db = null;
    private $config;
    private $mysqli;
    
      public static function getDB(){
          
            if ($mysqli->connect_error) { echo "error"; 
                    die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
            }
            if(self::$db == null) self::$db = new model();
            return self::$db;            
        }
     
           private function __construct() {
               
            $this->config = new Config();
            $this->mysqli = new mysqli($this->config->db_host, $this->config->db_user, $this->config->db_password, $this->config->db_name);
            $this->mysqli->query("SET NAMES 'utf8'");
	}
        
        public function addUser($name, $email, $country_id){
            $query = "INSERT INTO users (user_name, user_email, user_country_id) "
                    . "VALUES('".$name."','".$email."',".$country_id.");";
           
            $this->mysqli->query($query);
        }
        
        public function deleteUser($id) {
            $query = "DELETE FROM users WHERE id = ".$id;
            $this->mysqli->query($query);
        }
        
        public function editUser($id, $name, $email, $country_id) {
            
            $query = "UPDATE users SET user_name = '".$name."', user_email = '".
                    $email."',user_country_id = ".$country_id." WHERE id = ".$id;
            
            $this->mysqli->query($query);
        }
        
         private function resultSetToArray($result_set){
            $array = array();
            while (($row = $result_set->fetch_assoc()) != false){
                $array[] = $row;
                
            }
            return $array;
        }
        
        public function selectCountries() {
            
            $query = "SELECT id, country_name FROM countries";
            
            return $this->resultSetToArray($this->mysqli->query($query));
        }
        public function selectUsers() {
            $query = "SELECT users.id, users.user_name, users.user_email, countries.country_name "
                    . "FROM users JOIN countries ON users.user_country_id = countries.id ";
           
            return $this->resultSetToArray($this->mysqli->query($query));
        }
        
        public function selectUser($id) {
             $query = "SELECT users.id, users.user_name, users.user_email, users.user_country_id "
                    . "FROM users  WHERE users.id =".$id;
           $result_set = $this->mysqli->query($query);
            return $result_set->fetch_assoc();
        }


        public function __destruct(){
            if($this->mysqli) $this->mysqli->close();
        }
}
