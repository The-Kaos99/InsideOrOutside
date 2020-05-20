
function mostrarProfes() {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', '../administracion/listaProfesores.php', true);
    xhr.onload = function () {
        if (xhr.status === 200) {
            var json = JSON.parse(xhr.responseText);

            var template = ``;
            json.map(function (data) {
                template += `
                    <tr >                    
                        <th scope="row">${data.nombre}</th>
                        <td>${data.apellidos}</td>
                        <td ><a href="mailto:${data.email}">${data.email}</a></td>
                        <td ">
                        <button class="btn btn-danger task-delete " onclick="borrrarProfesor()">Eliminar</button>
                      </td>                                         
                    </tr>
                `;
                return template;
            });
            var cabeceraTabla = `
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Email</th>
                        <th scope="col"><form>
                        <div class="form-group" id="busquedaProfesores">
                            <label for="buscarProfesores">Busqueda <i class="fas fa-search"></i></label>
                            <input type="text" class="form-control" name="buscarProfesores" id="buscarProfesores"
                                aria-describedby="buscarProfesores" placeholder="Buscar Profesor" onkeyup="doSearch('listaProfesores','buscarProfesores')">
                        </div>
                    </form></th>
                    </tr>
                </thead>
            `;
            

            document.getElementById('listaProfesores').innerHTML = cabeceraTabla +"<tbody>"+template+"</tbody>";
        } else {
            console.log('Existe un error de tipod: ' + xhr.status);
        }
    };
    xhr.send();
}
function borrrarProfesor() {
    confirm('Estas seguro??');
}

function doSearch(idTabla,idBuscador) {
    const tableReg = document.getElementById(idTabla);
    const searchText = document.getElementById(idBuscador).value.toLowerCase();
    let total = 0;

    // Recorremos todas las filas con contenido de la tabla
    for (let i = 1; i < tableReg.rows.length; i++) {
        // Si el td tiene la clase "noSearch" no se busca en su cntenido
        if (tableReg.rows[i].classList.contains("noSearch")) {
            continue;
        }

        let found = false;
        const cellsOfRow = tableReg.rows[i].getElementsByTagName('td');
        // Recorremos todas las celdas
        for (let j = 0; j < cellsOfRow.length && !found; j++) {
            const compareWith = cellsOfRow[j].innerHTML.toLowerCase();
            // Buscamos el texto en el contenido de la celda
            if (searchText.length == 0 || compareWith.indexOf(searchText) > -1) {
                found = true;
                total++;
            }
        }
        if (found) {
            tableReg.rows[i].style.display = '';
        } else {
            // si no ha encontrado ninguna coincidencia, esconde la
            // fila de la tabla
            tableReg.rows[i].style.display = 'none';
            
        }
    }
}

