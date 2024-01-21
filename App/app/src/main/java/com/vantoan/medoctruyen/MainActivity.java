package com.vantoan.medoctruyen;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;
import androidx.fragment.app.Fragment;
import androidx.viewpager2.widget.ViewPager2;

import android.os.Bundle;
import android.view.MenuItem;

import com.google.android.material.bottomnavigation.BottomNavigationView;
import com.google.android.material.navigation.NavigationBarView;
import com.vantoan.medoctruyen.adapter.AdapterControler;
import com.vantoan.medoctruyen.adapter.fragment.CategoryFragment;
import com.vantoan.medoctruyen.adapter.fragment.HomeFragment;
import com.vantoan.medoctruyen.adapter.fragment.LibraryFragment;
import com.vantoan.medoctruyen.adapter.fragment.ProfileFragment;

import java.util.ArrayList;

public class MainActivity extends AppCompatActivity {
    ViewPager2 pagerMain;
    ArrayList<Fragment> fragmentArrayList = new ArrayList<>();
    BottomNavigationView bottomNavigationView;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        pagerMain = findViewById(R.id.pagerMain);
        bottomNavigationView = findViewById(R.id.bottomNavigationView);

        fragmentArrayList.add(new HomeFragment());
        fragmentArrayList.add(new CategoryFragment());
        fragmentArrayList.add(new LibraryFragment());
        fragmentArrayList.add(new ProfileFragment());

        bottomNavigationView.setItemIconTintList(null);

        bottomNavigationView.getMenu().findItem(R.id.navigation_home).setIcon(R.drawable.home);
        bottomNavigationView.getMenu().findItem(R.id.navigation_category).setIcon(R.drawable.category);
        bottomNavigationView.getMenu().findItem(R.id.navigation_library).setIcon(R.drawable.library);
        bottomNavigationView.getMenu().findItem(R.id.navigation_profile).setIcon(R.drawable.user);

// Thay đổi biểu tượng khi một phần tử được chọn

        AdapterControler adapterControler = new AdapterControler(this, fragmentArrayList);
        pagerMain.setAdapter(adapterControler);
        pagerMain.setUserInputEnabled(false);
        pagerMain.registerOnPageChangeCallback(new ViewPager2.OnPageChangeCallback() {
            @Override
            public void onPageSelected(int position) {
                switch (position){
                    case 0:
                        bottomNavigationView.setSelectedItemId(R.id.navigation_home);
                        break;
                    case 1:
                        bottomNavigationView.setSelectedItemId(R.id.navigation_category);
                        break;
                    case 2:
                        bottomNavigationView.setSelectedItemId(R.id.navigation_library);
                        break;
                    case 3:
                        bottomNavigationView.setSelectedItemId(R.id.navigation_profile);
                        break;
                }

                super.onPageSelected(position);
            }
        });
        bottomNavigationView.setOnItemSelectedListener(new NavigationBarView.OnItemSelectedListener() {
            @Override
            public boolean onNavigationItemSelected(@NonNull MenuItem item) {
                resetIcons();
                switch (item.getItemId()){
                    case R.id.navigation_home:
                        item.setIcon(R.drawable.home_full);
                        pagerMain.setCurrentItem(0);
                        break;
                    case R.id.navigation_category:
                        item.setIcon(R.drawable.category_full);
                        pagerMain.setCurrentItem(1);
                        break;
                    case R.id.navigation_library:
                        item.setIcon(R.drawable.library_full);
                        pagerMain.setCurrentItem(2);
                        break;
                    case R.id.navigation_profile:
                        item.setIcon(R.drawable.user_full);
                        pagerMain.setCurrentItem(3);
                        break;

                }

                return true;
            }
        });
    }
    private void resetIcons() {
        bottomNavigationView.getMenu().findItem(R.id.navigation_home).setIcon(R.drawable.home);
        bottomNavigationView.getMenu().findItem(R.id.navigation_category).setIcon(R.drawable.category);
        bottomNavigationView.getMenu().findItem(R.id.navigation_library).setIcon(R.drawable.library);
        bottomNavigationView.getMenu().findItem(R.id.navigation_profile).setIcon(R.drawable.user);
    }
}