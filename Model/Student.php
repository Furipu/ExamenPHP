<?php
/**
 * Created by PhpStorm.
 * User: vanda
 * Date: 03/06/2018
 * Time: 00:32
 */

class Student
{
    /**
     * @var
     */
    private $FirstName;
    /**
     * @var
     */
    private $Name;
    /**
     * @var
     */
    private $Email;
    /**
     * @var
     */
    private $ID;

    /**
     * @param string $firstName
     */
    public function SetFirstName(string $firstName){
        $this->FirstName = $firstName;
    }

    /**
     * @param string $name
     */
    public function SetName(string $name){
        $this->Name = $name;
    }

    /**
     * @param string $email
     */
    public function SetEmail(string $email){
        $this->Email = $email;
    }

    /**
     * @param int $id
     */
    public function SetID(int $id)
    {
        $this->ID = $id ;
    }

    /**
     * @return string
     */
    public function GetFirstName():string {
        return $this->FirstName;
    }

    /**
     * @return string
     */
    public function GetName():string{
        return $this->Name;
    }

    /**
     * @return string
     */
    public function GetEmail():string{
        return $this->Email;
    }

    /**
     * @return int
     */
    public function GetID(): int
    {
        return $this->ID;
    }
}