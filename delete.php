<?php 

	include 'model.php';
	$model = new Model();
	$NIM = $_REQUEST['NIM'];
	$delete = $model->delete($NIM);

	if ($delete) {
		echo "<script>alert('delete successfully');</script>";
		echo "<script>window.location.href = 'records.php';</script>";
	}

 ?>