<?php

//search_book.php

include 'database_connection.php';

include 'function.php';

if(!is_user_login())
{
	header('location:user_login.php');
}
if(get_cred($connect) >= 50){
	$query = "
	SELECT * FROM lms_ematerial 
    WHERE resource_status = 'Enable' 
    ORDER BY resource_id DESC
";
} 
else {
	$query = "
	SELECT * FROM lms_ematerial 
    WHERE resource_status = 'Enable' 
	AND resource_type != 'Project' 
    ORDER BY resource_id DESC
";
}

$statement = $connect->prepare($query);

$statement->execute();


include 'header.php';

?>

<div class="container-fluid py-4" style="min-height: 700px;">
	
	<h1>E Material</h1>
	<?php 
	if(get_cred($connect) < 50){
		echo '<h3 class="text-danger">Project files cannot be accessed due to less credit scores</h3><br>';
	}
	?>

	<div class="card mb-4">
		<div class="card-header">
			<div class="row">
				<div class="col col-md-6">
					<i class="fas fa-table me-1"></i> Resource List
				</div>
				<div class="col col-md-6" align="right">

				</div>
			</div>
		</div>
		<div class="card-body">
			<table id="datatablesSimple">
				<thead>
					<tr>
						<th>Resource</th>
						<th>Link</th>
						<th>Category</th>
						<th>Type</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
                        <th>Resource</th>
						<th>Link</th>
						<th>Category</th>
						<th>Type</th>
					</tr>
				</tfoot>
				<tbody>
				<?php 

				if($statement->rowCount() > 0)
				{
					foreach($statement->fetchAll() as $row)
					{
						/* $book_status = '';
						if($row['book_no_of_copy'] > 0)
						{
							$book_status = '<div class="badge bg-success">Available</div>';
						}
						else
						{
							$book_status = '<div class="badge bg-danger">Not Available</div>';
						} */
						if ($row["resource_status"] == "Enable"){
						echo '
							<tr>
								<td>'.$row["resource_name"].'</td>
								<td><a class="btn btn-sm btn-info text-center" href="'.$row["link"].'" target="_blank">Link</a></td>
								<td>'.$row["resource_category"].'</td>
								<td>'.$row["resource_type"].'</td>
							</tr>
						';}
					}
				}
				else
				{
					echo '
					<tr>
						<td colspan="8" class="text-center">No Data Found</td>
					</tr>
					';
				}

				?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php 

include 'footer.php';

?>