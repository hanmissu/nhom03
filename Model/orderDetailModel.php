<?php
include_once '../util/MySQLConnet.php';
class orderDetailModel{

    private $maDonHang;
    private $maGiay;
    private $tenGiay;
    private $soLuong;
    private $gia;
    public function gettenGiay()
    {
        return $this->tenGiay;
    }


    public function getmaGiay()
    {
        return $this->maGiay;
    }

    public function getsoLuong()
    {
        return $this->soLuong;
    }

   
    public function getgia()
    {
        return $this->gia;
    }

    public function getMaDonHang()
    {
        return $this->maDonHang;
    }


    public function __construct($maDonHang, $maGiay,$tenGiay,$soLuong,$gia)
    {
        $this->maDonHang = $maDonHang;
        $this->maGiay = $maGiay;
        $this->tenGiay = $tenGiay;
        $this->soLuong = $soLuong;
        $this->gia = $gia;
      
    }
    public function  inssertOrderDetail()
    {
        $data = [
            'maDonHang' => $this->maDonHang,
            'maGiay' => $this->maGiay,
            'tenGiay' => $this->tenGiay,
            'soLuong' => $this->soLuong,
            'gia'=>$this->gia,
           
        ];
        $dbConnet = new MySQLConnet();
        $pdo = $dbConnet->connet();
        $sql = "INSERT INTO chitietdonhang (maDonHang,maGiay,tenGiay,soLuong,gia)
         VALUES (:maDonHang,:maGiay,:tenGiay,:soLuong,:gia)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute($data);
    }
    public function getAll()
    {
        $data = null;
        $dbConn = new MySQLConnet();
        $sql = "select *from chitietdonhang";
        $data = $dbConn->getAllData($sql);
        $dbConn->disconnet();
        return $data; 
    }
    public function getDataAllOfOrderID()
    {
       
        $dbConn = new MySQLConnet();
        $sql = "select * from chitietdonhang WHERE maDonHang=:maDonHang";
        $data = ['maDonHang' => $this->maDonHang];
        $detail=$dbConn->getData($sql,$data);
        $dbConn->disconnet();
        return $detail;

    }

    public function deleteData($maDonHang)
    {
        $data = [
            'maDonHang' => $maDonHang
        ];
        $dbConnet = new MySQLConnet();
        $sql = "DELETE FROM chitietdonhang WHERE maDonHang=:maDonHang";
        $dbConnet->deleteData($sql, $data);
    }


}