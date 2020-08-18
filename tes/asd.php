<?php 
class Cart{
    public $kodeProduk = []; 
    public $kuantitas = [];

    function tambahProduk($kodeProduk, $kuantitas){
        if (($key = array_search($kodeProduk, $this->kodeProduk)) !== false) {
            $this->kuantitas[$key] += $kuantitas;
        } else{
            array_push($this->kodeProduk, $kodeProduk);
            array_push($this->kuantitas, $kuantitas);
        }
    }

    function hapusProduk($kodeProduk){
        if (($key = array_search($kodeProduk, $this->kodeProduk)) !== false) {
            unset($this->kodeProduk[$key]);
            unset($this->kuantitas[$key]);
        }
    }

    function tampilkanCart(){
        foreach($this->kodeProduk as $index => $kode){
            echo $kode . " (" . $this->kuantitas[$index] . ")<br/>";
        }
    }
}

$obj = new Cart();
$obj->tambahProduk("Pisang Hijau", 4);

$obj->tambahProduk("Semangka Kuning", 4);
$obj->tambahProduk("Apel Merah", 8);

$obj->hapusProduk("Semangka Kuning");

$obj->tampilkanCart();
?> 