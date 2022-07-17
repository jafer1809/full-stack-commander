<?php
session_start();

$con=mysqli_connect('localhost','root','','tally');
echo "hello";
echo $_SESSION['mcq'];
for($i=1;$i<=$_SESSION['mcq'];$i++)
    {
        echo $i;
        $ques=$_POST['qm'.$i];
        $op1=$_POST['o1'.$i];
        $op2=$_POST['o2'.$i];
        $op3=$_POST['o3'.$i];
        $op4=$_POST['o4'.$i];
        $id=$_SESSION['unique_id'];
        $query="INSERT INTO QUESTION(ID,QUESTION,OP1,OP2,OP3,OP4) VALUES('$id','$ques','$op1','$op2','$op3','$op4')";
        $res=mysqli_query($con,$query);
    }
header("Location: taker_index.php");
?>