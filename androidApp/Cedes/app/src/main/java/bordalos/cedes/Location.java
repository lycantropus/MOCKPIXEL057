package bordalos.cedes;

import org.json.JSONException;
import org.json.JSONObject;

/**
 * Created by Neon on 30/09/2017.
 */

public class Location {

    private String address;
    private String timestamp;


    public String getAddress() {
        return address;
    }

    public void setAddress(String address) {
        this.address = address;
    }

    public String getTimestamp() {
        return timestamp;
    }

    public void setTimestamp(String timestamp) {
        this.timestamp = timestamp;
    }

    public Location(String jsonResponse) {
        if (jsonResponse != null) {
            try {
                JSONObject location = new JSONObject(jsonResponse);


                address = location.getString("location_address");

                timestamp = location.getString("created_at");


            } catch (final JSONException e) {

            }


        }
    }
}
