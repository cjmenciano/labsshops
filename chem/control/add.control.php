<?php
    include '../../auth.php';
    include '../dbcon.php';

    if(isset($_POST['educ_submit'])){
        $educFirstname = ucwords(strtolower($_POST['educFirstname']));
        $educLastname = ucwords(strtolower($_POST['educLastname']));
        $educDept = ucwords($_POST['educDept']);

        //echo $educFirstname.' '.$educLastname.'-'.$educDept;
        /*$educ_query = "INSERT INTO chem_educator_tbl (educ_fname, educ_lname, educ_dept) VALUES ('$educFirstname','$educLastname','$educDept')";
        $educ_result = pg_query($db_handle, $educ_query);*/

        $educ_query = "INSERT INTO chem_educator_tbl (educ_fname, educ_lname, educ_dept) VALUES (:fname, :lname, :dept)";
        $educ_result = $db->prepare($educ_query);
        $educ_result->execute(array(':fname' => $educFirstname, ':lname' => $educLastname, ':dept' => $educDept));

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
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Educator Confirmation</h1>
                    <!--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
                </div>
                <div class="modal-body text-success">
                    <?php echo $educFirstname.' '.$educLastname.' - '.$educDept.' successfully added.'; ?>
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

    if(isset($_POST['course_submit'])){
        $courseCode = strtoupper($_POST['courseCode']);
        $courseDesc = ucwords(strtolower($_POST['courseDesc']));

        //echo $courseCode.'-'.$courseDesc;
        /*$course_query = "INSERT INTO chem_course_tbl (course_code, course_desc) VALUES ('$courseCode','$courseDesc')";
        $course_result = pg_query($db_handle, $course_query);*/

        $course_query = "INSERT INTO chem_course_tbl (course_code, course_desc) VALUES (:course, :course_desc)";
        $course_result = $db->prepare($course_query);
        $course_result->execute(array(':course' => $courseCode, ':course_desc' => $courseDesc));

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
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Course Confirmation</h1>
                    <!--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
                </div>
                <div class="modal-body text-success">
                    <?php echo $courseCode.' - '.$courseDesc.' successfully added.'; ?>
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

    if(isset($_POST['room_submit'])){
        $roomNum = strtoupper($_POST['roomNum']);
        $roomName = ucwords(strtolower($_POST['roomName']));
        $flrArea = $_POST['flrArea'];

        //echo $roomNum.'-'.$roomName.'-'.$flrArea;
        /*$room_query = "INSERT INTO chem_room_tbl (room_num, room_name, flr_area) VALUES ('$roomNum','$roomName','$flrArea')";
        $room_result = pg_query($db_handle, $room_query);*/

        $room_query = "INSERT INTO chem_room_tbl (room_num, room_name, flr_area) VALUES (:room_num, :room_name, :flr_area)";
        $room_result = $db->prepare($room_query);
        $room_result->execute(array(':room_num' => $roomNum, ':room_name' => $roomName, ':flr_area' => $flrArea));


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
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Room Confirmation</h1>
                    <!--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
                </div>
                <div class="modal-body text-success">
                    <?php echo $roomNum.' - '.$roomName.' successfully added.'; ?>
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

    if(isset($_POST['sched_submit'])){
        $time_in = $_POST['time_in'];
        $time_out = $_POST['time_out'];
        $sched_course_code = $_POST['sched_course_code'];
        $section = strtoupper($_POST['section']);
        $sched_educ = $_POST['sched_educ'];
        $sched_room = $_POST['sched_room'];
        $sched_day = $_POST['sched_day'];

        $conflict = 0;

        if($sched_day == 7){
            $queryConflict= $db->query("SELECT * FROM chem_sched_tbl WHERE sched_day_id IN (1,2) AND sched_room_id = '$sched_room'");
        }
        else if($sched_day == 8){
            $queryConflict= $db->query("SELECT * FROM chem_sched_tbl WHERE sched_day_id IN (1,3) AND sched_room_id = '$sched_room'");
        }
        else if($sched_day == 9){
            $queryConflict= $db->query("SELECT * FROM chem_sched_tbl WHERE sched_day_id IN (1,4) AND sched_room_id = '$sched_room'");
        }
        else if($sched_day == 10){
            $queryConflict= $db->query("SELECT * FROM chem_sched_tbl WHERE sched_day_id IN (1,5) AND sched_room_id = '$sched_room'");
        }
        else if($sched_day == 11){
            $queryConflict= $db->query("SELECT * FROM chem_sched_tbl WHERE sched_day_id IN (1,6) AND sched_room_id = '$sched_room'");
        }
        else if($sched_day == 12){
            $queryConflict= $db->query("SELECT * FROM chem_sched_tbl WHERE sched_day_id IN (2,3) AND sched_room_id = '$sched_room'");
        }
        else if($sched_day == 13){
            $queryConflict= $db->query("SELECT * FROM chem_sched_tbl WHERE sched_day_id IN (2,4) AND sched_room_id = '$sched_room'");
        }
        else if($sched_day == 14){
            $queryConflict= $db->query("SELECT * FROM chem_sched_tbl WHERE sched_day_id IN (2,5) AND sched_room_id = '$sched_room'");
        }
        else if($sched_day == 15){
            $queryConflict= $db->query("SELECT * FROM chem_sched_tbl WHERE sched_day_id IN (2,6) AND sched_room_id = '$sched_room'");
        }
        else if($sched_day == 16){
            $queryConflict= $db->query("SELECT * FROM chem_sched_tbl WHERE sched_day_id IN (3,4) AND sched_room_id = '$sched_room'");
        }
        else if($sched_day == 17){
            $queryConflict= $db->query("SELECT * FROM chem_sched_tbl WHERE sched_day_id IN (3,5) AND sched_room_id = '$sched_room'");
        }
        else if($sched_day == 18){
            $queryConflict= $db->query("SELECT * FROM chem_sched_tbl WHERE sched_day_id IN (3,6) AND sched_room_id = '$sched_room'");
        }
        else if($sched_day == 19){
            $queryConflict= $db->query("SELECT * FROM chem_sched_tbl WHERE sched_day_id IN (4,5) AND sched_room_id = '$sched_room'");
        }
        else if($sched_day == 20){
            $queryConflict= $db->query("SELECT * FROM chem_sched_tbl WHERE sched_day_id IN (4,6) AND sched_room_id = '$sched_room'");
        }
        else if($sched_day == 21){
            $queryConflict= $db->query("SELECT * FROM chem_sched_tbl WHERE sched_day_id IN (5,6) AND sched_room_id = '$sched_room'");
        }
        else if($sched_day == 22){
            $queryConflict= $db->query("SELECT * FROM chem_sched_tbl WHERE sched_day_id IN (1,3,5) AND sched_room_id = '$sched_room'");
        }
        else{
            $queryConflict= $db->query("SELECT * FROM chem_sched_tbl WHERE sched_day_id ='$sched_day' AND sched_room_id = '$sched_room'");
        }

       // echo $time_in.'-'.$time_out.'\n'.$sched_course_code.'\n'.$section.'\n'.$sched_educ.'\n'.$sched_room.'\n'.$sched_day;
        /*$sched_query = "INSERT INTO chem_sched_tbl (sched_start, sched_end, sched_day_id, sched_room_id, sched_educ_id, sched_course_id, sched_section) 
                                                VALUES ('$time_in','$time_out','$sched_day', '$sched_room', '$sched_educ', '$sched_course_code', '$section')";
        $sched_result = pg_query($db_handle, $sched_query);*/

        while($sched_row=$queryConflict->fetch()){
            $conf_start = date("h:i", strtotime($sched_row['sched_start']));
            $conf_end = $sched_row['sched_end'];           

            if((date("h:i", strtotime($time_in)) > $conf_start && date("h:i", strtotime($time_in)) < $conf_end) || (date("h:i", strtotime($time_in)) < $conf_start && $time_out > $conf_start) || date("h:i", strtotime($time_in))==$conf_start){
                $conf_educ_id = $sched_row['sched_educ_id'];
                $conf_course_id = $sched_row['sched_course_id'];
                $conf_room_id = $sched_row['sched_room_id'];
                $conf_day_id = $sched_row['sched_day_id'];
                $conf_section = $sched_row['sched_section'];

                $conflict = 1;
                
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
                    <link rel="stylesheet" href="../assets/css/table_style.css">
                    </head>
                    <body>                
                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5 text-warning" id="staticBackdropLabel">Warning: Conflict with other schedule</h1>
                            <!--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
                        </div>
                        <div class="modal-body">
                            <?php
                                /*$educ_query = "SELECT * from chem_educator_tbl WHERE educ_id='$sched_educ'";
                                $educ_result = pg_query($db_handle, $educ_query);
                                $educ_array = pg_fetch_array($educ_result);
                    
                                $course_query = "SELECT * from chem_course_tbl WHERE course_id='$sched_course_code'";
                                $course_result = pg_query($db_handle, $course_query);
                                $course_array = pg_fetch_array($course_result);
                    
                                $room_query = "SELECT * from chem_room_tbl WHERE room_id='$sched_room'";
                                $room_result = pg_query($db_handle, $room_query);
                                $room_array = pg_fetch_array($room_result);
                    
                                $day_query = "SELECT * from day_tbl WHERE day_id='$sched_day'";
                                $day_result = pg_query($db_handle, $day_query);
                                $day_array = pg_fetch_array($day_result);*/

                                $educ_query = $db->query("SELECT * from chem_educator_tbl WHERE educ_id='$conf_educ_id'");
                                $educ_array = $educ_query->fetch();
                
                                $course_query = $db->query("SELECT * from chem_course_tbl WHERE course_id='$conf_course_id'");
                                $course_array = $course_query->fetch();
                
                                $room_query = $db->query("SELECT * from chem_room_tbl WHERE room_id='$conf_room_id'");
                                $room_array = $room_query->fetch();
                
                                $day_query = $db->query("SELECT * from day_tbl WHERE day_id='$conf_day_id'");
                                $day_array = $day_query->fetch();
                                ?>
                                <table>
                                    <thead>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>Time:</th>
                                            <td><?php echo date("g:i A", strtotime($conf_start)).'-'.date("g:i A", strtotime($conf_end)) ?></td>
                                        </tr>
                                        <tr>
                                            <th>Course:</th>
                                            <td><?php echo $course_array['course_code'].' '.$course_array['course_desc'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Section:</th>
                                            <td><?php echo $conf_section ?></td>
                                        </tr>
                                        <tr>
                                            <th>Educator:</th>
                                            <td><?php echo $educ_array['educ_fname'].' '.$educ_array['educ_lname'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Room:</th>
                                            <td><?php echo $room_array['room_num'].' - '.$room_array['room_name'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Day:</th>
                                            <td><?php echo $day_array['days'] ?></td>
                                        </tr>
                                    </tbody>
                                </table>
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

        if($conflict == 0){
            if($sched_day == 7){
                $sched_query = "INSERT INTO chem_sched_tbl (sched_start, sched_end, sched_day_id, sched_room_id, sched_educ_id, sched_course_id, sched_section) 
                        VALUES (:time_in, :time_out, :sched_day, :sched_room, :sched_educ, :sched_course_code, :section)";
                $sched_result = $db->prepare($sched_query);
                $sched_result->execute(array(':time_in' => $time_in, ':time_out' => $time_out, ':sched_day' => 1, ':sched_room' => $sched_room,
                                     ':sched_educ' => $sched_educ, ':sched_course_code' => $sched_course_code, ':section' => $section));
                $sched_result->execute(array(':time_in' => $time_in, ':time_out' => $time_out, ':sched_day' => 2, ':sched_room' => $sched_room,
                                     ':sched_educ' => $sched_educ, ':sched_course_code' => $sched_course_code, ':section' => $section));
            }
            else if($sched_day == 8){
                $sched_query = "INSERT INTO chem_sched_tbl (sched_start, sched_end, sched_day_id, sched_room_id, sched_educ_id, sched_course_id, sched_section) 
                        VALUES (:time_in, :time_out, :sched_day, :sched_room, :sched_educ, :sched_course_code, :section)";
                $sched_result = $db->prepare($sched_query);
                $sched_result->execute(array(':time_in' => $time_in, ':time_out' => $time_out, ':sched_day' => 1, ':sched_room' => $sched_room,
                                     ':sched_educ' => $sched_educ, ':sched_course_code' => $sched_course_code, ':section' => $section));
                $sched_result->execute(array(':time_in' => $time_in, ':time_out' => $time_out, ':sched_day' => 3, ':sched_room' => $sched_room,
                                     ':sched_educ' => $sched_educ, ':sched_course_code' => $sched_course_code, ':section' => $section));
            }
            else if($sched_day == 9){
                $sched_query = "INSERT INTO chem_sched_tbl (sched_start, sched_end, sched_day_id, sched_room_id, sched_educ_id, sched_course_id, sched_section) 
                        VALUES (:time_in, :time_out, :sched_day, :sched_room, :sched_educ, :sched_course_code, :section)";
                $sched_result = $db->prepare($sched_query);
                $sched_result->execute(array(':time_in' => $time_in, ':time_out' => $time_out, ':sched_day' => 1, ':sched_room' => $sched_room,
                                     ':sched_educ' => $sched_educ, ':sched_course_code' => $sched_course_code, ':section' => $section));
                $sched_result->execute(array(':time_in' => $time_in, ':time_out' => $time_out, ':sched_day' => 4, ':sched_room' => $sched_room,
                                     ':sched_educ' => $sched_educ, ':sched_course_code' => $sched_course_code, ':section' => $section));
            }
            else if($sched_day == 10){
                $sched_query = "INSERT INTO chem_sched_tbl (sched_start, sched_end, sched_day_id, sched_room_id, sched_educ_id, sched_course_id, sched_section) 
                        VALUES (:time_in, :time_out, :sched_day, :sched_room, :sched_educ, :sched_course_code, :section)";
                $sched_result = $db->prepare($sched_query);
                $sched_result->execute(array(':time_in' => $time_in, ':time_out' => $time_out, ':sched_day' => 1, ':sched_room' => $sched_room,
                                     ':sched_educ' => $sched_educ, ':sched_course_code' => $sched_course_code, ':section' => $section));
                $sched_result->execute(array(':time_in' => $time_in, ':time_out' => $time_out, ':sched_day' => 5, ':sched_room' => $sched_room,
                                     ':sched_educ' => $sched_educ, ':sched_course_code' => $sched_course_code, ':section' => $section));
            }
            else if($sched_day == 11){
                $sched_query = "INSERT INTO chem_sched_tbl (sched_start, sched_end, sched_day_id, sched_room_id, sched_educ_id, sched_course_id, sched_section) 
                        VALUES (:time_in, :time_out, :sched_day, :sched_room, :sched_educ, :sched_course_code, :section)";
                $sched_result = $db->prepare($sched_query);
                $sched_result->execute(array(':time_in' => $time_in, ':time_out' => $time_out, ':sched_day' => 1, ':sched_room' => $sched_room,
                                     ':sched_educ' => $sched_educ, ':sched_course_code' => $sched_course_code, ':section' => $section));
                $sched_result->execute(array(':time_in' => $time_in, ':time_out' => $time_out, ':sched_day' => 6, ':sched_room' => $sched_room,
                                     ':sched_educ' => $sched_educ, ':sched_course_code' => $sched_course_code, ':section' => $section));
            }
            else if($sched_day == 12){
                $sched_query = "INSERT INTO chem_sched_tbl (sched_start, sched_end, sched_day_id, sched_room_id, sched_educ_id, sched_course_id, sched_section) 
                        VALUES (:time_in, :time_out, :sched_day, :sched_room, :sched_educ, :sched_course_code, :section)";
                $sched_result = $db->prepare($sched_query);
                $sched_result->execute(array(':time_in' => $time_in, ':time_out' => $time_out, ':sched_day' => 2, ':sched_room' => $sched_room,
                                     ':sched_educ' => $sched_educ, ':sched_course_code' => $sched_course_code, ':section' => $section));
                $sched_result->execute(array(':time_in' => $time_in, ':time_out' => $time_out, ':sched_day' => 3, ':sched_room' => $sched_room,
                                     ':sched_educ' => $sched_educ, ':sched_course_code' => $sched_course_code, ':section' => $section));
            }
            else if($sched_day == 13){
                $sched_query = "INSERT INTO chem_sched_tbl (sched_start, sched_end, sched_day_id, sched_room_id, sched_educ_id, sched_course_id, sched_section) 
                        VALUES (:time_in, :time_out, :sched_day, :sched_room, :sched_educ, :sched_course_code, :section)";
                $sched_result = $db->prepare($sched_query);
                $sched_result->execute(array(':time_in' => $time_in, ':time_out' => $time_out, ':sched_day' => 2, ':sched_room' => $sched_room,
                                     ':sched_educ' => $sched_educ, ':sched_course_code' => $sched_course_code, ':section' => $section));
                $sched_result->execute(array(':time_in' => $time_in, ':time_out' => $time_out, ':sched_day' => 4, ':sched_room' => $sched_room,
                                     ':sched_educ' => $sched_educ, ':sched_course_code' => $sched_course_code, ':section' => $section));
            }
            else if($sched_day == 14){
                $sched_query = "INSERT INTO chem_sched_tbl (sched_start, sched_end, sched_day_id, sched_room_id, sched_educ_id, sched_course_id, sched_section) 
                        VALUES (:time_in, :time_out, :sched_day, :sched_room, :sched_educ, :sched_course_code, :section)";
                $sched_result = $db->prepare($sched_query);
                $sched_result->execute(array(':time_in' => $time_in, ':time_out' => $time_out, ':sched_day' => 2, ':sched_room' => $sched_room,
                                     ':sched_educ' => $sched_educ, ':sched_course_code' => $sched_course_code, ':section' => $section));
                $sched_result->execute(array(':time_in' => $time_in, ':time_out' => $time_out, ':sched_day' => 5, ':sched_room' => $sched_room,
                                     ':sched_educ' => $sched_educ, ':sched_course_code' => $sched_course_code, ':section' => $section));
            }
            else if($sched_day == 15){
                $sched_query = "INSERT INTO chem_sched_tbl (sched_start, sched_end, sched_day_id, sched_room_id, sched_educ_id, sched_course_id, sched_section) 
                        VALUES (:time_in, :time_out, :sched_day, :sched_room, :sched_educ, :sched_course_code, :section)";
                $sched_result = $db->prepare($sched_query);
                $sched_result->execute(array(':time_in' => $time_in, ':time_out' => $time_out, ':sched_day' => 2, ':sched_room' => $sched_room,
                                     ':sched_educ' => $sched_educ, ':sched_course_code' => $sched_course_code, ':section' => $section));
                $sched_result->execute(array(':time_in' => $time_in, ':time_out' => $time_out, ':sched_day' => 6, ':sched_room' => $sched_room,
                                     ':sched_educ' => $sched_educ, ':sched_course_code' => $sched_course_code, ':section' => $section));
            }
            else if($sched_day == 16){
                $$sched_query = "INSERT INTO chem_sched_tbl (sched_start, sched_end, sched_day_id, sched_room_id, sched_educ_id, sched_course_id, sched_section) 
                VALUES (:time_in, :time_out, :sched_day, :sched_room, :sched_educ, :sched_course_code, :section)";
                $sched_result = $db->prepare($sched_query);
                $sched_result->execute(array(':time_in' => $time_in, ':time_out' => $time_out, ':sched_day' => 3, ':sched_room' => $sched_room,
                             ':sched_educ' => $sched_educ, ':sched_course_code' => $sched_course_code, ':section' => $section));
                $sched_result->execute(array(':time_in' => $time_in, ':time_out' => $time_out, ':sched_day' => 4, ':sched_room' => $sched_room,
                             ':sched_educ' => $sched_educ, ':sched_course_code' => $sched_course_code, ':section' => $section));
            }
            else if($sched_day == 17){
                $sched_query = "INSERT INTO chem_sched_tbl (sched_start, sched_end, sched_day_id, sched_room_id, sched_educ_id, sched_course_id, sched_section) 
                        VALUES (:time_in, :time_out, :sched_day, :sched_room, :sched_educ, :sched_course_code, :section)";
                $sched_result = $db->prepare($sched_query);
                $sched_result->execute(array(':time_in' => $time_in, ':time_out' => $time_out, ':sched_day' => 3, ':sched_room' => $sched_room,
                                     ':sched_educ' => $sched_educ, ':sched_course_code' => $sched_course_code, ':section' => $section));
                $sched_result->execute(array(':time_in' => $time_in, ':time_out' => $time_out, ':sched_day' => 5, ':sched_room' => $sched_room,
                                     ':sched_educ' => $sched_educ, ':sched_course_code' => $sched_course_code, ':section' => $section));
            }
            else if($sched_day == 18){
                $sched_query = "INSERT INTO chem_sched_tbl (sched_start, sched_end, sched_day_id, sched_room_id, sched_educ_id, sched_course_id, sched_section) 
                        VALUES (:time_in, :time_out, :sched_day, :sched_room, :sched_educ, :sched_course_code, :section)";
                $sched_result = $db->prepare($sched_query);
                $sched_result->execute(array(':time_in' => $time_in, ':time_out' => $time_out, ':sched_day' => 3, ':sched_room' => $sched_room,
                                     ':sched_educ' => $sched_educ, ':sched_course_code' => $sched_course_code, ':section' => $section));
                $sched_result->execute(array(':time_in' => $time_in, ':time_out' => $time_out, ':sched_day' => 6, ':sched_room' => $sched_room,
                                     ':sched_educ' => $sched_educ, ':sched_course_code' => $sched_course_code, ':section' => $section));
            }
            else if($sched_day == 19){
                $sched_query = "INSERT INTO chem_sched_tbl (sched_start, sched_end, sched_day_id, sched_room_id, sched_educ_id, sched_course_id, sched_section) 
                        VALUES (:time_in, :time_out, :sched_day, :sched_room, :sched_educ, :sched_course_code, :section)";
                $sched_result = $db->prepare($sched_query);
                $sched_result->execute(array(':time_in' => $time_in, ':time_out' => $time_out, ':sched_day' => 4, ':sched_room' => $sched_room,
                                     ':sched_educ' => $sched_educ, ':sched_course_code' => $sched_course_code, ':section' => $section));
                $sched_result->execute(array(':time_in' => $time_in, ':time_out' => $time_out, ':sched_day' => 5, ':sched_room' => $sched_room,
                                     ':sched_educ' => $sched_educ, ':sched_course_code' => $sched_course_code, ':section' => $section));
            }
            else if($sched_day == 20){
                $sched_query = "INSERT INTO chem_sched_tbl (sched_start, sched_end, sched_day_id, sched_room_id, sched_educ_id, sched_course_id, sched_section) 
                        VALUES (:time_in, :time_out, :sched_day, :sched_room, :sched_educ, :sched_course_code, :section)";
                $sched_result = $db->prepare($sched_query);
                $sched_result->execute(array(':time_in' => $time_in, ':time_out' => $time_out, ':sched_day' => 4, ':sched_room' => $sched_room,
                                     ':sched_educ' => $sched_educ, ':sched_course_code' => $sched_course_code, ':section' => $section));
                $sched_result->execute(array(':time_in' => $time_in, ':time_out' => $time_out, ':sched_day' => 6, ':sched_room' => $sched_room,
                                     ':sched_educ' => $sched_educ, ':sched_course_code' => $sched_course_code, ':section' => $section));
            }
            else if($sched_day == 21){
                $sched_query = "INSERT INTO chem_sched_tbl (sched_start, sched_end, sched_day_id, sched_room_id, sched_educ_id, sched_course_id, sched_section) 
                        VALUES (:time_in, :time_out, :sched_day, :sched_room, :sched_educ, :sched_course_code, :section)";
                $sched_result = $db->prepare($sched_query);
                $sched_result->execute(array(':time_in' => $time_in, ':time_out' => $time_out, ':sched_day' => 5, ':sched_room' => $sched_room,
                                     ':sched_educ' => $sched_educ, ':sched_course_code' => $sched_course_code, ':section' => $section));
                $sched_result->execute(array(':time_in' => $time_in, ':time_out' => $time_out, ':sched_day' => 6, ':sched_room' => $sched_room,
                                     ':sched_educ' => $sched_educ, ':sched_course_code' => $sched_course_code, ':section' => $section));
            }
            else if($sched_day == 22){
                $sched_query = "INSERT INTO chem_sched_tbl (sched_start, sched_end, sched_day_id, sched_room_id, sched_educ_id, sched_course_id, sched_section) 
                        VALUES (:time_in, :time_out, :sched_day, :sched_room, :sched_educ, :sched_course_code, :section)";
                $sched_result = $db->prepare($sched_query);
                $sched_result->execute(array(':time_in' => $time_in, ':time_out' => $time_out, ':sched_day' => 1, ':sched_room' => $sched_room,
                                     ':sched_educ' => $sched_educ, ':sched_course_code' => $sched_course_code, ':section' => $section));
                $sched_result->execute(array(':time_in' => $time_in, ':time_out' => $time_out, ':sched_day' => 3, ':sched_room' => $sched_room,
                                     ':sched_educ' => $sched_educ, ':sched_course_code' => $sched_course_code, ':section' => $section));
                 $sched_result->execute(array(':time_in' => $time_in, ':time_out' => $time_out, ':sched_day' => 5, ':sched_room' => $sched_room,
                                     ':sched_educ' => $sched_educ, ':sched_course_code' => $sched_course_code, ':section' => $section));
            }
            else{
                $sched_query = "INSERT INTO chem_sched_tbl (sched_start, sched_end, sched_day_id, sched_room_id, sched_educ_id, sched_course_id, sched_section) 
                        VALUES (:time_in, :time_out, :sched_day, :sched_room, :sched_educ, :sched_course_code, :section)";
                $sched_result = $db->prepare($sched_query);
                $sched_result->execute(array(':time_in' => $time_in, ':time_out' => $time_out, ':sched_day' => $sched_day, ':sched_room' => $sched_room,
                                     ':sched_educ' => $sched_educ, ':sched_course_code' => $sched_course_code, ':section' => $section));
            }

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
                <link rel="stylesheet" href="../assets/css/table_style.css">
                </head>
                <body>                
                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Schedule Confirmation</h1>
                        <!--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
                    </div>
                    <div class="modal-body">
                        <?php
                            /*$educ_query = "SELECT * from chem_educator_tbl WHERE educ_id='$sched_educ'";
                            $educ_result = pg_query($db_handle, $educ_query);
                            $educ_array = pg_fetch_array($educ_result);
                
                            $course_query = "SELECT * from chem_course_tbl WHERE course_id='$sched_course_code'";
                            $course_result = pg_query($db_handle, $course_query);
                            $course_array = pg_fetch_array($course_result);
                
                            $room_query = "SELECT * from chem_room_tbl WHERE room_id='$sched_room'";
                            $room_result = pg_query($db_handle, $room_query);
                            $room_array = pg_fetch_array($room_result);
                
                            $day_query = "SELECT * from day_tbl WHERE day_id='$sched_day'";
                            $day_result = pg_query($db_handle, $day_query);
                            $day_array = pg_fetch_array($day_result);*/
    
                            $educ_query = $db->query("SELECT * from chem_educator_tbl WHERE educ_id='$sched_educ'");
                            $educ_array = $educ_query->fetch();
                
                            $course_query = $db->query("SELECT * from chem_course_tbl WHERE course_id='$sched_course_code'");                        
                            $course_array = $course_query->fetch();
                
                            $room_query = $db->query("SELECT * from chem_room_tbl WHERE room_id='$sched_room'");
                            $room_array = $room_query->fetch();
                
                            $day_query = $db->query("SELECT * from day_tbl WHERE day_id='$sched_day'");
                            $day_array = $day_query->fetch();
                            ?>
                            <table>
                                <thead>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>Time:</th>
                                        <td><?php echo date("g:i A", strtotime($time_in)).'-'.date("g:i A", strtotime($time_out)) ?></td>
                                    </tr>
                                    <tr>
                                        <th>Course:</th>
                                        <td><?php echo $course_array['course_code'].' '.$course_array['course_desc'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Section:</th>
                                        <td><?php echo $section ?></td>
                                    </tr>
                                    <tr>
                                        <th>Educator:</th>
                                        <td><?php echo $educ_array['educ_fname'].' '.$educ_array['educ_lname'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Room:</th>
                                        <td><?php echo $room_array['room_num'].' - '.$room_array['room_name'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Day:</th>
                                        <td><?php echo $day_array['days'] ?></td>
                                    </tr>
                                </tbody>
                            </table>
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
            }else{
                header('Location:../schedule.index.php');
                exit();
            }
        }

    }
    
?>