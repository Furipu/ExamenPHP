<?php
/**
 * Created by PhpStorm.
 * User: vanda
 * Date: 12/06/2018
 * Time: 22:04
 */
include ("../Repositories/LoginRepository.php");

class LoginService
{
    private $repo;

    public function __construct()
    {
        $this->repo = new LoginRepository();
    }


    /**
     * check if the password is correct
     * @param array $login
     * @return bool
     * @pre password need to be a string
     * @post get a studentid or null back
     */
    public function CheckIfLoginCorrect (array $login) :bool{
        $result = $this->repo->CheckIfLoginCorrect($login);
        return $this->IncludePageWithLogin($result);
    }

    /**
     * include the tabelviewpage if login is correct
     *
     * @param array $login
     * @return bool
     */
    public function IncludePageWithLogin(array $login) :bool{
        if (empty($login)){
            echo ("Password or username is not correct!");
            return false;
        }else{
            include ("../View/TabelView.php");
            return true;
        }
    }
}