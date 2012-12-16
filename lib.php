<?php
 
class SampleFramework
{
    protected static $_mysqli;

    protected static function getDb()
    {
        if (self::$_mysqli === null) {
            self::$_mysqli = new mysqli("localhost", "vint", "vint", "vint");
            /* Проверка подключения */ 
            if (mysqli_connect_errno()) {
                printf("Ошибка подключения: %s\n", mysqli_connect_error());
                exit();
            }
        }
        return self::$_mysqli;
    }

    public static function hashPass($pass)
    {
        return sha1($pass . ':jl;weurPOIFK#joiufw8209SJKFqw0983urmsku8#u');
    }

    public static function loadUserList()
    {
        $sql = 'SELECT `user`.*, COUNT(`user_task`.id) as task_count 
                FROM `user`, `user_task` 
                WHERE `user`.`id` = `user_task`.`user_id` 
                GROUP BY `user`.`id` 
                ORDER BY task_count';
        
        $db = self::getDb();
        $resultSet = array();
        /* Select queries return a resultset */
        if ($result = $db->query($sql)) {
            /* associative array */
            while($row = $result->fetch_array(MYSQLI_ASSOC)) {

                $resultSet[] = $row;
            }
            /* free result set */
            $result->close();
        } 
        return $resultSet;

    }

    public static function addUser()
    {

    }
}

