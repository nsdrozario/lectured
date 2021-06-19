<div class='modal'>
  <div class='modal-dialog'>
    <div class='modal-content'>
      <div class='modal-header'>
        <button data-dismiss='modal'>×</button>
      </div>
      <div class='modal-body'>
        <p>Course Name: <input type='text' class='button' name='newCourseName' id='newCourseName' /></p>
      </div>
      <div class='modal-footer'>
        <button onclick="request_course_creation();">Create</button>
      </div>
      <div id="feedback">
      </div>
    </div>
  </div>
</div>
<script>

function request_course_creation() {

    let xhr = new XMLHTTPRequest();
    xhr.onreadystatechange = function () { 
        if (this.readyState == 4 && this.status == 200) {
            document.querySelector("#feedback").innerHTML = xhr.responseText;
        }
    }
    xhr.open("POST", "course_creation.php", true);
    xhr.send("courseName="+document.querySelector("#newCourseName").value);

}

</script>