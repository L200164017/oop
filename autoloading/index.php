<?php

require_once 'App/init.php';

$produk1 = new Komik("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000, 100, 0);
$produk2 = new Game("Uncharted", "Neil Druckmann", "Sony Computer", 250000,50);
$produk3 = new Game("One Piece","eiichiro oda", "system", 35000,50);


$pr1 = new CetakInfoProduk();
$pr1->tambahProduk($produk1);
$pr1->tambahProduk($produk2);

echo $pr1->cetak();