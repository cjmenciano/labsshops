<?php
    require('../fpdf/fpdf.php');
    require('../dbcon.php');

class PDF extends FPDF
{
	// Page header
	function Header()
		{
			/*$this->SetMargins(5,5,5,5);
			$this->SetFont('ArialNarrow','B',8);
			$this->Cell(165);
			$this->Write(5,'TIPM - LSD - 004');
			$this->Ln(3);
			$this->SetFont('ArialNarrow','',8);
			$this->Cell(158);
			$this->Write(5,'REVISION STATUS/DATE: 2/2017 NOV 28');
			$this->Ln(10);
			$this->SetFont('Arial','B',18);
			$this->Cell(200,5,'CHEMISTRY & PHYSICS LABORATORIES DEPARTMENT',0,0,'C');
			$this->Ln(7);
			$this->Cell(200,5,'LABORATORY ACTIVITY DATA SHEET',0,0,'C');
			$this->Ln(5);*/
		}
		
	function Footer()
		{
			
		}
	var $widths;
	var $widths2;
	var $aligns;

	function SetWidths($w)
	{
	    //Set the array of column widths
	    $this->widths=$w;
	}

	function SetWidths2($w2)
	{
	    //Set the array of column widths
	    $this->widths2=$w2;
	}

	function SetAligns($a)
	{
	    //Set the array of column alignments
	    $this->aligns=$a;
	}

	function DbConnect($link){
		$this->db_con=$link;
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
	        $w=isset($this->widths[$i]) ? $this->widths[$i] : null;
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

	function Row2($data)
	{
	    //Calculate the height of the row
	    $nb=0;
	    for($i=0;$i<count($data);$i++)
	        $nb=max($nb,$this->NbLines2($this->widths2[$i],$data[$i]));
	    $h=8*$nb;
	    //Issue a page break first if needed
	    $this->CheckPageBreak($h);
	    //Draw the cells of the row
	    for($i=0;$i<count($data);$i++)
	    {
	        $w=isset($this->widths2[$i]) ? $this->widths2[$i] : null;
	        $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'C';
	        //Save the current position
	        $x=$this->GetX();
	        $y=$this->GetY();
	        //Draw the border
	        $this->Rect($x,$y,$w,$h);
	        //Print the text
	        $this->MultiCell($w,8,$data[$i],0,$a);
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

	function NbLines2($w,$txt)
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
$pdf = new PDF('P','mm','Letter');
$pdf->SetMargins(5,5,5,5);
$pdf->AddFont('ArialNarrow','','arialn.php');
$pdf->AddFont('ArialNarrow','B','arialnb.php');
			//LADS
            if(isset($_POST['educ_lads'])){
                $educ_id = $_POST['educ_lads'];                

					$title_educ_query = $db->query("SELECT * from phys_educator_tbl WHERE educ_id='$educ_id'");
					$title_educ_array = $title_educ_query->fetch();

					$pdf->AddPage();
					$pdf->SetAutoPageBreak(true);
					$image = "../images/lsd.png";

					$pdf->Image($image, 20, 20, 175, 90, '', false);
					$pdf->Ln(120);
					$pdf->SetFont('ArialNarrow','B',30);
					$pdf->Cell(200,5,'LABORATORY ACTIVITY DATA SHEET',0,0,'C');
					$pdf->Ln(10);
					$pdf->Cell(200,5, strtoupper($title_educ_array['educ_dept']),0,0,'C');
					$pdf->Ln(30);
					$pdf->SetFont('ArialNarrow','B',20);
					$pdf->Cell(200,5,'Educator:',0,0,'C');
					$pdf->Ln(20);
					$pdf->SetFont('ArialNarrow','B',48);
					$pdf->Cell(200,5,$title_educ_array['educ_fname'],0,0,'C');
					$pdf->Ln(15);
					$pdf->SetFont('ArialNarrow','B',48);
					$pdf->Cell(200,5,$title_educ_array['educ_lname'],0,0,'C');

				$lads_query= $db->query("SELECT * FROM phys_sched_tbl WHERE sched_educ_id = '$educ_id'");

                while($lads_row = $lads_query->fetch()){
					
                    $lads_educ_id = $lads_row['sched_educ_id'];
                    $lads_course_id = $lads_row['sched_course_id'];
                    $lads_room_id = $lads_row['sched_room_id'];
                    $lads_day_id = $lads_row['sched_day_id'];

                    $educ_query = $db->query("SELECT * from phys_educator_tbl WHERE educ_id='$lads_educ_id'");
                    $educ_array = $educ_query->fetch();

                    $course_query = $db->query("SELECT * from phys_course_tbl WHERE course_id='$lads_course_id'");
                    $course_array = $course_query->fetch();

                    $room_query = $db->query("SELECT * from phys_room_tbl WHERE room_id='$lads_room_id'");
                    $room_array = $room_query->fetch();

                    $day_query = $db->query("SELECT * from day_tbl WHERE day_id='$lads_day_id'");
                    $day_array = $day_query->fetch();
					// Data loading
					$pdf->AddPage();
					$pdf->SetAutoPageBreak(true);

					$pdf->SetMargins(5,5,5,5);
					$pdf->SetFont('ArialNarrow','B',8);
					$pdf->Cell(165);
					$pdf->Write(5,'TIPM - LSD - 004');
					$pdf->Ln(3);
					$pdf->SetFont('ArialNarrow','',8);
					$pdf->Cell(158);
					$pdf->Write(5,'REVISION STATUS/DATE: 2/2023 JUNE 26');
					$pdf->Ln(10);
					$pdf->SetFont('Arial','B',18);
					$pdf->Cell(200,5,'CHEMISTRY & PHYSICS LABORATORIES DEPARTMENT',0,0,'C');
					$pdf->Ln(7);
					$pdf->Cell(200,5,'LABORATORY ACTIVITY DATA SHEET',0,0,'C');
					$pdf->Ln(5);

					$pdf->SetFont('Arial','',12);
					$pdf->Cell(82,5,'FOR',0,0,'R');
					$pdf->SetFont('Arial','BU',12);
					$pdf->Cell(100,5,$course_array['course_code'],0,0,'L');
					$pdf->Ln(5);
					$pdf->SetFont('Arial','',12);
					$pdf->Cell(200,5,'(COURSE)',0,0,'C');
					$pdf->Ln(10);
					$consent='I understand and agree that by filing out this form I am allowing the Technological Institute of the Philippines to collect, use, share, and disclose my personal Information for identification of users and security purposes and to store it as long as necessary for the fulfillment of the stated purpose and in accordance with applicable laws, including the Data Privacy Act of 2012 and its Implementing Rules and Regulations, and T.I.P. Privacy Policy. The purpose and extent of collection, use, sharing, disclosure, and storage of my personal information was explained to me.';
					$pdf->SetFont('ArialNarrow','B',8.5);
					$pdf->Cell(200,5,'PRIVACY CONSENT',0,0,'C');
					$pdf->Ln(5);
					$pdf->SetFont('ArialNarrow','',8.5);
					$pdf->MultiCell(0,5,$consent,1);

                    $pdf->Ln(8);
                    $pdf->Rect(5, 74, 206, 22);

                    $pdf->SetFont('ArialNarrow','B',12);
                    $pdf->Cell(35.25,5,'FACULTY NAME:',0,0,'L');
					$pdf->SetFont('ArialNarrow','BU',9);
					$pdf->Cell(67.25,5,$educ_array['educ_fname'].' '.$educ_array['educ_lname'],0,0,'L');
                    $pdf->SetFont('ArialNarrow','B',12);
					$pdf->Cell(20.25,5,'TIME:',0,0,'L');
					$pdf->SetFont('ArialNarrow','BU',12);
					$pdf->Cell(51.25,5,date("g:i A", strtotime($lads_row['sched_start'])).'-'.date("g:i A", strtotime($lads_row['sched_end'])),0,0,'L');
                    $pdf->Ln(5);
                    $pdf->SetFont('ArialNarrow','B',12);
					$pdf->Cell(35.25,5,'SECTION:',0,0,'L');
					$pdf->SetFont('ArialNarrow','BU',12);
					$pdf->Cell(67.25,5,$lads_row['sched_section'],0,0,'L');
                    $pdf->SetFont('ArialNarrow','B',12, );
					$pdf->Cell(20.25,5,'DAY:',0,0,'L');
					$pdf->SetFont('ArialNarrow','BU',12);
					$pdf->Cell(51.25,5,$day_array['days'],0,0,'L');
                    $pdf->Ln(5);
					$pdf->SetFont('ArialNarrow','B',12);
					$pdf->Cell(35.25,5,'COURSE:',0,0,'L');
					$pdf->SetFont('ArialNarrow','BU',8.5);
					$pdf->Cell(67.25,5,$course_array['course_code'].'-'.$course_array['course_desc'],0,0,'L');
                    $pdf->SetFont('ArialNarrow','B',12);
					$pdf->Cell(20.25,5,'ROOM:',0,0,'L');
					$pdf->SetFont('ArialNarrow','BU',12);
					$pdf->Cell(51.25,5,$room_array['room_num'],0,0,'L');
                    $pdf->Ln(8);

					$pdf->SetFont('ArialNarrow','B',12);
					$pdf->SetAligns('C');
					$pdf->SetWidths(array(115,25,30,36));
					$pdf->Row(array('ACTIVITY', 'ACTUAL DURATION', 'DATE', 'SIGNATURE OF FACULTY'));

					$pdf->SetFont('ArialNarrow','',12);
					$pdf->SetWidths2(array(10,105,25,30,36));
						$counter = 0;
						while($counter != 18){
							$counter+=1;
								if($counter == 1){
							$pdf->Row2(array($counter, 'First Day of Class Reminder on Laboratory Safety', '', '',''));
							}else{
							$pdf->Row2(array($counter, '','', '',''));
							}
						}
					$pdf->SetFont('ArialNarrow','B',11);
					$pdf->SetAligns('C');
					$pdf->SetWidths(array(0,115,25,30,36));
					$pdf->Row(array('TOTAL:', '','', '',''));
					$pdf->SetWidths(array(206,0,0,0,0));
					$pdf->Row(array('CERTIFIED CORRECT BY DEPARTMENT CHAIR:', '','', '',''));
					$pdf->SetAligns('L');
					$pdf->SetWidths(array(25,181,0,0,0));
					$pdf->Row(array('SIGNATURE:', '','', '',''));
					$pdf->SetWidths(array(25,181,0,0,0));
					$pdf->Row(array('NAME:', '','', '',''));
					$pdf->SetWidths(array(25,181,0,0,0));
					$pdf->Row(array('DATE:', '','', '',''));
					$pdf->Ln(20);				
					}
                }
            /*
				$queryEvent = 'SELECT * FROM phys_event_tbl ORDER BY day_id ASC, start ASC, room_id ASC';
				$resultEvent = mysqli_query($link, $queryEvent);
				$rect_counter = 0;
				while($rowEvent =mysqli_fetch_array($resultEvent)){
					$instructorID = $rowEvent['instructor_id'];
					$dayID = $rowEvent['day_id'];
					$roomID = $rowEvent['room_id'];
					$rect_counter +=1;

						$instEvent= "SELECT instructor_name FROM phys_instructor_tbl WHERE instructor_id='$instructorID'";
						$resultInst = mysqli_query($link, $instEvent);
						$instEvent = mysqli_fetch_array($resultInst);
						
						$dayEvent= "SELECT days FROM day_tbl WHERE day_id='$dayID'";
						$resultDay = mysqli_query($link, $dayEvent);
						$dayEvent = mysqli_fetch_array($resultDay);
						
						$queryRM= "SELECT room_num FROM phys_room_tbl WHERE room_id='$roomID'";
						$resultRM = mysqli_query($link, $queryRM);
						$rowRM = mysqli_fetch_assoc($resultRM);

					$pdf->SetFont('ArialNarrow','B',12);
					//$pdf->Rect(5, 63, 205, 21);
					$pdf->Ln(3);
						if($rect_counter > 1){
							$pdf->Rect(5, 58, 205, 21);
						}

					$pdf->Cell(35.25,5,'FACULTY NAME:',0,0,'L');
					$pdf->SetFont('ArialNarrow','BU',11);
					$pdf->Cell(67.25,5,$instEvent['instructor_name'],0,0,'L');
					$pdf->SetFont('ArialNarrow','B',12);
					$pdf->Cell(51.25,5,'TIME:',0,0,'L');
					$pdf->SetFont('ArialNarrow','BU',12);
					$pdf->Cell(51.25,5,date("g:i A", strtotime($rowEvent['start'])).'-'.date("g:i A", strtotime($rowEvent['end'])),0,0,'L');
					$pdf->Ln(5);
					$pdf->SetFont('ArialNarrow','B',12);
					$pdf->Cell(35.25,5,'SECTION:',0,0,'L');
					$pdf->SetFont('ArialNarrow','BU',12);
					$pdf->Cell(67.25,5,$rowEvent['section'],0,0,'L');
					$pdf->SetFont('ArialNarrow','B',12, );
					$pdf->Cell(51.25,5,'DAY:',0,0,'L');
					$pdf->SetFont('ArialNarrow','BU',12);
					$pdf->Cell(51.25,5,$dayEvent['days'],0,0,'L');
					$pdf->Ln(5);
					$pdf->SetFont('ArialNarrow','B',12);
					$pdf->Cell(35.25,5,'COURSE:',0,0,'L');
					$pdf->SetFont('ArialNarrow','BU',10);
					$pdf->Cell(67.25,5,$rowEvent['course'].'-'.$rowEvent['course_desc'],0,0,'L');
					$pdf->SetFont('ArialNarrow','B',12);
					$pdf->Cell(51.25,5,'ROOM:',0,0,'L');
					$pdf->SetFont('ArialNarrow','BU',12);
					$pdf->Cell(51.25,5,$rowRM['room_num'],0,0,'L');
					$pdf->Ln(8);
					
			$pdf->SetFont('ArialNarrow','B',12);
			$pdf->SetAligns('C');
			$pdf->SetWidths(array(115,25,30,35));
			$pdf->Row(array('ACTIVITY', 'ACTUAL DURATION', 'DATE', 'SIGNATURE OF FACULTY'));			


			$pdf->SetFont('ArialNarrow','',12);
			$pdf->SetWidths2(array(10,105,25,30,35));
				$counter = 0;
				while($counter != 18){
					$counter+=1;
			        	if($counter == 1){
					$pdf->Row2(array($counter, 'First Day of Class Reminder on Laboratory Safety', '', '',''));
					}else{
					$pdf->Row2(array($counter, '','', '',''));
					}
				}
			$pdf->SetFont('ArialNarrow','B',11);
			$pdf->SetAligns('C');
			$pdf->SetWidths(array(0,115,25,30,35));
			$pdf->Row(array('TOTAL:', '','', '',''));
			$pdf->SetWidths(array(205,0,0,0,0));
			$pdf->Row(array('CERTIFIED CORRECT BY DEPARTMENT CHAIR:', '','', '',''));
			$pdf->SetAligns('L');
			$pdf->SetWidths(array(25,180,0,0,0));
			$pdf->Row(array('SIGNATURE:', '','', '',''));
			$pdf->SetWidths(array(25,180,0,0,0));
			$pdf->Row(array('NAME:', '','', '',''));
			$pdf->SetWidths(array(25,180,0,0,0));
			$pdf->Row(array('DATE:', '','', '',''));
			$pdf->Ln(20);				
			}		*/


		$pdf->Output('I','Laboratory Activity Data Sheet.pdf');
	
?>