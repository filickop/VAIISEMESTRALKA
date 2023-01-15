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
    public function login( $login, $password) {
        $res = $this->conn->prepare("SELECT * FROM user where login=?");
        $res->bindParam(1, $login);
        $res->execute();
        $acc = $res->fetch();
            if($acc != null && $acc["password"] == $password) {
                return true;
            }
        return false;
    }
    public function createUser($login, $name, $surname, $password)
    {
        if ($this->findUser($login)["login"] == $login) {
            return false;
        } else {
            $res = $this->conn->prepare("INSERT INTO user (login, name, surname, password) VALUES(?,?,?,?)");
            $res->bindParam(1, $login);
            $res->bindParam(2, $name);
            $res->bindParam(3, $surname);
            $res->bindParam(4, $password);
            $res->execute();
            return true;
        }
    }

    public function findUser($login) {
        $res = $this->conn->prepare("SELECT * FROM user where login=? ");
        $res->bindParam(1, $login);
        $res->execute();
        $acc = $res->fetch();
        if($acc == null) {
            $acc["login"] = "";
        }
        return $acc;
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
    public function deleteUser($login) {
        $res = $this->conn->prepare("DELETE FROM mouse WHERE ID_user=?");
        $res->bindParam(1, $login);
        $res->execute();

        $res = $this->conn->prepare("DELETE FROM crosshair WHERE ID_user=?");
        $res->bindParam(1, $login);
        $res->execute();

        $res = $this->conn->prepare("DELETE FROM key_bindings WHERE ID_user=?");
        $res->bindParam(1, $login);
        $res->execute();

        $res = $this->conn->prepare("DELETE FROM video WHERE ID_user=?");
        $res->bindParam(1, $login);
        $res->execute();

        $res = $this->conn->prepare("DELETE FROM viewmodel WHERE ID_user=?");
        $res->bindParam(1, $login);
        $res->execute();

        $res = $this->conn->prepare("DELETE FROM user WHERE login=?");
        $res->bindParam(1, $login);
        $res->execute();

        Auth::logout();
    }

    public function readGames() {
        $res = $this->conn->prepare("SELECT * FROM game");
        $res->execute();
        return $res->fetchAll();
    }

    public function readGame($ID_game) {
        $res = $this->conn->prepare("SELECT * FROM game where ID_game=? ");
        $res->bindParam(1, $ID_game);
        $res->execute();
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
        $res->bindParam(1, $login);
        $res->execute();
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

    public function readKeyBinds($login, $ID_game) {
        $res = $this->conn->prepare("SELECT * FROM key_bindings where id_user=? and ID_game=? ");
        $res->bindParam(1, $login);
        $res->bindParam(2, $ID_game);
        $res->execute();
        return $res->fetch();
    }



}