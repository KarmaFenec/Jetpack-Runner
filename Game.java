package com.gdx.projectj;


import java.util.ArrayList;

import com.badlogic.gdx.ApplicationAdapter;
import com.badlogic.gdx.Gdx;
import com.badlogic.gdx.Input;
import com.badlogic.gdx.files.FileHandle;
import com.badlogic.gdx.graphics.GL20;
import com.badlogic.gdx.graphics.g2d.SpriteBatch;
import com.badlogic.gdx.graphics.glutils.ShapeRenderer;
import com.badlogic.gdx.math.Rectangle;
import com.badlogic.gdx.utils.Array;

public class Game extends ApplicationAdapter {
    ShapeRenderer shape;
    Character c;
    Mob m;
    ArrayList<Rocket> rockets = new ArrayList<>();
    int msize=25;
    FileHandle fileHandle;
    String fileContent;
    SpriteBatch batch;
    Rectangle block;
    Array<Rectangle> blocks;

    @Override
    public void create() {
        shape = new ShapeRenderer();
        c = new Character(100, 20, 20);
        m = new Mob((Gdx.graphics.getWidth()-(msize*2)), (Gdx.graphics.getHeight()/2), msize, (msize*2), 2, 2);
        //on a récuperer le fichier txt
        fileHandle = Gdx.files.internal("../assets/text_art (1).txt");
        fileContent = fileHandle.readString();
        //System.out.println(fileContent);
        int nbCol =0;
        int x = 0;
        int y = 0;
        batch = new SpriteBatch();
        blocks = new Array<Rectangle>();
        System.out.println("TEST:");
        for(int i=0; i<fileContent.length(); i++){
            if(fileContent.charAt(i) == '\n'){
                //créé un retangle d'obstacle
                nbCol = i;  
                break;
            }
        }
        for(int i=0; i<fileContent.length(); i++){
            x++;
            //System.out.println(fileContent.charAt(i));
            if(fileContent.charAt(i) == '▒'){
                //créé un retangle d'obstacle
                block = new Rectangle();
                block.width = Gdx.graphics.getWidth()/nbCol;
                block.height = Gdx.graphics.getHeight()/36;
                block.x = (Gdx.graphics.getWidth() - x) + block.width;
                block.y = y *20;
                blocks.add(block);
                System.out.println(block.x);
                System.out.println(block.y);
                System.out.println("X");
            }
            if(fileContent.charAt(i) == '\n'){
                //créé un retangle d'obstacle
                x = 0;
                y++;
            }
        }
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
        for(Rectangle b : blocks){
            //boucle d'affichage des blocks
            shape.rect(b.x, b.y, b.width, b.height);
		}
        shape.end();
    }
}