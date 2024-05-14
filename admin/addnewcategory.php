<?php
include '../dbcon.php';
if (isset($_POST['addcat'])) {
  $newcat = $_POST['newcat'];
  $pic = $_FILES['newcatlogo'];
  $picname = $pic['name'];
  $picpath = $pic['tmp_name'];
  $picerror = $pic['error'];
  $dest = '../images/' . $picname;
  move_uploaded_file($picpath, $dest);
  // $query = "INSERT INTO categories (categoryname,categorylogo) VALUES ('$newcat','$dest'); ";
  // $run = mysqli_query($con, $query);
  $catid = 0;
  $maxUser = $categories->findOne([], ['sort' => ['categoryid' => -1]]);

  if ($maxUser) {
    $catid =  $maxUser['categoryid'] + 1;
  } else {
    $catid = 1;
  }
  $insertOneResult = $categories->insertOne([
    'categoryname' => $newcat,
    'categorylogo' => $dest, 'categoryid' => $catid,
  ]);
?>
  <script>
    alert("category inserted");
    location.replace('categories.php');
  </script>
<?php
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ADD NEW CATEGORY (ADMIN)</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']) ?>" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="categoryName">Enter new category name</label>
            <input type="text" class="form-control" id="categoryName" placeholder="Category name" name="newcat">
          </div>
          <div class="form-group">
            <label for="categorylogo">Select Category Logo</label>
            <input type="file" class="form-control" id="categoryLogo" name="newcatlogo" accept=".jpg,.png,.jpeg">
          </div>

          <input type="submit" class="btn btn-success" value="Submit" name="addcat">
        </form>
      </div>
    </div>
  </div>

</body>

</html>