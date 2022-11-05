//All image (icon) rights reserved to https://limezu.itch.io/


/*defeitos: 
- timed começa no tempo ligeiramente errado.
- tempo restante começa no tempo errado.
- tempo gasto não para após completar tabuleiro.*/


document.addEventListener('DOMContentLoaded', () => {
  
const card = document.querySelectorAll('.cell')
const front = document.querySelectorAll('.front')
const buttonDevModeOn = document.querySelector('.buttondevon')
const buttonDevModeOff = document.querySelector('.buttondevoff')
const container2x2 = document.querySelector('.container2x2')
const container4x4 = document.querySelector('.container4x4')
const container6x6 = document.querySelector('.container6x6')
const container8x8 = document.querySelector('.container8x8')
const score = document.querySelector('.score span')
const time = document.querySelector('.time span')
const timed = document.querySelector('.timed span')
  
var clickCount = 0
var isPlayable = true
var rightA = 0

shuffle()
flipMatch()

document.addEventListener('click', () => {
  if(isPlayable == false || clickCount != 0) return
  timer()
  clickCount++
})
  
function shuffle(){

    card.forEach(c=>{

        const num = [...Array(card.length).keys()]
        const random = Math.floor(Math.random()*card.length)

        c.style.order = num[random]
    })
}

function timer() {time, setInterval(function(){
  if(timed.innerHTML == 0) gameOver()
  if(isPlayable == false) return
  time.innerHTML++
  timed.innerHTML--
},1000)}

function devModeOn() {
  for(let i =0; i<card.length; i++){
      front[i].classList.add('show')
      }

}

buttonDevModeOn.addEventListener('click' ,()=>{devModeOn()})
    
function devModeOff() {
  for(let i =0; i<card.length; i++){
      front[i].classList.remove('show')
      }
}

buttonDevModeOff.addEventListener('click' ,()=>{devModeOff()})

function flipMatch(){
    for(let i =0; i<card.length; i++){

        card[i].addEventListener('click' ,()=>{
            if(isPlayable == false) return;
            front[i].classList.add('flip')
            const flippedCard = document.querySelectorAll('.flip')

            if(flippedCard.length === 2){
                score.innerHTML = parseInt(score.innerHTML) + 1
                if(card.length===4) {
                  container2x2.style.pointerEvents ='none'
                
                setInterval(() => {
                    
                    container2x2.style.pointerEvents ='all'
                }, 1000);
 
                match(flippedCard[0] , flippedCard[1])
                }
              else if(card.length===16) {
                  container4x4.style.pointerEvents ='none'
                
                setInterval(() => {
                    
                    container4x4.style.pointerEvents ='all'
                }, 1000);
 
                match(flippedCard[0] , flippedCard[1])
                }
              else if(card.length===36) {
                  container6x6.style.pointerEvents ='none'
                
                setInterval(() => {
                    
                    container6x6.style.pointerEvents ='all'
                }, 1000);
 
                match(flippedCard[0] , flippedCard[1])
                }
              else if(card.length===64) {
                  container8x8.style.pointerEvents ='none'
                
                setInterval(() => {
                    
                    container8x8.style.pointerEvents ='all'
                }, 1000);
 
                match(flippedCard[0] , flippedCard[1])
                }
            }
        })
    }
}




function match(cardOne , cardTwo){
    if(isPlayable == false) return;
    if(cardOne.dataset.index === cardTwo.dataset.index){
       
        cardOne.classList.remove('flip') 
        cardTwo.classList.remove('flip') 


        cardOne.classList.add('match')
        cardTwo.classList.add('match')

        rightA++;

        if(card.length / rightA == 2) gameOver();


    }else{

        setTimeout(() => {
            
            cardOne.classList.remove('flip') 
            cardTwo.classList.remove('flip') 
        }, 1000);
    }
}


function gameOver(){
  if(isPlayable == true)
    window.alert("Fim de jogo!");
  isPlayable = false;
}
  

})

