function getElements_registrer() {
    var name = document.getElementById('nombre').value;
    var lastname = document.getElementById('apellidos').value;
    var nickname = document.getElementById('nickname').value;
    var email = document.getElementById('correo').value;
    var pass = document.getElementById('pass').value;
    var pass_conf = document.getElementById('pass_conf').value;

    if (pass == pass_conf) {
        createAcount(name, lastname, nickname, email, pass);
    } else {
        alert("tus contraseñas no coinciden");
    }

}

function createAcount(name, lastname, nickname, email, pass) {
    console.log("recibi: ", name, lastname, nickname, email, pass);
    /*Creacion de nuevos usuarios y sus respectivas estructuras JSON en Firebase*/
    firebase.auth().createUserWithEmailAndPassword(email, pass)
        .then((user) => {
            //Estraemos el uid contenido en el objeto user contenido
            firebase.auth().onAuthStateChanged((user) => {
                if (user) {
                    //observador de authentication para extraer el uid y crear las estructuras relacionadas al usuario añadido
                    var uid = user.uid;
                    console.log(uid);
                    firebase.database().ref('users/' + uid).set({
                        username: name,
                        userlastname: lastname,
                        email: email,
                        nickname: nickname
                    });
                } else {
                    // User is signed out
                    // ...
                }
            });
            //nueva estructura con los datos del usuario userId
            /**/
        })
        .catch((error) => {
            var errorCode = error.code;
            var errorMessage = error.message;
            console.log(errorCode);
            console.log(errorMessage)
        });
}

function getElements_login(params) {
    var user = document.getElementById('correo_login').value;
    var pass_user = document.getElementById('pass_login').value;
    loginAcount(user, pass_user)
}

function loginAcount(email, pass) {
    console.log("recibi ", email, pass);
    firebase.auth().signInWithEmailAndPassword(email, pass)
        .then((user) => {
            console.log("incializado");
            window.location = "crud_usr.html";
        })
        .catch((error) => {
            var errorCode = error.code;
            var errorMessage = error.message;
            console.log(errorCode);
            console.log(errorMessage);
        });
}