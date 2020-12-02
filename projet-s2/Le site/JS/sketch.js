let value = 0;

//var son = new Son("PremierSon.ogg");

var partie = new Partie("test", "Premier Son", "PremierSon");
var time = 0;
var actualNote = 0;

function preload(){
  soundFormats('ogg', 'mp3');
  partie.load();
  //son.load();
}



function setup() {
  var cnv = createCanvas(1750,500);
  cnv.position(110,100);
  frameRate(60);
  //son.play();
  partie.play();
}

var pad = new Launchpad();
pad.move(725,268);
var notes = partie.getNotes();
console.debug(notes);
var timePastille = notes[actualNote].temps - pad.getTime();
var lastTimePressed = 0;
var released = true;

console.log("temps note : " + notes[actualNote].temps);
console.log("temps pastille : " + pad.getTime());
//pad.pastille(notes[actualNote].toucheNum);

function draw() {
  time = partie.getActualTime();
  if(time > notes[actualNote].temps && actualNote < notes.length-1){
    partie.refreshScore(actualNote);
    actualNote++;
    released = true;
    timePastille = notes[actualNote].temps - pad.getTime();
  }
  if(!isNaN(timePastille)){
    //print(timePastille);
  }
  if(time > timePastille - 0.015 && time < timePastille + 0.015){
    pad.pastille(notes[actualNote].toucheNum);
  }
  clear();
  pad.checkKeyboard(value);
  pad.draw();
  if(pad.pressed(notes[actualNote].toucheNum) && released){
    lastTimePressed = time;
    released = false;
  }else{
    released = !pad.pressed(notes[actualNote].toucheNum);
  }
  if(notes[actualNote].calculateScore(lastTimePressed) > 0 && pad.pressed(notes[actualNote].toucheNum) && actualNote < notes.length-1){
    notes[actualNote].play();
    partie.refreshScore(actualNote);
    released = true;
    actualNote++;
  }
  textSize(32);
  fill(255);
  noStroke();
  text(time, 1000, 30);
  text(Math.floor(partie.score), 1000,60);
}

function keyPressed() {
  value = keyCode;
}
