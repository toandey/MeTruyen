package com.vantoan.medoctruyen.adapter.fragment.profile;

import android.content.Context;
import android.content.SharedPreferences;

public class ColorAndTextStylePreferences {
    private static final String PREF_NAME = "ColorAndTextStylePrefs";
    private static final String KEY_BACKGROUND_COLOR = "background_color";
    private static final String KEY_TEXT_STYLE = "text_style";

    public static void setBackgroundColor(Context context, int color) {
        SharedPreferences.Editor editor = context.getSharedPreferences(PREF_NAME, Context.MODE_PRIVATE).edit();
        editor.putInt(KEY_BACKGROUND_COLOR, color);
        editor.apply();
    }

    public static int getBackgroundColor(Context context) {
        SharedPreferences prefs = context.getSharedPreferences(PREF_NAME, Context.MODE_PRIVATE);
        return prefs.getInt(KEY_BACKGROUND_COLOR, android.R.color.white); // Default color is white
    }

    public static void setTextStyle(Context context, int textStyle) {
        SharedPreferences.Editor editor = context.getSharedPreferences(PREF_NAME, Context.MODE_PRIVATE).edit();
        editor.putInt(KEY_TEXT_STYLE, textStyle);
        editor.apply();
    }

    public static int getTextStyle(Context context) {
        SharedPreferences prefs = context.getSharedPreferences(PREF_NAME, Context.MODE_PRIVATE);
        return prefs.getInt(KEY_TEXT_STYLE, android.R.style.TextAppearance_Medium); // Default style
    }
}

