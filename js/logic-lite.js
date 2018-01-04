jQuery(document).ready(function($) {

  /************ ELIMINO chronoforms6_credits ***************/
  if($('.chronoforms6_credits').length){
    $('.chronoforms6_credits').remove();
  }
  /************ ELIMINO chronoforms6_credits ***************/

  /************ ATTIVO I TOOLTIPS ***************/
  $('[data-toggle="tooltip"]').tooltip();
  /************ ATTIVO I TOOLTIPS ***************/

  /************ RUOTO IL BOTTONE NEI COLLAPSE ***************/
  $('body .btn-collapse').click(function(){
    $(this).toggleClass('active');
  })

  $('.nav-side__header').click(function(){
    $(this).toggleClass('active');
    $(this).find('i').toggleClass('active');
  })

  $('.mega-block-header').click(function(){
    $(this).toggleClass('active');
    $(this).find('i').toggleClass('active');
  })
  // ############ ruoto icone nei collapse della navside ################

  $('body .phocadownloadfilelist').click(function(){
    $(this).toggleClass('phocadownloadfilelist--open');
  })
  /************ END RUOTO IL BOTTONE NEI COLLAPSE ***************/

  /************ NAVBAR FIXED ALLO SCROLL ************/
  function fixedNavbar() {
      if ($(document).scrollTop() > 186) {
        // $('.header-nav').addClass("fixed-top animated slideInDown");
        $('.header-banner').addClass("fixed-top");
        $('#open-button').addClass('menu-scroll');
      } else {
        // $('.header-nav').removeClass("fixed-top animated slideInDown");
        $('.header-banner').removeClass("fixed-top");
        $('#open-button').removeClass('menu-scroll');
      }
  }
  $(window).scroll(fixedNavbar);
  $(document).ready(fixedNavbar);
  /************ END NAVBAR FIXED ALLO SCROLL ************/

  // /************ EFFETTO DROPDOWN ************/
  $('.dropdown').on('show.bs.dropdown', function(e){
    $(this).find('.dropdown-menu').first().stop(true, true).slideDown(300);
  });

  $('.dropdown').on('hide.bs.dropdown', function(e){
    $(this).find('.dropdown-menu').first().stop(true, true).slideUp(200);
  });
  // /************ END EFFETTO DROPDOWN ************/

  /************ COLLAPSE DEI MEGA BLOCK SU SCHERMI MINORI DI 576px ************/
  function collapseMegaBlock() {
      if ($(window).width() <= 768) {
        $('.navbar .mega-block > .megablockCollapse').addClass("collapse");
      } else {
        $('.navbar .mega-block > .megablockCollapse').removeClass("collapse");
      }
  }
  $(window).resize(collapseMegaBlock);
  $(document).ready(collapseMegaBlock);
  /************ END COLLAPSE DEI MEGA BLOCK SU SCHERMI MINORI DI 576px ************/

  /************ NASCONDO LA SEARCH BAR SE SONO SOTTO I 768PX ************/
  function hideSearchBar() {
      if ($(window).width() <= 768) {
        $('#searchBarCollapse').addClass("collapse");
      } else {
        $('#searchBarCollapse').removeClass("collapse");
      }
  }
  $(window).resize(hideSearchBar);
  $(document).ready(hideSearchBar);

  // se clicco nascondo la lente e metto la close
  $('#searchBarCollapse').on('hide.bs.collapse', function () {
    $('.search-bar-icon > a').html('<i class="fa fa-search" aria-hidden="true"></i>');
  })

  $('#searchBarCollapse').on('show.bs.collapse', function () {
    $('.search-bar-icon > a').html('<i class="fa fa-times" aria-hidden="true"></i>');
  })
  /************ END NASCONDO LA SEARCH BAR SE SONO SOTTO I 768PX ************/


  /************ SIDE NAV ACTIVE ***************/
  // $('#open-button').click(function(){
  //   $('#open-button').toggleClass('menu-active');
  //   $('.st-container').toggleClass('st-menu-open');
  // })

  $('body').click(function(){
    if($(this).hasClass('show-menu')){
      $('#open-button').addClass('menu-active');
    } else{
      $('#open-button').removeClass('menu-active');
    }
  })
  /************ END SIDE NAV ACTIVE ***************/

  /************ SKIP LINK ***************/
  $('.goto-burger').focusin(function(){
    $(this).toggleClass('focus');
  })
  $('.goto-burger').focusout(function(){
    $(this).toggleClass('focus');
  })
  $('.goto-content').focusin(function(){
    $(this).toggleClass('focus');
  })
  $('.goto-content').focusout(function(){
    $(this).toggleClass('focus');
  })

  $('.goto-burger').click(function(){
    $('#open-button').focus();
  })

  $('#open-button').click(function(){
    $('.menu-side .nav-side a:eq(0)').focus();
  })
  /************ END SKIP LINK ***************/
});
