<?php include(INCLUDESPATH . 'header.php'); ?>

<br>
<br>
<br>

<body>

    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">

            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <form>
                    <!-- Email input -->
                    <div class="form-group"> 
                        <label for="">Email</label>
                        <input type="text" 
                            class="form-control form-control-lg" 
                            name="email" 
                            id="email"
                            placeholder="Email here" required>
                        </input>
                    </div>


                    <!-- Password input -->
                    <div class="form-group mb-3"> 
                        <label for="">Password</label>
                        <input type="password" 
                            class="form-control form-control-lg" 
                            name="password" 
                            id="password"
                            placeholder="password here" required>
                        </input>
                    </div>

                    <div class="form-group mb-3">
                        <!-- Checkbox -->
                        <div class="form-check mb-2">
                            <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                            <label class="form-check-label" for="form2Example3">
                                Remember me
                            </label>
                        </div>
                        <a href="#!" class="text-body">Forgot password?</a>
                    </div>

                    <div class="text-center text-lg-start mt-4 pt-2">
                        <button type="button" class="btn btn-primary btn-lg"
                            style="padding-left: 2.5rem; padding-right: 2.5rem; " onclick="myFunction()">Login</button>
                        <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a
                                href="<?php echo USER_PATH ?>register" class="link-danger">Register
                            </a></p>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <script>
        function myFunction() {
            var email = $("#email").val();
            var password = $("#password").val();
            $.ajax({
                url: "<?php echo USER_PATH; ?>verifyUser",
                type: "POST",
                dataType: "json",
                crossDomain: true,
                data: JSON.stringify({
                    "email": email,
                    "password": password,
                }),


                success: function (data) {
                    console.log(data)
                    // alert(data);
                    if (data.success == true) {
                        swal("Log In successful ", "", "success", {
                            button: "ok",

                        }).then(function () {

                            window.location.href = "<?= BOOK_PATH ?>";
                        });

                    }
                    else {
                        swal("Email or Password is incorrect please retry", "", "success", {
                            button: "ok",
                            icon: "error",
                            position: 'center',

                        });
                    }
                },
                error: function (data) {
                    console.log("error is" + data);

                    swal("Email or Password is incorrect please retry", "", "success", {
                        button: "ok",
                        icon: "error",
                        position: 'center',

                    });

                }
            })
        }

    </script>
</body>
<?php include(INCLUDESPATH . 'footer.php'); ?>