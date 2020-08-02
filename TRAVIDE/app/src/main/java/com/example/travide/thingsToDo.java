package com.example.travide;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.net.Uri;
import android.os.Bundle;
import android.view.View;
import android.webkit.WebView;
import android.webkit.WebViewClient;
import android.widget.NumberPicker;

public class thingsToDo extends AppCompatActivity {
    NumberPicker possibilities;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_things_to_do);
        possibilities=(NumberPicker) findViewById(R.id.numberPicker);
        String[] posStrings={ "Art & Culture", "Outdoors","History", "Museums", "Amusement Parks", "Kid-Friendly","Local Favourites"};
        possibilities.setDisplayedValues(posStrings);
        possibilities.setMinValue(0);
        possibilities.setMaxValue(posStrings.length-1);
    }
    public void navigate(View v)
    {
        int choice=possibilities.getValue();
        if(choice==0) {
            Intent browserIntent=new Intent(Intent.ACTION_VIEW, Uri.parse("https://www.google.com/travel/things-to-do/see-all?g2lb=2502548%2C4258168%2C4260007%2C4270442%2C4274032%2C4291318%2C4305595%2C4306835%2C4308216%2C4308226%2C4309598%2C4317915%2C4328159%2C4329288%2C4333265%2C4357967%2C4366684%2C4366858%2C4367954%2C4369397%2C4373085%2C4373848%2C4270859%2C4284970%2C4291517%2C4316256%2C4356899&hl=en&gl=in&un=1&otf=1&dest_mid=%2Fm%2F09c17&dest_state_type=sattd&dest_src=ts&tcfs=EgoKCC9tLzA5YzE3&sa=X&rf=ChwKGAoHL20vMGpqdxINQXJ0ICYgQ3VsdHVyZRAB#ttdm=12.832605_77.614196_10&ttdmf=%252Fg%252F11bx5p_6hv"));
            startActivity(browserIntent);
        }
        else if(choice==1) {
            Intent browserIntent=new Intent(Intent.ACTION_VIEW, Uri.parse("https://www.google.com/travel/things-to-do/see-all?g2lb=2502548%2C4258168%2C4260007%2C4270442%2C4274032%2C4291318%2C4305595%2C4306835%2C4308216%2C4308226%2C4309598%2C4317915%2C4328159%2C4329288%2C4333265%2C4357967%2C4366684%2C4366858%2C4367954%2C4369397%2C4373085%2C4373848%2C4270859%2C4284970%2C4291517%2C4316256%2C4356899&hl=en&gl=in&un=1&otf=1&dest_mid=%2Fm%2F09c17&dest_state_type=sattd&dest_src=ts&tcfs=EgoKCC9tLzA5YzE3&sa=X&rf=ChoKFgoKL20vMDViMG43axIIT3V0ZG9vcnMQAQ#ttdm=12.885943_77.584294_10&ttdmf=%25252Fm%25252F0r4khly"));
            startActivity(browserIntent);
        }
        else if(choice==2) {
            Intent browserIntent=new Intent(Intent.ACTION_VIEW, Uri.parse("https://www.google.com/travel/things-to-do/see-all?g2lb=2502548%2C4258168%2C4260007%2C4270442%2C4274032%2C4291318%2C4305595%2C4306835%2C4308216%2C4308226%2C4309598%2C4317915%2C4328159%2C4329288%2C4333265%2C4357967%2C4366684%2C4366858%2C4367954%2C4369397%2C4373085%2C4373848%2C4270859%2C4284970%2C4291517%2C4316256%2C4356899&hl=en&gl=in&un=1&otf=1&dest_mid=%2Fm%2F09c17&dest_state_type=sattd&dest_src=ts&tcfs=EgoKCC9tLzA5YzE3&sa=X&rf=ChcKEwoIL20vMDNnM3cSB0hpc3RvcnkQAQ#ttdm=12.965381_77.587704_12&ttdmf=%252Fm%252F02x4gj1"));
            startActivity(browserIntent);
        }
        else if(choice==3) {
            Intent browserIntent=new Intent(Intent.ACTION_VIEW, Uri.parse("https://www.google.com/travel/things-to-do/see-all?g2lb=2502548%2C4258168%2C4260007%2C4270442%2C4274032%2C4291318%2C4305595%2C4306835%2C4308216%2C4308226%2C4309598%2C4317915%2C4328159%2C4329288%2C4333265%2C4357967%2C4366684%2C4366858%2C4367954%2C4369397%2C4373085%2C4373848%2C4270859%2C4284970%2C4291517%2C4316256%2C4356899&hl=en&gl=in&un=1&otf=1&dest_mid=%2Fm%2F09c17&dest_state_type=sattd&dest_src=ts&tcfs=EgoKCC9tLzA5YzE3&sa=X&rf=ChcKEwoIL20vMDljbXESB011c2V1bXMQAQ#ttdm=12.842925_77.632392_10&ttdmf=%25252Fm%25252F02x4gj1"));
            startActivity(browserIntent);
        }
        else if(choice==4) {
            Intent browserIntent=new Intent(Intent.ACTION_VIEW, Uri.parse("https://www.google.com/travel/things-to-do/see-all?g2lb=2502548%2C4258168%2C4260007%2C4270442%2C4274032%2C4291318%2C4305595%2C4306835%2C4308216%2C4308226%2C4309598%2C4317915%2C4328159%2C4329288%2C4333265%2C4357967%2C4366684%2C4366858%2C4367954%2C4369397%2C4373085%2C4373848%2C4270859%2C4284970%2C4291517%2C4316256%2C4356899&hl=en&gl=in&un=1&otf=1&dest_mid=%2Fm%2F09c17&dest_state_type=sattd&dest_src=ts&tcfs=EgoKCC9tLzA5YzE3&sa=X&rf=CiAKHAoJL20vMDEwampyEg9BbXVzZW1lbnQgUGFya3MQAQ#ttdm=12.872076_77.510657_10&ttdmf=%2525252Fm%2525252F02x4gj1"));
            startActivity(browserIntent);
        }
        else if(choice==5) {
            Intent browserIntent=new Intent(Intent.ACTION_VIEW, Uri.parse("https://www.google.com/travel/things-to-do/see-all?g2lb=2502548%2C4258168%2C4260007%2C4270442%2C4274032%2C4291318%2C4305595%2C4306835%2C4308216%2C4308226%2C4309598%2C4317915%2C4328159%2C4329288%2C4333265%2C4357967%2C4366684%2C4366858%2C4367954%2C4369397%2C4373085%2C4373848%2C4270859%2C4284970%2C4291517%2C4316256%2C4356899&hl=en&gl=in&un=1&otf=1&dest_mid=%2Fm%2F09c17&dest_state_type=sattd&dest_src=ts&tcfs=EgoKCC9tLzA5YzE3&sa=X&rf=CiEKHQoNL2cvMTFjNzFodmZ0MBIMS2lkLWZyaWVuZGx5EAE#ttdm=12.960459_77.594704_12&ttdmf=%25252Fg%25252F1w15xwpd"));
            startActivity(browserIntent);
        }
            else if(choice==6)
        {
            Intent browserIntent=new Intent(Intent.ACTION_VIEW, Uri.parse("https://www.google.com/travel/things-to-do/see-all?g2lb=2502548%2C4258168%2C4260007%2C4270442%2C4274032%2C4291318%2C4305595%2C4306835%2C4308216%2C4308226%2C4309598%2C4317915%2C4328159%2C4329288%2C4333265%2C4357967%2C4366684%2C4366858%2C4367954%2C4369397%2C4373085%2C4373848%2C4270859%2C4284970%2C4291517%2C4316256%2C4356899&hl=en&gl=in&un=1&otf=1&dest_mid=%2Fm%2F09c17&dest_state_type=sattd&dest_src=ts&tcfs=EgoKCC9tLzA5YzE3&sa=X&rf=CiQKIAoNL2cvMTFmc215OGJnZBIPTG9jYWwgZmF2b3JpdGVzEAE#ttdm=13.028235_77.584049_10&ttdmf=%25252Fm%25252F0bm7d5"));
            startActivity(browserIntent);
    }
    }
}
