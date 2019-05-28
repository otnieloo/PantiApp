package com.meridianid.farizdotid.mahasiswaapp.util.api;

import com.meridianid.farizdotid.mahasiswaapp.model.ResponseDosen;
import com.meridianid.farizdotid.mahasiswaapp.model.ResponseDosenDetail;
import com.meridianid.farizdotid.mahasiswaapp.model.ResponseMatkul;

import okhttp3.ResponseBody;
import retrofit2.Call;
import retrofit2.http.DELETE;
import retrofit2.http.Field;
import retrofit2.http.FormUrlEncoded;
import retrofit2.http.GET;
import retrofit2.http.POST;
import retrofit2.http.PUT;
import retrofit2.http.Path;
import retrofit2.http.Query;

/**
 * Created by fariz ramadhan.
 * website : www.farizdotid.com
 * github : https://github.com/farizdotid
 */
public interface BaseApiService2 {

    // Fungsi ini untuk memanggil API http://10.0.2.2/mahasiswa/login.php

    @GET("donasi")
    Call<ResponseBody> getDonasiRequest(@Query("email") String email);

    @GET("info")
    Call<ResponseBody> getInfo(@Query("email") String email);

    // Fungsi ini untuk memanggil API http://10.0.2.2/mahasiswa/register.php
    @FormUrlEncoded
    @POST("akun")
    Call<ResponseBody> registerRequest(@Field("email") String email,
                                       @Field("password") String password);

    @FormUrlEncoded
    @POST("info")
    Call<ResponseBody> registerRequest2(@Field("email") String email,
                                        @Field("nama") String nama,
                                        @Field("alamat") String alamat,
                                        @Field("jenis") String jenis,
                                        @Field("penghuni") String penghuni,
                                        @Field("deskripsi") String deskripsi
    );

    @FormUrlEncoded
    @PUT("info")
    Call<ResponseBody> putRequest(@Field("email") String email,
                                  @Field("nama") String nama,
                                  @Field("alamat") String alamat,
                                  @Field("jenis") String jenis,
                                  @Field("penghuni") String penghuni,
                                  @Field("deskripsi") String deskripsi
    );

    @GET("donasi")
    Call<ResponseDosen> getSemuaDosen(@Query("panti") String panti);

    @GET("dosen/{namadosen}")
    Call<ResponseDosenDetail> getDetailDosen(@Path("namadosen") String namadosen);

    @GET("matkul")
    Call<ResponseMatkul> getSemuaMatkul();

    @FormUrlEncoded
    @POST("matkul")
    Call<ResponseBody> simpanMatkulRequest(@Field("nama_dosen") String namadosen,
                                           @Field("matkul") String namamatkul);

    @DELETE("matkul/{idmatkul}")
    Call<ResponseBody> deteleMatkul(@Path("idmatkul") String idmatkul);
}
