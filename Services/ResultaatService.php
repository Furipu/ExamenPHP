<?php
/**
 * Created by PhpStorm.
 * User: vanda
 * Date: 04/06/2018
 * Time: 21:00
 */

class ResultaatService
{

    private $RawList = array();
    private $ListOfResults = array();
    public $ListOfResultsObjects = array();
    private $ListForHeading = array();
    private $repo;

    /**
     * make an instance of the class
     *
     * ResultaatService constructor.
     */
    public function __construct()
    {
        $this->repo = new ResultaatRepository();
    }


    /**
     *push all the results, students and courses in an array
     */
    private function GetAllResults()
    {
        $this->RawList = $this->repo->GetAllResults();
        foreach ($this->RawList as $value) {
            $student = new Student();
            $student->SetID($value[0]);
            $student->SetFirstName($value[1]);
            $student->SetName($value[2]);
            $leervak = new LeerVak();
            $leervak->SetID($value[3]);
            $leervak->SetCourse($value[4]);
            $resultaat = new Resultaat();
            $resultaat->SetID($value[5]);
            $resultaat->SetGrade($value[6]);
            $resultaat->SetStudent($student);
            $resultaat->SetLeerVak($leervak);
            $this->ListOfResults[$value['StudentID']][] = $value;
            array_push($this->ListOfResultsObjects, $resultaat);
        }

        foreach ($this->ListOfResults[1] as $item) {
            array_push($this->ListForHeading, $item[4]);
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
     * send the update result to the repository
     *
     * @param array $data
     */
    public function UpdateResult(array $data){
        $this->repo->UpdateResults($data);
        header("Refresh:0");
    }

}