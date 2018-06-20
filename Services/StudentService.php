<?php
/**
 * Created by PhpStorm.
 * User: vanda
 * Date: 04/06/2018
 * Time: 22:49
 */

include ("../Model/Student.php");

include ("../Model/Password.php");
include ("../Repositories/StudentRepository.php");
include ("../Repositories/LeervakRepository.php");
include ("../Repositories/ResultaatRepository.php");
/**
 * Class StudentService
 *
 * Business logic for Student
 */
class StudentService
{

    /**
     * Create a new object Student and send it to the repository
     *
     * @param array $student
     * @pre an array of students
     */
    public function CreateStudent(array $student){
        $newStudent = new Student();
        $newPassword = new Password();
        $newPassword->SetPassword($student["paswoord"]);
        $newStudent->SetFirstName($student["voornaam"]);
        $newStudent->SetName($student["naam"]);
        $newStudent->SetEmail($student["email"]);
        if ($student["isadminorstudent"] === "isadmin"){
            $newStudent->SetIsAdmin(true);
        }else{
            $newStudent->SetIsAdmin(false);
        }
        $Repo = new StudentRepository();
        $studentToCompare = $Repo->GetStudentByEmail($newStudent->GetEmail());
        if ($studentToCompare){
            echo ("Er bestaat reeds een student met dit email adres");
        }else{
            $leervakken = $this->GetActiveLeervakken();
            $studentId = $Repo->CreateStudent($newStudent, $newPassword);
            $this->CreateResultaat($studentId, $leervakken);
            header('Location:index.php');
        }
    }

    /**
     * Get all the courses from the repository
     *
     * @return array
     */
    public function GetActiveLeervakken(){
        $repo = new LeervakRepository();
        return $repo->GetLeervakken();
    }

    /**
     * get all the results from the repository
     *
     * @param int $studentId
     * @param array $leervak
     * @pre a student id as int and an array of leervak objects
     */
    public function CreateResultaat(int $studentId, array $leervak){
        $repo = new ResultaatRepository();
        $repo->CreateResultsWithNewStudent($studentId, $leervak);
    }


}