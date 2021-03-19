<?php
$current_state = 'q0'; //default state
$final_state = $_SESSION['final_state'];
$states_count = $_SESSION['states_count'];
$count=0;
$string = $_POST['string'];

// don't allow empty strings
if (empty($_POST['string'])) {
  echo '<script>alert("Enter a string to check.");document.reload();</script>';
  return;
}

//show input string
echo '<p>Input string: '.$string.'</p>';

//check input string character by character
while(isset($string[$count])){
   //take only one character
  $char = substr($string,$count,1);
  //show current state
  echo '<b>'.($count+1) .') variable: '.$char.' → state: ';

  // check all states
  for ($i=0; $i < $states_count; $i++) {

  // when states match, change the current state according to state-transition table
    if ($current_state == 'q'.$i) {
      if ($char == $var1) {
          echo $current_state = $_SESSION['state'][$i][0];
      }else if ($char == $var2) {
          echo $current_state = $_SESSION['state'][$i][1];
      }
      // when current state changed, break the loop and check the next character
      break;
        }
  }
  echo '</b><br>';
  $count++;
}
// show crrent and final states
echo '<p></p>';
echo '<b>Last state = '.$current_state.'</b><br>';
echo '<b>Final state = '.$final_state.'</b>';

// when the last character of input string checked, compare current and final states
// if match, then congratulate user with "Accepted" message :)
if ($current_state == $final_state) {
echo '<p class="accepted">Accepted ^_^</p>';
}else {
  echo '<p class="rejected">Not Accepted :(</p>';
}
 ?>
