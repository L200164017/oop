<?php


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

