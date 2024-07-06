<?php
require('../fpdf/fpdf.php');
require('../dbcon.php');
//include '../../auth.php';

class PDF extends FPDF
{
// Page header
function Header()
{
    include('../semester.php');
    
	$this->SetMargins(5,5,5,5);
	$this->SetFont('ArialNarrow','B',8);
	$this->Cell(220);
	$this->Write(5,'TIPM - LSD - 005');
	$this->Ln(3);
	$this->SetFont('ArialNarrow','',8);
	$this->Cell(212);
	$this->Write(5,'REVISION STATUS/DATE: 1/2014 MAY 19');
	$this->Ln(10);
    // Arial bold 15
    $this->SetFont('ArialNarrow','B',26);
    // Move to the right
    $this->Cell(53);
    // Title
    $this->Write(5,'LABORATORIES AND SHOPS DEPARTMENT');
    // Line break
    $this->Ln(8);
	$this->SetFont('ArialNarrow','B',18);
	$this->Cell(75.5);
	$this->Write(5,'LABORATORY COURSES MASTER SCHEDULE');
	$this->Ln();
	$this->SetFont('ArialNarrow','B',12);
    $this->Cell(113);
    $this->Write(5, 'S.Y. ');
    $this->SetFont('ArialNarrow','BU',12);
	$this->Write(5, $stringSY);
    $this->Ln();
    if($stringSem == 'Summer'){
        $this->SetFont('ArialNarrow','BU',12);
	    $this->Cell(110);
        $this->Write(5, $stringSem);
        $this->SetFont('ArialNarrow','B',12);
        $this->Write(5, ' Semester');
    }else{
        $this->SetFont('ArialNarrow','BU',12);
	    $this->Cell(110);
        $this->Write(5, $stringSem);
        $this->SetFont('ArialNarrow','B',12);
        $this->Write(5, 'Semester');
    }
	$this->Ln(10);
	$this->SetFont('ArialNarrow','B',12);
	$this->Cell(95,10,'COURSE CODE/ DESCRIPTION',1,0,'C');
	$this->Cell(50,10,'FACULTY',1,0,'C');
	$this->Cell(54.9,5,'LECTURE SCHEDULE',1,0,'C');
	$this->Cell(70,5,'LAB SCHEDULE',1,0,'C');
	$this->Ln(5);
	$this->Cell(95,5,'',0,0,'C');
	$this->Cell(50,5,'',0,0,'C');
	$this->Cell(18.3,5,'TIME',1,0,'C');
	$this->Cell(18.3,5,'DAY',1,0,'C');
	$this->Cell(18.3,5,'ROOM',1,0,'C');
	$this->Cell(30,5,'TIME',1,0,'C');
	$this->Cell(25,5,'DAY',1,0,'C');
	$this->Cell(15,5,'ROOM',1,0,'C');
	$this->Ln(5);
}

// Page footer
function Footer()
{
    
}
var $widths;
var $aligns;

function SetWidths($w)
{
    //Set the array of column widths
    $this->widths=$w;
}

function SetAligns($a)
{
    //Set the array of column alignments
    $this->aligns=$a;
}

function Row($data)
{
    //Calculate the height of the row
    $nb=0;
    for($i=0;$i<count($data);$i++)
        $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
    $h=5*$nb;
    //Issue a page break first if needed
    $this->CheckPageBreak($h);
    //Draw the cells of the row
    for($i=0;$i<count($data);$i++)
    {
        $w=$this->widths[$i];
        $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'C';
        //Save the current position
        $x=$this->GetX();
        $y=$this->GetY();
        //Draw the border
        $this->Rect($x,$y,$w,$h);
        //Print the text
        $this->MultiCell($w,5,$data[$i],0,$a);
        //Put the position to the right of the cell
        $this->SetXY($x+$w,$y);
    }
    //Go to the next line
    $this->Ln($h);
}

function CheckPageBreak($h)
{
    //If the height h would cause an overflow, add a new page immediately
    if($this->GetY()+$h>$this->PageBreakTrigger)
        $this->AddPage($this->CurOrientation);
}

function NbLines($w,$txt)
{
    //Computes the number of lines a MultiCell of width w will take
    $cw=&$this->CurrentFont['cw'];
    if($w==0)
        $w=$this->w-$this->rMargin-$this->x;
    $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
    $s=str_replace("\r",'',$txt);
    $nb=strlen($s);
    if($nb>0 and $s[$nb-1]=="\n")
        $nb--;
    $sep=-1;
    $i=0;
    $j=0;
    $l=0;
    $nl=1;
    while($i<$nb)
    {
        $c=$s[$i];
        if($c=="\n")
        {
            $i++;
            $sep=-1;
            $j=$i;
            $l=0;
            $nl++;
            continue;
        }
        if($c==' ')
            $sep=$i;
        $l+=$cw[$c];
        if($l>$wmax)
        {
            if($sep==-1)
            {
                if($i==$j)
                    $i++;
            }
            else
                $i=$sep+1;
            $sep=-1;
            $j=$i;
            $l=0;
            $nl++;
        }
        else
            $i++;
    }
    return $nl;
}
}

$pdf = new PDF('L','mm','Letter');
$pdf->AddFont('ArialNarrow','','arialn.php');
$pdf->AddFont('ArialNarrow','B','arialnb.php');
// Data loading
$pdf->AddPage();
$pdf->SetWidths(array(95,50,18.3,18.3,18.3,30,25,15));

            $time_query = $db->query("SELECT time from time_tbl");
            while($time_row=$time_query->fetch()){
				$time_start =$time_row['time'];
				
				/*$sched_query= "SELECT * FROM etr_sched_tbl WHERE sched_day_id = 1 AND sched_start='$time_start' ORDER BY sched_day_id ASC, sched_start ASC, sched_room_id ASC";
				$sched_result = pg_query($db_handle, $sched_query);*/
                
                $sched_query = $db->query("SELECT * FROM etr_sched_tbl WHERE sched_day_id='2' AND sched_start='$time_start' ORDER BY sched_day_id ASC, sched_start ASC, sched_room_id ASC");
				
						/*$sched_count= "SELECT * FROM etr_sched_tbl WHERE sched_day_id = 1  AND sched_start='$time_start'";
						$count_result = pg_query($db_handle, $sched_count);
						$sched_count_total = pg_num_rows($count_result);*/

                        $sched_count= $db->query("SELECT * FROM etr_sched_tbl WHERE sched_day_id = 2  AND sched_start='$time_start'");
						$sched_count_total = $sched_count->rowCount();

						if($sched_count_total != 0){
							$pdf->SetFillColor(192,192,192);
							$pdf->Cell(269.9,5,'',1,0,'L',true);
							$pdf->Ln(5);
						}
						
				while($sched_row = $sched_query->fetch()){
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

                    if($course_array['course_id'] == null || $course_array['course_id'] == "" ){
                        $course_array['course_code'] = "";
                        $course_array['course_desc'] == "";
                      }else if($educ_array['educ_id'] == null || $educ_array['educ_id'] == "" ){
                        $educ_array['educ_fname'] == "";
                        $educ_array['educ_lname'] =="";
                      }else if($room_array['room_id'] == null || $room_array['room_id'] == ""){
                        $room_array['room_num'] =="";
                        $room_array['room_name'] == "";
                      }
						
						$pdf->SetFont('ArialNarrow','',10.5);
						$pdf->Row(array($course_array['course_code'].'-'.$sched_row['sched_section']." ".$course_array['course_desc'],$educ_array['educ_fname'].' '.$educ_array['educ_lname'],'','','',date("g:iA", strtotime($sched_row['sched_start'])).' -'.date("g:iA", strtotime($sched_row['sched_end'])),$day_array['days'],$room_array['room_num']));
						}						
			}
$pdf->Output('I','Tuesday-Laboratory Courses Master Schedule.pdf');
?>