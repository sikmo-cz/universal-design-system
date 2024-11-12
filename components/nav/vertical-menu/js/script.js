document.addEventListener("DOMContentLoaded", function() {
    const menuButtons = document.querySelectorAll('.nav-vertical-menu > ul > li > button');

    // Funkce pro přepnutí otevřeného submenu
    function toggleSubmenu(item) {
    // Najde submenu pro danou položku menu
    const submenu = item.parentElement.querySelector('ul');

    // Pokud submenu existuje, přepne CSS třídu "open"
    if (submenu) {
        submenu.classList.toggle('open');
    }

    // Přepne CSS třídu "open" na samotné položce menu
    item.parentElement.classList.toggle('open');
    }

    // Přidá click event listener na každé tlačítko menu
    menuButtons.forEach(button => {
        button.addEventListener('click', () => {
            toggleSubmenu(button);
        });
    });
});


