document.addEventListener('DOMContentLoaded',()=>{   
    
    const botonMenu = document.querySelector('.mobile-menu');
    const navegacion = document.querySelector('.navegacion');

    botonMenu.addEventListener('click', (e) =>{
        navegacion.classList.toggle('mostrar');
    });
    
})