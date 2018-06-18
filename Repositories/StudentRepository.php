<?php
/**
 * Created by PhpStorm.
 * User: vanda
 * Date: 04/06/2018
 * Time: 22:50
 */
include "BaseRepository.php";
/**
 * Class StudentRepository
 *
 * Connection to database for Student
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
        $sql = 'SELECT StudentID FROM student';
        $data =  $conn->query($sql)->fetchAll(PDO::FETCH_COLUMN);
        return $data;
    }

    /**
     * Get a student id by email from database
     *
     * @param string $email
     * @return mixed
     * @pre an email as string
     * @post a student if student available
     */
    public function GetStudentIdByEmail(string $email) {
        $conn = $this->GetConnection();
        $sql = 'SELECT StudentID FROM student where email = ?';
        $data = $conn->prepare($sql);
        $data->execute([$email]);
        $result = $data->fetch();
        return$result;

    }

    /**
     * Get all the Students Email from database
     *
     * @param string $email
     * @return bool
     * @pre an email as string
     * @post a boolean if student exist
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
     * @param Student $student, password $paswoord
     * @return int
     * @pre a student object and a  password object
     * @post the id of the student created
     */
    public function CreateStudent(Student $student, Password $paswoord) :int{
        $conn = $this->GetConnection();
        $voornaam = $student->GetFirstName();
        $naam = $student->GetName();
        $email = $student->GetEmail();
        $isAdmin = $student->GetIsAdmin();
        $pw = $paswoord->GetPassword();
        $sqlCreateStudent = 'INSERT INTO student (Voornaam, Naam, Email, IsAdmin) VALUES (?,?,?,?)';
        $conn->prepare($sqlCreateStudent)->execute([$voornaam, $naam, $email, $isAdmin]);
        $studentID =  $conn->lastInsertId();
        $sqlCreatePassword = 'INSERT INTO paswoord (StudentID, Paswoord) values (?,?)';
        $conn->prepare($sqlCreatePassword)->execute([$studentID, $pw]);
        return $studentID;

    }

    /**
     * Search if member is admin or student
     *
     * @param string $email
     * @return array
     * @pre int as id of member
     * @post array with the student
     */
    public function Isadmin(string $email) :array{
        $conn = $this->GetConnection();
        $sql = 'SELECT IsAdmin from student where email = ?';
        $result = $conn->prepare($sql);
        $result->execute([$email]);
        $result =  $result->fetch();
        if ($result === false){
            $emptyArray = [];
            return $emptyArray;
        }else{
            return $result;
        }

    }





}