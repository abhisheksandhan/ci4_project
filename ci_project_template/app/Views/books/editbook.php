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
			<h3>Edit Form
				<span class="pull-right"><a href="<?php echo BOOK_PATH; ?>" class="btn btn-primary"><span
							class="glyphicon glyphicon-arrow-left"></span> Back</a></span>
			</h3>
			<hr>

			<form>
				<div class="form-group">
					<!-- <label>Id:</label> -->
					<input type="hidden" class="form-control" name="id" id="id" value="<?= $employee_edit['id'] ?>">
				</div>
				<div class="form-group">
					<label>Title:</label>
					<input type="text" class="form-control" name="title" id="title"
						value="<?= $employee_edit['title'] ?>">
				</div>
				<div class="form-group">
					<label>Isbn_no:</label>
					<input type="text" class="form-control" name="isbn_no" id="isbn_no"
						value="<?= $employee_edit['isbn_no'] ?>">
				</div>
				<div class="form-group">
					<label>Autho :</label>
					<input type="text" class="form-control" name="author" id="author"
						value="<?= $employee_edit['author'] ?>">
				</div>
				<td><img src="<?php echo FETCH_IMAGE; ?>component/<?= $employee_edit['img'] ?>"
						style="heigth:50px;width:50px;"></td>
				<div class="form-group">
					<label>Select Image (224 X 224) Dimensions</label>
					<div class="custom-file">
						<input name="component_image" type="file" class="custom-file-input" id="component_image">
						<label class="custom-file-label" for="customFile">Choose Image</label>
					</div>
				</div>
				<div class="toggle">
					<input type="checkbox" name="toggle" id="toggle" />
					<label>&nbsp;&nbsp;&nbsp;OFF/ON</label>
				</div>


				<span onclick="myFunction()" class="btn btn-info"><span class="glyphicon glyphicon-check"></span>
					Update</span>
			</form>
		</div>
	</div>
</div>
<script>

	function myFunction() {
		// alert("allo function");  
		var id = $("#id").val();
		var title = $("#title").val();
		var isbn_no = $("#isbn_no").val();
		var author = $("#author").val();
		var component_image = $('#component_image')[0].files[0];
		var status = $("#toggle").is(':checked');

		status = status ? 1 : 0;
		var formData = new FormData();

		formData.append("id", id);
		formData.append("title", title);
		formData.append("isbn_no", isbn_no);
		formData.append("author", author);
		formData.append("status", status)
		formData.append("component_image", component_image);

		swal("Are sure you want to Edit data", {
			dangerMode: true,
			buttons: true,
		}).then(function (ok) {
			if (ok) {

				$.ajax({
					url: "<?php echo BOOK_PATH; ?>editBookAction",
					enctype: "multipart/form-data",
					type: "POST",
					crossDomain: true,
					data: formData,
					cache: false,
					contentType: false,
					processData: false,


					success: function (data) {
						console.log(data)

						if (data.success == true) {
							swal("Data updated succefully", "", "success", {
								button: "ok",

							}).then(function () {

								window.location.href = "<?= BOOK_PATH ?>"
								// window.location.reload();
							});


						}
					},
					error: function (data) {
						console.log("error is" + data);
					}
				})

			}
			else {
				swal("Process cancelled", "", "success", {
					button: "ok",

				});
			}
		});


	}
</script>
<?php include(INCLUDESPATH . 'footer.php'); ?>