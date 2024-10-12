<?php
    echo ("Iniciar Ejecucion<br>");
    // incluir carpetas con esta funcion
    include_once("com/cart/cart.php");
    include_once("com/users/users.php");
    include_once("com/users/connectedUser.php");

    // addToCart("2",10);
    // userRegister('16458786A','12345','aure');
    loginUser("aure",'12345');



    // $action = $_GET['action'];
    // switch ($action)
    // {
    //     case 'action':
    //         echo "Haciendo login";
    //         break;
    //     case 'add_to_cart':
    //         echo 'Añadir al carro';
    //         break;
    //     default:
    //         echo "Invalid action!";
    // }

    
    ///      Borrar Nodo
    // $xml = simplexml_load_file("xmlDB/test.xml");
    // foreach($xml->xpath("//*[@id='11']") as $node)
    // {
    //     unset($node[0]);

    // }
    // $xml->asXML('xmlDB/test.xml')
?>