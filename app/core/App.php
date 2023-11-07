<?php 

class App{
    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];
    public function __construct()
    {
        $url = $this->parseURL();

        //CONTROLLER
        //Ada ngga sebuah file di dalam controller yang namanya sesuai dengan nama yang kita kirimkan di url
        //Ada nggak file yang namanya home.php di folder controller?
        if(file_exists('../app/controllers/'. $url[0] . '.php')){
            
            //Kalau ada maka akan kita timpa $controller lama dengan $controller yang baru
            $this->controller = $url[0];
            unset($url[0]);
        }

        //Kita panggil controllers yang sudah dipanggil
        include '../app/controllers/' . $this->controller . '.php' ;
        $this->controller = new $this->controller;


        //METHOD
        if(isset($url[1])){
            if(method_exists($this->controller, $url[1])){
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        //PARAMS
        if(!empty($url)){
            $this->params = array_values($url);
        }

        //Jalankan controllers & method, serta kirimkan params jika ada
        call_user_func_array([$this->controller, $this->method], $this->params);

    }
    public function parseURL()
    {
       if(isset ($_GET['url'])){
          //Kita hilangkan slash yang berada di akhir url
        $url = rtrim( $_GET['url'], '/');

        //Kita akan membersihkan url kita dari karakter-karakter yang sembarang/aneh, yang berpotensi meng-hack
        $url = filter_var($url, FILTER_SANITIZE_URL);

        //Kita pecah urlnya dengan delimiter slash ('/') 
        $url = explode('/', $url);
        return $url;
       }
    }
}