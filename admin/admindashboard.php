<!-- Some of the functionalities that the admin is having are:

Manage users: The admin can view, edit, delete, and ban users from the website.
Manage categories: The admin can create, edit, and delete categories for the products.
Manage products: The admin can view, edit, approve, reject, and delete products posted by the users.
Manage reports: The admin can view and resolve the reports submitted by the users for any inappropriate content or behavior.
Manage settings: The admin can change the website settings such as logo, name, description, contact details, etc. -->

<html>

<head>
  <title>Admin Home Page</title>
  <!-- Bootstrap CDN -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
  <!-- include nav bar  -->
  <?php include 'adminnavbar.php'; ?>

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <h1 class="text-center mt-4">Welcome <?php echo $_SESSION['adminname'] ?> to OLX Admin Dashboard</h1>
        <p class="text-center">Here you can manage your online marketplace website.</p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3">
        <div class="card bg-primary text-white mb-4">
          <div class="card-body">
            <?php
            $c1 = $users->count();
            ?>
            <h3>Total Users</h3>
            <h4><?php echo $c1; ?></h4>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card bg-success text-white mb-4">
          <div class="card-body">
            <?php
            // $q2 = "select * from categories";
            // $s2 = mysqli_query($con, $q2);
            // $c2 = mysqli_num_rows($s2);
            $c2 = $categories->count();
            ?>
            <h3>Total Categories</h3>
            <h4><?php echo $c2; ?></h4>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card bg-warning text-white mb-4">
          <div class="card-body">
            <?php
            // $q3 = "select * from items";
            // $s3 = mysqli_query($con, $q3);
            // $c3 = mysqli_num_rows($s3);
            $c3 = $items->count();
            ?>
            <h3>Total Products</h3>
            <h4><?php echo $c3; ?></h4>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card bg-danger text-white mb-4">
          <div class="card-body">
            <?php
            // $q4 = "select * from reports";
            // $s4 = mysqli_query($con, $q4);
            // $c4 = mysqli_num_rows($s4);
            $c4 = $reports->count();
            ?>
            <h3>Total Reports</h3>
            <h4><?php echo $c4; ?></h4>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="card mb-4">
          <div class="card-header">
            <h4>Users</h4>
          </div>
          <div class="card-body">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                // while ($r1 = mysqli_fetch_assoc($s1)) {
                $cursor = $users->find();
                foreach ($cursor as $r1) {
                ?>
                  <tr>
                    <td><?php echo $r1['userid']; ?></td>
                    <td><?php echo $r1['username']; ?></td>
                    <td><?php echo $r1['useremail']; ?></td>
                    <td><?php echo $r1['userphone']; ?></td>
                    <td><?php echo $r1['status']; ?></td>
                    <td><a href="action.php?userid=<?php echo $r1['userid']; ?>" class="btn btn-sm btn-info">
                        <?php
                        if ($r1['status'] == 'active') {
                          echo "Block";
                        } else {
                          echo "Unblock";
                        }
                        ?>
                      </a></td>
                  </tr>
                <?php
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card mb-4">
          <div class="card-header">
            <h4>Reports</h4>
          </div>
          <div class="card-body">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Report ID</th>
                  <th>Status</th>
                  <th>Action</th>
                  <th>ViewReport</th>
                </tr>
              </thead>
              <tbody>
                <?php

                // while ($r4 = mysqli_fetch_assoc($s4)) {
                $cursor2 = $reports->find();
                foreach ($cursor2 as $r4) {
                ?>
                  <tr>
                    <td><?php echo $r4['reportid']; ?></td>
                    <td><?php echo $r4['reportstatus']; ?></td>
                    <td><a href="reportaction.php?reportid=<?php echo $r4['reportid']; ?>" class="btn btn-sm btn-info">
                        <?php
                        if ($r4['reportstatus'] == "pending") {
                          echo "Close";
                        } else {
                          echo "Open";
                        }
                        ?>
                      </a></td>
                    <td><a href="viewreport.php?reportid=<?php echo $r4['reportid']; ?>">View</a></td>
                  </tr>
                <?php
                }
                ?>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap CDN -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>