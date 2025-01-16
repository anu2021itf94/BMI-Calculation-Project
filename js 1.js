const dropdown = document.querySelector('.dropdown');
const main = document.querySelector('.dd_main');

main.addEventListener('click', () => {
    dropdown.classList.toggle('active');
});

document.addEventListener('click', (e) => {
    if (!dropdown.contains(e.target)) {
        dropdown.classList.remove('active');
    }
});
