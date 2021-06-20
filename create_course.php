<p><input id='course-button' class='button' type='button' name='createCourse' value='Create a Course' onclick='courseCreator()' /></p>
<div id='creator' style='display: none'>
  <p>Course Name: <input style='margin-left: 20px;' type='text' class='button' name='newCourseName' id='newCourseName' /></p>
  <div id="feedback"></div>
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
