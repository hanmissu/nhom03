<?php
include_once "../config.php";
include_once ROOT.'/util/MySQLConnet.php';
class userModel
{
    //put your code here
    private $maKH;
    private $tenKH;
    private $sdt;
    private $email;
    private $taiKhoan;
    private $matKhau;
    private $idFacebook;
    private $codeVerify;
    private $status;
    public function getmatKhau()
    {
        return $this->matKhau;
    }

    public function setMatKhau($matKhau)
    {
        $this->matKhau = $matKhau;
    }
    public function getTaiKhoan()
    {
        return $this->taiKhoan;
    }

    public function setTaiKhoan($taiKhoan)
    {
        $this->taiKhoan = $taiKhoan;
    }
    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function getsdt()
    {
        return $this->sdt;
    }

    public function setsdt($sdt)
    {
        $this->sdt = $sdt;
    }
    public function getTenKH()
    {
        return $this->tenKH;
    }

    public function setTenKH($tenKH)
    {
        $this->tenKH = $tenKH;
    }
    public function getMaKH()
    {
        return $this->maKH;
    }

    public function setMaKH($maKH)
    {
        $this->maKH = $maKH;
    }

    
    public function getIdFB()
    {
        return $this->idFacebook;
    }

    public function setIdFB($id)
    {
        $this->idFacebook = $id;
    }
        
    public function getCodeVetify()
    {
        return $this->codeVerify;
    }

    public function serCodeVerify($code)
    {
        $this->codeVerify = $code;
    }
        
    public function getStatus()
    {
        return $this->status;
    }

    public function setStastus($status)
    {
        $this->status = $status;
    }
    public function __construct($maKH, $tenKH, $sdt, $email, $taiKhoan, $matKhau,$idFacebook,$codeVerify,$status)
    {
        $this->maKH = $maKH;
        $this->tenKH = $tenKH;
        $this->sdt = $sdt;
        $this->email = $email;
        $this->taiKhoan = $taiKhoan;
        $this->matKhau = $matKhau;
        $this->idFacebook=$idFacebook;
        $this->codeVerify=$codeVerify;
        $this->status=$status;
    }

    public function  inssertUser()
    {
        $data = [
            'maKH' => $this->maKH,
            'tenKH' => $this->tenKH,
            'sdt' => $this->sdt,
            'email' => $this->email,
            'taiKhoan' => $this->taiKhoan,
            'matKhau' => $this->matKhau,
            'idFacebook'=>$this->idFacebook,
            'codeVerify'=>$this->codeVerify,
            'status'=>$this->status,
        ];
        $dbConnet = new MySQLConnet();
        $pdo = $dbConnet->connet();
        $sql = "INSERT INTO khachhang (maKH,tenKH, SDT,email,taiKhoan,matKhau,idFacebook,codeVerify,status)
         VALUES (:maKH,:tenKH,:sdt,:email,:taiKhoan,:matKhau,:idFacebook,:codeVerify,:status)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute($data);
    }
    public function getDataByUserName()
    {
        $data = ["taiKhoan" => $this->taiKhoan];
        $dbConn = new MySQLConnet();
        $sql = "SELECT * FROM khachhang where taiKhoan=:taiKhoan";
        return $dbConn->getData($sql, $data);
    }

    public function getDataByID()
    {
        $data = ["maKH" => $this->maKH];
        $dbConn = new MySQLConnet();
        $sql = "SELECT * FROM khachhang where maKH=:maKH";
        return $dbConn->getData($sql, $data);
    }
    public function getDataByEmail()
    {
        $data = ["email" => $this->email];
        $dbConn = new MySQLConnet();
        $sql = "SELECT * FROM khachhang where email=:email";
        return $dbConn->getData($sql, $data);
    }
    public function getDataNumberPhone()
    {
        $data = ["SDT" => $this->sdt];
        $dbConn = new MySQLConnet();
        $sql = "SELECT * FROM khachhang where SDT=:SDT";
        return $dbConn->getData($sql, $data);
    }
    public function getDataByIdFacebook(){
        $data = ["idFacebook" => $this->idFacebook];
        $dbConn = new MySQLConnet();
        $sql = "SELECT * FROM khachhang where idFacebook=:idFacebook";
        return $dbConn->getData($sql, $data);
    }
    public function deleteData($userName)
    {
        $data = [
            'userName' => $userName
        ];
        $dbConnet = new MySQLConnet();
        $sql = "DELETE FROM khachhang WHERE taiKhoan=:userName";
        $dbConnet->deleteData($sql, $data);
    }
    public function updateData()
    {
        $data = [

            'tenKH' => $this->tenKH,
            'maKH' => $this->maKH,
            'sdt' => $this->sdt,
            'email' => $this->email,
            'taiKhoan' => $this->taiKhoan,
            'matKhau' => $this->matKhau
        ];

        $dbConnet = new MySQLConnet();
        $sql = "UPDATE khachhang set tenKH=:tenKH,sdt=:sdt,email=:email,matKhau=:matKhau WHERE maKH=:maKH";
        $dbConnet->update($sql, $data);
        return $dbConnet->getData($sql, $data);
    }
    public function updateStatusByID($id){
        $data = [
            'maKH' => $id,
            'code'=>$this->codeVerify,
        ];

        $dbConnet = new MySQLConnet();
        $sql = "UPDATE khachhang set codeVerify=:code,status=1 WHERE maKH=:maKH";
        $dbConnet->update($sql, $data); 
        return $dbConnet->getData($sql, $data);
    }
    public function getDataLastInsert(){
        $dbConnet= new MySQLConnet();
        $sql="SELECT maKH FROM khachhang ORDER BY maKH DESC LIMIT 1";
        $cate=$dbConnet->getData($sql,null);
        $dbConnet->disconnet();
        return $cate;
    }
 
    //Hàm login sau khi mạng xã hội trả dữ liệu về

}
