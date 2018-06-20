<?php


/**
 * Class Student
 *
 * Create model for Student
 * @property string $_firstName -> first name of a student
 * @property string $_name -> last name of a student
 * @property string $_email -> email of a student
 * @property int $_id -> id of a student
 * @property boolean $_isAdmin -> boolean to check if person is admin or student
 */
class Student
{

    private $_firstName;
    private $_name;
    private $_email;
    private $_id;
    private $_isAdmin;

    /**
     * set firstname of student
     *
     * @param string $firstName
     * @pre firstname as a string
     */
    public function SetFirstName(string $firstName){
        $this->_firstName = $firstName;
    }

    /**
     * set name of student
     *
     * @param string $name
     * #pre name as a string
     */
    public function SetName(string $name){
        $this->_name = $name;
    }

    /**
     * set email of student
     *
     * @param string $email
     * @pre email as string
     */
    public function SetEmail(string $email){
        $this->_email = $email;
    }

    /**
     * set id of student
     *
     * @param int $id
     * @pre id as int
     */
    public function SetId(int $id)
    {
        $this->_id = $id ;
    }

    /**
     * set isadmin of student
     *
     * @param bool $isAdmin
     * @pre isadmin as bool
     */
    public function SetIsAdmin(bool $isAdmin){
        $this->_isAdmin = $isAdmin;
    }

    /**
     * get the firstname of student
     *
     * @return string
     */
    public function GetFirstName():string {
        return $this->_firstName;
    }

    /**
     * get the name of student
     *
     * @return string
     */
    public function GetName():string{
        return $this->_name;
    }

    /**
     * get the email of student
     *
     * @return string
     */
    public function GetEmail():string{
        return $this->_email;
    }

    /**
     * get id of student
     *
     * @return int
     */
    public function GetId(): int
    {
        return $this->_id;
    }

    /**
     * get isadmin of student
     *
     * @return mixed
     */
    public function GetIsAdmin(){
        return $this->_isAdmin;
    }
}