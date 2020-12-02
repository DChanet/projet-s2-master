<?php
require_once('autoload.php');


$stmt = MyPDO::getInstance()->prepare(<<<SQL
    SELECT e.name, count(a.id)
    FROM artist e
    left join album a
    on e.id = a.artistId
    GROUP BY e.id
    ORDER BY e.name
    
SQL
);
$stmt->execute();

$page = new WebPage();
$page->appendContent("<h1>Nombre d'albums des {$stmt->rowCount()} artistes</h1>");
while (($ligne = $stmt->fetch()) !== false) {
    $page->appendContent("<p>• {$ligne['name']} : {$ligne['count(a.id)']}\n");
}
$page->setTitle("Nombre d'albums des {$stmt->rowCount()} artistes");
echo $page->toHtml();