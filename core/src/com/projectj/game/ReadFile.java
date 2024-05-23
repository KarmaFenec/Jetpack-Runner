package com.projectj.game;

import com.badlogic.gdx.Gdx;
import com.badlogic.gdx.files.FileHandle;
import com.badlogic.gdx.graphics.g2d.SpriteBatch;
import com.badlogic.gdx.math.Rectangle;
import com.badlogic.gdx.utils.Array;

public class ReadFile {
    FileHandle fileHandle;
    String fileContent;


    Rectangle block;
    public Array<Rectangle> laser_rouge_base_haut=new Array<>();
    public Array<Rectangle> laser_rouge_base_bas=new Array<>();
    public Array<Rectangle> laser_rouge=new Array<>();

    public Array<Rectangle> laser_jaune=new Array<>();
    public Array<Rectangle> laser_jaune_base_gauche=new Array<>();
    public Array<Rectangle> laser_jaune_base_droit=new Array<>();

    public ReadFile(String nameFile){
        //On récupère le fichier txt
        this.fileHandle = Gdx.files.internal(nameFile);
        this.fileContent = this.fileHandle.readString();
        int nbCol=0 ;
        int MaxCol=-1;
        int x = 0;
        int y = 0;

        for(int i=0; i<this.fileContent.length(); i++){
            nbCol++;
            if((int)this.fileContent.charAt(i) == 10){
                if(nbCol>MaxCol){
                    MaxCol=nbCol;
                }
                nbCol=0;
            }
        }

        for(int i=0; i<this.fileContent.length(); i++){
            x++;

            if(this.fileContent.charAt(i) == 'A' ){//Base Haut du laser Rouge
                //créé un retangle d'obstacle
                this.block = new Rectangle();
                this.block.width = 31;
                this.block.height = 38 ;
                this.block.x = (x * Gdx.graphics.getWidth()/MaxCol)-2;
                this.block.y = Gdx.graphics.getHeight() - (y*20);
                this.block.x+=Gdx.graphics.getWidth();//pour mettre l'obstacle en dehors de la fenetre
                this.laser_rouge_base_haut.add(block);
            }
            if(this.fileContent.charAt(i) == 'C' ){//Base bas du laser Rouge
                //créé un retangle d'obstacle
                this.block = new Rectangle();
                this.block.width = 32;
                this.block.height = 35;
                this.block.x = (x * Gdx.graphics.getWidth()/MaxCol)-5;
                this.block.y = Gdx.graphics.getHeight() - (y*20);
                this.block.x+=Gdx.graphics.getWidth();//pour mettre l'obstacle en dehors de la fenetre
                this.laser_rouge_base_bas.add(block);
            }

            if(this.fileContent.charAt(i) == 'B' ){//laser Rouge
                //créé un retangle d'obstacle
                this.block = new Rectangle();
                this.block.width = 25;
                this.block.height = 46;
                this.block.x = (x * Gdx.graphics.getWidth()/MaxCol);
                this.block.y = Gdx.graphics.getHeight() - (y*20);
                this.block.x+=Gdx.graphics.getWidth();//pour mettre l'obstacle en dehors de la fenetre
                this.laser_rouge.add(block);
            }

            if(this.fileContent.charAt(i) == 'D' ){//laser jaune
                //créé un retangle d'obstacle
                this.block = new Rectangle();
                this.block.width = 22;
                this.block.height = 31;
                this.block.x = (x * Gdx.graphics.getWidth()/MaxCol);
                this.block.y = Gdx.graphics.getHeight() - (y*20);
                this.block.x+=Gdx.graphics.getWidth();//pour mettre l'obstacle en dehors de la fenetre
                this.laser_jaune.add(block);
            }

            if(this.fileContent.charAt(i) == 'E' ){//laser jaune base gauche
                //créé un retangle d'obstacle
                this.block = new Rectangle();
                this.block.width = 20;
                this.block.height = 20;
                this.block.x = (x * Gdx.graphics.getWidth()/MaxCol)+5;
                this.block.y = (Gdx.graphics.getHeight() - (y*20))+3;
                this.block.x+=Gdx.graphics.getWidth();//pour mettre l'obstacle en dehors de la fenetre
                this.laser_jaune_base_gauche.add(block);
            }

            if(this.fileContent.charAt(i) == 'F' ){//laser jaune base droit
                //créé un retangle d'obstacle
                this.block = new Rectangle();
                this.block.width = 20;
                this.block.height = 20;
                this.block.x = (x * Gdx.graphics.getWidth()/MaxCol);
                this.block.y = (Gdx.graphics.getHeight() - (y*20))+2;
                this.block.x+=Gdx.graphics.getWidth();//pour mettre l'obstacle en dehors de la fenetre
                this.laser_jaune_base_droit.add(block);
            }


            if((int)this.fileContent.charAt(i) == 10){
                x = 0;
                y++;
            }
        }
    }


}
