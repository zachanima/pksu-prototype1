<?

$db = new PDO("mysql:host=localhost;dbname=pksu", 'root', '');

$stmt = $db->prepare('select * from questions');
$stmt->setFetchMode(PDO::FETCH_NAMED);
$stmt->execute();
$questions = $stmt->fetchAll();

foreach ($questions as $key => $question) {
  $stmt = $db->prepare("select * from answers where question_id = ?");
  $stmt->setFetchMode(PDO::FETCH_NAMED);
  $stmt->execute(array($question['id']));
  $questions[$key]['answers'] = $stmt->fetchAll();
}

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Questions Test</title>
  </head>
  <body>

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
