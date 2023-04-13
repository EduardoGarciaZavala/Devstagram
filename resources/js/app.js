import Dropzone from 'dropzone';

Dropzone.autoDiscover = false;

const dropzone = new Dropzone('#dropzone', {
    dictDefaultMessage: "Sube aqui tu Imagen",
    acceptedFiles: '.pgn, .jpg, jpeg, .gif',
    addRemoveLinks: true,
    dictRemoveFile: "Borrar Archivo",
    maxFiles: 1,
    uploadMultiple: false,
    init: function()
    {
        if(document.getElementById('imagen').value.trim())
        {
            const imagenPublicado = {};
            imagenPublicado.size = 1234;
            imagenPublicado.name = document.getElementById('imagen').value;

            this.options.addedfile.call(this, imagenPublicado);
            this.options.thumbnail.call(this, imagenPublicado, `/uploads/${imagenPublicado.name}`);  

            imagenPublicado.previewElement.classList.add('dz-success', 'dz-complete')
        }
    }
})

dropzone.on('success',  function(file, response){
    const imagen = document.getElementById('imagen');
    imagen.value = response.imagen;
})

dropzone.on('removedfile', function(){
    const imagen = document.getElementById('imagen');
    imagen.value = "";
})