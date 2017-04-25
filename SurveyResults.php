<?php

//Maria Monterde & Owen Pearson

  require_once 'login.php';
  $conn = new mysqli($hn,$un,$pw,$db);
  if($conn->connect_error) {
    die($conn->connect_error);
  }

  function get_post($conn, $var) {
    return $conn->real_escape_string($_GET[$var]);
  }

  $query = "SELECT count(username) from users;";
  $result = $conn->query($query);
  if(!$result) die("Error: " . $conn->error);

  $query = "SELECT COUNT(surveyResponses.q3) from surveyResponses WHERE q3 = '2';";
  $result2 = $conn->query($query);
  if(!$result2) die("Error: " . $conn->error);

  echo "<head><title>Sewanee Survey</title><link rel='stylesheet' type='text/css' href='style.css'>";
  echo "</head>";
    echo "<body background='SewaneeOverheadEDITED.jpg';>";
      echo "<h1>Sewanee Survey</h1>";
    echo "</body>";
    echo "<p>This is where the survey results will go. There will be more results in the future but this shows that the answers to the survey questions to update the database.<br>";
    echo "<br>";
    while($row=$result->fetch_assoc()) {
      echo "<b>Number of different users:</b> " . $row['count(username)'] . "<br>";
    }
    while($row=$result2->fetch_assoc()) {
      echo "<b>Number of users who answered 'Agree' to the first question:</b> " . $row['COUNT(surveyResponses.q3)'];
    }
    echo "</p>";
    echo "<h2><a href='SewaneeSurvey.html' class='link'>Return to Homepage</a></h2>";

?>
