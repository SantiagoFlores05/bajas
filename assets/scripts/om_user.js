var usuarios = [];

let contadorRegistros = 1;

// Agregar usuarios modal for

document.getElementById('submit-popup-for').addEventListener('click', event =>{
    let estatus = validarFor();
    if (estatus){

        let temp = [
            'tp-' + contadorRegistros,
            document.getElementById('name_for').value,
            0,
            document.getElementById('profession_for').value,
            document.getElementById('labor_for').value,
            0,
            document.getElementById('team_for').value,
        ]
        contadorRegistros = contadorRegistros + 1;
        usuarios.push(temp);
        addUsser(temp, 'list_user_for')
        closePopup('popup_for')

    }
})

function addUsser(array, select){
    let option = document.createElement('option');
    option.value = array[0];
    option.text = array[1];

    document.getElementById(select).appendChild(option);
}

// Agregar usuarios modal of

document.getElementById('submit-popup-of').addEventListener('click', event =>{
    let estatus = validarOf();
    if (estatus){

        let temp = [
            'tp-' + contadorRegistros,
            document.getElementById('name_of').value,
            0,
            document.getElementById('profession_of').value,
            document.getElementById('labor_of').value,
            0,
            document.getElementById('team_of').value,
        ]
        contadorRegistros = contadorRegistros + 1;
        usuarios.push(temp);
        addUsser(temp, 'list_user_of')
        closePopup('popup_of')
        
    
    }
})

function addUsser(array, select){
    let option = document.createElement('option');
    option.value = array[0];
    option.text = array[1];

    document.getElementById(select).appendChild(option);
}

// Agregar usuarios modal elab

document.getElementById('submit-popup-elab').addEventListener('click', event =>{
    let estatus = validarElab();
    if(estatus){

        let temp = [
            'tp-' + contadorRegistros,
            document.getElementById('name_elab').value,
            document.getElementById('etb_elab').value,
            0,
            0,
            0,
            document.getElementById('team_elab').value,
        ]

        contadorRegistros = contadorRegistros + 1;
        usuarios.push(temp);
        addUsser(temp, 'list_user_elab')
        closePopup('popup_elab')

    }
})

// Agregar usuarios modal rev

document.getElementById('submit-popup-rev').addEventListener('click', event =>{
    let estatus = validarRev();
    if(estatus){
        let temp = [
            'tp-' + contadorRegistros,
            document.getElementById('name_rev').value,
            document.getElementById('etb_rev').value,
            0,
            0,
            0,
            document.getElementById('team_rev').value,
        ]
        contadorRegistros = contadorRegistros + 1;
        usuarios.push(temp);
        addUsser(temp, 'list_user_rev')
        closePopup('popup_rev')
    }
}) 

// Agregar usuarios modal ap

document.getElementById('submit-popup-ap').addEventListener('click', event =>{
    let estatus = validarAp();
    if (estatus){
        let temp = [
            'tp-' + contadorRegistros,
            document.getElementById('name_ap').value,
            document.getElementById('etb_ap').value,
            0,
            0,
            0,
            document.getElementById('team_ap').value,
        ]
        contadorRegistros = contadorRegistros + 1;
        usuarios.push(temp);
        addUsser(temp, 'list_user_ap')
        closePopup('popup_ap')
    }
})

//Validar for

    function validarFor() {
    
        let n = document.getElementById("name_for").value;
        let p = document.getElementById("profession_for").value;
        let e = document.getElementById("team_for").value;
        let cl = document.getElementById("labor_for").value;
      
        if (n == "" || p == "" || e == "" || cl == "") {
          alert("Por favor, complete todos los campos");
          return false;
        }
      
        document.getElementById("name_for").value = n.toUpperCase();
        return true;

    }
      
//Validar of

    function validarOf() {

        let n = document.getElementById("name_of").value;
        let p = document.getElementById("profession_of").value;
        let e = document.getElementById("team_of").value;
        let cl = document.getElementById("labor_of").value;
    
        if (n == "" || p == "" || e == "" || cl == "") {
          alert("Por favor, complete todos los campos");
          return false;
        }
    
        document.getElementById("name_of").value = n.toUpperCase();
        return true;

    }

//Validar elab

    function validarElab() {

        let n = document.getElementById("name_elab").value;
        let et = document.getElementById("etb_elab").value;
        let e = document.getElementById("team_elab").value;

        if (n == "" || et == "" || e == "") {
          alert("Por favor, complete todos los campos");
          return false;
        }

        document.getElementById("name_elab").value = n.toUpperCase();
        return true;

    }

//Validar rev

    function validarRev() {

       let n = document.getElementById("name_rev").value;
       let et = document.getElementById("etb_rev").value;
       let e = document.getElementById("team_rev").value;

        if (n == "" || et == "" || e == "") {
            alert("Por favor, complete todos los campos");
            return false;
       }

        document.getElementById("name_rev").value = n.toUpperCase();
        return true;

    }

//Validar ap

    function validarAp() {

        let n = document.getElementById("name_ap").value;
        let et = document.getElementById("etb_ap").value;
        let e = document.getElementById("team_ap").value;
    
        if (n == "" || et == "" || e == "") {
          alert("Por favor, complete todos los campos");
          return false;
        }
    
        document.getElementById("name_ap").value = n.toUpperCase();
        return true;

    } 

    document.getElementById('send_export_document').addEventListener('click', event=>{
    arrayJson=JSON.stringify(usuarios);

    let input = document.createElement('input');
    input.value = arrayJson;
    input.setAttribute('name', 'usuariosTemp');
    document.getElementById('om_form').appendChild(input);
    document.getElementById('om_form').submit();

    })


    // _________________________________________________________________________

    document.getElementById('can_elementos').addEventListener('change', event=>{
        if(document.getElementById('can_elementos').value > 0 && document.getElementById('can_elementos').value <= 100){
            can = parseInt(document.getElementById('can_elementos').value)
            $('#con-elementos-ad').empty();
            for (let i = 0; i < can ; i++) {

                let textAreaDefault = document.createElement('textarea');
                textAreaDefault.placeholder = "Ingrese el elemento a dar de baja";
                textAreaDefault.type = "text";
                textAreaDefault.setAttribute('name', 'elementos[]');
                $(textAreaDefault).addClass('element-main');

                document.getElementById('con-elementos-ad').appendChild(textAreaDefault);
            }

        }else{
            alert('Ingrese una cantidad válida \n Mínimo: 1 \n Máximo: 100');
            document.getElementById('can_elementos').value = 1;
            can = parseInt(document.getElementById('can_elementos').value)
            $('#con-elementos-ad').empty();
            for (let i = 0; i < can ; i++) {

                let textAreaDefault = document.createElement('textarea');
                textAreaDefault.placeholder = "Ingrese el elemento a dar de baja";
                textAreaDefault.type = "text";
                textAreaDefault.setAttribute('name', 'elementos[]');
                $(textAreaDefault).addClass('element-main');

                document.getElementById('con-elementos-ad').appendChild(textAreaDefault);
            }
        }
    })