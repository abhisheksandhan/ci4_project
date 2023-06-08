<?php include(INCLUDESPATH . 'header.php'); ?>


<body>

    <div class="container">
            <div class="row mt-3">
                <div class="col-md-4 offset-4">
                
                    <h4> Sign Up</h4>
                    <hr>

                    <form >

                        <div class="form-group"> 
                            <label class="form-label" for="username">Name</label> </label>
                            <span id="error_name" class="text-danger ms-3"> </span>
                            <input required type="text" 
                                onkeypress="innertextInput()"
                                class="form-control" 
                                name="username"  
                                id="username"
                                placeholder="Enter Your Name Here" >
                                
                            </input>
                        </div>

                        <div class="form-group"> 
                            <label class="form-label" for="email">Email</label>
                            <span id="error_email" class="text-danger ms-3"  > </span>
                            <input required type="text" 
                                onkeypress="innertextInput1()"
                                class="form-control" 
                                name="email"
                                id="email"
                                placeholder="Enter Your Email Here" >
                            </input>
                        </div>

                        <div class="form-group mb-3"> 
                            <label class="form-label" for="password">Password</label>
                            <span id="error_password" class="text-danger ms-3"> </span>
                            <input required type="password"
                                onkeypress="innertextInput2()" 
                                class="form-control" 
                                name="password" 
                                id="password"
                                placeholder="Enter Your Password Here" >
                            </input>
                        </div>

                        <label>
                            <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
                        </label>
                        <div class="form-group mb-3">
                            <input type="checkbox" name="admintoggle" id="admintoggle" />
                            <label for="admin">admin</label>
                            <label>&nbsp;&nbsp;&nbsp;OFF/ON</label>
                        </div>

                        <div class="form-group mb-3">
                            <input type="checkbox" name="logstoggle" id="logstoggle" />
                            <label for="logs">logs </label>
                            <label>&nbsp;&nbsp;&nbsp;OFF/ON</label>
                        </div>

                        <div class="form-group mb-3">

                            <button onclick="myFunction()" class="btn btn-primary btn-lg">Register </button>
                        </div>

                    </form>

                    <br>
                    <p class="small fw-bold mt-2 pt-1 mb-0">Already registered? 
                        <a href="<?php echo USER_PATH ?>index" class="link-danger">login here
                        </a>
                    </p>

                </div>
            </div>
        </div>



    <script>
        function myFunction() {
            var username = $("#username").val();
            var email = $("#email").val();
            var password = $("#password").val();
            var status = $('#admintoggle').is(':checked');
            var logstatus = $('#logstoggle').is(':checked');
            // alert(username);
            $.ajax({
                url: "<?php echo USER_PATH; ?>addUser",
                type: "POST",
                dataType: "json",
                crossDomain: true,
                data: JSON.stringify({
                    "username": username,
                    "email": email,
                    "password": password,
                    "admin": status,
                    "logs": logstatus,

                }),


                success: function (data) {
                    console.log(data)
                    // alert(data);
                    if (data.success == true) {
                    swal("Registered Sucessfully", "", "success", {
                        button: "ok",

                    }).then(function () {

                        window.location.href = "<?= USER_PATH ?>index"
                    });

                    }
                },
                error: function (data) {
                    console.log("error is" + data);
                }
            })
        }

    </script>
    <script>
        function innertextInput() {
            var regularExpression = "^[A-Za-z][A-Za-z0-9_]{3,30}$";
            var name = document.getElementById("username").value;
            if (name.match(regularExpression)) {
                document.getElementById("username").style.color = 'green';
                document.getElementById("username").innerHTML = 'Valid Username!';
                toastr.success("Valid Username!", 'New Message', { timeOut: 2000 });
                document.getElementById("username").style.color = 'green';
                return true;
            }
            else {
                document.getElementById("username").style.color = 'red';
                document.getElementById("username").innerHTML = 'Invalid username please enter valid username!'
                toastr.error("Invalid username please enter valid username!", 'New Message', { timeOut: 1000 });
                document.getElementById("username").style.color = 'red';
                return false;
            }
            console.log();
        }
        
        function innertextInput1() {
        	var regularExpression = "/\S+@\S+\.\S+/";
        	var name = document.getElementById("email").value;
        	if (name.match(regularExpression)) {
        		document.getElementById("email").style.color = 'green';
        		document.getElementById("email").innerHTML = 'Valid Email!';
        		toastr.success("Valid Email!", 'New Message', { timeOut: 2000 });
        		document.getElementById("email").style.color = 'green';
        		return true;
        	}
        	else {
        		document.getElementById("email").style.color = 'red';
        		document.getElementById("email").innerHTML = 'Invalid email please enter valid email!'
        		toastr.error("Invalid email please enter valid email!", 'New Message', { timeOut: 1000 });
        		document.getElementById("email").style.color = 'red';
        		return false;
        	}
        	console.log();
        }

        function innertextInput2() {
            var regularExpression = "[a-zA-Z0-9!@#$%^&*]{4,20}$";
            var name = document.getElementById("password").value;
            if (name.match(regularExpression)) {
                document.getElementById("password").style.color = 'green';
                document.getElementById("password").innerHTML = 'Valid Password!';
                toastr.success("Valid Password!", 'New Message', { timeOut: 2000 });
                document.getElementById("password").style.color = 'green';
                return true;
            }
            else {
                document.getElementById("password").style.color = 'red';
                document.getElementById("password").innerHTML = 'Invalid password please enter valid password!'
                toastr.error("Invalid password please enter valid password!", 'New Message', { timeOut: 1000 });
                document.getElementById("password").style.color = 'red';
                return false;
            }
            console.log();
        }
    </script>
</body>

</html>
<?php include(INCLUDESPATH . 'footer.php'); ?>