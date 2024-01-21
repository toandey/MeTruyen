package com.vantoan.medoctruyen;
import android.graphics.Bitmap;
import java.util.ArrayList;
import java.util.List;

public class ImageManager {
    private static ImageManager instance;
    private Bitmap currentImage;

    private List<ImageUpdateListener> listeners;

    private ImageManager() {
        listeners = new ArrayList<>();
    }

    public static ImageManager getInstance() {
        if (instance == null) {
            instance = new ImageManager();
        }
        return instance;
    }

    public void setCurrentImage(Bitmap newImage) {
        currentImage = newImage;
        notifyListeners();
    }

    public Bitmap getCurrentImage() {
        return currentImage;
    }

    public void addListener(ImageUpdateListener listener) {
        listeners.add(listener);
    }

    public void removeListener(ImageUpdateListener listener) {
        listeners.remove(listener);
    }

    private void notifyListeners() {
        for (ImageUpdateListener listener : listeners) {
            listener.onImageUpdated(currentImage);
        }
    }

    public interface ImageUpdateListener {
        void onImageUpdated(Bitmap updatedImage);
    }
}
