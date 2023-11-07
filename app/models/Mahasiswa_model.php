<?php

class Mahasiswa_model
{
    // private $mhs = [
    //     [
    //         "Nama" => "Salis Nizar Qomaruzaman",
    //         "NIM" => "203200140",
    //         "Email" => "nizarsalis@gmail.com",
    //         "Jurusan" => "Teknik Informatika"
    //     ],
    //     [
    //         "Nama" => "Al Ghifari",
    //         "NIM" => "203200267",
    //         "Email" => "ghifari@yahoo.com",
    //         "Jurusan" => "Teknik Nuklir"
    //     ],
    //     [
    //         "Nama" => "Muhammad Al Fatta",
    //         "NIM" => "203200097",
    //         "Email" => "fatta@gmail.com",
    //         "Jurusan" => "Akuntansi"
    //     ],
    //     [
    //         "Nama" => "Salmon Salto",
    //         "NIM" => "203200192",
    //         "Email" => "salto@almaata.ac.id",
    //         "Jurusan" => "Kedokteran Air"
    //     ],
    //     [
    //         "Nama" => "Tempe Armor",
    //         "NIM" => "203200011",
    //         "Email" => "armor@go.id",
    //         "Jurusan" => "Nafas Api"
    //     ],
    // ];

    // private $dbh; //database handler
    // private $stmt;

    // public function __construct(){
    //     //data source name
    //     $dsn = "mysql:host=localhost;dbname=phpmvc";

    //     try{
    //         $this->dbh = new PDO($dsn,"root","");
    //     }catch(PDOException $e){
    //         die("". $e->getMessage());
    //     }
    // }

    private $table = 'mahasiswa';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllMahaiswa()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getMahasiswaById($id){

        //menyimpan data yang akan kita binding, utk menghindari sql injection, mengamankan query kita
        $this->db->query(' SELECT * FROM '. $this->table . ' WHERE id=:id ');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahDataMahasiswa($data){
        $query = " INSERT INTO " . $this->table . " VALUES ('', :nama, :nim, :email, :jurusan) " ;
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nim', $data['nim']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jurusan', $data['jurusan']);

        $this->db->execute(); 

        return $this->db->rowCount();
    }
    public function hapusDataMahasiswa($id){
        $query = " DELETE FROM " . $this->table . " WHERE id=:id ";
        $this->db->query($query);
        $this->db->bind("id", $id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function ubahDataMahasiswa($data){
        $query = "UPDATE " . $this->table . " SET 
          nama = :nama,
          nim = :nim,
          email = :email,
          jurusan = :jurusan WHERE id = :id  
        ";
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nim', $data['nim']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jurusan', $data['jurusan']);
        $this->db->bind('id', $data['id']);

        $this->db->execute(); 

        return $this->db->rowCount();
    }

    public function cariDataMahasiswa(){
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM " . $this->table . " WHERE nama LIKE :keyword ";
        $this->db->query($query);
        $this->db->bind("keyword", "%$keyword%");
        return $this->db->resultSet();
    }
}
