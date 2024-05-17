package com.gdx.projectj;


import java.util.ArrayList;

import com.badlogic.gdx.ApplicationAdapter;
import com.badlogic.gdx.Gdx;
import com.badlogic.gdx.Input;
import com.badlogic.gdx.graphics.GL20;
import com.badlogic.gdx.graphics.glutils.ShapeRenderer;
import com.badlogic.gdx.math.Rectangle;

public class Game extends ApplicationAdapter {
    ShapeRenderer shape;
    Character c;
    Mob m;
    ArrayList<Rocket> rockets = new ArrayList<>();
    int msize=25;
    String link = "../assets/text_art (1).txt";
    ReadFile RF;

    @Override
    public void create() {
        shape = new ShapeRenderer();
        c = new Character(100, 20, 20);
        m = new Mob((Gdx.graphics.getWidth()-(msize*2)), (Gdx.graphics.getHeight()/2), msize, (msize*2), 2, 2);
        //on a récuperer le fichier txt
        RF = new ReadFile(link);
    }

    @Override
    public void render() {

        Gdx.gl.glClear(GL20.GL_COLOR_BUFFER_BIT);
        c.update();
        m.update();
        c.checkCollisionMob(m);
        shape.begin(ShapeRenderer.ShapeType.Filled);
        if(!c.destroyed){
            c.draw(shape);
        }
        if(!m.destroyed){
            m.draw(shape);
        }
        if(Gdx.input.isKeyJustPressed(Input.Keys.ENTER)){
            //On créé un tir si le joeur appuie sur Entrée
            rockets.add(new Rocket(c.x, c.y, 2, 10));
        }
        for(Rocket r: rockets){
            r.update();
			r.draw(shape);
        }
        for(int i = 0;i < rockets.size(); i++){
            //boucle d'affichage des tirs
            Rocket r = rockets.get(i);
            r.checkCollision(m);
            if(r.destroyed){
                rockets.remove(r);
                i--;
            }
		}
        for(Rectangle b : RF.blocks){
            //boucle d'affichage des blocks
            shape.rect(b.x, b.y, b.width, b.height);
		}
        shape.end();
    }
}