document.addEventListener('DOMContentLoaded', function() {
  Typed.new("#typed", {
    stringsElement: document.getElementById('typed-strings'),
    typeSpeed: 50,
    backDelay: 1000,
    loop: true,
    contentType: 'html', // or text
    // defaults to null for infinite loop
    loopCount: null,
    callback: function() {
      foo();
    },
    resetCallback: function() {
      newTyped();
    }
  });
});

function newTyped() { /* A new typed object */ }

function foo() {}


$("#owl-banner-carousel").owlCarousel({

  loop: true,
  dots: false,
  responsiveClass: true,
  mouseDrag: true,
  nav: true,
  navText: [
    '<i class="fa fa-angle-left"></i>',
    '<i class="fa fa-angle-right"></i>'
  ],
  navClass: ['prev', 'next'],
  responsive: {
    0: {
      items: 3
    },
    600: {
      items: 4
    },
    1000: {
      items: 4
    }
  }

});

$('.slide-courses').owlCarousel({
  stagePadding: 50,
  loop: true,
  margin: 10,
  nav: false,
  dots: false,
  responsive: {
    0: {
      items: 1
    },
    600: {
      items: 3
    },
    1000: {
      items: 5
    }
  }
});

$(".player").YTPlayer();
$(".player").YTPApplyFilters({
  opacity: 100
})


function removeAllSelected(isXs) {
  if (isXs) {
    $('#collxs').removeClass("academe-btn-active");
    $('#solxs').removeClass("academe-btn-active");
    $('#tesdaxs').removeClass("academe-btn-active");
  } else {
    $('#coll').removeClass("academe-btn-active");
    $('#sol').removeClass("academe-btn-active");
    $('#tesda').removeClass("academe-btn-active");
  }

  panels_out();
}

function panels_out() {
  $('#college-acad').hide();
  $('#law-acad').hide();
  $('#tesda-acad').hide();
}

function toggleNavArrow(arrow) {

  if (arrow.getAttribute("data-nav-arrow") === 'false') {
    $(arrow).removeClass('fa-chevron-circle-down');
    $(arrow).addClass('fa-chevron-circle-up');
    $(arrow).attr('data-nav-arrow', 'true');
  } else {
    $(arrow).removeClass('fa-chevron-circle-up');
    $(arrow).addClass('fa-chevron-circle-down');
    $(arrow).attr('data-nav-arrow', 'false')
  }

}

var fadeT = false;
var pastEx = '';

function toggleNavArrowEx(tarAr, clicked) {


  // Navigation Extension
  var nav_contents = {

    'nav-ex-admission': $('#ex-add').html(),
    'nav-ex-academic': $('#ex-acad').html(),
    'nav-ex-aboutus': $('#ex-about').html(),
  };



  var arrow = $(tarAr).find('i');

  var currentEx = $(tarAr).attr('id');

  $('#extend-nav-content').html(nav_contents[$(tarAr).attr('id')]);

  if (!fadeT) {
    $('.extend-nav').slideDown();
    pastEx = $(tarAr).attr('id');
    fadeT = true;
  } else {

    if(!clicked){
        pastEx = $(tarAr).attr('id');
        ResetNavArrowEx();
    }else{
      if(pastEx === currentEx){
        $('.extend-nav').slideUp('fast');
        pastEx = $(tarAr).attr('id');
        fadeT = false;
      }else{
        pastEx = $(tarAr).attr('id');
        ResetNavArrowEx();
      }
    }

  }

  if (arrow.attr('data-nav-arrow') === 'false') {
    $(arrow).removeClass('fa-chevron-circle-down');
    $(arrow).addClass('fa-chevron-circle-up');
    $(arrow).attr('data-nav-arrow', 'true');
  } else {
    $(arrow).removeClass('fa-chevron-circle-up');
    $(arrow).addClass('fa-chevron-circle-down');
    $(arrow).attr('data-nav-arrow', 'false');
  }

}

function ResetNavArrowEx(){

  $.each($('.nav-ex'),function(){
    var arrow = $(this).find('i');

    if (arrow.attr('data-nav-arrow') === 'true') {
      $(arrow).removeClass('fa-chevron-circle-up');
      $(arrow).addClass('fa-chevron-circle-down');
      $(arrow).attr('data-nav-arrow', 'false');
    }
  });
}


$(document).ready(function() {

  wow = new WOW({
    mobile: false
  });
  wow.init();

  panels_out();
  $('#college-acad').show()
  $('.freshie').click(function() {
    $('.fresh-panel').show();
    $('.oldie-panel').hide();
  });

  $('.oldie').click(function() {
    $('.oldie-panel').show();
    $('.fresh-panel').hide();
  });

  $('.oldie-panel').hide();


  $('#coll').click(function() {
    $('.academe-text').text("College Programs");
    removeAllSelected(false);
    $(this).addClass("academe-btn-active");
    $('#college-acad').show();
  });


  $('#sol').click(function() {
    $('.academe-text').text("School of Law");
    removeAllSelected(false);
    $(this).addClass("academe-btn-active");
    $('#law-acad').show();
  });

  $('#tesda').click(function() {
    $('.academe-text').text("Tesda Programs");
    removeAllSelected(false);
    $(this).addClass("academe-btn-active");
    $('#tesda-acad').show();
    ``
  });


  $('#collxs').click(function() {
    $('.academe-text').text("College Programs");
    removeAllSelected(true);
    $(this).addClass("academe-btn-active");
    $('#college-acad').show();
  });

  $('#solxs').click(function() {
    $('.academe-text').text("School of Law");
    removeAllSelected(true);
    $(this).addClass("academe-btn-active");
    $('#law-acad').show();
  });

  $('#tesdaxs').click(function() {
    $('.academe-text').text("Tesda Programs");
    removeAllSelected(true);
    $(this).addClass("academe-btn-active");
    $('#tesda-acad').show();
  });

  var img = '';

  $.each($('.item'), function() {
    if (img === '') {
      $('#news-bg').css({
        "background": "url(" + $(this).find('img').attr('src') + ") no-repeat center center",
        "background-size": "cover"
      });
      $('#news-title-feat').text('#' + $(this).find('span')[2].innerText);
      $('#news-content-feat').html($(this).find('span')[3].innerText + "<br /> <br/> <small> <i class='fa fa-user'>&nbsp;&nbsp;</i>" + $(this).find('span')[0].innerText + " &nbsp;|&nbsp; <i class='fa fa-clock-o'>&nbsp;&nbsp;</i>" + $(this).find('span')[1].innerText + " &nbsp;|&nbsp; <a class='btn btn-xs btn-primary' href='" + $(this).find('span')[4].innerText + "'>Read More</small>");
      img = $(this).find('img').attr('src');
    }
  });


  /*
     0: image
     1: author
     2: date
     3: title
     4: content
     5: url
  */

  $('.item').click(function() {
    $('#news-bg').css({
      "background": "url(" + $(this).find('img').attr('src') + ") no-repeat center center",
      "background-size": "cover"
    });
    $('#news-title-feat').text('#' + $(this).find('span')[2].innerText);
    $('#news-content-feat').html($(this).find('span')[3].innerText + "<br /> <br/> <small> <i class='fa fa-user'>&nbsp;&nbsp;</i>" + $(this).find('span')[0].innerText + " &nbsp;|&nbsp; <i class='fa fa-clock-o'>&nbsp;&nbsp;</i>" + $(this).find('span')[1].innerText + " &nbsp;|&nbsp; <a class='btn btn-xs btn-primary' href='" + $(this).find('span')[4].innerText + "'>Read More</small>");

    $.each($('.item'), function() {
      $(this).removeClass('loaded-item');
      $(this).addClass('load-item');
    });
    $(this).removeClass('load-item');
    $(this).addClass('loaded-item');

  });


  var $grid = $('.grid').imagesLoaded(function() {
    $grid.masonry({
      itemSelector: '.grid-item',
      percentPosition: true,
      columnWidth: '.grid-sizer'
    });
  });


  // Mobile Navigation - Javascript codes
  var dmn = false;
  var nav_arrows = false;

  $('.dropdown-mobile-nav').click(function() {
    if (!dmn) {
      $(this).removeClass('fa-bars');
      $(this).addClass('fa-close');
      dmn = true;
    } else {
      $(this).removeClass('fa-close');
      $(this).addClass('fa-bars');
      dmn = false;
    }
  });

  $('#nav-m-home').click(function() {
    location.assign($(this).attr('data-home-url'));
  });


  $('.extend-nav').hide();

  resizeAcad();
});


function resizeAcad(){
  $('.academe').css('height', $('.academe-overlay').height()+'px');

  var ch = $('.panel-card-shs').height(); //getting first card element
  $.each($('.panel-card-shs'), function(){

    if($(this).height() > ch){
      ch = $(this).height();
    }
  }); //settings

  $.each($('.panel-card-shs'), function(){
      $(this).css('height', ch + 'px');
  }); //generate




}
