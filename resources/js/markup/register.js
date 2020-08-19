const regBtn = document.querySelector('.header__user');
regBtn.addEventListener('click', function(evt) {
    evt.preventDefault();
    body.classList.add('no-scroll');
    modal.classList.add('show');

    let stopProp = function(evt) {
        evt.stopPropagation();
    }

    let closeModal = function(evt) {
        evt.preventDefault();
        body.classList.remove('no-scroll');
        modal.classList.remove('show');
        modal.removeEventListener('click', closeModal);
        modalForm.removeEventListener('click', stopProp)
    }

    modal.addEventListener('click', closeModal)
    modalForm.addEventListener('click', stopProp)
})

const accountNameInput = document.querySelector('.registration__input_name');
const accountMailInput = document.querySelector('.registration__input_email');
const accountPassInput = document.querySelector('.registration__input_pass');
const accountPassRepeatInput = document.querySelector('.registration__input_pass-repeat');

accountNameInput.addEventListener('change', function() {
    if (accountNameInput.value !== '') {
        accountNameInput.classList.add('filled');
    } else {
        accountNameInput.classList.remove('filled');
    };
});

accountMailInput.addEventListener('change', function() {
    if (accountMailInput.value !== '') {
        accountMailInput.classList.add('filled');
    } else {
        accountMailInput.classList.remove('filled');
    };
});

accountPassInput.addEventListener('change', function() {
    if (accountPassInput.value !== '') {
        accountPassInput.classList.add('filled');
        validatePasswords(accountPassInput);
    } else {
        accountPassInput.classList.remove('filled');
    };
});

accountPassRepeatInput.addEventListener('change', function() {
    if (accountPassRepeatInput.value !== '') {
        accountPassRepeatInput.classList.add('filled');
        validatePasswords(accountPassRepeatInput);
    } else {
        accountPassRepeatInput.classList.remove('filled');
    };
});
