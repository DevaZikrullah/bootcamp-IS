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
        
    public function Hitung(float $bil1,float $bil2,string $bil,$dayapakai = 10)
    {
        $this->daya -= $dayapakai;
        if ($this->daya < 0){
            echo "Daya Masih belum cukup";
            return false;
        }
        switch($bil){
            case "1":
                return $this->Limit($bil1+$bil2);
                
            case "2":
                return $this->Limit($bil1-$bil2);
                
            case "3":
                return $this->Limit($bil1*$bil2);
                
            case "4":
                try {
                    return $this->Limit($bil1/$bil2);
                } catch (DivisionByZeroError) {
                    echo "Tidak Bisa dibagi 0 \n";
                }
                                
            case "5":
                return intval ($this->Limit(pow($bil1,$bil2)));
            default:
                echo "Masukan Operasi 1-6";                 
        }
    }
    
    public function tambahDaya()
    {
        echo "Daya Sekarang : ".$this->daya += 20;
    } 
    
    public function cekDaya()
    {
        if($this->daya <= 0){
            echo "Daya Kurang";
        }        
    }
    
}

class KalkulatorHemat extends Kalkulator{
    public function Hitung(float $bil1,float $bil2,string $bil,$dayapakai = 5)
    {
        return parent::Hitung($bil1,$bil2,$bil, 5);
    }
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
        }else if ($bil ==  null){
            echo "masukan angka";
        }else{
            echo "Tidak Menemukan Operasi" ;
        }
    }
}

echo "pilih kalkulator\n";
echo "1.kalkulator biasa\n";
echo "2.kalkulator hemat\n";
$bil = readline();

if($bil == 1){
    $calc = new Kalkulator();
    operasi($calc);
}else if($bil == 2){
    $calc = new KalkulatorHemat();
    operasi($calc);
}else {
    throw new Exception("Tidak menemukan kalkulator");
}
?>