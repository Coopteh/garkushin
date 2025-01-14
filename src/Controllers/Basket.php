<?php

namespace Controllers;

class Basket
{
    public function add()
    {
    
        session_start();

        if (isset($_POST['id'])) {
            $product_id = $_POST['id'];

            if (!isset($_SESSION['basket'])) {
                $_SESSION['basket'] = [];
            }

            if (isset($_SESSION['basket'][$product_id])) {
                $_SESSION['basket'][$product_id]['quantity']++;
            } else {
                $_SESSION['basket'][$product_id] = [
                    'quantity' => 1
                ];
            }
            $sum = 0;
            foreach ($_SESSION['basket'] as $intem) {
                if ($intem['quantity'] > 0) {
                    $sum += $intem['quantity'];
                }
            }
            
            $_SESSION['flash'] = "Заказ успешно добавлен в корзину!";
            header('Location: /products');
            return "";
        }
    }
    public function clear()
    {
        session_start();
        $_SESSION['basket'] = [];
        header('Location:/orders');
        return "";
    }
}