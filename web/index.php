

  


<!DOCTYPE html>
<html lang="en" >

<head>

  <meta charset="UTF-8">
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Press+Start+2P'>
  <link rel="stylesheet" href="console.css">



<?php


  function writeOutput()
  {

    echo '<script type="text/javascript">Output("Hello");</script>';


  }

?>



  <script>
  if (document.location.search.match(/type=embed/gi)) {
    window.parent.postMessage("resize", "*");
  }
</script>



</head>

<body translate="no" >
  <div class="console">
	<div class="output">
		<span>Initializing...</span><br/>
		<span class="green">0.0002ms ok!</span><br/>
		<span class="seperator">== == == == == == == == == == == == == == == == == ==</span></br>
		<pre contenteditable="false">    __  _______            _                     ______                       __   
   /  |/  / __ \___  _____(_)___ _____  _____   / ____/___  ____  _________  / /__ 
  / /|_/ / / / / _ \/ ___/ / __ `/ __ \/ ___/  / /   / __ \/ __ \/ ___/ __ \/ / _ \
 / /  / / /_/ /  __(__  ) / /_/ / / / (__  )  / /___/ /_/ / / / (__  ) /_/ / /  __/
/_/  /_/_____/\___/____/_/\__, /_/ /_/____/   \____/\____/_/ /_/____/\____/_/\___/</pre></br>
		<span class="seperator">== == == == == == == == == == == == == == == == == ==</span></br>
		<span>Hope you have fun discovering all the <span class="red">hidden gems</span>!</span>
		</br>
		<span class="blue">type '<span class="grey">help</span>' to see a list of comands available <br/> or '<span class="grey">contact</span>' for a list of ways to contact me.</span><br>
    <span class="grey">I stole this interface from codepen. Don't angry me. Eveybody steals. <br/>
    <span class="red"> Programmers: <span class="grey">Yusuf Bülbül, Mario->interface guy </span> <br/>
		<span class="green">Wake Up!</span><br/>


  </div>
	<div class="action">
  <form id="sampleForm" name="sampleForm" method="post" action="index.php">
		<span>dev$ </span>
		<textarea class="input" id="input" name="input" cols="30" rows="1" value=""></textarea>
    </form>

	</div>
</div>

</body>

</html>
 


<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
    <script id="rendered-js" >
// =====================
// Create required vars
// =====================
var output = $('.output');
var input = $('textarea.input');
var toOutput;

// Creates the event listner for the comands ==
// Yes this is a long one - could do with some
// improvements ===============================
input.keypress(function (e) {
if (e.which == 13) {
  var inputVal = $.trim(input.val());
  //console.log(inputVal);

  if (inputVal == "help") {
    help();
    input.val('');
  } else if (inputVal == "ping") {
    pong();
    input.val('');
  } else if (inputVal == "about") {
    aboutMe();
    input.val('');
  } else if (inputVal == "contact") {
    contactMe();
    input.val('');
  } else if (inputVal == "clear") {
    clearConsole();
    input.val('');
  } else if (inputVal.startsWith("say") === true) {
    sayThis(inputVal);
    input.val('');
  } else if (inputVal == "time") {
    getTime();
    input.val('');
  } else if (inputVal == 'whats that sound' || inputVal == 'what\'s that sound' || inputVal == 'whats that sound?') {
    seperator();
    Output('<span class="blue">' + inputVal + '</span></br><span class="red">Machine Broken!</span></br>');
    seperator();
    input.val('');
  } else if (inputVal.startsWith("exit") === true) {
    Output('<span class="blue">Goodbye! Comeback soon.</span>');
    setTimeout(function () {
      window.open('https://codepen.io/MarioDesigns');
    }, 1000);
  } else {
    Output('<span style = "color:green;"> $$$ executing ' + document.getElementById("input").value  + '</span></br>');
    writeCommand(document.getElementById("input").value);

    input.val('');
  }
}
});

// functions related to the commands typed
// =======================================

// prints out a seperator
function seperator() {
Output('<span class="seperator">== == == == == == == == == == == == == == == == == ==</span></br>');
}

//clears the screen
function clearConsole() {
output.html("");
Output('<span>clear</span></br>');
}

// prints out a list of "all" comands available
function help() {
var commandsArray = ['Help: List of available commands', '>help', '>about', '>contact', '>ping', '>time', '>clear', '>say'];
for (var i = 0; i < commandsArray.length; i++) {if (window.CP.shouldStopExecution(0)) break;
  var out = '<span>' + commandsArray[i] + '</span><br/>';
  Output(out);
}window.CP.exitedLoop(0);
}

// prints the result for the pong command
function pong() {
Output('<span>pong</span></br><span class="pong"><b class="left">|</b><b class="right">|</b></span></br>');
}

// function to the say command
function sayThis(data) {
data = data.substr(data.indexOf(' ') + 1);
Output('<span class="green">[say]:</span><span>' + data + '</span></br>');
}

// sudo?!? not really
function sudo(data) {
data = data.substr(data.indexOf(' ') + 1);
if (data.startsWith("say") === true) {
  data = "Not gona " + data + " to you, you don\'t own me!";
} else if (data.startsWith("apt-get") === true) {
  data = "<span class='green'>Updating...</span> The cake is a lie! There is nothing to update...";
} else {
  data = "The force is week within you, my master you not be!";
}
Output('<span>' + data + '</span></br>');
}

// function to get current time...not
function getTime() {
Output('<span>It\'s the 21st century man! Get a SmartWatch</span></br>');
}

function aboutMe() {
var aboutMeArray = ['>About:', 'please visit www.yusufbulbul.com'];
seperator();
for (var i = 0; i < aboutMeArray.length; i++) {if (window.CP.shouldStopExecution(1)) break;
  var out = '<span>' + aboutMeArray[i] + '</span><br/>';
  Output(out);
}window.CP.exitedLoop(1);
seperator();
}

function contactMe() {
var contactArray = ['>Contact:', 'www.yusufbulbul.com'];
seperator();
for (var i = 0; i < contactArray.length; i++) {if (window.CP.shouldStopExecution(2)) break;
  var out = '<span>' + contactArray[i] + '</span><br/>';
  Output(out);
}window.CP.exitedLoop(2);
seperator();
}

// Prints out the result of the command into the output div
function Output(data) {

$(data).appendTo(output);

}

function writeCommand(data)
{
  var formdata = new FormData();
  formdata.append("command" , data);
  var xhr = (window.XMLHttpRequest) ? new XMLHttpRequest() : new activeXObject("Microsoft.XMLHTTP");
  xhr.open( 'post', 'fileops.php', true );
  xhr.send(formdata);


}

function checkConsequences()
{

  const Http = new XMLHttpRequest();
  const url='checkconsequences.php';
  Http.open("GET", url);
  Http.send();

  Http.onreadystatechange = (e) => 
  {
    if (Http.readyState == 4 && Http.status == 200 && Http.responseText) {

      var outputData = Http.responseText;

      if(outputData != "")
      {
        Output('<span>--->' + outputData + '</span></br>');
      }

    }
  }
}


setInterval(checkConsequences, 1000);



//# sourceURL=pen.js
  </script>


