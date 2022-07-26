const allDropdown = document.querySelectorAll('#sidebar .side-dropdown');

allDropdown.forEach (items => {
    const a = items.parentElement.querySelector('a:first-child');
    a.addEventListener('click', function(e) {
        e.preventDefault();
    });
});