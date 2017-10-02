package bordalos.cedes;

import android.util.Log;
import android.widget.Toast;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;

import static android.content.ContentValues.TAG;

/**
 * Created by Neon on 30/09/2017.
 */

public class Vehicle {
    private String vin;
    private double lat;
    private double lon;
    private double batterylvl;
    private boolean connection;
    private boolean doorsClosed;
    private boolean engine;
    private boolean immobilizer;
    private double fuellvl;
    private int mileage;
    private String powerState;
    private boolean doorsLocked;

    private boolean liveTracking;
    private String vehicleType;

    public String getVin() {
        return vin;
    }

    public void setVin(String vin) {
        this.vin = vin;
    }

    public double getLat() {
        return lat;
    }

    public void setLat(double lat) {
        this.lat = lat;
    }

    public double getLon() {
        return lon;
    }

    public void setLon(double lon) {
        this.lon = lon;
    }

    public double getBatterylvl() {
        return batterylvl;
    }

    public void setBatterylvl(double batterylvl) {
        this.batterylvl = batterylvl;
    }

    public boolean isConnection() {
        return connection;
    }

    public void setConnection(boolean connection) {
        this.connection = connection;
    }

    public boolean isEngine() {
        return engine;
    }

    public void setEngine(boolean engine) {
        this.engine = engine;
    }

    public boolean isImmobilizer() {
        return immobilizer;
    }

    public void setImmobilizer(boolean immobilizer) {
        this.immobilizer = immobilizer;
    }

    public double getFuellvl() {
        return fuellvl;
    }

    public void setFuellvl(double fuellvl) {
        this.fuellvl = fuellvl;
    }

    public int getMileage() {
        return mileage;
    }

    public void setMileage(int mileage) {
        this.mileage = mileage;
    }

    public String getPowerState() {
        return powerState;
    }

    public void setPowerState(String powerState) {
        this.powerState = powerState;
    }

    public boolean isDoorsClosed() {
        return doorsClosed;
    }

    public void setDoorsClosed(boolean doorsClosed) {
        this.doorsClosed = doorsClosed;
    }

    public boolean isDoorsLocked() {
        return doorsLocked;
    }

    public void setDoorsLocked(boolean doorsLocked) {
        this.doorsLocked = doorsLocked;
    }

    public Vehicle(String vin, double lat, double lon, double batterylvl, boolean engine, boolean immobilizer, int mileage, String powerState, boolean doorsLocked, boolean doorsClosed){
        this.vin=vin;
        this.lat=lat;
        this.lon=lon;
        this.batterylvl=batterylvl;
        this.engine=engine;
        this.immobilizer=immobilizer;
        this.mileage=mileage;
        this.powerState=powerState;
        this.doorsClosed=doorsClosed;
        this.doorsLocked=doorsLocked;
    }

    public Vehicle(String jsonResponse) {
        if (jsonResponse != null) {
            try {
                JSONObject vehicle = new JSONObject(jsonResponse);

                vin = vehicle.getString("vin");

                JSONObject v = vehicle.getJSONObject("geo");
                lat = v.getDouble("latitude");
                lon = v.getDouble("longitude");

                batterylvl = vehicle.getDouble("batteryLevel");

                JSONObject d = vehicle.getJSONObject("doors");
                doorsLocked = v.getBoolean("locked");
                doorsClosed = v.getBoolean("allClosed");

                engine = v.getBoolean("engineOn");
                immobilizer = v.getBoolean("immobilizerEngaged");
                //int fuelLevel = v.getInt("fuelLevel");
                mileage = v.getInt("mileage");
                powerState = v.getString("locked");


            } catch (final JSONException e) {

            }

        }
    }
    }
