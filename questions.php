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
  </head>
  <body>

    <ul id="nav">
      <? foreach($topics as $topic): ?>
        <li><a href="?topic_id=<?= $topic['id'] ?>"><?= $topic['title'] ?></a></li>
      <? endforeach ?>
    </ul>

    <? foreach($questions as $question): ?>
      <h1><?= $question['text'] ?></h1>

      <form>
        <ol>
          <? foreach($question['answers'] as $answer): ?>
            <li>
              <input id="answer_<?= $answer['id'] ?>" name="question_1" type="radio">
              <label for="answer_<?= $answer['id'] ?>"><?= $answer['text'] ?></label>
            </li>
          <? endforeach ?> 
        </ol>

        <input type="submit" value="Svar">
      </form>
    <? endforeach ?>

  </body>
</html>
