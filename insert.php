<?php
// include database connection file
require_once 'function.php';

// Object creation
$insertdata = new DB_con();

if (isset($_POST['insert'])) {
    // Posted Values
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $emailid = $_POST['emailid'];
    $contactno = $_POST['contactno'];
    $address = $_POST['address'];

    //Function Calling
    $sql = $insertdata->insert($fname, $lname, $emailid, $contactno, $address);

    if ($sql) {
        // Message for successfull insertion
        echo "<script>alert('Record inserted successfully');</script>";
        echo "<script>window.location.href='index.php'</script>";
    } else {
        // Message for unsuccessfull insertion
        echo "<script>alert('Something went wrong. Please try again');</script>";
        echo "<script>window.location.href='index.php'</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>PHP CRUD OOPs</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
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
            height: 545px;
        }

        h3 {
            padding-left: 100px important;
            padding-top: 10px important;
            /* margin-bottom: 20px; */
            text-align: center;
        }

        .form-control {
            width: 100%;
            margin: 5px 0;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .col-md-4 {
            margin-bottom: 10px;
        }

        .col-md-8 {
            margin-bottom: 10px;
            margin-left: 50px;
            padding-left: 110px;
        }

        textarea {
            height: 150px;
            resize: vertical;
        }

        input[type="submit"] {
            background: #337ab7;
            color: #fff;
            border: none;
            padding-left: 10px;
            border-radius: 5px;
            cursor: pointer;
            width: 50%;
            height: 40px;
        }

        input[type="submit"]:hover {
            background: #286090;
        }

        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <h3>Insert Record</h3>
        <hr />
        <form name="insertrecord" method="post">
            <div class="row">
                <div class="col-md-12"><b>First Name</b>
                    <input type="text" name="firstname" class="form-control" autofocus="autofocus" required>
                </div>
                <div class="col-md-12"><b>Last Name</b>
                    <input type="text" name="lastname" class="form-control" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12"><b>Email</b>
                    <input type="email" name="emailid" class="form-control" required>
                </div>
                <div class="col-md-12"><b>Contact Number</b>
                    <input type="number" name="contactno" class="form-control" maxlength="10" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12"><b>Address</b>
                    <textarea class="form-control" name="address" required></textarea>
                </div>
            </div>

            <div class="row" style="margin-top:1%">
                <div class="col-md-8">
                    <input type="submit" name="insert" value="Submit">
                </div>
            </div>
        </form>
    </div>
</body>

</html>