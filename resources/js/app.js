document.addEventListener('DOMContentLoaded', function () {
    const interestLevelSelect = document.getElementById('interest_level_id');
    const courseSelect = document.getElementById('course_id');

    // Deshabilitar el select de cursos inicialmente
    courseSelect.disabled = true;

    interestLevelSelect.addEventListener('change', function () {
        const interestLevelId = this.value;

        if (interestLevelId) {
            // Habilitar el select de cursos cuando se selecciona un nivel de interés
            courseSelect.disabled = false;

            // Realizar la solicitud fetch para obtener los cursos
            fetch(`/courses/interest/${interestLevelId}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    // Limpiar y poblar el select de cursos
                    courseSelect.innerHTML = '<option value="" disabled selected>Selecciona</option>';
                    data.forEach(course => {
                        const option = document.createElement('option');
                        option.value = course.id;
                        option.textContent = `${course.prefix} ${course.course_name}`;
                        courseSelect.appendChild(option);
                    });
                })
                .catch(error => {
                    console.error('Error fetching courses:', error);
                });
        } else {
            // Si no hay nivel de interés seleccionado, deshabilitar el select de cursos
            courseSelect.innerHTML = '<option value="" disabled selected>Selecciona</option>';
            courseSelect.disabled = true;
        }
    });
});