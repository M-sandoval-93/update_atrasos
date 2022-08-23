let list = document.querySelectorAll('.list');
let menuToggle = document.querySelector('.toggle');
let navigator = document.querySelector('.navigator');

menuToggle.onclick = function() {
    menuToggle.classList.toggle('active');
    navigator.classList.toggle('active');
}

for (let i = 0; i<list.length; i++) {
    list[i].onclick = function() {
        let j = 0;
        while (j < list.length) {
            list[j++].className = 'list';
        }
        list[i].className = 'list active';
    }
}

