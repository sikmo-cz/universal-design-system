document.addEventListener('DOMContentLoaded', function() {
    const eyeElements = document.querySelectorAll('.input-text .input-text__eye');
    
    eyeElements.forEach(function(eye) {
        const input = eye.parentElement.querySelector('input[type="password"]');
        
        eye.addEventListener('click', function(event) {
            event.preventDefault();
            togglePasswordVisibility(input, eye);
        });
    });
    
    function togglePasswordVisibility(input, eye) {
        if (input.type === 'password') {
            input.type = 'text';
            eye.setAttribute('data-password-visible', 'true');
        } else {
            input.type = 'password';
            eye.setAttribute('data-password-visible', 'false');
        }
    }
});

//# sourceMappingURL=script.js.map
