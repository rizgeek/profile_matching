    <?php

class Validasi
{
    public function cekInput($validasi)
    {
        $aturanValidasi = null;
        switch ($validasi) {
            case 'datasalon':
                $aturanValidasi = [
                    ['field' => 'nama_salon', 'label' => 'nama_salon', 'rules' => 'required|min_length[3]'],
                    ['field' => 'alamat_salon', 'label' => 'alamat_salon', 'rules' => 'required|min_length[3]'],
                ];
                break;

            case 'udatasalon':
                $aturanValidasi = [
                    ['field' => 'kd_salon', 'label' => 'kd_salon', 'rules' => 'required|min_length[3]'],
                    ['field' => 'nama_salon', 'label' => 'nama_salon', 'rules' => 'required|min_length[3]'],
                    ['field' => 'alamat_salon', 'label' => 'alamat_salon', 'rules' => 'required|min_length[3]'],
                ];
                break;

            case 'pengguna':
                $aturanValidasi = [
                    ['field' => 'nama_pengguna', 'label' => 'nama_pengguna', 'rules' => 'required|min_length[3]'],
                    ['field' => 'alamat_pengguna', 'label' => 'alamat_pengguna', 'rules' => 'required|min_length[3]'],
                    ['field' => 'nomor_hp_pengguna', 'label' => 'nomor_hp_pengguna', 'rules' => 'required|min_length[8]'],
                    ['field' => 'level_akses', 'label' => 'level_akses', 'rules' => 'required|min_length[3]'],
                    ['field' => 'username', 'label' => 'username', 'rules' => 'required|min_length[8]'],
                    ['field' => 'password', 'label' => 'password', 'rules' => 'required|min_length[6]'],
                    ['field' => 'kode_salon', 'label' => 'kode_salon', 'rules' => 'required|min_length[8]'],
                ];
                break;

            case 'upengguna':
                $aturanValidasi = [
                    ['field' => 'nama_pengguna', 'label' => 'nama_pengguna', 'rules' => 'required|min_length[3]'],
                    ['field' => 'alamat_pengguna', 'label' => 'alamat_pengguna', 'rules' => 'required|min_length[3]'],
                    ['field' => 'nomor_hp_pengguna', 'label' => 'nomor_hp_pengguna', 'rules' => 'required|min_length[8]'],
                    ['field' => 'level_akses', 'label' => 'level_akses', 'rules' => 'required|min_length[3]'],
                    ['field' => 'kode_salon', 'label' => 'kode_salon', 'rules' => 'required|min_length[8]'],
                    ['field' => 'kode_salon', 'label' => 'kode_pengguna', 'rules' => 'required|min_length[8]'],
                ];
                break;

            case 'registerHr':
                $aturanValidasi = [
                    ['field' => 'nama', 'label' => 'nama', 'rules' => 'required|min_length[3]'],
                    ['field' => 'jenisKelamin', 'label' => 'jenisKelamin', 'rules' => 'required|min_length[3]'],
                    ['field' => 'kd_salon', 'label' => 'kd_salon', 'rules' => 'required|min_length[8]'],
                    ['field' => 'nomor_hp', 'label' => 'nomor_hp', 'rules' => 'required|min_length[8]'],
                    ['field' => 'alamat', 'label' => 'alamat', 'rules' => 'required|min_length[3]'],
                ];
                break;

            case 'login':
                $aturanValidasi = [
                    ['field' => 'username', 'label' => 'username', 'rules' => 'required|min_length[8]'],
                    ['field' => 'password', 'label' => 'password', 'rules' => 'required|min_length[6]'],

                ];
                break;

            case 'registerHrOperator':
                $aturanValidasi = [
                    ['field' => 'nama_hr', 'label' => 'nama_hr', 'rules' => 'required|min_length[3]'],
                    ['field' => 'jns_kelamin', 'label' => 'jns_kelamin', 'rules' => 'required|min_length[3]'],
                    ['field' => 'nomor_hp', 'label' => 'nomor_hp', 'rules' => 'required|min_length[8]'],
                    ['field' => 'alamat', 'label' => 'alamat', 'rules' => 'required|min_length[8]'],
                ];
                break;

            case 'uregisterHr':
                $aturanValidasi = [
                    ['field' => 'kd_hr', 'label' => 'nama', 'rules' => 'required|min_length[8]'],
                    ['field' => 'nama_hr', 'label' => 'nama_hr', 'rules' => 'required|min_length[3]'],
                    ['field' => 'jns_kelamin', 'label' => 'jns_kelamin', 'rules' => 'required|min_length[3]'],
                    ['field' => 'nomor_hp', 'label' => 'nomor_hp', 'rules' => 'required|min_length[8]'],
                    ['field' => 'alamat', 'label' => 'alamat', 'rules' => 'required|min_length[3]'],
                ];
                break;

            case 'aspek':
                $aturanValidasi = [
                    ['field' => 'aspek', 'label' => 'aspek', 'rules' => 'required|min_length[2]'],
                    ['field' => 'bobot_aspek', 'label' => 'bobot_aspek', 'rules' => 'required|min_length[1]'],
                    ['field' => 'core', 'label' => 'core', 'rules' => 'required|min_length[1]'],
                    ['field' => 'secondary', 'label' => 'secondary', 'rules' => 'required|min_length[1]'],
                ];
                break;

            case 'kriteria':
                $aturanValidasi = [
                    ['field' => 'kd_aspek', 'label' => 'kd_aspek', 'rules' => 'required|min_length[8]'],
                    ['field' => 'kriteria', 'label' => 'kriteria', 'rules' => 'required|min_length[2]'],
                    ['field' => 'nilai_target', 'label' => 'nilai_target', 'rules' => 'required|min_length[1]'],
                    ['field' => 'tipe_kriteria', 'label' => 'tipe_kriteria', 'rules' => 'required|min_length[1]'],
                ];
                break;

            case 'bobot':
                $aturanValidasi = [
                    ['field' => 'kd_aspek', 'label' => 'kd_aspek', 'rules' => 'required|min_length[8]'],
                    ['field' => 'kd_hr', 'label' => 'kd_hr', 'rules' => 'required|min_length[8]'],
                    ['field' => 'kd_kriteria', 'label' => 'kd_kriteria', 'rules' => 'required|min_length[8]'],
                    ['field' => 'nilai_bobot', 'label' => 'nilai_bobot', 'rules' => 'required|min_length[1]'],
                ];
                break;

            case 'setting' :
                $aturanValidasi = [
                    ['field' => 'paslam', 'label' => 'paslam', 'rules' => 'required|min_length[6]'],
                    ['field' => 'pasbar', 'label' => 'pasbar', 'rules' => 'required|min_length[6]'],
                    ['field' => 'ulpasbar', 'label' => 'ulpasbar', 'rules' => 'required|min_length[6]'],
                ];
                break;

            default:
                echo "PERIKSA ATURAN VALIDASI YANG ANDA MASUKAN";
                break;
        }

        return $aturanValidasi;
    }
}
