<?php

class FilmForm
{
    public function genererHumanForm(){?>
        <style>
            label{
                color: #FFAA1D;
            }
        </style>
        <div id = "main_content" style = "align-items: center; flex-direction: column; justify-content:center">
            <h2 style = "color: #FFAA1D;">Ajouter une personne</h2>

            <form class = "row g-2 gy-5 justify-content-center" method="POST" action="">
                <div class = "col-md-4">
                    <div class = "form-check">
                        <input class = "form-check-input" type = "radio" name = "inlineRadioOptions" id = "acteur" value = "acteur">
                        <label class = "form-check-label" for = "acteur">Acteur</label>
                    </div>
                    <div class = "form-check">
                        <input class = "form-check-input" type = "radio" name = "inlineRadioOptions" id = "réalisateur" value = "réalisateur">
                        <label class = "form-check-label" for = "réalisateur">Réalisateur</label>
                    </div>
                </div>
                <div class = "col-md-4">
                    <label for = "nom" class = "form-label">Nom</label>
                    <input type = "text" class = "form-control" id = "nom">
                </div>
                <div class ="col-md-4">
                    <label for = "prénom" class = "form-label">Prénom</label>
                    <input type = "text" class = "form-control" id = "prénom">
                </div>

                <div class="w-100"></div>

                <div class = "col-md-2">
                    <label for = "naissance" class = "form-label">Date de naissance</label>
                    <input type = "text" class = "form-control" id = "naissance">
                </div>
                <div class ="col-md-3">
                    <label for = "formFile" class = "form-label">Photo</label>
                    <input class = "form-control" type = "file" id = "formFile">
                </div>

                <div class = "w-100"></div>


                <div class = "col-md-7">
                    <label for = "bio" class = "form-label">Biographie</label>
                    <input class = "form-control" type = "text" id = "bio">
                </div>

                <div class = "w-100"></div>

                <div class = "col-md-1">
                    <button type = "submit" class = "btn btn-secondary">Confirmer</button>
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

    public function deleteHumanForm(){?>
        <style>
            #main_content{
                color: #FFAA1D;
            }
        </style>
        <div id = "main_content" style = "flex-direction: column; justify-content: center; align-items: center;">
            <h2 id = "titre">Quel personne voulez-vous retirer ?:</h2>
            <form class="row g-2 gy-5 justify-content-center" method="post" enctype="multipart/form-data">
                <div class="col-md-4">
                    <label for="name" class="form-label">Id de la personne</label>
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


    public function editHumanForm(){?>
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