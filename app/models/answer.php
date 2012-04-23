<?

foreach ($questions as $key => $question) {
  $stmt = $db->prepare("select * from answers where question_id = ?");
  $stmt->setFetchMode(PDO::FETCH_NAMED);
  $stmt->execute(array($question['id']));
  $questions[$key]['answers'] = $stmt->fetchAll();
}
