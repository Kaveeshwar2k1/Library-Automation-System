<?php

//index.php

include '../database_connection.php';

include '../function.php';

if(!is_admin_login())
{
	header('location:../admin_login.php');
}


include '../header.php';

?>

<div class="container-fluid py-4">
	<h1 class="mb-5">Dashboard</h1>
	<div class="row">
		<div class="col-xl-4 col-md-6">
			<div class="card bg-primary text-white mb-4">
				<div class="card-body">
					<h1 class="text-center"><?php echo Count_total_issue_book_number($connect); ?></h1>
					<h5 class="text-center">Books Issued</h5>
				</div>
			</div>
		</div>
		<div class="col-xl-4 col-md-6">
			<div class="card bg-warning text-white mb-4">
				<div class="card-body">
					<h1 class="text-center"><?php echo Count_total_returned_book_number($connect); ?></h1>
					<h5 class="text-center">Books Returned</h5>
				</div>
			</div>
		</div>
		<div class="col-xl-4 col-md-6">
			<div class="card bg-danger text-white mb-4">
				<div class="card-body">
					<h1 class="text-center"><?php echo Count_total_not_returned_book_number($connect); ?></h1>
					<h5 class="text-center">Books Not Returned</h5>
				</div>
			</div>
		</div>
		<!--<div class="col-xl-3 col-md-6">
			<div class="card bg-success text-white mb-4">
				<div class="card-body">
					<h1 class="text-center"><?php echo get_currency_symbol($connect) . Count_total_fines_received($connect); ?></h1>
					<h5 class="text-center">Fines Received</h5>
				</div>
			</div>
		</div>-->
		<div class="col-xl-4 col-md-6">
			<div class="card bg-success text-white mb-4">
				<div class="card-body">
					<h1 class="text-center"><?php echo Count_total_book_number($connect); ?></h1>
					<h5 class="text-center">Books</h5>
				</div>
			</div>
		</div>
		<div class="col-xl-4 col-md-6">
			<div class="card bg-danger text-white mb-4">
				<div class="card-body">
					<h1 class="text-center"><?php echo Count_total_author_number($connect); ?></h1>
					<h5 class="text-center">Authors</h5>
				</div>
			</div>
		</div>
		<div class="col-xl-4 col-md-6">
			<div class="card bg-warning text-white mb-4">
				<div class="card-body">
					<h1 class="text-center"><?php echo Count_total_category_number($connect); ?></h1>
					<h5 class="text-center">Categories</h5>
				</div>
			</div>
		</div>
		<div class="col-xl-4 col-md-6 offset-md-4">
			<div class="card bg-info text-white mb-4">
				<div class="card-body">
					<h1 class="text-center"><?php echo count_ematerial($connect); ?></h1>
					<h5 class="text-center">E-Materials</h5>
				</div>
			</div>
		</div>
		<!--<div class="col-xl-3 col-md-6">
			<div class="card bg-primary text-white mb-4">
				<div class="card-body">
					<h1 class="text-center"><?php echo Count_total_location_rack_number($connect); ?></h1>
					<h5 class="text-center">Location Racks</h5>
				</div>
			</div>
		</div>-->
	</div>
</div>

<?php

include '../footer.php';

?>