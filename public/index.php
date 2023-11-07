<?php 

if(!session_id()){
    session_start();
}

//Teknik Bootstrapping
//Memanggil semua file yang diperlukan di dalam file init.php (app/init.php)
require_once '../app/init.php';

//Inisialisasi class baru
//Membuat variabel dengan class App
$app = new App();
