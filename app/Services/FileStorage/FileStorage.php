<?php
namespace App\Services\FileStorage;

use ReflectionClass;

class FileStorage
{
    protected $providerInstance;

    public function __construct(protected string $provider)
    {
        $this->providerInstance = $this->createProvider();
    }

    protected function createProvider()
    {
        
        $providerName = sprintf(
            "%s\\Providers\\%s%s",
            __NAMESPACE__,
            ucfirst($this->provider),
            "Provider"
        );

        $class = new ReflectionClass($providerName);

        return $class->newInstance();
    }

    public function connect()
    {
        return $this->providerInstance->connect();
    }
    public function store(Object $file, String $storage_path = '', String $local_path = '', String $file_name = '')
    {
        return $this->providerInstance->store($file, $storage_path, $local_path, $file_name);
    }

}
