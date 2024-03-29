document.onload = getSuccess();

function getSuccess() {

    setTimeout(function () {
        var success = document.getElementById('success');
        if (success !== null) {
            success.style.display = "none";
        } }, 5000)
}


// add buttons for properties images

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


