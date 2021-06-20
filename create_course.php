<p><input id='course-button' class='button' type='button' name='createCourse' value='Create a Course' onclick='courseCreator()' /></p>
<div id='creator' style='display: none'>
  <p>Course Name: <input style='margin-left: 20px;' type='text' class='button' name='newCourseName' id='newCourseName' /></p>
  <div id="response-area"></div>
  <input type='button' value='Create This Course' class='button' name='createCourse' onclick='request_course_creation()' />
</div>
<style>
  #join-class {
    display: none;
  }
</style>
<script>

function courseCreator() {
  document.querySelector('#course-button').style.display = 'none';
  document.querySelector('#creator').style.display = '';
}

function request_course_creation() {
    let xhr = new XMLHttpRequest();
    let responseArea = document.querySelector("#response-area");
    let courseName = document.querySelector("#newCourseName").value;
    xhr.onreadystatechange=function() {
        if (xhr.readyState==4 && xhr.status == 200) {
            responseArea.innerHTML = xhr.responseText;
        }
    }
    if (courseName != "") {
        xhr.open("POST", "course_creation.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send("courseName="+courseName);
    }
}
</script>
