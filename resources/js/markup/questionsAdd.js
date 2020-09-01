// Swiper

let mySwiper = new Swiper('.swiper-container', {

    speed: 400,
    spaceBetween: 0,
    slidesPerView: 1,
    autoHeight: false,
    height: 972,

    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
})

// Modal
const body = document.querySelector('body');
const modal = document.querySelector('.modal');
const modalForm = document.querySelector('.modal__window');
const returnBtn = document.querySelector('.modal__return');

// Add new answer

let lastQuestionEl = document.querySelector('.swiper-slide:last-child');
let addAnswerBtn = lastQuestionEl.querySelector('.answer-list__item-add');

let activationAddAnswer = function () {
    addAnswerBtn.addEventListener('click', (evt) => {
        /* evt.preventDefault(); */
        let redactorQuestion = evt.target.closest('.redactor-content__question');
        let prevBlock = redactorQuestion.querySelector('.answer-list__item:nth-last-child(2)');
        let lastName = prevBlock.querySelector('.answer-list__input').name;
        let newName = Number(lastName) + 1;
        let parent = evt.target.closest('.answer-list__item');

        parent.insertAdjacentHTML('beforebegin', `<li class="answer-list__item">
    <label>
        <button type="button" class="answer-list__item-del">
            <span class="visually-hidden">Del</span>
        </button>
        <input class="answer-list__radio" name="question1" type="radio">
        <input class="answer-list__input" name="${newName}" type="text" placeholder="Ответ" minlength="3" required>
        <span></span>
    </label>
    </li>`);

        delAnswerBtns = parent.previousElementSibling.querySelectorAll('.answer-list__item-del');
        activationDeleteAnswer();
    })
}

activationAddAnswer();

//  Delete answer

let delAnswerBtns = document.querySelectorAll('.answer-list__item-del');

let activationDeleteAnswer = function () {
    delAnswerBtns.forEach(function (elem) {
        elem.addEventListener('click', (evt) => {
            let parent = evt.target.closest('.answer-list__item');
            parent.remove();
        });
    });
}
activationDeleteAnswer();
//  Add new question

const addQuestionBtn = document.querySelector('.redactor-content__add-question');

addQuestionBtn.addEventListener('click', (evt) => {
    evt.preventDefault();
    let lastBlock = document.querySelector('.swiper-slide:last-child');
    let lastName = lastBlock.querySelector('.answer-list__radio').name;
    let newName = Number(lastName) + 1;

    mySwiper.appendSlide(`<div class="swiper-slide">
    <fieldset class="redactor-content__question">
    <textarea class="redactor-content__question-text" name="question" placeholder="Вопрос" minlength="3" required></textarea>
    <ul class="answer-list">
        <li class="answer-list__item">
            <button type="button" class="answer-list__item-del">
                <span class="visually-hidden">Del</span>
            </button>
            <label>
                <input class="answer-list__radio" name="${newName}" type="radio" required checked>
                <input class="answer-list__input" name="1" type="text" placeholder="Ответ" minlength="3" required>
                <span></span>
            </label>
        </li>
        <li class="answer-list__item">
            <button type="button" class="answer-list__item-del">
                <span class="visually-hidden">Del</span>
            </button>
            <label>
                <input class="answer-list__radio" name="${newName}" type="radio">
                <input class="answer-list__input" name="2" type="text" placeholder="Ответ" minlength="3" required>
                <span></span>
            </label>
        </li>
        <li class="answer-list__item">
            <button type="button" class="answer-list__item-del">
                <span class="visually-hidden">Del</span>
            </button>
            <label>
                <input class="answer-list__radio" name="${newName}" type="radio">
                <input class="answer-list__input" name="3" type="text" placeholder="Ответ" minlength="3" required>
                <span></span>
            </label>
        </li>
        <li class="answer-list__item">
            <button type="button" class="answer-list__item-del">
                <span class="visually-hidden">Del</span>
            </button>
            <label>
                <input class="answer-list__radio" name="${newName}" type="radio">
                <input class="answer-list__input" name="4" type="text" placeholder="Ответ" minlength="3" required>
                <span></span>
            </label>
        </li>
        <li class="answer-list__item">
            <button class="answer-list__item-add" type="button">
                <span class="visually-hidden">Добавить ответ</span>
            </button>
        </li>
    </ul>
</fieldset>
</div>`);
    lastQuestionEl = document.querySelector('.swiper-slide:last-child');
    addAnswerBtn = lastQuestionEl.querySelector('.answer-list__item-add');
    activationAddAnswer();

    delAnswerBtns = lastQuestionEl.querySelectorAll('.answer-list__item-del');
    activationDeleteAnswer();
});

let saveBtn = document.querySelector('.redactor-content__save-questions');

saveBtn.addEventListener('click', (evt) => {
    let questions = document.querySelectorAll('.redactor-content__question');
    let questionsValid = true;
    let answersValid = true;
    let questionsArr = [];

    questions.forEach((question) => {
        let questionText = question.querySelector('.redactor-content__question-text').value;
        let answers = question.querySelectorAll('.answer-list__input');
        if (questionText.length) {
            questionsArr.push({'text': questionText, 'answers': []});

            answers.forEach((answer) => {
                if (answer.value.length) {
                    let lastQuestion = questionsArr[questionsArr.length - 1];
                    let answerCorrect = answer.previousElementSibling.checked ? 1 : 0;
                    lastQuestion['answers'].push({
                        'text': answer.value,
                        'is_correct': answerCorrect
                    });
                } else answersValid = false;
            });
        } else questionsValid = false;
    });

    if (!questionsValid) {
        let saveAccept = confirm('Есть незаполненные вопросы. Вопросы с пустым текстом и их ответы не будут добавлены');
        if(!saveAccept) return false;
    }
    if (!answersValid) {
        alert('Есть незаполненные варианты ответов. Пожалуйста, заполните пустые поля');
        return false;
    }

    if(questionsArr.length) {
        let URL = location.pathname;
        fetch(URL, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            body: JSON.stringify({'questions': questionsArr})
        })
            .then(response => {
                if (response.ok) location.assign('/');
            })
    }


});
