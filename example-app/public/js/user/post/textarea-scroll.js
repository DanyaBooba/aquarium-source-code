const addpostTextarea = document.getElementById('textarea')

addpostTextarea.addEventListener('input', function() {
    window.scrollTo(0, document.body.scrollHeight);
});
