<?php

class FilmForm
{
    public function genererFilmForm(){?>
        <div id = "main_content" style = "align-items: center; flex-direction: column; justify-content:center">
            <h2 style = "color: #FFAA1D">Ajouter un film</h2>
            <form class="row g-2 gy-5 justify-content-center" method="post" enctype="multipart/form-data">
            <div class="col-md-4">
                <label for="name" class="form-label">Nom du film</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="w-100"></div>
            <div class="col-md-2">
                <label for="duree" class="form-label">Durée</label>
                <input type="text" class="form-control" id="duree" name="duree">
            </div>
            <div class="col-md-2">
                <label for="genre" class="form-label">Genre</label>
                <input type="text" class="form-control" id="genre" name="genre">
            </div>
            <div class="col-md-2">
                <label for="anSortie" class="form-label">Date de sortie</label>
                <input type="text" class="form-control" id="anSortie" name="anSortie">
            </div>
            <div class="w-100"></div>
            <div class="col-md-3">
                <label class="form-label">Acteurs</label>
                <div class="input-group">
                    <span class="input-group-text">Nom Prénom</span>
                    <input type="text" aria-label="Nom" class="form-control" name="acts">
                    <input type="text" aria-label="Prénom" class="form-control" name="acts_prenom">
                </div>
                <button>Nouvel acteur</button>
            </div>
            <div class="col-md-3">
                <label class="form-label">Réalisateurs</label>
                <div class="input-group">
                    <span class="input-group-text">Nom Prénom</span>
                    <input type="text" aria-label="Nom" class="form-control" name="reals">
                    <input type="text" aria-label="Prénom" class="form-control" name="reals_prenom">
                </div>
                <button>Nouveau réalisateur</button>
            </div>
            <div class="w-100"></div>
            <div class="col-md-2">
                <label for="image" class="form-label" style="width: 100%">Affiche
                    <div id="preview-container">
                        <img id="preview-image" src="" style="max-height:400;">
                    </div>
                </label>
                <input type="file" class="form-control" id="image" name="image" accept="image/png, image/gif, image/jpeg">
            </div>
            <div class="w-100"></div>
            <div class="col-md-9">
                <label for="description" class="form-label">Synopsis</label>
                <input class="form-control" type="text" id="description" name="description">
            </div>
            <div style="display: flex">
                <button type="submit" class="btn neon">Submit</button>
                <div style="width: 30px"></div>
                <button type="reset" class="btn neon">Reset</button>
            </div>
        </form>
            <script>
                document.addEventListener('DOMContentLoaded', function (){
                // prévisualisation de l'image
                const preview = document.getElementById("preview-image") ;

                const reader = new FileReader() ;
                reader.onload = (e)=>{
                    preview.src = reader.result ;
                }

                const fileInput = document.getElementById("image") ;
                fileInput.addEventListener('change', ()=>{
                    let file = fileInput.files[0] ;

                    if(file && file.type.split('/')[0] === "image"){
                        reader.readAsDataURL(fileInput.files[0])
                    }else{
                        preview.src = "" ;
                    }

                })

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

            <script src = "../../javascript/addFilm.js"></script>
        </div>

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
        <?php
    }
}
