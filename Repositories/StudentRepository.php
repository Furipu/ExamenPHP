<?php
/**
 * Created by PhpStorm.
 * User: vanda
 * Date: 04/06/2018
 * Time: 22:50
 */
include ("../Repositories/BaseRepository.php");

/**
 * Class StudentRepository
 */
class StudentRepository extends BaseRepository
{
    /**
     * Get the all the studentsId from database
     *
     * @return array
     */
    public function GetStudentsId(){
        $conn = $this->GetConnection();
        $sql = "SELECT StudentID FROM student";
        $data =  $conn->query($sql)->fetchAll(PDO::FETCH_COLUMN);
        return $data;
    }

    /**
     * Get all the Students Email from database
     *
     * @param string $email
     * @return bool
     *
     */
    public function GetStudentByEmail (string $email) : bool {
        $conn = $this->GetConnection();
        $sql = 'SELECT Email FROM student where Email = ?';
        $getStudent = $conn->prepare($sql);
        $getStudent->execute([$email]);
        $student = $getStudent->fetch();
        if ($student){
            return true;
        }
        return false;

    }

    /**
     * insert a new student in the database
     *
     * @param Student $student
     * @return int
     */
    public function CreateStudent(Student $student) :int{
        $conn = $this->GetConnection();
        $voornaam = $student->GetFirstName();
        $naam = $student->GetName();
        $email = $student->GetEmail();
        $sqlCreateStudent = 'INSERT INTO student (Voornaam, Achternaam, Email) VALUES (?,?,?)';
        $conn->prepare($sqlCreateStudent)->execute([$voornaam, $naam, $email]);
        return $conn->lastInsertId();

    }



}