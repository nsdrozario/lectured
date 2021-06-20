<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php
      include 'head.php';
     ?>
    <title>Quiz Creator - InspirEd</title>
  </head>
  <body>
    <div class='container home relative-top'>
      <p class='heading-title'>Quiz Creator</p><br/>
      <div class='container special'>
        <div id='overallquestion1'>
          <p>Question 1<span onclick='removeQuestion(1)' style='margin-left: 150px;'>×</span></p>
          <textarea name='question1' id='question1'></textarea><br/><br/>
        </div>
        <span id='morequestions'></span>
        <br/><input type='button' value='Add Question' class='button' onclick='addQuestion()' />
      </div>
    </div>
  </body>
  <script>
    let question = 1;
    function removeQuestion(questionNumber) {
      document.querySelector('#overallquestion' + questionNumber).style.display = 'none';
    }
    function addQuestion() {
      question++;
      document.querySelector('#morequestions').innerHTML += "<div id='overallquestion" + question + "'><p>Question " + question + "<span onclick='removeQuestion(" + question + ")' style='margin-left: 150px;'>×</span></p><textarea name='question" + question + "' id='question" + question + "'></textarea><br/><br/></div>";
    }
  </script>
</html>
