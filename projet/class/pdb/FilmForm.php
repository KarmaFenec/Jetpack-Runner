<?php

class FilmForm
{
    public function genererFilmForm(){?>
        <style>
            label{
                color: #FFAA1D;
            }
        </style>
        <div id = "main_content" style = "align-items: center; flex-direction: column; justify-content:center">
            <h2 style = "color: #FFAA1D;" >Ajouter un film</h2>

            <form class = "row g-2 gy-5 justify-content-center"  method="POST" action="">
                <div class = "col-md-4">
                    <label for = "title" class = "form-label">Nom du film</label>
                    <input type = "text" class ="form-control" id = "title" name="name">
                </div>
                <div class="w-100"></div>
                
                <div class = "col-md-2">
                    <label for = "duration" class = "form-label">Durée</label>
                    <input type = "text" class = "form-control" id = "duration" name ="duree">
                </div>
                <div class = "col-md-2">
                    <label for = "genre" class = "form-label">Genre</label>
                    <input type = "text" class = "form-control" id = "genre" name='genre'>
                </div>
                <div class = "col-md-2">
                    <label for = "releaseDate" class = "form-label">Date de sortie</label>
                    <input type = "text" class = "form-control" id = "releaseDate" name="sortie">
                </div>

                <div class="w-100"></div>

                <div class = "col-md-3">
                    <label class = "form-label">Acteurs</label>
                    <div class = "input-group">
                        <span class = "input-group-text">Prénom Nom</span>
                        <input type = "text" aria-label = "Nom" class = "form-control" name ="prenom_act">
                        <input type = "text" aria-label = "Prénom" class = "form-control" name="nom_act">
                    </div>
                        
                    <button type = "button" id = "acteur" class = "btn btn-primary bt" >Nouvel acteur</button>
                </div>
                <div class = "col-md-3">
                    <label class = "form-label">Réalisateurs</label>
                    <div class = "input-group">
                        <span class = "input-group-text">Prénom Nom</span>
                        <input type = "text" aria-label = "Nom" class ="form-control" name="prenom_real">
                        <input type = "text" aria-label = "Prénom" class = "form-control" name="nom_real">
                    </div>
                        
                </div>

                <div class="w-100"></div>

                <div class ="col-md-2">
                    <label for = "formFile" class = "form-label">Affiche</label>
                    <input class = "form-control" type = "file" id = "formFile" name="affiche">
                </div>

                <div class="w-100"></div>

                <div class = "col-md-9">
                    <label for = "synopsis" class = "form-label">Synopsis</label>
                    <input class = "form-control" type = "text" id = "synopsis" name="synopsis">
                </div>
                <div class="w-100"></div>
                <div class = "col-md-1">
                    <button type = "submit" class = "btn btn-secondary" style = "color: black;">Confirmer</button>
                </div>
            </form>

        </div>
        <script>
                document.addEventListener('DOMContentLoaded', function (){
                // prévisualisation de l'image

                    // vérification du formulaire
                    let form = document.getElementById("image") ;
                    let name = document.getElementById("name") ;
                    form.addEventListener('submit', (ev => {
                        if (name.value == ""){
                            ev.preventDefault()
                            name.classList.add("error") ;
                        }
                    }))
                    name.addEventListener('keydown', (ev => {
                        name.classList.remove("error") ;
                    }))
                })
            </script>
        </div>
        <script src="../js/addFilm.js"></script>
        <?php
    }

    public function deletefilmForm(){?>
        <style>
            #main_content{
                color: #FFAA1D;
            }
        </style>
        <div id = "main_content" style = "flex-direction: column; justify-content: center; align-items: center;">
            <h2 id = "titre">Quel film voulez-vous supprimer:</h2>
            <form class="row g-2 gy-5 justify-content-center" method="post" enctype="multipart/form-data">
                <div class="col-md-4">
                    <label for="name" class="form-label">Nom du film</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class = "w-100"></div>
                <div class = "col-md-2">
                    <button type = "submit" class = "btn btn-danger">Supprimer</button>
                </div>
            </form>
        </div>
        <?php
    }
    public function editfilmForm(){?>
        <style>
            #main_content{
                color: #FFAA1D;
            }
        </style>
        <div id = "main_content" style = "flex-direction: column; justify-content: center; align-items: center;">
            <h2 id = "titre">Quel film voulez-vous editer:</h2>
            <form class="row g-2 gy-5 justify-content-center" method="post" enctype="multipart/form-data">
                <div class="col-md-4">
                    <label for="name" class="form-label">Id du film</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="col-md-4">
                    <label for="champ-bef" class="form-label">Quelle champ à remplacer?</label>
                    <input type="text" class="form-control" id="champ-bef" name="champ-bef">
                </div>
                <div class="col-md-4">
                    <label for="champ-after" class="form-label">Par</label>
                    <input type="text" class="form-control" id="champ-after" name="champ-after">
                </div>
                <div class = "w-100"></div>
                <div class = "col-md-2">
                    <button type = "submit" class = "btn btn-danger">Editer</button>
                </div>
            </form>
        </div>
    <?php
    }
}