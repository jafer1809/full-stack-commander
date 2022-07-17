<?php
session_start();
$con=mysqli_connect('localhost','root','','tally');
if($con)
{
    $email=$_POST['email'];
    $psw=$_POST['psw'];
    $t=false;
    $query="SELECT * FROM DETAIL";
    $res=mysqli_query($con,$query);
    while($row=mysqli_fetch_assoc($res)){
        $_SESSION['id']=$row['ID'];
      if($email==$row['EMAIL'] && $psw==$row['PSW'])
       {
        $t=true;
        header("Location: taker_index.php");
       }
       
    }
    if(!$t)
    header("Location: host_quiz.html");
}
?>