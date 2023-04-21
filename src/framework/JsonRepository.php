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

    public function add($entity)
    {
        $json = json_encode($entity);
        file_put_contents($this->_directory, $json);
    }

    public function removeById($id)
    {

    }

    public function updateById($id, $entity)
    {

    }

//    private function appendJson($json) {
//        $handle = @fopen($this->_file, 'a+');
//
//        if ($handle) {
//            fseek($handle, -1, SEEK_END);
//            fwrite($handle, ',', 1);
//            fwrite($handle, $json);
//            fclose($handle);
//        }
//    }
}