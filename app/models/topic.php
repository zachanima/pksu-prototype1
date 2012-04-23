<?

$stmt = $db->prepare('select * from topics');
$stmt->setFetchMode(PDO::FETCH_NAMED);
$stmt->execute();
$topics = $stmt->fetchAll();
