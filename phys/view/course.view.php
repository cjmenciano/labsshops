<header class="cd-main-header text-center flex flex-column flex-center">
    <h1 class="text-xl">List of Courses</h1>
</header>
<table class="add_btn_table">
<tr>
    <td class="add_btn"><button type="button" class="btn btn-success btn-sm"  data-bs-toggle="modal" data-bs-target="#addCourseModal"><i class="fa-solid fa-plus"></i> <span>Add Course</span></button></td>
</tr>
</table>
<table>
    <thead>
        <th scope="col">Course Code</th>
        <th scope="col">Course Description</th>
        <th scope="col" colspan="2">Action</th>
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
    
              /*$result_count = pg_query($db_handle, "SELECT COUNT(*) As total_records FROM phys_sched_tbl");
              $total_records = pg_fetch_array($result_count);
              $total_records = $total_records['total_records'];
              $total_no_of_pages = ceil($total_records / $total_records_per_page);
              $second_last = $total_no_of_pages - 1; // total page minus 1*/

              $result_count = $db->query("SELECT COUNT(*) As total_records FROM phys_course_tbl");
              $total_records = $result_count->fetch();
              $total_records = $total_records['total_records'];
              $total_no_of_pages = ceil($total_records / $total_records_per_page);
              $second_last = $total_no_of_pages - 1; // total page minus 1

          /*$course_query = "SELECT * from phys_course_tbl ORDER BY course_code ASC LIMIT $total_records_per_page OFFSET $offset";
          $course_result = pg_query($db_handle, $course_query);*/
          $course_query = $db->query("SELECT * from phys_course_tbl ORDER BY course_code ASC LIMIT $total_records_per_page OFFSET $offset");
          while($course_row=$course_query->fetch()){
            echo '
            <tr>
              <td data-label="Course Code" id="course_code'.$course_row['course_id'].'">'.$course_row['course_code'].'</td>
              <td data-label="Course Description" id="course_desc'.$course_row['course_id'].'">'.$course_row['course_desc'].'</td>
              <td data-label="Edit"><button type="button" class="btn btn-primary btn-sm courseEdit" data-bs-toggle="modal" data-bs-target="#editCourseModal" value="'.$course_row['course_id'].'"><i class="fa-solid fa-pen-to-square"></i> <span>Edit</span></button></td>
              <td data-label="Delete"><button type="button" class="btn btn-danger btn-sm courseDelete" data-bs-toggle="modal" data-bs-target="#deleteCourseModal" value="'.$course_row['course_id'].'"><i class="fa-solid fa-trash"></i> <span>Delete</span></button></td>
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
  <div class="modal fade" id="addCourseModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" pattern="">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Course</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post" action="control/add.control.php" data-toggle="validator">
      <div class="modal-body">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" name="courseCode"  id="courseCode" value="" placeholder="ex. CE309" required aria-describedby="courseCodeHelp">
              <label for="courseCode" class="form-label">Course Code</label>
              <div id="courseCodeHelp" class="form-text">ex. CE 309</div>
              <div class="course-code invalid-feedback"></div>
            </div>
            <div class="form-floating mb-3">
              <input type="text" class="form-control" name="courseDesc" id="courseDesc" value="" placeholder="ex. Fluid Mechanics" required aria-describedby="courseDescHelp">
              <label for="courseDesc" class="form-label">Course Description</label>
              <div id="courseDescHelp" class="form-text">ex. Fluid Mechanics</div>
              <div class="course-desc invalid-feedback"></div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="submit" name="course_submit" class="btn btn-success">Add</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- Edit Modal -->
<div class="modal fade" id="editCourseModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" pattern="">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Course</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post" action="control/edit.control.php" data-toggle="validator">
      <div class="modal-body">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" name="editCourseCode" id="editCourseCode" placeholder="ex. CE309" required value="" aria-describedby="courseCodeHelp">
              <label for="editCourseCode" class="form-label">Course Code</label>
              <div id="courseCodeHelp" class="form-text">ex. CE309</div>
              <div class="course-code invalid-feedback"></div>
            </div>
            <div class="form-floating mb-3">
              <input type="text" class="form-control" name="editCourseDesc" id="editCourseDesc" placeholder="ex. Fluid Mechanics" required value="" aria-describedby="courseDescHelp">
              <label for="editCourseDesc" class="form-label">Course Description</label>
              <div id="courseDescHelp" class="form-text">ex. Fluid Mechanics</div>
              <div class="course-desc invalid-feedback"></div>
            </div>
      </div>
      <div class="modal-footer">
        <input name="edit_course_id" id="edit_course_id" type="hidden" value="">
        <button type="submit" name="edit_course_submit" class="btn btn-primary">Update</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- Delete Modal -->
<div class="modal fade" id="deleteCourseModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete Course</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="deleteCourseCode" placeholder="ex. CE309" required value="" aria-describedby="courseCodeHelp" disabled>
              <label for="deleteCourseCode" class="form-label">Course Code</label>
            </div>
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="deleteCourseDesc" placeholder="ex. Fluid Mechanics" required value="" aria-describedby="courseDescHelp" disabled>
              <label for="deleteCourseDesc" class="form-label">Course Description</label>
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
        <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Delete Course</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post" action="control/del.control.php">
      <div class="modal-body text-danger">
          Are you sure do you want to delete this course?
      </div>
      <div class="modal-footer">
          <input name="delete_course_id" id="delete_course_id" type="hidden" value="">
          <button type="submit" name="delete_course_submit" class="btn btn-danger">Delete</button>
      </div>
      </form>
    </div>
  </div>
</div>