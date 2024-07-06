<?php
    require 'fbase_dbcon.php';
    require_once 'login.header.php';
?>
	<!--header-->
	<div class="header-w3l">
		<h1>
			<span>L</span>aboratories and
			<span>S</span>hops
			<span>D</span>epartment
        </h1>
	</div>
	<!--//header-->
	<div class="main-content-agile">
		<div class="sub-main-w3">
			<h2>Login Here</h2>
			<form id="loginForm" method="post" action="login.php" data-toggle="validator">
				<div class="pom-agile">
					<span class="fa-solid fa-user" aria-hidden="true"></span>
					<input placeholder="Email" id="name" name="name" class="user" type="email" value="" required>
					<div class="invalid-feedback"></div>
				</div>
				<div class="pom-agile">
					<span class="fa-solid fa-lock" aria-hidden="true"></span>
					<input placeholder="Password" id="password" name="password" class="pass" type="password" required>
				</div>
				<div class="sub-w3l">
					<!--<div class="sub-agile">
						<input type="checkbox" id="brand1" value="">
						<label for="brand1">
							<span></span>Remember me</label>
					</div>
					<a href="#">Forgot Password?</a>
					<div class="clear"></div>-->
				</div>
				<div class="right-w3l">
					<input type="submit" name="login" value="Login"/>
				</div>
			</form>
		</div>
	</div>
	<!--//main-->
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
	<script src="assets/js/login.js" type="text/javascript"></script>
	<script src="assets/js/validator.min.js"></script>
	<!--footer-->
	<div class="footer">
		<p>&copy; 2018 T.I.P Laboratories and Shops Department Monitoring Schedule</p> 
		<p>All rights reserved. Technological Institute of the Philippines</p>
	</div>
	<!--//footer-->
    
</body>
</html>