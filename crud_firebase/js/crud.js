addEventListener("load", read_task)

function alerts_operations(type_color, message, section) {
    console.log(section);
    if (section == "alert_create") {
        document.getElementById('alert_create').innerHTML = `
        <div class="alert alert-` + type_color + ` alert-dismissible mt-5">
            <p>` + message + `</p>
            <button type="button" class="close" data-dismiss="alert">
                <span>x</span>
            </button>
        </div>`;
    } else {
        document.getElementById('alert_actions').innerHTML = `
        <div class="alert alert-` + type_color + ` alert-dismissible mt-5">
            <p>` + message + `</p>
            <button type="button" class="close" data-dismiss="alert">
                <span>x</span>
            </button>
        </div>`;
    }
}

function create_task() {

    var title = document.getElementById('title').value;
    var description = document.getElementById('description').value;
    var date = document.getElementById('dateExe').value;

    firebase.auth().onAuthStateChanged((user) => {
        if (user) {
            //observador de authentication para extraer el uid y crear las estructuras relacionadas al usuario añadido
            var uid = user.uid;
            console.log(uid);
            var userStrucRef = firebase.database().ref('users/' + uid + '/tasks');
            var newStrucRef = userStrucRef.push();
            newStrucRef.set({
                'title': title,
                'description': description,
                'date': date
            }).then((resp) => {
                console.log('holi');
                alerts_operations("success", "Tarea añadida", "alert_create");
            });
        } else {
            console.log("error en la escritura");
        }
    });
}

function create_task_mov() {
    var title = document.getElementById('title_mov').value;
    var description = document.getElementById('description_mov').value;
    var date = document.getElementById('dateExe_mov').value;

    firebase.auth().onAuthStateChanged((user) => {
        if (user) {
            //observador de authentication para extraer el uid y crear las estructuras relacionadas al usuario añadido
            var uid = user.uid;
            console.log(uid);
            var userStrucRef = firebase.database().ref('users/' + uid + '/tasks');
            var newStrucRef = userStrucRef.push();
            newStrucRef.set({
                'title': title,
                'description': description,
                'date': date
            }).then((resp) => {
                console.log('holi');
                alerts_operations("success", "Tarea añadida", "alert_create")
            });
        } else {
            console.log("error en la escritura");
        }
    });
}

function display_new_row(id, title, description, date) {
    var newRow = document.createElement("tr");
    newRow.setAttribute('id', id)

    newRow.innerHTML = `
    <td>
        <input type="text" name="title_task_X" id="` + id + `_title" value="` + title + `">
    </td>
    <td>
        <input type="text" name="description_task_x" id="` + id + `_description" value="` + description + `">
    </td>
    <td>
        <input type="text" name="date_task" id="` + id + `_date" value="` + date + `">
    </td>
    <td style="text-align: center;">
        <button type="button" class="btn btn-success" onclick="success_task('` + id + `')"><i class="fas fa-check-circle"></i></button>
        <button type="button" class="btn btn-warning" onclick="update_task('` + id + `')"><i class="fas fa-edit"></i></button>
        <button type="button" class="btn btn-danger" onclick="delete_task('` + id + `')"><i class="fas fa-trash"></i></button>
    </td>
    `;
    var tableBody = document.getElementById('show_task');
    tableBody.appendChild(newRow);
}

function read_task() {

    firebase.auth().onAuthStateChanged((user) => {
        if (user) {
            //observador de authentication para extraer el uid y crear las estructuras relacionadas al usuario añadido
            var uid = user.uid;
            console.log(uid);

            var userNAME = firebase.database().ref('users/' + uid);
            userNAME.on('value', (snapshot) => {
                const data = snapshot.val();
                console.log(data.nickname)
                document.getElementById("userNAME").innerHTML = data.nickname;
            });

            var filasTabla = firebase.database().ref('users/' + uid + '/tasks');
            filasTabla.on('child_added', (snapshot) => {
                const data = snapshot.val();
                console.log(data);
                display_new_row(snapshot.key, data['title'], data['description'], data['date']);
            });
        } else {
            console.log("error en la lectura");
        }
    });

}

function update_task(id) {
    var newTitle = document.getElementById(id + '_title').value;
    var newDescription = document.getElementById(id + '_description').value;
    var newDate = document.getElementById(id + '_date').value;

    firebase.auth().onAuthStateChanged((user) => {
        if (user) {
            //observador de authentication para extraer el uid y crear las estructuras relacionadas al usuario añadido
            var uid = user.uid;
            console.log(uid);
            firebase.database().ref('users/' + uid + '/tasks').child(id).update({
                title: newTitle,
                description: newDescription,
                date: newDate
            }).then((resp) => {
                console.log('holi');
                alerts_operations("warning", "Tarea actualizada", "alert_action");
            });

        } else {
            console.log("error al actualizar");
        }
    });

}

function delete_task(id) {
    console.log(id)

    firebase.auth().onAuthStateChanged((user) => {
        if (user) {
            //observador de authentication para extraer el uid y crear las estructuras relacionadas al usuario añadido
            var uid = user.uid;
            console.log(uid);
            firebase.database().ref('users/' + uid + '/tasks').child(id).remove().then(() => {
                var tbody = document.getElementById('show_task');
                var rowDelete = document.getElementById(id);
                var result = tbody.removeChild(rowDelete);
                alerts_operations("danger", "Tarea Borrada", "alert_action")
            });
        } else {
            console.log("error al borrar");
        }
    });

}

/**marca en un color diferentre la celda con la tarea completada */
function success_task(id) {
    var rowSuccess = document.getElementById(id);
    var titleSuccess = document.getElementById(id + '_title');
    var descriptionSuccess = document.getElementById(id + '_description');
    var dateSuccess = document.getElementById(id + '_date');

    const styleRuleinput = 'background-color: grey; color: white'

    rowSuccess.setAttribute('style', 'background-color: grey');
    titleSuccess.setAttribute('style', styleRuleinput);
    titleSuccess.disabled = true;
    descriptionSuccess.setAttribute('style', styleRuleinput);
    descriptionSuccess.disabled = true;
    dateSuccess.setAttribute('style', styleRuleinput);
    dateSuccess.disabled = true;
    alerts_operations("success", "Tarea completada", "alert_action")

}