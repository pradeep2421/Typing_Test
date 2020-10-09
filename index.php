<?php
session_start() ;
 if(!isset($_SESSION['userlogin'])){
     header("Location :login.php") ;    
 }else{
     echo 'welcome to the index' ;
 }
  if(isset($_GET['logout'])){
      session_destroy() ;
      unset($_SESSION) ;
      echo 'you are logged out' ;
      header("Location:login.php") ;
    
  }
?>
<br>
<a href ="index.php?logout=true"> logout</a>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv ="X-UA-Compatible" content ="ie=edge">
    <link rel="stylesheet" href="styles.css">
   
    <title>Type Faster</title>
</head>
<body>
    <div class ="top-part" >
        <div class="previous">
            Previous Score
        </div>
        <div class="tik-tok" id ="tikTok">Timer</div>
        <div class="high-score">Highest Score</div>
    </div>
    <div class ="upper-part" >
        <div class="previous-score" id ="previousScore">
            20Wpm
        </div>
        <div class="timer" id ="timer"></div>
        <div class="highest-score">58Wpm</div>
    </div>
    <div class="container">
        <div class="quote-display" id ="quoteDisplay">
        </div>
        <textarea  id="quoteInput" class ="quote-input" autofocus></textarea>
        
    </div>
    <div style="clear:both"></div>
    <div class ="average-score">Average score</div>
    <div class="avg-score">50Wpm</div>
    <br>
    <button id = "register" value="refresh">refresh</button>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script type = "text/javascript">
       const RANDOM_QUOTE_API_URL = 'http://api.quotable.io/random'
const quoteDisplayElement = document.getElementById('quoteDisplay')
const quoteInputElement = document.getElementById('quoteInput')
function getRandomQuote(){
   return fetch(RANDOM_QUOTE_API_URL)
   .then(response => response.json())
   .then(data => data.content)
   
}
let firstTime = new Date() 
const TimerElement = document.getElementById('timer')
const previousScore = document.getElementById('previousScore')
quoteInputElement.addEventListener('input' ,() =>{
const arrayQuote = quoteDisplayElement.querySelectorAll
('span')
const arrayValue = quoteInputElement.value.split('')
let correct = true
let correct2 = true

arrayQuote.forEach((characterSpan,index) => {
const character = arrayValue[index]
if(character == null && index == 1){
    startTimer() 
    correct1 =true 
    firstTime = new Date() 
}
if(character == null){
    characterSpan.classList.remove('correct')
    characterSpan.classList.remove('incorrect') 
    correct = false
}else if(character === characterSpan.innerText){
    characterSpan.classList.add('correct')
    characterSpan.classList.remove('incorrect')
}else{
    characterSpan.classList.add('incorrect')
    characterSpan.classList.remove('correct')
    correct = false
}
})
if(correct) {
    
    correct1 = false 
    let answer = Math.floor((new 
        Date()-firstTime)/1000)
        let denomiator = arrayQuote.length
        denomiator
        answer = Math.floor((60*denomiator)/(5*answer))
        previousScore.innerText =answer +"Wpm"
        
        
}
})
async function renderNextQuote() {
    const quote = await getRandomQuote() 
    quoteDisplayElement.innerHTML = ''
    quote.split('').forEach(character =>{
        const characterSpan = document.createElement('span')
        
        characterSpan.innerText = character
      quoteDisplayElement.appendChild(characterSpan)
    })
    
    quoteInputElement.value = null  
     
    
}
let startTime
function startTimer(){
    TimerElement.innerText =0
    startTime =new Date()
    setInterval(() => {
   if(correct1) {timer.innerText = getTimerTime()
}
    } ,1000)
}
function getTimerTime() {
    return Math.floor((new 
        Date()-startTime)/1000)
}

renderNextQuote()
$(function(){
 //alert('helelle' ) ;
 
 $('#register').click(function(e){
    renderNextQuote()
     var id = 2 ;
     var score = 44 ;
     e.preventDefault() ;
     $.ajax({
       type: 'POST' ,
       url :'process2.php' ,
       data :{id:id ,score:score} ,
       success: function(data){
        Swal.fire({
        'title':'hello' ,
        'text' : data ,
        'type' : 'success'
        }) 
       } ,
     error:function(data){
       Swal.fire({

         'title':'errors' ,
         'text' :'there is some error' ,
         'type' :'error'
       })
     }

       }) ;
      

    

  }) ;
});

    </script>
</body>
</html>