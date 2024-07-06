<?php
        switch (date('w')) {
		case 1:
			require 'mon.view.php';
		break;
		case 2:
			require 'tue.view.php';
		break;
		case 3:
			require 'wed.view.php';
		break;
		case 4:
			require 'thu.view.php';
		break;
		case 5:
			require 'fri.view.php';
		break;
		case  6:
			require 'sat.view.php';
		break;
		}
?>