<?php

class Product
{
    public static function getDataProduct($product_id)
    {
        $mysqli = dbConnect();
        $products = $mysqli->prepare("SELECT p.id, p.name, p.price, c.name as category, p.created_at, p.updated_at FROM products p JOIN categories c ON p.category_id = c.id WHERE p.id=$product_id");
        $products->execute();
        return $products->get_result()->fetch_all();
    }

    public static function getAllProductsByCategoryId($category_id)
    {
        $mysqli = dbConnect();
        $products = $mysqli->prepare("SELECT p.id, p.name, p.price, c.name as category, p.created_at, p.updated_at FROM products p JOIN categories c ON p.category_id = c.id WHERE p.category_id=$category_id");
        $products->execute();
        return $products->get_result()->fetch_all();
    }
    public static function getProductCount($category_id)
    {
        $mysqli = dbConnect();
        $products = $mysqli->prepare("SELECT COUNT(*) FROM `products` WHERE category_id=$category_id");
        $products->execute();
        return $products->get_result()->fetch_assoc();
    }
    public static function getProductsByPrice($category_id)
    {
        $mysqli = dbConnect();
        $products = $mysqli->prepare("SELECT p.id, p.name, p.price, c.name as category, p.created_at, p.updated_at FROM products p JOIN categories c ON p.category_id = c.id WHERE p.category_id=$category_id ORDER BY p.price ASC");
        $products->execute();
        return $products->get_result()->fetch_all();
    }
    public static function getProductsByAlphabet($category_id)
    {
        $mysqli = dbConnect();
        $products = $mysqli->prepare("SELECT p.id, p.name, p.price, c.name as category, p.created_at, p.updated_at FROM products p JOIN categories c ON p.category_id = c.id WHERE p.category_id=$category_id ORDER BY p.name ASC");
        $products->execute();
        return $products->get_result()->fetch_all();
    }
    public static function getProductsByData($category_id)
    {
        $mysqli = dbConnect();
        $products = $mysqli->prepare("SELECT p.id, p.name, p.price, c.name as category, p.created_at, p.updated_at FROM products p JOIN categories c ON p.category_id = c.id WHERE p.category_id=$category_id ORDER BY p.created_at ASC");
        $products->execute();
        return $products->get_result()->fetch_all();
    }

}