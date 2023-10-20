<?php
    include_once("function.php");

    //Object creation
    $updatedata = new DB_con();

    if (isset($_POST['update'])) {
        // Get the userid
        $userid = intval($_GET['id']);

        // Check if the record with the given id exists
    $onerecord = new DB_con();
    $sql = $onerecord->fetchonerecord($userid);

    if (mysqli_num_rows($sql) == 0) {
        // Redirect to a 404 error page if the record is not found
        header('Location: 404.php');
        exit;
    }

        // Posted Values
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $emailid = $_POST['emailid'];
        $contactno = $_POST['contactno'];
        $address = $_POST['address'];

        //Function Calling
        $sql = $updatedata->update($fname, $lname, $emailid, $contactno, $address, $userid);

        // Mesage after updation
        echo "<script>alert('Record Updated successfully');</script>";

        // Code for redirection
        echo "<script>window.location.href='index.php'</script>";
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Update Record | PHP CRUD OOPs</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
        <style>
            body {
              background-color: #f4f4f4;
              display: flex;
              justify-content: center;
              align-items: center;
              height: 100vh;
              margin: 0;
            }

            .container {
              background: #fff;
              padding: 20px;
              border-radius: 5px;
              box-shadow: 0px 0px 5px 0px #888;
              width: 400px;
            }

            h3 {
              text-align: center;
              font-family: Arial;
            }

            .form-control {
              width: 95%;
              margin: 5px 0;
              padding: 10px;
              border: 1px solid #ccc;
              border-radius: 5px;
            }

            .row {
              margin-bottom: 10px;
            }

            textarea {
              resize: vertical;
              font-family: Arial;
            }

            input[type="text"],
            input[type="email"] {
              width: 380px;
            }

            input[type="submit"] {
              background: #337ab7;
              color: #fff;
              border: none;
              border-radius: 5px;
              cursor: pointer;
              width: 100%;
              padding: 10px;
            }

            input[type="submit"]:hover {
              background: #286090;
            }

            b {
              font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
              font-size: 14px;
              line-height: 1.42857143;
              color: #333;
            }
        </style>
    </head>
    <body>
        <div class="container">
          <h3>Update Record</h3>
          <hr />
          <?php
              // Get the userid
              $userid = intval($_GET['id']);
              $onerecord = new DB_con();
              $sql = $onerecord->fetchonerecord($userid);

              if (mysqli_num_rows($sql) == 0) {
                // Redirect to a 404 error page if the record is not found
                header('Location: 404.php');
                exit;
            }
            
              $cnt = 1;
              while ($row = mysqli_fetch_array($sql)) {
          ?>
          <form name="insertrecord" method="post">
              <div class="row">
                  <div class="col-md-12"><b>First Name</b>
                    <input type="text" name="firstname" value="<?php echo htmlentities($row['FirstName']); ?>" class="form-control" required>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-12"><b>Last Name</b>
                    <input type="text" name="lastname" value="<?php echo htmlentities($row['LastName']); ?>" class="form-control" required>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-12"><b>Email</b>
                    <input type="email" name="emailid" value="<?php echo htmlentities($row['EmailId']); ?>" class="form-control" required>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-12"><b>Contact Number</b>
                    <input type="text" name="contactno" value="<?php echo htmlentities($row['ContactNumber']); ?>" class="form-control" maxlength="10" required>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-12"><b>Address</b>
                    <textarea class="form-control" name="address" required><?php echo htmlentities($row['Address']); ?></textarea>
                  </div>
              </div>
              <?php } ?>
              <div class="row" style="margin-top:1%">
                  <div class="col-md-12">
                    <input type="submit" name="update" value="Update">
                  </div>
              </div>
          </form>
        </div>
    </body>
</html>