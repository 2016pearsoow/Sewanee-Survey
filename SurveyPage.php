<?php
  
  require once 'login.php';
  $conn = new mysqli($hn,$un,$pw,$db);
  if($conn->connect_error) { 
    die($conn->connect_error);
  }
  




  // survey section

  echo <<<_FB
  <form action="SurveyPage.php" method="survey"><pre>
                         <input type="radio" name="q1" value="q1a1"> Q1A1<br>  
                         <input type="radio" name="q1" value="q1a2"> Q1A2<br>  
                         <input type="radio" name="q1" value="q1a3"> Q1A3<br>  
                         <input type="radio" name="q1" value="q1a4"> Q1A4<br>
  
                         <input type="radio" name="q2" value="q2a1"> Q1A1<br>  
                         <input type="radio" name="q2" value="q2a2"> Q1A2<br>  
                         <input type="radio" name="q2" value="q2a3"> Q1A3<br>  
                         <input type="radio" name="q2" value="q2a4"> Q1A4<br>
  
     Feedback Question 1 <input type="text" name="fb1">
     Feedback Question 2 <input type="text" name="fb2">
     Feedback Question 3 <input type="text" name="fb3">
                         <input type="submit" value="Submit Survey">
  </pre></form>
_FB;







    echo "<head>";
      echo "<title>Sewanee Survey</title>";
      echo "<link rel='stylesheet' type='text/css' href='style.css'>";
    echo "</head>";
      echo "<body background="SewaneeOverheadEDITED.jpg";>";
        echo "<h1>Sewanee Survey</h1>";
      echo "</body>";

?>
