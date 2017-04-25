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

  if(isset($_GET['q1']) &&
     isset($_GET['q2']) &&
     isset($_GET['q3']) &&
     isset($_GET['q4']) &&
     isset($_GET['q5']) &&
     isset($_GET['q6']) &&
     isset($_GET['q7']) &&
     isset($_GET['q8']) &&
     isset($_GET['q9']) &&
     isset($_GET['q10']) &&
     isset($_GET['q11']) &&
     isset($_GET['q12']) &&
     isset($_GET['q13']) &&
     isset($_GET['q14']) &&
     isset($_GET['q15']) &&
     isset($_GET['q16']) &&
     isset($_GET['q17']) &&
     isset($_GET['q18']) &&
     isset($_GET['q19']) &&
     isset($_GET['q20']) &&
     isset($_GET['q21']))
  {
    $username = get_post($conn, 'username');
    $q1  = get_post($conn, 'q1' );
    $q2  = get_post($conn, 'q2' );
    $q3  = get_post($conn, 'q3' );
    $q4  = get_post($conn, 'q4' );
    $q5  = get_post($conn, 'q5' );
    $q6  = get_post($conn, 'q6' );
    $q7  = get_post($conn, 'q7' );
    $q8  = get_post($conn, 'q8' );
    $q9  = get_post($conn, 'q9' );
    $q10 = get_post($conn, 'q10');
    $q11 = get_post($conn, 'q11');
    $q12 = get_post($conn, 'q12');
    $q13 = get_post($conn, 'q13');
    $q14 = get_post($conn, 'q14');
    $q15 = get_post($conn, 'q15');
    $q16 = get_post($conn, 'q16');
    $q17 = get_post($conn, 'q17');
    $q18 = get_post($conn, 'q18');
    $q19 = get_post($conn, 'q19');
    $q20 = get_post($conn, 'q20');
    $q21 = get_post($conn, 'q21'); 

    $query = "INSERT INTO surveyResponses(q3,q4,q5,q6,q7,q8,q9,q10,q11,q12,q13,q14,q15
                                          ,q16,q17,q18,q19,q20,q21) VALUES" .
             "('$q3','$q4','$q5','$q6','$q7','$q8','$q9','$q10','$q11','$q12','$q13',
               '$q14','$q15','$q16','$q17','$q18','$q19','$q20','$q21')";
    $result = $conn->query($query);
    if(!$result) echo "Error: $query<br>";
      $conn->error . "<br><br>";

    $query = "INSERT INTO users(username) VALUES".
             "('$username')";
    $result = $conn->query($query);
    if(!$result) echo "Error: $query<br>";
      $conn->error . "<br><br>";

    $query = "SELECT MAX(userID) from users;";
    $maxUserID = $conn->query($query);
    if(!$maxUserID) die("Error: " . $conn->error);

    $query = "SELECT MAX(surveyQuestionID) from surveyResponses;";
    $maxQuestionID = $conn->query($query);
    if(!$maxQuestionID) die("Error: " . $conn->error);

 // $query = "INSERT INTO whoSaidWhat(userID, questionID) VALUES ('$maxUserID', '$maxQuestionID')";
    $result = $conn->query($query);
    if(!$result) echo "Error: $query<br>";
      $conn->error . "<br><br>";

    echo "Survey submitted. <a href='SurveyResults.php'>Click here</a> to view results.";
    //This is a temporary solution
  } 
  
  echo "<head><title>Sewanee Survey</title><link rel='stylesheet' type='text/css' href='style.css'>";
  echo "</head>";
    echo "<body background='SewaneeOverheadEDITED.jpg';>";
      echo "<h1>Sewanee Survey</h1>";

  // survey section
  echo <<<_FB
  <form action="SurveyPage.php" method="survey"><pre>

  <b><i>The first problems are personal questions.</b></i>
  <i>(Required fields are marked with "*")</i><br>

  <b>*What is your Sewanee username?</b>
  <i>(Example: lastnfm0)</i> 
  <input type="text" name="username" required><br>

  <b>*What year are you?</b>
  <input type="radio" name="q1" value="First-Year" required> First-Year   
  <input type="radio" name="q1" value="Sophomore"> Sophomore
  <input type="radio" name="q1" value="Junior"> Junior  
  <input type="radio" name="q1" value="Senior"> Senior

  <b>*What is your gender?</b>
  <input type="radio" name="q2" value="Male" required> Male   
  <input type="radio" name="q2" value="Female"> Female
  <input type="radio" name="q2" value="Non-Binary"> Non-Binary  
  <input type="radio" name="q2" value="Prefer not to Answer"> Prefer not to Answer

  <b>*Do you preticipate in Greek Life?</b>
  <input type="radio" name="q3" value="1"> Yes   
  <input type="radio" name="q3" value="2"> No


  <b><i>For the next problems, answer with how you feel about the statement.</b></i>

  <b>*Sewanee has an alcohol problem.</b>
  <input type="radio" name="q4" value="1" required> Strongly Agree   
  <input type="radio" name="q4" value="2"> Agree  
  <input type="radio" name="q4" value="3"> Indifferent  
  <input type="radio" name="q4" value="4"> Disagree
  <input type="radio" name="q4" value="5"> Strongly Disagree
 
  <b>*Sewanee has a drug problem.</b>
  <input type="radio" name="q5" value="1" required> Strongly Agree
  <input type="radio" name="q5" value="2"> Agree
  <input type="radio" name="q5" value="3"> Indifferent
  <input type="radio" name="q5" value="4"> Disagree
  <input type="radio" name="q5" value="5"> Strongly Disagree

  <b>*Sewanee is safe.</b>
  <input type="radio" name="q6" value="1" required> Strongly Agree
  <input type="radio" name="q6" value="2"> Agree
  <input type="radio" name="q6" value="3"> Indifferent
  <input type="radio" name="q6" value="4"> Disagree
  <input type="radio" name="q6" value="5"> Strongly Disagree

  <b>*Sewanee does not have a sexual assault problem.</b>
  <input type="radio" name="q7" value="1" required> Strongly Agree
  <input type="radio" name="q7" value="2"> Agree
  <input type="radio" name="q7" value="3"> Indifferent
  <input type="radio" name="q7" value="4"> Disagree
  <input type="radio" name="q7" value="5"> Strongly Disagree

  <b>*Fraternities are a safe space.</b>
  <input type="radio" name="q8" value="1" required> Strongly Agree
  <input type="radio" name="q8" value="2"> Agree
  <input type="radio" name="q8" value="3"> Indifferent
  <input type="radio" name="q8" value="4"> Disagree
  <input type="radio" name="q8" value="5"> Strongly Disagree

  <b>*Greek life is a positive part of campus.</b>
  <input type="radio" name="q9" value="1" required> Strongly Agree
  <input type="radio" name="q9" value="2"> Agree
  <input type="radio" name="q9" value="3"> Indifferent
  <input type="radio" name="q9" value="4"> Disagree
  <input type="radio" name="q9" value="5"> Strongly Disagree

  <b>*Sewanee does not provide adequate weekend activities outside of Greek life.</b>
  <input type="radio" name="q10" value="1" required> Strongly Agree
  <input type="radio" name="q10" value="2"> Agree
  <input type="radio" name="q10" value="3"> Indifferent
  <input type="radio" name="q10" value="4"> Disagree
  <input type="radio" name="q10" value="5"> Strongly Disagree

  <b>*Sewanee provides enough sober entertainment alternatives.</b>
  <input type="radio" name="q11" value="1" required> Strongly Agree
  <input type="radio" name="q11" value="2"> Agree
  <input type="radio" name="q11" value="3"> Indifferent
  <input type="radio" name="q11" value="4"> Disagree
  <input type="radio" name="q11" value="5"> Strongly Disagree

  <b>*I am happy with residential life.</b>
  <input type="radio" name="q12" value="1" required> Strongly Agree
  <input type="radio" name="q12" value="2"> Agree
  <input type="radio" name="q12" value="3"> Indifferent
  <input type="radio" name="q12" value="4"> Disagree
  <input type="radio" name="q12" value="5"> Strongly Disagree

  <b>*Sewanee provides enough dining options outside of McClurg and the Pub.</b>
  <input type="radio" name="q13" value="1" required> Strongly Agree
  <input type="radio" name="q13" value="2"> Agree
  <input type="radio" name="q13" value="3"> Indifferent
  <input type="radio" name="q13" value="4"> Disagree
  <input type="radio" name="q13" value="5"> Strongly Disagree

  <b>*I often leave the mountain during weekends.</b>
  <input type="radio" name="q14" value="1" required> Strongly Agree
  <input type="radio" name="q14" value="2"> Agree
  <input type="radio" name="q14" value="3"> Indifferent
  <input type="radio" name="q14" value="4"> Disagree
  <input type="radio" name="q14" value="5"> Strongly Disagree

  <b>*Sewanee's frat culture has positively affected my Sewanee experience.</b>
  <input type="radio" name="q15" value="1" required> Strongly Agree
  <input type="radio" name="q15" value="2"> Agree
  <input type="radio" name="q15" value="3"> Indifferent
  <input type="radio" name="q15" value="4"> Disagree
  <input type="radio" name="q15" value="5"> Strongly Disagree

  <b>*Sewanee should provide more sober weekend activites.</b>
  <input type="radio" name="q16" value="1" required> Strongly Agree
  <input type="radio" name="q16" value="2"> Agree
  <input type="radio" name="q16" value="3"> Indifferent
  <input type="radio" name="q16" value="4"> Disagree
  <input type="radio" name="q16" value="5"> Strongly Disagree

  <b>*Sewanee does not do enough to fight sexual assault on campus.</b>
  <input type="radio" name="q17" value="1" required> Strongly Agree
  <input type="radio" name="q17" value="2"> Agree
  <input type="radio" name="q17" value="3"> Indifferent
  <input type="radio" name="q17" value="4"> Disagree
  <input type="radio" name="q17" value="5"> Strongly Disagree

  <b>*I am satisfied with Sewanee's honor system.</b>
  <input type="radio" name="q18" value="1" required> Strongly Agree
  <input type="radio" name="q18" value="2"> Agree
  <input type="radio" name="q18" value="3"> Indifferent
  <input type="radio" name="q18" value="4"> Disagree
  <input type="radio" name="q18" value="5"> Strongly Disagree

  <b>*Sewanee's honor system is effective in curbing dishonest behavior.</b>
  <input type="radio" name="q19" value="1" required> Strongly Agree
  <input type="radio" name="q19" value="2"> Agree
  <input type="radio" name="q19" value="3"> Indifferent
  <input type="radio" name="q19" value="4"> Disagree
  <input type="radio" name="q19" value="5"> Strongly Disagree

  <b>*Sewanee's honor system does not apply to underage drinking.</b>
  <input type="radio" name="q20" value="1" required> Strongly Agree
  <input type="radio" name="q20" value="2"> Agree
  <input type="radio" name="q20" value="3"> Indifferent
  <input type="radio" name="q20" value="4"> Disagree
  <input type="radio" name="q20" value="5"> Strongly Disagree

  <b>*My Sewanee experience has been positive.</b>
  <input type="radio" name="q21" value="1" required> Strongly Agree
  <input type="radio" name="q21" value="2"> Agree
  <input type="radio" name="q21" value="3"> Indifferent
  <input type="radio" name="q21" value="4"> Disagree
  <input type="radio" name="q21" value="5"> Strongly Disagree
  
  <b>Feedback Question 1</b> 
  <input type="text" name="fb1"><br>
  <b>Feedback Question 2</b> 
  <input type="text" name="fb2"><br>
  <b>Feedback Question 3</b> 
  <input type="text" name="fb3"><br>
  <input type="submit" value="Submit Survey">
 
  </pre></form>
_FB;
  echo "</body>";

?>
