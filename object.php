<?php 
class Produk {
    public $judul, 
           $penulis,
           $penerbit,
           $diskon;

    protected $harga;

    

    public function __construct( $judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0 ) {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
    }
    public function getLabel() {
        return "$this->penulis, $this->penerbit";
    }
    public function getInfoProduk() {
        $str = "{$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";
        return $str;
    }

    public function setDiskon($diskon) {
        $this->diskon = $diskon;
    }
}


class Komik extends Produk {
    public $jmlHalaman;

      public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga=0,$jmlHalaman = 0) {
        parent::__construct($judul,$penulis,$penerbit,$harga);

        $this->jmlHalaman = $jmlHalaman;
    }

    public function getInfoProduk() {
        $str = "Komik : " . parent::getInfoProduk() . " - {$this->jmlHalaman} Halaman.";
        return $str;
    }

    
}



class Game extends Produk {
    public $waktuMain;

     public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $waktuMain=0) {
        parent::__construct($judul,$penulis,$penerbit,$harga);

        $this->waktuMain = $waktuMain;
    }


    public function getInfoProduk() {
        $str = "Game : ". parent::getInfoProduk()  . "~ {$this->waktuMain} Jam.";
        return $str;
    }

    public function getHarga() {
        $str = $this->harga - ($this->harga*$this->diskon/100);
        return $str;
    }

    
}



class CetakInfoProduk {
    public function cetak( Produk $produk ) {
        $str = "{$produk->judul} | {$produk->getLabel()} (Rp. {$produk->harga})";
        return $str;
    }
}




$produk1 = new Komik("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000, 100, 0);
$produk2 = new Game("Uncharted", "Neil Druckmann", "Sony Computer", 250000,50);
$produk3 = new Game("One Piece","eiichiro oda", "system", 35000,50);







echo $produk1->getInfoProduk();
echo "<br>";
echo $produk2->getInfoProduk();
echo "<br>";
echo $produk3->getInfoProduk();


echo "<hr>";



// Ini kalau pakai public
// $produk2->harga = 220000;
// echo "<br>";
// echo $produk2->harga;


//Ini kalau pakai protected
$produk2->setDiskon(50);
echo $produk2->getHarga();