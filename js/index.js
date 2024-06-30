'use strict'

const page = document.getElementById('page')
const authBtn = document.querySelector('.auth-btn')

const toggleAuthModal = e => {

    // logic
    const modalWindowLoginHTML =
        `<div class="backdrop">
        <div class='auth__modal'>
            <h2 class='auth__modal-title'>Вход в аккаунт</h2>
            <form action="./login.php" method="POST">
                <div class="auth__modal-input">
                    <label>Почта</label>
                    <input name="email" type='email' placeholder="Здесь должна быть ваша электронная почта">
                </div>
                <div class="auth__modal-input">
                    <label>Пароль</label>
                    <input name="password" type='password' placeholder="Здесь должен быть ваш пароль от аккаунта">
                </div>
                <p class="redirect-to-register">Нету аккаунта? <button id="redirect-to-register" class="redirect-btn">Регистрация</button></p>

                <button class="auth__modal-btn" type="submit">Войти</button>
            </form>
        </div>
    </div>
    `

    const modalWindowRegisterHTML =
        `<div class="backdrop">
            <div class='auth__modal'>
                <h2 class='auth__modal-title'>Зарегистрироваться</h2>
                <form action="./register.php" method="POST">
                    <div class="auth__modal-input">
                        <label>Логин</label>
                        <input name="login" type='text' placeholder="Например, «Иван Купало» или «destroyer666»">
                    </div>
                    <div class="auth__modal-input">
                        <label>Почта</label>
                        <input name="email" type='email' placeholder="Например, ivanov1990@gmail.com">
                    </div>
                    <div class="auth__modal-input">
                        <label>Пароль</label>
                        <input name="password" type='password' placeholder="Например, 4lf!Gh54de3$">
                    </div>
                    <p class="redirect-to-register">Есть аккаунт? <button id="redirect-to-login" class="redirect-btn">Войдите</button></p>

                    <button class="auth__modal-btn" type="submit">Войти</button>
                </form>
            </div>
        </div>
        `

    e.target === document.querySelector('.auth-btn') && !e.key ? page.insertAdjacentHTML('beforeend', modalWindowLoginHTML) : null
    e.target === document.querySelector('.backdrop') ? document.querySelector('.backdrop').remove() : null
    e.key === 'Escape' && document.querySelector('.backdrop').remove()


    switch (e.target) {
        case document.getElementById('redirect-to-register'):
            document.querySelector('.backdrop').innerHTML =
                `
            <div class='auth__modal'>
            <h2 class='auth__modal-title'>Зарегистрироваться</h2>
            <form action="./register.php" method="POST">
                <div class="auth__modal-input">
                    <label>Логин</label>
                    <input name="login" type='text' placeholder="Например, «Иван Купало» или «destroyer666»">
                </div>
                <div class="auth__modal-input">
                    <label>Почта</label>
                    <input name="email" type='email' placeholder="Например, ivanov1990@gmail.com">
                </div>
                <div class="auth__modal-input">
                    <label>Пароль</label>
                    <input name="password" type='password' placeholder="Например, 4lf!Gh54de3$">
                </div>
                <p class="redirect-to-register">Есть аккаунт? <button id="redirect-to-login" class="redirect-btn">Войдите</button></p>

                <button class="auth__modal-btn" type="submit">Зарегистрироваться</button>
            </form>
        </div>
            `
            break;
        case document.getElementById('redirect-to-login'):
            document.querySelector('.backdrop').innerHTML =
                `
            <div class='auth__modal'>
                <h2 class='auth__modal-title'>Вход в аккаунт</h2>
                <form action="./login.php" method="POST">
                    <div class="auth__modal-input">
                        <label>Почта</label>
                        <input name="email" type='email' placeholder="Здесь должна быть ваша электронная почта">
                    </div>
                    <div class="auth__modal-input">
                        <label>Пароль</label>
                        <input name="password" type='password' placeholder="Здесь должен быть ваш пароль от аккаунта">
                    </div>
                    <p class="redirect-to-register">Нету аккаунта? <button id="redirect-to-register" class="redirect-btn">Регистрация</button></p>

                    <button class="auth__modal-btn" type="submit">Войти</button>
                </form>
                </div>
            `

            break
        default:
            break;
    }



}

page.addEventListener('keydown', toggleAuthModal)
page.addEventListener('click', toggleAuthModal)