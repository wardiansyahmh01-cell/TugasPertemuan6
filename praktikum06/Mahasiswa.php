<?php
// Abstract class (parent) Mahasiswa
abstract class Mahasiswa
{
    protected $nim;
    protected $nama;
    protected $prodi;
    protected $semester;

    public function __construct($nim, $nama, $prodi, $semester)
    {
        $nim = trim((string) $nim);
        $nama = trim((string) $nama);
        $prodi = trim((string) $prodi);

        if ($nim === '' || $nama === '' || $prodi === '') {
            throw new InvalidArgumentException('NIM, nama, dan prodi wajib diisi.');
        }

        if (!is_numeric($semester) || (int) $semester < 1 || (int) $semester > 14) {
            throw new InvalidArgumentException('Semester harus antara 1 sampai 14.');
        }

        $this->nim = $nim;
        $this->nama = $nama;
        $this->prodi = $prodi;
        $this->semester = (int) $semester;
    }

    public function getNim()
    {
        return $this->nim;
    }

    public function getNama()
    {
        return $this->nama;
    }

    public function getProdi()
    {
        return $this->prodi;
    }

    public function getSemester()
    {
        return $this->semester;
    }

    // Wajib diimplementasikan oleh setiap class turunan.
    abstract public function hitungBiaya();
    abstract public function getJenis();

    public function toArray()
    {
        return [
            'nim' => $this->nim,
            'nama' => $this->nama,
            'prodi' => $this->prodi,
            'semester' => $this->semester,
        ];
    }
}