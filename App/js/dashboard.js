// SIDEBAR
const allDropdown = document.querySelectorAll('#sidebar .side-dropdown');

allDropdown.forEach (items => {
    const a = items.parentElement.querySelector('a:first-child');
    a.addEventListener('click', function(e) {
        e.preventDefault();

        if (!this.classList.contains('active')) {
            allDropdown.forEach(i => {
                const aLink = i.parentElement.querySelector('a:first-child');

                aLink.classList.remove('active');
                i.classList.remove('show');
            })
        }

        this.classList.toggle('active');
        items.classList.toggle('show');
    });
});




// PROFILE DROPDOWN
const profile = document.querySelector('nav .profile');
const imgProfile = profile.querySelector('img');
const dropdownProfile = profile.querySelector('.profile-link');

imgProfile.addEventListener('click', function() {
    dropdownProfile.classList.toggle('show');
});

window.addEventListener('click', function(e) {
    if (e.target !== imgProfile) {
        if (e.target !== dropdownProfile) {
            dropdownProfile.classList.remove('show');
        }
    }
});





// PROGRESS BAR
const allProgress = document.querySelectorAll('main .card .progress');

allProgress.forEach(item => {
    item.style.setProperty('--value', item.dataset.value);
});

