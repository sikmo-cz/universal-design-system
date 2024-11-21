document.addEventListener("DOMContentLoaded", function () {
    filterIcons();
});

function filterIcons() {
    // Select the input element within the .component--icons container
    const input = document.querySelector('.component--icons [type="text"]');
    const icons = document.querySelectorAll('.component--icons [data-icon]');

    // Event listener for typing into the input field
    if (input) {
        input.addEventListener('input', function () {
            const filterText = input.value.trim().toLowerCase();

            // Loop through each icon and filter based on input text
            icons.forEach(icon => {
                const iconName = icon.getAttribute('data-icon').toLowerCase();

                if (filterText === '' || iconName.includes(filterText)) {
                    icon.parentElement.style.display = ''; // Show icon
                } else {
                    icon.parentElement.style.display = 'none'; // Hide icon
                }
            });
        });
    }
}

function codeSwitcher() {
    // Get references to the checkbox and the target element
    const checkbox = document.getElementsByClassName('js-content-switch-checkbox')[0];
    const content_examples = document.getElementsByClassName('js-content-switch-examples')[0];
    const content_code = document.getElementsByClassName('js-content-switch-code')[0];

    // Function to add or remove the class
    checkbox.addEventListener('change', function () {
        if (checkbox.checked) {
            content_examples.classList.remove('show');
            content_code.classList.add('show');
        } else {
            content_examples.classList.add('show');
            content_code.classList.remove('show');
        }
    });
}
codeSwitcher(); //init