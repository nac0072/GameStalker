			$(function() {
 
 $('#navi a').stop().animate({'marginLeft':'-85px'},1000);
 
 $('#navi > li > a').hover(
 function () {
   $('a',$(this).parent()).stop().animate({'marginLeft':'-2px'},200);
  },
 function () {
  $('a',$(this).parent()).stop().animate({'marginLeft':'-85px'},200);
 }
 );
});