package com.example.travide;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.net.Uri;
import android.os.Bundle;
import android.view.View;

import java.net.URI;

public class bangplaces extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_bangplaces);
    }
    public void openWeb1(View view){
        Intent browserIntent=new Intent(Intent.ACTION_VIEW, Uri.parse("https://www.bing.com/maps?osid=6fb5a289-0263-46c7-9434-83af5a984cdd&cp=13.426348~69.956605&lvl=6&v=2&sV=2&form=S00027"));
    startActivity(browserIntent);
    }
    public void openWeb2(View view){
        Intent browserIntent=new Intent(Intent.ACTION_VIEW, Uri.parse("https://www.bing.com/maps?osid=a945d15e-643e-460e-9e6f-11becd67d1af&cp=13.377904~69.954502&lvl=6&v=2&sV=2&form=S00027"));
        startActivity(browserIntent);
    }
    public void openWeb3(View view){
        Intent browserIntent=new Intent(Intent.ACTION_VIEW, Uri.parse("https://www.bing.com/maps?osid=790d61c2-7592-409e-9f2e-a369f9e34292&cp=13.407453~69.955102&lvl=6&v=2&sV=2&form=S00027"));
        startActivity(browserIntent);
    }
    public void openWeb4(View view){
        Intent browserIntent=new Intent(Intent.ACTION_VIEW, Uri.parse("https://www.bing.com/maps?osid=6bc0775a-cdd9-4e67-a25b-ff0178c8c3b5&cp=13.14853~69.952187&lvl=6&v=2&sV=2&form=S00027"));
        startActivity(browserIntent);
    }
    public void openWeb5(View view){
        Intent browserIntent=new Intent(Intent.ACTION_VIEW, Uri.parse("https://www.bing.com/maps?osid=e1611daf-6757-4e64-95ea-91cf85daaeb9&cp=13.390757~69.940458&lvl=6&v=2&sV=2&form=S00027"));
        startActivity(browserIntent);
    }
    public void openWeb6(View view){
        Intent browserIntent=new Intent(Intent.ACTION_VIEW, Uri.parse("https://www.bing.com/maps?osid=282ee5a4-54ed-4857-bc16-afa5d3ebd7e3&cp=13.397869~69.964502&lvl=6&v=2&sV=2&form=S00027"));
        startActivity(browserIntent);
    }
    public void openWeb7(View view){
        Intent browserIntent=new Intent(Intent.ACTION_VIEW, Uri.parse("https://www.bing.com/maps?osid=a94b7910-9a41-436f-8e1a-c9210843979a&cp=13.387382~69.938074&lvl=6&v=2&sV=2&form=S00027"));
        startActivity(browserIntent);
    }
    public void openWeb8(View view){
        Intent browserIntent=new Intent(Intent.ACTION_VIEW, Uri.parse("https://www.bing.com/maps?osid=a8289e37-c3b3-4503-9570-64cf6a7aae83&cp=13.23418~69.902487&lvl=6&v=2&sV=2&form=S00027"));
        startActivity(browserIntent);
    }



}
