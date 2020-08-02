package com.example.travide;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.net.Uri;
import android.os.Bundle;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.ListView;
import android.widget.Toast;

public class Itineraries extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_itineraries);
        ListView itiList=(ListView) findViewById(R.id.listView);
        final ArrayAdapter<CharSequence> adapterIti=ArrayAdapter.createFromResource(this, R.array.iti, android.R.layout.simple_list_item_1);
        itiList.setAdapter(adapterIti);
        itiList.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            @Override
            public void onItemClick(AdapterView<?> parent, View view, int position, long id) {
                String message=getString(R.string.toastMessage)+ " " +adapterIti.getItem(position);
                Toast.makeText(getApplicationContext(),message,Toast.LENGTH_SHORT).show();
                if(position==0)
                {
                    Intent browserIntent=new Intent(Intent.ACTION_VIEW, Uri.parse("https://www.google.com/search?q=travel&safe=active&sa=X&tcfs=EgoKCC9tLzA5YzE3&output=search&dest_mid=/m/09c17&ibp=dst&fpstate=trfil&trifp=rtd%253Dcontained%2526t%253De#dest_mid=/m/09c17&fpstate=trfid&tcfs=EiQKCC9tLzA5YzE3GhgKCjIwMjAtMDUtMTASCjIwMjAtMDUtMTQ&trifp=di%3Ddd7877a6_bacf5b6f_7296502f_ac1a506c_8b0cee2d%26t%3Di"));
                    startActivity(browserIntent);
                }
                else if(position==1)
                {
                    Intent browserIntent=new Intent(Intent.ACTION_VIEW, Uri.parse("https://www.google.com/search?q=travel&safe=active&sa=X&tcfs=EgoKCC9tLzA5YzE3&output=search&dest_mid=/m/09c17&ibp=dst&fpstate=trfil&trifp=rtd%253Dcontained%2526t%253De#dest_mid=/m/09c17&fpstate=trfid&tcfs=EiQKCC9tLzA5YzE3GhgKCjIwMjAtMDUtMTASCjIwMjAtMDUtMTQ&trifp=di%3Dc0a94c79_dd5f6da5_a3e341dd_2e280074_3fd374fe%26t%3Di"));
                    startActivity(browserIntent);
                }
                else if(position==2)
                {
                    Intent browserIntent=new Intent(Intent.ACTION_VIEW, Uri.parse("https://www.google.com/search?q=travel&safe=active&sa=X&tcfs=EgoKCC9tLzA5YzE3&output=search&dest_mid=/m/09c17&ibp=dst&fpstate=trfil&trifp=rtd%253Dcontained%2526t%253De#dest_mid=/m/09c17&fpstate=trfid&tcfs=EiQKCC9tLzA5YzE3GhgKCjIwMjAtMDUtMTASCjIwMjAtMDUtMTQ&trifp=di%3D2d2ea5a0_abccca25_91b4a33f_a9a57c70_7bd0c875%26t%3Di"));
                    startActivity(browserIntent);
                }
                else if(position==3)
                {
                    Intent browserIntent=new Intent(Intent.ACTION_VIEW, Uri.parse("https://www.google.com/search?q=travel&safe=active&sa=X&tcfs=EgoKCC9tLzA5YzE3&output=search&dest_mid=/m/09c17&ibp=dst&fpstate=trfil&trifp=rtd%253Dcontained%2526t%253De#dest_mid=/m/09c17&fpstate=trfid&tcfs=EiQKCC9tLzA5YzE3GhgKCjIwMjAtMDUtMTASCjIwMjAtMDUtMTQ&trifp=di%3Da4dda094_6e8c4ff7_d9cbb1a6_8c28b439_d1ee8bf8%26t%3Di"));
                    startActivity(browserIntent);
                }


            }
        });
    }
}
