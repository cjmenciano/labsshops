<?php
    include '../../auth.php';
    include '../dbcon.php';

    if(isset($_POST['delete_educ_submit'])){
        /*$delete_educ_id = $_POST['delete_educ_id'];

        //echo 'ID:'.$delete_educ_id;
        $educ_query = "DELETE FROM phys_educator_tbl WHERE educ_id='$delete_educ_id'";
        $educ_result = pg_query($db_handle, $educ_query);*/
        try{
        $educ_query = "DELETE FROM phys_educator_tbl WHERE educ_id=:educ_id";
        $educ_result = $db->prepare($educ_query);
        $educ_result->execute(array(':educ_id' => $_POST['delete_educ_id']));

        if($educ_result){
            ?>
            <!doctype html>
            <html lang="en">
            <head>
            <meta charset="UTF-8">
            <title>Laboratory Schedule Monitoring</title>
            <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <script>document.getElementsByTagName("html")[0].className += " js";</script>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.5.2/css/fontawesome.min.css">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.5.2/js/all.min.js"></script>
            </head>
            <body>                
            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete Educator Confirmation</h1>
                    <!--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
                </div>
                <div class="modal-body text-success">
                    <?php echo 'Educator Successfully Deleted.'; ?>
                </div>
                <form action="../educ.index.php">
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
            </body>
            </html>
    <?php    
        }
    } catch (Exception) {
        $del_educ_id = $_POST['delete_educ_id'];

        $educ_query = $db->query("SELECT * from phys_educator_tbl WHERE educ_id='$del_educ_id'");
        $educ_array = $educ_query->fetch();

        ?>
        <!doctype html>
            <html lang="en">
            <head>
            <meta charset="UTF-8">
            <title>Laboratory Schedule Monitoring</title>
            <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <script>document.getElementsByTagName("html")[0].className += " js";</script>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.5.2/css/fontawesome.min.css">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.5.2/js/all.min.js"></script>
            </head>
            <body>                
            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-warning" id="staticBackdropLabel">Delete Educator Confirmation</h1>
                    <!--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
                </div>
                <div class="modal-body">
                    <?php echo $educ_array['educ_fname'].' '.$educ_array['educ_lname'].' still exist on List of Schedule.'; ?>
                </div>
                <form action="../educ.index.php">
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
            </body>
            </html>
    <?php
        }
    }

    if(isset($_POST['delete_course_submit'])){
        /*$delete_course_id = $_POST['delete_course_id'];

        //echo 'ID:'.$delete_course_id;
        $course_query = "DELETE FROM phys_course_tbl WHERE course_id='$delete_course_id'";
        $course_result = pg_query($db_handle, $course_query);*/

        try{
        $course_query = "DELETE FROM phys_course_tbl WHERE course_id=:course_id";
        $course_result = $db->prepare($course_query);
        $course_result->execute(array(':course_id' => $_POST['delete_course_id']));

        if($course_result){
            ?>
            <!doctype html>
            <html lang="en">
            <head>
            <meta charset="UTF-8">
            <title>Laboratory Schedule Monitoring</title>
            <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <script>document.getElementsByTagName("html")[0].className += " js";</script>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.5.2/css/fontawesome.min.css">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.5.2/js/all.min.js"></script>
            </head>
            <body>                
            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete Course Confirmation</h1>
                    <!--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
                </div>
                <div class="modal-body text-success">
                    <?php echo 'Course Successfully Deleted.'; ?>
                </div>
                <form action="../course.index.php">
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
            </body>
            </html>

    <?php    
            }
        } catch (Exception) {
            $del_course_id = $_POST['delete_course_id'];

            $course_query = $db->query("SELECT * from phys_course_tbl WHERE course_id='$del_course_id'");
            $course_array = $course_query->fetch();
            ?>
            <!doctype html>
            <html lang="en">
            <head>
            <meta charset="UTF-8">
            <title>Laboratory Schedule Monitoring</title>
            <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <script>document.getElementsByTagName("html")[0].className += " js";</script>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.5.2/css/fontawesome.min.css">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.5.2/js/all.min.js"></script>
            </head>
            <body>                
            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-warning" id="staticBackdropLabel">Delete Course Confirmation</h1>
                    <!--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
                </div>
                <div class="modal-body">
                    <?php echo $course_array['course_code'].' - '.$course_array['course_desc'].' still exist on List of Schedule.'; ?>
                </div>
                <form action="../course.index.php">
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
            </body>
            </html>
    <?php
        }
    }

    if(isset($_POST['delete_room_submit'])){
        /*$delete_room_id = $_POST['delete_room_id'];

       // echo 'ID:'.$delete_room_id;

        $room_query = "DELETE FROM phys_room_tbl WHERE room_id='$delete_room_id'";
        $room_result = pg_query($db_handle, $room_query);*/
        try{

        $room_query = "DELETE FROM phys_room_tbl WHERE room_id=:room_id";
        $room_result = $db->prepare($room_query);
        $room_result->execute(array(':room_id' => $_POST['delete_room_id']));

        if($room_result){
            ?>
            <!doctype html>
            <html lang="en">
            <head>
            <meta charset="UTF-8">
            <title>Laboratory Schedule Monitoring</title>
            <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <script>document.getElementsByTagName("html")[0].className += " js";</script>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.5.2/css/fontawesome.min.css">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.5.2/js/all.min.js"></script>
            </head>
            <body>                
            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete Room Confirmation</h1>
                    <!--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
                </div>
                <div class="modal-body text-success">
                    <?php echo 'Room Successfully Deleted.'; ?>
                </div>
                <form action="../room.index.php">
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
            </body>
            </html>

    <?php    
            }
        } catch (Exception){

            $del_room_id = $_POST['delete_room_id'];

            $room_query = $db->query("SELECT * from phys_room_tbl WHERE room_id='$del_room_id'");
            $room_array = $room_query->fetch();
        ?>
            <!doctype html>
            <html lang="en">
            <head>
            <meta charset="UTF-8">
            <title>Laboratory Schedule Monitoring</title>
            <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <script>document.getElementsByTagName("html")[0].className += " js";</script>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.5.2/css/fontawesome.min.css">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.5.2/js/all.min.js"></script>
            </head>
            <body>                
            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-warning" id="staticBackdropLabel">Delete Room Confirmation</h1>
                    <!--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
                </div>
                <div class="modal-body">
                    <?php echo $room_array['room_num'].' - '.$room_array['room_name'].' still exist on List of Schedule.'; ?>
                </div>
                <form action="../room.index.php">
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
            </body>
            </html>
    <?php
        }
    }

    if(isset($_POST['delete_sched_submit'])){
        /*$delete_sched_id = $_POST['delete_sched_id'];

        //echo 'ID:'.$delete_sched_id;
        $sched_query = "DELETE FROM phys_sched_tbl WHERE sched_id='$delete_sched_id'";
        $sched_result = pg_query($db_handle, $sched_query);*/

        $sched_query = "DELETE FROM phys_sched_tbl WHERE sched_id=:sched_id";
        $sched_result = $db->prepare($sched_query);
        $sched_result->execute(array(':sched_id' => $_POST['delete_sched_id']));

        if($sched_result){
            ?>
            <!doctype html>
            <html lang="en">
            <head>
            <meta charset="UTF-8">
            <title>Laboratory Schedule Monitoring</title>
            <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <script>document.getElementsByTagName("html")[0].className += " js";</script>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.5.2/css/fontawesome.min.css">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.5.2/js/all.min.js"></script>
            </head>
            <body>                
            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete Schedule Confirmation</h1>
                    <!--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
                </div>
                <div class="modal-body text-success">
                    <?php echo 'Schedule Successfully Deleted.'; ?>
                </div>
                <form action="../schedule.index.php">
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
            </body>
            </html>

    <?php    
        }
    }
?>