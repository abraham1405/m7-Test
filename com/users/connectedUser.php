<?php
    include_once("users.php");

    //-----------------------------------------------Funciones Principales-----------------------
    function loginUser($user,$password)  {
        $LoginUser = _geteUsers();
        $file = 'xmlDB/users.xml';
        foreach($LoginUser->Account as $dataSelected)
        {
            echo "<br>Verificando usuario y password...<br>";
            
            if((string)$dataSelected->user == $user && (string)$dataSelected->password == $password)
            {
                echo "<br>User Conected<br>";
                if(_existUser($password,$user, $file))
                {
                    echo "usuario Connecteadooo";
                    InsertLogin($user,$password, $LoginUser);
                }
            }
        }

    }

    // ---------------------------------Funciones que son llamadas por otras--------------------

    function InsertLogin($user,$password, $LoginUser)
    {
        $ConectedUser = $LoginUser->addChild('connected');
        $ConectedUser->addChild('user', $user);
        $ConectedUser->addChild('password', $password);
        $ConectedUser->addChild('date', date('Y-m-d H:i:s'));

        $LoginUser->asXML('xmlDB/connectedUser.xml');
    }
?>