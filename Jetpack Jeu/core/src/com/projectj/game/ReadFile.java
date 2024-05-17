package com.projectj.game;

import com.badlogic.gdx.Gdx;
import com.badlogic.gdx.files.FileHandle;
import com.badlogic.gdx.graphics.g2d.SpriteBatch;
import com.badlogic.gdx.math.Rectangle;
import com.badlogic.gdx.utils.Array;

public class ReadFile {
    FileHandle fileHandle;
    String fileContent;
    int xSpeed;
    SpriteBatch batch;
    Rectangle block;
    Array<Rectangle> blocks;

    public ReadFile(String nameFile){
        //On récupère le fichier txt
        this.fileHandle = Gdx.files.internal(nameFile);
        this.fileContent = this.fileHandle.readString();
        System.out.println(fileContent);
        int nbCol =0;
        int x = 0;
        int y = 0;
        this.blocks = new Array<Rectangle>();
        System.out.println("TEST:");
        for(int i=0; i<this.fileContent.length(); i++){
            if(this.fileContent.charAt(i) == '\n'){
                //créé un retangle d'obstacle
                nbCol = i;  
                break;
            }
        }
        for(int i=0; i<this.fileContent.length(); i++){
            x++;
            System.out.println(fileContent.charAt(i));
            if(this.fileContent.charAt(i) == '▒'){
                //créé un retangle d'obstacle
                this.block = new Rectangle();
                this.block.width = Gdx.graphics.getWidth()/nbCol;
                this.block.height = Gdx.graphics.getHeight()/36;
                this.block.x = (x * block.width);
                this.block.y = Gdx.graphics.getHeight() - (y*20);
                this.blocks.add(block);
                System.out.println(block.x);
                System.out.println(block.y);
            }
            if(this.fileContent.charAt(i) == '\n'){
                //créé un retangle d'obstacle
                x = 0;
                y++;
            }
        }
    }
}
