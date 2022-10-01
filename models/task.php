<?php

class Task
{
    public static function getAllData()
    {
        $mysqli = dbConnect();
        $class = $mysqli->prepare("SELECT * FROM task");
        $class->execute();
        return $class->get_result()->fetch_all(MYSQLI_ASSOC);
    }
    function mapTree($dataset){
        $tree = array();

        foreach ($dataset as $id=>&$node){
            if(!$node['parent_id']) {
                $tree[$id] = &$node;
            }else{
                $dataset[$node['parent_id']]['childs'][$id] = &$node;
            }
        }
        return $tree;
    }

}