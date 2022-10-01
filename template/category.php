<li>
    <a href="?category=<?=$category['categories_id'] ?>"><?=$category['categories_id'] ?></a>
    <?php if($category['childs']){ ?>
    <ul>
        <?=Task::categories_to_string($category['childs']); ?>
    </ul>
    <?php } ?>
</li>