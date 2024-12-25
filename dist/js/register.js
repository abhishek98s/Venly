const usernameError = document.getElementsByClassName("username-error")[0];
const passwordError = document.getElementsByClassName("password-error")[0];

let userValue = {
    username: '',
    password: '',
}


function handleChange(e) {
    const value = e.target.name;
    const inputValue = e.target.value;

    switch (value) {
        case 'username':
            const usernameRegex = /^[a-zA-Z0-9._%+-]{3,}$/;
            if (usernameRegex.test(inputValue)) {
                userValue.username = inputValue;
                usernameError.textContent = '';
            } else {
                usernameError.textContent = 'Username must be at least 3 characters long';
            }
            break;

        case 'password':
            const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;
            if (passwordRegex.test(inputValue)) {
                userValue.password = inputValue;
                passwordError.textContent = '';
            } else {
                passwordError.textContent = 'Password must be at least 8 characters, contain at least one uppercase letter, one lowercase letter, and one digit';
            }
            break;

        default:
            break;
    }
}

document.getElementById('username').addEventListener('input', handleChange);
document.getElementById('password').addEventListener('input', handleChange);

function submitRegisterForm() {

}