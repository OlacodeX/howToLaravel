<?php
namespace App\Services\FileStorage\Providers;

abstract class Provider
{
    public function __construct()
    {
    }

    abstract public function connect();

    abstract public function store(Object $file, String $storage_path = '', String $local_path = '', String $file_name = '');
}
