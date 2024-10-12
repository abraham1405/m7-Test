<?php

    function addToCart( string $idProducte, int $Quantity)
    {
        echo ("AddToCart <br>");
        echo"<br>";
        echo ($idProducte);

        $cart = getCart();

        $item = $cart->addChild('Product');
        $item->addChild('idProducto', $idProducte);
        $item->addChild('quantity', $Quantity);

        $itemPrice = $item->addChild('productItems');
        $itemPrice->addChild('Price','10');
        $itemPrice->addChild('currency','EU');

        $cart->asXML('xmlDB/cart.xml');
    }


    function getCart(){
        $file = 'xmlDB/cart.xml';
        if (file_exists($file))
        {
            echo "\t detecta";
            $cart = simplexml_load_file($file);
        } else{
            echo "\t lo crea";
            $cart = new SimpleXMLElement('<cart></cart>');
        }
        return $cart;
    }


?>