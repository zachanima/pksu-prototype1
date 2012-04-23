<?

$db = new PDO("mysql:host=localhost;dbname=pksu", 'root', '');

require_once 'app/models/topic.php';
require_once 'app/models/question.php';
require_once 'app/models/answer.php';

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Questions Test</title>
    <link href="style.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="jquery.min.js"></script>
    <script type="text/javascript" src="questions.js"></script>
    </script>
  </head>
  <body>

    <ul id="nav">
      <? foreach($topics as $topic): ?>
        <li><a href="?topic_id=<?= $topic['id'] ?>"><?= $topic['title'] ?></a></li>
      <? endforeach ?>
    </ul>

    <? foreach($questions as $question): ?>
      <div class="question">
        <h1><?= $question['text'] ?></h1>
        <form>
          <ol>
            <? foreach($question['answers'] as $answer): ?>
              <li>
                <input
                  id="answer_<?= $answer['id'] ?>"
                  name="question_1"
                  value="<?= $answer['correct'] ?>"
                  type="radio">
                <label for="answer_<?= $answer['id'] ?>"><?= $answer['text'] ?></label>
              </li>
            <? endforeach ?>
          </ol>
          <input type="submit" value="Svar">
        </form>
      </div>
    <? endforeach ?>

  </body>
</html>
