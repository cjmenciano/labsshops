<?php
    session_start();
    require 'fbase_dbcon.php';
    require 'login.header.php';

    if(isset($_POST['login'])){
        /*$email = $_POST['name'];
        $pass = $_POST['password'];

        $users_query = "SELECT * from users WHERE email='$email' AND password='$pass'";
        $users_result = pg_query($db_handle, $users_query);
        $users_row = pg_num_rows($users_result);*/

        $users_query = "SELECT * from users WHERE email=:email AND password=:password";
        $users_result = $db->prepare($users_query);
        $users_result->execute(array(':email' => $_POST['name'], ':password' => $_POST['password']));
        $users_row = $users_result->rowCount();        

        if($users_row == 1){
            $users_array = $users_result->fetch();
            $_SESSION['verified_user_id'] = $users_array['user_id'];
            $_SESSION['verified_user_dept'] = $users_array['user_dept'];

            if($users_array['user_dept'] == 'ETR'){
                ?>
                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Login Confirmation</h1>
                        <!--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
                    </div>
                    <div class="modal-body text-success">
                        Logged in successfully.
                    </div>
                    <form action="etr/index.php">
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                    </div>
                    </form>
                    </div>
                </div>
                </div>
                <script type="text/javascript">
                        var myModal = new bootstrap.Modal(document.getElementById("staticBackdrop"), {});
                        document.onreadystatechange = function () {
                        myModal.show();
                        };
                </script>
                <?php
            }

            if($users_array['user_dept'] == 'CTR'){
                ?>
                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Login Confirmation</h1>
                        <!--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
                    </div>
                    <div class="modal-body text-success">
                        Logged in successfully.
                    </div>
                    <form action="ctr/index.php">
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                    </div>
                    </form>
                    </div>
                </div>
                </div>
                <script type="text/javascript">
                        var myModal = new bootstrap.Modal(document.getElementById("staticBackdrop"), {});
                        document.onreadystatechange = function () {
                        myModal.show();
                        };
                </script>
                <?php
            }

            if($users_array['user_dept'] == 'CHEM'){
                ?>
                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Login Confirmation</h1>
                        <!--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
                    </div>
                    <div class="modal-body text-success">
                        Logged in successfully.
                    </div>
                    <form action="chem/index.php">
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                    </div>
                    </form>
                    </div>
                </div>
                </div>
                <script type="text/javascript">
                        var myModal = new bootstrap.Modal(document.getElementById("staticBackdrop"), {});
                        document.onreadystatechange = function () {
                        myModal.show();
                        };
                </script>
                <?php
            }

            if($users_array['user_dept'] == 'PHYS'){
                ?>
                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Login Confirmation</h1>
                        <!--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
                    </div>
                    <div class="modal-body text-success">
                        Logged in successfully.
                    </div>
                    <form action="phys/index.php">
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                    </div>
                    </form>
                    </div>
                </div>
                </div>
                <script type="text/javascript">
                        var myModal = new bootstrap.Modal(document.getElementById("staticBackdrop"), {});
                        document.onreadystatechange = function () {
                        myModal.show();
                        };
                </script>
                <?php
            }
        }else{
            ?>
            <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Login Confirmation</h1>
                        <!--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
                    </div>
                    <div class="modal-body text-danger">
                        Email/Password is incorrect.
                    </div>
                    <form action="index.php">
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                    </div>
                    </form>
                    </div>
                </div>
                </div>
                <script type="text/javascript">
                        var myModal = new bootstrap.Modal(document.getElementById("staticBackdrop"), {});
                        document.onreadystatechange = function () {
                        myModal.show();
                        };
                </script>
                <?php
        }

    }
                
?>