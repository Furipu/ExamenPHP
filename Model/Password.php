<?php

/**
 * Class Password
 *
 * Create model for Password
 */
class Password
{
    private $StudentId;
    private $password;

    /**
     * set the studentid
     *
     * @param int $id
     * @pre get an int as id
     *
     */
    public function SetStudentID(int $id){
        $this->StudentId = $id;
    }

    /**
     * set password
     *
     * @param string $password
     * @pre get a string as password
     */
    public function SetPassword (string $password){
        $this->password = $password;
    }

    /**
     * return the studentId
     *
     * @return int
     */
    public function GetStudentId():int{
        return $this->StudentId;
    }

    /**
     * return the password as string
     *
     * @return string
     */
    public function GetPassword() :string{
        return $this->password;
    }

}