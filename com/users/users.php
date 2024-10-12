<?php
    //-----------------------------------------------Funciones Principales-----------------------

    function userRegister($dni, $password, $user)
    {
        $createUser = _geteUsers();
        $file = 'xmlDB/users.xml';
        if(_existUser($dni,$user, $file))
        {
            echo "<br>existee el usuariooo<br>";
        }
        else
        {
            _createUser($dni,$password,$user,$createUser);
        }
    }

    // ---------------------------------Funciones que son llamadas por otras--------------------

    function _geteUsers()
    {
        $file = 'xmlDB/users.xml';
        if (file_exists($file))
        {
            echo "<br>detecta<br>";
            $createUser = simplexml_load_file($file);
        } else{
            echo "<br>lo crea<br>";
            $createUser = new SimpleXMLElement('<Accounts></Accounts>');
        }
        return $createUser;
    }

    function _createUser($dni, $password, $user,$createUser)
    {
        
        $Account = $createUser->addChild('Account');
        $Account->addChild('user', $user);
        $Account->addChild('password', $password);
        $Account->addChild('dni', $dni);

        // crear hijos de hijos (nietos)
        $dateUser = $Account->addChild('extraData');
        $dateUser->addChild('nacionality','Spain');
        $dateUser->addChild('age','20');

        $createUser->asXML('xmlDB/users.xml');
    }

    function _existUser($password,$user,$file)
    {
        echo "<br>Entrando....<br>";
        
        $createUser = simplexml_load_file($file);
    
        foreach($createUser->Account as $dataSelected)
        {
            echo "<br>Verificando usuario y dni...<br>";
            
            if((string)$dataSelected->user == $user && (string)$dataSelected->password == $password)
            {
                echo "<br>El usuario existe!!!!!!!!<br>";
                return true; 
            }
        }
        
        echo "El usuario no existe :(";
        return false; 

    }
?>