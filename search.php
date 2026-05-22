<!DOCTYPE html>
<html>
<head>
    <title>CrimeVault</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }
        body {
            background: url('image.png') ;
            background-attachment: fixed;
  background-position: center;
  background-size: cover;
  background-repeat: no-repeat;
            text-align: center;
            min-height: 100vh;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .navbar {
            position: fixed;
            background-color: white;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
        }
        .navbar-brand {
            color: black;
            font-weight: bold;
            font-size: 1.5em;
        }
        .navbar-nav li {
            margin-left: 10px;
            display: inline-block;
        }
        .navbar-nav li.active a {
            border-radius: 10px;
            font-weight: bold;
            cursor: pointer;
            opacity: 90%;
            background-image: linear-gradient(to bottom right, white 70%, blue 100%);
        }
        .navbar-form .form-control {
            float: left;
            padding: 5px;
            color: black;
        }
        .navbar-form .btn {
            height: 34px;
            width: 55px;
            text-align: center;
            padding: 5px;
        }
        .container-fluid {
            text-align: center;
            background-color: white;
        }
        form {
            margin-top: 80px;
            width: 90%;
        }
        table {
            background-color: whitesmoke;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        .table th, .table td {
            padding: 15px;
            text-align: left;
            vertical-align: middle;
        }
        .table thead {
            background-color: #71a2f2;
            color: white;
        }
        .table tbody tr:nth-child(even) {
            background-color: transparent;
        }
        .table tbody tr:hover {
            background-color: #71a2f2;
            color: white;
        }
        .btn-primary {
            background-color: #71a2f2;
            border-color: #71a2f2;
        }
        .btn-primary:hover {
            background-color: #71a2f2;
            border-color: #71a2f2;
        }
        .container {
            display: flex;
            justify-content: center;
            margin-top: 80px;
            z-index: -1;
        }

        .dropdown {
            background-image: linear-gradient(to bottom right, white 70%, blue 100%);
            color: white;
            border-radius: 10px;
            font-weight: bold;
            cursor: pointer;
            opacity: 90%;
            background-image: linear-gradient(to bottom right, white 100%, blue 100%);
        }
       
        .dropdown-menu {
            background-image: linear-gradient(to bottom right, white 70%, blue 100%);
            border-radius: 10px;
            opacity: 90%;
        }
        .dropdown-menu > li > a, .dropdown-menu > li > a:hover {
            color: black;
            font-weight: bold;
            border-radius: 10px;
            opacity: 90%;
        }
        

        .dropdown-toggle, .dropdown-toggle:hover {
            background-image: linear-gradient(to bottom right, white 70%, blue 100%);
            color: black;
            border-radius: 10px;
        }
      

    </style>
</head>
<body>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#" style="color: black">CrimeVault</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="home.php" style="color: black">Home<span class="sr-only">(current)</span></a></li>
                  <li class="active"><a href="viewinput.php" style="color: black">Add New <span class="sr-only"></span></a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color: black">Sort <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="?sort_by=name">Name</a></li>
                        <li><a href="?sort_by=case_number">Case Number</a></li>
                    </ul>
                </li>
                <form class="navbar-form navbar-left" role="search">
                    <div class="form-group">
                        <input type="text" id="search" class="form-control" placeholder="Search data">
                    </div>
                </form>
            </ul>
        </div>
    </div>
</nav><form method="post">
    <table class="table">
      
        <thead>
            <tr>
                <th scope="col">Case Number</th>
                <!-- <th scope="col">Image</th> -->
                <th scope="col">Name</th>
                <th scope="col">Charge</th>
                <th scope="col">Date of Arrest</th>
                <th scope="col">Location of Arrest</th>
                <th scope="col">Court Date</th>
                <th scope="col">Disposition</th>
                <th scope="col">Criminal History</th>
                <th scope="col">Action</th>
                
            </tr>
        </thead>
        <tbody id="table-body">

        <?php 
            $connect = mysqli_connect("localhost", "root", "", "database");
            if (!$connect) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $query = "SELECT * FROM crimevault_records";
            if (isset($_GET['sort_by'])) {
                if ($_GET['sort_by'] == "name") {
                    $query .= " ORDER BY name ASC";
                } elseif ($_GET['sort_by'] == "case_number") {
                    $query .= " ORDER BY casenumber ASC";
                }
            }
            $query_run = mysqli_query($connect, $query);

            if (mysqli_num_rows($query_run) > 0) {
                foreach ($query_run as $items ) {

                    ?>
                    <tr>
                    <td><a href="edit.php?id=<?= $items['id']; ?>" style="color: black;"><?php echo $items['casenumber']; ?></a></td>
                    <!-- <td><a href="edit.php?id=<?= $items['id']; ?>" style="color: black;"><img src="<?= $items['image']; ?>" alt="Mugshot" style="width: 100px; height: auto;"></a></td> -->
      <td><a href="edit.php?id=<?= $items['id']; ?>" style="color: black;"><?php echo $items['name']; ?></a></td>
                    <td><a href="edit.php?id=<?= $items['id']; ?>" style="color: black;"><?php echo $items['charge']; ?></a></td>
                    <td><a href="edit.php?id=<?= $items['id']; ?>" style="color: black;"><?php echo $items['dateofarrest']; ?></a></td>
                    <td><a href="edit.php?id=<?= $items['id']; ?>" style="color: black;"><?php echo $items['locationofarrest']; ?></a></td>
                    <td><a href="edit.php?id=<?= $items['id']; ?>" style="color: black;"><?php echo $items['courtdate']; ?></a></td>
                    <td><a href="edit.php?id=<?= $items['id']; ?>" style="color: black;"><?php echo $items['disposition']; ?></a></td>
                    <td><a href="edit.php?id=<?= $items['id']; ?>" style="color: black;"><?php echo $items['criminalhistory']; ?></a></td>
                    <td><a class="btn btn-primary btn-sm" href="edit.php?id=<?= $items['id']; ?>">Edit 
                    <a class="btn btn-primary btn-sm" style=" margin-left: 5px; margin-right: 0" href="details_pdf.php?id=<?= $items['id']; ?>">Download</a></a></td>
               
                </tr>
<?php
                }
            } else {
                ?>
                <tr>
                    <td colspan='10'>No Record Found</td>
                </tr>
                <?php
            }
?>
        </tbody>
    </table>
</form>

<script>
    $(document).ready(function(){
        $('#search').on('input', function(){
            var searchText = $(this).val().toLowerCase();
            $('#table-body tr').each(function(){
                var rowText = $(this).text().toLowerCase();
                if(rowText.includes(searchText)){
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });
    });
</script>
</body>
</html>
