from PIL import Image
import os

ASSETS_DIR = r"c:\Users\samyc\OneDrive\Bureau\portfolio\assets"

def optimize_images():
    # Targeted files to convert
    files_to_process = [
        "Mobile.jpg", "Design.jpg", "Portrait.png", "java.jpg", 
        "pdp.jpg", "pdp2.jpg", "qoffa.png", "Echos.png", "logo.png",
        "Pong-game.ico" # Checking if pillow can handle ico, if not might need skip or specific handler, but let's try. Actually ico usually doesn't need webp, but let's see. Best to stick to main images first.
    ]
    
    # Filter only standard image formats for webp conversion usually
    extensions = ('.jpg', '.jpeg', '.png')

    for filename in os.listdir(ASSETS_DIR):
        if not filename.lower().endswith(extensions):
            continue
            
        filepath = os.path.join(ASSETS_DIR, filename)
        
        try:
            with Image.open(filepath) as img:
                basename = os.path.splitext(filename)[0]
                webp_path = os.path.join(ASSETS_DIR, f"{basename}.webp")

                # Resize based on filename
                if "Portrait" in filename:
                    target_width = 700
                    if img.width > target_width:
                        ratio = target_width / img.width
                        new_height = int(img.height * ratio)
                        img = img.resize((target_width, new_height), Image.Resampling.LANCZOS)
                        print(f"Resized {filename} to {target_width}x{new_height}")
                else:
                    MAX_WIDTH = 1200
                    if img.width > MAX_WIDTH:
                        ratio = MAX_WIDTH / img.width
                        new_height = int(img.height * ratio)
                        img = img.resize((MAX_WIDTH, new_height), Image.Resampling.LANCZOS)
                        print(f"Resized {filename} to {MAX_WIDTH}x{new_height}")

                # Save as WebP
                quality = 85 if "Portrait" in filename else 80
                img.save(webp_path, "WEBP", quality=quality)
                
                old_size = os.path.getsize(filepath)
                new_size = os.path.getsize(webp_path)
                print(f"Converted {filename}: {old_size//1024}KB -> {new_size//1024}KB")

        except Exception as e:
            print(f"Error processing {filename}: {e}")

if __name__ == "__main__":
    optimize_images()
