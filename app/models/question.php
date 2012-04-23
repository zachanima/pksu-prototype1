<?

$stmt = $db->prepare('select * from questions where topic_id = ?');
$stmt->setFetchMode(PDO::FETCH_NAMED);
$stmt->execute(array($_GET['topic_id']));
$questions = $stmt->fetchAll();
