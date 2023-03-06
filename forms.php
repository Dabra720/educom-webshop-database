<?php

function showFormStart($hasRequiredFields){
  if($hasRequiredFields){
    echo '<span class="error">* required fields</span>';
  }
	echo '<form action="index.php" method="POST">
	<table>';
}

function showFormField($field, $label, $type, $data, $required=true, $options=NULL){

  switch($type){
    case 'select':
      showRowStart($field, $label);
      echo '<select name="'.$field.'" id="'.$field.'">';
      foreach(SALUTATIONS as $key=>$label){
        echo '<option value="'.$key.'" '; if (getArrayVar($data['values'], $field)==$label) echo "selected"; echo ' >'.$label.'</option>'; 
      }
			echo '</select><span class="error">* '.getArrayVar($data['errors'], $field).'</span>';
      showRowEnd();
      break;
    case 'radio':
      showRowStart($field, $label);
      foreach(COMM_PREFS as $key=>$value){
        echo '<input type="'.$type.'" name="'.$field.'" id="'.$key.'" '; if (getArrayVar($data['values'], $field)==$value) echo "checked"; echo ' value="'.$value.'"><label for="'.$key.'">'.$value.'</label>';
      }
      echo '<span class="error">* '.getArrayVar($data['errors'], $field).'</span>';
      showRowEnd();
      break;
    case 'textarea':
      showRowStart($field, $label);
      echo '<'.$type.' name="'.$field.'">'.getArrayVar($data['values'], $field).'</'.$type.'><span class="error">* '.getArrayVar($data['errors'], $field).'</span>';
      showRowEnd();
      break;
    default:
      showRowStart($field, $label);
      echo '<input type="'.$type.'" name="'.$field.'" id="'.$field.'" value="'.getArrayVar($data['values'], $field).'"><span class="error">* '.getArrayVar($data['errors'], $field).'</span>';
      showRowEnd();
      break;
  }
}
function showRowStart($field, $label){
  echo '<tr>
			<td><label for="'.$field.'">'.$label.': </label></td>
			<td>';
}
function showRowEnd(){
  echo '</td>
  </tr>';
}
function showFormEnd($page){
  echo '<tr>
  <td><input type="submit" value="Verzend"></td>
  <td><input type="hidden" name="page" value="'.$page.'"></td>
  </tr>
  </form></table>';
}

?>