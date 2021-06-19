<div class='modal' id='createCourseModal'>
  <div class='modal-dialog'>
    <div class='modal-content'>
      <div class='modal-header'>
        <button data-dismiss='modal'>×</button>
      </div>
      <div class='modal-body'>
        <p>Course Name: <input type='text' class='button' name='newCourseName' id='newCourseName' /></p>
        <p>Join Code: <?php echo random_int(100000, 999999) ?></p>
      </div>
      <div class='modal-footer'>
        <button>Create</button>
      </div>
    </div>
  </div>
</div>
