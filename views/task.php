<?php
$dataset = Task::getAllData();
$categories_tree =  Task::mapTree($dataset);
$categories_menu = Task::categories_to_string($categories_tree);
?>
<div class="content">
    <div id="accordion" class="accordion">
        <?= $categories_menu ?>
    </div>
</div>
<script>
    $( function() {
        $( "#accordion" ).accordion();
    } );
</script>
