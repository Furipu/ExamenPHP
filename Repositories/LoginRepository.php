<?php
/**
 * Created by PhpStorm.
 * User: vanda
 * Date: 08/06/2018
 * Time: 22:42
 */
class LoginRepository extends BaseRepository
{
    /**
     * check if the password belong to student in database
     * @param array $login
     * @return array
     * @pre password need to be a string
     * @post get a studentid or null back
     */
    public function CheckIfLoginCorrect (array $login) :array {
        $conn = $this->GetConnection();
        $email = $login["uname"];
        $password = $login["psw"];
        $getResults = $conn->prepare("SELECT student.StudentID, student.email, student.IsAdmin
          FROM paswoord inner join student 
          on paswoord.StudentID = student.StudentID
          where Email = ? and Paswoord = ?");
        $getResults->execute([$email,$password]);
        $results = $getResults->fetch();
        if ($results === false){
            $emptyArray = [];
            return $emptyArray;
        }else{
            return $results;
        }

    }
}