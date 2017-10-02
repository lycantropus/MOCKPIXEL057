package bordalos.cedes;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.ListView;
import android.widget.RelativeLayout;
import android.widget.TextView;

public class TheftTraking extends AppCompatActivity {
    private ListView listview= null;
    private RelativeLayout theftLayout= null;

    private Location lastLocation=null;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_theft_traking);
        Events event = new Events();
        lastLocation = new Location(event.lastVehiclePosition());

        listview = (ListView) findViewById(R.id.listview);
        listview.setAdapter(new AdapterList(this, new String[] {lastLocation.getAddress(),
                lastLocation.getTimestamp() }));

        final Button refreshBtn = (Button) findViewById(R.id.refreshBtn2);
        refreshBtn.setOnClickListener(new View.OnClickListener() {
            public void onClick(View v) {

                Events event = new Events();
                lastLocation = new Location(event.lastVehiclePosition());
                //ERRO NO null DA LINHA A BAIXO!!!!
                listview.setAdapter(new AdapterList(null, new String[] {lastLocation.getAddress(),
                       lastLocation.getTimestamp() }));

            }
        });
    }
}

