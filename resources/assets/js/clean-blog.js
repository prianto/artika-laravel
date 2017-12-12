/*
Duplicate menu list from sidebar to navbar
*/
var side_menu_list = document.querySelector('#menu ul.navbar-nav').innerHTML;
document.querySelector('#panel ul.navbar-nav').innerHTML = side_menu_list;

/*
Slideout (a.k.a sidebar menu)
Slideout toggle button (a.k.a hamburger button)
*/
var slideout = new Slideout({
  'panel': document.getElementById('panel'),
  'menu': document.getElementById('menu'),
  'padding': 256,
  'tolerance': 70
});
document.querySelector('.toggle-button').addEventListener('click', function() {
  slideout.toggle();
});

/*
Siema (a.k.a welcome banner)
*/
var siema = document.getElementsByClassName('siema-container');
if(siema.length) {
  new Siema({
    selector: '.siema-container',
    duration: 200,
    easing: 'ease-out',
    perPage: 1,
    startIndex: 0,
    draggable: true,
    multipleDrag: true,
    threshold: 20,
    loop: false
  });
}

/*
Lazy images
*/
var lazy = document.getElementsByClassName('lazy');
if(lazy.length){
  function wakeUp() {
    for (var i=0; i < lazy.length; i++) {
      var lazyDataSrc = lazy[i].getAttribute('data-src');
      if(lazyDataSrc) {
        lazy[i].setAttribute('src', lazyDataSrc);
      }
    }
  }
  window.onload = wakeUp;
}
