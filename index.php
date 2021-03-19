<?php
session_start();

// check if all required rules has entered
if (!isset($_SESSION['rules'])) $_SESSION['rules'] = true;

// reset all sections
if (isset($_POST['reset'])){
  session_destroy();
  header('LOCATION: index.php');
   return;
}

// set transition states as cookies to use them to check input strings
if (isset($_POST['transition_table'])) {

  for ($i=0; $i < $_SESSION['states_count']; $i++) {
    // 1st variable states
    $_SESSION['state'][$i][0] = $_POST['state'][$i][0];

      // 2nd variable states
    $_SESSION['state'][$i][1] = $_POST['state'][$i][1];
  }

  // final state
  $_SESSION['final_state'] = $_POST['final_state'];

  // after setting the all required rules, hide rules.php file
  $_SESSION['rules'] = false;
}

 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <!-- mobile responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DFA Simulator</title>
    <!-- bootstrap  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <!-- project styles -->
    <link href="css/style.css?key=<?=time()?>" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <div class="row">
      <div class="application col-sm-8 col-md-6">
        <h2>BSM309 DFA Simulator</h2>
        <!-- hide rules.php after setting the required rules -->
        <?php if($_SESSION['rules']) include_once 'rules.php';

        // let users input strings after setting the rules
        if ($_SESSION['rules'] == false) {

          // accepted alphabet
        $var1 = $_SESSION['var1'];
        $var2 = $_SESSION['var2'];

        // input string form
          echo '<div>';
          echo '<form method="post">';
          //only accepted alphabet variables could input in this form using (pattern)
          echo '<b>String: </b> <input class="text-input" type="text" name="string" pattern="['.$var1.'-'.$var2.']+">';

          echo '<input type="submit" value="Check" class="btn btn-primary">';
          echo '<input type="submit" name="reset" value="Reset" class="btn btn-info">';

          echo '</form>';
          echo '</div><br>';
        }
        // check input string
        if (isset($_POST['string'])) include_once 'result.php';
         ?>
          </div>

          <!-- show a DFA example -->
           <div class="col-sm-4 col-md-6">
             <h3>Example: </h3>
             <img class="dfa-example" src="images/DFA Example.jpeg" alt="DFA Example">
           </div>

         </div>
      </div>
  </body>
</html>
