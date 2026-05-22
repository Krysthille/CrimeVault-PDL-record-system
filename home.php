<!DOCTYPE html>
<html>
<head>

    <title>CrimeVault</title>
    <link rel="stylesheet" type="text/css" href=""> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

  <style>
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
  height: 100vh;
  min-height: 100vh;

}

  .navbar {
position: fixed;
background-color: white;
color: black;
top: 0; 
left: 0; 
width: 100%; 
display: block;

}

.navbar-brand {
color: black;
            font-weight: bold;
            font-size: 1.5em;
}

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

.jumbotron {
  background-color: transparent; 
  background-attachment: relative;
  position: relative;
  border-radius: 40px;
  width: 950px;
  height: 400px;
  padding: 40px;
  z-index: -1;
  justify-content: left;
  display: flex;
  left: 20%;
  right: 20%;
  margin-top: 30px; 
  margin-bottom: 0px;
    }

  .jumbotron img{
  position: relative; 
  height: 150px; 
  }

    .jumbotron h1 {
      color: white;
      font-size: 55px;
      font-weight: 900;
      text-align: center;
    }

    .jumbotron h2 {
      color: white;
      font-size: 36px;
      font-weight: 600;
      text-align: center;
    }

    .jumbotron p {
      color: white;
      font-size: 28px;
      font-weight: 400;
      text-align: center;
    }

    .card h4{
      font-weight: bold;
    }

  .card-container{
display: flex;
justify-content: center;
flex-wrap: wrap;
    }
    .card {
     width: 325px;
     background-color:  #ffffff7b;
     border-radius: 8px;
     box-shadow: 0px 2px 4px rgba(0,0,0,0,2);
     margin: 20px;
     padding: 5px;
     transition: .5s all ease;
     flex: 10;
    }

.card:hover{
  transform: scale(1.1,1.1);
  flex: 10;
  background-color:  #71a2f2af;
  color: white;
}

.container:hover >.card:not(:hover){
  filter: blur (1px);
  transform: scale(0.9,0.9);
}
.container-fluid{
  overflow: auto;
  text-align: center;
  color: blue;
  background-color: white;
}

.btn {
   border: none;
   color: white;
   padding: 10px 20px;
   text-align: center;
   text-decoration: none;
   display: block;
   font-size: 16px;
   margin: 0 auto;
   cursor: pointer;
   position: center;
 }

</style>
<body>

    <nav class="navbar navbar-inverse">
        <div class="container-fluid">    
          <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                  <span class="sr-only"></span>
                  <span class="icon-bar"></span>
                </button>
                 <a class="navbar-brand" href="#" style="color: black">CrimeVault</a>
            </div >
    
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="home.php" style="color: black" id="home">Home<span class="sr-only">(current)</span></a></li>
                 
                  
                 
                      <li class="active"><a href="search.php" style="color: black">PDL Information<span class="sr-only"></span></a></li>
                    
                </ul>
    
                <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="logout.php" style="color: black">LogOut<span class="sr-only">(current)</span></a></li>
                </ul>
            </div > 
        </div >         
    </nav>

    

  <div class="jumbotron">
        <div class="container text-center" >
        <img src="pnp.png" alt="Logo" class="img">
            <h1>Philippine National Police</h1>      
            <h2>Naval Municipal Police Station</h2>
            <p>Naval, Biliran</p>
        </div>
    </div>
 
  
   <footer>
        <div class="card-container">
          <div class = "card">
           
            <h4>MANDATE</h4> <br>
              <p> Republic Act 6975 entitled An Act Establishing the Philippine National Police under a reorganized Department of the Interior and Local Government and Other Purposes as amended by RA  8551 Philippine National Police Reform and Reorganization Act of 1998 and further amended by RA 9708.</p>
            <br>
</div>
<div class = "card">
            <h4>PHILOSOPHY</h4><br>
              <p> Service, Honor and Justice</p>
            <br>
            <h4>CORE VALUES</h4><br>
              <p>Maka-Diyos, Makabayan, Makatao  at Makakalikasan </p>
</div>
            <br>
            <div class = "card">
            <h4>VISION</h4><br>
              <p>Imploring the aid of the Almighty, by 2030, We shall be a highly capable, effective and credible police service working in partnership with a responsive community towards the attainment of a safer place to live, work and do business.</p>
              </div>
            <br>
            <div class = "card">
            <h4>MISSION</h4><br>
              <p>The PNP shall enforce the law, prevent and control crimes, maintain peace and order, and ensure public safety and internal security with the active support of the community.</p>
</div>
   
        </div>
</footer>
</body>
</html>