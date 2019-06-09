<?php





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