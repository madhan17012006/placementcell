<?php
$registered=0;
$userexists=0;
if($_SERVER['REQUEST_METHOD']=='POST'){
    include 'server1.php';
    $studid=$_POST['studid'];
    $cgpa=$_POST['cgpa'];
    $credit=$_POST['credit'];
    $attper=$_POST['attper'];
    $sql="SELECT * FROM markinfo WHERE studid='$studid'";
    $result=mysqli_query($con,$sql);
    if($result){
        $num=mysqli_num_rows($result);
        if($num>0)
        {
            $userexists=1;
        }
        else{
            $sql="INSERT INTO markinfo (studid,cgpa,credit,attper) VALUES('$studid','$cgpa','$credit','$attper')";
            $result=mysqli_query($con,$sql);
            if($result)
            {
                $registered=1;
            }
            else{
                die(mysqli_error($con));
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Placement Cell</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    label
    {
        font-family: Georgia, 'Times New Roman', Times, serif;
        color:darkslategrey;
        font-size: large;
    }
    h2{
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        color: darkslategrey;
    }
    .center
    {
        position: absolute;
        left: 0;
        right: 0;
        padding-top: 200;
    }
    .form-horizontal
    {
        display: block;
        width: 50%;
        margin: 0 auto;
    }
  </style>
  <script>
        function formValidation()
        {
            let x =document.forms['form2']['name'].value;
            if(x== ""){
                alert("name must be filled out");
                return false;
            }
        }
        function newFunction()
        {
            document.getElementById("form2").reset();
        }
    </script>
</head>
<body style="background-image:url('https://wallpapercave.com/wp/wp2561061.jpg')">
<?php
if($userexists)
{
    echo '<b>Successfully Saved</b>';
}
if($registered)
{
    echo '<b>Registered Successfully</b>';
}
?>
<div class="container">
  <form action="home3.php" method="post" id="form2" name="form2" onSubmit="return formValidation()"class="form-forizontal" align="center">
  <div class="form-group">
      <label for="studid">Student id:</label>
      <input type="number" class="form-control" id="studid" placeholder="Enter your student id" name="studid">
    </div>
    <div class="form-group">
      <label for="cgpa">CGPA:</label>
      <input type="float" class="form-control" id="cgpa" placeholder="Enter your cgpa percentage" name="cgpa">
    </div>
    <div class="form-group">
      <label for="credit">CREDIT:</label>
      <input type="number" class="form-control" id="credit" placeholder="Enter your credit" name="credit">
    </div>
    <div class="form-group">
      <label for="attper">Attendence percentage:</label>
      <input type="float" class="form-control" id="attper" placeholder="Enter your attendence percentage" name="attper">
    </div>
    <button type="reset" class="btn btn-danger btn-lg" value="reset" align="center">RESET</button>
    <button type="submit" class="btn btn-success btn-lg">Submit</button>

  </form>
</div>
</body>
</html>
