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

            case 'pengguna' :
                $aturanValidasi = [
                    ['field' => 'nama', 'label' => 'nama', 'rules' => 'required|min_length[3]'],
                    ['field' => 'nomor_hp', 'label' => 'nomor_hp', 'rules' => 'required|min_length[8]'],
                    ['field' => 'jenis_kelamin', 'label' => 'jenis_kelamin', 'rules' => 'required|min_length[3]'],
                    ['field' => 'username', 'label' => 'username', 'rules' => 'required|min_length[10]'],
                    ['field' => 'password', 'label' => 'password', 'rules' => 'required|min_length[6]'],
                    ['field' => 'level_akses', 'label' => 'level_akses', 'rules' => 'required|min_length[3]'],

                ];
                break;

            case 'update_pengguna' :
                $aturanValidasi = [
                    ['field' => 'kd_pengguna', 'label' => 'kd_pengguna', 'rules' => 'required|min_length[10]'],
                    ['field' => 'nama', 'label' => 'nama', 'rules' => 'required|min_length[3]'],
                    ['field' => 'nomor_hp', 'label' => 'nomor_hp', 'rules' => 'required|min_length[8]'],
                    ['field' => 'jenis_kelamin', 'label' => 'jenis_kelamin', 'rules' => 'required|min_length[3]'],
                    ['field' => 'username', 'label' => 'username', 'rules' => 'required|min_length[10]'],
                    ['field' => 'level_akses', 'label' => 'level_akses', 'rules' => 'required|min_length[3]'],
                ];
                    break;

            default:
                echo "PERIKSA ATURAN VALIDASI YANG ANDA MASUKAN";
                break;
        }

        return $aturanValidasi;
    }
}
