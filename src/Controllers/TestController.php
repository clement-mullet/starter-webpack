<?php
namespace App\Controllers;

use App\Repositories\UserRepository;
use App\dbManager;


class TestController {
    public static function testPdo(){
        $pdo = dbManager::getpdo();
        if($pdo){
            $userRepository = new UserRepository($pdo);
            $users = $userRepository->getAll();
            var_dump($users);
    
        }
    }

    public static function getUserById($id){
        $pdo = dbManager::getpdo();
        if($pdo){
            $userRepository = new UserRepository($pdo);
            $user = $userRepository->findById($id);
            if($user){
                var_dump($user->getLastName());
            }
            else {
                echo "No user found";
            }
        }
    }
    
    public static function getUserByEmail(){
        $pdo = dbManager::getpdo();
        if($pdo){
            $userRepository = new UserRepository($pdo);
            $user = $userRepository->findByEmail("zauts95@gmail.com");
            var_dump($user);
    
        }
    }

}