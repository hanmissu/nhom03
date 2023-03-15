<?php
include_once '../util/MySQLConnet.php';
class orderModel{

    private $maDonHang;
    private $ngayXuatDon;
    private $maKH;
    private $tenKH;
    private $trangThai;
    private $diaChi;
    private $tongTien;
    public function getmaKH()
    {
        return $this->maKH;
    }

    public  function setmaKH($maKH)
    {
        $this->maKH = $maKH;
    }
    public function getTongTien()
    {
        return $this->tongTien;
    }

    public  function setTongTien($tongTien)
    {
        $this->tongTien = $tongTien;
    }
   
    public function getDiaChi()
    {
        return $this->diaChi;
    }

    public  function setDiaChi($diaChi)
    {
        $this->diaChi = $diaChi;
    }
   
    public function getTrangThai()
    {
        return $this->trangThai;
    }

    public  function setTrangThai($trangThai)
    {
        $this->trangThai = $trangThai;
    }

    public function getNgayXuatDon()
    {
        return $this->ngayXuatDon;
    }

    public  function setNgayXuatDon($ngayXuatDon)
    {
        $this->ngayXuatDon = $ngayXuatDon;
    }
    public function getMaDonHang()
    {
        return $this->maDonHang;
    }

    public  function setMaDonHang($maDonHang)
    {
        $this->maDonHang = $maDonHang;
    }

    public function __construct($maDonHang, $ngayXuatDon,$maKH,$tenKH,$trangThai,$diaChi,$tongTien)
    {
        $this->maDonHang = $maDonHang;
        $this->ngayXuatDon = $ngayXuatDon;
        $this->maKH = $maKH;
        $this->tenKH = $tenKH;
        $this->trangThai = $trangThai;
        $this->diaChi = $diaChi;
        $this->tongTien=$tongTien;
    }
    public function  inssertorder()
    {
        $data = [
            'maDonHang' => $this->maDonHang,
            'ngayXuatDon' => $this->ngayXuatDon,
            'maKH' => $this->maKH,
            'tenKH' => $this->tenKH,
            'trangThai' => $this->trangThai,
            'diaChi'=>$this->diaChi,
            'tongTien'=>$this->tongTien,
        ];
        $dbConnet = new MySQLConnet();
        $pdo = $dbConnet->connet();
        $sql = "INSERT INTO donhang (maDonHang,ngayXuat,maKH,tenKH,trangThai,diaChi,tongTien)
         VALUES (:maDonHang,:ngayXuatDon,:maKH,:tenKH,:trangThai,:diaChi,:tongTien)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute($data);
    }
    public function getAll()
    {
        $data = null;
        $dbConn = new MySQLConnet();
        $sql = "select *from donhang";
        return $data = $dbConn->getAllData($sql);
        $dbConn->disconnet();
        return $data; 
    }
    public function getData()
    {
       
        $dbConn = new MySQLConnet();
        $sql = "select * from donhang WHERE maDonHang=:maDonHang";
        $data = ['maDonHang' => $this->maDonHang];
        $cate=$dbConn->getData($sql,$data);
        $dbConn->disconnet();
        return $cate;

    }
    public function deleteData($maDonHang)
    {
        $data = [
            'maDonHang' => $maDonHang
        ];
        $dbConnet = new MySQLConnet();
        $sql = "DELETE FROM donhang WHERE maDonHang=:maDonHang";
        $dbConnet->deleteData($sql, $data);
    }
    public function updateData()
    {
        $data = [
            'maDonHang' => $this->maDonHang,
            'ngayXuatDon' => $this->ngayXuatDon,
            'maKH' => $this->maKH,
            'tenKH' => $this->tenKH,
            'trangThai' => $this->trangThai,
            'diaChi'=>$this->diaChi,
            'tongTien'=>$this->tongTien,
        ];
        $dbConnet = new MySQLConnet();
        $sql = "UPDATE donhang set maDonHang=:maDonHang,ngayXuat=:ngayXuat,maKH=:maKH,tenKH=:tenKH,trangThai=:trangThai,diaChi=:diaChi,tongTien=:tongTien
         WHERE maDonHang=:maDonHang";
        $dbConnet->update($sql, $data);
    }
    public function getDataLastInsert(){
        $dbConnet= new MySQLConnet();
        $sql="SELECT maDonHang FROM donhang ORDER BY maDonHang DESC LIMIT 1";
        $cate=$dbConnet->getData($sql,null);
        $dbConnet->disconnet();
        return $cate;
    }
}