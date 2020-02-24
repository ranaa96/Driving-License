<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css?family=Jomhuria&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <style>
    .lic{
        position: relative; 
        background-image: url("maxresdefault.jpg");
        background-size: cover;
        height:325px;
        width:647px;
        border:1px solid #adaea8 ;
        border-radius: 2%;
        margin:auto;

    }
    .aName{
        position: absolute; 
        top:60px;
        left:508px;
        font-size:38px;
        color:#535852;
        font-family: 'Jomhuria', cursive;

    }

        .eName{
        position: absolute;
        top:103px;
        left:202px; 
        font-size:20px;
        color:#535852;
        font-family: 'Anton', sans-serif;
        font-weight: bold;
        text-transform: uppercase;

 
    }
    .address{

        position: absolute; 
        top:123px;
        left:481px;
        font-size:34px;
        color:#535852;
        font-family: 'Jomhuria', cursive;
    }
    .start{

        position: absolute; 
        top:163px;
        left:238px;
        font-size:20px;
        color:#535852;
        font-family: 'Anton', sans-serif;}

.end{

    position: absolute; 
    top:195px;
        left:239px;
    font-size:20px;
    color:#535852;
    font-family: 'Anton', sans-serif;}
.profile{
    position: absolute; 
    top:14px;
        left:25px;
    width:127px;
    height:148px;
    background-color:black;
}
    
    </style>
</head>
<body>
<?php 
  session_start();
  $standard = array("0","1","2","3","4","5","6","7","8","9");
  $eastern_arabic_symbols = array("٠","١","٢","٣","٤","٥","٦","٧","٨","٩");
  $current_date = date('d').'-'.date('m').'-'.date('Y');

  $arabic_date = str_replace($standard , $eastern_arabic_symbols , $current_date );
  $years=$_SESSION['years'];
    $change = date ('d-m-Y',strtotime($current_date."+ $years years"));
    $final= str_replace($standard , $eastern_arabic_symbols , $change );



//   echo implode('-', array_map('strrev', explode('-', $arabic_date)));

//   echo (strrev($arabic_date));
//   $result = explode('/',$arabic_date);
//   echo $result[2]."/".$result[1]."/".$result[0];



?>
    <div class ="container "><div class="lic">
    
    <p class="aName"><?php echo $_SESSION['aName'] ;?></p>
    <p class="eName"><?php echo $_SESSION['eName'] ;?></p>
    <p class="address"><?php echo $_SESSION['address'] ;?></p>
    <p class="start"><?php echo $arabic_date;?></p>
    <p class="end"><?php echo$final;?></p>
    <div class="profile"><?php  echo'<img src="img/'.$_SESSION['filepath'].'"width="127" height="148" ">' ?></div>
    
    
    
    </div></div>
</body>
</html>