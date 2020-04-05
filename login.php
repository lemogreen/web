<?php
    
    //$mysqli = new mysqli('localhost', 'root', '', 'news');	
    function generateCode($length=6) 
    {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPRQSTUVWXYZ0123456789";
        $code = "";
        $clen = strlen($chars) - 1;
        while (strlen($code) < $length)
        {
                $code .= $chars[mt_rand(0,$clen)];
        }
        return $code;
    }


    if (isset($_POST['login']))
    {
        if(isset($_POST['password']))
        {
            $login_str = $_POST['login'];
            $query = "SELECT `id`, `password`, `t` FROM users WHERE name = '$login_str' "; 
            if($result = $link->query($query))
            {
                $data = $result->fetch_assoc();
            
        // Сравниваем пароли
                if($data['password'] === md5(md5(($_POST['password']))))
                {
                    $_SESSION['name'] = $login_str;
                    $_SESSION['FLAG_login'] = TRUE; //unset - exit
                    // Генерируем случайное число и шифруем его
                    //$hash = md5(generateCode(10));
                    // Записываем в БД новый хеш авторизации и IP
                    //$add_hash = "UPDATE users SET hash ='$hash' WHERE `id`='$data[id]' LIMIT 1"; 
                    //mysqli_query($link, $add_hash);
                    //echo 'Hello, '.$x; // отлично!
                    //print ( 'Пользователь '  .$login_str.  ' подключился<br/>');
                    $_SESSION['FLAG_ADM'] = FALSE;
                    if ($data['t'] == 1)
                    {
                        $_SESSION['FLAG_ADM'] = TRUE;    
                    }
                    
                }


            }
            else
            {
                print "Вы ввели неправильный логин/пароль";
            }
        }
    }
        
?>
