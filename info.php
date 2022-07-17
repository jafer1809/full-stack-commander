<htmL>
    <head>
        <link rel="stylesheet" href="info.css">
    </head>
    <body>
        <table border="1">
            <tr class="heading">
                <td>name of quiz</td>
                <td>unique id</td>
                <td>start date</td>
                <td>start time</td>
                <td>end date</td>
                <td>end time</td>
                <td>duration</td>
                <td>number of students given</td>
            </tr>
    <?php
session_start();
$con=mysqli_connect('localhost','root','','tally');
$ID=$_SESSION['id'];
$query="SELECT * FROM QUIZ";
$res=mysqli_query($con,$query);
while($row=mysqli_fetch_assoc($res)){
echo '<tr>';
echo '<td>'.$row['NAME'].'</td>';
echo '<td>'.$row['UNIQUE_ID'].'</td>';
echo '<td>'.$row['START_DATE'].'</td>';
echo '<td>'.$row['START_TIME'].'</td>';
echo '<td>'.$row['END_DATE'].'</td>';
echo '<td>'.$row['END_TIME'].'</td>';
echo '<td>'.$row['DURATION'].'</td>';
$id=$row['UNIQUE_ID'];
$query1="SELECT * FROM ANSWER WHERE UNIQUE_ID='$id'";
$res1=mysqli_query($con,$query1);
$res2=mysqli_fetch_array($res1);
echo '<td>'.$res2[0].'</td>';
echo '</tr>';
}

?>
</table>
    </body>
</htmL>