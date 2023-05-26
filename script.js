const password = document.getElementById('password');
const icon = document.getElementById('icon');

function showHidden(){
    if(password.type === 'password'){
        password.setAttribute('type', 'text');
        icon.classList.add('hidden')
    }else {
        password.setAttribute('type', 'password')
        icon.classList.remove('hidden')
    }
}

