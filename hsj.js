var menuBtn = document.getElementById("menuBtn")
var sideNav = document.getElementById("sideNav")
var menu = document.getElementById("menu")

sideNav.style.right = "-250px";

menuBtn.onclick = function(){
  if (sideNav.style.right == "-250px") {
    sideNav.style.right = "0";
  }
  else {
    sideNav.style.right = "-250px";
  }
}


var scroll = new SmoothScroll('a[href*="#"]',{
    easing: 'easeInQuad'
});


const btn = document.querySelector('.read-more-btn');
const text = document.querySelector('.card__read-more');
const cardHolder = document.querySelector('.card-holder');
cardHolder.addEventListener('click', e=>{
  const current = e.target;
  const isReadMoreBtn = current.className.includes('read-more-btn');

  if (!isReadMoreBtn)
    return;
  
   const currentText = e.target.parentNode.querySelector('.card__read-more');
  
   currentText.classList.toggle('card__read-more--open');
  
   current.textContent = current.textContent.includes('Read More...')? 'Read less...' : 'Read More...';
  
})