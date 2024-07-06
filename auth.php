<?php
session_start();
include 'login.header.php';


if(!isset($_SESSION['verified_user_id'])){?>
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Login Confirmation</h1>
            <!--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
        </div>
        <div class="modal-body text-danger">
            Login to access this page.
        </div>
        <form action="../index.php">
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
?>
</body>
</html>