var usuarios = [];

let contadorRegistros = 1;

// Agregar usuarios modal tmf

document.getElementById('submit-popup-tmf').addEventListener('click', event =>{
    let estatus = validarTmf();
    if (estatus){

        let temp = [
            'tp-' + contadorRegistros,
            document.getElementById('name_tmf').value,
            0,
            document.getElementById('profession_tmf').value,
            document.getElementById('labor_tmf').value,
            0,
            document.getElementById('team_tmf').value,
        ]
        contadorRegistros = contadorRegistros + 1;
        usuarios.push(temp);
        addUsser(temp, 'list_user_tmf')
        closePopup('popup_tmf')
    }
})

function addUsser(array, select){
  let option = document.createElement('option');
  option.value = array[0];
  option.text = array[1];

  document.getElementById(select).appendChild(option);
}

// Agregar usuarios tmo

document.getElementById('submit-popup-tmo').addEventListener('click', event =>{
    let estatus = validarTmo();
    if (estatus){

        let temp = [
            'tp-' + contadorRegistros,
            document.getElementById('name_tmo').value,
            0,
            document.getElementById('profession_tmo').value,
            document.getElementById('labor_tmo').value,
            0,
            document.getElementById('team_tmo').value,
        ]

        contadorRegistros = contadorRegistros + 1;
        usuarios.push(temp);
        addUsser(temp, 'list_user_tmo')
        closePopup('popup_tmo')
        
    }
})

function addUsser(array, select){
  let option = document.createElement('option');
  option.value = array[0];
  option.text = array[1];

  document.getElementById(select).appendChild(option);
}

// Agregar usuarios modal tme

document.getElementById('submit-popup-tme').addEventListener('click', event =>{
    let estatus = validarTme();
    if (estatus){

        let temp = [
            'tp-' + contadorRegistros,
            document.getElementById('name_tme').value,
            document.getElementById('etb_tme').value,
            0,
            0,
            0,
            document.getElementById('team_tme').value,
        ]

        contadorRegistros = contadorRegistros + 1;
        usuarios.push(temp);
        addUsser(temp, 'list_user_tme')
        closePopup('popup_tme')
    }
})

// Agregar usuarios modal tmr

document.getElementById('submit-popup-tmr').addEventListener('click', event =>{
    let estatus = validarTmr();
    if (estatus){

        let temp = [
            'tp-' + contadorRegistros,
            document.getElementById('name_tmr').value,
            document.getElementById('etb_tmr').value,
            0,
            0,
            0,
            document.getElementById('team_tmr').value,
        ]
        contadorRegistros = contadorRegistros + 1;
        usuarios.push(temp);
        addUsser(temp, 'list_user_tmr')
        closePopup('popup_tmr')
    }
})

// Agregar usuarios modal tma

document.getElementById('submit-popup-tma').addEventListener('click', event =>{
    let estatus = validarTma();
    if (estatus){
        let temp = [
            'tp-' + contadorRegistros,
            document.getElementById('name_tma').value,
            document.getElementById('etb_tma').value,
            0,
            0,
            0,
            document.getElementById('team_tma').value,
        ]

        contadorRegistros = contadorRegistros + 1;
        usuarios.push(temp);
        addUsser(temp, 'list_user_tma')
        closePopup('popup_tma')
    }
})

//Validar tmf

    function validarTmf() {
        let n = document.getElementById("name_tmf").value;
        let p = document.getElementById("profession_tmf").value;
        let e = document.getElementById("team_tmf").value;
        let cl = document.getElementById("labor_tmf").value;
      
        if (n == "" || p == "" || e == "" || cl == "") {
          alert("Por favor, complete todos los campos");
          return false;
        }
      
        document.getElementById("name_tmf").value = n.toUpperCase();

          return true;
      }

//Validar tmo

function validarTmo() {
    let n = document.getElementById("name_tmo").value;
    let p = document.getElementById("profession_tmo").value;
    let e = document.getElementById("team_tmo").value;
    let cl = document.getElementById("labor_tmo").value;
  
    if (n == "" || p == "" || e == "" || cl == "") {
      alert("Por favor, complete todos los campos");
      return false;
    }
  
    document.getElementById("name_tmo").value = n.toUpperCase();

        return true;

  }

//Validar tme

function validarTme() {
    let n = document.getElementById("name_tme").value;
    let et = document.getElementById("etb_tme").value;
    let e = document.getElementById("team_tme").value;
 
    if (n == "" || et == "" || e == "") {
      alert("Por favor, complete todos los campos");
      return false;
    }
 
    document.getElementById("name_tme").value = n.toUpperCase();
 
        return true;

  }

//Validar tmr

function validarTmr() {
    let n = document.getElementById("name_tmr").value;
    let et = document.getElementById("etb_tmr").value;
    let e = document.getElementById("team_tmr").value;
 
    if (n == "" || et == "" || e == "") {
      alert("Por favor, complete todos los campos");
      return false;
    }
  
    document.getElementById("name_tmr").value = n.toUpperCase();
    return true;
  }

//Validar tma

    function validarTma() {
    let n = document.getElementById("name_tma").value;
    let et = document.getElementById("etb_tma").value;
    let e = document.getElementById("team_tma").value;

    if (n == "" || et == "" || e == "") {
      alert("Por favor, complete todos los campos");
      return false;
    }

      document.getElementById("name_tma").value = n.toUpperCase();
      return true;

    }

    document.getElementById('send_export_document').addEventListener('click', event=>{
    arrayJson=JSON.stringify(usuarios);

    let input = document.createElement('input');
    input.value = arrayJson;
    input.setAttribute('name', 'usuariosTemp');
    document.getElementById('s_memo').appendChild(input);
    document.getElementById('s_memo').submit();

})