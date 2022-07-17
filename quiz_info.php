<?php
session_start();
?>
   <?php
    $con=mysqli_connect('localhost','root','','tally');
    $id=$_POST['id'];
    $query="SELECT * FROM QUIZ WHERE UNIQUE_ID='$id'";
    $res=mysqli_query($con,$query);
    $_SESSION['id']=$id;
    $_SESSION['name']=$_POST['name'];
    $row=mysqli_fetch_assoc($res);
?>
<html>
    <head>
        <link rel="stylesheet" href="style3.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    </head>
    <script>
        $(document).ready(function(){
            var star_date='<?php echo $row['START_DATE']; ?>';
            var start_time='<?php echo $row['START_TIME']; ?>';
           var today=new Date();
           var start=star_date.split("-");
           var start_time1=start_time.split(":");
           var end_date='<?php echo $row['END_DATE'] ?>';
           var end_time='<?php echo $row['END_TIME'] ?>';
          $(".end_time").text("ends on : "+end_date+" at "+end_time);
           setInterval('window.location.reload()',6000);
           setInterval(function(){ 
            
            var year=today.getFullYear();
           var month=today.getMonth()+1;
           var day=today.getDate();
           var start_time1=start_time.split(":");
           var hour=today.getHours();
           var min=today.getMinutes();
           var sec=today.getSeconds();
           var date1=today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate()
            $(".start_time").text(sec);
           if(year>=parseInt(start[0]))
           {
            if(month>=parseInt(start[1]))
            {
                if(day>=parseInt(start[2]))
                {
                   
                   $(".start_time").text("live from: "+(hour-start_time1[0])+"hour:"+(min-start_time1[1]+"min:"+(sec-start_time1[2])+"sec"));
                }
            }
           }
        },1000);
          
           //$(".start_time").text(typeof(parseInt(start[0])));
        });
    </script>
    <body>
    <div class="brand-title"><p>QUIZ GRADERS</p></div>
<div class="box">
<div class="name">
<?php
 echo '<p>quiz name:'.$row['NAME'].'</p>';
?>
</div>
<div class="duration">
<?php
echo '<p>duration: '.$row['DURATION'].' minutes</p>';
$_SESSION['duration']=$row['DURATION'];
?>
</div>
<div class="info">
    <?php
    echo '<p>number of question: '.$row['MCQ'].'</p>';
    ?>
</div>
<div class="status">
    <p class="start_time"></p>
    <p class="end_time"></p>
</div>

</div>
<br>
<a href="take_quiz.php"><button>start &#8594</button></a>
    </body>
</html>
