<?php

namespace framework;

require "JsonRepository.php";

class UserRepository extends JsonRepository
{
    public function getByUsername($username) {
        $users = $this->getAll();
        foreach ($users as $user) {
            if ($user->login == $username)
                return $user;
        }
        return null;
    }
}