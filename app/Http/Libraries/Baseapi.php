<?php

namespace App\Http\Libraries;

use Illuminate\Support\Facades\Http;

class BaseApi
{
    // variable yang hanya bisa di akses di class ini dan turunannya
    protected $baseUrl;
    //constractor : menyiapkan isi data, dijalankan otomatis tanpa di panggil
    public function __construct()
    {
        //var $baseurl yg di atas diisi nilainya dari isian file .env bagian API_HOST
        //var ini diisi otomatis ketika file/class BaseApi dipanggil di controller
        $this->baseUrl = "http://127.0.0.1:1111";
    }
    private function client()
    {
        // koneksikan ip dari var $baseUrl ke depedencyweb Http
        // menggunakan ddepedency Http karena project API nya berbasis web (protocol Http)
        return Http::baseUrl($this->baseUrl);
    }
    public function index(String $endpoint, Array $data = [])
    {
        return $this->client()->get($endpoint, $data);
    }
    public function store(String $endpoint, Array $data = [])
    {
        return $this->client()->post($endpoint, $data);
    }
    public function edit(String $endpoint, Array $data = [])
    {
        return $this->client()->get($endpoint, $data);
    }
    public function update(String $endpoint, Array $data = [])
    {
        return $this->client()->patch($endpoint, $data);
    }


    public function delete(String $endpoint, Array $data = [])
    {
        return $this->client()->delete($endpoint, $data);
    }


    public function trash(String $endpoint, Array $data = [])
    {
        return $this->client()->get($endpoint, $data);
    }



    public function restore(String $endpoint, Array $data = [])
    {
        return $this->client()->get($endpoint, $data);
    }


    public function permanent(String $endpoint, Array $data = [])
    {
        return $this->client()->get($endpoint, $data);
    }

}
