<?php
namespace App\Services;

use App\dbManager;
use App\Repositories\UserRepository;
use Exception;
use phpDocumentor\Reflection\DocBlock\Tags\Example;

use function PHPUnit\Framework\throwException;

/**
 * Implements every function related to authentification
 * Maybe we can use this to get user data from connected user for exemple
 * Also handles login
 */
class AuthService {

    private $user;
    public $error;
    private $session;

    public function __construct($user = null)
    {
        $this->user = $user;
        $this->error = null;
    }

    public function authorize(){
        
    }

    /**
     * Authenticate a user
     * We use this to know if the user's input is a valid user in our database
     * Add authenticated user to 
     */
    public function authenticate($user_email, $user_password){
        $pdo = dbManager::getpdo();
        $userRepository = new UserRepository($pdo);
        $user = $userRepository->findByEmail($user_email);
        if($user){
            if( password_verify($user_password,$user->getPassword())){
                // Add authenticated user to AuthService Properties
                $this->setUser($user);
                if (session_status() === PHP_SESSION_NONE) {
                    session_start();
                }
                $_SESSION['logged_in'] = true;
                $_SESSION['user_id'] = $this->user->getId();
                $_SESSION['user_data'] = [
                    "email" => $this->user->getEmail(),
                    "firstname" => $this->user->getFirstname(),
                    "lastname" => $this->user->getLastname(),
                ];
                $this->session = $_SESSION;
            }
            else {
                $this->error = "Email or password is incorrect";
                throw new Exception("Email or password is incorrect");
            }
        }
        else {
            $this->error = "User not found";
            throw new Exception("User not found");
        }
    }




	/**
	 * @return mixed
	 */
	function getUser() {
		return $this->user;
	}
	
	/**
	 * @param mixed $user 
	 * @return AuthService
	 */
	function setUser($user): self {
		$this->user = $user;
		return $this;
	}
	/**
	 * @return mixed
	 */
	function getSession() {
		return $this->session;
	}
	
	/**
	 * @param mixed $session 
	 * @return AuthService
	 */
	function setSession($session): self {
		$this->session = $session;
		return $this;
	}
}