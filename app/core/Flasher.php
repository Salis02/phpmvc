<?php

class Flasher
{
    public static function setFlash($pesan, $aksi, $tipe)
    {
        $_SESSION['flash'] = [
            'pesan' => $pesan,
            'aksi' => $aksi,
            'tipe' => $tipe
        ];
    }
    public static function flash()
    {
        if (isset($_SESSION['flash'])) {
            echo '<div class="alert alert-'. $_SESSION['flash']['tipe'] .' alert-dismissible fade show" role="alert">
            <strong>Data '. $_SESSION['flash']['pesan'] .'</strong> '. $_SESSION['flash']['aksi'] .'
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';

          //Kemudian kita hapus sessionya, jadi hanya berlaku sekali dengan function unset
          unset($_SESSION['flash']);
        }
    }
}
