<?php
include_once('./classes/Instrument.class.php');
$initInstrument = new Instrument();
$intruments= $initInstrument->getInstruments();
?>
<div class="">
    <div class="d-flex p-3 bg-light justify-content-between">
        <h3>Manage Instruments</h3>
        <div>
            <button class="btn btn-outline-secondary">Add stock</button>
            <?php if($_SESSION['status']==2){
                echo " <button class='btn btn-outline-success'>Add instrument</button>";
            }?>

        </div>
    </div>

    <?php foreach ($intruments as $inst) {
        echo "
        <div class='container-fluid d-flex mt-2 p-3 text-light' style='background-color: var(--main-color)'>
        <div class='p-2' style='width: 15%'>
        <img src='./includes/InstrumentsImages/default.png' alt='instrument image' style='width: 100%'>
        </div>
        <div class='p-2' >
            <h5>".$inst['Name']."</h5>
            <h6>".$inst['Quantity']."</h6>
            <p>".$inst['Description']."</p>
        </div>
        <div class='text-center' style='width: 15%'>
            <h6>Price</h6>
            <h6>".$inst['Price']." $</h6>
        </div>";
        if($_SESSION['status']==2){
            echo "
            <div class='text-center' style='width: 15%'>
            <button class='btn btn-outline-light mb-1'><i class='fa-regular fa-pen-to-square'></i></button>
            <button class='btn btn-outline-light'><i class='fa-solid fa-trash-can'></i></button>
        </div>";
        }
            echo "
        
        
    </div>";

    }?>

</div>