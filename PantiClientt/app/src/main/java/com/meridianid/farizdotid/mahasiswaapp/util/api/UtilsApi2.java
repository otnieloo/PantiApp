package com.meridianid.farizdotid.mahasiswaapp.util.api;


/**
 * Created by fariz ramadhan.
 * website : www.farizdotid.com
 * github : https://github.com/farizdotid
 */
public class UtilsApi2 {

    // 10.0.2.2 ini adalah localhost.
    public static final String BASE_URL_API2 = "http://192.168.43.189/service3/api/";

    // Mendeklarasikan Interface BaseApiService
    public static BaseApiService2 getAPIService2(){
        return RetrofitClient2.getClient2(BASE_URL_API2).create(BaseApiService2.class);
    }
}
