
<?php include(INCLUDESPATH . 'header.php'); ?>
<style>
	.toggle {
		position: relative;
	}

	.toggle input[type="checkbox"] {
		position: absolute;
		left: 0;
		top: 0;
		z-index: 10;
		width: 100%;
		height: 100%;
		cursor: pointer;
		opacity: 0;
	}

	.toggle label {
		position: relative;
		display: flex;
		align-items: center;
	}

	.toggle label:before {
		content: '';
		width: 50px;
		height: 20px;
		background: #ccc;
		position: relative;
		display: inline-block;
		border-radius: 46px;
		transition: 0.2s ease-in;
	}

	.toggle label:after {
		content: '';
		position: absolute;
		width: 30px;
		height: 30px;
		border-radius: 50%;
		left: 0;
		top: -5px;
		z-index: 2;
		background: #fff;
		box-shadow: 0 0 5px #0002;
		transition: 0.2s ease-in;
	}

	.toggle input[type="checkbox"]:hover+label:after {
		box-shadow: 0 2px 15px 0 #0002, 0 3px 5px 0 #0001;
	}

	.toggle input[type="checkbox"]:checked+label:before {
		background: #376fcb;
	}

	.toggle input[type="checkbox"]:checked+label:after {
		background: #4285F4;
		left: 25px;
	}
</style>
<div class="container">
	<h1 class="page-header text-center">CI4 CRUD OPERATIONS</h1>
	<span class="pull-right"><a href="<?php echo BOOK_PATH; ?>"></a></span>
	<div class="row ">
		<div class="col-sm-4 col-sm-offset-4">
			<h3>Join operation of two tables 
				<span class="pull-right"><a href="<?php echo BOOK_PATH; ?>" class="btn btn-primary"><span
							class="glyphicon glyphicon-arrow-left"></span> Back</a></span>
			</h3>
			<hr>

			<form>
                
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped">
                            <tr class="myhead">
                                <th scope="col">Country</th>
                                <th scope="col">State</th>
                            </tr>
							<tbody>
								<?php
								foreach($list as $user){  ?>
								<tr>
									<td> <?= $user['country_name'] ?> </td>
									<td> <?= $user['state_name'] ?> </td>
								</tr>
								<?php  } ?> 
							</tbody>
                        </table>
                    </div>
                </div>
			</form>

		</div>
	</div>
</div>

<script>

    console.log("<?php print_r($list) ?>")
</script>

<?php include(INCLUDESPATH . 'footer.php'); ?>