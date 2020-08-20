const loginMailInput = document.querySelector('.authorization__input_email');
const loginPassInput = document.querySelector('.authorization__input_pass');

loginMailInput.addEventListener('change', function() {
    if (loginMailInput.value !== '') {
        loginMailInput.classList.add('filled');
    } else {
        loginMailInput.classList.remove('filled');
    }
});

loginPassInput.addEventListener('change', function() {
    if (loginPassInput.value !== '') {
        loginPassInput.classList.add('filled');
    } else {
        loginPassInput.classList.remove('filled');
    }
});

let autForm = document.querySelector('.authorization');
autForm.addEventListener('submit', (evt) => sendRequest(evt, autForm,true));
