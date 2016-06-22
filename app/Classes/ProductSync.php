<?php

namespace App\Classes;

class ProductSync
{
    public $systemId = null;
    public $page = 1;
    public $perPage = 100;
    private $syncFileName = 'psync.txt';
    
    public function load()
    {
        $f = storage_path($this->syncFileName);
        $serializedObj = file_exists($f) ? file_get_contents($f) : '';
        if (strlen($serializedObj)) {
            $obj = unserialize($serializedObj);
            if ($obj instanceof ProductSync) {
                $this->systemId = $obj->systemId;
                $this->page = $obj->page;
                $this->perPage = $obj->perPage;
                return $obj;
            }
        }
        return $this;
    }
    
    public function save()
    {
        file_put_contents(storage_path($this->syncFileName), serialize($this));
    }
    
    public function reset()
    {
        $this->systemId = null;
        $this->page = 1;
        $this->perPage = 100;
    }
    
    
}

