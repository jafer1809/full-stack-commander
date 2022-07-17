<?php
session_start();
$con=mysqli_connect('localhost','root','','tally');
$id=$_SESSION['id'];
$query="SELECT * FROM QUESTION WHERE ID='$id'";
$res=mysqli_query($con,$query);
$i=0;
$ques=array();
$op1=array();
$op2=array();
$op3=array();
$op4=array();
$count=0;
while($row=mysqli_fetch_assoc($res)){

    array_push($ques,$row['QUESTION']);
   // echo $ques[$i++];
    array_push($op1,$row['OP1']);
    array_push($op2,$row['OP2']);
    array_push($op3,$row['OP3']);
    array_push($op4,$row['OP4']);
    $count++;
}
$_SESSION['count']=$count;
?>
<html>
    <head>
        <link href="quiz.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    </head>
    <script>
        $(document).ready(function(){
            var timer=setInterval(function(){
                var a=parseInt($(".sec").text());
                var b=parseInt($(".min").text());
                var c=parseInt($(".hour").text());
                a=a+1;
                if(a==60)
                {
                    b=b+1;
                    a=0;
                    $(".min").text(b);
                }
                if(b==60)
                {
                    c=c+1;
                    b=0;
                    $(".hour").text(c);
                }
                $(".sec").text(a);
                if(b==parseInt('<?php echo $_SESSION['duration']; ?>'))
                {
                    clearInterval(timer);
                    alert('time ends')
                    $("#next").trigger("click");
                }


            },1000)
            $("#next").hide();
            var i=0;
            var ques='<?php echo $ques[$i]; ?>';
            var op1='<?php echo $op1[$i]; ?>';
            var op2='<?php echo $op2[$i]; ?>';
            var op3='<?php echo $op3[$i]; ?>';
            var op4='<?php echo $op4[$i]; ?>';
            <?php $i++; ?>
            $("#qus").text((++i)+'.'+ques);
            $(".op1").text(op1);
            $(".op2").text(op2);
            $(".op3").text(op3);
            $(".op4").text(op4);
            $("#submit").click(function(){
            ques='<?php echo $ques[$i]; ?>';
            op1='<?php echo $op1[$i]; ?>';
            op2='<?php echo $op2[$i]; ?>';
            op3='<?php echo $op3[$i]; ?>';
            op4='<?php echo $op4[$i]; ?>';
            <?php $i++; ?>
            $("#qus").text((++i)+'.'+ques);
            $(".op1").text(op1);
            $(".op2").text(op2);
            $(".op3").text(op3);
            $(".op4").text(op4);
            if($(".cb1").is(':checked')){
            $(".cb1").prop("checked",false);
            <?php $_SESSION['a'.$i]=1 ?>;
            }
            if($(".cb2").is(':checked')){
            $(".cb2").prop("checked",false);
            <?php $_SESSION['a'.$i]=2 ?>;
            }
            if($(".cb3").is(':checked')){
            $(".cb3").prop("checked",false);
            <?php $_SESSION['a'.$i]=3 ?>;
            }
            if($(".cb4").is(':checked')){
            $(".cb4").prop("checked",false);
            <?php $_SESSION['a'.$i]=4 ?>;
            }
            if(i==parseInt('<?php echo $count; ?>'))
            {
                $("#submit").hide();
                $("#next").show();
            }
            });
        })
        </script>
    <body>

<?php
//session_start();
echo '<div class="timer"><p>TIMER:</p><br><p class="hour">00<p>:</p></p><p class="min">00<p>:</p></p><p class="sec">00</p></div>';
?>
<div>
    <p id="qus">hello</p>
    <input type="checkbox" id="options" class="cb1"><label  class="op1">jafer</label><br>
    <input type="checkbox" id="options" class="cb2"><label  class="op2">jafer</label><br>
    <input type="checkbox" id="options" class="cb3"><label  class="op3">jafer</label><br>
    <input type="checkbox" id="options" class="cb4"><label  class="op4">jafer</label><br>
    <button type="submit" id="submit">next</button>
    <a href="feedback.php"><button type="submit" id="next">submit</button></a>
</div>
    </body>
</html>