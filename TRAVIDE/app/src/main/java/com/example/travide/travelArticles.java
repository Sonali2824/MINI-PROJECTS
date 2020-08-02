package com.example.travide;

import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;
import android.webkit.WebView;
import android.webkit.WebViewClient;

public class travelArticles extends AppCompatActivity {
    WebView webView;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_travel_articles);
        webView=(WebView) findViewById(R.id.webView);
        webView.setWebViewClient(new WebViewClient());
        webView.loadUrl("https://www.google.com/travel/things-to-do/articles?g2lb=2502548%2C4258168%2C4260007%2C4270442%2C4274032%2C4291318%2C4305595%2C4306835%2C4308216%2C4308226%2C4309598%2C4317915%2C4328159%2C4329288%2C4333265%2C4357967%2C4366684%2C4366858%2C4367954%2C4369397%2C4373085%2C4373848%2C4270859%2C4284970%2C4291517%2C4316256%2C4356899&hl=en&gl=in&un=1&otf=1&dest_mid=%2Fm%2F09c17&dest_state_type=saa&dest_src=ts&tcfs=EgoKCC9tLzA5YzE3&sa=X#ttdm=12.832605_77.614196_10");
    }
}
