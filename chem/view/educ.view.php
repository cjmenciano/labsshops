<header class="cd-main-header text-center flex flex-column flex-center">
    <h1 class="text-xl">Educator Information List</h1>
</header>
<table class="add_btn_table">
  <tr>
      <td class="add_btn"><button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#addEducModal"><i class="fa-solid fa-plus"></i> <span>Add Educator</span></button></td>
  </tr>
</table>
<table>
    <thead>
      <tr>
        <th scope="col">Firstname</th>
        <th scope="col">Lastname</th>
        <th scope="col">Department</th>
        <th scope="col" colspan="3">Action</th>
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
    
              /*$result_count = pg_query($db_handle, "SELECT COUNT(*) As total_records FROM chem_educator_tbl ");
              $total_records = pg_fetch_array($result_count);
              $total_records = $total_records['total_records'];
              $total_no_of_pages = ceil($total_records / $total_records_per_page);
              $second_last = $total_no_of_pages - 1; // total page minus 1*/

              $result_count = $db->query("SELECT COUNT(*) As total_records FROM chem_educator_tbl");
              $total_records = $result_count->fetch();
              $total_records = $total_records['total_records'];
              $total_no_of_pages = ceil($total_records / $total_records_per_page);
              $second_last = $total_no_of_pages - 1; // total page minus 1

          /*$educ_query = "SELECT * from chem_educator_tbl ORDER BY educ_lname ASC LIMIT $total_records_per_page OFFSET $offset";
          $educ_result = pg_query($db_handle, $educ_query);*/

          $educ_query = $db->query("SELECT * from chem_educator_tbl ORDER BY educ_lname ASC LIMIT $total_records_per_page OFFSET $offset");
          while($educ_row=$educ_query->fetch()){
            echo '
            <tr>
              <td data-label="Firstname" id="educ_fname'.$educ_row['educ_id'].'">'.$educ_row['educ_fname'].'</td>
              <td data-label="Lastname" id="educ_lname'.$educ_row['educ_id'].'">'.$educ_row['educ_lname'].'</td>
              <td data-label="Department" id="educ_dept'.$educ_row['educ_id'].'">'.$educ_row['educ_dept'].'</td>
              <td data-label="Laboratory Activity Data Sheet">
                <form  method="post" action="control/lads.report.php">
                  <button type="submit" name="educ_lads" class="btn btn-success" value="'.$educ_row['educ_id'].'">Print Laboratory Activity Data Sheet</button>
                </form>
                </td>
              <td data-label="Edit"><button type="button" class="btn btn-primary btn-sm educEdit" data-bs-toggle="modal" data-bs-target="#editEducModal" value="'.$educ_row['educ_id'].'"><i class="fa-solid fa-user-pen"></i> <span>Edit</span></button></td>
              <td data-label="Delete"><button type="button" class="btn btn-danger btn-sm educDelete" data-bs-toggle="modal" data-bs-target="#deleteEducModal" value="'.$educ_row['educ_id'].'"><i class="fa-solid fa-user-xmark"></i> <span>Delete</span></button></td>
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
<div class="modal fade" id="addEducModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Educator</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post" action="control/add.control.php" data-toggle="validator">
      <div class="modal-body">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" name="educFirstname" id="educFirstname" placeholder="ex. Engr. Juan" required value="" aria-describedby="fnameHelp">
              <label for="educFirstname" class="form-label">Firstname</label>
              <div id="fnameHelp" class="form-text">ex. Engr. Juan</div>
              <div class="firstname invalid-feedback"></div>
            </div>
            <div class="form-floating mb-3">
              <input type="text" class="form-control" name="educLastname" id="educLastname" placeholder="ex. Dela Cruz" required value="" aria-describedby="lnameHelp">
              <label for="educLastname" class="form-label">Lastname</label>
              <div id="lnameHelp" class="form-text">ex. Dela Cruz</div>
              <div class="lastname invalid-feedback"></div>
            </div>
            <div class="form-floating mb-3">
              <select name="educDept" id="educDept" class="form-select form-select-lg">
                <option value="Civil Engineering">Civil Engineering</option>
                <option value="Mechanical Engineering">Mechanical Engineering</option>
                <option value="Electrical Engineering">Electrical Engineering</option>
                <option value="Electronics Engineering">Electronics Engineering</option>
                <option value="Computer Engineering">Computer Engineering</option>
                <option value="Industrial Engineering">Industrial Engineering</option>
                <option value="Chemical Engineering">Chemical Engineering</option>
                <option value="Math and Physics">Math and Physics</option>
              </select>
              <label for="educDept" class="form-label">Department</label>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" name="educ_submit" class="btn btn-success">Add</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- Edit Modal -->
<div class="modal fade" id="editEducModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Educator</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post" action="control/edit.control.php" data-toggle="validator">
      <div class="modal-body">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" name="editEducFirstname" id="editEducFirstname" placeholder="ex. Engr. Juan" required value="" aria-describedby="fnameHelp">
              <label for="editEducFirstname" class="form-label">Firstname</label>
              <div id="fnameHelp" class="form-text">ex. Engr. Juan</div>
              <div class="firstname invalid-feedback"></div>
            </div>
            <div class="form-floating mb-3">
              <input type="text" class="form-control" name="editEducLastname" id="editEducLastname" placeholder="ex. Dela Cruz" required value="" aria-describedby="lnameHelp">
              <label for="editEducLastname" class="form-label">Lastname</label>
              <div id="lnameHelp" class="form-text">ex. Dela Cruz</div>
              <div class="lastname invalid-feedback"></div>
            </div>
            <div class="form-floating mb-3">
              <select name="editEducDept" id="editEducDept" class="form-select form-select-lg" required>
                <option value="Civil Engineering">Civil Engineering</option>
                <option value="Mechanical Engineering">Mechanical Engineering</option>
                <option value="Electrical Engineering">Electrical Engineering</option>
                <option value="Electronics Engineering">Electronics Engineering</option>
                <option value="Computer Engineering">Computer Engineering</option>
                <option value="Industrial Engineering">Industrial Engineering</option>
                <option value="Chemical Engineering">Chemical Engineering</option>
                <option value="Math and Physics">Math and Physics</option>
              </select>
              <label for="editEducDept" class="form-label">Department</label>
          </div>
      </div>
      <div class="modal-footer">
      <input name="edit_educ_id" id="edit_educ_id" type="hidden" value="">
        <button type="submit" name="edit_educ_submit" class="btn btn-primary">Update</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- Delete Modal -->
<div class="modal fade" id="deleteEducModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete Educator</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post" action="control/del.control.php">
      <div class="modal-body">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="deleteEducFirstname" value="" disabled>
              <label for="deleteEducFirstname" class="form-label">Firstname</label>
            </div>
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="deleteEducLastname" value="" disabled>
              <label for="deleteEducLastname" class="form-label">Lastname</label>
            </div>
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="deleteEducDept" value="" disabled>
              <label class="form-label" for="deleteEducDept">Department</label>
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
        <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Delete Educator</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post" action="control/del.control.php">
      <div class="modal-body text-danger">
          Are you sure do you want to delete this educator?
      </div>
      <div class="modal-footer">
        <input name="delete_educ_id" id="delete_educ_id" type="hidden" value="">
          <button type="submit" name="delete_educ_submit" class="btn btn-danger">Delete</button>
      </div>
      </form>
    </div>
  </div>
</div>

