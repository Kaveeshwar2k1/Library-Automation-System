<?php

//e_material.php

include '../database_connection.php';

include '../function.php';

if(!is_admin_login())
{
	header('location:../admin_login.php');
}

$message='';

$error='';

if(isset($_POST["add_resource"]))
{
	$formdata= array();

	if(empty($_POST["resource_name"]))
	{
		$error .= '<li>Resource Name is required</li>';
	}
	else
	{
		$formdata['resource_name'] = trim($_POST["resource_name"]);
	}
	if(empty($_POST["resource_category"]))
	{
		$error .= '<li>Resource Category is required</li>';
	}
	else
	{
		$formdata['resource_category'] = trim($_POST["resource_category"]);
	}
	if(empty($_POST["resource_link"]))
	{
		$error .= '<li>Link is required</li>';
	}
	else
	{
		$formdata['resource_link'] = trim($_POST["resource_link"]);
	}
	if(empty($_POST["resource_type"]))
	{
		$error .= '<li>Resource type is required</li>';
	}
	else
	{
		$formdata['resource_type'] = trim($_POST["resource_type"]);
	}

	if($error == '')
	{
		$data = array(
			':resource_name'		=>	$formdata['resource_name'],
			':resource_link'		=>	$formdata['resource_link'],
			':resource_category'	=>	$formdata['resource_category'],
			':resource_type'		=>	$formdata['resource_type'],
			':resource_status'		=>	'Enable'
		);
		$query = "
		INSERT INTO lms_ematerial
        (resource_name, resource_category, link, resource_type, resource_status) 
        VALUES (:resource_name, :resource_category, :resource_link, :resource_type, :resource_status)
		";

		$statement = $connect->prepare($query);

		$statement->execute($data);

		header('location:e_material.php?msg=add');
	}
}

if(isset($_POST["edit_resource"]))
{
	$formdata= array();

	if(empty($_POST["resource_name"]))
	{
		$error .= '<li>Resource Name is required</li>';
	}
	else
	{
		$formdata['resource_name'] = trim($_POST["resource_name"]);
	}
	if(empty($_POST["resource_category"]))
	{
		$error .= '<li>Resource Category is required</li>';
	}
	else
	{
		$formdata['resource_category'] = trim($_POST["resource_category"]);
	}
	if(empty($_POST["resource_link"]))
	{
		$error .= '<li>Link is required</li>';
	}
	else
	{
		$formdata['resource_link'] = trim($_POST["resource_link"]);
	}
	if(empty($_POST["resource_type"]))
	{
		$error .= '<li>Resource type is required</li>';
	}
	else
	{
		$formdata['resource_type'] = trim($_POST["resource_type"]);
	}

	if($error == '')
	{
		$data = array(
			':resource_name'		=>	$formdata['resource_name'],
			':resource_link'		=>	$formdata['resource_link'],
			':resource_category'	=>	$formdata['resource_category'],
			':resource_type'		=>	$formdata['resource_type'],
			':resource_status'		=>	'Enable',
			':resource_id'			=>	$_POST["resource_id"]
		);
		$query = "
		UPDATE lms_ematerial 
		SET resource_name = :resource_name,
		link = :resource_link,
		resource_category = :resource_category,
        resource_type = :resource_type,
		resource_status= :resource_status  
        WHERE resource_id = :resource_id
		";

		$statement = $connect->prepare($query);

		$statement->execute($data);

		header('location:e_material.php?msg=edit');
	}
}

if(isset($_GET["action"], $_GET["code"], $_GET["status"]) && $_GET["action"] == 'delete')
{
	$resource_id = $_GET["code"];
	$status = $_GET["status"];

	$data = array(
		':resource_status'		=>	$status,
		':resource_id'			=>	$resource_id
	);

	$query = "
	UPDATE lms_ematerial 
    SET resource_status = :resource_status 
    WHERE resource_id = :resource_id
	";

	$statement = $connect->prepare($query);

	$statement->execute($data);

	header('location:e_material.php?msg='.strtolower($status).'');
}

$query = 
		"SELECT * FROM lms_ematerial 
		ORDER BY resource_id DESC";
$statement=$connect->prepare($query);
$statement->execute();

include '../header.php';

?>

<div class="container-fluid py-4" style="min-height: 700px;">
	<h1>E-Materials</h1>
	<?php
		if(isset($_GET["action"]))
		{
			if($_GET["action"]=='add')
			{
	?>
	<ol class="breadcrumb mt-4 mb-4 bg-light p-2 border">
		<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="e_material.php">E-Material</a></li>
        <li class="breadcrumb-item active">Add Resource</li>
    </ol>
	<?php
	
		if($error != '')
			{
			echo '<div class="alert alert-danger alert-dismissible fade show" role="alert"><ul class="list-unstyled">'.$error.'</ul> <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
			}		

	?>
	<div class="card mb-4">
    	<div class="card-header">
    		<i class="fas fa-user-plus"></i> Add New Resource
        </div>
        <div class="card-body">
			<form method="post">
        		<div class="row">
        			<div class="col-md-6">
        				<div class="mb-3">
        					<label class="form-label">Resource name</label>
        					<input type="text" name="resource_name" id="resource_name" class="form-control" />
        				</div>
        			</div>
        			<div class="col-md-6">
        				<div class="mb-3">
        					<label class="form-label">Resource type</label>
							<input type="text" name="resource_type" id="resource_type" class="form-control" />
        				</div>
        			</div>
        		</div>
        		<div class="row">
        			<div class="col-md-6">
        				<div class="mb-3">
        					<label class="form-label">Select Category</label>
        					<select name="resource_category" id="resource_category" class="form-control">
        						<?php echo fill_category($connect); ?>
        					</select>
        				</div>
        			</div>
        			<div class="col-md-6">
        				<div class="mb-3">
        					<label class="form-label">Link</label>
        					<input type="text" name="resource_link" id="resource_link" class="form-control" />
        				</div>
        			</div>
        		</div>
        		<div class="mt-4 mb-3 text-center">
        			<input type="submit" name="add_resource" class="btn btn-success" value="Add" />
        		</div>
        	</form>
		</div>
	</div>	
	<?php
			}
			else if($_GET["action"] == 'edit')
			{
			$resource_id = convert_data($_GET["code"], 'decrypt');

			if($resource_id > 0)
			{
				$query = "
				SELECT * FROM lms_ematerial 
                WHERE resource_id = '$resource_id'
				";

				$ematerial_result = $connect->query($query);

				foreach($ematerial_result as $resource_row)
				{
	?>
	<ol class="breadcrumb mt-4 mb-4 bg-light p-2 border">
		<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="e_material.php">E-Material Management</a></li>
        <li class="breadcrumb-item active">Edit Resource</li>
    </ol>
    <div class="card mb-4">
    	<div class="card-header">
    		<i class="fas fa-user-plus"></i> Edit Resource Details
       	</div>
       	<div class="card-body">
			<form method="post">
        		<div class="row">
        			<div class="col-md-6">
        				<div class="mb-3">
        					<label class="form-label">Resource name</label>
        					<input type="text" name="resource_name" id="resource_name" class="form-control" value="<?php echo $resource_row['resource_name']; ?>" />
        				</div>
        			</div>
        			<div class="col-md-6">
        				<div class="mb-3">
        					<label class="form-label">Resource type</label>
							<input type="text" name="resource_type" id="resource_type" class="form-control" value="<?php echo $resource_row['resource_type']; ?>" />
        				</div>
        			</div>
        		</div>
        		<div class="row">
        			<div class="col-md-6">
        				<div class="mb-3">
        					<label class="form-label">Select Category</label>
        					<select name="resource_category" id="resource_category" class="form-control">
        						<?php echo fill_category($connect); ?>
        					</select>
        				</div>
        			</div>
        			<div class="col-md-6">
        				<div class="mb-3">
        					<label class="form-label">Link</label>
        					<input type="text" name="resource_link" id="resource_link" class="form-control" value="<?php echo $resource_row['link']; ?>" />
        				</div>
        			</div>
        		</div>
        		<div class="mt-4 mb-3 text-center">
					<input type="hidden" name="resource_id" value="<?php echo $resource_row['resource_id']; ?>" />
        			<input type="submit" name="edit_resource" class="btn btn-success" value="Edit" />
        		</div>
        	</form>
			<script>
       			document.getElementById('resource_category').value = "<?php echo $resource_row['resource_category']; ?>";
       		</script>
       	</div>
   	</div>
	<?php
				}
			}
		}
	}
	else
	{
	?>

	<ol class="breadcrumb mt-4 mb-4 bg-light p-2 border">
		<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
        <li class="breadcrumb-item">E-Materials</a></li>
    </ol>
	<?php
		if(isset($_GET["msg"]))
		{
			if($_GET["msg"] == 'add')
			{
				echo '<div class="alert alert-success alert-dismissible fade show" role="alert">New Resource Added<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
			}
			if($_GET['msg'] == 'edit')
			{
				echo '<div class="alert alert-success alert-dismissible fade show" role="alert">Resource data Edited <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
			}
			if($_GET["msg"] == 'disable')
			{
				echo '<div class="alert alert-success alert-dismissible fade show" role="alert">Resource Status Changed to Disable <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
			}
			if($_GET['msg'] == 'enable')
			{
				echo '<div class="alert alert-success alert-dismissible fade show" role="alert">Resource Status Changed to Enable <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
			}
		}
	?>
	<div class="card mb-4">
		<div class="card-header">
			<div class="row">
				<div class="col col-md-6">
					<i class="fas fa-table me-1"></i> E-Materials
                </div>
                <div class="col col-md-6" align="right">
                	<a href="e_material.php?action=add" class="btn btn-success btn-sm">Add</a>
                </div>
            </div>
        </div>
		<div class="card-body">
        	<table id="datatablesSimple">
        		<thead> 
        			<tr> 
						<th>Resource Name</th>
        				<th>Link</th>
        				<th>Category</th>
        				<th>Type</th>
						<th>Status</th>
        				<th>Action</th>
        			</tr>
        		</thead>
        		<tfoot>
        			<tr>
        				<th>Resource Name</th>
        				<th>Link</th>
        				<th>Category</th>
        				<th>Type</th>
        				<th>Action</th>
						<th>Status</th>
        			</tr>
        		</tfoot>
        		<tbody>
        		<?php 

        		if($statement->rowCount() > 0)
        		{
        			foreach($statement->fetchAll() as $row)
        			{
        				$resource_status = '';
        				if($row['resource_status'] == 'Enable')
        				{
        					$resource_status = '<div class="badge bg-success">Enable</div>';
        				}
        				else
        				{
        					$resource_status = '<div class="badge bg-danger">Disable</div>';
        				}
        				echo '
        				<tr>
        					<td>'.$row["resource_name"].'</td>
        					<td><a class="btn btn-sm btn-info text-center" href="'.$row["link"].'" target="_blank">Link</a></td>
        					<td>'.$row["resource_category"].'</td>
							<td>'.$row["resource_type"].'</td>
							<td>'.$row["resource_status"].'</td>
        					<td>
							<a href="e_material.php?action=edit&code='.convert_data($row["resource_id"]).'" class="btn btn-sm btn-primary">Edit</a>
        					<button type="button" name="delete_button" class="btn btn-danger btn-sm" onclick="delete_data(`'.$row["resource_id"].'`, `'.$row["resource_status"].'`)">Delete</button>
							</td>
        				</tr>
        				';
        			}
        		}
        		else
        		{
        			echo '
        			<tr>
        				<td colspan="10" class="text-center">No Data Found</td>
        			</tr>
        			';
        		}

        		?>
        		</tbody>
        	</table>
        </div>
	</div>
	<script>
		
		function delete_data(code, status)
    	{
    		var new_status = 'Enable';
    		if(status == 'Enable')
    		{
    			new_status = 'Disable';
    		}

    		if(confirm("Are you sure you want to "+new_status+" this Category?"))
    		{
    			window.location.href = "e_material.php?action=delete&code="+code+"&status="+new_status+"";
    		}
    	}
	</script>
	<?php 
	}	
	?>
</div>	




<?php

include '../footer.php';

?>