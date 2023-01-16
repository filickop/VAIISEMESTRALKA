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


    public function updateUser($login, $name,  $surname, $country, $birthdate) {

            $res = $this->conn->prepare("UPDATE user SET name=?, surname=?, country=?, birthdate=? where login=?");
            $res->bindParam(1, $name);
            $res->bindParam(2, $surname);
            $res->bindParam(3, $country);
            $res->bindParam(4, $birthdate);
            $res->bindParam(5, $login);
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
    public function deleteConfig($login, $ID_game) {
        $res = $this->conn->prepare("DELETE FROM mouse WHERE ID_user=? and ID_game=?");
        $res->bindParam(1, $login);
        $res->bindParam(2, $ID_game);
        $res->execute();

        $res = $this->conn->prepare("DELETE FROM crosshair WHERE ID_user=? and ID_game=?");
        $res->bindParam(1, $login);
        $res->bindParam(2, $ID_game);
        $res->execute();

        $res = $this->conn->prepare("DELETE FROM key_bindings WHERE ID_user=? and ID_game=?");
        $res->bindParam(1, $login);
        $res->bindParam(2, $ID_game);
        $res->execute();

        $res = $this->conn->prepare("DELETE FROM video WHERE ID_user=? and ID_game=?");
        $res->bindParam(1, $login);
        $res->bindParam(2, $ID_game);
        $res->execute();

        $res = $this->conn->prepare("DELETE FROM viewmodel WHERE ID_user=? and ID_game=?");
        $res->bindParam(1, $login);
        $res->bindParam(2, $ID_game);
        $res->execute();
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

    public function update_createMouse($login, $game, $DPI,  $sensitivity, $zoom_sens, $hz, $windows_sens, $raw_input, $mouse_acc) {

        if($this->readMouse($login, $game) == null) {
            $res = $this->conn->prepare("INSERT INTO mouse SET DPI=?, sensitivity=?, zoom_sens=?, hz=?, windows_sens=?, raw_input=?, mouse_acc=?, id_user=?, ID_game=?");

            $res->bindParam(1, $DPI);
            $res->bindParam(2, $sensitivity);
            $res->bindParam(3, $zoom_sens);
            $res->bindParam(4, $hz);
            $res->bindParam(5, $windows_sens);
            $res->bindParam(6, $raw_input);
            $res->bindParam(7, $mouse_acc);
            $res->bindParam(8, $login);
            $res->bindParam(9, $game);
            $res->execute();
        } else {
            $res = $this->conn->prepare("UPDATE mouse SET DPI=?, sensitivity=?, zoom_sens=?, hz=?, windows_sens=?, raw_input=?, mouse_acc=? where ID_user=? and ID_game=?");
            $res->bindParam(1, $DPI);
            $res->bindParam(2, $sensitivity);
            $res->bindParam(3, $zoom_sens);
            $res->bindParam(4, $hz);
            $res->bindParam(5, $windows_sens);
            $res->bindParam(6, $raw_input);
            $res->bindParam(7, $mouse_acc);
            $res->bindParam(8, $login);
            $res->bindParam(9, $game);

            $res->execute();
        }

    }
    public function update_createCrosshair($login, $game, $drawoutline, $alpha, $red, $green, $blue, $dot, $gap, $size, $style, $thickness, $sniper_width) {

        if($this->readCrosshair($login, $game) == null) {
            $res = $this->conn->prepare("INSERT INTO crosshair SET drawoutline=?, alpha=?, red=?, green=?, blue=?, dot=?, gap=?, size=?, style=?, thickness=?, sniper_width=?, id_user=?, ID_game=?");

            $res->bindParam(1, $drawoutline);
            $res->bindParam(2, $alpha);
            $res->bindParam(3, $red);
            $res->bindParam(4, $green);
            $res->bindParam(5, $blue);
            $res->bindParam(6, $dot);
            $res->bindParam(7, $gap);
            $res->bindParam(8, $size);
            $res->bindParam(9, $style);
            $res->bindParam(10, $thickness);
            $res->bindParam(11, $sniper_width);
            $res->bindParam(12, $login);
            $res->bindParam(13, $game);
            $res->execute();
        } else {
            $res = $this->conn->prepare("UPDATE crosshair SET drawoutline=?, alpha=?, red=?, green=?, blue=?, dot=?, gap=?, size=?, style=?, thickness=?, sniper_width=? where ID_user=? and ID_game=?");

            $res->bindParam(1, $drawoutline);
            $res->bindParam(2, $alpha);
            $res->bindParam(3, $red);
            $res->bindParam(4, $green);
            $res->bindParam(5, $blue);
            $res->bindParam(6, $dot);
            $res->bindParam(7, $gap);
            $res->bindParam(8, $size);
            $res->bindParam(9, $style);
            $res->bindParam(10, $thickness);
            $res->bindParam(11, $sniper_width);
            $res->bindParam(12, $login);
            $res->bindParam(13, $game);
            $res->execute();
        }

    }
    public function update_createViewmodel($login, $game, $fov, $offsetx, $offsety, $offsetz, $righthand, $recoil) {

        if($this->readViewmodel($login, $game) == null) {
            $res = $this->conn->prepare("INSERT INTO viewmodel SET fov=?, offsetx=?, offsety=?, offsetz=?, righthand=?, recoil=?, id_user=?, ID_game=?");

            $res->bindParam(1, $fov);
            $res->bindParam(2, $offsetx);
            $res->bindParam(3, $offsety);
            $res->bindParam(4, $offsetz);
            $res->bindParam(5, $righthand);
            $res->bindParam(6, $recoil);
            $res->bindParam(7, $login);
            $res->bindParam(8, $game);
            $res->execute();
        } else {
            $res = $this->conn->prepare("UPDATE viewmodel SET fov=?, offsetx=?, offsety=?, offsetz=?, righthand=?, recoil=? where ID_user=? and ID_game=?");

            $res->bindParam(1, $fov);
            $res->bindParam(2, $offsetx);
            $res->bindParam(3, $offsety);
            $res->bindParam(4, $offsetz);
            $res->bindParam(5, $righthand);
            $res->bindParam(6, $recoil);
            $res->bindParam(7, $login);
            $res->bindParam(8, $game);
            $res->execute();
        }

    }
    public function update_createVideo($login, $game, $resolution, $aspect_ratio, $scalling_mode, $brightness, $display_mode, $global_shadow_qua,
                                        $model_detail, $texture_streaming, $effect_detail, $shader_detail, $boost_player_c, $multicore_ren,
                                        $multisampling, $fxaa, $texture_filtering, $v_sync, $motion_blur, $triple_monitor) {

        if($this->readVideo($login, $game) == null) {
            $res = $this->conn->prepare("INSERT INTO video SET resolution=?, aspect_ratio=?, scalling_mode=?, brightness=?, display_mode=?,
                                                                        global_shadow_qua=?, model_detail=?, texture_streaming=?, effect_detail=?,  
                                                                        shader_detail=?, boost_player_c=?, multicore_ren=?, multisampling=?, fxaa=?,
                                                                        texture_filtering=?, v_sync=?, motion_blur=?, triple_monitor=?,  
                                                                        id_user=?, ID_game=?");

            $res->bindParam(1, $resolution);
            $res->bindParam(2, $aspect_ratio);
            $res->bindParam(3, $scalling_mode);
            $res->bindParam(4, $brightness);
            $res->bindParam(5, $display_mode);

            $res->bindParam(6, $global_shadow_qua);
            $res->bindParam(7, $model_detail);
            $res->bindParam(8, $texture_streaming);
            $res->bindParam(9, $effect_detail);

            $res->bindParam(10, $shader_detail);
            $res->bindParam(11, $boost_player_c);
            $res->bindParam(12, $multicore_ren);
            $res->bindParam(13, $multisampling);
            $res->bindParam(14, $fxaa);

            $res->bindParam(15, $texture_filtering);
            $res->bindParam(16, $v_sync);
            $res->bindParam(17, $motion_blur);
            $res->bindParam(18, $triple_monitor);

            $res->bindParam(19, $login);
            $res->bindParam(20, $game);
            $res->execute();
        } else {
            $res = $this->conn->prepare("UPDATE video SET resolution=?, aspect_ratio=?, scalling_mode=?, brightness=?, display_mode=?,
                                                                global_shadow_qua=?, model_detail=?, texture_streaming=?, effect_detail=?,  
                                                                shader_detail=?, boost_player_c=?, multicore_ren=?, multisampling=?, fxaa=?,
                                                                texture_filtering=?, v_sync=?, motion_blur=?, triple_monitor=?
                                                                where ID_user=? and ID_game=?");

            $res->bindParam(1, $resolution);
            $res->bindParam(2, $aspect_ratio);
            $res->bindParam(3, $scalling_mode);
            $res->bindParam(4, $brightness);
            $res->bindParam(5, $display_mode);

            $res->bindParam(6, $global_shadow_qua);
            $res->bindParam(7, $model_detail);
            $res->bindParam(8, $texture_streaming);
            $res->bindParam(9, $effect_detail);

            $res->bindParam(10, $shader_detail);
            $res->bindParam(11, $boost_player_c);
            $res->bindParam(12, $multicore_ren);
            $res->bindParam(13, $multisampling);
            $res->bindParam(14, $fxaa);

            $res->bindParam(15, $texture_filtering);
            $res->bindParam(16, $v_sync);
            $res->bindParam(17, $motion_blur);
            $res->bindParam(18, $triple_monitor);

            $res->bindParam(19, $login);
            $res->bindParam(20, $game);
            $res->execute();
        }

    }

    public function update_createkeyBinding($login, $game, $slot1, $slot2, $slot3, $slot4, $slot5, $slot6, $slot7, $slot8, $crouch, $jump,
                                            $walk_sprint, $use_object) {

        if($this->readKeyBinds($login, $game) == null) {
            $res = $this->conn->prepare("INSERT INTO key_bindings SET slot1=?, slot2=?, slot3=?, slot4=?, slot5=?, slot6=?, slot7=?, slot8=?, 
                                                                            crouch=?, jump=?, walk_sprint=?, use_object=?, id_user=?, ID_game=?");

            $res->bindParam(1, $slot1);
            $res->bindParam(2, $slot2);
            $res->bindParam(3, $slot3);
            $res->bindParam(4, $slot4);
            $res->bindParam(5, $slot5);
            $res->bindParam(6, $slot6);
            $res->bindParam(7, $slot7);
            $res->bindParam(8, $slot8);

            $res->bindParam(9, $crouch);
            $res->bindParam(10, $jump);
            $res->bindParam(11, $walk_sprint);
            $res->bindParam(12, $use_object);
            $res->bindParam(13, $login);
            $res->bindParam(14, $game);
            $res->execute();
        } else {
            $res = $this->conn->prepare("UPDATE key_bindings SET slot1=?, slot2=?, slot3=?, slot4=?, slot5=?, slot6=?, slot7=?, slot8=?, 
                                                                    crouch=?, jump=?, walk_sprint=?, use_object=? where ID_user=? and ID_game=?");

            $res->bindParam(1, $slot1);
            $res->bindParam(2, $slot2);
            $res->bindParam(3, $slot3);
            $res->bindParam(4, $slot4);
            $res->bindParam(5, $slot5);
            $res->bindParam(6, $slot6);
            $res->bindParam(7, $slot7);
            $res->bindParam(8, $slot8);

            $res->bindParam(9, $crouch);
            $res->bindParam(10, $jump);
            $res->bindParam(11, $walk_sprint);
            $res->bindParam(12, $use_object);
            $res->bindParam(13, $login);
            $res->bindParam(14, $game);
            $res->execute();
        }

    }


}