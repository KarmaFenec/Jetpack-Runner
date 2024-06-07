<?php

class Logger
{

    public function generateLoginForm(string $action='/', string $username=null, $message=null): void{
        if (isset($response['error'])): ?>
        <div>
            <?php echo $message ?>
        </div>
        <?php endif; ?>
        <div id = "main_content" style = "justify-content: center; align-items: center; flex-direction: column">
            <!-- mettre le logo ici -->
            <div id = "visual">
                <img src="../images/logo-corp.png">
                <h4>Connectez vous pour profiter de l'édition de données</h4>
                <p><span class = "orange">Ajoutez</span>, <span class = "orange">modifiez</span> ou <span class = "orange">supprimez</span> des <span class = "white">films</span>, des <span class = "white">réalisateurs</span> et des <span class = "white">acteurs</span>!</p>
            </div>
    
            <!-- login box -->
            <form id = "loginBox" method="post" action="<?php $action ?>" class="box" id="login-form">
                <legend id="login-lgd">Connectez vous</legend>
                <div class="form-group">
                    <input type="text" name="username" placeholder="Nom d'utilisateur" value="<?php echo $username ?>" autofocus>
                    <input type="password" name="password" placeholder="Mot de passe">
                </div>
                <button type="submit" class="btn btn-dark" style = "margin-top: 10px">LOGIN</button>
            </form>
        </div>
    <?php
    }

    public function log(string $username, string $password) : array{

        // les data devraient être récupérées dans une base de données...
        $user = "usr" ;
        $pwd = "pwd" ;

        $error = null ;
        $nick = null ;
        $granted = false ;
        if (empty($username)){
            $error = "username is empty" ;
        }elseif (empty($password)){
            $error = "password is empty" ;
        }elseif ($user == $username and $pwd == $password){
            $granted = true ;
            $nick = htmlspecialchars("Toto") ; // devrait provenir d'un BD...
        }else{
            $error = "Authetication Failed" ;
        }
        return array(
            'granted' => $granted,
            'nick' => $nick,
            'error' => $error
        ) ;

    }

}