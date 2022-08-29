<?php

namespace App\Repositories;

use PDO;
use PDOException;
use App\Models\User;

class UserRepository
{

    protected $pdo;
    public function __construct($pdo = null)
    {
        $this->pdo = $pdo;
    }

    function getAll(): ?array
    {
        if ($this->pdo) {
            $req  = $this->pdo->prepare("SELECT * FROM user");
            $req->execute([]);

            $users = $req->fetchAll(PDO::FETCH_CLASS, User::class);
            return $users;
        }
        return null;
    }

    function findById($id)
    {
        if ($this->pdo) {
            $req  = $this->pdo->prepare("SELECT * FROM user where id = ?");
            $req->execute([
                $id,
            ]);

            $user = $req->fetchObject(User::class);
            return $user;
        }
        return null;
    }

    function findByEmail($email)
    {
        if ($this->pdo) {
            $req  = $this->pdo->prepare("SELECT * FROM user where email = ?");
            $req->execute([
                $email,
            ]);
            $user = $req->fetchObject(User::class);
            return $user;
        }
        return null;
    }

    function InsertOne($user)
    {
        if ($this->pdo) {
            try {
                $req  = $this->pdo->prepare(
                    "INSERT INTO user 
                    ( role_id, firstname, lastname, email, password, phone, email_confirmed, created_at ) 
                    VALUES (:role_id, :firstname, :lastname, :email, :password, :phone,  :email_confirmed, :created_at )"
                );
                $req->execute(array(
                    'role_id' => $user->getRole_id(),
                    'firstname' => $user->getFirstname(),
                    'lastname' => $user->getLastname(),
                    'email'     => $user->getEmail(),
                    'password'  => $user->getPassword(),
                    'phone'  => $user->getPhone(),
                    'email_confirmed' => 0,
                    'created_at' => $user->getCreated_at(),
                ));
                print_r($user);
                
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    }

    function updatePassword($user){
        if ($this->pdo) {
            try {
                $req  = $this->pdo->prepare(
                    "UPDATE user SET password=:password "
                );
                $req->execute(array(
                    'password' => $user->getPassword(),
                ));
                
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    }


    /**
     * @return mixed
     */
    function getTable()
    {
        return $this->table;
    }

    /**
     * @param mixed $table 
     * @return UserRepository
     */
    function setTable($table): self
    {
        $this->table = $table;
        return $this;
    }
}
