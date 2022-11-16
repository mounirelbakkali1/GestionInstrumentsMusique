<?php
$instrument = new Instrument();
$rst =$instrument->getInstruments();
$users = new PendingUsers();
$rstUers =$users->getPendingUsers();
$rstCat = $instrument->getCategories();

$countCat=count($rstCat);
$countProduct= count($rst);
$countUsers= count($rstUers);

?>

<div class="container mt-5">

    <div class="container">
        <div class="row">
            <div class="col-lg-6 mt-3">
                <div class="p-5  text-light stat" style="background-color: #03a8cd">
                    <h5>Products</h5>
                    <h3><?php echo $countProduct ?>+</h3>
                </div>
            </div>
            <div class="col-lg-6 mt-3">
                <div class="p-5  text-light stat" style="background-color: #2bcc92">
                    <h5>Categories</h5>
                    <h3><?php echo $countCat ?>+</h3>
                </div>
            </div><div class="col-lg-6 mt-3">
                <div class="p-5  text-light stat"  style="background-color: #f9c565">
                    <h5>Users</h5>
                    <h3><?php echo $countUsers ?>+</h3>
                </div>
            </div>
            <div class="col-lg-6 mt-3">
                <div class="p-5  text-light stat"  style="background-color: #f45656">
                    <h5>ELSE</h5>
                    <h3>33+</h3>
                </div>
            </div>
        </div>
    </div>
</div>