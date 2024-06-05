<?php

class AddingDB
{

    public function generateFormFilm(){ ?>
        <div class="title">NEW FILM</div>
        <form id="new-form" method="POST" enctype="multipart/form-data">
            <div>
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" aria-describedby="name">
            </div>
            <div>
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description"></textarea>
            </div>
            <div>
                <label for="image" class="form-label">Image
                    <div id="preview-container">
                        <img id="preview-image" style="max-width: 200; max-height: 300;" src="">
                    </div>
                </label>
                <input type="file" class="form-control" id="image" name="image" accept="image/png, image/jpeg">
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
                let form = document.getElementById("new-form") ;
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
    <?php
    }
}