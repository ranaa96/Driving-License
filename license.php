<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <style>
    tr,td,th{
        border:1px solid black;
    }
    </style>

</head>
<body>
<form method="POST" class="container" enctype="multipart/form-data">
<div class="form-row">
    <div class="form-group col-md-3">
      <label >Arabic Name</label>
      <input type="text" class="form-control"  placeholder="Your Name" name="atxtname">
    </div>
    <div class="form-group col-md-3">
      <label > English Name</label>
      <input type="text" class="form-control"  placeholder="Your Name" name="etxtname">
    </div>
    <div class="form-group col-md-6">
      <label > Address</label>
      <input type="text" class="form-control"  placeholder="Your Address" name="address">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-3">
    <label >Number of Motor</label>
      <input type="number" class="form-control" placeholder="Number of Motor">
    </div>
    <div class="form-group col-md-3">
    <label >CC Motor</label>
      <input type="text" class="form-control"  placeholder="CC motor" name="txtcc">
    </div>
    <div class="form-group col-md-6">
    <label >Number of VIN</label>
      <input type="text" class="form-control"  placeholder="Number of Shaseh" >
      
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
    <label >Date of license</label>
      <input type="date" class="form-control" placeholder="Date of license" name="txtdate">
    </div>
    <div class="form-group col-md-6">
      <label >Years</label>
      <input type="number" class="form-control" placeholder="years" name="txtyear">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label >Price of car</label>
      <input type="text" class="form-control"  placeholder="price of car" name="txtmoney">
    </div>
    <div class="form-group col-md-6">
    <label >Type</label>
    <select class="form-control " name="types" >

        <option value="1">Private</option>
        <option value="2">Transport</option>

    </select>
    </div>
        
  </div>
  <div class="form-row">
  <div class="form-group col-md-12">

  Upload Your image :
  <input type="file" name="file">

    </div>
  </div>

  <div class="form-row">
  <div class="form-group col-md-12">

  <input type="submit" class="btn btn-primary" name="btnsubmit" value="Sumbit">
  <input type="submit" class="btn btn-primary" name="btnprint" value="print license">

  </div>
  </div>


  <?php 
  session_start();
  if(isset($_POST['btnsubmit'])) {
    $type=$_POST['types'];
    $money=$_POST['txtmoney'];
    $cc=$_POST['txtcc'];
    $years=$_POST['txtyear'];
    $date=$_POST['txtdate'];
 

    $total=array();
   

    if($type==1){
        include_once "private.php";
        $p=new privat();
       
        $total=$p->calcTotal($cc,$money);
        $taxes=$p->Taxes($total[4],$years);

        echo("<table><th> Type</th><th>taxes</th><th>Radio</th><th> board</th><th> develop</th><th>per year</th><th>per years</th>");
        echo("<tr><td>$cc</td><td>".$total[0]."</td><td>".$total[1]."</td><td>".$total[2]."</td><td>".$total[3]."</td><td>".$total[4]."</td><td>".$taxes."</td></tr>");
        echo("</table>");
      
    }
    else{
        include_once "transport.php";
        $t=new transport();
        $total=$t->calcTotal($cc,$money);
        $taxes=$t->Taxes($total,$years);
        echo ("<br> Taxes is". $taxes);
    }



  }
  if(isset($_POST['btnprint'])) {
    $_SESSION['aName']=$_POST['atxtname'];
    $_SESSION['eName']=$_POST['etxtname'];
    $_SESSION['sdate']=$_POST['txtdate'];
    $_SESSION['address']=$_POST['address'];

    $_SESSION['years']=$_POST['txtyear'];
    $years=$_SESSION['years'];
    $_SESSION['edate']=date ('Y-m-d',strtotime($_SESSION['sdate']."+ $years years"));
    $fileName=$_FILES['file']['name'];
    $fileType=$_FILES['file']['type'];
    $fileSize=$_FILES['file']['size'];
    $fileLoc=$_FILES['file']['tmp_name'];
    $_SESSION['filepath']  = $_FILES["file"]["name"];
    $fileStore="img/".$fileName;
    move_uploaded_file($fileLoc,$fileStore);




 

    header('location:print.php');

  }
  
  
  
  ?>
</form>
</body>
</html>