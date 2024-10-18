// Modo Escuro
const toggleDarkMode = () => {
    document.body.classList.toggle('dark-mode');
};

document.querySelector("#dark-mode-toggle").addEventListener("click", toggleDarkMode);

// Tamanho da Fonte
const adjustFontSize = (size) => {
    document.body.style.fontSize = size + "px";
};

document.querySelector("#increase-font").addEventListener("click", () => adjustFontSize(18));
document.querySelector("#decrease-font").addEventListener("click", () => adjustFontSize(14));
