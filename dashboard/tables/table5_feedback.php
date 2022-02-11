<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin|DigitalID</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="styletable.css">
</head>

<body class="hold-transition skin-purple sidebar-mini">
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="../dashboard.php?username=<?php echo $username=$_GET['username'];?>" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>AD</b>ID</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>Admin</b>DigitalID</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">

                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="../dist/img/avatar6.png" class="user-image" alt="User Image">
                                <span class="hidden-xs">
                                    <?php
                                    $username = $_GET['username'];
                                    echo $username;
                                    ?>

                                </span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="../dist/img/avatar6.png" class="img-circle" alt="User Image">
                                    <p>
                                        <?php
                                    $host = "localhost";
                                    $user = "root";
                                    $passw = "";
                                    $db = "digitalid";
                                    $conn = new mysqli($host, $user, $passw, $db);

                                    if (mysqli_connect_error()) {
                                    die('Connect Error(' . mysqli_connect_errno() . ')' . mysqli_connect_error());
                                    $ok = false;
                                    } else {
                                    $sql = "SELECT staff.fullname, department.name from staff,department where username = '" . $username . "' and department.departmentID = staff.departmentID";

                                    $result = mysqli_query($conn, $sql);
                                    $count = mysqli_num_rows($result);

                                    if (($count) == 1) {
                                        //$row = mysqli_fetch_assoc($result);
                                        //$hash = $row['password'];

                                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                                        echo  $row["fullname"];
                                        echo "<small><br>" . $row["name"] . "</small>";
                                    } else {
                                        echo "no result";
                                        exit();
                                    }
                                    }
                                    $conn->close();

                                    ?>

                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="../logout.php" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <!-- Control Sidebar Toggle Button -->
                        <li>
                            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="../dist/img/avatar6.png" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p>
                            <?php
              $username = $_GET['username'];
              echo $username;
              ?>
                        </p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
                <!-- search form -->
                <form action="#" method="get" class="sidebar-form">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i
                                    class="fa fa-search"></i></button>
                        </span>
                    </div>
                </form>
                <!-- /.search form -->
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="active treeview">
                        <a href="../dashboard.php?username=<?php echo $username=$_GET['username'];?>">
                            <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i
                                class="fa fa-angle-left pull-right"></i>
                        </a>

                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-user-plus" aria-hidden="true"></i>
                            <span>Digital ID registration</span>
                            <span class="label fa fa-angle-left pull-right">4</span>
                        </a>
                        <ul class="treeview-menu">

                            <li><a href="table1_pending.php?username=<?php echo $username=$_GET['username'];?>"><i
                                        class="fa fa-circle-o"></i> Pending</a></li>
                            <li><a href="table2_approved.php?username=<?php echo $username=$_GET['username'];?>"><i
                                        class="fa fa-circle-o"></i> Approved</a></li>
                            <li><a href="table3_rejected.php?username=<?php echo $username=$_GET['username'];?>"><i
                                        class="fa fa-circle-o"></i> Rejected</a></li>
                        </ul>
                    </li>
                    <li>
                        </a>
                    </li>


                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-files-o"></i> <span>Report on missing/stolen</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="table4_report.php?username=<?php echo $username=$_GET['username'];?>"><i class="fa fa-circle-o"></i> Missing/Lost</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-comments-o "></i> <span>Feedback/Complaint</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="#"><i class="fa fa-circle-o"></i> Feedbacks and Complaints</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="../src/verify.html">
                            <i class="fa fa-envelope"></i> <span>Blockchain</span>
                            <small class="label pull-right bg-yellow">12</small>
                        </a>
                    </li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Digital ID Feedback/Complaint
                    <small>control panel</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-comments-o"></i> Feedback</a></li>
                    <li class="active">feedback/complaint</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Complaints</h3>
                            </div><!-- /.box-header -->
                            <div class="box-body">
                                <table id="example5" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ComplaintID</th>
                                            <th>Email</th>
                                            <th>Fullname</th>
                                            <th>Comment</th>
                                            <th>User ID</th>
                                           
                                            <th>Resolved</th>
                
                                        </tr>
                                    </thead>
                                    <tbody id="data">


                                    </tbody>
                                    <tfoot>

                                    </tfoot>
                                </table>
                            </div><!-- /.box-body -->
                            <div class="box-header">
                                <h3 class="box-title">Feedback</h3>
                            </div><!-- /.box-header -->
                            <div class="box-body">
                                <table id="example6" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>FeedbackID</th>
                                            <th>Email</th>
                                            <th>Fullname</th>
                                            <th>Comment</th>
                                            <th>User ID</th>
                
                                        </tr>
                                    </thead>
                                    <tbody id="data">


                                    </tbody>
                                    <tfoot>

                                    </tfoot>
                                </table>
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </section><!-- /.content -->
        </div><!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>FYPDigitalID</strong>
        </footer>

        <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <script src="../plugins/fastclick/fastclick.min.js"></script>
    <script src="../dist/js/app.min.js"></script>
    <script src="../dist/js/demo.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {

        var table = $("#example5").DataTable({
         //'processing': true,
               //'serverSide': true,
             // 'serverMethod': 'post',
             'ajax': {
                    'url':'complaint.php',
                    'cache': false,
                    'dataSrc': "", 
                },
           
                "columns":[
                     {"data":"feedbackID"},
                    {"data":"email"},
                    {"data":"fullname"},
                    {"data":"comment"},
                    {"data":"userID"},
                    {"defaultContent": 
                        "<button type='btn_reply' id='btn_reply' class='btn-danger btn-xs remove_details'>Resolve</button> &nbsp<input type='textbox' id='myInput'>"
                       
                    }
                  ],
              
        });
        $('#example5 tbody').on('click','#btn_reply',function(e){
           // var text = $('#myInput').val();
           var text = $(this.closest("tr")).find("td:eq(5) input[type='textbox'] ").val();
        
            var stringtext = JSON.stringify(text);
            var feedbackid = $(this.closest("tr")).find("td:eq(0)").text();
          
            //alert(text);
            if(stringtext.length > 2){
            $.ajax({
                url:'complaint.php',
                method:'post',
                data: {feedback: stringtext, feedbackid:feedbackid},
            success: function (response, status, xhr) {
            console.log("response was " + response);
            alert("Successfully replied");
            location.reload();
            },
            error: function (xhr, status, error) {
                console.error(xhr);
            },
             
            });
            }else{
                alert("Invalid reply");
            }
        });

        var table2 = $("#example6").DataTable({
            'ajax': {
                    'url':'feedback.php',
                    'cache': false,
                    'dataSrc': "", 
                },
           
                "columns":[
                    {"data":"feedbackID"},
                    {"data":"email"},
                    {"data":"fullname"},
                    {"data":"comment"},
                    {"data":"userID"},
              ],
              
        });       
       
    });
    </script>
</body>

</html>