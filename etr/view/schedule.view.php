<header class="cd-main-header text-center flex flex-column flex-center">
    <h1 class="text-xl">List of Schedules</h1>
</header>
<table class="add_btn_table">
<tr>
    <td class="add_btn"><button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#addSchedModal"><i class="fa-solid fa-plus"></i> <span>Add Schedule</span></button></td>
</tr>
</table>
<table id="example" class="display">
    <thead>
      <tr>
        <th scope="col">Time-in</th>
        <th scope="col">Time-out</th>
        <th scope="col">Course Code/ Code Description</th>
        <th scope="col">Section</th>
        <th scope="col">Educator</th>
        <th scope="col">Room</th>
        <th scope="col">Day</th>
        <th scope="col" colspan="2" class="action">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
        if (isset($_GET['page_no']) && $_GET['page_no']!="") {
        $page_no = $_GET['page_no'];
        } else {
          $page_no = 1;
              }
      
          $total_records_per_page = 10;
          $offset = ($page_no-1) * $total_records_per_page;
          $previous_page = $page_no - 1;
          $next_page = $page_no + 1;
          $adjacents = "2";

          /*$result_count = pg_query($db_handle, "SELECT COUNT(*) As total_records FROM etr_sched_tbl");
	        $total_records = pg_fetch_array($result_count);
	        $total_records = $total_records['total_records'];
          $total_no_of_pages = ceil($total_records / $total_records_per_page);
	        $second_last = $total_no_of_pages - 1; // total page minus 1*/

          $result_count = $db->query("SELECT COUNT(*) As total_records FROM etr_sched_tbl");
          $total_records = $result_count->fetch();
          $total_records = $total_records['total_records'];
          $total_no_of_pages = ceil($total_records / $total_records_per_page);
          $second_last = $total_no_of_pages - 1; // total page minus 1

          /*$sched_query = "SELECT * from etr_sched_tbl ORDER BY sched_day_id ASC,  sched_start ASC, sched_room_id ASC LIMIT $total_records_per_page OFFSET $offset";
          $sched_result = pg_query($db_handle, $sched_query);*/

          $sched_query = $db->query("SELECT * from etr_sched_tbl ORDER BY sched_day_id ASC,  sched_start ASC, sched_room_id ASC LIMIT $total_records_per_page OFFSET $offset");
          while($sched_row=$sched_query->fetch()){
            $sched_educ_id = $sched_row['sched_educ_id'];
            $sched_course_id = $sched_row['sched_course_id'];
            $sched_room_id = $sched_row['sched_room_id'];
            $sched_day_id = $sched_row['sched_day_id'];

            /*$educ_query = "SELECT * from etr_educator_tbl WHERE educ_id='$sched_educ_id'";
            $educ_result = pg_query($db_handle, $educ_query);
            $educ_array = pg_fetch_array($educ_result);

            $course_query = "SELECT * from etr_course_tbl WHERE course_id='$sched_course_id'";
            $course_result = pg_query($db_handle, $course_query);
            $course_array = pg_fetch_array($course_result);

            $room_query = "SELECT * from etr_room_tbl WHERE room_id='$sched_room_id'";
            $room_result = pg_query($db_handle, $room_query);
            $room_array = pg_fetch_array($room_result);

            $day_query = "SELECT * from day_tbl WHERE day_id='$sched_day_id'";
            $day_result = pg_query($db_handle, $day_query);
            $day_array = pg_fetch_array($day_result);*/

            $educ_query = $db->query("SELECT * from etr_educator_tbl WHERE educ_id='$sched_educ_id'");
            $educ_array = $educ_query->fetch();

            $course_query = $db->query("SELECT * from etr_course_tbl WHERE course_id='$sched_course_id'");
            $course_array = $course_query->fetch();

            $room_query = $db->query("SELECT * from etr_room_tbl WHERE room_id='$sched_room_id'");
            $room_array = $room_query->fetch();

            $day_query = $db->query("SELECT * from day_tbl WHERE day_id='$sched_day_id'");
            $day_array = $day_query->fetch();

            echo '
            <tr>
              <td style="display:none;" id="sched_course'.$sched_row['sched_id'].'">'.$course_array['course_id'].'</td>
              <td style="display:none;" id="sched_educ'.$sched_row['sched_id'].'">'.$educ_array['educ_id'].'</td>
              <td style="display:none;" id="sched_room'.$sched_row['sched_id'].'">'.$room_array['room_id'].'</td>
              <td style="display:none;" id="sched_day'.$sched_row['sched_id'].'">'.$day_array['day_id'].'</td>
              <td data-label="Time-in" id="sched_timeIn'.$sched_row['sched_id'].'">'.date("g:i A", strtotime($sched_row['sched_start'])).'</td>
              <td data-label="Time-out" id="sched_timeOut'.$sched_row['sched_id'].'">'.date("g:i A", strtotime($sched_row['sched_end'])).'</td>
              <td data-label="Course Code/ Code Description" id="del_sched_course'.$sched_row['sched_id'].'">'.$course_array['course_code'].'-'.$course_array['course_desc'].'</td>
              <td data-label="Section" id="sched_section'.$sched_row['sched_id'].'">'.$sched_row['sched_section'].'</td>
              <td data-label="Educator" id="del_sched_educ'.$sched_row['sched_id'].'">'.$educ_array['educ_fname'].' '.$educ_array['educ_lname'].'</td>
              <td data-label="Room" id="del_sched_room'.$sched_row['sched_id'].'">'.$room_array['room_num'].' '.$room_array['room_name'].'</td>
              <td data-label="Day" id="del_sched_day'.$sched_row['sched_id'].'">'.$day_array['days'].'</td>
              <td data-label="Edit"><button type="button" class="btn btn-primary btn-sm scheduleEdit" data-bs-toggle="modal" data-bs-target="#editSchedModal" value="'.$sched_row['sched_id'].'"><i class="fa-solid fa-pen-to-square"></i> <span>Edit</span></button></td>
              <td data-label="Delete"><button type="button" class="btn btn-danger btn-sm scheduleDelete" data-bs-toggle="modal" data-bs-target="#deleteSchedModal" value="'.$sched_row['sched_id'].'"><i class="fa-solid fa-trash"></i> <span>Delete</span></button></td>
            </tr>';
          }
      ?>
    </tbody>
  </table>

  <div class="pagination justify-content-center" style='padding: 10px 20px 0px; border-top: dotted 1px #CCC;'>
    <strong>Page <?php echo $page_no." of ".$total_no_of_pages; ?></strong>
  </div>

  <ul class="pagination justify-content-center">
	<?php // if($page_no > 1){ echo "<li><a href='?page_no=1'>First Page</a></li>"; } ?>
    
	<li <?php if($page_no <= 1){ echo "class='page-item disabled'"; } ?>>
	  <a class="page-link" <?php if($page_no > 1){ echo "href='?page_no=$previous_page'"; } ?>>Previous</a>
	</li>
       
    <?php 
      if ($total_no_of_pages <= 10){  	 ;
        for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
          if ($counter == $page_no) {
          echo "<li class='page-item active'><a class='page-link'>$counter</a></li>";	
            }else{
              echo "<li class='page-item'><a class='page-link' href='?page_no=$counter'>$counter</a></li>";
            }
            }
      }
      elseif($total_no_of_pages > 10){
		
      if($page_no <= 4) {			
        for ($counter = 1; $counter < 8; $counter++){		 
            if ($counter == $page_no) {
            echo "<li class='page-item active'><a class='page-link'>$counter</a></li>";	
              }else{
                echo "<li class='page-item'><a class='page-link' href='?page_no=$counter'>$counter</a></li>";
              }
              }
          echo "<li class='page-item'><a class='page-link'>...</a></li>";
          echo "<li class='page-item'><a class='page-link' href='?page_no=$second_last'>$second_last</a></li>";
          echo "<li class='page-item'><a class='page-link' href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
          }
          elseif($page_no > 4 && $page_no < $total_no_of_pages - 4) {		 
            echo "<li class='page-item'><a class='page-link' href='?page_no=1'>1</a></li>";
            echo "<li class='page-item'><a class='page-link' href='?page_no=2'>2</a></li>";
                echo "<li class='page-item'><a class='page-link'>...</a></li>";
                for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {			
                  if ($counter == $page_no) {
              echo "<li class='page-item active'><a class='page-link'>$counter</a></li>";	
                }else{
                  echo "<li class='page-item'><a class='page-link' href='?page_no=$counter'>$counter</a></li>";
                }                  
              }
              echo "<li class='page-item'><a class='page-link'>...</a></li>";
              echo "<li class='page-item'><a class='page-link' href='?page_no=$second_last'>$second_last</a></li>";
              echo "<li class='page-item'><a class='page-link' href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";      
                }
		
		else {
        echo "<li class='page-item'><a class='page-link' href='?page_no=1'>1</a></li>";
		    echo "<li class='page-item'><a class='page-link' href='?page_no=2'>2</a></li>";
        echo "<li class='page-item'><a class='page-link'>...</a></li>";

        for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
          if ($counter == $page_no) {
		   echo "<li class='page-item active'><a class='page-link'>$counter</a></li>";	
				}else{
           echo "<li class='page-item'><a class='page-link' href='?page_no=$counter'>$counter</a></li>";
				}                   
                }
            }
	}
  ?>
    
    <li <?php if($page_no >= $total_no_of_pages){ echo "class='page-item disabled'"; } ?>>
      <a class="page-link" <?php if($page_no < $total_no_of_pages) { echo "href='?page_no=$next_page'"; } ?>>Next</a>
    </li>
      <?php if($page_no < $total_no_of_pages){
      echo "<li class='page-item'><a class='page-link' href='?page_no=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a></li>";
      } ?>
    </ul>

  <!-- Add Modal -->
<div class="modal fade" id="addSchedModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Schedule</h1>
        <button type="submit" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post" action="control/add.control.php" data-toggle="validator">
      <div class="grid modal-body">
          <div class="form-floating mb-3 col-6">
              <select name="time_in" id="time_in" class="form-select form-select-lg">
                <?php 
                  $time_query = $db->query("SELECT time from time_tbl");
                  while($time_row=$time_query->fetch()){
                ?>
                  <option value="<?php echo date("G:i", strtotime($time_row['time'])) ?>"><?php echo date("g:i A", strtotime($time_row['time'])) ?></option>
                <?php
                  }
                ?>
              </select>
              <label for="time_in" class="form-label">Time-in</label>
          </div>
          <div class="form-floating mb-3 col-6">
              <select name="time_out" id="time_out" class="form-select form-select-lg">
                <?php 
                  $time_query = $db->query("SELECT time from time_tbl");
                  while($time_row=$time_query->fetch()){
                ?>
                <option value="<?php echo date("G:i", strtotime($time_row['time'])) ?>"><?php echo date("g:i A", strtotime($time_row['time'])) ?></option>
                <?php
                  }
                ?>
              </select>
              <label for="time_out" class="form-label">Time-out</label>
          </div>
          <div class="form-floating mb-3">
              <select name="sched_course_code" id="sched_course_code" class="form-select form-select-lg">
                <?php 
                  $course_query = $db->query("SELECT * from etr_course_tbl ORDER BY course_code ASC");
                  //$course_result = pg_query($db_handle, $course_query);

                  while($course_row=$course_query->fetch()){
                ?>
              <option value="<?php echo $course_row['course_id'] ?>"><?php echo $course_row['course_code'].'-'.$course_row['course_desc'] ?></option>
                <?php
                    }
                ?>
              </select>
              <label for="sched_course_code" class="form-label">Course Code/ Course Description</label>
          </div>
          <div class="form-floating mb-3">
              <select name="sched_educ" id="sched_educ" class="form-select form-select-lg">
                <?php 
                  $educ_query = $db->query("SELECT * from etr_educator_tbl ORDER BY educ_lname ASC");
                  //$educ_result = pg_query($db_handle, $educ_query);
                  while($educ_row=$educ_query->fetch()){
                ?>
                  <option value="<?php echo $educ_row['educ_id'] ?>"><?php echo $educ_row['educ_fname'].' '.$educ_row['educ_lname']  ?></option>
                <?php
                  }
                ?>
              </select>
              <label for="sched_educ" class="form-label">Educator</label>
          </div>
          <div class="form-floating mb-3">
              <select name="sched_room" id="sched_room" class="form-select form-select-lg">
                <?php 
                  $room_query = $db->query("SELECT * from etr_room_tbl ORDER BY room_num ASC");
                  //$room_result = pg_query($db_handle, $room_query);
                  while($room_row=$room_query->fetch()){
                ?>
                  <option value="<?php echo $room_row['room_id'] ?>"><?php echo $room_row['room_num'].'-'.$room_row['room_name']  ?></option>
                <?php
                  }
                ?>
              </select>
              <label for="sched_room" class="form-label">Room</label>
          </div>
          <div class="form-floating mb-3 col-6">
              <select name="sched_day" id="sched_day" class="form-select form-select-lg">
                <?php 
                  $day_query = $db->query("SELECT * from day_tbl");
                  //$day_result = pg_query($db_handle, $day_query);
                  while($day_row=$day_query->fetch()){
                ?>
                  <option value="<?php echo $day_row['day_id'] ?>"><?php echo $day_row['days']?></option>
                <?php
                  }
                ?>
              </select>
              <label for="sched_day" class="form-label">Day</label>
          </div> 
          <div class="form-floating mb-3 col-6">
            <input type="text" class="form-control" name="section" id="section" placeholder="ex. CE11FA1" required value="" aria-describedby="sectionHelp">
            <label for="section" class="form-label">Section</label>
            <div id="sectionHelp" class="form-text">ex. CE11FA1</div>
          </div>       
      </div>
      <div class="modal-footer">
        <button type="submit" name="sched_submit" class="btn btn-success">Add</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- Edit Modal -->
<div class="modal fade" id="editSchedModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Schedule</h1>
        <button type="submit" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post" action="control/edit.control.php" data-toggle="validator">
      <div class="grid modal-body">
        <div class="form-floating mb-3 col-6">
              <select name="editTimeIn" id="editTimeIn" class="form-select form-select-lg">
                <?php 
                  $time_query = $db->query("SELECT time from time_tbl");
                  while($time_row=$time_query->fetch()){
                ?>
                  <option value="<?php echo date("g:i A", strtotime($time_row['time'])) ?>"><?php echo date("g:i A", strtotime($time_row['time'])) ?></option>
                <?php
                  }
                ?>
              </select>
              <label for="editTimeIn" class="form-label">Time-in</label>
          </div>
          <div class="form-floating mb-3 col-6">
              <select name="editTimeOut" id="editTimeOut" class="form-select form-select-lg">
                <?php 
                  $time_query = $db->query("SELECT time from time_tbl");
                  while($time_row=$time_query->fetch()){
                ?>
                <option value="<?php echo date("g:i A", strtotime($time_row['time'])) ?>"><?php echo date("g:i A", strtotime($time_row['time'])) ?></option>
                <?php
                  }
                ?>
              </select>
              <label for="editTimeOut" class="form-label">Time-out</label>
          </div>
          <div class="form-floating mb-3">
              <select name="editSchedCourse" id="editSchedCourse" class="form-select form-select-lg">
                <?php 
                  $course_query = $db->query("SELECT * from etr_course_tbl ORDER BY course_code ASC");
                  //$course_result = pg_query($db_handle, $course_query);

                  while($course_row=$course_query->fetch()){
                ?>
              <option value="<?php echo $course_row['course_id']?>"><?php echo $course_row['course_code'].'-'.$course_row['course_desc'] ?></option>
                <?php
                    }
                ?>
              </select>
              <label for="editSchedCourse" class="form-label">Course Code/ Course Description</label>
          </div>
          <div class="form-floating mb-3">
              <select name="editSchedEduc" id="editSchedEduc" class="form-select form-select-lg">
                <?php 
                  $educ_query = $db->query("SELECT * from etr_educator_tbl ORDER BY educ_lname ASC");
                  //$educ_result = pg_query($db_handle, $educ_query);
                  while($educ_row=$educ_query->fetch()){
                ?>
                  <option value="<?php echo $educ_row['educ_id'] ?>"><?php echo $educ_row['educ_fname'].' '.$educ_row['educ_lname']  ?></option>
                <?php
                  }
                ?>
              </select>
              <label for="editSchedEduc" class="form-label">Educator</label>
          </div>
          <div class="form-floating mb-3">
              <select name="editSchedRoom" id="editSchedRoom" class="form-select form-select-lg">
                <?php 
                  $room_query = $db->query("SELECT * from etr_room_tbl  ORDER BY room_num ASC");
                  //$room_result = pg_query($db_handle, $room_query);
                  while($room_row=$room_query->fetch()){
                ?>
                  <option value="<?php echo $room_row['room_id'] ?>"><?php echo $room_row['room_num'].'-'.$room_row['room_name']  ?></option>
                <?php
                  }
                ?>
              </select>
              <label for="editSchedRoom" class="form-label">Room</label>
          </div>
          <div class="form-floating mb-3 col-6">
              <select name="editSchedDay" id="editSchedDay" class="form-select form-select-lg">
                <?php 
                  $day_query = $db->query("SELECT * from day_tbl");
                  //$day_result = pg_query($db_handle, $day_query);
                  while($day_row=$day_query->fetch()){
                ?>
                  <option value="<?php echo $day_row['day_id'] ?>"><?php echo $day_row['days']?></option>
                <?php
                  }
                ?>
              </select>
              <label for="editSchedDay" class="form-label">Day</label>
          </div>
          <div class="form-floating mb-3 col-6">
            <input type="text" class="form-control" name="editSection" id="editSection" placeholder="ex. CE11FA1" required value="" aria-describedby="sectionHelp">
            <label for="editSection" class="form-label">Section</label>
            <div id="sectionHelp" class="form-text">ex. CE11FA1</div>
          </div>
      </div>
      <div class="modal-footer">
        <input name="edit_sched_id" id="edit_sched_id" type="hidden" value="">
        <button type="submit" name="edit_sched_submit" class="btn btn-primary">Update</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- Delete Modal -->
<div class="modal fade" id="deleteSchedModal" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete Schedule</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post" action="control/del.control.php">
      <div class="grid modal-body">
        <div class="form-floating mb-3 col-6">
          <input type="text" class="form-control" id="deleteTimeIn" value="" disabled>
          <label for="deleteTimeIn" class="form-label">Time-in</label>
        </div>
        <div class="form-floating mb-3 col-6">
          <input type="text" class="form-control" id="deleteTimeOut" value="" disabled>
          <label for="deleteTimeOut" class="form-label">Time-out</label>
        </div>
        <div class="form-floating mb-3">
          <input type="text" class="form-control" id="deleteSchedCourse" value="" disabled>
          <label for="deleteSchedCourse" class="form-label">Course Code/ Course Description</label>
        </div>
        <div class="form-floating mb-3">
          <input type="text" class="form-control" id="deleteSchedEduc" value="" disabled>
          <label for="deleteSchedEduc" class="form-label">Educator</label>
        </div>
        <div class="form-floating mb-3">
          <input type="text" class="form-control" id="deleteSchedRoom" value="" disabled>
          <label for="deleteSchedRoom" class="form-label">Room</label>
        </div>
        <div class="form-floating mb-3 col-6">
          <input type="text" class="form-control" id="deleteSchedDay" value="" disabled>
          <label for="deleteSchedDay" class="form-label">Day</label>
        </div>
        <div class="form-floating mb-3 col-6">
          <input type="text" class="form-control" id="deleteSection" value="" disabled>
          <label for="deleteSection" class="form-label">Section</label>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" data-bs-target="#acceptDelete" data-bs-toggle="modal" class="btn btn-danger">Delete</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="acceptDelete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Delete Schedule</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post" action="control/del.control.php">
      <div class="modal-body text-danger">
          Are you sure do you want to delete this schedule?
      </div>
      <div class="modal-footer">
        <input name="delete_sched_id" id="delete_sched_id" type="hidden" value="">
          <button type="submit" name="delete_sched_submit" class="btn btn-danger">Delete</button>
      </div>
      </form>
    </div>
  </div>
</div>