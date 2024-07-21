import './bootstrap';

//? import scss:
import '~resources/scss/app.scss';

//? import boostrap:
import * as bootstrap from 'bootstrap';

//? import per le immagini:
import.meta.glob(['../img/**']);



//* MODALE:
const deleteBtn = document.querySelector('.destroy');
const deleteBtns = document.querySelectorAll('.destroy');
const closeBtn = document.querySelector('.modale__exit');
const modale = document.querySelector('.delete__modale');
const overLay = document.querySelector('.screen');

console.log(deleteBtn);

//? per show page:
if (deleteBtn) {

    deleteBtn.addEventListener('click', function () {
        modale.classList.remove('holding');
        document.body.classList.add('no-scroll');
        overLay.classList.remove('screen');
    
    });

}

//? per index page:
deleteBtns.forEach(Button => {
    Button.addEventListener('click', function(e){
        e.preventDefault();
      
        const buttonSlug = Button.getAttribute('data-slug');
        console.log(`Deleting project with Slug: ${buttonSlug}`);

        const modaleDelete = document.getElementById(`modale-${buttonSlug}`);

        if (modaleDelete) {
            modale.classList.remove('holding');
            document.body.classList.add('no-scroll');
            overLay.classList.remove('screen');

            window.scrollTo(0, 0);

        };

    });

});

//? per show e index page:
closeBtn.addEventListener('click', function(){
    console.log('ho cliccato il bottone');
    modale.classList.add('holding');
    document.body.classList.remove('no-scroll');
    overLay.classList.add('screen');

});

