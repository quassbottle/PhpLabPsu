<?php

namespace framework;
include 'Repository.php';

class JsonRepository implements Repository
{
    private string $_directory;

    function __construct($directory) {
        $this->_directory = $directory;
    }

    public function getById($id)
    {
        $file = $this->_directory.'/'. $id .'.json';
        if (!file_exists($file))
            return null;
        return json_decode(file_get_contents($file));
    }

    public function getAll(): array
    {
        $files = glob($this->_directory.'/*.json');
        $objects = [];
        foreach ($files as $file) {
            $basename = basename($file);
            $id = substr($basename, 0, strlen($basename) - 5);
            $objects[$id] = json_decode($file);
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
}