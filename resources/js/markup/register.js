let emailExist = false;
let passwordValid = false;

const accountNameInput = document.querySelector('.registration__input_name');
const accountMailInput = document.querySelector('.registration__input_email');
const accountPassInput = document.querySelector('.registration__input_pass');
const accountPassRepeatInput = document.querySelector('.registration__input_pass-repeat');

let fetchMail = function(elem, message) {
    let data = {};
    data = elem.value;
    let submit= document.querySelector('.registration__submit');

    let response = fetch('email/exist', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        },
        mode: 'cors',
        body: JSON.stringify(
            {'email': data})
    })
        .then(response => {
            emailExist = response.status === 422;
            if(emailExist) {
                message.classList.remove('hidden');
                submit.disabled = true;
            } else {
                message.classList.add('hidden');
                if(passwordValid)submit.disabled = false;
            }
        })
}

accountNameInput.addEventListener('change', function() {
    if (accountNameInput.value !== '') {
        accountNameInput.classList.add('filled');
    } else {
        accountNameInput.classList.remove('filled');
    }
});

accountMailInput.addEventListener('change', function() {
    if (accountMailInput.value !== '') {
        accountMailInput.classList.add('filled');
    } else {
        accountMailInput.classList.remove('filled');
    }
});

accountPassInput.addEventListener('change', function() {
    if (accountPassInput.value !== '') {
        accountPassInput.classList.add('filled');
        validatePasswords(accountPassInput);
    } else {
        accountPassInput.classList.remove('filled');
    }
});

accountPassRepeatInput.addEventListener('change', function() {
    if (accountPassRepeatInput.value !== '') {
        accountPassRepeatInput.classList.add('filled');
        validatePasswords(accountPassRepeatInput);
    } else {
        accountPassRepeatInput.classList.remove('filled');
    }
});

const forms = document.querySelectorAll('form');

forms.forEach(function(form) {
    let input = form.querySelector('input[type = email]');
    let msg = form.querySelector('.registration__error-msg.email');

    input.addEventListener('change', (evt) => {
        evt.preventDefault();
        fetchMail(input, msg);
    });
});

let regForm = document.querySelector('.registration');

regForm.addEventListener('submit', (evt) => sendRequest(evt, regForm));

