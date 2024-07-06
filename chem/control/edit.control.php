<?php
    include '../../auth.php';
    include '../dbcon.php';

    if(isset($_POST['edit_educ_submit'])){
        $edit_educ_id = $_POST['edit_educ_id'];
        $educFirstname = ucwords(strtolower($_POST['editEducFirstname']));
        $educLastname = ucwords(strtolower($_POST['editEducLastname']));
        $educDept = ucwords($_POST['editEducDept']);

        //echo 'ID:'.$edit_sched_id.' '.$educFirstname.' '.$educLastname.'-'.$educDept;
        /*$educ_query = "UPDATE chem_educator_tbl SET educ_fname='$educFirstname', educ_lname='$educLastname', educ_dept='$educDept' WHERE educ_id='$edit_educ_id'";
        $educ_result = pg_query($db_handle, $educ_query);*/

        $educ_query = "UPDATE chem_educator_tbl SET educ_fname=:educ_fname, educ_lname=:educ_lname, educ_dept=:educ_dept WHERE educ_id=:educ_id";
        $educ_result = $db->prepare($educ_query);
        $educ_result->execute(array('educ_fname' => $educFirstname, 'educ_lname' => $educLastname, 'educ_dept' => $educDept, ':educ_id' => $edit_educ_id));

        if($educ_result){
            ?>
            <!doctype html>
            <html lang="en">
            <head>
            <meta charset="utf-8">
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
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Update Educator Confirmation</h1>
                    <!--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
                </div>
                <div class="modal-body text-success">
                    You've successfully updated the Educator information.
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

    if(isset($_POST['edit_course_submit'])){
        $edit_course_id = $_POST['edit_course_id'];
        $courseCode = strtoupper($_POST['editCourseCode']);
        $courseDesc = ucwords(strtolower($_POST['editCourseDesc']));

        //echo 'ID:'.$edit_sched_id.' '.$courseCode.'-'.$courseDesc;
        /*$course_query = "UPDATE chem_course_tbl SET course_code='$courseCode', course_desc='$courseDesc' WHERE course_id='$edit_course_id'";
        $course_result = pg_query($db_handle, $course_query);*/

        $course_query = "UPDATE chem_course_tbl SET course_code=:course_code, course_desc=:course_desc WHERE course_id=:course_id";
        $course_result = $db->prepare($course_query);
        $course_result->execute(array('course_code' => $courseCode, 'course_desc' => $courseDesc, ':course_id' => $edit_course_id));


        if($course_result){
            ?>
            <!doctype html>
            <html lang="en">
            <head>
            <meta charset="utf-8">
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
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Update Course Confirmation</h1>
                    <!--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
                </div>
                <div class="modal-body text-success">
                    You've successfully updated the Course information.
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

    if(isset($_POST['edit_room_submit'])){
        $edit_room_id = $_POST['edit_room_id'];
        $roomNum = strtoupper($_POST['editRoomNum']);
        $roomName = ucwords(strtolower($_POST['editRoomName']));
        $flrArea = strtolower($_POST['editFlrArea']);

        //echo 'ID:'.$edit_sched_id.' '.$roomNum.'-'.$roomName.'-'.$flrArea;
        /*$room_query = "UPDATE chem_room_tbl SET room_num='$roomNum', room_name='$roomName', flr_area='$flrArea' WHERE room_id='$edit_room_id'";
        $room_result = pg_query($db_handle, $room_query);*/

        $room_query = "UPDATE chem_room_tbl SET room_num=:room_num, room_name=:room_name, flr_area=:flr_area WHERE room_id=:room_id";
        $room_result = $db->prepare($room_query);
        $room_result->execute(array('room_num' => $roomNum, 'room_name' => $roomName, 'flr_area' => $flrArea, ':room_id' => $edit_room_id));

        if($room_result){
            ?>
            <!doctype html>
            <html lang="en">
            <head>
            <meta charset="utf-8">
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
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Update Room Confirmation</h1>
                    <!--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
                </div>
                <div class="modal-body text-success">
                    You've successfully updated the Room information.
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

    if(isset($_POST['edit_sched_submit'])){
        $edit_sched_id = $_POST['edit_sched_id'];
        $time_in = date("G:i", strtotime($_POST['editTimeIn']));
        $time_out = date("G:i", strtotime($_POST['editTimeOut']));
        $sched_course_code = $_POST['editSchedCourse'];
        $section = strtoupper($_POST['editSection']);
        $sched_educ = $_POST['editSchedEduc'];
        $sched_room = $_POST['editSchedRoom'];
        $sched_day = $_POST['editSchedDay'];

        //echo 'ID:'.$edit_sched_id.' '.$time_in.'-'.$time_out.'\n'.$sched_course_code.'\n'.$section.'\n'.$sched_educ.'\n'.$sched_room.'\n'.$sched_day;
        /*$sched_query = "UPDATE chem_sched_tbl 
                        SET sched_start='$time_in', sched_end='$time_out', sched_day_id='$sched_day', sched_room_id='$sched_room', 
                        sched_educ_id='$sched_educ', sched_course_id='$sched_course_code', sched_section='$section'
                        WHERE sched_id='$edit_sched_id'";
        $sched_result = pg_query($db_handle, $sched_query);*/

        $sched_query = "UPDATE chem_sched_tbl
                        SET sched_start=:sched_start, sched_end=:sched_end, sched_day_id=:sched_day_id, sched_room_id=:sched_room_id, 
                        sched_educ_id=:sched_educ_id, sched_course_id=:sched_course_id, sched_section=:sched_section
                        WHERE sched_id=:sched_id";
        $sched_result = $db->prepare($sched_query);
        $sched_result->execute(array('sched_start' => $time_in, 'sched_end' => $time_out, 'sched_day_id' => $sched_day, 'sched_room_id' => $sched_room, 
        'sched_educ_id' => $sched_educ, 'sched_course_id' => $sched_course_code, 'sched_section' => $section, ':sched_id' => $edit_sched_id ));

        if($sched_result){
            ?>
            <!doctype html>
            <html lang="en">
            <head>
            <meta charset="utf-8">
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
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Update Schedule Confirmation</h1>
                    <!--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
                </div>
                <div class="modal-body text-success">
                    You've successfully updated the Schedule information.
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