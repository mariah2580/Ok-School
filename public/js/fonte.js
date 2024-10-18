const increaseFontButton = document.getElementById('increaseFont');
const decreaseFontButton = document.getElementById('decreaseFont');
const content = document.querySelector('.content');
let fontSize = 16;

increaseFontButton.addEventListener('click', () => {
    fontSize += 2;
    content.style.fontSize = fontSize + 'px';
});

decreaseFontButton.addEventListener('click', () => {
    fontSize -= 2;
    content.style.fontSize = fontSize + 'px';
});
