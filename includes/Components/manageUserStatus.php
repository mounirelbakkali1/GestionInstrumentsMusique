<?php
//$date = new DateTime();
//echo date_format($date,"Y/m/d H:i:s");
include './classes/PendingUsers.php';
$users = new PendingUsers();
$arr=$users->getPendingUsers();
?>
<div class="container mt-5">
    <h5 class="h5 mb-5">Manage Users Status</h5>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#ID</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Email</th>
            <th scope="col">Sign Up At</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
            foreach ($arr as $user){
                $same=$_SERVER['PHP_SELF']."?page=manageStatus";
                $access;$action;
                if($user['isApproved']==1){
                    $access="Approved" ;
                    $action="<button class='btn btn-outline-danger' type='submit' name='deny'>Remove Acess</button>";
                }else{
                    $access="Pending";
                    $action ="<button class='btn btn-outline-success' type='submit' name='accept'>Give access</button>";
                }
                echo "<tr>
                        <td>".$user['ID']."</td>
                        <td>".$user['First_Name']."</td>
                        <td>".$user['Second_Name']."</td>
                        <td>".$user['Email']."</td>
                        <td>".$user['SignUpAt']."</td>
                        <td>".$access."</td>
                        <td>
                            <form action='$same&q=changeStatus' id='form' method='post'>
                            <input type='hidden' name='id' value='".$user['ID']."'>                        
                            ".$action."
                        </form>
                        </td>
                      </tr>";
            }
        ?>
        </tbody>
    </table>
</div>
<?php
if(isset($_GET['q'])){
    $id = $_POST['id'];
    if(isset($_POST['accept'])){
        $users->giveAccess($id);
        echo "<script>window.location.replace('".$same."')</script>";
    }elseif (isset($_POST['deny'])){
        $users->removeAccess($id);
        echo "<script>window.location.replace('".$same."')</script>";

    }
}
?>

