<?php

class Category
{
    public static function getAllCategories()
    {
        $mysqli = dbConnect();
        $class = $mysqli->prepare("SELECT id, name FROM categories");
        $class->execute();
        return $class->get_result()->fetch_all(MYSQLI_ASSOC);
    }

}