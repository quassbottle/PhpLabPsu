<?php

namespace framework;

interface Repository
{
    public function getById($id);
    public function getAll();
    public function add($entity);
    public function removeById($id);
    public function updateById($id, $entity);
}