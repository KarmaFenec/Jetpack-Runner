package com.projectj.game.background;

import com.badlogic.gdx.math.Rectangle;
import com.projectj.game.utility.ReadFile;


public class ScrollingObstacle extends BackgroundScrolling{
    ReadFile rf;

    boolean fin=false;
    float speed;
    public static final float MAX_SPEED=80;
    public static final float ACCELERATION = 0.0001f;

    public ScrollingObstacle(String nom,ReadFile rf) {
        this.rf=rf;
    }

    public void update(){

        this.speed=getSpeed();
        for(Rectangle b : rf.getBlocks()){
            if(b.x>0){
                b.x-=speed;
            }
            else if(b.x<=0){
                rf.getBlocks().removeValue(b,true);
            }
        }
    }
}
