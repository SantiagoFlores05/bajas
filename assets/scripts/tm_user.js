var usuarios = [];

let contadorRegistros = 1;

// Agregar usuarios modal thmf

document.getElementById('submit-popup-thmf').addEventListener('click', event =>{
    let estatus = validarThmf();
    if (estatus){

        let temp = [
            'tp-' + contadorRegistros,
            document.getElementById('name_thmf').value,
            0,
            document.getElementById('profession_thmf').value,
            document.getElementById('labor_thmf').value,
            0,
            document.getElementById('team_thmf').value,
        ]
        contadorRegistros = contadorRegistros + 1;
        usuarios.push(temp);
        addUsser(temp, 'list_user_thmf')
        closePopup('popup_thmf')
        
    
    }
})

function addUsser(array, select){
    let option = document.createElement('option');
    option.value = array[0];
    option.text = array[1];
  
    document.getElementById(select).appendChild(option);
  }

// Agregar usuarios thmo

document.getElementById('submit-popup-thmo').addEventListener('click', event =>{
    let estatus = validarThmo();
    if (estatus){

        let temp = [
            'tp-' + contadorRegistros,
            document.getElementById('name_thmo').value,
            0,
            document.getElementById('profession_thmo').value,
            document.getElementById('labor_thmo').value,
            0,
            document.getElementById('team_thmo').value,
        ]
        contadorRegistros = contadorRegistros + 1;
        usuarios.push(temp);
        addUsser(temp, 'list_user_thmo')
        closePopup('popup_thmo')
        
    
    }
})

function addUsser(array, select){
    let option = document.createElement('option');
    option.value = array[0];
    option.text = array[1];
  
    document.getElementById(select).appendChild(option);
  }

// Agregar usuarios modal thme

document.getElementById('submit-popup-thme').addEventListener('click', event =>{
    let estatus = validarThme();
    if (estatus){
        let temp = [
            'tp-' + contadorRegistros,
            document.getElementById('name_thme').value,
            document.getElementById('etb_thme').value,
            0,
            0,
            0,
            document.getElementById('team_thme').value,
        ]
        contadorRegistros = contadorRegistros + 1;
        usuarios.push(temp);
        addUsser(temp, 'list_user_thme')
        closePopup('popup_thme')
    }
})



// Agregar usuarios modal thmr

document.getElementById('submit-popup-thmr').addEventListener('click', event =>{
    let estatus = validarThmr();
    if (estatus){
        let temp = [
            'tp-' + contadorRegistros,
            document.getElementById('name_thmr').value,
            document.getElementById('etb_thmr').value,
            0,
            0,
            0,
            document.getElementById('team_thmr').value,
        ]
        contadorRegistros = contadorRegistros + 1;
        usuarios.push(temp);
        addUsser(temp, 'list_user_thmr')
        closePopup('popup_thmr')
    }
})

    

// Agregar usuarios modal thma

document.getElementById('submit-popup-thma').addEventListener('click', event =>{
    let estatus = validarThma();
    if (estatus){
        let temp = [
            'tp-' + contadorRegistros,
            document.getElementById('name_thma').value,
            document.getElementById('etb_thma').value,
            0,
            0,
            0,
            document.getElementById('team_thma').value,
        ]
        contadorRegistros = contadorRegistros + 1;
        usuarios.push(temp);
        addUsser(temp, 'list_user_thma')
        closePopup('popup_thma')
    }
})
function validarThmf() {
    let n = document.getElementById("name_thmf").value;
    let p = document.getElementById("profession_thmf").value;
    let e = document.getElementById("team_thmf").value;
    let cl = document.getElementById("labor_thmf").value;
    // let f = document.getElementById("signa_thmf").files[0];
  
    if (n == "" || p == "" || e == "" || cl == "") {
      alert("Por favor, complete todos los campos");
      return false;
    }
  
    // if (!f) {
    //   alert("Por favor, ingrese su firma");
    //   return false;
    // }
  
    document.getElementById("name_thmf").value = n.toUpperCase();

    // let fileInput = document.getElementById('signa_thmf');
    // let filePath = fileInput.value;
    // let allowedExtensions = /(.png|.jpeg|.jpg|.PNG|.JPEG|.JPG)$/i;
    // if(!allowedExtensions.exec(filePath)){

    //     alert('Por favor, sube una imágen')
    //     fileInput.value = '';
    //     return false;

    //     }
        return true;
  }
//Validar thmo

function validarThmo() {
    let n = document.getElementById("name_thmo").value;
    let p = document.getElementById("profession_thmo").value;
    let e = document.getElementById("team_thmo").value;
    let cl = document.getElementById("labor_thmo").value;
    // let f = document.getElementById("signa_thmo").files[0];

    if (n == "" || p == "" || e == "" || cl == "") {
      alert("Por favor, complete todos los campos");
      return false;
    }

    // if (!f) {
    //   alert("Por favor, ingrese su firma");
    //   return false;
    // }

    document.getElementById("name_thmo").value = n.toUpperCase();

    // let fileInput = document.getElementById('signa_thmo');
    // let filePath = fileInput.value;
    // let allowedExtensions = /(.png|.jpeg|.jpg|.PNG|.JPEG|.JPG)$/i;
    // if(!allowedExtensions.exec(filePath)){

    //     alert('Por favor, sube una imágen')
    //     fileInput.value = '';
    //     return false;

    //     }
        return true;
    }

//Validar thme

function validarThme() {
    let n = document.getElementById("name_thme").value;
    let et = document.getElementById("etb_thme").value;
    let e = document.getElementById("team_thme").value;
    // let f = document.getElementById("signa_thme").files[0];

    if (n == "" || et == "" || e == "") {
      alert("Por favor, complete todos los campos");
      return false;
    }

    // if (!f) {
    //   alert("Por favor, ingrese su firma");
    //   return false;
    // }

    document.getElementById("name_thme").value = n.toUpperCase();

    // let fileInput = document.getElementById('signa_thme');
    // let filePath = fileInput.value;
    // let allowedExtensions = /(.png|.jpeg|.jpg|.PNG|.JPEG|.JPG)$/i;
    // if(!allowedExtensions.exec(filePath)){
    
    //     alert('Por favor, sube una imágen')
    //     fileInput.value = '';
    //     return false;
    
    //     }
        return true;
    }

//Validar thmr

function validarThmr() {
    let n = document.getElementById("name_thmr").value;
    let et = document.getElementById("etb_thmr").value;
    let e = document.getElementById("team_thmr").value;
    // let f = document.getElementById("signa_thmr").files[0];

    if (n == "" || et == "" || e == "") {
      alert("Por favor, complete todos los campos");
      return false;
    }

    // if (!f) {
    //   alert("Por favor, ingrese su firma");
    //   return false;
    // }

    document.getElementById("name_thmr").value = n.toUpperCase();

    // let fileInput = document.getElementById('signa_thmr');
    // let filePath = fileInput.value;
    // let allowedExtensions = /(.png|.jpeg|.jpg|.PNG|.JPEG|.JPG)$/i;
    // if(!allowedExtensions.exec(filePath)){
    
    //     alert('Por favor, sube una imágen')
    //     fileInput.value = '';
    //     return false;
    
    //     }
        return true;
    }

//Validar thma

function validarThma() {
    let n = document.getElementById("name_thma").value;
    let et = document.getElementById("etb_thma").value;
    let e = document.getElementById("team_thma").value;
    // let f = document.getElementById("signa_thma").files[0];

    if (n == "" || et == "" || e == "") {
      alert("Por favor, complete todos los campos");
      return false;
    }

    // if (!f) {
    //   alert("Por favor, ingrese su firma");
    //   return false;
    // }

    document.getElementById("name_thma").value = n.toUpperCase();

    // let fileInput = document.getElementById('signa_thma');
    // let filePath = fileInput.value;
    // let allowedExtensions = /(.png|.jpeg|.jpg|.PNG|.JPEG|.JPG)$/i;
    // if(!allowedExtensions.exec(filePath)){
    
    //     alert('Por favor, sube una imágen')
    //     fileInput.value = '';
    //     return false;
    
    //     }
        return true;
    }

    document.getElementById('send_export_document').addEventListener('click', event=>{
        arrayJson=JSON.stringify(usuarios);

        let input = document.createElement('input');
        input.value = arrayJson;
        input.setAttribute('name', 'usuariosTemp');
        document.getElementById('t_memo').appendChild(input);
        document.getElementById('t_memo').submit();
        })  