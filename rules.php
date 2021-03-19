<?php
// set accepted alphabet variables (by default: {0,1})
$_SESSION['var1'] = $var1 = isset($_POST['var1'])? $_POST['var1']: 0;
$_SESSION['var2'] = $var2 = isset($_POST['var2'])? $_POST['var2']: 1;

// set the number of states (at least 2 states)
$_SESSION['states_count'] = $states_count = isset($_POST["states_count"])? $_POST["states_count"]: 2;
?>

<div class="rules">
  <form method="post">
    <input type="hidden" name="rules">
    <table>
      <tr>
        <td>Accepted Alphabet: </td>
        <td>
        { <input type="text" name="var1" class="text-input" style="width:35px;" value="<?=$var1?>" maxlength="1" required>
        ,
        <input type="text" name="var2" class="text-input" style="width:35px;" value="<?=$var2?>" maxlength="1" required> }
        </td>
      </tr>
      <tr>
        <td>Number of States: </td>
        <td><input type="number" name="states_count" class="text-input" style="width:80px;" value="<?=$states_count?>" min="2" onchange="this.form.submit();" required></td>
      </tr>
    </table>
  </form>

  <?php
  // state-transition table section
    echo '<form method="post" >';
    echo '<table class="table transition_table">';
    echo '<tr>';
    echo '<td>Q</td>';
    echo '<td>'.$var1.'</td>';
    echo '<td>'.$var2.'</td>';
    echo '</tr>';

    for ($i=0; $i < $states_count; $i++) {
      echo '<tr>';
      echo '<td>';
      echo 'q'.$i;
      echo '</td>';

      echo '<td>';
      echo '<select name="state['.$i.'][0]">';
      for ($j=0; $j < $states_count; $j++) {
      echo '  <option value="q'.$j.'">q'.$j.'</option>';
      }
      echo '</select>';
      echo '</td>';

      echo '<td>';
      echo '<select name="state['.$i.'][1]">';
      for ($j=0; $j < $states_count; $j++) {
      echo '  <option value="q'.$j.'">q'.$j.'</option>';
      }
      echo '</select>';
      echo '</td>';

      echo '</tr>';
    }
    echo '</table>';

    // final state section
    echo '<div class="final_state">';
    echo 'Final state: ';
    echo '<select name="final_state">';
    for ($i=0; $i < $states_count; $i++) {
    echo '  <option selected value="q'.$i.'">q'.$i.'</option>';
    }
    echo '</select>';
    echo '</div><br>';
    echo '<input type="submit" name="transition_table" value="apply" class="btn btn-primary">';

   ?>
</div>
