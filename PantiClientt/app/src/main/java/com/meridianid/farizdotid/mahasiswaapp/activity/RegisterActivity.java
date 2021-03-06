package com.meridianid.farizdotid.mahasiswaapp.activity;

import android.app.ProgressDialog;
import android.content.Context;
import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.EditText;
import android.widget.RadioButton;
import android.widget.Spinner;
import android.widget.Toast;

import com.meridianid.farizdotid.mahasiswaapp.R;
import com.meridianid.farizdotid.mahasiswaapp.util.api.BaseApiService;
import com.meridianid.farizdotid.mahasiswaapp.util.api.UtilsApi;

import org.json.JSONException;
import org.json.JSONObject;

import java.io.IOException;

import butterknife.BindView;
import butterknife.ButterKnife;
import okhttp3.ResponseBody;
import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

import static com.meridianid.farizdotid.mahasiswaapp.R.id.spinnerJenis;

public class RegisterActivity extends AppCompatActivity {

    @BindView(R.id.etNama) EditText etNama;
    @BindView(R.id.etEmail) EditText etEmail;
    @BindView(R.id.etPassword) EditText etPassword;
    @BindView(R.id.etAlamat) EditText etAlamat;
    @BindView(R.id.spinnerJenis) Spinner spinnerJenis;
    @BindView(R.id.etPenghuni) EditText etPenghuni;
    @BindView(R.id.etDeskripsi) EditText etDeskripsi;
    @BindView(R.id.btnRegister) Button btnRegister;

    ProgressDialog loading;

    private String jenis;

    Context mContext;
    BaseApiService mApiService;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_register);
        getSupportActionBar().hide();

        ButterKnife.bind(this);
        mContext = this;
        mApiService = UtilsApi.getAPIService();


        Spinner dropdown = (Spinner) findViewById(R.id.spinnerJenis);
        String[] items = new String[]{"asuhan","jompo","sosial"};
        ArrayAdapter<String> adapter = new ArrayAdapter<String>(this,android.R.layout.simple_spinner_item,items);
        dropdown.setAdapter(adapter);
        spinnerJenis.setOnItemSelectedListener(new AdapterView.OnItemSelectedListener() {
            @Override
            public void onItemSelected(AdapterView<?> parent, View view, int position, long id) {
                String selectedName = parent.getItemAtPosition(position).toString();
                jenis = selectedName;
            }

            @Override
            public void onNothingSelected(AdapterView<?> parent) {

            }
        });

        btnRegister.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                loading = ProgressDialog.show(mContext, null, "Harap Tunggu...", true, false);
                requestRegister();
            }
        });
    }


    private void requestRegister(){
        mApiService.registerRequest(etEmail.getText().toString(),
                etPassword.getText().toString())
                .enqueue(new Callback<ResponseBody>() {
                    @Override
                    public void onResponse(Call<ResponseBody> call, Response<ResponseBody> response) {
                        if (response.isSuccessful()){

                            mApiService.registerRequest2(etEmail.getText().toString(),
                                    etNama.getText().toString(),
                                    etAlamat.getText().toString(),
                                    jenis,
                                    etPenghuni.getText().toString(),
                                    etDeskripsi.getText().toString())
                                    .enqueue(new Callback<ResponseBody>() {
                                        @Override
                                        public void onResponse(Call<ResponseBody> call, Response<ResponseBody> response) {
                                            if (response.isSuccessful())
                                            {
                                                Log.i("debug", "onResponse: BERHASIL");
                                                loading.dismiss();
                                                try {
                                                    JSONObject jsonRESULTS = new JSONObject(response.body().string());
                                                    if (jsonRESULTS.getString("status").equals("true")){
                                                        Toast.makeText(mContext, "BERHASIL REGISTRASI", Toast.LENGTH_SHORT).show();
                                                        startActivity(new Intent(mContext, LoginActivity.class));
                                                    } else {
                                                        String error_message = jsonRESULTS.getString("error_msg");
                                                        Toast.makeText(mContext, error_message, Toast.LENGTH_SHORT).show();
                                                    }
                                                } catch (JSONException e) {
                                                    e.printStackTrace();
                                                } catch (IOException e) {
                                                    e.printStackTrace();
                                                }
                                            }else{
                                                Log.i("debug", "onResponse: GA BERHASIL");
                                                loading.dismiss();
                                            }
                                        }

                                        @Override
                                        public void onFailure(Call<ResponseBody> call, Throwable t) {
                                            Log.e("debug", "onFailure: Gagal post Info ERROR > " + t.getMessage());
                                            Toast.makeText(mContext, "Koneksi Internet Bermasalah", Toast.LENGTH_SHORT).show();
                                        }
                                    });

                        } else {
                            Log.i("debug", "onResponse: GA BERHASIL");
                            loading.dismiss();
                            Toast.makeText(mContext, "Email sudah ada!", Toast.LENGTH_SHORT).show();
                        }
                    }

                    @Override
                    public void onFailure(Call<ResponseBody> call, Throwable t) {
                        loading.dismiss();
                        Log.e("debug", "onFailure: ERROR > " + t.getMessage());
                        Toast.makeText(mContext, "Koneksi Internet Bermasalah", Toast.LENGTH_SHORT).show();
                    }
                });
    }
}
