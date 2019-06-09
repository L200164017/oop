<?php


interface InfoProduk {
    public function getInfoProduk();
}


abstract class Produk {
    protected $judul, 
           $penulis,
           $penerbit,
           $diskon,
           $harga;

    

    public function __construct( $judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0 ) {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
    }
    public function getLabel() {
        return "$this->penulis, $this->penerbit";
    }

    //Method wajib buat abstract

    abstract public function getInfo();

    public function setDiskon($diskon) {
        $this->diskon = $diskon;
    }

    public function getDiskon()
    {
        return $this->diskon;
    }

    public function getHarga() {
        $str = $this->harga - ($this->harga*$this->diskon/100);
        return $str;
    }

    public function setPenulis($penulis) {
        $this->penulis = $penulis;
    }

    public function getPenulis() {
        return $this->penulis;
    }

    public function setPenerbit($penerbit)
    {
        $this->penerbit = $penerbit;
    }

    public function getPenerbit() 
    {
        return $this->penerbit;
    }

    public function bendaPadat()
    {
        $bendaPadat = true;
    }

}


class Komik extends Produk implements InfoProduk {
    public $jmlHalaman;

      public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga=0,$jmlHalaman = 0) {
        parent::__construct($judul,$penulis,$penerbit,$harga);

        $this->jmlHalaman = $jmlHalaman;
    }

    // Mengambil di abstract
    public function getInfo() {
        $str = "{$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";
        return $str;
    }

    
    //Mengambil di interface
    public function getInfoProduk() {
        $str = "Komik : " . $this->getInfo() . " - {$this->jmlHalaman} Halaman.";
        return $str;
    }

    
}



class Game extends Produk implements InfoProduk {
    public $waktuMain;

     public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $waktuMain=0) {
        parent::__construct($judul,$penulis,$penerbit,$harga);

        $this->waktuMain = $waktuMain;
    }

    //Mengambil di abstract
    public function getInfo() {
        $str = "{$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";
        return $str;
    }


    //Mengambil di interface
    public function getInfoProduk() {
        $str = "Game : ". $this->getInfo()  . "~ {$this->waktuMain} Jam.";
        return $str;
    }

      
}


class CetakInfoProduk {

    public $listproduk = array();

    public function tambahProduk (Produk $produk) 
    {
        $this->listproduk[] = $produk;
    }


    public function cetak() {
        $str =  "DAFTAR LIST PRODUK : <br> ";

        foreach($this->listproduk as $p)
        {
            $str .=  "- {$p->getInfoProduk()} <br>";
        }

        return $str;
    }
}




$produk1 = new Komik("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000, 100, 0);
$produk2 = new Game("Uncharted", "Neil Druckmann", "Sony Computer", 250000,50);
$produk3 = new Game("One Piece","eiichiro oda", "system", 35000,50);


$pr1 = new CetakInfoProduk();
$pr1->tambahProduk($produk1);
$pr1->tambahProduk($produk2);

echo $pr1->cetak();





