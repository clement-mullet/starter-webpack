<?php

namespace App\Models;

use Exception;
use PDOException;

class User implements \JsonSerializable
{

	protected $id;
    protected $role_id;
    protected $email;
    protected $password;
    protected $firstname;
    protected $lastname;
    protected $phone;
	protected $email_confirmed;
    protected $created_at;


    

    public function __construct()
    {
        $this->created_at = date('Y-m-d H:i:s', time());
        $this->email_confirmed = false;
		$this->role_id = 2;
   
    }
	public function jsonSerialize()
    {
        $user = get_object_vars($this);

        return $user;
    }

	public function hydrate(array $data){
		foreach ($data as $key => $value) {
			// On récupère le nom du setter correspondant à l'attribut
			$setter = 'set'.ucfirst($key);
				
			// Si le setter correspondant existe.
			if (method_exists($this, $setter)) {
			  // On appelle le setter
			  $this->$setter($value);
			}
		  }
	}


    /***************************
     * -------- SETTERS ---------
     ***************************/

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setEmail($email)
    {

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) :
            throw new Exception('Email incorrect');
        endif;

        $this->email = $email;
    }

    /**
     * @param mixed $password 
     * @return User
     */
    function setPassword($password): self
    {
        $this->password = $password;
        return $this;
    }


    /***************************
     * -------- GETTERS ---------
     ***************************/

    public function getId()
    {
        return $this->id;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }


    /**
     * Hashing with bcrypt as it is default
     * Bcrypt was not designed for encrypting large amounts of data. It is best implemented for passwords 
     * However SHA-256 is better for large amounts of data,
     * SHA would hash data faster but is more vulnerable to brute force attacks
     * 
     * In our case, for password hashing, we are then going for bcrypt.
     */
    public function hashPassword()
    {
        $this->setPassword(password_hash($this->password, PASSWORD_DEFAULT));
    }

	/**
	 * @return mixed
	 */
	function getFirstname() {
		return $this->firstname;
	}
	
	/**
	 * @param mixed $firstname 
	 * @return User
	 */
	function setFirstname($firstname): self {
		$this->firstname = $firstname;
		return $this;
	}
	/**
	 * @return mixed
	 */
	function getLastname() {
		return $this->lastname;
	}
	
	/**
	 * @param mixed $lastname 
	 * @return User
	 */
	function setLastname($lastname): self {
		$this->lastname = $lastname;
		return $this;
	}
	/**
	 * @return mixed
	 */
	function getPhone() {
		return $this->phone;
	}
	
	/**
	 * @param mixed $phone 
	 * @return User
	 */
	function setPhone($phone): self {
		$this->phone = $phone;
		return $this;
	}
	/**
	 * @return mixed
	 */
	function getEmail_confirmed() {
		return $this->email_confirmed;
	}
	
	/**
	 * @param mixed $email_confirmed 
	 * @return User
	 */
	function setEmail_confirmed($email_confirmed): self {
		$this->email_confirmed = $email_confirmed;
		return $this;
	}
	/**
	 * @return mixed
	 */
	function getCreated_at() {
		return $this->created_at;
	}
	
	/**
	 * @param mixed $created_at 
	 * @return User
	 */
	function setCreated_at($created_at): self {
		$this->created_at = $created_at;
		return $this;
	}
	/**
	 * @return mixed
	 */
	function getRole_id() {
		return $this->role_id;
	}
	
	/**
	 * @param mixed $role_id 
	 * @return User
	 */
	function setRole_id($role_id): self {
		$this->role_id = $role_id;
		return $this;
	}
}
