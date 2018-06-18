<?php
/**
 * Class ResultaatRepository
 *
 * Connection to database for Resultaat
 */
class ResultaatRepository extends BaseRepository
{


    /**
     * Get all the values of resultaat from the database
     *
     * @return array

     */
    public function GetAllResults() :array
    {
        $conn = $this->GetConnection();
        $getResults = $conn->prepare("SELECT student.StudentID, student.Voornaam, student.Naam, student.IsAdmin, leervak.LeerVakID, leervak.Naam, resultaat.ResultaatID,  resultaat.cijfer
          FROM resultaat inner join student
          on resultaat.studentid = student.studentid
          inner join leervak
          on resultaat.leervakid = leervak.leervakid");
        $getResults->execute();
        $Results = $getResults->fetchAll();
        return $Results;
    }

    /**
     * get result for a specific student from database
     *
     * @param string $email
     * @return array
     * @pre email as string
     * @post return a list of resultaat
     */
    public function GetResultForAStudent(string $email): array{
        $conn = $this->GetConnection();
        $getResults = $conn->prepare("SELECT student.StudentID, student.Voornaam, student.Naam, student.IsAdmin, leervak.LeerVakID, leervak.Naam, resultaat.ResultaatID,  resultaat.cijfer
          FROM resultaat inner join student
          on resultaat.studentid = student.studentid
          inner join leervak
          on resultaat.leervakid = leervak.leervakid where email = ?");
        $getResults->execute([$email]);
        $Results = $getResults->fetchAll();
        return $Results;
    }

    /**
     * Update the values of resultaat in the database
     *
     * @param array $resultaat
     * @pre an array of resultaat
     */
    public function UpdateResults(array $resultaat) {
        $conn = $this->GetConnection();
        $sql = $conn->prepare('UPDATE resultaat SET Cijfer = ? WHERE ResultaatID = ?');
        foreach ($resultaat as $id=> $cijfer){
            $sql->execute([$cijfer, $id ]);
        }
    }

    /**
     * Create the results when a new student is created
     *
     * @param int $studentId
     * @param array $leervakken
     * @pre an id of student as int and an array of leervakken objects
     */
    public function CreateResultsWithNewStudent(int $studentId, array $leervakken){
        $conn = $this->GetConnection();
        $sqlCreateResultaat = $conn->prepare('INSERT INTO resultaat (StudentID, LeerVakID, Cijfer) values (?,?, -1)');
        foreach ($leervakken as $value){
            $sqlCreateResultaat->execute([$studentId, $value[0]]);
        }
    }

    /**
     * Create the results for the new leervak
     *
     * @param int $leervakId
     * @param array $studenten
     * @pre an leervak id as int and an array of student objects
     */
    public function CreateResultWithNewLeervak(int $leervakId, array $studenten){
        $conn = $this->GetConnection();
        $sqlCreateResultaat = $conn->prepare('INSERT INTO resultaat (LeerVakID,StudentID, Cijfer) values (?,?,-1)');
        foreach ($studenten as $value){
            $sqlCreateResultaat->execute([$leervakId, $value]);
        }
    }
}


