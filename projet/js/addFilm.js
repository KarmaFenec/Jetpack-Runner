document.addEventListener("DOMContentLoaded", function(){
    let boutons = document.getElementsByClassName("bt");
    let string = '<div class = "input-group"><span class = "input-group-text">Nom Prénom</span><input type = "text" aria-label = "Nom" class ="form-control"><input type = "text" aria-label = "Prénom" class = "form-control"></div>'

    for (let i = 0; i < 2; i++){
        let bouton = boutons[i];
        let b = bouton.parentElement;
        console.log('test2')
        bouton.addEventListener('click', function(){
            
            bouton.insertAdjacentHTML('beforebegin', string);
        });
    }
});