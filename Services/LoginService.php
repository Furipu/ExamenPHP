<?php
/**
 * Created by PhpStorm.
 * User: vanda
 * Date: 12/06/2018
 * Time: 22:04
 */

include "../Repositories/StudentRepository.php";
include "../Repositories/LoginRepository.php";
class LoginService
{
    private $repo;
    private $studentRepo;
    static $instance;

    public function __construct()
    {
        $this->repo = new LoginRepository();
        $this->studentRepo = new StudentRepository();
    }


    /**
     * check if the password is correct
     * @param array $login
     * @pre password need to be a string
     * @post get a studentid or null back
     */
    public function CheckIfLoginCorrect (array $login){
        $result = $this->repo->CheckIfLoginCorrect($login);
        $isAdmin = $this->studentRepo->Isadmin($login["uname"]);
        session_start();
        if (count($result) == 0) {
            echo "De user of het paswoord is niet correct!!";
        }elseif($isAdmin[0] != 0){
            $cookie_name = "loginAdmin";
            $cookie_value = $result[1];
            setcookie($cookie_name, $cookie_value, 0, "/");
            $_COOKIE["loginAdmin"] = $cookie_value;
        }else{
            $cookie_name = "loginStudent";
            $cookie_value = $result[1];
            setcookie($cookie_name, $cookie_value, 0, "/");
            $_COOKIE["loginStudent"] = $cookie_value;
        }
    }

    /**
     * Get an instance of LoginService
     *
     * @return LoginService
     */
    static function GetInstance(){
        if (self::$instance == null){
            return new LoginService();
        }
        else return self::$instance;

    }



}