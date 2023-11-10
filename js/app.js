"use strict";

const contenedores = document.querySelectorAll('.contenedor');

    contenedores.forEach((contenedor) => {
      const etiqueta = contenedor.querySelector('.etiqueta');
      const contenido = contenedor.querySelector('.contenido');

      etiqueta.addEventListener('click', () => {
        contenedor.classList.toggle('activa');
        if (contenedor.classList.contains('activa')) {
          contenido.style.height = 'auto';
        } else {
          contenido.style.height = '0';
        }
      });
    });