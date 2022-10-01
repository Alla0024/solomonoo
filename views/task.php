<?php
$dataset = Task::getAllData();
$categories_tree =  Task::mapTree($dataset);

?>
<div class="task">
   <?= '<pre>'; print_r($categories_tree); echo '</pre>'; ?>
</div>
