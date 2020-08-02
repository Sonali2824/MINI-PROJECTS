package com.example.travide;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.net.Uri;
import android.os.Bundle;
import android.view.View;

public class food extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_food);
    }
    public void open1Web1(View view){
        Intent browserIntent=new Intent(Intent.ACTION_VIEW, Uri.parse("https://www.google.com/search?q=Best%20Mysore%20pak%20in%20Bangalore&nfpr=1&ved=0CAMQhZQEahcKEwiw5vvC9YLpAhUAAAAAHQAAAAAQEw&hl=en&gl=in&otf=1"));
        startActivity(browserIntent);
    }
    public void open1Web2(View view){
        Intent browserIntent=new Intent(Intent.ACTION_VIEW, Uri.parse("https://www.google.com/search?q=Best%20Idli%20in%20Bangalore&nfpr=1&ved=0CAMQhZQEahcKEwiw5vvC9YLpAhUAAAAAHQAAAAAQFA&hl=en&gl=in&otf=1"));
        startActivity(browserIntent);
    }
    public void open1Web3(View view){
        Intent browserIntent=new Intent(Intent.ACTION_VIEW, Uri.parse("https://www.google.com/search?q=Best%20Masala%20dosa%20in%20Bangalore&nfpr=1&ved=0CAMQhZQEahcKEwiw5vvC9YLpAhUAAAAAHQAAAAAQFQ&hl=en&gl=in&otf=1"));
        startActivity(browserIntent);
    }
    public void open1Web4(View view){
        Intent browserIntent=new Intent(Intent.ACTION_VIEW, Uri.parse("https://www.google.com/search?q=Best%20Pongal%20in%20Bangalore&nfpr=1&ved=0CAMQhZQEahcKEwiw5vvC9YLpAhUAAAAAHQAAAAAQFg&hl=en&gl=in&otf=1"));
        startActivity(browserIntent);
    }
    public void open1Web5(View view){
        Intent browserIntent=new Intent(Intent.ACTION_VIEW, Uri.parse("https://www.google.com/search?q=Best%20Akki%20rotti%20in%20Bangalore&nfpr=1&ved=0CAMQhZQEahcKEwiw5vvC9YLpAhUAAAAAHQAAAAAQFw&hl=en&gl=in&otf=1"));
        startActivity(browserIntent);
    }
    public void open1Web6(View view){
        Intent browserIntent=new Intent(Intent.ACTION_VIEW, Uri.parse("https://www.google.com/search?q=Best%20Sambar%20in%20Bangalore&nfpr=1&ved=0CAMQhZQEahcKEwiw5vvC9YLpAhUAAAAAHQAAAAAQGA&hl=en&gl=in&otf=1"));
        startActivity(browserIntent);
    }
    public void open1Web7(View view){
        Intent browserIntent=new Intent(Intent.ACTION_VIEW, Uri.parse("https://www.google.com/search?q=Best%20Vada%20in%20Bangalore&nfpr=1&ved=0CAMQhZQEahcKEwiw5vvC9YLpAhUAAAAAHQAAAAAQGQ&hl=en&gl=in&otf=1"));
        startActivity(browserIntent);
    }
    public void open1Web8(View view){
        Intent browserIntent=new Intent(Intent.ACTION_VIEW, Uri.parse("https://www.google.com/search?q=Best%20Bisi%20Bele%20Bath%20in%20Bangalore&nfpr=1&ved=0CAMQhZQEahcKEwiw5vvC9YLpAhUAAAAAHQAAAAAQGw&hl=en&gl=in&otf=1"));
        startActivity(browserIntent);
    }
    public void open1Web9(View view){
        Intent browserIntent=new Intent(Intent.ACTION_VIEW, Uri.parse("https://www.google.com/search?q=Best%20Rasam%20in%20Bangalore&nfpr=1&ved=0CAMQhZQEahcKEwiw5vvC9YLpAhUAAAAAHQAAAAAQHQ&hl=en&gl=in&otf=1"));
        startActivity(browserIntent);
    }
    public void open1Web10(View view){
        Intent browserIntent=new Intent(Intent.ACTION_VIEW, Uri.parse("https://www.google.com/search?q=Best%20Kesari%20bat%20in%20Bangalore&nfpr=1&ved=0CAMQhZQEahcKEwiw5vvC9YLpAhUAAAAAHQAAAAAQHA&hl=en&gl=in&otf=1"));
        startActivity(browserIntent);
    }
    public void open1Web11(View view){
        Intent browserIntent=new Intent(Intent.ACTION_VIEW, Uri.parse("https://www.google.com/search?q=Best%20Ragi%20mudde%20in%20Bangalore&nfpr=1&ved=0CAMQhZQEahcKEwiw5vvC9YLpAhUAAAAAHQAAAAAQHg&hl=en&gl=in&otf=1"));
        startActivity(browserIntent);
    }
    public void open1Web12(View view){
        Intent browserIntent=new Intent(Intent.ACTION_VIEW, Uri.parse("https://www.google.com/search?q=Best%20Pulihora%20in%20Bangalore&nfpr=1&ved=0CAMQhZQEahcKEwiw5vvC9YLpAhUAAAAAHQAAAAAQIA&hl=en&gl=in&otf=1"));
        startActivity(browserIntent);
    }
    public void open1Web13(View view){
        Intent browserIntent=new Intent(Intent.ACTION_VIEW, Uri.parse("https://www.google.com/search?q=Best%20Thali%20in%20Bangalore&nfpr=1&ved=0CAMQhZQEahcKEwiw5vvC9YLpAhUAAAAAHQAAAAAQIw&hl=en&gl=in&otf=1"));
        startActivity(browserIntent);
    }
    public void open1Web14(View view){
        Intent browserIntent=new Intent(Intent.ACTION_VIEW, Uri.parse("https://www.google.com/search?q=Best%20Kheer%20in%20Bangalore&nfpr=1&ved=0CAMQhZQEahcKEwiw5vvC9YLpAhUAAAAAHQAAAAAQIg&hl=en&gl=in&otf=1"));
        startActivity(browserIntent);
    }
    public void open1Web15(View view){
        Intent browserIntent=new Intent(Intent.ACTION_VIEW, Uri.parse("https://www.google.com/search?q=Best%20Feni%20in%20Bangalore&nfpr=1&ved=0CAMQhZQEahcKEwiw5vvC9YLpAhUAAAAAHQAAAAAQJA&hl=en&gl=in&otf=1"));
        startActivity(browserIntent);
    }
}
