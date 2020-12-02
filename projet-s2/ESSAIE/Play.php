<?php

require_once('autoload.php');


$stmt = MyPDO::getInstance()->prepare(<<<SQL
    SELECT Nom
    FROM SON
    ORDER BY nom;a
    
SQL
);
$stmt->execute();

$page = new WebPage();

$page->appendToHead("<head>
<meta charset='utf-8'>
<meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
<meta name='description' content=''>
<meta name='author' content=''>
<link rel='icon' href='/docs/4.0/assets/img/favicons/favicon.ico'>

<title>Cover Template for Bootstrap</title>
<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css' integrity='sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS' crossorigin='anonymous'>
<link rel='canonical' href='https://getbootstrap.com/docs/4.0/examples/cover/'>
<!-- Custom styles for this template -->
<link href='cover.css' rel='stylesheet'>
</head>");

$page->appendContent("<body class='text-center' id='Home'>
        <div id='loader-wrapper'>
        <div id='loader'></div>

        <div class='loader-section section-left'></div>
        <div class='loader-section section-right'></div>

    </div>
<main role='main' id='content'>
<div class='cover-container d-flex h-100 p-3 mx-auto flex-column'>
  <header class='masthead mb-auto'>
    <div class='inner'>
      <h3 class='masthead-brand'>JUST SOUND</h3>
      <nav class='nav nav-masthead justify-content-center'>
        <a class='nav-link active' href='./Home.html'>Home</a>
        <a class='nav-link' href='./Regles.html'>Règles</a>
        <a class='nav-link' href='./Credits.html'>Crédits</a>
      </nav>
    </div>
  </header>

  <div id='header' class='inner cover'>
    <h1 class='cover-heading'>JUST SOUND</h1>
    <p class='lead'>Bienvenue dans le jeu qui vas revolutionner le GAMING, si vous vous voulez vivre une sensation de jeu sans précèdent. Il vous suffit de cliquer sur PLAY !
    </p>
    <p class='lead'>
      <a href='./play.html' class='btn btn-lg btn-secondary'>PLAY</a>
    </p>
  </div>
  

  <footer class='mastfoot mt-auto'>
    <div class='inner'>
      <p>Design by les professionnels</p>
    </div>
  </footer>
</div>
</main>
</body>");
while (($ligne = $stmt->fetch()) !== false) {
    $page->appendContent("<p>• {$ligne['name']} : {$ligne['count(a.id)']}\n");
}

$page->appendJsUrl("https://code.jquery.com/jquery-3.2.1.slim.min.js");
$page->appendJsUrl("../../assets/js/vendor/popper.min.js");
$page->appendJsUrl("../../dist/js/bootstrap.min.js");
$page->appendJsUrl("./loader.js");

echo $page->toHtml();