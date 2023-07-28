window.addEventListener('scroll', function() {
    var image = document.getElementById('scroll-image');
    var scrollPosition = window.scrollY;

    var scale = 1 - scrollPosition / 10000; 
    image.style.transform = 'scale(' + scale + ')';
});
