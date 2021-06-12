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

            default:
                echo "PERIKSA ATURAN VALIDASI YANG ANDA MASUKAN";
                break;
        }

        return $aturanValidasi;
    }
}
