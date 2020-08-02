package com.example.travide;

import android.content.Intent;

import android.os.Bundle;
import android.view.View;
import android.widget.Button;

import androidx.appcompat.app.AppCompatActivity;

public class MainActivity extends AppCompatActivity {
    Button button,button2;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        button = (Button) findViewById(R.id.button4);
        button.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                openNewActivity();
            }
        });
        button = (Button) findViewById(R.id.button2);
        button.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                openNextActivity();
            }
        });
        button2 = (Button) findViewById(R.id.button3);
        button2.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                openThingsActivity();
            }
        });
        button2 = (Button) findViewById(R.id.button5);
        button2.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                openArticleActivity();
            }
        });
        button2 = (Button) findViewById(R.id.button6);
        button2.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                openFoodActivity();
            }
        });


    }
    public void openNewActivity(){
        Intent intent = new Intent(MainActivity.this, bangplaces.class);
        startActivity(intent);
    }
    public void openNextActivity(){
        Intent intent = new Intent(MainActivity.this, Itineraries.class);
        startActivity(intent);
    }
    public void openThingsActivity(){
        Intent intent = new Intent(MainActivity.this, thingsToDo.class);
        startActivity(intent);
    }
    public void openArticleActivity(){
        Intent intent = new Intent(MainActivity.this, travelArticles.class);
        startActivity(intent);
    }
    public void openFoodActivity(){
        Intent intent = new Intent(MainActivity.this, food.class);
        startActivity(intent);
    }

}


