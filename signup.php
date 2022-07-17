<?php
$con=mysqli_connect('localhost','root','','tally');
if($con)
{
   // echo $_POST['signup'];
    if(!$_POST['signup'])
    {
        $institute=$_POST['ins'];
        $email=$_POST['email'];
        $psw=$_POST['psw'];
        $query="INSERT INTO DETAIL(INS,EMAIL,PSW) VALUES('$institute','$email','$psw')";
        $sql=mysqli_query($con,$query);
        if($sql)
        header("Location: host_quiz.html");
        else
        echo "error not inserted";
    }
    else
    echo "error not data recieved";
}
?>