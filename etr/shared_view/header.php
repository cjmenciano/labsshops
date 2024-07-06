<?php
include '../../auth.php';
include '../dbcon.php';
include '../semester.php';
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Laboratories and Shops Class Schedule Monitoring</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script>document.getElementsByTagName("html")[0].className += " js";</script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.5.2/css/fontawesome.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.5.2/js/all.min.js"></script>
<link rel="stylesheet" href="../assets/css/index_style.css">
<link rel="stylesheet" href="../assets/css/sched_style.css">
<link rel="stylesheet" href="../assets/css/table_style.css">
</head>
<body>
<div class="page-container">
   <!--/content-inner-->
  <div class="left-content">
     <div class="inner-content">
    <!-- header-starts -->
      <div class="header-section">
      <!-- top_bg -->
            <div class="top_bg">
                <div class="header_top">
                  <div class="top_left">
                      <span><h2>ETR Class Schedule Monitoring</h2>
                        <h2>
                          <?php
                            if($stringSem == 'Summer'){
                              echo $stringSem.' S.Y.'.$stringSY;
                            }else{
                              echo $stringSem.' Semester S.Y.'.$stringSY;
                            }
                          ?>
                        </h2>
                      </span>
                      <span><h2>
                      </h2></span>
                  </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
          <div class="clearfix"></div>
        <!-- /top_bg -->
        </div>
      <div class="clearfix"> </div>
        <!-- //header-ends -->