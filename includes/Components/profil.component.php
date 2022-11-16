<?php
$user=$_SESSION['userInfo'];
?>

<div class="py-3">
    <div class="card p-5">
        <?php
        if (isset($_SESSION['update-info'])){
            $msg = $_SESSION['update-info'];
            echo "
                            <small>
                            <div class='alert alert-success alert-dismissible fade show ' role='alert'>
                              <strong>Success !</strong> ".$msg."
                              <button type='button' class='close' data-bs-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                              </button>
                            </div>
                            </small>
                            ";
            unset($_SESSION['update-info']);
        }
        ?>
        <div class="card-header bg-transparent d-flex justify-content-center">
            <div class="position-relative" style="width: fit-content">
                <img class="rounded-circle" style="width: 150px;height: 150px" src="<?php echo $_SESSION['img']?>" alt="profil image">
                <button idedit="Edit_<?php echo $user['ID'] ?>" class="rounded-circle border-0 position-absolute" id="edit_user_img" style="background-color: var(--main-color);bottom:10px;right: 20px;padding: 5px;padding-inline: 9px;"><i class="fas fa-light fa-pen text-light"></i></button>
            </div>

        </div>
        <form action="includes/userInfoHandler.php" method="post" class="card-body" >
            <input type="hidden" name="id" value="<?php echo $user['ID']?>">
                <div class="d-flex justify-content-between">
                    <div class="w-50">
                        <div class="p-3">
                            <label for="">First name</label>
                            <input class="form-control" type="text" name="f_name" value="<?php echo $user['First_Name'] ?>">
                        </div>
                    </div>
                    <div class="w-50">
                        <div class="p-3">
                            <label for="">Second name</label>
                            <input class="form-control"  type="text" name="s_name" value="<?php echo $user['Second_Name'] ?>">
                        </div>
                    </div>
                </div>
                <div class="p-3">
                    <label for="">Email</label>
                    <input class="form-control"  type="email" name="email" value="<?php echo $user['Email'] ?>">
                </div>
                <div class="card-footer bg-transparent mt-5 d-flex justify-content-end">
                    <button class="btn btn-success" name="savechanges">Save changes</button>
                </div>
        </form>
    </div>
</div>
<script>
    function viewPwd(el){
        el.parentElement.children[0].setAttribute("type","text");
    }
</script>