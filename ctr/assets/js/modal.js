$(document).ready(function(){
	/*--------- EDIT EDUCATOR----------------*/
	$(document).on('click', '.educEdit', function(){
			
    		var id=$(this).val();
    		var fname=$('#educ_fname'+id).text();
    		var lname=$('#educ_lname'+id).text();
            var dept=$('#educ_dept'+id).text();
     
    		$('#editEducModal').modal('show');
    		$('#editEducFirstname').val(fname);
			$('#editEducLastname').val(lname);
            $('#editEducDept').val(dept);
            $('#edit_educ_id').val(id).text();

    	});
    /*--------- EDIT EDUCATOR ----------------*/

    /*--------- DELETE EDUCATOR ----------------*/
    $(document).on('click', '.educDelete', function(){
        
        var id=$(this).val();
        var fname=$('#educ_fname'+id).text();
        var lname=$('#educ_lname'+id).text();
        var dept=$('#educ_dept'+id).text();
    
        $('#deleteEducModal').modal('show');
        $('#deleteEducFirstname').val(fname);
        $('#deleteEducLastname').val(lname);
        $('#deleteEducDept').val(dept);
        $('#delete_educ_id').val(id).text();

    });
	/*--------- DELETE EDUCATOR ----------------*/

    /*--------- EDIT COURSE----------------*/
	$(document).on('click', '.courseEdit', function(){
			
        var id=$(this).val();
        var course_code=$('#course_code'+id).text();
        var course_desc=$('#course_desc'+id).text();
 
        $('#editCourseModal').modal('show');
        $('#editCourseCode').val(course_code);
        $('#editCourseDesc').val(course_desc);
        $('#edit_course_id').val(id).text();

    });
    /*--------- EDIT COURSE ----------------*/

    /*--------- DELETE COURSE ----------------*/
    $(document).on('click', '.courseDelete', function(){
        
        var id=$(this).val();
        var course_code=$('#course_code'+id).text();
        var course_desc=$('#course_desc'+id).text();

        $('#deleteEducModal').modal('show');
        $('#deleteCourseCode').val(course_code);
        $('#deleteCourseDesc').val(course_desc);
        $('#delete_course_id').val(id).text();

    });
    /*--------- DELETE COURSE ----------------*/

    /*--------- EDIT ROOM----------------*/
	$(document).on('click', '.roomEdit', function(){
			
        var id=$(this).val();
        var room_num=$('#room_num'+id).text();
        var room_name=$('#room_name'+id).text();
        var flrArea=$('#flr_area'+id).text();

        let flr_area = flrArea.match(/(\d*\.?\d{0,2})/);
 
        $('#editRoomModal').modal('show');
        $('#editRoomNum').val(room_num);
        $('#editRoomName').val(room_name);
        $('#editFlrArea').val(flr_area[0]);
        $('#edit_room_id').val(id).text();

    });
    /*--------- EDIT ROOM ----------------*/

    /*--------- DELETE ROOM ----------------*/
    $(document).on('click', '.roomDelete', function(){
        
        var id=$(this).val();
        var room_num=$('#room_num'+id).text();
        var room_name=$('#room_name'+id).text();
        var flr_area=$('#flr_area'+id).text();

        $('#deleteRoomModal').modal('show');
        $('#deleteRoomNum').val(room_num);
        $('#deleteRoomName').val(room_name);
        $('#deleteFlrArea').val(flr_area);
        $('#delete_room_id').val(id).text();

    });
    /*--------- DELETE ROOM ----------------*/

        /*--------- EDIT SCHEDULE----------------*/
	$(document).on('click', '.scheduleEdit', function(){
			
        var id=$(this).val();
        var sched_timeIn=$('#sched_timeIn'+id).text();
        var sched_timeOut=$('#sched_timeOut'+id).text();
        var sched_course=$('#sched_course'+id).text();
        var sched_section=$('#sched_section'+id).text();
        var sched_educ=$('#sched_educ'+id).text();
        var sched_room=$('#sched_room'+id).text();
        var sched_day=$('#sched_day'+id).text();
 
        $('#editSchedModal').modal('show');
        $('#editTimeIn').val(sched_timeIn).text();
        $('#editTimeOut').val(sched_timeOut).text();
        $('#editSchedCourse').val(sched_course);
        $('#editSection').val(sched_section);
        $('#editSchedEduc').val(sched_educ);
        $('#editSchedRoom').val(sched_room);
        $('#editSchedDay').val(sched_day);
        $('#edit_sched_id').val(id).text();

    });
    /*--------- EDIT SCHEDULE ----------------*/

    /*--------- DELETE SCHEDULE ----------------*/
    $(document).on('click', '.scheduleDelete', function(){
        
        var id=$(this).val();
        var sched_timeIn=$('#sched_timeIn'+id).text();
        var sched_timeOut=$('#sched_timeOut'+id).text();
        var sched_course=$('#del_sched_course'+id).text();
        var sched_section=$('#sched_section'+id).text();
        var sched_educ=$('#del_sched_educ'+id).text();
        var sched_room=$('#del_sched_room'+id).text();
        var sched_day=$('#del_sched_day'+id).text();


        $('#deleteRoomModal').modal('show');        
        $('#deleteTimeIn').val(sched_timeIn);
        $('#deleteTimeOut').val(sched_timeOut);
        $('#deleteSchedCourse').val(sched_course);
        $('#deleteSection').val(sched_section);
        $('#deleteSchedEduc').val(sched_educ);
        $('#deleteSchedRoom').val(sched_room);
        $('#deleteSchedDay').val(sched_day);
        $('#delete_sched_id').val(id).text();

    });
    /*--------- DELETE SCHEDULE ----------------*/

				
});