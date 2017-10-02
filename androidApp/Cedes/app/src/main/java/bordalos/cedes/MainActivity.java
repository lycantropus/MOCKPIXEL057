package bordalos.cedes;

import bordalos.cedes.Events;

import android.content.Intent;
import android.os.TestLooperManager;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.LinearLayout;
import android.widget.RelativeLayout;
import android.widget.TextView;

import static android.provider.AlarmClock.EXTRA_MESSAGE;

public class MainActivity extends AppCompatActivity {

    private String word = "hello!";
    //private RelativeLayout mainLayout = null;

    private LinearLayout vinLinearLayout = null;
    private LinearLayout batteryLinearLayout = null;
    private LinearLayout powerLinearLayout = null;
    private LinearLayout mileageLinearLayout = null;
    private LinearLayout locationLinearLayout = null;
    private LinearLayout vehicleLinearLayout = null;
    private LinearLayout trackingLinearLayout = null;
    private LinearLayout immobilizerLinearLayout = null;
    private LinearLayout doorsLinearLayout = null;
    private LinearLayout doorslockLinearLayout = null;
    private LinearLayout engineLinearLayout = null;

    private TextView vinText = null;
    private TextView batteryText = null;
    private TextView powerText = null;
    private TextView mileageText = null;
    private TextView locationText = null;
    private TextView vehicleTypeText = null;
    private TextView trakingText = null;
    private TextView immobilizerText = null;
    private TextView doorsText = null;
    private TextView doorsLock = null;
    private TextView engineText = null;

    private Vehicle vehicle = null;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        Events event = new Events();
        vehicle = new Vehicle(event.getVehicleInfo());


         createAllLinearLayouts(vehicle);

        final Button refreshBtn = (Button) findViewById(R.id.refreshBtn);
        refreshBtn.setOnClickListener(new View.OnClickListener() {
            public void onClick(View v) {

                Events event = new Events();
                vehicle = new Vehicle(event.getVehicleInfo());
                createAllLinearLayouts(vehicle);


            }
        });
    }

    public void theftTrackingMenu(View view) {
        Events event = new Events();
        event.vehicleStolen();
        Intent intent = new Intent(this, TheftTraking.class);
        //String message = editText.getText().toString();
        //intent.putExtra(EXTRA_MESSAGE, message);
        startActivity(intent);
    }

    private void defineLayouts(){
        //mainLayout = (RelativeLayout) findViewById(R.id.mainLayout);
        vinLinearLayout = (LinearLayout) findViewById(R.id.vinLinearLayout);
        batteryLinearLayout = (LinearLayout) findViewById(R.id.batteryLinearLayout);
        powerLinearLayout = (LinearLayout) findViewById(R.id.powerLinearLayout);
        mileageLinearLayout = (LinearLayout) findViewById(R.id.mileageLinearLayout);
        locationLinearLayout = (LinearLayout) findViewById(R.id.locationLinearLayout);
        vehicleLinearLayout = (LinearLayout) findViewById(R.id.vehicleLinearLayout);
        trackingLinearLayout = (LinearLayout) findViewById(R.id.trackingLinearLayout);
        immobilizerLinearLayout = (LinearLayout) findViewById(R.id.immobilizerLinearLayout);
        doorsLinearLayout = (LinearLayout) findViewById(R.id.doorsLinearLayout);
        doorslockLinearLayout = (LinearLayout) findViewById(R.id.doorslockLinearLayout);
        engineLinearLayout = (LinearLayout) findViewById(R.id.engineLinearLayout);

    }

    private void textViewsLayouts(){
        vinText = (TextView) findViewById(R.id.textView14);
        batteryText = (TextView) findViewById(R.id.textView15);
        powerText = (TextView) findViewById(R.id.textView16);
        mileageText = (TextView) findViewById(R.id.textView17);
        locationText = (TextView) findViewById(R.id.textView18);
        vehicleTypeText = (TextView) findViewById(R.id.textView19);
        trakingText = (TextView) findViewById(R.id.textView20);
        immobilizerText = (TextView) findViewById(R.id.textView21);
        doorsText = (TextView) findViewById(R.id.textView22);
        doorsLock = (TextView) findViewById(R.id.textView23);
        engineText = (TextView) findViewById(R.id.textView25);
    }

    private void addToLayouts(){
        vinLinearLayout.addView(vinText);
        batteryLinearLayout.addView(batteryText);
        powerLinearLayout.addView(powerText);
        mileageLinearLayout.addView(mileageText);
        locationLinearLayout.addView(locationText);
        vehicleLinearLayout.addView(vehicleTypeText);
        trackingLinearLayout.addView(trakingText);
        immobilizerLinearLayout.addView(immobilizerText);
        doorsLinearLayout.addView(doorsText);
        doorslockLinearLayout.addView(doorsLock);
        engineLinearLayout.addView(engineText);
    }

    private void updateInfoToTextView(Vehicle v){

        vinText.setText(v.getVin());
        batteryText.setText(Double.toString(v.getBatterylvl()));
        powerText.setText(v.getPowerState());
        mileageText.setText(Double.toString(v.getMileage()));
        locationText.setText(Double.toString(v.getLat())+","+Double.toString(v.getLon()));
        vehicleTypeText.setText("");
        trakingText.setText("");
        immobilizerText.setText(Boolean.toString(v.isImmobilizer()));
        doorsText.setText(Boolean.toString(v.isDoorsLocked()));
        doorsLock.setText(Boolean.toString(v.isDoorsLocked()));
        engineText.setText(Boolean.toString(v.isEngine()));
    }

    private void cleanAllTextViewsBeforeUpdating(){
        vinLinearLayout.removeView(vinText);
        batteryLinearLayout.removeView(batteryText);
        powerLinearLayout.removeView(powerText);
        mileageLinearLayout.removeView(mileageText);
        locationLinearLayout.removeView(locationText);
        vehicleLinearLayout.removeView(vehicleTypeText);
        trackingLinearLayout.removeView(trakingText);
        immobilizerLinearLayout.removeView(immobilizerText);
        doorsLinearLayout.removeView(doorsText);
        doorslockLinearLayout.removeView(doorsLock);
        engineLinearLayout.removeView(engineText);
    }

    public void createAllLinearLayouts(Vehicle v){

        defineLayouts();

        textViewsLayouts();

        cleanAllTextViewsBeforeUpdating();

        updateInfoToTextView(v);

        addToLayouts();

    }

}
