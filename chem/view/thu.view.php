<header class="cd-main-header text-center flex flex-column flex-center">
    <h1 class="text-xl">Thursday Class Schedule</h1>
  </header>

  <div class="cd-schedule cd-schedule--loading margin-top-lg margin-bottom-lg js-cd-schedule">
    <div class="cd-schedule__timeline">
      <ul>
        <?php
          /*$dataEvent = 0;          
          $time_query = "SELECT time from time_tbl";
          $time_result = pg_query($db_handle, $time_query);
          while($time_row=pg_fetch_assoc($time_result)){
            echo '<li><span>'.date("g:i A", strtotime($time_row['time'])).'</span></li>';
          }*/
          $dataEvent = 0;          
          $time_query = $db->query("SELECT time from time_tbl");
          while($time_row=$time_query->fetch()){
            echo '<li><span>'.date("g:i A", strtotime($time_row['time'])).'</span></li>';
          }
        ?>
      </ul>
    </div> <!-- .cd-schedule__timeline -->
  
    <div class="cd-schedule__events">
      <ul>
        <?php
                        
            /*$room_query = 'SELECT * from chem_room_tbl ORDER BY room_num';
            $room_result = pg_query($db_handle, $room_query);
            while($room_row=pg_fetch_assoc($room_result)){
              
              echo '<li class="cd-schedule__group">
                      <div class="cd-schedule__top-info"><span>'.$room_row['room_num'].'</span></div>
                      <ul>';
              $roomId = $room_row['room_id'];
              $sched_query = "SELECT * from chem_sched_tbl WHERE sched_day_id='1' AND sched_room_id='$roomId'";
              $sched_result = pg_query($db_handle, $sched_query);
              if($sched_result){
                        while($sched_row=pg_fetch_assoc($sched_result)){
                          
                        $sched_educ_id = $sched_row['sched_educ_id'];
                        $sched_course_id = $sched_row['sched_course_id'];

                        $educ_query = "SELECT * from chem_educator_tbl WHERE educ_id='$sched_educ_id'";
                        $educ_result = pg_query($db_handle, $educ_query);
                        $educ_array = pg_fetch_array($educ_result);

                        $course_query = "SELECT * from chem_course_tbl WHERE course_id='$sched_course_id'";
                        $course_result = pg_query($db_handle, $course_query);
                        $course_array = pg_fetch_array($course_result);

                        if($dataEvent == 6){
                          $dataEvent = 0;
                        }
                        $dataEvent = $dataEvent + 1;
                        
                        echo '<li class="cd-schedule__event">
                                <a data-start="'.date("H:i a", strtotime($sched_row['sched_start'])).'" data-end="'.date("H:i a", strtotime($sched_row['sched_end'])).'" data-event="event-'.$dataEvent.'">
                                  <em class="cd-schedule__name">'.$course_array['course_code'].'-'.$course_array['course_desc'].'</em>
                                  <em class="cd-schedule__section">'.$sched_row['sched_section'].'</em>
                                  <em class="cd-schedule__name">'.$educ_array['educ_fname'].' '.$educ_array['educ_lname'].'</em>
                                </a>
                              </li>';
                      }
              echo '</ul>
                  </li>';
            }
          }*/
          $room_query = $db->query('SELECT * from chem_room_tbl ORDER BY room_num');
          while($room_row=$room_query->fetch()){
            
            echo '<li class="cd-schedule__group">
                    <div class="cd-schedule__top-info"><span>'.$room_row['room_num'].'</span></div>
                    <ul>';
            $roomId = $room_row['room_id'];
            $sched_query = $db->query("SELECT * from chem_sched_tbl WHERE sched_day_id='4' AND sched_room_id='$roomId'");

              while($sched_row=$sched_query->fetch()){
                    
                $sched_educ_id = $sched_row['sched_educ_id'];
                $sched_course_id = $sched_row['sched_course_id'];

                $educ_query = $db->query("SELECT * from chem_educator_tbl WHERE educ_id='$sched_educ_id'");
                $educ_array = $educ_query->fetch();

                $course_query = $db->query("SELECT * from chem_course_tbl WHERE course_id='$sched_course_id'");
                $course_array = $course_query->fetch();

                if($dataEvent == 6){
                  $dataEvent = 0;
                }
                $dataEvent = $dataEvent + 1;
                
                echo '<li class="cd-schedule__event">
                        <a data-start="'.date("H:i a", strtotime($sched_row['sched_start'])).'" data-end="'.date("H:i a", strtotime($sched_row['sched_end'])).'" data-event="event-'.$dataEvent.'">
                          <em class="cd-schedule__name">'.$course_array['course_code'].'-'.$course_array['course_desc'].'</em>
                          <em class="cd-schedule__section">'.$sched_row['sched_section'].'</em>
                          <em class="cd-schedule__name">'.$educ_array['educ_fname'].' '.$educ_array['educ_lname'].'</em>
                        </a>
                      </li>';
              }
            echo '</ul>
                </li>';
          }
          ?>
      </ul>
    </div>
    <div class="cd-schedule-modal">
      <header class="cd-schedule-modal__header">
        <div class="cd-schedule-modal__content">
          <span class="cd-schedule-modal__date"></span>
          <h3 class="cd-schedule-modal__name"></h3>
        </div>
  
        <div class="cd-schedule-modal__header-bg"></div>
      </header>
  
      <div class="cd-schedule-modal__body">
        <div class="cd-schedule-modal__event-info"></div>
        <div class="cd-schedule-modal__body-bg"></div>
      </div>
  
      <a href="#0" class="cd-schedule-modal__close text-replace">Close</a>
    </div>
  
    <div class="cd-schedule__cover-layer"></div>
  </div> <!-- .cd-schedule -->
