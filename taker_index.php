<?php

session_start();
echo $_SESSION['id'];
?>
<html>
    <head>
        <title>admin</title>
        <link rel="stylesheet" href="style2.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    </head>
    <script>
        $(document).ready(function(){
            $(".con").hide();
            $(".create").mouseenter(function(){
           
        });
        $(".create").click(function(){
            $(".con").show();
            $("h1").hide(1000).show(1000).animate({opacity: 0.5});
            $("h1").css("color","red");
            $(".create").hide();
            $(".info").hide();
        });
        });
        
        </script>
    <body>
        <h1>welcome to quiz graders web app</h1>
        <div class="link">
        <button class="create">create quiz</button>
        <a href="info.php"><button class="info">quiz information</button></a>
        </div>
        <div class="con">
            <form action="taker_index.php" method="post" >
                <input type="text" name="name" placeholder="enter the name of quiz" required>
                <input type="text" name="id" placeholder="enter the unique id" required>
                <input type="number" name="mcq" placeholder="number of mcq question" required>
                <input type="date" name="start_date" placeholder="start date" required>
                <br>
                <input type="time" name="start_time" placeholder="start time" required>
                <input type="date" name="end_date" placeholder="end date" required>
                <input type="time" name="end_time" placeholder="end time" required>
                <input type="number" name="dur" placeholder="duration in minutes">
                <input type="submit" name="submit">
            </form>
        </div>
        <?php
        //echo "hello";
       // echo $_POST['submit'];
       $l=0;
        if(isset($_POST['submit']))
        {
            $_SESSION['mcq']=$_POST['mcq'];
            $_SESSION['unique_id']=$_POST['id'];
           // echo $_SESSION['mcq'];
            //echo $_SESSION['unique_id'];
            $name=$_POST['name'];
            $id=$_POST['id'];
            $mcq=$_POST['mcq'];
           // $sa=$_POST['sa'];
            $tis=$_SESSION['id'];
            $start_date=$_POST['start_date'];
            $end_date=$_POST['end_date'];
            $start_time=$_POST['start_time'];
            $end_time=$_POST['end_time'];
            $duration=$_POST['dur'];
            $con=mysqli_connect('localhost','root','','tally');
            $query="INSERT INTO QUIZ(NAME,UNIQUE_ID,MCQ,TID,START_DATE,START_TIME,END_DATE,END_TIME,DURATION) VALUES('$name','$id','$mcq','$tis','$start_date','$start_time','$end_date','$end_time','$duration')";
            $res=mysqli_query($con,$query);
          echo '<form method="post" action="quiz_save.php">';
            for($i=1;$i<=$_POST['mcq'];$i++){
                $l=$l+1;
                echo '<div class="box">';
                echo $l.'<br>';
                echo '<input type="text" name="qm'.$i.'" class="question" placeholder="enter the question">'.'<br>';
                echo '<label>options</label><br>';
                echo "1".'<input type="text" name="o1'.$i.'" class="options" placeholder="correct option">'.'<br>';
                echo "2".'<input type="text" name="o2'.$i.'" class="options" placeholder="option">'.'<br>';
                echo "3".'<input type="text" name="o3'.$i.'" class="options" placeholder="option">'.'<br>';
                echo "4".'<input type="text" name="o4'.$i.'" class="options" placeholder="option">'.'<br>';
                echo '</div>';
            }
            echo '<input type="submit" name="submit">';
            echo '</form>';
        }
        ?>
        
    </body>
</html>