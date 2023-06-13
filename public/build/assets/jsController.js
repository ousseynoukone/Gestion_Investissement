// $('#addButton').click(function() {
//     $('#add').removeAttr('hidden');
    
//     var targetOffset = $('#add').offset().top;
//     var scrollLimit = 100;
    
//     var maxScrollPosition = Math.min(targetOffset - scrollLimit, $('body').height() - $(window).height());
    
//     $('html, body').animate({
//         scrollTop: maxScrollPosition
//     }, {
//         duration: 10,  // Animation duration in milliseconds
//         easing: 'swing', // Easing function to control the animation
//         complete: function() {
//             // Callback function to execute after the animation completes
//             console.log('Scroll animation complete!');
//         }
//     });
// });







$(document).ready(function() {
    var hasInvalidField = $('.form-control').hasClass('is-invalid');

if (hasInvalidField) {
   document.getElementById('addButton').click();
}

});



