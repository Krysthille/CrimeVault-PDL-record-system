<?php
require 'connection.php';

if(isset($_POST["submit"]))
{
  $image = $_POST['image'] ?? 'N/A'; 
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

 $query = "INSERT INTO crimevault_records VALUES('', '$image', '$name', '$gender', '$birthdate', '$address',
  '$civilstatus', ' $citizenship', ' $dateofarrest', '$timeofarrest', '$locationofarrest', '$arrestingofficer', 
  '$charge', '$statute', '$description', '$courtdate', '$casenumber', '$disposition', '$criminalhistory')";
 if(mysqli_query ($connect, $query) ==TRUE) {
   
  header("location: search.php?search");
  exit;
} else {
  
  $errorMessage = "Error inserting data: " . mysqli_error($connect);
}


}

 ?>

 
<!DOCTYPE html>
<html>
<head>
  <title>CrimeVault</title>
    <link rel="stylesheet" type="text/css" href="">
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
font-weight: bold;
font-size: 1.5em; }

.navbar-nav li {
 box-shadow: 0px 8px 16px 0px transparent;
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

      h1 {
      font-size: 2em;
      z-index: -1;
      margin-bottom: 20px;
      font-weight: bold;
      color: #333;
    }
    

    .card-container{
display: flex;
justify-content: center;
flex-wrap: wrap;
margin-top: 20px;

    }
.card{
  width: 1000px;
     background-color:  #ffffff7b;
     border-radius: 8px;
     overflow:hidden;
     box-shadow: 0px 2px 4px rgba(0,0,0,0,2);
     margin: 20px;
     padding: 5px;
     margin-top: 20px;
    position: left
    }
  
    .card1 {
     width: 325px;
     background-color:  #ffffff7b;
     border-radius: 8px;
     overflow:hidden;
     box-shadow: 0px 2px 4px rgba(0,0,0,0,2);
     margin: 20px;
     margin-top: 20px;
     padding: 5px;
       
    }
    .card2 { 
      width: 325px;
     background-color:  #ffffff7b;
     border-radius: 8px;
     overflow:hidden;
     box-shadow: 0px 2px 4px rgba(0,0,0,0,2);
     margin: 20px;
     margin-top: 20px;
     padding: 5px;
      
    }

    .card3 {
      width: 325px;
     background-color:  #ffffff7b;
     border-radius: 8px;
     overflow:hidden;
     box-shadow: 0px 2px 4px rgba(0,0,0,0,2);
     margin: 20px;
     margin-top: 20px;
     padding: 5px;
    }

    .card4 {
      width: 325px;
     background-color:  #ffffff7b;
     border-radius: 8px;
     overflow:hidden;
     box-shadow: 0px 2px 4px rgba(0,0,0,0,2);
     margin: 20px;
     margin-top: 20px;
     padding: 5px;
    }

    label {
      display: block;
      margin-bottom: 10px;
      font-weight: bold;
      text-align: left;
    }

    input[type="text"], input[type="date"], input[type="time"], select , textarea{
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

    .btn btn-primary{
      background-color:  #71a2f2;
      color: white;
      padding: 10px 20px;
      font-size: 16px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
  

    .btn {
      background-color:  #71a2f2;
      color: white;
      padding: 10px 20px;
      font-size: 16px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
  

    .wrapper {
      margin-bottom: 20px;
    }

    .alert {
      margin-top: 20px;.
    }


  .container {
  background-color: #ffffff7b;
  border-radius: 8px;
  box-shadow: 0px 2px 4px rgba(0,0,0,0.2);
  padding: 20px;
  margin-top: 70px;
  text-align: center;
}

.upload-wrapper {
  margin-bottom: 20px;
  margin-top: 20px;
}

.upload-wrapper .form-label {
  font-weight: bold;
  margin-bottom: 10px;
  display: block;
  text-align: left;
}

.upload-wrapper .form-control {
  width: 100%;
  padding: 10px;
  border-radius: 5px;
  border: 1px solid #ccc;
  font-size: 16px;
}

.upload-btn {
    
  background-color:  #71a2f2;
      color: white;
      padding: 10px 20px;
      font-size: 16px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
}

  .img-fluid{
    position: center;
    height: 200px;
    width: 200px;
    
     padding: 10px;
     margin:  0 auto ;
     display: flex;  
  justify-content: center;  

  }

  .row {
  display: flex;
  flex-wrap: wrap;
}

.col-center {
  flex: 1 0 auto; 
  padding: 10px; 
  width: 100%;
}
  
.textarea{
  width: 70%;
    height: 30px;
    padding:10px;
    outline: auto;
    resize: auto;
    font-size: 16px;
   
    border-radius: 5px;
   
    max-height: 330px;
    
 
}
textarea:is(:focus, :valid){
    border-width: 2px;
 padding:10px;

}
textarea::-webkit-scrollbar{
    width: 0px; 
}

.form-control{
  margin-bottom: 5px; 
  display: block;
   width: 50% ;
 margin: 0 auto;
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
                <li class="active"><a href="home.php"style="color: black">Home<span class="sr-only">(current)</span></a></li>
                    <li class="active"><a href="search.php" style="color: black">Back<span class="sr-only"></span></a></li>
                    </ul>
    
            </div > 
        </div >           
    </nav>
  
 <form action="" method="post" autocomplete="off">
<br>
<div class="card-container"  >
          <div class = "card1" >
            <div class= "card-content">

 
          <h1>Personal Details</h1>
          
          <div class="col-sm-6"  >

  

        
   <div style="border: 1px solid black; height: 150px; width: 150px;  background: #F5FAFF;">
      <img id="output"  width="150" height="150">
  </div>

    <input type="file" name="image" id="image" onchange="loadFile(event)" class="form-control" required accept="uploads/" style="width:150px; margin-left: 0 auto" required>

  
<script>
    var loadFile = function(event) {
      var reader = new FileReader();
      reader.onload = function(){
        var output = document.getElementById('output');
        output.src = reader.result;
        output.style.display = 'block';
      };
      reader.readAsDataURL(event.target.files[0]);
    };
  </script>


  
</div>
<br> <br> <br> <br> <br> <br> <br> <br> <br> <br> 
      <label for="" style="">Name</label>
      <input type="text" name="name" value="" required>

<label for="">Gender</label>
      <input type="radio" name="gender" value="Male" required> Male
      <input type="radio" name="gender" value="Female" required> Female
<br>
      <label for="">Birth Date</label>
      <input type="date" name="birthdate" required value="">
<br>
      <label for="">Address</label>
      <input type="text" name="address" required value="">
    
      <br>

      <label for="">Civil Status</label>
      <input type="text" name="civilstatus" required value="">

      <label for="">Citizenship</label>
      <input type="text" name="citizenship" required value="">


  </div>
  </div>
<br>
<br> 

<div class = "card2">
<h1>Arrest Details </h1>
      <label for="">Date of Arrest</label>
      <input type="date" name="dateofarrest" required value="">

      <label for="">Time of Arrest</label>
      <input type="time" name="timeofarrest" required value="">

      <label for="">Location of Arrest</label>
      <input type="text" name="locationofarrest" required value="">

      <label for="">Arresting Officer</label>
      <input type="text" name="arrestingofficer" required value=""> 
  </div>
<br> 
<br>

<div class = "card3">
<h1>Charge Details </h1>
      
      <label for="">Charge</label>
      <textarea placeholder="" name="charge" required></textarea>
    
   
      <label for="">Statute</label>
      <textarea placeholder="" name="statute" required></textarea>
    
     
      <label for="">Description</label>
      <textarea placeholder="" name="description" required></textarea>
         
  </div>
          
<br> 
<br>

<div class = "card4">
<h1>Court Proceedings </h1>
      <label for="">Court Date</label>
      <input type="date" name="courtdate" required value="">

      <label for="">Case Number</label>
      <input type="text" name="casenumber" required value="
      <?php
$a=rand(1950,2025);
echo "$a";
echo substr(str_shuffle(str_repeat("ABCDEFGHIJKLMNOPQRSTUVWXYZ",5)), 0, 2);
echo substr(str_shuffle(str_repeat("0123456789",5)), 0, 6);
?>">


      <label for="">Disposition</label>
      <input type="text" name="disposition" required value="">
<br>
<br>
                <label for="">Criminal History</label>
                <textarea placeholder="" name="criminalhistory" required></textarea>
            
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

     
     else if( !empty($errorMessage)){
        echo "
        <div class = 'alert alert-warning alert-dismissible fade show' role = 'alert'>
        <strong>$errorMessage</strong>
        <button type = 'button' class = 'btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>
        ";
      }
      ?>
   
<div class="row">
    
    <div class="col-sm-12">
      <div style=""><div id="msg-price"> </div></div>
      
      <div style="border: 2px solid white; padding:10px; text-align: center;border-radius: 25px;">
       <p style="color: white"> <input type="checkbox" name="declare" style=" color: white" required >
Declared that filled the information above have been corrected.  </p>  </div>
<br>
<button type="submit" class="btn" name="submit">Save</button>


</div>
    </form>

</body>
</html>