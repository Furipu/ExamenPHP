<?php
/**
 * Created by PhpStorm.
 * User: vanda
 * Date: 04/06/2018
 * Time: 21:00
 */
include ("../Repositories/StudentRepository.php");
include ("../Repositories/LeervakRepository.php");
include ("../Repositories/ResultaatRepository.php");
include ("../Model/Student.php");
include ("../Model/LeerVak.php");
include ("../Model/Resultaat.php");

/**
 * Class ResultaatService
 *
 * Business logic for Resultaat
 */
class ResultaatService
{

    private $RawList = array();
    private $ListOfResults = array();
    public $ListOfResultsObjects = array();
    private $ListForHeading = array();
    private $repo;
    private $repoStudent;

    /**
     * make an instance of the class
     *
     * ResultaatService constructor.
     */
    public function __construct()
    {
        $this->repo = new ResultaatRepository();
        $this->repoStudent = new StudentRepository();
    }


    /**
     *push all the results, students and courses in an array
     */
    private function GetAllResults()
    {
        $this->RawList = $this->repo->GetAllResults();
        foreach ($this->RawList as $value) {
            $student = new Student();
            $student->SetId($value["StudentID"]);
            $student->SetFirstName($value["Voornaam"]);
            $student->SetName($value["Naam"]);
            if ($value["IsAdmin"] === "0"){
                $student->SetIsAdmin(false);
            }else{
                $student->SetIsAdmin(true);
            }

            $leervak = new LeerVak();
            $leervak->SetId($value["LeerVakID"]);
            $leervak->SetCourse($value[5]);
            $resultaat = new Resultaat();
            $resultaat->SetId($value["ResultaatID"]);
            $resultaat->SetGrade($value["cijfer"]);
            $resultaat->SetStudent($student);
            $resultaat->SetLeerVak($leervak);
            //$this->ListOfResults[$value['StudentID']][] = $value;
            if (!$student->GetIsAdmin()){
                $this->ListOfResults[$value['StudentID']][] = $value;
            }
        }
        $firstElement = reset($this->ListOfResults);
        foreach ($firstElement as $item) {
            array_push($this->ListForHeading, $item[5]);
        }
    }

    /**
     * fill the list with a specific student
     *
     * @param string $email
     * @pre email as a string
     *
     */
    public function GetResultForAStudent(string $email){
        $this->RawList = $this->repo->GetResultForAStudent($email);
        foreach ($this->RawList as $value) {
            $student = new Student();
            $student->SetId($value["StudentID"]);
            $student->SetFirstName($value["Voornaam"]);
            $student->SetName($value["Naam"]);
            if ($value["IsAdmin"] === "0"){
                $student->SetIsAdmin(false);
            }else{
                $student->SetIsAdmin(true);
            }
            $leervak = new LeerVak();
            $leervak->SetId($value["LeerVakID"]);
            $leervak->SetCourse($value[5]);
            $resultaat = new Resultaat();
            $resultaat->SetId($value["ResultaatID"]);
            $resultaat->SetGrade($value["cijfer"]);
            $resultaat->SetStudent($student);
            $resultaat->SetLeerVak($leervak);
            $this->ListOfResults[$value['StudentID']][] = $value;
            array_push($this->ListOfResultsObjects, $resultaat);
        }

        foreach ($this->ListOfResults as $item) {
            foreach ($item as $element){
                array_push($this->ListForHeading, $element[5]);
            }

        }
    }

    /**
     * push the headers and body in the array to use in the table view
     *
     * @return array
     */
    public function GetHeaderandBody(): array{
        $this->GetAllResults();
        $arrayWithHeaderAndBody = array();
        array_push($arrayWithHeaderAndBody, $this->ListForHeading);
        array_push($arrayWithHeaderAndBody, $this->ListOfResults);
        return $arrayWithHeaderAndBody;
    }

    /**
     * Get an array of header and result for 1 student
     *
     * @param string $email
     * @return array
     * @pre email as string
     * @post an array with the headers and body for table
     */
    public function GetHeaderAndBodyForAStudent(string $email) :array{
        $this->GetResultForAStudent($email);
        $student = $this->repoStudent->GetStudentIdByEmail($email);
        $arrayWithHeaderAndBody = array();
        array_push($arrayWithHeaderAndBody, $this->ListForHeading);
        foreach ($this->ListOfResults as $value){
            foreach ($value as $element){
                if ($element[0] === $student[0]){
                    array_push($arrayWithHeaderAndBody, $element);
                }

            }
        }
        return $arrayWithHeaderAndBody;
    }

    /**
     * send the update result to the repository
     *
     * @param array $data
     * @pre an array of results
     */
    public function UpdateResult(array $data){
        $this->repo->UpdateResults($data);
        header("Refresh:0");
    }

}