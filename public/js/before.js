let validatePasswords = function (elem) {
    let form = elem.parentNode;
    let passwords = form.querySelectorAll('input[type=password]');
    let submitBtn = form.querySelector('button[type=submit]');
    let errorMsg = form.querySelector('div');

    if (passwords[0].value !== "" && passwords[1].value !== "") {
        passwordValid = passwords[0].value === passwords[1].value;
        if (passwordValid) {
            if (!emailExist) submitBtn.disabled = false;
            errorMsg.classList.add('hidden');
        } else {
            submitBtn.disabled = true;
            errorMsg.classList.remove('hidden');
        }
    }
}
let postData = function (URL, item) {
    let test_id = {};
    test_id = item.closest('.test-preview').dataset.test_id;

    fetch(URL, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        },
        mode: 'cors',
        body: JSON.stringify(
            {test_id})
    })
        .then(response => {
            if (response.status === 401) location.assign('home');
        })
}

let sendRequest = function (e, form, isLogin) {
    e.preventDefault();

    let URL = isLogin ? 'login' : 'register';
    let formData = new FormData(form);
    let jsonData={};
    formData.forEach(function(value, key){
        jsonData[key] = value;
    });

    fetch(URL, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        },
        body: JSON.stringify(jsonData)
    })
        .then(response => {
            if (response.ok) {
                location.assign( 'home');
            }
            if (response.status === 422) {
                if (isLogin) {
                    let messageEl = document.querySelector('.authorization__error-msg');
                    messageEl.classList.remove('hidden');
                }
            }
        })
}
