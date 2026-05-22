<?php
require 'connection.php';
$id = "";
// $image= "";
$name = "";
$gender = "";
$birthdate = "";
$address = "";
$civilstatus = "";
$citizenship = "";
$dateofarrest = "";
$timeofarrest = "";
$locationofarrest = "";
$arrestingofficer = "";
$charge = "";
$statute = "";
$description = "";
$courtdate = "";
$casenumber = "";
$disposition = "";
$criminalhistory = "";

$errorMessage="";
$successMessage = "";

if($_SERVER['REQUEST_METHOD']=='GET'){
  if(!isset($_GET["id"])){
    header("location: viewedit.php");
    exit;
  }
  $id = $_GET["id"];

  $sql = "SELECT * FROM crimevault_records WHERE id=$id";
  $result = $connect->query($sql);
  $row = $result->fetch_assoc();

  
  if(!$row){
    header("location: edit.php");
    exit;
  }
  $id = $row["id"];
  // $image= $row["image"];
  $name = $row["name"];
 $gender = $row["gender"];
 $birthdate = $row["birthdate"];
 $address = $row["address"];
 $civilstatus = $row["civilstatus"];
 $citizenship = $row["citizenship"];
 $dateofarrest = $row["dateofarrest"];
 $timeofarrest = $row["timeofarrest"];
 $locationofarrest = $row["locationofarrest"];
 $arrestingofficer = $row["arrestingofficer"];
 $charge = $row["charge"];
 $statute = $row["statute"];
 $description = $row["description"];
 $courtdate = $row["courtdate"];
 $casenumber = $row["casenumber"];
 $disposition = $row["disposition"];
 $criminalhistory = $row["criminalhistory"];

}
else {
  $id = $_POST["id"];
  // $image= $_POST["image"];
  $name = $_POST["name"];
  $gender = $_POST["gender"];
  $birthdate = $_POST["birthdate"];
  $address = $_POST["address"];
  $civilstatus = $_POST["civilstatus"];
  $citizenship = $_POST["citizenship"];
  $dateofarrest = $_POST["dateofarrest"];
  $timeofarrest = $_POST["timeofarrest"];
  $locationofarrest = $_POST["locationofarrest"];
  $arrestingofficer = $_POST["arrestingofficer"];
  $charge = $_POST["charge"];
  $statute = $_POST["statute"];
  $description = $_POST["description"];
  $courtdate = $_POST["courtdate"];
  $casenumber = $_POST["casenumber"];
  $disposition = $_POST["disposition"];
  $criminalhistory = $_POST["criminalhistory"];
  do{
    if(empty($id)||empty($name)||empty($gender)||empty($birthdate)||empty($address)||empty($civilstatus)||empty($citizenship)||empty($dateofarrest)||empty($timeofarrest)||empty($locationofarrest)||empty($arrestingofficer)||empty($charge)||empty($statute)||empty($description)||empty($courtdate)||empty($casenumber)||empty($disposition)||empty($criminalhistory)){
      $errorMessage="All the fields are required!";
      break;
    }
    $sql = "UPDATE crimevault_records 
    SET  name= '$name', gender = '$gender', birthdate = '$birthdate', address = '$address', civilstatus = '$civilstatus', citizenship = '$citizenship', dateofarrest = '$dateofarrest', timeofarrest = '$timeofarrest', locationofarrest = '$locationofarrest', arrestingofficer = '$arrestingofficer', charge = '$charge', statute = '$statute', description = '$description', courtdate = '$courtdate', casenumber = '$casenumber', disposition = '$disposition', criminalhistory= '$criminalhistory' 
    WHERE id = $id";

    $result = $connect->query($sql);
    if(!$result){
      $errorMessage = "Invalid query: " . $connect->error;
      break;
    }
    $successMessage = "Information added successfully";
    header("location: search.php");
    exit;
  }
  while(false);
}

?>
<!DOCTYPE html>
<html>
<head>
  <title>CrimeVault</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<style media="screen">
   * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: Arial, Helvetica, sans-serif;
}

body {
  background: url('image.png');
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
display: block;

}

.navbar-brand {
background-color: white;
color: black;
font-weight: bold;
font-size: 1.5em;
}

.navbar-nav li {
    box-shadow: 0px 8px 16px 0px transparent;
margin-left: 10px; 
display: inline-block; }


.navbar-nav li.active a {
border-radius: 10px;


font-weight: bold;
cursor: pointer;
opacity: 90%;
background-image: linear-gradient(to bottom right, white 70%, blue 100%);
}

.navbar-form {
display: flex;
align-items: center;
}

.navbar-form .form-control {
float: left;
padding: 5px;
position: relative;
color:black;

}

.navbar-form .btn{
height: 34px;
width: 55px;
text-align: center;
float: left;
padding: 5px;
display: flex;
position: relative;
}

.container-fluid{
  overflow: auto;
  text-align: center;
  background-color: white;
}
.card-container{
display: flex;
justify-content: center;
flex-wrap: wrap;
margin-top: 40px;

    }
    .card1 {
     width: 325px;
     background-color:  #ffffff7b;
     border-radius: 8px;
     overflow:hidden;
     box-shadow: 0px 2px 4px rgba(0,0,0,0,2);
     margin: 20px;
     padding: 5px;
       
    }
    .card2 { 
      width: 325px;
     background-color:  #ffffff7b;
     border-radius: 8px;
     overflow:hidden;
     box-shadow: 0px 2px 4px rgba(0,0,0,0,2);
     margin: 20px;
     padding: 5px;
      
    }

    .card3 {
      width: 325px;
     background-color:  #ffffff7b;
     border-radius: 8px;
     overflow:hidden;
     box-shadow: 0px 2px 4px rgba(0,0,0,0,2);
     margin: 20px;
     padding: 5px;
    }

    .card4 {
      width: 325px;
     background-color:  #ffffff7b;
     border-radius: 8px;
     overflow:hidden;
     box-shadow: 0px 2px 4px rgba(0,0,0,0,2);
     margin: 20px;
     padding: 5px;
    }


h1 {
      font-size: 2em;
      z-index: -1;
      margin-bottom: 20px;
      font-weight: bold;
      color: #333;
    }

    .card {
      background: rgba(255, 255, 255, 0.9);
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.3);
      margin-top: 100px;
      width: 80%;
      max-width: 800px;
    }

    label {
      display: block;
      margin-bottom: 10px;
      font-weight: bold;
      text-align: left;
    }

    input[type="text"], input[type="date"], input[type="time"], select, textarea {
      width: 100%;
      padding: 10px;
      margin-bottom: 20px;
      border-radius: 5px;
      border: 1px solid #ccc;
      font-size: 16px;
    }

    input[type="radio"] {
      margin: 0 10px 0 0;
    }

    textarea {
      resize: vertical;
      height: 100px;
    }

    .btn {
      background-color:  #71a2f2;
      color: white;
      padding: 10px 20px;
      font-size: 16px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .btn:hover {
      background-color: #71a2f2;
    }

    .wrapper {
      margin-bottom: 20px;
    }

    .alert {
      margin-top: 20px;
    }
    </style>

<body>
<nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#" style="color: black">CrimeVault</a>
            </div >
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="home.php" style="color: black">Home<span class="sr-only">(current)</span></a></li>
                    <li class="active"><a href="search.php" style="color: black">Back<span class="sr-only"></span></a></li>
                </ul>
    
            </div > 
        </div >         
    </nav>

<form class="" action="" method="post" autocomplete="off">
<div class="card-container">
          <div class = "card1">
            <div class= "card-content">

            <div value="<?php echo $name; ?>"style="border: 1px solid black; height: 150px; width: 150px;  background: #F5FAFF;">
            
    </div>
 <!-- <input type="file" name="image" id="image" class="form-control" required accept="uploads/" style="width:150px; margin-left: 0 auto" required> -->

      
<input type="hidden" name= "id" value="<?php echo $id; ?>">
<h1>PDL Information</h1>


<div class = "wrapper">
      <label for="">Name</label>
      <textarea type="text" name="name" required ><?php echo $name; ?></textarea>
  </div>

    
<label for="">Gender</label>
      <input type="radio" name="gender" value="Male" <?php if ($gender == "Male") echo "checked"; ?> required> Male
      <input type="radio" name="gender" value="Female" <?php if ($gender == "Female") echo "checked"; ?> required> Female


      <label for="">Birth Date</label>
      <input type="date" name="birthdate" value=<?php echo $birthdate; ?>>
      
<br>
      
      <div class = "wrapper">
      <label for="">Address</label>
      <textarea type="text" name="address" required ><?php echo $address; ?></textarea>
  </div>
     
      <div class = "wrapper">
      <label for="">Civil Status</label>
      <textarea type="text" name="civilstatus" required ><?php echo $civilstatus; ?></textarea>
      </div>

      <div class = "wrapper">
      <label for="">Citizenship</label>
      <textarea type="text" name="citizenship" required ><?php echo $citizenship; ?></textarea>
      </div>

  </div>
  </div>
<br>
<br> 
<div class = "card2">
<h1>Arrest Details </h1>
      
      <label for="">Date of Arrest</label>
      <input type="date" name="dateofarrest" value= <?php echo $dateofarrest; ?>>
      
     
      <label for="">Time of Arrest</label>
      <input type="time" name="timeofarrest" value= <?php echo $timeofarrest; ?>>

      <div class = "wrapper">
      <label for="">Location of Arrest</label>
      <textarea type="text" name="locationofarrest" required ><?php echo $locationofarrest; ?></textarea>
      </div>

      <div class = "wrapper">
      <label for="">Arresting Officer</label>
      <textarea type="text" name="arrestingofficer" required ><?php echo $arrestingofficer; ?></textarea>
      </div>

  </div>
<br> 
<br>
<div class = "card3">
<h1>Charge Details </h1>
      <div class = "wrapper">
      <label for="">Charge</label>
      <textarea type="text" name="charge" required ><?php echo $charge; ?></textarea>
    </div>
    
    <div class = "wrapper">
      <label for="">Statute</label>
      <textarea type="text" name="statute" required ><?php echo $statute; ?></textarea>
      </div>
     
      <div class = "wrapper">
      <label for="">Description</label>
      <textarea type="text" name="description" required ><?php echo $description; ?></textarea>
      </div>
            
  </div>

<br> 
<br>
<div class = "card4">
    <h1>Court Proceedings </h1>
      <label for="">Court Date</label>
      <input type="date" name="courtdate" value=<?php echo $courtdate; ?>>
      

      
      <div class = "wrapper">
      <label for="">Case Number</label>
      <textarea type="text" name="casenumber" required ><?php echo $casenumber; ?></textarea>
      </div>

      <div class = "wrapper">
      <label for="">Disposition</label>
      <textarea type="text" name="disposition" required ><?php echo $disposition; ?></textarea>
      </div>
      
      
<br>
<br>
      <div class = "wrapper">
      <label for="">Criminal History</label>
      <textarea type="text" name="criminalhistory" required ><?php echo $criminalhistory; ?></textarea>
      </div>
  </div>
      <script>

              const textareas = document.querySelectorAll("textarea");
              textareas.forEach(textarea => {
              textarea.addEventListener("keyup", e => {
              textarea.style.height = "30px";
              let scHeight = e.target.scrollHeight;
              textarea.style.height = `${scHeight}px`;
            });
          });
      </script>
      <br>
      <br>
      <?php
      if(!empty($successMessage)){
        echo "
        <div class = 'alert alert-success alert-dismissible fade show' role = 'alert'>
        <strong>$successMessage</strong>
        <button type = 'button' class = 'btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>
        ";
      }
      ?>
      
      <div class="col-sm-12">
      
<button type="submit" class="btn" name="submit">Save</button>
    </div>
    </div>    
</form>

</body>
</html>