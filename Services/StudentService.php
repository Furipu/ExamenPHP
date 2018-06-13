<?php
/**
 * Created by PhpStorm.
 * User: vanda
 * Date: 04/06/2018
 * Time: 22:49
 */
include ("../Repositories/StudentRepository.php");
include ("../Repositories/LeervakRepository.php");
include ("../Repositories/ResultaatRepository.php");
include ("../Model/Student.php");

/**
 * Class StudentService
 */
class StudentService
{

    /**
     * Create a new object Student and send it to the repository
     *
     * @param array $student
     */
    public function CreateStudent(array $student){
        $newStudent = new Student();
        $newStudent->SetFirstName($student["voornaam"]);
        $newStudent->SetName($student["naam"]);
        $newStudent->SetEmail($student["email"]);
        $Repo = new StudentRepository();
        $studentToCompare = $Repo->GetStudentByEmail($newStudent->GetEmail());
        if ($studentToCompare){
            echo ("Er bestaat reeds een student met dit email adres");
        }else{
            $leervakken = $this->GetActiveLeervakken();
            $studentId = $Repo->CreateStudent($newStudent);
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
     */
    public function CreateResultaat(int $studentId, array $leervak){
        $repo = new ResultaatRepository();
        $repo->CreateResultsWithNewStudent($studentId, $leervak);
    }
}