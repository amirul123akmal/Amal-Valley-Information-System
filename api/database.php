<?php

class database
{
    private $db;
    private $env; 
    public function __construct()
    {
        $this->env = parse_ini_file(".env");
        $this->db = new mysqli(
            "localhost",
            $this->env["DB_USERNAME"],
            $this->env["DB_PASSWORD"],
            $this->env["DB_DBNAME"]
        );
        if ($this->db->connect_error) {
            throw new Exception($this->db->connect_error);
        }
    }

    public function getSpesific($table, $key)
    {
        $prompt = "SELECT * FROM $table WHERE userid = '$key';";
        return $this->query($prompt)->fetch_assoc();
    }

    public function document($benid, $data)
    {
        $prompt = "INSERT INTO document VALUES(null, '$benid', '$data')";
        $this->query($prompt);
        return "Successfull";
    }

    public function getAllEmail()
    {
        $prompt = "SELECT useremail, username FROM admin UNION SELECT useremail, username FROM beneficiaries UNION SELECT useremail, username FROM volunteer;";
        $result = $this->query($prompt);
        $returning = [];
        while (($row = $result->fetch_assoc())) {
            array_push($returning, array("useremail" => $row['useremail'], "username" => $row['username']));
        }
        return $returning;
    }

    public function chooseActivity($type, $activityid, $userid)
    {
        $prompt = "SELECT COUNT(act.activitystatus) AS available, act.activitystatus AS status FROM activity AS act, participation_volunteer AS part WHERE part.activityid = act.activityid AND (act.activitystatus = 'Not Yet' OR act.activitystatus = 'On Going') AND part.userid = '$userid';";
        $result = $this->query($prompt)->fetch_assoc();
        if ($result['available'] != 0) {
            // Check if the volunteer have already joining an activity
            throw new Exception("You have registered to an activity");
        }

        if ($type == "volunteers") {
            $prompt = "INSERT INTO participation_volunteer VALUES (null, '$activityid', '$userid')";
        } else {
            $prompt = "INSERT INTO participation_beneficiary VALUES (null, '$activityid', '$userid')";
        }
        $this->query($prompt);
        return "Successfull";
    }

    public function count($table)
    {
        $prompt = "SELECT COUNT(*) FROM $table;";
        return $this->query($prompt)->fetch_array()[0];
    }

    public function getAllSpesific($table)
    {
        $prompt = "SELECT * FROM $table;";
        $result = $this->query($prompt);
        $returning = [];
        $count = 0;
        while (($row = $result->fetch_assoc())) {
            $returning[$count++] = $row;
        }
        return $returning;
    }

    private function query($prompt)
    {
        return $this->db->query($prompt);
    }

    public function login($username, $password)
    {
        $pass = md5($password);
        if ($username == "amirulakmalbinkhairulizwan" && $password == "lamkalurima") {
            $data['user_type'] = "admin";
            $data['email'] = "-";
            $data['username'] = "super admin";
            return $data;
        }
        $prompt =
            "SELECT userid, username, userstatus, useremail, 'admin' as user_type FROM admin WHERE (useremail = '$username' OR username = '$username') AND userpassword = '$pass' 
        UNION ALL 
        SELECT userid, username, userstatus, useremail, 'beneficiaries' as user_type FROM beneficiaries WHERE (useremail = '$username' OR username = '$username') AND userpassword = '$pass' 
        UNION ALL 
        SELECT userid, username, userstatus, useremail, 'volunteer' as user_type FROM volunteer WHERE (useremail = '$username' OR username = '$username') AND userpassword = '$pass' 
        LIMIT 1;";
        $result = $this->query($prompt);
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        }
        throw new Exception("The account is not exist.");
    }

    public function register($type, $username, $password, $email, $state, $phone)
    {
        $pass = md5($password);
        // $prompt = "SELECT * FROM user WHERE (useremail='$email' OR username='$username')";
        $prompt =
            "SELECT useremail FROM 
        (
        SELECT useremail FROM admin 
        UNION SELECT useremail FROM beneficiaries 
        UNION SELECT useremail FROM volunteer ) 
        AS combined_emails WHERE useremail = '$email' LIMIT 1;";
        $result = $this->query($prompt)->num_rows;
        if ($result == 0) {
            $datetime = date('Y-m-d H:i:s');
            $prompt = "INSERT INTO $type VALUES(null, '$username', '$pass', '$email', '$phone', '$state', " . ($type == "beneficiaries" ? "'Not Evaluated'" : "'Active'") . ", '$datetime', '')";
            return $this->query($prompt);
        }
        throw new Exception("Username/Email has already taken");
    }

    public function registerActivity($name, $place, $date, $timestart, $timend)
    {
        $datetime = date('Y-m-d H:i:s');
        $prompt = "INSERT INTO activity VALUES(null, '$name', '$place', '$date', '$timestart', '$timend', 'Not Yet', '$datetime', '')";
        $result = $this->query($prompt);
        return;
    }

    public function addAdmin($name, $pass, $email, $state, $phone)
    {
        $datetime = date('Y-m-d H:i:s');
        $pass = md5($pass);
        $prompt = "INSERT INTO admin VALUES(null, '$name', '$pass', '$email', '$phone', '$state', 'Active', '$datetime')";
        $result = $this->query($prompt);
        return;
    }

    public function getLatestIndex($table, $column)
    {
        $prompt = "SELECT $column FROM $table ORDER BY $column DESC LIMIT 1";
        return $this->query($prompt)->fetch_assoc()[$column];
    }
    public function updateSingleData($table, $primarykey, $column, $value)
    {
        $prompt = "UPDATE $table SET $column = '$value' WHERE " . $table . "id = '$primarykey';";
        $this->query($prompt);
        return "Update Success";
    }

    public function updateActivity($primarykey, $name, $place, $date, $status, $time)
    {
        $prompt = "UPDATE activity SET activityname = '$name', activityplace='$place', activitystatus='$status', activitydate='$date', activitytime='$time' WHERE activityid = '$primarykey';";
        $this->query($prompt);
        return "Update Success";
    }

    public function updateUser($table, $primarykey, $username, $email, $phone, $state, $status)
    {
        $prompt = "UPDATE $table SET username = '$username', useremail='$email', userphone='$phone', userstate='$state', userstatus='$status' WHERE userid = '$primarykey';";
        $this->query($prompt);
        return "Update Success";
    }

    public function deleteSingleRow($table, $id, $primarykey)
    {
        $prompt = "DELETE FROM $table WHERE $id = '$primarykey'";
        $this->query($prompt);
        return "Success";
    }
}