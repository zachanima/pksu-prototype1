<?

$db = new PDO("mysql:host=localhost;dbname=pksu", 'root', '');

$stmt = $db->prepare('select * from topics');
$stmt->setFetchMode(PDO::FETCH_NAMED);
$stmt->execute();
$topics = $stmt->fetchAll();

$stmt = $db->prepare('select * from questions where topic_id = ?');
$stmt->setFetchMode(PDO::FETCH_NAMED);
$stmt->execute(array($_GET['topic_id']));
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
