<?php

    include_once "database.php";

    function insertUser($email, $username, $password){
        global $db;
        $Salt = generate_salt();
        $Algo = '6';
        $Rounds = '5000';
        $CryptSalt = '$' . $Algo . '$rounds=' . $Rounds . '$' . $Salt;
        $hashedpw = crypt($password, $CryptSalt);
        $query = "INSERT INTO user(email, username, password) VALUES(:email, :username, :password)";
        $PreparedStatement = $db->prepare($query);
        $PreparedStatement->bindValue(":email", $email);
        $PreparedStatement->bindValue(":username", $username);
        $PreparedStatement->bindValue(":password", $hashedpw);
        $success = $PreparedStatement->execute();
        if($success)
            return mysql_insert_id();
        else
            return false;
    }

    function login($email, $password){
        global $db;
        $query = "SELECT * FROM user WHERE email = :email";
        $PreparedStatement = $db->prepare($query);
        $PreparedStatement->bindValue(":email", $email);
        if($PreparedStatement->execute()){
            $user = $PreparedStatement->fetch();
            if(crypt($password, $user["password"]) == $user["password"]){
                return $user;
            }
        } else
            return false;
    }

    function generate_salt() {
        $dummy = array_merge(range('0', '9'));
        mt_srand((double)microtime()*1000000);
        for ($i = 1; $i <= (count($dummy)*2); $i++)
        {
            $swap = mt_rand(0,count($dummy)-1);
            $tmp = $dummy[$swap];
            $dummy[$swap] = $dummy[0];
            $dummy[0] = $tmp;
        }
        return sha1(substr(implode('',$dummy),0,9));
    }

?>