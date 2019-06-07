<?php 
class Produk {
    public $judul, 
           $penulis,
           $penerbit,
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
    public function getInfoProduk() {
        $str = "{$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";
        return $str;
    }
}


class Komik extends Produk {
    public $jmlHalaman;

      public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $jmlHalaman = 0) {
        parent::construct($judul,$penulis,$penerbit,$harga,);
    }

    public function getInfoProduk() {
        $str = "Komik : " . parent::getInfoProduk() . " - {$this->jmlHalaman} Halaman.";
        return $str;
    }

    $this->jmlHalaman = $jmlHalaman;
}



class Game extends Produk {
    public $waktuMain;

     public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $waktuMain=0) {
        parent::construct($judul,$penulis,$penerbit,$harga,);
    }


    public function getInfoProduk() {
        $str = "Game : ". parent::getInfoProduk()  . "~ {$this->waktuMain} Jam.";
        return $str;
    }

    $this->waktuMain = $waktuMain;
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
