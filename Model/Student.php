<?php


/**
 * Class Student
 *
 * Create model for Student
 */
class Student
{

    private $FirstName;
    private $Name;
    private $Email;
    private $ID;
    private $IsAdmin;

    /**
     * set firstname of student
     *
     * @param string $firstName
     * @pre firstname as a string
     */
    public function SetFirstName(string $firstName){
        $this->FirstName = $firstName;
    }

    /**
     * set name of student
     *
     * @param string $name
     * #pre name as a string
     */
    public function SetName(string $name){
        $this->Name = $name;
    }

    /**
     * set email of student
     *
     * @param string $email
     * @pre email as string
     */
    public function SetEmail(string $email){
        $this->Email = $email;
    }

    /**
     * set id of student
     *
     * @param int $id
     * @pre id as int
     */
    public function SetID(int $id)
    {
        $this->ID = $id ;
    }

    /**
     * set isadmin of student
     *
     * @param bool $isAdmin
     * @pre isadmin as bool
     */
    public function SetIsAdmin(bool $isAdmin){
        $this->IsAdmin = $isAdmin;
    }

    /**
     * get the firstname of student
     *
     * @return string
     */
    public function GetFirstName():string {
        return $this->FirstName;
    }

    /**
     * get the name of student
     *
     * @return string
     */
    public function GetName():string{
        return $this->Name;
    }

    /**
     * get the email of student
     *
     * @return string
     */
    public function GetEmail():string{
        return $this->Email;
    }

    /**
     * get id of student
     *
     * @return int
     */
    public function GetID(): int
    {
        return $this->ID;
    }

    /**
     * get isadmin of student
     *
     * @return mixed
     */
    public function GetIsAdmin(){
        return $this->IsAdmin;
    }
}