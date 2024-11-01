document.onload = getSuccess();

//Controls the success label
function getSuccess() {
    setTimeout(function () {
        var success = document.getElementById('success');
        if (success !== null) {
            success.style.display = "none";
        } }, 5000)
}

// add buttons for properties images control
function addImageControl() {

    const divImages = document.getElementById('imagesAdd');
    const newDiv = document.createElement('div');
    newDiv.classList.add('row');
    newDiv.classList.add('mb-3');
    newDiv.classList.add('w-75');
    newDiv.setAttribute('id', '?');

    const newLabel = document.createElement('label');
    newLabel.classList.add('form-label');
    newLabel.setAttribute('name', 'name[]');
    newLabel.setAttribute('for', 'image[]');


    const images = divImages.querySelectorAll('div');
    console.log(images.length);
    const newTextNode = document.createTextNode('Imagen ' + (images.length + 1));


    const newFileInput = document.createElement('input');
    newFileInput.setAttribute('type', 'file');
    newFileInput.setAttribute('name', 'image[]');
    newFileInput.classList.add('form-control');

    divImages.appendChild(newDiv);
    newDiv.appendChild(newLabel);
    newLabel.appendChild(newTextNode);
    newDiv.appendChild(newFileInput);
}

function getTotal() {
    // alert('Focusing');
    let frontValue = document.getElementById('propFront').value;
    let depthValue = document.getElementById('propDepth').value;
    let totalValue = frontValue * depthValue;
    document.getElementById('propTotal').value = totalValue +".00" ;
}


function getInmobiliaria() {
    const InmobiliariaId = document.getElementById('inmoId').value;
    document.getElementById('inmobiliariaId').value = InmobiliariaId;
    document.cookie = "inmobiliaria=" + InmobiliariaId;
    //sessionStorage.setItem('inmobiliaria', InmobiliariaId);

 }

function getContactos() {
    const InmobiliariaId = document.getElementById('inmoId').value;
    //fetch
    const url = window.location.origin + "/api/v1/customersapi/"+ InmobiliariaId;

    const request = new Request(url, {
        method: 'GET',
        mode: 'cors',
        headers: { 'Content-Type': 'application/Json' }
    });
    fetch(request)
        .then((response) => {
            if (!response.ok) {
                throw new Error(`HTTP error, status= ${response.status}`);
            }
            return response.json();
        })
        .then((data) => {
            usingData(data)
        })
        .catch((error) => {
            console.log(error)
        });

    function usingData(contactosData) {

        //Variables
        const contactosSelect = document.getElementById('contactoId');
        try {
            if (!contactosData.hasOwnProperty("data")) {
                const contactos = contactosData;
                for (const contacto of contactos) {
                    let opt = document.createElement('option');
                    opt.value = contacto.contactoId;
                    opt.innerHTML = contacto.contactoName;
                    contactosSelect.appendChild(opt);
                }
            } else {
                throw new Error("Invalid data structure")
            }

        } catch (error) {
            console.log(error.message)
        }
    }

}
