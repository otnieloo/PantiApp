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
import android.widget.TextView;
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

import static com.meridianid.farizdotid.mahasiswaapp.R.id.etDeskripsi;
import static com.meridianid.farizdotid.mahasiswaapp.R.id.spinnerJenis;

public class EditActivity extends AppCompatActivity {

    @BindView(R.id.etNama) EditText etNama;
    @BindView(R.id.etEmail) EditText etEmail;
    @BindView(R.id.etAlamat) EditText etAlamat;
    @BindView(R.id.spinnerJenis) Spinner spinnerJenis;
    @BindView(R.id.etPenghuni) EditText etPenghuni;
    @BindView(R.id.etDeskripsi) EditText etDeskripsi;
    @BindView(R.id.btnRegister) Button btnRegister;

    ProgressDialog loading;

    private String jenis;
    SharedPrefManager sharedPrefManager;
    Context mContext;
    BaseApiService mApiService;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_edit);
        getSupportActionBar().hide();

        ButterKnife.bind(this);
        mContext = this;
        mApiService = UtilsApi.getAPIService();

        sharedPrefManager = new SharedPrefManager(this);

        Spinner dropdown = (Spinner) findViewById(R.id.spinnerJenis);
        String[] items = new String[]{"asuhan","jompo","sosial"};
        ArrayAdapter<String> adapter = new ArrayAdapter<String>(this,android.R.layout.simple_spinner_item,items);
        dropdown.setAdapter(adapter);

        int pos = 0;
        String jenisPanti = sharedPrefManager.getSpJenis();
        switch (jenisPanti){
            case "asuhan":
                pos = 0;
                break;
            case "jompo":
                pos = 1;
                break;
            case "sosial":
                pos = 2;
                break;
        }

        spinnerJenis.setSelection(pos);

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


        etNama.setText(sharedPrefManager.getSPNama(), TextView.BufferType.EDITABLE);
        etEmail.setText(sharedPrefManager.getSPEmail());
        etAlamat.setText(sharedPrefManager.getSpAlamat(), TextView.BufferType.EDITABLE);
        etPenghuni.setText(sharedPrefManager.getSpPenghuni(), TextView.BufferType.EDITABLE);
        etDeskripsi.setText(sharedPrefManager.getSpDeskripsi(), TextView.BufferType.EDITABLE);

        btnRegister.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                loading = ProgressDialog.show(mContext, null, "Harap Tunggu...", true, false);
                requestRegister();
            }
        });
    }


    private void requestRegister(){
        mApiService.putRequest(etEmail.getText().toString(),
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
                                    JSONObject email = jsonRESULTS.getJSONObject("data");

                                    String email_user = jsonRESULTS.getString("email");
                                    String nama_user = email.getString("nama");
                                    String alamat = email.getString("alamat");
                                    String jenis = email.getString("jenis");
                                    String penghuni = email.getString("penghuni");
                                    String deskripsi = email.getString("deskripsi");

                                    Toast.makeText(mContext, "BERHASIL REGISTRASI", Toast.LENGTH_SHORT).show();
                                    sharedPrefManager.saveSPString(SharedPrefManager.SP_EMAIL, email_user);
                                    sharedPrefManager.saveSPString(SharedPrefManager.SP_NAMA, nama_user);
                                    sharedPrefManager.saveSPString(SharedPrefManager.SP_ALAMAT, alamat);
                                    sharedPrefManager.saveSPString(SharedPrefManager.SP_PENGHUNI, penghuni);
                                    sharedPrefManager.saveSPString(SharedPrefManager.SP_DESKRIPSI, deskripsi);
                                    sharedPrefManager.saveSPString(SharedPrefManager.SP_JENIS, jenis);
                                    startActivity(new Intent(mContext, MainActivity.class));
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
    }
}
