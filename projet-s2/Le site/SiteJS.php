<?php
require_once "WebPage.class.php";

/**
 * Lance la page d'accueil.
 */
function lanceHome(){

    $siteH = new WebPage;

    $siteH->setTitle('JUST SOUND');
    
    $siteH->appendBodyId('Home');
    
    $siteH->appendToHead('<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Team JUST SOUND">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">');
        
    $siteH->appendCssUrl('cover.css');
    
    $siteH->appendContent('<div id="loader-wrapper">
    <div id="loader"></div>
    
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
    
    </div>
    <main role="main" id="content">
    <div class="cover-container d-flex h-100 p-3 mx-auto flex-column">
    <header class="masthead mb-auto">
    <div class="inner">
    <a href="Home.html" style="color: white"><h3 class="masthead-brand">JUST SOUND</h3></a>
    <nav class="nav nav-masthead justify-content-center">
    <a class="nav-link active" href="?Home=true">Home</a>
    <a class="nav-link" href="?Regles=true">Règles</a>
    <a class="nav-link" href="?Credits=true">Crédits</a>
    </nav>
    </div>
    </header>');    
    $siteH->appendContent('<div id="header" class="inner cover">
    <h1 class="cover-heading" id ="Titre1">JUST SOUND</h1>
    <p class="lead">Bienvenue dans le jeu qui va révolutionner le GAMING, si vous voulez vivre une sensation de jeu sans précèdent. Il vous suffit de cliquer sur PLAY !
    </p>
    <p class="lead">
    <a href="?play=true" class="btn btn-lg btn-secondary">PLAY</a>
    </p>
    </div>');
    
    $siteH->appendContent('<footer class="mastfoot mt-auto">
    <div class="inner">
    <p>Design by les professionnels</p>
    </div>
    </footer>
    </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="JS/loader.js"></script>');

    echo $siteH->toHtml();
}



/**
 * Lance la page des règles.
 */
function lanceRegle() :void{


    $siteR = new WebPage;file:///home/Etudiants/

    $siteR->setTitle('JUST SOUND - les règles');

    $siteR->appendBodyId('Regles');

    $siteR->appendToHead('<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Team JUST SOUND">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">');
    
    $siteR->appendCssUrl('cover.css');
    
    $siteR->appendContent('<div id="loader-wrapper">
    <div id="loader"></div>
    
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
    
    </div>
    <main role="main" id="content">
    <div class="cover-container d-flex h-100 p-3 mx-auto flex-column">
    <header class="masthead mb-auto">
    <div class="inner">
    <h3 class="masthead-brand">JUST SOUND</h3>
    <nav class="nav nav-masthead justify-content-center">
    <a class="nav-link" href="?Home=true">Home</a>
    <a class="nav-link active" href="?Regles=true">Règles</a>
    <a class="nav-link" href="?Credits=true">Crédits</a>
    </nav>
    </div>
    </header>');   

    $siteR->appendContent('<div id="header" class="inner cover">
    <h1 class="cover-heading" id="Titre2">les regles</h1>
    <p class="lead">Elles sont simples, il vous suffit de cliquer sur les touches de votre pad en même temps que les pastilles passent dessus, à la manière de GUITAR HERO. </p></div>');

    $siteR->appendContent('<footer class="mastfoot mt-auto">
    <div class="inner">
    <p>Design by les professionnels</p>
    </div>
    </footer>
    </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="JS/loader.js"></script>');

    echo $siteR->toHtml();
}


/**
 * Lance la page des Crédits.
 */
function lanceCredits() :void{

    $siteC = new WebPage;

    $siteC->setTitle('JUST SOUND - les crédits');

    $siteC->appendBodyId('Credits');

    $siteC->appendToHead('<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Team JUST SOUND">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">');
    
    $siteC->appendCssUrl('cover.css');
    
    $siteC->appendContent('<div id="loader-wrapper">
    <div id="loader"></div>
    
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
    
    </div>
    <main role="main" id="content">
    <div class="cover-container d-flex h-100 p-3 mx-auto flex-column">
    <header class="masthead mb-auto">
    <div class="inner">
    <h3 class="masthead-brand">JUST SOUND</h3>
    <nav class="nav nav-masthead justify-content-center">
    <a class="nav-link" href="?Home=true">Home</a>
    <a class="nav-link" href="?Regles=true">Règles</a>
    <a class="nav-link active" href="?Credits=true">Crédits</a>
    </nav>
    </div>
    </header>');   

    $siteC->appendContent('<div id="header" class="inner cover">
    <h1 class="cover-heading" id="Titre3">credits</h1>
    <p class="lead">La TEAM JUST SOUND a pour but de vous faire vivre la meilleure expérience de G@MING actuelle !!!</p>
    <p>Notre équipe est composée des meilleurs des meilleurs : </p>
    <div>
    <ul style="  list-style-type:none">
    <li>ERNEST Antoine</li>
    <li>CHANET David</li>
    <li>FERNANDES BATISTA Nicolas</li>
    <li>BOIVIN Benjamin</li>
    <li>FOFANA David</li>
    <li>DEVILLERS Orelian</li>
    </ul>
    </div>
    </div>');

    $siteC->appendContent('<footer class="mastfoot mt-auto">
    <div class="inner" id="design">
    <p>Design by les professionnels</p>
    </div>
    </footer>
    </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="JS/loader.js"></script>');

    echo $siteC->toHtml();
}


/**
 * Lance la page du Jeu.
 */
function lanceJeu() :void{

    $siteP = new WebPage;

    $siteP->setTitle('JUST SOUND - le jeu');

    $siteP->appendBodyId('PLAY');
    
    
    $siteP->appendJsUrl("JS/p5.min.js");
    $siteP->appendJsUrl("JS/addons/p5.dom.min.js");
    $siteP->appendJsUrl("JS/addons/p5.sound.min.js");
    $siteP->appendJsUrl("JS/addons/p5.clickable.min.js");
    $siteP->appendJsUrl("JS/class/Pastille.js");
    $siteP->appendJsUrl("JS/class/Touche.js");
    $siteP->appendJsUrl("JS/class/Launchpad.js");
    $siteP->appendJsUrl("JS/class/Son.js");
    $siteP->appendJsUrl("JS/class/Note.js");
    $siteP->appendJsUrl("JS/class/Musique.js");
    $siteP->appendJsUrl("JS/class/Partie.js");
    $siteP->appendJsUrl("JS/sketch.js");

    $siteP->appendToHead('<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Team JUST SOUND">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">');
    
    $siteP->appendCssUrl('cover.css');
    
    $siteP->appendContent('
  <div id="loader-wrapper">
			<div id="loader"></div>
			<div class="loader-section section-left"></div>
			<div class="loader-section section-right"></div>
    </div>
    
    <main role="main" id="content">
      <div class="cover-container d-flex h-100 p-3 mx-auto flex-column">
        
        <header class="masthead mb-auto">
          <div class="inner">
          <a href="?Home=true" style="color: white"><h3 class="masthead-brand">JUST SOUND</h3></a>
          <nav class="nav nav-masthead justify-content-center">
            </nav>
          </div>
        </header>');   

    $siteP->appendContent('<div id="header" class="inner cover">

        </div>');

    $siteP->appendContent('<footer class="mastfoot mt-auto">
    <div class="inner">
    <p>Design by les professionnels</p>
    </div>
    </footer>
    </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="JS/loader.js"></script>
    <video playsinline autoplay muted loop id="bgvid" >

    <source src="IMG/LOL.mp4" type="video/mp4">

  </video>
');

    echo $siteP->toHtml();
}


/**
 * Cette partie gère le lancement des différentes page lorsque l'on appuie sur les différents bouttons du menu.
 */
if (isset($_GET['Home'])) {
    lanceHome();
}
elseif(isset($_GET['Regles'])) {
    lanceRegle();
}
elseif(isset($_GET['Credits'])) {
    lanceCredits();
}
elseif(isset($_GET['play'])){
    lanceJeu();
}
else{
    lanceHome();
}

