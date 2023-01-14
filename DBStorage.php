<?php

class DBStorage
{

    /**
     * @var PDO
     */
    private $conn;

    public function __construct()
    {
        try {
            $this->conn = new PDO("mysql:host=localhost;dbname=db_prosettings", "root", "dtb456");
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    public function login( $username, $password) {
        $sql = "SELECT * FROM users where username = '".$username."'";

        $res = $this->conn->query($sql);
        $res->fetchAll();
        $res->execute();
        foreach($res as $row) {
            if(isset($row) && $row["password"] == $password) {
                return true;
            }

        }
        return false;
    }
    public function updateUser($username, $firstName,  $lastName, $team, $cpu, $gpu, $ram, $monitor, $mouse, $keyboard, $headset, $mousepad, $dpi, $sensitivity, $crosshair, $viewmodel) {

        if(empty($dpi)) {
            $dpi = 0;
        }
        if(empty($sensitivity)) {
            $sensitivity = 0;
        }
        $sql = "UPDATE users SET firstName = '".$firstName."', lastName = '".$lastName."', team = '".$team."', cpu = '".$cpu."', gpu = '".$gpu."', ram = '".$ram."', monitor = '".$monitor."', mouse = '".$mouse."', keyboard = '".$keyboard."', headset = '".$headset."', mousepad = '".$mousepad."', dpi = '".$dpi."', sensitivity = '".$sensitivity."', crosshair = '".$crosshair."', viewmodel = '".$viewmodel."' where username = '".$username."' ";

        $res = $this->conn->prepare($sql);
        $res->execute();
    }
    public function deleteUser($username) {
        $sql = "DELETE FROM users WHERE username = '".$username."'";
        $res = $this->conn->prepare($sql);
        $res->execute();
        Auth::logout();
    }
    public function createUser($username, $firstName, $lastName, $password) {
        if($this->readTable($username)['username'] == $username) {
            return false;
        } else {
            $sql = "INSERT INTO users (username, firstName, lastName, password) VALUES(?,?,?,?)";
            $res = $this->conn->prepare($sql);
            $res->execute([$username, $firstName, $lastName, $password]);
            return true;
        }

    }
    public function readTable($username) {
        $sql = "SELECT * FROM users WHERE username = '".$username."'";
        $res = $this->conn->query($sql);
        $res->fetchAll();
        $res->execute();
        foreach($res as $row) {
            if(isset($row)) {
                return $row;
            }

        }
        $arr["username"] = "";
        return $arr;
    }

    public function readGames() {
        $res = $this->conn->prepare("SELECT * FROM game");
        $res->execute();
        return $res->fetchAll();
    }

    public function readGame($ID_game) {
        $res = $this->conn->prepare("SELECT * FROM game where ID_game=? ");
        $res->execute([$ID_game]);
        return $res->fetch();
    }

    public function readPlayers($ID_game) {
        $res = $this->conn->prepare("SELECT * FROM user join mouse on(user.login = mouse.id_user) where mouse.ID_game=?");
        $res->bindParam(1, $ID_game);
        $res->execute();

        return $res;
    }

    public function readPlayer($login) {
        $res = $this->conn->prepare("SELECT * FROM user where login=? ");
        $res->execute([$login]);
        return $res->fetch();
    }
    public function readGamesByPlayer($login) {
        $res = $this->conn->prepare("SELECT * FROM game where ID_game in (
                                           select ID_game from mouse where id_user=?) ");
        $res->bindParam(1, $login);
        $res->execute();
        return $res;
    }

    public function readMouse($login, $ID_game) {
        $res = $this->conn->prepare("SELECT * FROM mouse where id_user=? and ID_game=? ");
        $res->bindParam(1, $login);
        $res->bindParam(2, $ID_game);
        $res->execute();
        return $res->fetch();
    }

    public function readCrosshair($login, $ID_game) {
        $res = $this->conn->prepare("SELECT * FROM crosshair where id_user=? and ID_game=? ");
        $res->bindParam(1, $login);
        $res->bindParam(2, $ID_game);
        $res->execute();
        return $res->fetch();
    }

    public function readViewmodel($login, $ID_game) {
        $res = $this->conn->prepare("SELECT * FROM viewmodel where id_user=? and ID_game=? ");
        $res->bindParam(1, $login);
        $res->bindParam(2, $ID_game);
        $res->execute();
        return $res->fetch();
    }
    public function readVideo($login, $ID_game) {
        $res = $this->conn->prepare("SELECT * FROM video where id_user=? and ID_game=? ");
        $res->bindParam(1, $login);
        $res->bindParam(2, $ID_game);
        $res->execute();
        return $res->fetch();
    }



}