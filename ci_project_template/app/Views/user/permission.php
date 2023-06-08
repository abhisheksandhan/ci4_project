 <?php include(INCLUDESPATH . 'header.php'); ?>
<style>
  body {
    background-color: #302F2F;
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
<Main Navigation>
<header>
  <!-- Sidebar -->
  <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white  ">
    <div class="position-sticky">
      <div class="list-group list-group-flush mx-3 mt-4 ">
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
      
            

          </a><a href="<?= BOOK_PATH?>" class="list-group-item list-group-item-action py-2 ripple">
            <i class="bi bi-book"></i></span>Back</a></span>
          </a>

          <!-- <a href="" class="list-group-item list-group-item-action py-2 ripple">
            <i class="bi bi-book"></i><span>Permission</span>
          </a> -->
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
      </a>
      <!-- Search form -->
      <form class="d-none d-md-flex input-group w-auto my-auto">
        <h2> CI4 CRUD OPERATIONS</h2>

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
          <a class="nav-link me-3 me-lg-0 dropdown-toggle hidden-arrow" href="#" id="navbarDropdown" role="button"
            data-mdb-toggle="dropdown" aria-expanded="false">
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
          <a class="nav-link dropdown-toggle hidden-arrow d-flex align-items-center" onclick="logout()"
            id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
            <img
              src="https://www.shutterstock.com/image-vector/logout-vector-icon-illustration-web-260nw-1888955368.jpg"
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

<body style="background-color: #212529 ">
  <div class="col-sm-12">
    <div class="col-sm-8 offset-3   ">
      <div class="cotainer-fluid bg-purple">
        <!-- <div class="container pb-2 pt-2">
            <h2>CI4 CRUD OPERATIONS</h2>
        </div> -->
      </div>
      <div class=" shadow-sm">
        <div class="container">
          <div class="row">
            <!-- <nav class="nav nav nav-underline">
                    <a class="btn btn-success" href="<?= BOOK_PATH ?>addBook">Add Book</a>
                </nav> -->
          </div>

        </div>
      </div>
      <div class="container">
        <div class="row">
          <div></div>
          <div class="card">
            <div class="card-header bg-purple text-white">
              <div class="card-header-title p-3 mb-2 bg-info text-white">Books</div>
            </div>
            <div class="card-body">
              <table class="table table-striped">
                <tr>
                  <th>ID</th>
                  <th>username</th>
                  <th>admin</th>
                  <th>logs</th>
                  <th>AddBook</th>
                  <th>EditBook</th>
                  <th>DeleteBook</th>

                
                </tr>
                <tbody>
                  <?php

                  foreach ($employee_edit as $user) { ?>
                    <tr>
                      <td>
                        <?= $user['id'] ?>
                      </td>
                      <td>
                        <?= $user['email'] ?>
                      </td>
                      <td>
                      <div class="toggle">
                          <input type="checkbox" name="toggle" id="toggle"
                            onchange="changeStatus(<?= $user['id'] ?>, <?= $user['admin'] ?>)"
                            <?php if ($user['admin']) {
                              echo "checked";
                          } ?> />
                          <label>&nbsp;&nbsp;&nbsp;</label>
                        </div>
                      </td>
                      <td>
                      <div class="toggle">
                          <input type="checkbox" name="toggle1" id="toggle1"
                            onchange="changelogs(<?= $user['id'] ?>, <?= $user['logs'] ?>)"
                            <?php if ($user['logs']) {
                              echo "checked";
                          } ?> />
                          <label>&nbsp;&nbsp;&nbsp;</label>
                        </div>
                      </td>
                      <td>
                      <div class="toggle">
                          <input type="checkbox" name="toggle2" id="toggle2"
                            onchange="changebook(<?= $user['id'] ?>,<?= $user['AddBook'] ?>)"
                            <?php if ($user['AddBook']) {
                              echo "checked";
                          } ?> />
                          <label>&nbsp;&nbsp;&nbsp;</label>
                        </div>
                      </td>
                      <td>
                       <div class="toggle">
                          <input type="checkbox" name="toggle3" id="toggle3"
                            onchange="changeeditbook(<?= $user['id'] ?>,<?= $user['EditBook'] ?>)"
                            <?php if ($user['EditBook']) {
                              echo "checked";
                          } ?> />
                          <label>&nbsp;&nbsp;&nbsp;</label>
                        </div>
                      </td>
                      <td>
                       <div class="toggle">
                          <input type="checkbox" name="toggle4" id="toggle4"
                            onchange="changedeletebook(<?= $user['id'] ?>,<?= $user['DeleteBook'] ?>)"
                            <?php if ($user['DeleteBook']) {
                              echo "checked";
                          } ?> />
                          <label>&nbsp;&nbsp;&nbsp;</label>
                        </div>
                      </td>
                  
                    </tr>
                  <?php } ?>

                </tbody>

              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    function changeStatus(id,  admin) {
      admin = admin ? 0: 1;
      swal("Are you sure want to Update data", {
        dangerMode: true,
        buttons: true,
      }).then(function (ok) {
        if (ok) {

          $.ajax({
            url: "<?php echo BOOK_PATH; ?>adminAction",
            type: "POST",
            dataType: "json",
            crossDomain: true,
            data: JSON.stringify({
              "id": id,
              "admin": admin,
            }),


            success: function (data) {
              console.log(data)

              if (data.success == true) {
                swal("Data updated succefully", "", "success", {
                  button: "ok",

                }).then(function () {

                  window.location.href = "<?= USER_PATH ?>permission"
                  window.location.reload();
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
    function changelogs(id,  logs) {
      logs = logs ? 0: 1;
      swal("Are you sure want to Update data", {
        dangerMode: true,
        buttons: true,
      }).then(function (ok) {
        if (ok) {

          $.ajax({
            url: "<?php echo BOOK_PATH; ?>logsAction",
            type: "POST",
            dataType: "json",
            crossDomain: true,
            data: JSON.stringify({
              "id": id,
              "logs": logs,
            }),


            success: function (data) {
              console.log(data)

              if (data.success == true) {
                swal("Data updated succefully", "", "success", {
                  button: "ok",

                }).then(function () {

                  window.location.href = "<?= USER_PATH ?>permission"
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
    function changebook(id,  Addbook) {
      Addbook = Addbook ? 0: 1;
      swal("Are you sure want to Update data", {
        dangerMode: true,
        buttons: true,
      }).then(function (ok) {
        if (ok) {

          $.ajax({
            url: "<?php echo BOOK_PATH; ?>bookAction",
            type: "POST",
            dataType: "json",
            crossDomain: true,
            data: JSON.stringify({
              "id": id,
              "Addbook": Addbook,
            }),


            success: function (data) {
              console.log(data)

              if (data.success == true) {
                swal("Data updated succefully", "", "success", {
                  button: "ok",

                }).then(function () {

                  window.location.href = "<?= USER_PATH ?>permission"
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
    function changeeditbook(id,  EditBook) {
      EditBook =EditBook ? 0: 1;
      swal("Are you sure want to Update data", {
        dangerMode: true,
        buttons: true,
      }).then(function (ok) {
        if (ok) {

          $.ajax({
            url: "<?php echo BOOK_PATH; ?>EditAction",
            type: "POST",
            dataType: "json",
            crossDomain: true,
            data: JSON.stringify({
              "id": id,
              "EditBook": EditBook,
            }),


            success: function (data) {
              console.log(data)

              if (data.success == true) {
                swal("Data updated succefully", "", "success", {
                  button: "ok",

                }).then(function () {

                  window.location.href = "<?= USER_PATH ?>permission"
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
    function changedeletebook(id,  DeleteBook) {
      DeleteBook = DeleteBook ? 0: 1;
      swal("Are you sure want to Update data", {
        dangerMode: true,
        buttons: true,
      }).then(function (ok) {
        if (ok) {

          $.ajax({
            url: "<?php echo BOOK_PATH; ?>DeleteAction",
            type: "POST",
            dataType: "json",
            crossDomain: true,
            data: JSON.stringify({
              "id": id,
              "DeleteBook": DeleteBook,
            }),


            success: function (data) {
              console.log(data)

              if (data.success == true) {
                swal("Data updated succefully", "", "success", {
                  button: "ok",

                }).then(function () {

                  window.location.href = "<?= USER_PATH ?>permission"
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

    function logout() {
            $.ajax({
                url: "<?php echo USER_PATH; ?>logout",
                method: 'GET',
                dataType: 'json',
                success: function (response) {
                    swal("Logout successfull", "", "success", {
                        button: "ok",
                        position: 'center',

                    }).then(function () {

                        window.location.href = "<?= USER_PATH ?>"
                    });
                },
                error: function (xhr, status, error) {
                    alert("error");
                }
            });
        }
    
   
  </script>
</body>



  <?php include(INCLUDESPATH . 'footer.php'); ?> 