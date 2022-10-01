 <?php
 $data = [
         'option' => $_POST['option'],
         'local' => $_POST['local']];

 $category_id =  $_GET['category'];
 $product =  $_GET['product'];

 if(!empty($category_id)) {
     if ($data['option'] == 'price') {
         $products = Product::getProductsByPrice($category_id);
     } elseif ($data['option'] == 'alphabet') {
         $products = Product::getProductsByAlphabet($category_id);
     } elseif ($data['option'] == 'new') {
         $products = Product::getProductsByData($category_id);
     } else {
         $products = Product::getAllProductsByCategoryId($category_id);
     }
 }
 ?>
 <div id="res"></div>

 <div class="intro">
    <div class="container">
    <?php foreach ($products as $elem) { ?>
            <div id="result"></div>
        <section style="background-color: #eee;">
            <div class="container py-5">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-4">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body pb-0">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <p><a href="#!" class="text-dark"><?=$elem[1]?></a></p>
                                        <p class="text-dark"> <?=$elem[3]?></p>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-0" />
                            <div class="card-body pb-0">
                                <div class="d-flex justify-content-between">
                                    <p><a href="#!" class="text-dark"><?='$'.$elem[2]?></a></p>
                                </div>
                            </div>
                            <div class="card-body pb-0">
                                <div class="d-flex justify-content-between">
                            <p class="small text-muted"><?=$elem[4]?></p>
                            <p class="small text-muted"><?=$elem[5]?></p>
                                </div>
                            </div>
                            <hr class="my-0" />
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center pb-2 mb-1">
                                    <a href="#!" class="text-dark fw-bold">Cancel</a>
                                    <button type="button" id="<?=$elem[0] ?>" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Buy now</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

     <?php } ?>

    </div>
 </div>
 <script>
     $(document).ready(function () {
         $('.btn-primary').on('click', function () {
             var id = $(this)[0].id;
             $.get("modal.php", {product:id}, function (){
                 $("#res").load("modal.php?product=" + id);
             });
         });
     });
 </script>