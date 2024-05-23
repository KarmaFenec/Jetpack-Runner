package com.projectj.game.Obstacle;

import com.badlogic.gdx.graphics.Texture;
import com.badlogic.gdx.graphics.g2d.BitmapFont;
import com.badlogic.gdx.graphics.g2d.Sprite;
import com.badlogic.gdx.graphics.g2d.SpriteBatch;
import com.badlogic.gdx.math.Rectangle;
import com.projectj.game.ReadFile;

import java.io.File;

public class Obstacle {
    public ReadFile readFile;
    Texture las_rouge,base_rouge_haut,base_rouge_bas,las_jaune1,las_jaune2,base_jaune_g,base_jaune_d;

    BitmapFont font = new BitmapFont();

    public Obstacle(String Filenametxt){
        readFile = new ReadFile(Filenametxt);
        las_rouge = new Texture("lazer_rouge.png");
        base_rouge_haut = new Texture("base_rouge_haut.png");
        base_rouge_bas = new Texture("base_rouge_bas.png");
        las_jaune1 = new Texture("laser_jaune1.png");
        las_jaune2 = new Texture("laser_jaune2.png");
        base_jaune_g = new Texture("base_jaune_gauche.png");
        base_jaune_d = new Texture("base_jaune_droit.png");
    }

    public void Affichage(SpriteBatch batch){

        for(Rectangle b : readFile.laser_rouge){
            //boucle d'affichage des blocks
            batch.draw(las_rouge,b.x,b.y);

        }

        for(Rectangle d : readFile.laser_rouge_base_haut){
            //boucle d'affichage des blocks
            batch.draw(base_rouge_haut,d.x,d.y);

        }
        for(Rectangle t : readFile.laser_rouge_base_bas){
            //boucle d'affichage des blocks
            batch.draw(base_rouge_bas,t.x,t.y);
        }

        for(Rectangle p : readFile.laser_jaune){
            //boucle d'affichage des blocks
            if(p.x%3==0){
                batch.draw(las_jaune1,p.x,p.y);
            }
            else{
                batch.draw(las_jaune2,p.x,p.y);
            }
        }
        for(Rectangle o : readFile.laser_jaune_base_gauche){
            //boucle d'affichage des blocks
            batch.draw(base_jaune_g,o.x,o.y);
        }
        for(Rectangle l : readFile.laser_jaune_base_droit){
            //boucle d'affichage des blocks
            batch.draw(base_jaune_d,l.x,l.y);
        }
    }
}
