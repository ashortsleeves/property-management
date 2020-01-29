require('./bootstrap');

$('a.hamburger').click(function() {
  $(this).toggleClass('hamburger-active');
  $('.sideNavBody').toggleClass('sideNav-open');
  $('.sideNavBody').toggleClass('sideNavBody-push');
});
