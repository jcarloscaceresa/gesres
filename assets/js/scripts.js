// function validar
function validarFormulario() {
    var nombreInput = document.getElementById('nombre');
    var errorNombre = document.getElementById('errorNombre');
    var nombre = nombreInput.value;

    if (nombre === '') {
        errorNombre.innerHTML = 'El campo nombre es obligatorio';
        return false;
    } else if (!/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/.test(nombre)) {
        errorNombre.innerHTML = 'El nombre solo puede contener letras y espacios.';
        return false;
    }

    errorNombre.innerHTML = '';
    return true;
}

// function estrellas
document.addEventListener('DOMContentLoaded', function () {
    const stars = document.querySelectorAll('.estrella');

    stars.forEach(star => {
        star.addEventListener('click', function () {
            const value = parseInt(this.getAttribute('data-value'));
            updateStars(value);
        });
    });

    function updateStars(value) {
        stars.forEach(star => {
            const starValue = parseInt(star.getAttribute('data-value'));
            star.className = 'estrella'; // Reset class
            if (starValue <= value) {
                star.classList.add('selected', `selected-${value}`);
            }
        });
    }
});

const stars = document.querySelectorAll('.star');

stars.forEach(function(star, index) {
    star.addEventListener('click', function() {
        for (let i=0; i<=index; i++) {
            stars[i].classList.add('checked');
        }
        for (let i=index+1; i<stars.length; i++) {
            stars[i].classList.remove('checked');
        }
    })
})

// seleccionar estrellas a la izquierda y elegir reseña en base:
        const starCheckboxes = document.querySelectorAll('#stars input[type="checkbox"]');

        // Añadir un event listener a cada checkbox
        starCheckboxes.forEach(checkbox => {
            checkbox.addEventListener('change', () => {
                // Obtener el valor de la estrella seleccionada
                const selectedStars = document.querySelector('input[name="Estrellas"]:checked').value;

                // Actualizar la visualización de la calificación con las estrellas seleccionadas
                const calificacionContainer = document.getElementById('calificacion');
                calificacionContainer.innerHTML = '';

                // Agregar estrellas llenas según la cantidad seleccionada
                for (let i = 0; i < selectedStars; i++) {
                    calificacionContainer.innerHTML += '<i class="bi bi-star-fill star"></i>';
                }

                // Agregar estrellas vacías para completar hasta 5 estrellas
                for (let i = selectedStars; i < 5; i++) {
                    calificacionContainer.innerHTML += '<i class="bi bi-star star"></i>';
                }
            });
        });

