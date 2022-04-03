<?php

class Kalkulator{
    public $daya;

    public function __construct()
    {
        $this->daya= 0;
    }

    public function Limit(int $a)
    {
        if($a > 1000000){
            throw new Exception("Hasil Harus dibawah 1000000");
        } else {
            echo $a;
        }
    }
    
    
    public function Hitung(int $bil1,int $bil2,int $bil,$dayapakai = 10)
    {
        $this->cekDaya();
        $this->daya -= $dayapakai;
        if ($this->daya < 0){
            throw new Exception("Daya Masih belum cukup");
        }
        switch($bil){
            case "1":
                return $this->Limit($bil1+$bil2);
            case "2":
                return $this->Limit($bil1-$bil2);
            case "3":
                return $this->Limit($bil1*$bil2);
            case "4":
                return $this->Limit($bil1/$bil2);
            case "5":
                return $this->Limit(pow($bil1,$bil2));
            default:
                throw new Exception("Tidak Menemukan opreasi");                   
        }

    }
    
    public function tambahDaya()
    {
        echo "Daya Sekarang : ".$this->daya += 20;
    } 
    
    public function cekDaya()
    {
        if($this->daya <= 0){
            throw new Exception("Daya Kurang");
        }        
    }
    
}

class KalkulatorHemat extends Kalkulator{
    public function Hitung(int $bil1,int $bil2,int $bil,$dayapakai = 5)
    {
        return parent::Hitung($bil1, $bil2,$bil, 5);
    }
}

function KalkulatorBiasa()
{
    $calc = new Kalkulator();
    operasi($calc);    
}
function kalkulatorHemat()
{
    $calc = new KalkulatorHemat();
    operasi($calc);    
}

function operasi($calc)
{
    while (1)
    {
        echo "\n1.Penambahan\n";
        echo "2.Pengurangan\n";
        echo "3.Perkalian\n";
        echo "4.Pembagian\n";
        echo "5.Pemangkatan\n";
        echo "6.Isi Daya\n";
        $bil = readline("Masukan Operasi : ");

        if ($bil == 6)
        {
            $calc->tambahDaya();             
        } else if($bil < 6){
            $bil1 = readline("masukan bilangan pertama : ");
            $bil2 = readline("masukan bilangan kedua : ");
            echo $calc->Hitung($bil1,$bil2,$bil);
        }else{
            throw new Exception("Tidak Menemukan Operasi");
        }
    }
}

echo "pilih kalkulator\n";
echo "1.kalkulator biasa\n";
echo "2.kalkulator hemat\n";
$bil = readline();

if($bil == 1){
    KalkulatorBiasa();
}else if($bil == 2){
    kalkulatorHemat();
}else {
    throw new Exception("Tidak menemukan kalkulator");
}


?>