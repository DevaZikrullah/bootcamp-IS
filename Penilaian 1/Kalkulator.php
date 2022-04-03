<?php

class Kalkulator{
    public $daya;

    public function __construct()
    {
        $this->daya= 5;
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
                break;
            case "2":
                return $this->Limit($bil1-$bil2);
                break;
            case "3":
                return $this->Limit($bil1*$bil2);
                break;
            case "4":
                return $this->Limit($bil1/$bil2);
                break; 
            case "5":
                return $this->Limit(pow($bil1,$bil2));
                break;                    
        }

    }
    

    public function tambahDaya()
    {
        return $this->daya += 20;
    } 
    
    public function cekDaya()
    {
        if($this->daya <= 0){
            throw new Exception("Daya Kurang");
        }
        
    }
    
}

class KalkulatorHemat extends Kalkulator{
    function Hitung(int $bil1,int $bil2,int $bil,$dayapakai = 5)
    {
        return parent::Hitung($bil1, $bil2,$bil, 5);
    }
}



echo "pilih kalkulator\n";
echo "1.kalkulator biasa\n";
echo "2.kalkulator hemat\n";
$bil = readline();


if($bil == 1){
    $bil1 = readline("masukan bilangan pertama : ");
    $bil2 = readline("masukan bilangan kedua : ");
    $orm = readline("masukan : ");
    $i = new Kalkulator();
    $i -> Hitung($bil1,$bil2,$orm);
    // $i ->tambahDaya();
}else if($bil == 2){
    $bil1 = readline("masukan bilangan pertama : ");
    $bil2 = readline("masukan bilangan kedua : ");
    $orm = readline("masukan : ");
    $i = new KalkulatorHemat();
    $i -> Hitung($bil1,$bil2,$orm);
}


?>