$(document).ready(function() {    
  // execute the slideShow, set 4 seconds (4000) for each image
  header_slideShow(4000);
  picture_slideShow(8000);
});

function header_slideShow(speed) {

  // append an 'li' item to the 'ul' list for displaying the caption
  $('ul.header_slideshow').append('<li id="header_slideshow-caption" class="caption"><div class="header_slideshow-caption-container"><p></p></div></li>');

  // set the opacity of all images to 0
  $('ul.header_slideshow li').css({opacity: 0.0});
  
  // get the first image and display it
  $('ul.header_slideshow li:first').css({opacity: 1.0}).addClass('show');
  
  // get the caption of the first image from the 'rel' attribute and display it
  $('#header_slideshow-caption p').html($('ul.header_slideshow li.show').find('img').attr('alt'));
    
  // display the caption
  $('#header_slideshow-caption').css({opacity: 0.6, bottom:0});
  
  // call the gallery function to run the slideshow  
  var timer = setInterval('gallery()',speed);
  
  // pause the slideshow on mouse over
  $('ul.header_slideshow').hover(
    function () {
      clearInterval(timer); 
    },  
    function () {
      timer = setInterval('gallery()',speed);     
    }
  );  
}

function picture_slideShow(speed) {

  // append an 'li' item to the 'ul' list for displaying the caption
  $('ul.picture_slideshow').append('<li id="picture_slideshow-caption" class="caption"><div class="picture_slideshow-caption-container"><p></p></div></li>');

  // set the opacity of all images to 0
  $('ul.picture_slideshow li').css({opacity: 0.0});
  
  // get the first image and display it
  $('ul.picture_slideshow li:first').css({opacity: 1.0}).addClass('picture_show');
  
  // get the caption of the first image from the 'rel' attribute and display it
  $('#picture_slideshow-caption p').html($('ul.picture_slideshow li.show').find('img').attr('alt'));
    
  // display the caption
  $('#picture_slideshow-caption').css({opacity: 0.6, bottom:0});
  
  // call the gallery function to run the slideshow  
  var timer = setInterval('picture_gallery()',speed);
  
  // pause the slideshow on mouse over
  $('ul.picture_slideshow').hover(
    function () {
      clearInterval(timer); 
    },  
    function () {
      timer = setInterval('picture_gallery()',speed);     
    }
  );  
}

function gallery() {

  //if no images have the show class, grab the first image
  var current = ($('ul.header_slideshow li.show')?  $('ul.header_slideshow li.show') : $('#ul.header_slideshow li:first'));

  // trying to avoid speed issue
  if(current.queue('fx').length == 0) {

    // get the next image, if it reached the end of the slideshow, rotate it back to the first image
    var next = ((current.next().length) ? ((current.next().attr('id') == 'header_slideshow-caption')? $('ul.header_slideshow li:first') :current.next()) : $('ul.header_slideshow li:first'));
      
    // get the next image caption
    var desc = next.find('img').attr('alt');  
  
    // set the fade in effect for the next image, show class has higher z-index
    next.css({opacity: 0.0}).addClass('show').animate({opacity: 1.0}, 1000);
    
    // hide the caption first, and then set and display the caption
    $('#header_slideshow-caption').slideToggle(300, function () { 
      $('#header_slideshow-caption p').html(desc); 
      $('#header_slideshow-caption').slideToggle(500); 
    });   
  
    // hide the current image
    current.animate({opacity: 0.0}, 1000).removeClass('show');

  }
}

function picture_gallery() {
  //if no images have the show class, grab the first image
  var current = ($('ul.picture_slideshow li.picture_show')?  $('ul.picture_slideshow li.picture_show') : $('#ul.picture_slideshow li:first'));

  // trying to avoid speed issue
  if(current.queue('fx').length == 0) {

    // get the next image, if it reached the end of the slideshow, rotate it back to the first image
    var next = ((current.next().length) ? ((current.next().attr('id') == 'picture_slideshow-caption')? $('ul.picture_slideshow li:first') :current.next()) : $('ul.picture_slideshow li:first'));
      
    // get the next image caption
    var desc = next.find('img').attr('alt');  
  
    // set the fade in effect for the next image, show class has higher z-index
    next.css({opacity: 0.0}).addClass('picture_show').animate({opacity: 1.0}, 1000);
    
    // hide the caption first, and then set and display the caption
    $('#picture_slideshow-caption').slideToggle(300, function () { 
      $('#picture_slideshow-caption p').html(desc); 
      $('#picture_slideshow-caption').slideToggle(500); 
    });   
  
    // hide the current image
    current.animate({opacity: 0.0}, 1000).removeClass('picture_show');

  }
}