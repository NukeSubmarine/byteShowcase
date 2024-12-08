# Step 1: Import necessary modules
from PIL import Image
import os

# Step 2: Specify the directory containing PNG files
# Replace with the path folder containing your PNGs
input_folder = "/Users/name/folder_name"
# Replace with the path folder for saving JPEGs
output_folder = "/Users/name/folder_name"

# Step 3: Create the output folder if it doesn't exist
if not os.path.exists(output_folder):
    os.makedirs(output_folder)

# Step 4: Iterate through each file in the input folder
for filename in os.listdir(input_folder):
    if filename.lower().endswith('.png'):  # Check for .png files
        # Full path to the input file
        input_path = os.path.join(input_folder, filename)

        # Step 5: Convert and save as JPEG
        with Image.open(input_path) as img:
            # Convert PNG to RGB (JPEG doesn't support transparency)
            rgb_img = img.convert("RGB")
            output_path = os.path.join(output_folder, os.path.splitext(filename)[
                                       0] + ".jpeg")  # Output file name
            rgb_img.save(output_path, "JPEG")  # Save as JPEG
            print(f"Converted {filename} to JPEG")

# Step 6: Notify the user of completion
print("All PNG images have been converted to JPEG.")
