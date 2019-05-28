package com.meridianid.farizdotid.mahasiswaapp.activity;

import android.app.ProgressDialog;
import android.content.Context;
import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import com.meridianid.farizdotid.mahasiswaapp.R;
import com.meridianid.farizdotid.mahasiswaapp.util.SharedPrefManager;
import com.meridianid.farizdotid.mahasiswaapp.util.api.BaseApiService;
import com.meridianid.farizdotid.mahasiswaapp.util.api.UtilsApi;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.io.IOException;

import butterknife.BindView;
import butterknife.ButterKnife;
import okhttp3.ResponseBody;
import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class LoginActivity extends AppCompatActivity {

    @BindView(R.id.etEmail) EditText etEmail;
    @BindView(R.id.etPassword) EditText etPassword;
    @BindView(R.id.btnLogin) Button btnLogin;
    @BindView(R.id.btnRegister) Button btnRegister;
    ProgressDialog loading;

    Context mContext;
    BaseApiService mApiService;

    SharedPrefManager sharedPrefManager;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);
        getSupportActionBar().hide();

        ButterKnife.bind(this);
        mContext = this;
        mApiService = UtilsApi.getAPIService(); // meng-init yang ada di package apihelper
        sharedPrefManager = new SharedPrefManager(this);

        btnLogin.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                loading = ProgressDialog.show(mContext, null, "Harap Tunggu...", true, false);
                requestLogin();
            }
        });

        btnRegister.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                startActivity(new Intent(mContext, RegisterActivity.class));
            }
        });

        // Code berikut berfungsi untuk mengecek session, Jika session true ( sudah login )
        // maka langsung memulai MainActivity.
        if (sharedPrefManager.getSPSudahLogin()){
            startActivity(new Intent(LoginActivity.this, MainActivity.class)
                    .addFlags(Intent.FLAG_ACTIVITY_CLEAR_TOP | Intent.FLAG_ACTIVITY_NEW_TASK));
            finish();
        }
    }

    private void requestLogin(){
        mApiService.loginRequest(etEmail.getText().toString(), etPassword.getText().toString())
                .enqueue(new Callback<ResponseBody>() {
                    @Override
                    public void onResponse(Call<ResponseBody> call, Response<ResponseBody> response) {
                        if (response.isSuccessful()){
                            try {
                                JSONObject jsonRESULTS = new JSONObject(response.body().string());
                                if (jsonRESULTS.getString("status").equals("true")){
                                    // Jika login berhasil maka data nama yang ada di response API
                                    // akan diparsing ke activity selanjutnya.
                                    JSONArray nama = new JSONArray(jsonRESULTS.getString("data"));
                                    JSONObject email = new JSONObject(nama.getString(0));
                                    String email_user = email.getString("email");
                                    Log.e("Isi",email_user);

                                    mApiService.getInfo(email_user).enqueue(new Callback<ResponseBody>() {
                                        @Override
                                        public void onResponse(Call<ResponseBody> call, Response<ResponseBody> response) {
                                            if (response.isSuccessful())
                                            {
                                                try {
                                                    JSONObject jsonRESULTS = new JSONObject(response.body().string());
                                                    if (jsonRESULTS.getString("status").equals("true")){
                                                        JSONArray nama = new JSONArray(jsonRESULTS.getString("data"));
                                                        JSONObject email = new JSONObject(nama.getString(0));
                                                        String email_user = email.getString("email");
                                                        String nama_user = email.getString("nama");
                                                        String alamat = email.getString("alamat");
                                                        String jenis = email.getString("jenis");
                                                        String penghuni = email.getString("penghuni");
                                                        String deskripsi = email.getString("deskripsi");

                                                        Toast.makeText(mContext, "BERHASIL LOGIN ", Toast.LENGTH_LONG).show();
                                                        sharedPrefManager.saveSPString(SharedPrefManager.SP_EMAIL, email_user);
                                                        sharedPrefManager.saveSPString(SharedPrefManager.SP_NAMA, nama_user);
                                                        sharedPrefManager.saveSPString(SharedPrefManager.SP_ALAMAT, alamat);
                                                        sharedPrefManager.saveSPString(SharedPrefManager.SP_PENGHUNI, penghuni);
                                                        sharedPrefManager.saveSPString(SharedPrefManager.SP_DESKRIPSI, deskripsi);
                                                        sharedPrefManager.saveSPString(SharedPrefManager.SP_JENIS, jenis);
                                                        // Shared Pref ini berfungsi untuk menjadi trigger session login
                                                        sharedPrefManager.saveSPBoolean(SharedPrefManager.SP_SUDAH_LOGIN, true);
                                                        startActivity(new Intent(mContext, MainActivity.class)
                                                                .addFlags(Intent.FLAG_ACTIVITY_CLEAR_TOP | Intent.FLAG_ACTIVITY_NEW_TASK));
                                                        finish();
                                                    }
                                                } catch (JSONException e) {
                                                    e.printStackTrace();
                                                } catch (IOException e) {
                                                    e.printStackTrace();
                                                }
                                            }else{

                                            }


                                        }

                                        @Override
                                        public void onFailure(Call<ResponseBody> call, Throwable t) {

                                        }
                                    });

                                } else {
                                    // Jika login gagal
                                    String error_message = jsonRESULTS.getString("error_msg");
                                    Toast.makeText(mContext, error_message, Toast.LENGTH_SHORT).show();
                                }
                            } catch (JSONException e) {
                                e.printStackTrace();
                            } catch (IOException e) {
                                e.printStackTrace();
                            }
                        } else {
                            Log.e("error","Error coy");
                            loading.dismiss();
                        }
                    }

                    @Override
                    public void onFailure(Call<ResponseBody> call, Throwable t) {
                        Log.e("debug", "onFailure: ERROR > " + t.toString());
                        loading.dismiss();
                    }
                });
    }
}
