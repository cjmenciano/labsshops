      <!--/sidebar-menu-->
      <div class="sidebar-menu">
          <header class="logo">
            <a href="#" class="sidebar-icon">
              <span class="fa-solid fa-bars"></span>
            </a>
            <a href="index.php">
              <!--<span id="logo" ></span>--> 
              <img id="logo" class="tip_logo" src="../images/lsd.png" alt="Logo"/>
            </a> 
          </header>
            <div style="border-top:1px solid rgba(69, 74, 84, 0.7)"></div>
                <div class="menu">
                  <ul id="menu" role="tablist" >
                    <li><a href="../../<?php echo strtolower($_SESSION['verified_user_dept']);?>" title="Home"><i class="fa-solid fa-house"></i> <span>Home</span></a></li>
                     <li id="menu-academico" ><a title="Monitor Schedule" href="#"><i class="fa-solid fa-calendar-days"></i> <span>Monitor Schedule</span></a>
                       <ul id="menu-academico-sub">
                        <li id="mon" ><a href="mon.index.php" role="tab">Monday</a></li>
                        <li id="tue" ><a href="tue.index.php" role="tab">Tuesday</a></li>
                        <li id="wed" ><a href="wed.index.php" role="tab">Wednesday</a></li>
                        <li id="thu" ><a href="thu.index.php" role="tab">Thursday</a></li>
                        <li id="fri" ><a href="fri.index.php" role="tab">Friday</a></li>
                        <li id="sat" ><a href="sat.index.php" role="tab">Saturday</a></li>
                      </ul>
                    </li>
                      <li id="menu-academico" ><a title="View Tool Room Schedule" href="#0"><i class="fa-solid fa-desktop"></i> <span>View Tool Room Schedule</a>
                        <ul id="menu-academico-sub" >
                          <?php
                            if(strtolower($_SESSION['verified_user_dept']) == 'ctr'){
                          ?>
                              <li id="" ><a href="../../etr/shared_view/view.index.php">EE/ECE/Cpe/IE Tool Room</a></li>
                              <li id="" ><a href="../../chem/shared_view/view.index.php">Chemistry Stock Room</a></li>
                              <li id="" ><a href="../../phys/shared_view/view.index.php">Physics Tool Room</a></li>
                        </ul>
                        <?php } ?>
                        <?php
                            if(strtolower($_SESSION['verified_user_dept']) == 'etr'){
                          ?>
                              <li id="" ><a href="../../ctr/shared_view/view.index.php">Central Tool Room</a></li>
                              <li id="" ><a href="../../chem/shared_view/view.index.php">Chemistry Stock Room</a></li>
                              <li id="" ><a href="../../phys/shared_view/view.index.php">Physics Tool Room</a></li>
                        </ul>
                        <?php } ?>
                        <?php
                            if(strtolower($_SESSION['verified_user_dept']) == 'chem'){
                          ?>
                              <li id="" ><a href="../../ctr/shared_view/view.index.php">Central Tool Room</a></li>
                              <li id="" ><a href="../../etr/shared_view/view.index.php">EE/ECE/Cpe/IE Tool Room</a></li>
                              <li id="" ><a href="../../phys/shared_view/view.index.php">Physics Tool Room</a></li>
                        </ul>
                        <?php } ?>
                        <?php
                            if(strtolower($_SESSION['verified_user_dept']) == 'phys'){
                          ?>
                              <li id="" ><a href="../../ctr/shared_view/view.index.php">Central Tool Room</a></li>
                              <li id="" ><a href="../../etr/shared_view/view.index.php">EE/ECE/Cpe/IE Tool Room</a></li>
                              <li id="" ><a href="../../chem/shared_view/view.index.php">Chemistry Stock Room<</a></li>
                        </ul>
                        <?php } ?>

                      </li>                   
                    <li id="menu-academico" ><a href="../logout.php" title="Logout"><i class="fa-solid fa-right-from-bracket"></i><span>Logout</span></a></li>
                  </ul>
                </div>
                </div>
                <div class="clearfix"></div>    
              </div>