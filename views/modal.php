<?php
$product_id =  $_GET['product'];
$product = Product::getDataProduct($product_id);
foreach ($product as $data) { ?>
    <!-- The Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel"><?=$data[1]?></h4>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <p><?="$".$data[2] ?></p>
                    <p><?=$data[3]?></p>
                    <p><?=$data[4]?></p>
                    <p><?=$data[5]?></p>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>