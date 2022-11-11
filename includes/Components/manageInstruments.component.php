<?php
include_once('./classes/Instrument.class.php');
$initInstrument = new Instrument();
$intruments= $initInstrument->getInstruments();
?>
<small id="h1"  class="small text-danger mt-2"></small>
<div class="container-fluid mt-2">
    <div class="d-flex p-3 bg-light justify-content-between">
        <h3>Manage Instruments</h3>
        <div>
            <?php if($_SESSION['status']==2){
                echo " <button class='btn btn-sm btn-outline-success' data-toggle='modal' data-target='#AddInstrumentModal'>Add instrument</button>
                    <button class='btn btn-sm btn-outline-success' id='addCategory'>Add category</button>
                    ";

            }?>

        </div>
    </div>
    <?php if(isset($_SESSION['setCategory'])){
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                              <strong>Sucess </strong> ".$_SESSION['setCategory']."
                              <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>×</span>
                              </button>
                            </div>";
        unset($_SESSION['setCategory']);
    }elseif (isset($_SESSION['update'])){
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                              <strong>Sucess </strong> ".$_SESSION['update']."
                              <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>×</span>
                              </button>
                            </div>";
        unset($_SESSION['update']);
    } ?>
    <table id="example" class="table table-striped" style="width:100%">
        <thead>
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Description</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Category</th>
            <th>Available</th>
            <?php if($_SESSION['status']==2){
                echo "<th>Actions</th>";
                $actions = "<button class='btn rounded-circle' style='background-color: #f18383;font-size: 11px '><i class='fas fa-light fa-trash-can text-light'></i></button>";
            }else{$actions="";}
            ?>
        </tr>
        </thead>
        <tbody>
    <?php foreach ($intruments as $inst) {
        $availabe = ($inst['Available']) ==1 ? "checked" : "";
        $disable = ($_SESSION['status']==2) ? "": "disabled";
        $img = ($inst['Images_url'])==null ? "includes/InstrumentsImages/default.png" : $inst['Images_url'];

        echo "<tr>
                 <td>
                 <img style='width: 100px; height: 100px' src='".$img."' alt=''>
                 <button style='font-size: xx-small' class='btn btn-outline-secondary btn-sm mt-1 w-100 imgInstrument' id='edit_".$inst['ID']."'><i class='fas fa-light fa-pen'></i><span>edit</span></button>
                 </td>
                 <td id='Name_".$inst['ID']."' class='changeable' contentEditable='true'>".$inst['Name']."</td>
                 <td id='Description_".$inst['ID']."' class='changeable' contentEditable='true'>".$inst['Description']."</td>
                 <td id='Quantity_".$inst['ID']."' class='changeable' contentEditable='true'>".$inst['Quantity']."</td>
                 <td id='Price_".$inst['ID']."' class='changeable' contentEditable='true'>".$inst['Price']."</td>
                 <td id='Cat_".$inst['ID']."' class='categoriesTd'>".$inst['category']."</td>
                 <td>
                     <div class='form-check form-switch'>
                      <input class='form-check-input availability' type='checkbox' id='available_".$inst["ID"]."' $availabe $disable>
                     </div>
                </td>
                 <td>".$actions."</td>
              </tr>";

    }?>
        </tbody>
    </table>



</div>
<script src="assets/js/scripts.js"></script>