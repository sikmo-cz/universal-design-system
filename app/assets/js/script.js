document.addEventListener("DOMContentLoaded", function() {
	filterIcons();
});

function filterIcons() {
	// Select the input element within the .component--icons container
    const input = document.querySelector( '.component--icons [type="text"]' );
    const icons = document.querySelectorAll( '.component--icons [data-icon]' );

    // Event listener for typing into the input field
    if( input ) {
        input.addEventListener('input', function() {
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