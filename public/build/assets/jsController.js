$('#addProjectButton').click(function() {
    $('#addProject').removeAttr('hidden');
    
    var targetOffset = $('#addProject').offset().top;
    var scrollLimit = 100;
    
    var maxScrollPosition = Math.min(targetOffset - scrollLimit, $('body').height() - $(window).height());
    
    $('html, body').animate({
        scrollTop: maxScrollPosition
    }, {
        duration: 10,  // Animation duration in milliseconds
        easing: 'swing', // Easing function to control the animation
        complete: function() {
            // Callback function to execute after the animation completes
            console.log('Scroll animation complete!');
        }
    });
});







$(document).ready(function() {
    var hasInvalidField = $('.form-control').hasClass('is-invalid');

if (hasInvalidField) {
  $('#addProject').removeAttr('hidden');



  var targetOffset = $('#addProject').offset().top;
  var scrollLimit = 100; // Adjust this value to set the scroll limit
  
  // Calculate the maximum scroll position based on the target offset and scroll limit
  var maxScrollPosition = Math.min(targetOffset - scrollLimit, $('body').height() - $(window).height());
  

  // Scroll down to the add form
    
  $('html, body').animate({
    scrollTop: maxScrollPosition
},{
    duration: 10,  // Animation duration in milliseconds
    easing: 'swing', // Easing function to control the animation
    complete: function() {
        // Callback function to execute after the animation completes
        console.log('Scroll animation complete!');
    }
});}


});



