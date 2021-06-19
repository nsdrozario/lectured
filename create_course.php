<?php
  $numbers = '0123456789';
  $length = strlen($numbers);
  $randomNumber = '';
  for($i = 0; i < 6; i++) {
    $randomNumber .= $characters[rand(0, $length - 1)];
  }
 ?>
<div class='modal'>
  <div class='modal-dialog'>
    <div class='modal-content'>
      <div class='modal-header'>
        <button data-dismiss='modal'>×</button>
      </div>
      <div class='modal-body'>
        <p>Course Name: <input type='text' class='button' name='newCourseName' id='newCourseName' /></p>
        <p>Join Code: <?php echo $randomNumber; ?></p>
      </div>
      <div class='modal-footer'>
        <button>Create</button>
      </div>
    </div>
  </div>
</div>
