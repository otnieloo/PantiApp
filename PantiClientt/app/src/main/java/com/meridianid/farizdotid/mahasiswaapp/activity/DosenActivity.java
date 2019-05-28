package com.meridianid.farizdotid.mahasiswaapp.activity;

import android.app.ProgressDialog;
import android.content.Context;
import android.support.annotation.IntegerRes;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.DefaultItemAnimator;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.util.Log;
import android.widget.BaseAdapter;
import android.widget.TextView;
import android.widget.Toast;

import com.meridianid.farizdotid.mahasiswaapp.R;
import com.meridianid.farizdotid.mahasiswaapp.adapter.DosenAdapter;
import com.meridianid.farizdotid.mahasiswaapp.model.ResponseDosen;
import com.meridianid.farizdotid.mahasiswaapp.model.SemuadosenItem;
import com.meridianid.farizdotid.mahasiswaapp.util.SharedPrefManager;
import com.meridianid.farizdotid.mahasiswaapp.util.api.BaseApiService;
import com.meridianid.farizdotid.mahasiswaapp.util.api.BaseApiService2;
import com.meridianid.farizdotid.mahasiswaapp.util.api.UtilsApi;
import com.meridianid.farizdotid.mahasiswaapp.util.api.UtilsApi2;

import org.json.JSONObject;

import java.util.ArrayList;
import java.util.Iterator;
import java.util.List;

import butterknife.BindView;
import butterknife.ButterKnife;
import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class DosenActivity extends AppCompatActivity {

    @BindView(R.id.rvDosen)
    RecyclerView rvDosen;
    @BindView(R.id.total)
    TextView totalDonasi;
    ProgressDialog loading;

    Context mContext;
    List<SemuadosenItem> semuadosenItemList = new ArrayList<>();
    DosenAdapter dosenAdapter;
    BaseApiService2 mApiService;

    SharedPrefManager sharedPrefManager;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_dosen);

        getSupportActionBar().setTitle("Donasi");

        ButterKnife.bind(this);
        mContext = this;
        mApiService = UtilsApi2.getAPIService2();

        sharedPrefManager = new SharedPrefManager(this);

        dosenAdapter = new DosenAdapter(this, semuadosenItemList);
        RecyclerView.LayoutManager mLayoutManager = new LinearLayoutManager(this);
        rvDosen.setLayoutManager(mLayoutManager);
        rvDosen.setItemAnimator(new DefaultItemAnimator());

        getResultListDosen();
    }

    private void getResultListDosen(){
        loading = ProgressDialog.show(this, null, "Harap Tunggu...", true, false);

        mApiService.getSemuaDosen(sharedPrefManager.getSPEmail()).enqueue(new Callback<ResponseDosen>() {
            @Override
            public void onResponse(Call<ResponseDosen> call, Response<ResponseDosen> response) {
                if (response.isSuccessful()){
                    loading.dismiss();

                    SemuadosenItem semuadosenItems;
                    int total=0,i = 0;
                    final List<SemuadosenItem> dosenList = response.body().getSemuadosen();

//                    Iterator iterator = dosenList.iterator();
                    for (i=0;i<dosenList.size();i++){
                        semuadosenItems = dosenList.get(i);
                        total = total+Integer.parseInt(semuadosenItems.getMatkul());
                        Log.e("Total: ",Integer.toString(total));
                        i++;
                    }

                    totalDonasi.setText(Integer.toString(total));

                    rvDosen.setAdapter(new DosenAdapter(mContext, dosenList));
                    dosenAdapter.notifyDataSetChanged();
                } else {
                    loading.dismiss();
                    Toast.makeText(mContext, "Gagal mengambil data dosen", Toast.LENGTH_SHORT).show();
                }
            }

            @Override
            public void onFailure(Call<ResponseDosen> call, Throwable t) {
                loading.dismiss();
                Toast.makeText(mContext, "Koneksi Internet Bermasalah", Toast.LENGTH_SHORT).show();
            }
        });
    }
}
