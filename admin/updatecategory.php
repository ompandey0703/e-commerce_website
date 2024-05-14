<?php
include '../dbcon.php';
$catid = (int) $_GET['catid'];
// $select = "select * from categories where categoryid='$catid'";
// $selected = mysqli_query($con, $select);
// $res = mysqli_fetch_assoc($selected);

$res = $categories->findOne(['categoryid' => $catid]);

if (isset($_POST['update'])) {
  $newcat = $_POST['updatedcat'];
  $id = (int)$_GET['id'];
  echo isset($_FILES['updatedcatlogo']);
  if (isset($_FILES['updatedcatlogo']) && $_FILES['updatedcatlogo']['error'] === UPLOAD_ERR_OK) {
    $newpic = $_FILES['updatedcatlogo'];
    $newpicname = $newpic['name'];
    $newpicpath = $newpic['tmp_name'];
    $newpicerror = $newpic['error'];
    $newpicdest = 'images/' . $newpicname;
    move_uploaded_file($newpicpath, $newpicdest);
    // $query = "update categories set categoryname='$newcat',categorylogo='$newpicdest' where categoryid='$id'";
    // $run = mysqli_query($con, $query);
    $updateResult = $categories->updateMany(
      ['categoryid' => $id], // Filter to find the user by useremail
      ['$set' => ['categoryname' => $newcat, 'categorylogo' => $newpicdest]] // Update the username field
    );
    if ($updateResult->getModifiedCount() > 0) {
?>
      <script>
        alert("category updated successfully and logo also changed");
        location.replace('categories.php');
      </script>
    <?php
    } else {
    ?>
      <script>
        alert("category not updated");
        location.replace("categories.php");
      </script>
    <?php
    }
  } else {
    // $query = "update categories set categoryname='$newcat' where categoryid='$id'";
    // $run = mysqli_query($con, $query);
    $updateResult = $categories->updateOne(
      ['categoryid' => $id], // Filter to find the user by useremail
      ['$set' => ['categoryname' => $newcat]] // Update the username field
    );
    if ($updateResult->getModifiedCount() > 0) {
    ?>
      <script>
        alert("category updated successfully but logo is unchanged");
        location.replace('categories.php');
      </script>
    <?php
    } else {
    ?>
      <script>
        alert("category not updated");
        location.replace("categories.php");
      </script>
<?php
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update category(admin)</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <form action="updatecategory.php?id=<?php echo $catid ?>" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="categoryName">Update the category name</label>
            <input type="text" class="form-control" id="categoryName" placeholder="Category name" value="<?php echo $res['categoryname'] ?>" name="updatedcat">
          </div>
          <div class="form-group">
            <label for="categoryLogo">Update the category Logo (Optional)</label>
            <input type="file" class="form-control" id="categoryLogo" accept=".png,.jpg,.jpeg" name="updatedcatlogo">
          </div>

          <input type="submit" class="btn btn-success" value="Submit" name="update">
        </form>
      </div>
    </div>
  </div>

</body>

</html>