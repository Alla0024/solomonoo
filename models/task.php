<?php
class Task
{
    function print_array($array){
       echo "<pre>" .
        print_r($array, true)
        . "<pre>" ;
    }
    public static function getAllData()
    {
        $mysqli = dbConnect();
        $query = "SELECT * FROM task";
        $res = mysqli_query($mysqli, $query);
        $arr_cat = array();
        while($row = mysqli_fetch_assoc($res)) {
            $arr_cat[$row['categories_id']] = $row;
        }
         return$arr_cat;
    }
    public static function mapTree($dataset){
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
    public static function categories_to_string($data){
        foreach ($data as $item){
            $string .= Task::categories_to_template($item);
        }
        return $string ;
    }
    public static function categories_to_template($category){
        ob_start();
        include 'template/category.php';
        return ob_get_clean();
    }

}