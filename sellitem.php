<?php
include 'dbcon.php';
session_start();
?>
<html>

<head>
    <title> SELL item FORM</title>
    <link rel="stylesheet" type="text/css" href="userloginstyle.css">
</head>

<body>
    <div class="login-root">
        <div class="box-root flex-flex flex-direction--column" style="min-height: 100vh;flex-grow: 1;">
            <div class="loginbackground box-background--white padding-top--64">
                <div class="loginbackground-gridContainer">
                    <div class="box-root flex-flex" style="grid-area: top / start / 8 / end;">
                        <div class="box-root" style="background-image: linear-gradient(white 0%, rgb(247, 250, 252) 33%); flex-grow: 1;">
                        </div>
                    </div>
                    <div class="box-root flex-flex" style="grid-area: 4 / 2 / auto / 5;">
                        <div class="box-root box-divider--light-all-2 animationLeftRight tans3s" style="flex-grow: 1;"></div>
                    </div>
                    <div class="box-root flex-flex" style="grid-area: 6 / start / auto / 2;">
                        <div class="box-root box-background--blue800" style="flex-grow: 1;background-color:#7e313c"></div>
                    </div>
                    <div class="box-root flex-flex" style="grid-area: 7 / start / auto / 4;">
                        <div class="box-root box-background--blue animationLeftRight" style="flex-grow: 1;background-color:#ff4c68"></div>
                    </div>
                    <div class="box-root flex-flex" style="grid-area: 8 / 4 / auto / 6;">
                        <div class="box-root box-background--gray100 animationLeftRight tans3s" style="flex-grow: 1;background-color:#ec92a0"></div>
                    </div>
                    <div class="box-root flex-flex" style="grid-area: 2 / 15 / auto / end;">
                        <div class="box-root box-background--cyan200 animationRightLeft tans4s" style="flex-grow: 1;background-color:#ec92a0"></div>
                    </div>
                    <div class="box-root flex-flex" style="grid-area: 3 / 14 / auto / end;">
                        <div class="box-root box-background--blue animationRightLeft" style="flex-grow: 1;background-color:#ff4c68"></div>
                    </div>
                    <div class="box-root flex-flex" style="grid-area: 4 / 17 / auto / 20;">
                        <div class="box-root box-background--gray100 animationRightLeft tans4s" style="flex-grow: 1;background-color:#ec9fab"></div>
                    </div>
                    <div class="box-root flex-flex" style="grid-area: 5 / 14 / auto / 17;">
                        <div class="box-root box-divider--light-all-2 animationRightLeft tans3s" style="flex-grow: 1;"></div>
                    </div>
                </div>
            </div>
            <div class="box-root padding-top--24 flex-flex flex-direction--column" style="flex-grow: 1; z-index: 9;">
                <div class="box-root padding-top--48 padding-bottom--24 flex-flex flex-justifyContent--center">
                    <h1 style="color:rgb(255, 136, 0)">SELL YOUR PRODUCT </h1>
                </div>
                <div class="formbg-outer">
                    <div class="formbg">
                        <div class="formbg-inner padding-horizontal--48">
                            <form action="validateitem.php" method="post" id="stripe-login" enctype="multipart/form-data">
                                <div class="field padding-bottom--24">
                                    <label for="categorySelect" style="color:rgb(255, 136, 0)">Select Category:</label>
                                    <select class="form-control" id="categorySelect" name="itemcategory" style="box-shadow:0 0 2px #ff4c68;color:rgb(255, 136, 0)" required>
                                        <?php
                                        $categoriesCursor = $categories->find();
                                        foreach ($categoriesCursor as $cr) {
                                        ?>
                                            <option value="<?php echo $cr['categoryname']; ?>"><?php echo $cr['categoryname']; ?></option>
                                        <?php
                                        }
                                        ?>

                                    </select>
                                </div>
                                <div class="field padding-bottom--24">
                                    <label for="itemName" style="color:rgb(255, 136, 0)">Item Name:</label>
                                    <input type="text" class="form-control" id="itemName" placeholder="Enter Item Name" name="itemname" style="box-shadow:0 0 2px #ff4c68" required>
                                </div>
                                <div class="field padding-bottom--24">
                                    <label for="condition" style="color:rgb(255, 136, 0)">Condition of product :</label>
                                    <input type="text" class="form-control" id="condition" placeholder="Enter Condition" name="itemcondition" style="box-shadow:0 0 2px #ff4c68" required>
                                </div>
                                <div class="field padding-bottom--24">
                                    <label for="description" style="color:rgb(255, 136, 0)">Description:</label>
                                    <textarea class="form-control" id="description" rows="3" placeholder="Enter Description" name="itemdescription" required style="box-shadow:0 0 2px #ff4c68"></textarea>
                                </div>
                                <div class="field padding-bottom--24">
                                    <label for="price" style="color:rgb(255, 136, 0)">Price (INR):</label>
                                    <input type="text" class="form-control" id="price" placeholder="Enter Price" name="itemprice" style="box-shadow:0 0 2px #ff4c68" required>
                                </div>
                                <div class="field padding-bottom--24">
                                    <label for="itemPics" style="color:rgb(255, 136, 0)">Item Picture :</label>
                                    <input type="file" class="form-control" id="itemPic" name="itempic" accept=".jpg,.jpeg,.png" style="box-shadow:0 0 2px #ff4c68" required>
                                </div>
                                <div class="field padding-bottom--24">
                                    <input type="submit" name="submit" value="Continue" style="background-color:rgb(255, 136, 0)">
                                </div>
                                <div class="field padding-bottom--24">
                                    <div class="field padding-bottom--24">
                                        <input type="button" onclick="window.location.href='index.php'" value="Go Back" style="background-color: #ff4c68; color: white; cursor: pointer; border: none; padding: 10px 20px; border-radius: 5px; transition: background-color 0.3s ease;">
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>