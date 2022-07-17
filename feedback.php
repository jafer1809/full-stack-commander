<?php
session_start();
$con=mysqli_connect('localhost','root','','tally');
$id=$_SESSION['id'];
$name=$_SESSION['name'];
$ans='';
for($i=1;$i<=$_SESSION['count'];$i++)
{
	$ans=$ans.rand(1,$_SESSION['count']);
}
$query="INSERT INTO ANSWER(UNIQUE_ID,NAME,ANS) VALUES('$id','$name','$ans')";
$res=mysqli_query($con,$query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="feedback.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Feedback
    </title>
</head>

<body>
    <h1>ThankYou For Taking the Quiz</h1>
    <form id="form">

        <div class="form-control">
            <label for="role" id="label-role">
				How was your experience with the Quiz?
			</label>
            <select name="role" id="role">
				<option value="">Good</option>
				<option value="">Oka</option>
				<option value="">Poor</option>
				<option value="">I don't wanna say</option>
			</select>
        </div>
        <div class="form-control">
            <label for="role" id="label-role">
				How was Clearty of Questions?
			</label>
            <select name="role" id="role">
				<option value="">Good</option>
				<option value="">Oka</option>
				<option value="">Poor</option>
				<option value="">I don't wanna say</option>
			</select>
        </div>
        <div class="form-control">
            <label for="role" id="label-role">
				How was Difficulty level of Questions?
			</label>
            <select name="role" id="role">
				<option value="">Good</option>
				<option value="">Oka</option>
				<option value="">Poor</option>
				<option value="">I don't wanna say</option>
			</select>
        </div>
        <div class="form-control">
            <label for="role" id="label-role">
				How was user interface of QuizGraders?
			</label>
            <select name="role" id="role">
				<option value="">Good</option>
				<option value="">Oka</option>
				<option value="">Poor</option>
				<option value="">I don't wanna say</option>
			</select>
        </div>
        <div class="form-control">
            <label for="comment">
				Please give your reviews
			</label>
            <textarea name="comment" id="comment" placeholder="Enter your comment here">
			</textarea>
        </div>
        <button type="submit" value="submit">
			Submit
		</button>
    </form>
</body>

</html>