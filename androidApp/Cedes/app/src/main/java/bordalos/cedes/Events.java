package bordalos.cedes;

import java.util.concurrent.ExecutionException;

/**
 * Created by Neon on 30/09/2017.
 */

public class Events extends HttpGetRequest {

    private String myUrlBase = "http://430b1340.ngrok.io";
    //Some url endpoint that you may have
    public String getVehicleInfo() {

        String myUrlParams= "/api/vehicle-status/fields/batteryLevel,connection.connected,connection.since,doors.allClosed,doors.leftOpen,doors.locked,doors.rightOpen,doors.trunkOpen,engineOn,fuelLevel,geo.latitude,geo.longitude,ignitionOn,immobilizerEngaged,mileage,powerState,vin";
        String myUrl = myUrlBase+myUrlParams;
        //String to place our result in
        String result="";
        //Instantiate new instance of our class
        HttpGetRequest getRequest = new HttpGetRequest();
        //Perform the doInBackground method, passing in our url
        try {
            result = getRequest.execute(myUrl).get();

        } catch (InterruptedException e) {
            e.printStackTrace();
        } catch (ExecutionException e) {
            e.printStackTrace();
        }
        return result;
    }

    public String lastVehiclePosition()
    {
        String myUrlParams= "/api/vehicle/last-location";
        String myUrl = myUrlBase+myUrlParams;
        //String to place our result in
        String result="";
        //Instantiate new instance of our class
        HttpGetRequest getRequest = new HttpGetRequest();
        //Perform the doInBackground method, passing in our url
        try {
            result = getRequest.execute(myUrl).get();

        } catch (InterruptedException e) {
            e.printStackTrace();
        } catch (ExecutionException e) {
            e.printStackTrace();
        }
        return result;
    }

    public String vehicleStolen()
    {
        String myUrlParams= "/api/vehicle/stolen";
        String myUrl = myUrlBase+myUrlParams;
        //String to place our result in
        String result="";
        //Instantiate new instance of our class
        HttpGetRequest getRequest = new HttpGetRequest();
        //Perform the doInBackground method, passing in our url
        try {
            result = getRequest.execute(myUrl).get();

        } catch (InterruptedException e) {
            e.printStackTrace();
        } catch (ExecutionException e) {
            e.printStackTrace();
        }
        return result;
    }
}
