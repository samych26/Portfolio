from PIL import Image
import os
import glob

ASSETS_DIR = os.path.join(os.path.dirname(__file__), "assets")

def optimize_images(assets_dir: str = ASSETS_DIR):
    # Mapping of source file -> (output filename, max_width)
    # If source is different from current usage (e.g. using _opt versions currently), 
    # we use the high-res source to generate the new webp.
    
    images_to_process = [
        # (Source File, Output Name, Max Width)
        ("Portrait.png", "Portrait.webp", 800),  # Hero image, intrinsic is ~350 but keep quality high
        ("Mobile.jpg", "Mobile.webp", 1200),    # Book cover
        ("Design.jpg", "Design.webp", 1200),    # Book cover
        ("java.jpg", "java.webp", 1200),        # Book cover
        ("qoffa.png", "qoffa.webp", 800),       # Project image
        ("Echos.png", "Echos.webp", 800),       # Project image
        ("logo.png", "logo.webp", 800),         # Project image (PlayMaster)
        ("Pong-game.ico", "Pong-game.webp", 64) # Icon used as 16x16, resize drastically
    ]

    for source_file, output_name, max_wd in images_to_process:
        source_path = os.path.join(assets_dir, source_file)
        output_path = os.path.join(assets_dir, output_name)

        if not os.path.exists(source_path):
            print(f"Skipping {source_file}, not found.")
            continue

        try:
            with Image.open(source_path) as img:
                # Handle RGBA for transparent pngs
                if img.mode in ('RGBA', 'LA') or (img.mode == 'P' and 'transparency' in img.info):
                    # Keep transparency
                    pass
                else:
                    # Convert to RGB to ensure compatibility if needed (though WebP supports both)
                    img = img.convert('RGB')

                # Resize if larger than max_wd
                if img.width > max_wd:
                    ratio = max_wd / img.width
                    new_height = int(img.height * ratio)
                    img = img.resize((max_wd, new_height), Image.Resampling.LANCZOS)
                    print(f"Resized {source_file} to {max_wd}x{new_height}")

                # Save as WebP
                # Quality 85 is a good balance for WebP
                img.save(output_path, "WEBP", quality=85)
                
                old_size = os.path.getsize(source_path)
                new_size = os.path.getsize(output_path)
                print(f"Converted {source_file}: {old_size//1024}KB -> {new_size//1024}KB")

        except Exception as e:
            print(f"Error processing {source_file}: {e}")

if __name__ == "__main__":
    import argparse
    parser = argparse.ArgumentParser(description="Optimiser les images en WebP")
    parser.add_argument("--assets", dest="assets", default=ASSETS_DIR, help="Chemin vers le dossier assets")
    args = parser.parse_args()
    if not os.path.isdir(args.assets):
        print(f"Assets introuvable: {args.assets}")
    else:
        optimize_images(args.assets)
