<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Categories Setting (ADMIN)</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    .cat {
      margin-top: 100px;
    }

    .but {
      text-align: center;
    }

    th {
      text-align: center;
    }

    td {
      text-align: center;
    }
  </style>
</head>

<body>
  <?php include 'adminnavbar.php'; ?>
  <?php
  include '../dbcon.php';
  // $query = "select * from categories";
  // $selected = mysqli_query($con, $query);
  ?>

  <div class="container">
    <div class="row cat">
      <div class="col-md-12">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Category ID</th>
              <th>Category Name</th>
              <th colspan="2">Operation</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $r = $categories->find();
            // while ($res = mysqli_fetch_assoc($selected)) {
            foreach ($r as $res) {
            ?>
              <tr>
                <td><?php echo $res['categoryid'] ?></td>
                <td><?php echo $res['categoryname'] ?></td>
                <td><button type="button" class="btn btn-warning" onclick="window.location.href = 'updatecategory.php?catid=<?php echo $res['categoryid'] ?>'">Update</button></td>
                <td><button type="button" class="btn btn-danger" onclick="window.location.href = 'deletecategory.php?catid=<?php echo $res['categoryid'] ?>'">Delete</button></td>
              </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
    <div class="row but">
      <div class="col-md-12">
        <button type="button" class="btn btn-danger" onclick="window.location.href = 'deleteallcategories.php'">Delete all categories</button>
        <button type="button" class="btn btn-primary" onclick="window.location.href = 'addnewcategory.php'">Add new category</button>
      </div>
    </div>
  </div>

</body>

</html>