const greeting = document.querySelector('.greeting');

window.onload = () => {
    if(!sessionStorage.name){
        // location.href = '/login';
        location.href = 'account.html';
    } else{
        greeting.innerHTML = `hello ${sessionStorage.name}`;
    }
}

const logOut = document.querySelector('.logout');

logOut.onclick = () => {
    sessionStorage.clear();
    location.reload();
}