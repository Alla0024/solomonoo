<?php
$categories = Category::getAllCategories(); ?>

<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <?php foreach ($categories as $elem) {
        $category_id = $elem['id'];
        $counts = Product::getProductCount($category_id);
        foreach ($counts as $count){ ?>
            <a id="<?= $elem['id'] ?>" class="category" href="#"><?= $elem['name'] .' ('. $count.')'?></a>
         <?php } } ?>
</div>
<div class="mysort" id="mysort">
    <label for="sort">Choose sort:</label>

    <select class="sort" name="sort" id="sort">
        <option id="1" value="price">Price</option>
        <option id="2" value="alphabet">Alphabet</option>
        <option id="3" value="new">New</option>
    </select>
</div>
<div id="box"></div>
<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; </span>
<script>

    $(document).ready(function () {
        $('.category').on('click', function () {
            var id = $(this)[0].id;
            $.get("main.php", {category:id}, function (){
                $("#box").load("main.php?category=" + id);
                localStorage.category = (id);
            });
        });
    });

    $(document).ready(function(){
        $('.sort').change (function () {
            var selectedSort = $('#sort option:selected').val();
            var id = window.localStorage.category;
            $.ajax({
                url:"main.php?category="+ id ,
                method:"POST",
                data: {option:selectedSort, local:id},
                success: function (response) {
                    $('#box').html(response);
                    $("#box").show();
                }
                });
        });
    });

    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }
</script>