<?php

namespace framework;

use framework\Repository;

class JsonRepository implements Repository
{
    private string $_directory;
    private string $_typeOf;

    function __construct($directory, $typeOf) {
        $this->_directory = $directory;
        $this->_typeOf = $typeOf;
    }

    public function getById($id)
    {
        $file = $this->_directory.'/'. $id .'.json';
        if (!file_exists($file))
            return null;
        return $this->convertToType(json_decode(file_get_contents($file)));
    }

    public function getAll(): array
    {
        $files = glob($this->_directory.'/*.json');
        $objects = [];
        foreach ($files as $file) {
            $basename = basename($file);
            $id = substr($basename, 0, strlen($basename) - 5);
            $objects[$id] = $this->convertToType(json_decode($file));
        }
        return $objects;
    }

    public function add($entity) : bool
    {
        $json = json_encode($entity);
        return file_put_contents($this->_directory.'/'.($this->count() + 1).'.json', $json);
    }

    public function removeById($id) : bool
    {
        $file = $this->_directory.'/'. $id .'.json';
        return unlink($file);
    }

    public function updateById($id, $entity) : bool
    {
        return $this->removeById($id) && $this->add($entity);
    }

    public function count() : int {
        $files = glob($this->_directory.'/*.json');
        return count($files);
    }

    private function convertToType($json) {
        $obj = new $this->_typeOf();
        foreach ($json as $key => $value)
            $obj->{$key} = $value;
        return $obj;
    }
}