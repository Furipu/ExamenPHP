<?php

/**
 * Class Password
 *
 * Create model for Password
 * @property int $_studentId -> id of the student
 * @property  string $_password -> password of the student
 */
class Password
{
    private $_studentId;
    private $_password;

    /**
     * set the studentid
     *
     * @param int $id
     * @pre get an int as id
     *
     */
    public function SetStudentID(int $id){
        $this->_studentId = $id;
    }

    /**
     * set password
     *
     * @param string $_password
     * @pre get a string as password
     */
    public function SetPassword (string $_password){
        $this->_password = $_password;
    }

    /**
     * return the studentId
     *
     * @return int
     */
    public function GetStudentId():int{
        return $this->_studentId;
    }

    /**
     * return the password as string
     *
     * @return string
     */
    public function GetPassword() :string{
        return $this->_password;
    }

}