<?php include(INCLUDESPATH . 'header.php'); ?>
<style>
	body {
		background-color: #212529;
	}

	@media (min-width: 991.98px) {
		main {
			padding-left: 240px;
		}
	}

	/* Sidebar */
	.sidebar {
		position: fixed;
		top: 0;
		bottom: 0;
		left: 0;
		padding: 58px 0 0;
		/* Height of navbar */
		box-shadow: 0 2px 5px 0 rgb(0 0 0 / 5%), 0 2px 10px 0 rgb(0 0 0 / 5%);
		width: 240px;
		z-index: 600;
	}

	@media (max-width: 991.98px) {
		.sidebar {
			width: 100%;
		}
	}

	.sidebar .active {
		border-radius: 5px;
		box-shadow: 0 2px 5px 0 rgb(0 0 0 / 16%), 0 2px 10px 0 rgb(0 0 0 / 12%);
	}

	.sidebar-sticky {
		position: relative;
		top: 0;
		height: calc(100vh - 48px);
		padding-top: 0.5rem;
		overflow-x: hidden;
		overflow-y: auto;
		/* Scrollable contents if viewport is shorter than content. */
	}

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
//side panel
<!--Main Navigation-->
<header>
	<!-- Sidebar -->
	<nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
		<div class="position-sticky ">
			<div class="list-group list-group-flush mx-3 mt-4">
				<a href="#" class="list-group-item list-group-item-action py-2 ripple" aria-current="true">
					<a href="<?= BOOK_PATH ?>index" class="list-group-item list-group-item-action py-2 ripple active">
						<i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Main dashboard</span>
					</a>
					<!-- <a href="#" class="list-group-item list-group-item-action py-2 ripple active">
		  <i class="fas fa-chart-area fa-fw me-3"></i><span>CRUD OPERATION</span>
		</a> -->
					<!-- <a href="#" class="list-group-item list-group-item-action py-2 ripple"
		  ><i class="fas fa-lock fa-fw me-3"></i><span>Password</span></a
		> -->
					<!-- <a href="<?= LOGUSER_BOOK_PATH ?>" class="list-group-item list-group-item-action py-2 ripple"><i
							class="fas fa-chart-line fa-fw me-3"></i><span>LOGS</span></a> -->
					<a href="<?= BOOK_PATH ?>addBook" class="list-group-item list-group-item-action py-2 ripple">
						<i class=""></i><span>AddBook</span>
					</a>

			</div>
		</div>
	</nav>
	<!-- Sidebar -->

	<!-- Navbar -->
	<nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
		<!-- Container wrapper -->
		<div class="container-fluid">
			<!-- Toggle button -->
			<button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#sidebarMenu"
				aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
				<i class="fas fa-bars"></i>
			</button>

			<!-- Brand -->
			<a class="navbar-brand" href="#">
				<!-- <img src="https://media.licdn.com/dms/image/C510BAQEiiy8o3rYQAA/company-logo_200_200/0/1577174386416?e=2147483647&v=beta&t=8mwX2XuITuBqerzKQiBGYaSsMdKsEMCwi31VrtqTcbA"
					height="50" alt="MDB Logo" loading="lazy" /> -->
			</a>
			<!-- Search form -->
			<form class="d-none d-md-flex input-group w-auto my-auto">
				<h2>CI4 CRUD OPERATIONS</h2>

			</form>

			<!-- Right links -->
			<ul class="navbar-nav ms-auto d-flex flex-row">
				<!-- Notification dropdown -->
				<li class="nav-item dropdown">
					<a class="nav-link me-3 me-lg-0 dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink"
						role="button" data-mdb-toggle="dropdown" aria-expanded="false">
						<i class="fas fa-bell"></i>
						<span class="badge rounded-pill badge-notification bg-danger">1</span>
					</a>
					<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
						<li>
							<a class="dropdown-item" href="#">Some news</a>
						</li>
						<li>
							<a class="dropdown-item" href="#">Another news</a>
						</li>
						<li>
							<a class="dropdown-item" href="#">Something else here</a>
						</li>
					</ul>
				</li>

				<!-- Icon -->
				<li class="nav-item">
					<a class="nav-link me-3 me-lg-0" href="#">
						<i class="fas fa-fill-drip"></i>
					</a>
				</li>
				<!-- Icon -->
				<li class="nav-item me-3 me-lg-0">
					<a class="nav-link" href="#">
						<i class="fab fa-github"></i>
					</a>
				</li>

				<!-- Icon dropdown -->
				<li class="nav-item dropdown">
					<a class="nav-link me-3 me-lg-0 dropdown-toggle hidden-arrow" href="#" id="navbarDropdown"
						role="button" data-mdb-toggle="dropdown" aria-expanded="false">
						<i class="flag-united-kingdom flag m-0"></i>
					</a>
					<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
						<li>
							<a class="dropdown-item" href="#"><i class="flag-united-kingdom flag"></i>English
								<i class="fa fa-check text-success ms-2"></i></a>
						</li>
						<li>
							<hr class="dropdown-divider" />
						</li>
						<li>
							<a class="dropdown-item" href="#"><i class="flag-poland flag"></i>Polski</a>
						</li>
						<li>
							<a class="dropdown-item" href="#"><i class="flag-china flag"></i>中文</a>
						</li>
						<li>
							<a class="dropdown-item" href="#"><i class="flag-japan flag"></i>日本語</a>
						</li>
						<li>
							<a class="dropdown-item" href="#"><i class="flag-germany flag"></i>Deutsch</a>
						</li>
						<li>
							<a class="dropdown-item" href="#"><i class="flag-france flag"></i>Français</a>
						</li>
						<li>
							<a class="dropdown-item" href="#"><i class="flag-spain flag"></i>Español</a>
						</li>
						<li>
							<a class="dropdown-item" href="#"><i class="flag-russia flag"></i>Русский</a>
						</li>
						<li>
							<a class="dropdown-item" href="#"><i class="flag-portugal flag"></i>Português</a>
						</li>
					</ul>
				</li>

				<!-- Avatar -->
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle hidden-arrow d-flex align-items-center" href="<?= USER_PATH ?>"
						id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
						<img src="https://www.shutterstock.com/image-vector/logout-vector-icon-illustration-web-260nw-1888955368.jpg"
							class="rounded-circle" height="30" alt="Avatar" loading="lazy" />
					</a>
					<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
						<li>
							<a class="dropdown-item" href="#">My profile</a>
						</li>
						<li>
							<a class="dropdown-item" href="#">Settings</a>
						</li>
						<li>
							<a class="dropdown-item" href="#">Logout</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
		<!-- Container wrapper -->
	</nav>
	<!-- Navbar -->
</header>
<!--Main Navigation-->

<!--Main layout-->
<main style="margin-top: 58px;">
	<div class="container pt-4"></div>
</main>
Main layout
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

<body style="background-color:  #8cb2a1">
	<div class="col-sm-12">
		<div class="col-sm-8 offset-3   ">
			<div class="container">
				<!-- <h1 class="page-header text-center text-light p-3 mb-2 bg-white text-dark">CI4 CRUD OPERATIONS</h1> -->

				<div class="row">
					<div class="col-sm-4 col-sm-offset-4">
						<h3>Add Book
							<span class="pull-right"><a href="<?php echo BOOK_PATH; ?>" class="btn btn-primary"><span
										class="glyphicon glyphicon-arrow-left"></span>Back</a></span>
						</h3>
						<hr>
						<form>
							<div class="form-group">
								<label>Title:</label>
								<input type="text" class="form-control" onkeyup="innertextInput()" name="title"
									id="title">
								<h5 id="titlecheck"></h5>
							</div>
							<div class="form-group">
								<label>Isbn_no:</label>
								<input type="text" class="form-control" onkeyup="innertextInput1()" name="isbn_no"
									id="isbn_no">
								<h5 id="isbn_nocheck"></h5>
							</div>
							<div class="form-group">
								<label>Author :</label>
								<input type="text" class="form-control" onkeyup="innertextInput2()" name="author"
									id="author">
								<h5 id="authorcheck"></h5>
							</div>
							<div class="form-group">
								<label>Select Image (224 X 224) Dimensions</label>
								<div class="custom-file">
									<input name="component_image" type="file" class="custom-file-input"
										id="component_image">
									<label class="custom-file-label" for="customFile">Choose Image</label>
								</div>
							</div>
							<div class="toggle">
								<input type="checkbox" name="toggle" id="toggle" />
								<label>&nbsp;&nbsp;&nbsp;OFF/ON</label>
							</div>
							<span onclick="myFunction()" class="btn btn-primary"><span
									class="glyphicon glyphicon-floppy-disk"></span> Save</span>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">



		function innertextInput() {
			var regularExpression = "^[A-Za-z][A-Za-z0-9_]{4,29}$";
			var title = document.getElementById("title").value;
			if (title.match(regularExpression)) {
				document.getElementById("title").style.color = 'green';
				document.getElementById("title").innerHTML = 'Valid Title !!';
				toastr.success("Valid Title !!", 'New Message', { timeOut: 2000 });
				document.getElementById("title").style.color = 'green';
				return true;
			}
			else {
				document.getElementById("title").style.color = 'red';
				document.getElementById("title").innerHTML = 'Invalid title please enter valid title !!'
				toastr.error("Invalid title please enter valid title !!", 'New Message', { timeOut: 1000 });
				document.getElementById("title").style.color = 'red';
				return false;
			}
			console.log();
		}

		function innertextInput1() {
			var regularExpression = "(?:[0-9]{9}X|[0-9]{10})$";
			var isbn = document.getElementById("isbn_no").value;
			if (isbn.match(regularExpression)) {
				document.getElementById("isbn_no").style.color = 'green';
				document.getElementById("isbn_nocheck").innerHTML = 'Valid isbn_no !!';
				toastr.success("Valid isbn_no !!", 'New Message', { timeOut: 2000 });
				document.getElementById("isbn_no").style.color = 'green';
				return true;
			}
			else {
				document.getElementById("isbn_no").style.color = 'red';
				document.getElementById("isbn_no").innerHTML = 'Invalid isbn_no please enter valid isbn_no !!'
				toastr.error("Invalid isbn_no please enter valid isbn_no !!", 'New Message', { timeOut: 1000 });
				document.getElementById("isbn_no").style.color = 'red';
				return false;
			}
			console.log();
		}
		function innertextInput2() {
			var regularExpressions = "^[A-Za-z][A-Za-z0-9_]{4,29}$";
			var author = document.getElementById("author").value;
			if (name.match(regularExpressions)) {

				document.getElementById("author").style.color = 'red';
				document.getElementById("author").innerHTML = ' without special characters !!'
				toastr.error("without special characters !!", 'New Message', { timeOut: 1000 });
				document.getElementById("author").style.color = 'red';
				return false;
			}
			else {
				document.getElementById("author").style.color = 'green';
				document.getElementById("author").innerHTML = 'Enter valid author Name !!';
				toastr.success("Enter valid  author Name !!", 'New Message', { timeOut: 2000 });
				document.getElementById("author").style.color = 'green';
				return true;
			}
			console.log();
		}


	</script>
	<script>
		function myFunction() {
			// alert("allo function");  
			var title = $("#title").val();
			var isbn_no = $("#isbn_no").val();
			var author = $("#author").val();
			var status = $('#toggle').is(':checked');

			var component_image = $('#component_image')[0].files[0];


			var formData = new FormData();
			formData.append("title", title);
			formData.append("isbn_no", isbn_no);
			formData.append("author", author);
			formData.append("status", status);
			formData.append("component_image", component_image);

			swal("Are sure you want to add data", {
				dangerMode: true,
				buttons: true,
			}).then(function (status) {
				if (status) {
					$.ajax({
						url: "<?php echo BOOK_PATH; ?>add_book_action",
						enctype: "multipart/form-data",
						type: "POST",
						crossDomain: true,
						data: formData,
						cache: false,
						contentType: false,
						processData: false,
						success: function (data) {
							console.log(data)
							// alert(data);
							if (data.success == true) {
								swal("Data saved succefully", "", "success", {
									button: "ok",

								}).then(function () {

									window.location.href = "<?= BOOK_PATH ?>"
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


</body>

</html>
<?php include(INCLUDESPATH . 'footer.php'); ?>