<?php
    session_start();
    include 'fbase_dbcon.php';
    include 'login.header.php';

    if(isset($_POST['login'])){
        $uname = $_POST['name'];
        $pass = $_POST['password'];

        try {
            $user = $auth->getUserByEmail("$uname");            

            try{
                $signInResult = $auth->signInWithEmailAndPassword($uname, $pass);
                $idTokenString = $signInResult->idToken();

                try {
                    $verifiedIdToken = $auth->verifyIdToken($idTokenString);
                    $uid = $verifiedIdToken->claims()->get('sub');

                    $_SESSION['verified_user_id'] = $uid;
                    $_SESSION['idTokenString'] = $idTokenString;

                    if($uid == '47MbzWL4tMQQ7GOjDoEtpiIVNc63'){ ?>
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
                        
                    if($uid == 'XDsd7C9efRfUV7YtLQcx11miqXf2'){ ?>
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

                    if($uid == 'amGGis8d6vN50NIkp1EAPBJlzz82'){ ?>
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

                    if($uid == 'mui3Lg560KQz9vcOxxVKigKc3fW2'){ ?>
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

                } catch (FailedToVerifyToken $e) {
                    echo 'The token is invalid: '.$e->getMessage();
                } 

            } catch(Exception $e){
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
                        Wrong Password.
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
            
        } catch (\Kreait\Firebase\Exception\Auth\UserNotFound $e) {
            // echo $e->getMessage();
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
                    Invalid Email Address.
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
    else{
        header('Location: index.php');
        exit();
    }
?>