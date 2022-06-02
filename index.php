<?php

include 'database_connection.php';
include 'function.php';

if(is_user_login())
{
	header('location:issue_book_details.php');
}

include 'header.php';

?>


<div class="row align-items-md-stretch position-relative bg-image rounded-3" style="background-image: url('http://localhost/upload/back.jpeg');height: 590px;">

	<div class="col-md-5 position-absolute end-50">
	<br><br><br><br><br><br><br><br><br><br>
		<div class="h-100 p-5 text-dark bg-light rounded-3 opacity-75">

			<h2>Admin Login</h2>
			<p></p>
			<a href="admin_login.php" class="btn btn-outline-dark">Admin Login</a>

		</div>
	</div>

	<div class="col-md-5 position-absolute start-50">
	<br><br><br><br><br><br><br><br><br><br>
		<div class="h-100 p-5 text-dark bg-light rounded-3 opacity-75">

			<h2>User Login</h2>

			<p></p>

			<a href="user_login.php" class="btn btn-outline-dark">User Login</a>

			<a href="user_registration.php" class="btn btn-outline-primary">User Sign Up</a>

		</div>

	</div>

</div>


<?php

include 'footer.php';

?>