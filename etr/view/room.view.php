<header class="cd-main-header text-center flex flex-column flex-center">
    <h1 class="text-xl">List of Rooms</h1>
</header>
<table class="add_btn_table">
<tr>
    <td class="add_btn"><button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#addRoomModal"><i class="fa-solid fa-plus"></i> <span>Add Room</span></button></td>
</tr>
</table>
<table>
    <thead>
      <tr>
        <th scope="col">Room Number</th>
        <th scope="col">Room Description</th>
        <th scope="col">Floor Area</th>
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

              $result_count = $db->query("SELECT COUNT(*) As total_records FROM etr_room_tbl");
              $total_records = $result_count->fetch();
              $total_records = $total_records['total_records'];
              $total_no_of_pages = ceil($total_records / $total_records_per_page);
              $second_last = $total_no_of_pages - 1; // total page minus 1

          /*$room_query = "SELECT * from etr_room_tbl ORDER BY room_num ASC LIMIT $total_records_per_page OFFSET $offset";
          $room_result = pg_query($db_handle, $room_query);*/
          $room_query = $db->query("SELECT * from etr_room_tbl ORDER BY room_num ASC LIMIT $total_records_per_page OFFSET $offset");
          while($room_row=$room_query->fetch()){
            echo '
            <tr>
              <td data-label="Room Number" id="room_num'.$room_row['room_id'].'">'.$room_row['room_num'].'</td>
              <td data-label="Room Description" id="room_name'.$room_row['room_id'].'">'.$room_row['room_name'].'</td>
              <td data-label="Floor Area" id="flr_area'.$room_row['room_id'].'">'.$room_row['flr_area'].' sqr. meter</td>
              <td data-label="Edit"><button type="button" class="btn btn-primary btn-sm roomEdit" data-bs-toggle="modal" data-bs-target="#editRoomModal" value="'.$room_row['room_id'].'"><i class="fa-solid fa-pen-to-square"></i> <span>Edit</span></button></td>
              <td data-label="Delete"><button type="button" class="btn btn-danger btn-sm roomDelete" data-bs-toggle="modal" data-bs-target="#deleteRoomModal" value="'.$room_row['room_id'].'"><i class="fa-solid fa-trash"></i> <span>Delete</span></button></td>
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
      if ($total_no_of_pages <= 10){  	 
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
<div class="modal fade" id="addRoomModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Room</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post" action="control/add.control.php" data-toggle="validator">
      <div class="modal-body">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" name="roomNum" id="roomNum" placeholder="ex. A-101/C-101/F-101" required value="" aria-describedby="roomNumHelp">
              <label for="roomNum" class="form-label">Room Number</label>
              <div id="roomNumHelp" class="form-text">ex. A-101/C-101/F-101</div>
              <div class="room-num invalid-feedback"></div>
            </div>
            <div class="form-floating mb-3">
              <input type="text" class="form-control" name="roomName" id="roomName" placeholder="ex. Steam Power Plant Laboratory" required value="" aria-describedby="roomNameHelp">
              <label for="roomName" class="form-label">Room Description</label>
              <div id="roomNameHelp" class="form-text">ex. Steam Power Plant Laboratory</div>
              <div class="room-name invalid-feedback"></div>
            </div>
            <div class="form-floating mb-3">
              <input type="text" class="form-control" name="flrArea" id="flrArea" placeholder="ex. 87.5" required value="" aria-describedby="flrAreaHelp" maxlength="6">
              <label for="flrArea" class="form-label">Floor Area</label>
              <div id="flrAreaHelp" class="form-text">ex. 87.50</div>
              <div class="flrArea invalid-feedback"></div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="submit" name="room_submit" class="btn btn-success">Add</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- Edit Modal -->
<div class="modal fade" id="editRoomModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Room</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post" action="control/edit.control.php">
      <div class="modal-body">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" name="editRoomNum" id="editRoomNum" placeholder="ex. A-101/C-101/F-101" required value="" aria-describedby="roomNumHelp">
              <label for="editRoomNum" class="form-label">Room Number</label>
              <div id="roomNumHelp" class="form-text">ex. A-101/C-101/F-101</div>
              <div class="room-num invalid-feedback"></div>
            </div>
            <div class="form-floating mb-3">
              <input type="text" class="form-control" name="editRoomName" id="editRoomName" placeholder="ex. Steam Power Plant Laboratory" required value="" aria-describedby="roomNameHelp">
              <label for="editRoomName" class="form-label">Room Description</label>
              <div id="roomNameHelp" class="form-text">ex. Steam Power Plant Laboratory</div>
              <div class="room-name invalid-feedback"></div>
            </div>
            <div class="form-floating mb-3">
              <input type="text" class="form-control" name="editFlrArea" id="editFlrArea" placeholder="ex. 87.5" required value="" aria-describedby="flrAreaHelp" maxlength="6">
              <label for="editFlrArea" class="form-label">Floor Area</label>
              <div id="flrAreaHelp" class="form-text">ex. 87.50</div>
              <div class="flrArea invalid-feedback"></div>
            </div>        
      </div>
      <div class="modal-footer">
        <input name="edit_room_id" id="edit_room_id" type="hidden" value="">
        <button type="submit" name="edit_room_submit" class="btn btn-primary">Update</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- Delete Modal -->
<div class="modal fade" id="deleteRoomModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete Room</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post" action="control/del.control.php" data-toggle="validator">
      <div class="modal-body">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="deleteRoomNum" placeholder="ex. A-101/C-101/F-101" required value="" aria-describedby="roomNumHelp" disabled>
              <label for="deleteRoomNum" class="form-label">Room Number</label>
            </div>
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="deleteRoomName" placeholder="ex. Steam Power Plant Laboratory" required value="" aria-describedby="roomNameHelp" disabled>
              <label for="deleteRoomName" class="form-label">Room Description</label>
            </div>
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="deleteFlrArea" placeholder="ex. 87.5" required value="" aria-describedby="flrAreaHelp" disabled>
              <label for="deleteFlrArea" class="form-label">Floor Area</label>
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
        <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Delete Room</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post" action="control/del.control.php">
      <div class="modal-body text-danger">
          Are you sure do you want to delete this room?
      </div>
      <div class="modal-footer">
        <input name="delete_room_id" id="delete_room_id" type="hidden" value="">
          <button type="submit" name="delete_room_submit" class="btn btn-danger">Delete</button>
      </div>
      </form>
    </div>
  </div>
</div>