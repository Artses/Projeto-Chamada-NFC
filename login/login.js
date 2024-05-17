const senhaInput = document.getElementById('senha');
const showPasswordButton = document.getElementById('showPassword');
const svgOlho = document.getElementById('olho');

showPasswordButton.addEventListener('click', () => {
    if (senhaInput.type === 'password') {
        senhaInput.type = 'text';
        svgOlho.classList.remove('fa-eye');
        svgOlho.classList.add('fa-eye-slash');
    } else {
        senhaInput.type = 'password';
        svgOlho.classList.remove('fa-eye-slash');
        svgOlho.classList.add('fa-eye');
    }
});
