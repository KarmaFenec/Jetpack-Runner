<?php

class Logger
{

    public function generateLoginForm(string $action='/', string $username=null, $message=null): void{
        if (isset($response['error'])): ?>
        <div>
            <?php echo $message ?>
        </div>
        <?php endif; ?>
        <form method="post" action="<?php $action ?>" class="box" id="login-form">
            <legend id="login-lgd">Please Login</legend>
            <div class="form-group">
                <input type="text" name="username" placeholder="username" value="<?php echo $username ?>" autofocus>
                <input type="password" name="password" placeholder="password">
            </div>
            <button type="submit" class="btn btn-dark">LOGIN</button>
        </form>
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