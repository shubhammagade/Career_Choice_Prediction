<?php
session_start();
if (isset($_SESSION['logged']) && $_SESSION['logged'] == true) {
    require('includes/conn.php');
    $today = date("Y-m-d");
} else {
    header('location: login.php');
}

$job_array = array(
    0 => 'AI ML Specialist',
    1 => 'API Integration Specialist',
    2 => 'Application Support Engineer',
    3 => 'Business Analyst',
    4 => 'Customer Service Executive',
    5 => 'Cyber Security Specialist',
    6 => 'Data Scientist',
    7 => 'Database Administrator',
    8 => 'Graphics Designer',
    9 => 'Hardware Engineer',
    10 => 'Helpdesk Engineer',
    11 => 'Information Security Specialist',
    12 => 'Networking Engineer',
    13 => 'Project Manager',
    14 => 'Software Developer',
    15 => 'Software Tester',
    16 => 'Technical Writer'
);
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - Intelligent Career Guidance System </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">


    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <?php require('includes/header.php') ?>

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">
                    <span class="page-title-icon bg-gradient-primary text-white me-2">
                        <i class="mdi mdi-home"></i>
                    </span> Reports
                </h3>
            </div>

            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Users Prediction Reports</h4>
                            </p>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Sr.NO</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Prediction Result</th>
                                        <th scope="col">Prediction Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM `predict_report` ORDER BY id";
                                    $result = mysqli_query($conn, $sql);
                                    $sr = 1;
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo '<tr>
                        <th scope="row">' . $sr . '</th>
                        <td>' . $row['username'] . '</td>
                        '; ?>
                                        <td>
                                            <ol>
                                                <?php
                                                $list = json_decode($row['predata']);
                                                for ($i = 0; $i < count($list); $i++) {
                                                    echo '<li>' . $job_array[$list[$i]] . '</li>';
                                                }
                                                ?>
                                            </ol>
                                        </td>

                                    <?php echo '<td>' . $row['date'] . '</td>
                    </tr>';
                                        $sr++;
                                    }
                                    ?>



                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- </div> -->


            <?php require('includes/footer.php') ?>

        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

    <script src="main.js"></script>

    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>

    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- End custom js for this page -->
</body>

</html>