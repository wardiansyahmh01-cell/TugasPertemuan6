<?php

// Parent Class
class Pegawai {
    protected $id;
    protected $nama;

    public function __construct($id, $nama) {
        $this->id = $id;
        $this->nama = $nama;
    }

    public function getNama() {
        return $this->nama;
    }
}

// Child Class Pegawai Tetap
class PegawaiTetap extends Pegawai {
    private $gajiPokok;

    public function __construct($id, $nama, $gajiPokok) {
        parent::__construct($id, $nama);

        if ($gajiPokok < 0) {
            throw new InvalidArgumentException("Gaji tidak boleh negatif");
        }

        $this->gajiPokok = $gajiPokok;
    }

    public function hitungGaji() {
        return $this->gajiPokok;
    }
}

// Child Class Pegawai Kontrak
class PegawaiKontrak extends Pegawai {
    private $upahPerJam;
    private $jamKerja;

    public function __construct($id, $nama, $upahPerJam, $jamKerja) {
        parent::__construct($id, $nama);

        if ($upahPerJam < 0 || $jamKerja < 0) {
            throw new InvalidArgumentException("Angka tidak boleh negatif");
        }

        $this->upahPerJam = $upahPerJam;
        $this->jamKerja = $jamKerja;
    }

    public function hitungGaji() {
        return $this->upahPerJam * $this->jamKerja;
    }
}

// Membuat dua object
$pegawai1 = new PegawaiTetap(1, "Jaelani", 5000000);
$pegawai2 = new PegawaiKontrak(2, "Amanda", 50000, 160);

// Menampilkan output
echo "=== DATA PEGAWAI ===<br>";

echo "Nama: " . $pegawai1->getNama() . "<br>";
echo "Gaji Pegawai Tetap: Rp " .
     number_format($pegawai1->hitungGaji(), 0, ',', '.') . "<br><br>";

echo "Nama: " . $pegawai2->getNama() . "<br>";
echo "Gaji Pegawai Kontrak: Rp " .
     number_format($pegawai2->hitungGaji(), 0, ',', '.') . "<br>";

?>
