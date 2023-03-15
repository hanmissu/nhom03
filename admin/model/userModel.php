<?php

include_once "../config.php";
include_once ROOT.'/util/MySQLConnet.php';
class userModel {
    //put your code here
    private $userName;
    private $password;
    
    public function getUserName() {
        return $this->userName;
    }

    public function getPassword() {
        return $this->password;
    }

    public  function setUserName($userName) {
        $this->userName = $userName;
    }

    public function setPassword($password) {
        $this->password = $password;
    }
    
    public function __construct($userName, $password) {
        $this->userName = $userName;
        $this->password = $password;
    }
    

 
   public function getData($userName){
       $data=["userName"=>$userName];
       $dbConn= new MySQLConnet();
       $sql= "SELECT * FROM admin WHERE tenTK=:userName";
       return $dbConn->getData($sql,$data);
   }

   public function getUser($userName,$password)
   {
     $data=[
        'userName'=>$this->userName,
        'password'=>$this->password
     ];
     $dbConn= new MySQLConnet();
     $sql= "SELECT * FROM admin WHERE tenTK=:userName";
     
   }

   public function deleteData($userName){
       $data=[
           'userName'=>$userName
       ];
       $dbConnet= new MySQLConnet();
       $sql="DELETE FROM admin WHERE tenTK=:userName";
       $dbConnet->deleteData($sql,$data);
   }
}
