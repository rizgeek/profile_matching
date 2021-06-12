    <?php

class Validasi
{
    public function cekInput($validasi)
    {
        $aturanValidasi = null;
        switch ($validasi) {
            case 'login':
                $aturanValidasi = [
                    ['field' => 'username', 'label' => 'username', 'rules' => 'required|min_length[8]'],
                    ['field' => 'password', 'label' => 'alamat_salon', 'rules' => 'required|min_length[8]'],
                ];
                break;

            case 'pengguna':
                $aturanValidasi = [
                    ['field' => 'nama', 'label' => 'nama', 'rules' => 'required|min_length[3]'],
                    ['field' => 'nomor_hp', 'label' => 'nomor_hp', 'rules' => 'required|min_length[8]'],
                    ['field' => 'jenis_kelamin', 'label' => 'jenis_kelamin', 'rules' => 'required|min_length[3]'],
                    ['field' => 'username', 'label' => 'username', 'rules' => 'required|min_length[10]'],
                    ['field' => 'password', 'label' => 'password', 'rules' => 'required|min_length[6]'],
                    ['field' => 'level_akses', 'label' => 'level_akses', 'rules' => 'required|min_length[3]'],

                ];
                break;

            case 'update_pengguna':
                $aturanValidasi = [
                    ['field' => 'kd_pengguna', 'label' => 'kd_pengguna', 'rules' => 'required|min_length[10]'],
                    ['field' => 'nama', 'label' => 'nama', 'rules' => 'required|min_length[3]'],
                    ['field' => 'nomor_hp', 'label' => 'nomor_hp', 'rules' => 'required|min_length[8]'],
                    ['field' => 'jenis_kelamin', 'label' => 'jenis_kelamin', 'rules' => 'required|min_length[3]'],
                    ['field' => 'username', 'label' => 'username', 'rules' => 'required|min_length[10]'],
                    ['field' => 'level_akses', 'label' => 'level_akses', 'rules' => 'required|min_length[3]'],
                ];
                break;

            case 'tas':
                $aturanValidasi = [
                    ['field' => 'nama_tas', 'label' => 'nama_tas', 'rules' => 'required|min_length[3]'],
                    ['field' => 'merk', 'label' => 'merk', 'rules' => 'required|min_length[3]'],
                    ['field' => 'warna', 'label' => 'warna', 'rules' => 'required|min_length[3]'],
                    ['field' => 'bahan', 'label' => 'bahan', 'rules' => 'required|min_length[3]'],
                ];
                break;

            case 'update_tas':
                $aturanValidasi = [
                    ['field' => 'kd_tas', 'label' => 'kd_tas', 'rules' => 'required|min_length[10]'],
                    ['field' => 'nama_tas', 'label' => 'nama_tas', 'rules' => 'required|min_length[3]'],
                    ['field' => 'merk', 'label' => 'merk', 'rules' => 'required|min_length[3]'],
                    ['field' => 'warna', 'label' => 'warna', 'rules' => 'required|min_length[3]'],
                    ['field' => 'bahan', 'label' => 'bahan', 'rules' => 'required|min_length[3]'],
                ];
                break;

            case 'kriteria':
                $aturanValidasi = [
                    ['field' => 'kriteria', 'label' => 'kriteria', 'rules' => 'required|min_length[3]'],
                    ['field' => 'bobot', 'label' => 'bobot', 'rules' => 'required|min_length[1]'],
                    ['field' => 'core', 'label' => 'core', 'rules' => 'required|min_length[1]'],
                    ['field' => 'secondary', 'label' => 'secondary', 'rules' => 'required|min_length[1]'],
                ];
                break;

            default:
                echo "PERIKSA ATURAN VALIDASI YANG ANDA MASUKAN";
                break;
        }

        return $aturanValidasi;
    }
}
