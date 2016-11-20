<?php

/**
 * Created by PhpStorm.
 * User: one
 * Date: 14.11.2016
 * Time: 5:29
 */
class usersClass
{
    static $userType = 'defaultLogin';
    static $pdo;
    static $userData = [];

    /**
     * @param mixed $pdo
     */
    public static function setPdo(pdo $pdo)
    {
        self::$pdo = $pdo;
    }

    public function __construct(pdo $pdo)
    {
        self::$pdo = $pdo;
    }

    /**
     * @return string
     */
    public static function getUserType()
    {
        return self::$userType;
    }


    static public function getUserById($idUser)
    {
        if (is_numeric($idUser)) {
            $sql = "SELECT * FROM mix_user WHERE id=?";
            $sth = self::$pdo->prepare($sql);
            $sth->execute([$idUser]);
            if ($sth->rowCount() > 0) {
                return $sth->fetch();
            }
        }
        return false;
    }

    static public function getUsersData()
    {
        if (isset($_COOKIE['id']) and is_numeric($_COOKIE['id']) and isset($_COOKIE['hash'])) {
            $userData = self::getUserById($_COOKIE['id']);
            if (($userData['users_hash'] !== $_COOKIE['hash']) or ($userData['id'] !== $_COOKIE['id'])) {
                self::clearUserCookie();
            } else {
                self::setUserCookie($userData['id'], $userData['users_hash']);
                self::$userType = $userData['group'];
                self::$userData = $userData;
            }
        }
    }

    static public function enterUser()
    {
        if (isset($_POST['submit'])) {
            $userData = self::getUserByEmail($_POST['email']);
            if ($userData !== false) {
                if (self::checkUserPassword($_POST['password'], $userData['password']) !== false) {
                    $hash = self::updateUserHash($userData['id']);
                    self::setUserCookie($userData['id'], $hash);
                    return true;
                }
                return "PASSWORD_ERROR"; //"Вы ввели неправильный пароль"
            }
            return "ERROR_EMAIL";
        }
        return false;
    }

    static protected function getUserByEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $sql = "SELECT
                          password,id
                FROM mix_user
                WHERE email = ?";
            $sth = self::$pdo->prepare($sql); //подготовленное выражение
            $sth->execute([$email]);
            if ($sth->rowCount() > 0) {
                return $sth->fetch();
            }
        }
        return false;
    }

    static protected function checkUserPassword($passwordEnter, $passwordUser)
    {
        $password = self::getEncryptedPassword($passwordEnter);
        if ($passwordUser === $password) {
            return true;
        }
        return false;
    }

    static protected function getEncryptedPassword($password)
    {
        $salt = "b013387bbebcbedb4";
        $password = trim($password);
        $password = sha1($salt . $password);
        return $password;
    }

    static protected function updateUserHash($idUser)
    {
        $hash = md5(self::generateCode(10));
        $sql = "UPDATE mix_user SET users_hash=:hash WHERE id=:id";
        $sth = self::$pdo->prepare($sql);
        $sth->execute(['hash' => $hash, 'id' => $idUser]);
        return $hash;
    }

    static protected function setUserCookie($idUser, $hash)
    {
        setcookie("id", $idUser, time() + 60 * 60 * 24 * 30, '/');
        setcookie("hash", $hash, time() + 60 * 60 * 24 * 30, '/');
    }

    static public function clearUserCookie()
    {
        setcookie("id", '', time() - 3600 * 24 * 30 * 12, '/');
        setcookie("hash", '', time() - 3600 * 24 * 30 * 12, '/');
    }

    static public function generateCode($length = 12)
    {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPRQSTUVWXYZ0123456789";
        $code = "";
        $clen = strlen($chars) - 1;
        while (strlen($code) < $length) {

            $code .= $chars[mt_rand(0, $clen)];
        }
        return $code;
    }

    static public function addNewUser($arrayData)
    {
        if (!filter_var($arrayData['email'], FILTER_VALIDATE_EMAIL) and self::getUserByEmail($arrayData['email']) !== false) {
            return false;
        }
        $arrayData['password'] = self::getEncryptedPassword($arrayData['password']);
        $sql = "INSERT INTO mix_user (`username`, `password`,`email`, `group`,`fpassword`,`dateReg`) VALUE (:username,:password,:email,:group,:fpassword, now())";
        $sth = self::$pdo->prepare($sql);
        $sth->execute($arrayData);
        return true;
    }

    static public function updateUser($arrayData)
    {
        $sql = "UPDATE mix_user SET username=:username, `group`=:group, status=:status WHERE id=:id";
        $sth = self::$pdo->prepare($sql);
        $sth->execute($arrayData);
        return true;
    }

    static public function getAllUsersBySchool($idSchool)
    {
        $sth = self::$pdo->query("SELECT mix_user.id AS value, mix_user.username AS name
                                    FROM mix_user
                                    WHERE mix_user.group='user'
        ORDER BY username;");


        /*$sth = self::$pdo->query("
        SELECT mix_user.id AS value, mix_user.username AS name
        FROM mix_user, mix_user_school
        WHERE mix_user.id = mix_user_school.id_user AND mix_user_school.id_school = ?
        ORDER BY username");*/
       /* $sth->execute([$idSchool]);*/

        if ($sth->rowCount() == 0) {
            return [];
        } else {
            $mass = [];
            while ($row = $sth->fetch()) {
                $mass[] = $row;
            }
            return $mass;
        }
    }


    static public function getAllUsers()
    {
        $sth = self::$pdo->query("SELECT
              mix_user.id,
              mix_user.username,
              mix_user.`group`,
              mix_user.email,
              mix_user.status,
              mix_user.fpassword
            FROM mix_user
            ORDER BY username;
        ");
        if ($sth->rowCount() == 0) {
            return [];
        } else {
            $mass = [];
            while ($row = $sth->fetch()) {
                $mass[] = $row;
            }
            return $mass;
        }
    }
    static public function deleteUserById($idUser){
        $sql = "DELETE FROM mix_user WHERE id=?";
        $sth = self::$pdo->prepare($sql);
        $sth->execute([$idUser]);
    }
}