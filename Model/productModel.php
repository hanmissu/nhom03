<?php
include_once '../util/MySQLConnet.php';
class productModel
{
    private $maGiay;
    private $tenGiay;
    private $gia;
    private $mauSac;
    private $size;
    private $anh;
    private $moTa;
    private $maLoaiGiay;

    public function getmoTa()
    {
        return $this->moTa;
    }

    public  function setmoTa($moTa)
    {
        $this->moTa = $moTa;
    }
    public function getanh()
    {
        return $this->anh;
    }

    public  function setanh($anh)
    {
        $this->anh = $anh;
    }
    public function getsize()
    {
        return $this->size;
    }

    public  function setsize($size)
    {
        $this->size = $size;
    }
    public function getmauSac()
    {
        return $this->mauSac;
    }

    public  function setmauSac($mauSac)
    {
        $this->mauSac = $mauSac;
    }
    public function getgia()
    {
        return $this->gia;
    }

    public  function setgia($gia)
    {
        $this->gia = $gia;
    }
    public function gettenGiay()
    {
        return $this->tenGiay;
    }

    public  function settenGiay($tenGiay)
    {
        $this->tenGiay = $tenGiay;
    }
    public function getMaLoaGiay()
    {
        return $this->maLoaiGiay;
    }

    public  function setMaLoaiGiay($maLoaiGiay)
    {
        $this->maLoaiGiay = $maLoaiGiay;
    }


    public function getmaGiay()
    {
        return $this->maGiay;
    }

    public  function setmaGiay($maGiay)
    {
        $this->maGiay = $maGiay;
    }

    public function __construct($maGiay, $tenGiay, $gia, $mauSac, $size, $anh, $moTa, $maLoaiGiay)
    {
        $this->maGiay = $maGiay;
        $this->tenGiay = $tenGiay;
        $this->gia = $gia;
        $this->mauSac = $mauSac;
        $this->size = $size;
        $this->anh = $anh;
        $this->moTa = $moTa;
        $this->maLoaiGiay=$maLoaiGiay;
    }
    public function  inssertProduct()
    {
        $data = [
            'maGiay'=>$this->maGiay,
            'tenGiay' => $this->tenGiay,
            'gia' => $this->gia,
            'mauSac' => $this->mauSac,
            'size' => $this->size,
            'anh' => $this->anh,
            'moTa' => $this->moTa,
            'maLoaiGiay' => $this->maLoaiGiay,
    
        ];
        $dbConnet = new MySQLConnet();
        $pdo = $dbConnet->connet();
        $sql = "INSERT INTO giay (maGiay,tenGiay,gia,mauSac,size,anh,moTa,maLoaiGiay) 
                VALUES (:maGiay,:tenGiay,:gia,:mauSac,:size,:anh,:moTa,:maLoaiGiay)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute($data);
    }
    
    public function getAllProduct()
    {
        $data = null;
        $dbConn = new MySQLConnet();
        $sql = "select *from giay";
        return $data = $dbConn->getAllData($sql);
        $dbConn->disconnet();
        return $data; 
    }
    public function getData()
    {
       
        $dbConn = new MySQLConnet();
        $sql = "select * from giay WHERE maGiay=:maGiay";
        $data = ['maGiay' => $this->maGiay];
        $pro=$dbConn->getData($sql,$data);
        $dbConn->disconnet();
        return $pro;

    }

    
    public function getSearch()
    {
        $dbConn = new MySQLConnet();
        $sql = "select * from giay where tenGiay like concat('%', :tenGiay '%')";
        $data = ['tenGiay' => $this->tenGiay];
        $pro=$dbConn->getData($sql,$data);
        $dbConn->disconnet();
        return $pro;

    }

    public function getDataByCategoryID()
    {
        $data = ['maLoaiGiay' => $this->maLoaiGiay];
        $dbConn = new MySQLConnet();
        $sql = "select * from giay WHERE maLoaiGiay=:maLoaiGiay";
        
        $pro=$dbConn->getData($sql,$data);
        $dbConn->disconnet();
        return $pro;

    }

    public function deleteData()
    {
        $data = [
            'maGiay' => $this->maGiay
        ];
        $dbConnet = new MySQLConnet();
        $sql = "DELETE FROM giay WHERE maGiay=:maGiay";
        $pro=$dbConnet->deleteData($sql, $data);
        $dbConnet->disconnet();
        return $pro;
    }
    public function updateData($maGiay,$tenGiay,$gia,$mauSac,$size,$anh,$moTa,$maLoaiGiay,$soLuong)
    {
        $data = [
            'maGiay'=>$maGiay,
            'tenGiay' => $tenGiay,
            'gia' => $gia,
            'mauSac' => $mauSac,
            'size' => $size,
            'anh' => $anh,
            'moTa' => $moTa,
            'maLoaiGiay' => $maLoaiGiay,
            'soLuong'=>$soLuong,
        ];
        $dbConnet = new MySQLConnet();
        $sql = "UPDATE giay set tenGiay=:tenGiay,gia=:gia,mauSac=:mauSac,size=:size,anh=:anh,moTa=:moTa,maLoaiGiay=:maLoaiGiay,soLuong=:soLuong
                 WHERE maGiay=:maGiay";
        $dbConnet->update($sql, $data);
    }
}
