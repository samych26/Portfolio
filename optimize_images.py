from PIL import Image
import os
import glob

ASSETS_DIR = r"c:\Users\samyc\OneDrive\Bureau\portfolio\assets"

def optimize_images():
    # Targeted files to convert based on previous list_dir
    files_to_process = [
        "Mobile.jpg", "Design.jpg", "Portrait.png", "java.jpg", 
        "pdp.jpg", "pdp2.jpg", "qoffa.png", "Echos.png", "logo.png"
    ]

    for filename in files_to_process:
        filepath = os.path.join(ASSETS_DIR, filename)
        if not os.path.exists(filepath):
            print(f"Skipping {filename}, not found.")
            continue

        try:
            with Image.open(filepath) as img:
                # Calculate new dimensions if image is very large
                # Max width 1200px should be sufficient for this portfolio usage
                MAX_WIDTH = 1200
                if img.width > MAX_WIDTH:
                    ratio = MAX_WIDTH / img.width
                    new_height = int(img.height * ratio)
                    img = img.resize((MAX_WIDTH, new_height), Image.Resampling.LANCZOS)
                    print(f"Resized {filename} to {MAX_WIDTH}x{new_height}")

                # Save as WebP
                basename = os.path.splitext(filename)[0]
                webp_path = os.path.join(ASSETS_DIR, f"{basename}.webp")
                
                # Use slightly higher quality for portrait to maintain details
                quality = 85 if "Portrait" in filename else 80
                
                img.save(webp_path, "WEBP", quality=quality)
                
                old_size = os.path.getsize(filepath)
                new_size = os.path.getsize(webp_path)
                print(f"Converted {filename}: {old_size//1024}KB -> {new_size//1024}KB")

        except Exception as e:
            print(f"Error processing {filename}: {e}")

if __name__ == "__main__":
    optimize_images()
