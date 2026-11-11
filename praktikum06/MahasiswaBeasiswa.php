<?php
require_once __DIR__ . '/Mahasiswa.php';

// Class child untuk mahasiswa penerima beasiswa
class MahasiswaBeasiswa extends Mahasiswa
{
    private $ukt;
    private $potonganPersen;

    public function __construct($nim, $nama, $prodi, $semester, $ukt, $potonganPersen)
    {
        parent::__construct($nim, $nama, $prodi, $semester);

        if (!is_numeric($ukt) || (int) $ukt < 0) {
            throw new InvalidArgumentException('UKT harus berupa angka dan tidak boleh negatif.');
        }

        if (!is_numeric($potonganPersen) || (int) $potonganPersen < 0 || (int) $potonganPersen > 100) {
            throw new InvalidArgumentException('Potongan beasiswa harus antara 0 sampai 100 persen.');
        }

        $this->ukt = (int) $ukt;
        $this->potonganPersen = (int) $potonganPersen;
    }

    public function hitungBiaya()
    {
        return (int) round($this->ukt * (100 - $this->potonganPersen) / 100);
    }

    public function getJenis()
    {
        return 'Beasiswa';
    }

    public function toArray()
    {
        return array_merge(parent::toArray(), [
            'jenis' => 'Beasiswa',
            'ukt' => $this->ukt,
            'potonganPersen' => $this->potonganPersen,
        ]);
    }
}