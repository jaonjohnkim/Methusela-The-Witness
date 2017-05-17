
$(document).ready(function(){
  $('#navToggle a').click(function(e){
    e.preventDefault(); //PREVENTS CLICKING MENU FROM EXECUTING

    $('header nav').slideToggle();
    $('#navToggle').toggleClass('menuUp menuDown');

    // if($('#navToggle').attr('class') === 'menuDown' && $(window).height() <='800'){
    //   $('main#index').css('position', 'relative');
    //   $('main#index').css('top','0');
    //   // $('main#index').css('width', '100%');
    //   // $('main#index').css('max-height', '100%');
    //   $('main#index').css('transform', 'translateY(0)');
    // }else if($('#navToggle').attr('class') === 'menuUp'){
    //   $('main#index').css('position', 'absolute');
    //   $('main#index').css('top','50%');
    //   $('main#index').css('transform', 'translateY(-55%)');
    // }
  });

  // $('header nav ul li a').click(function(e){
  //   if($(window).width() >= '600') {
  //     if($(this).siblings().size() &gt; 0){
  //       e.preventDefault();
  //       $(this).siblings().slideToggle('fast');
  //       $(this).children('.toggle').html($(this).children('.toggle').html() === 'close' ? 'expand' : 'close');
  //     }
  //   }
  // });

  $(window).resize(function(){
    if($(window).width() >= '600'){
      $('header nav').css('display','block');

      if($('#navToggle').attr('class') === 'menuDown'){
        $('#navToggle').toggleClass('menuUp menuDown');
      }

    } else {
      $('header nav').css('display', 'none');
    }

    if($(window).height() <='560'){
        $('main#index').css('position', 'relative');
        $('main#index').css('top','0');
        // $('main#index').css('width', '100%');
        // $('main#index').css('max-height', '100%');
        $('main#index').css('transform', 'translateY(0)');
    }else{
        $('main#index').css('position', 'absolute');
        $('main#index').css('top','50%');
        $('main#index').css('transform', 'translateY(-55%)');
    }
  });
});
