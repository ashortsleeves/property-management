require('./bootstrap');

$('a.hamburger').click(function() {
  $(this).toggleClass('hamburger-active');
  $('.sideNav').toggleClass('sideNav-open');
  $('.sideNavBody').toggleClass('sideNavBody-push');
});

var url = location.href.split('/'),
    loc = url[url.length -1];


if(loc === "") {
  loc = location.href.replace("http://","");
}

console.log(loc);
$("ul.nav a[href$='"+loc+"']").addClass('current');
// $("a").addClass('current');
//
// function navHighlight(elem, home, active) {
//     var url = location.href.split('/'),
//         loc = url[url.length -1],
//         link = document.querySelectorAll(elem);
//
//             console.log(loc);
//     for (var i = 0; i < link.length; i++) {
//         var path = link[i].href.split('/'),
//             page = path[path.length -1];
//         if (page == loc || page == home && loc == '') {
//             link[i].parentNode.className += ' ' + active;
//             document.body.className += ' ' + page.substr(0, page.lastIndexOf('.'));
//             }
//         }
//     }
//


// navHighlight('.nav a', '/', 'current'); /* menu link selector, home page, highlight class */
// navHighlight('.nav-side a', '/', 'current');
