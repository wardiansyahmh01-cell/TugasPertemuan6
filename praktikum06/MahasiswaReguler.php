<?php
require_once __DIR__ . '/Mahasiswa.php';

// Class child untuk mahasiswa reguler
class MahasiswaReguler extends Mahasiswa
{
    private $ukt;

    public function __construct($nim, $nama, $prodi, $semester, $ukt)
    {
        parent::__construct($nim, $nama, $prodi, $semester);

        if (!is_numeric($ukt) || (int) $ukt < 0) {
            throw new InvalidArgumentException('UKT harus berupa angka dan tidak boleh negatif.');
        }

        $this->ukt = (int) $ukt;
    }

    public function hitungBiaya()
    {
        return $this->ukt;
    }

    public function getJenis()
    {
        return 'Reguler';
    }

    public function toArray()
    {
        return array_merge(parent::toArray(), [
            'jenis' => 'Reguler',
            'ukt' => $this->ukt,
            'potonganPersen' => 0,
        ]);
    }
}