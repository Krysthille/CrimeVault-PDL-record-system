<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


function fetchDataFromDatabase($id)
{
    $connect = mysqli_connect("localhost", "root", "", "database");

    if (!$connect) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $id = mysqli_real_escape_string($connect, $id);

    $query = "SELECT * FROM crimevault_records WHERE id = $id";
    $result = mysqli_query($connect, $query);

    if (mysqli_num_rows($result) > 0) {
        return mysqli_fetch_assoc($result);
    } else {
        return null;
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = fetchDataFromDatabase($id);

    if ($data) {
        $image = $data['image'] ?? '';
        $name = $data['name'] ?? ''; 
        $gender = $data['gender'] ?? '';
        $birthdate = $data['birthdate'] ?? '';
        $address = $data['address'] ?? '';
        $civilstatus = $data['civilstatus'] ?? '';
        $citizenship = $data['citizenship'] ?? '';
        $dateofarrest = $data['dateofarrest'] ?? '';
        $timeofarrest = $data['timeofarrest'] ?? '';
        $locationofarrest = $data['locationofarrest'] ?? '';
        $arrestingofficer = $data['arrestingofficer'] ?? '';
        $charge = $data['charge'] ?? '';
        $statute = $data['statute'] ?? '';
        $description = $data['description'] ?? '';
        $courtdate = $data['courtdate'] ?? '';
        $casenumber = $data['casenumber'] ?? '';
        $disposition = $data['disposition'] ?? '';
        $criminalhistory = $data['criminalhistory'] ?? '';
    } else {
       
        echo "No data found for ID: $id";
        exit; }
} else {
    
    echo "No ID parameter provided";
    exit; 
}



if (isset($_GET['generate_pdf'])) {
    require('fpdf/fpdf.php');
  
    class PDF extends FPDF
    {
      // Page header
      function Header()
      {
        $this->Image("http://localhost/CrimeVault/pnp.png", 150, 15, 50, 30, "PNG");
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, 'Philippine National Police', 0, 1, 'C');
        $this->Cell(0, 10, 'Naval Municipal Police Station', 0, 1, 'C');
        $this->Cell(0, 10, 'Naval, Biliran', 0, 1, 'C');
        $this->Ln(10);
        $this->setFontSize(14); 
        $this->Cell(0, 10, 'PERSONS DEPRIVE OF LIBERTY INFORMATION', 0, 1, 'C');
        $this->Ln(10);
      }
      
   
      function Footer()
      {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Page ' . $this->PageNo(), 0, 0, 'C');
      }
    }
  
   
    function createTableRow($pdf, $label, $value)
    {
      $pdf->SetFont('Arial', '', 12);
      $pdf->Cell(40, 10, $label, 1);
      $pdf->Cell(150, 10, $value, 1);
      $pdf->Ln();
    }
  
 
   
  
    $pdf = new PDF();
    $pdf->AddPage();
    if ($image) {
        $pdf->Image($image, 10, 10, 30);
        $pdf->Ln(40);
    }
 
    $pdf->SetFont('Arial', '', 12);
    
    $pdf->Cell(0, 10, 'PERSONAL DETAILS:', 0, 1, 'A');
    createTableRow($pdf, 'Name:', $name);
    createTableRow($pdf, 'Gender:', $gender);
    createTableRow($pdf, 'Birthdate:', $birthdate);
    createTableRow($pdf, 'Address:', $address);
    createTableRow($pdf, 'Civil Status:', $civilstatus);
    createTableRow($pdf, 'Citizenship:', $citizenship);
    
    $pdf->Ln(10);
    

    $pdf->Cell(0, 10, 'ARREST DETAILS:', 0, 1, 'A');
    createTableRow($pdf, 'Date of Arrest:', $dateofarrest);
    createTableRow($pdf, 'Time of Arrest:', $timeofarrest);
    createTableRow($pdf, 'Location of Arrest:', $locationofarrest);
    createTableRow($pdf, 'Arresting Officer:', $arrestingofficer);
    
    $pdf->Ln(10);
    
 
    $pdf->Cell(0, 10, 'CHARGE DETAILS:', 0, 1, 'A');
    createTableRow($pdf, 'Charge:', $charge);
    createTableRow($pdf, 'Statute:', $statute);
    createTableRow($pdf, 'Description:', $description);
    
    $pdf->Ln(20);
    

    $pdf->Cell(0, 10, 'COURT PROCEEDINGS:', 0, 1, 'A');
    createTableRow($pdf, 'Court Date:', $courtdate);
    createTableRow($pdf, 'Case Number:', $casenumber);
    createTableRow($pdf, 'Disposition:', $disposition);
    createTableRow($pdf, 'Criminal History:', $criminalhistory);
  
    $pdf->Output('D', 'PDL_Information.pdf'); 
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CrimeVault</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
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
  min-height: 100vh;
  padding: 0;
  display: flex;
  flex-direction: column;
  align-items: center;
}
form{
    background-color: #ffffff7b;
    
            width: 100%;
            margin-top:20px;
}
.btn{
    position: center; margin-top: 10px;
}
    </style>

<body>
    
<form action="" method="post" autocomplete="off">
    <p style="text-align: center; font-size: 24px; font-weight: bold;">PERSONAL DETAILS</p>
    <?php if ($image): ?>
        <img src="<?= $image ?>" alt="Personal Photo" style="max-width: 200px;">
    <?php endif; ?>
    <table width="100%" border="1">
        <tr>
            <td><b>Name:</b></td>
            <td><?= $name ?></td>
            <td><b>Gender:</b></td>
            <td><?= $gender ?></td>
        </tr>
        <tr>
            <td><b>Birthdate:</b></td>
            <td><?= $birthdate ?></td>
            <td><b>Address:</b></td>
            <td><?= $address ?></td>
        </tr>
        <tr>
            <td><b>Civil Status:</b></td>
            <td><?= $civilstatus ?></td>
            <td><b>Citizenship:</b></td>
            <td><?= $citizenship ?></td>
        </tr>
    </table>
    <br> <br>
    <p style="text-align: center; font-size: 24px; font-weight: bold;">ARREST DETAILS</p>
    <table width="100%" border="1">
        <tr>
            <td><b>Date of Arrest:</b></td>
            <td><?= $dateofarrest ?></td>
            <td><b>Time of Arrest:</b></td>
            <td><?= $timeofarrest ?></td>
        </tr>
        <tr>
            <td><b>Location of Arrest:</b></td>
            <td><?= $birthdate ?></td>
            <td><b>Arresting Officer:</b></td>
            <td><?= $arrestingofficer ?></td>
</tr>
    </table>
    <br> <br>
    <p style="text-align: center; font-size: 24px; font-weight: bold;">CHARGE DETAILS</p>
    <table width="100%" border="1">
        <tr>
            <td><b>Charge:</b></td>
            <td><?= $charge ?></td>
            <td><b>Statute:</b></td>
            <td><?= $statute ?></td>
            <td><b>Description:</b></td>
            <td><?= $description ?></td>
            
        </tr>
    </table>
    <br> <br>
    <p style="text-align: center; font-size: 24px; font-weight: bold;">COURT PROCEEDINGS</p>
    <table width="100%" border="1">
        <tr>
            <td><b>Court Date:</b></td>
            <td><?= $courtdate ?></td>
            <td><b>Case Number:</b></td>
            <td><?= $casenumber ?></td>
        </tr>
        <tr>
            <td><b>Disposition:</b></td>
            <td><?= $disposition ?></td>
           
</tr>
    </table>
    <br> <br>
    <table width="100%" border="1">
    <td><b>Criminal History:</b></td>
            <td style="position: center;"><?= $criminalhistory ?></td>
            </table>
    <br>
    <div class="col-sm-12">
    <a href="?id=<?= $id ?>&generate_pdf=1" class="btn btn-primary">Download</a>
    <br>
<a href="http://localhost/CrimeVault/search.php" class="btn btn-primary" style="margin-bottom: 10px">Back</a>
</div>
</form>
</body>
</html>
