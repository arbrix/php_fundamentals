<?php
 
class SampleFramework
{
    protected static $_connect;

    protected static function initConnection()
    {
        if (self::$_connect === null) {
            self::$_connect = mysql_connect("localhost", "vint", "vint");
            mysql_query('use vint');
            /* Проверка подключения */ 
            if (!self::$_connect) {
                echo "Unable to connect to DB: " . mysql_error();
                exit;
            }

        }
        return self::$_connect;
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
        
        $dbLink = self::initConnection();
        $resultSet = array();
        /* Select queries return a resultset */
        $result = mysql_query($sql);
        if (!$result) {
            echo "Could not successfully run query ($sql) from DB: " . mysql_error();
            exit;
        }
        if (mysql_num_rows($result) == 0) {
            echo "No rows found, nothing to print so am exiting";
            exit;
        }

        /* associative array */
        while($row = mysql_fetch_assoc($result)) {
            $resultSet[] = $row;
        }
        /* free result set */
        mysql_free_result($result);
        return $resultSet;

    }

    public static function addUser()
    {

    }
}

