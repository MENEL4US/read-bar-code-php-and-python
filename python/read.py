# https://github.com/MENEL4US/read-bar-code-php-and-python
# Luiz Mendes   March 16, 2021.

import json
import os
import sys
import cv2
from pyzbar.pyzbar import decode

# Function to load the image
def read_image(name):
    img = cv2.imread(name)
    if img is not None:
        return img
    print(json.dumps({'STATUS':'fail','MSG':'Image not found','CODE':1}))
    quit()

# Function to decode the image
def decode_image(image):
    image = decode(image)
    if len(image) > 0:
        return image[0]
    print(json.dumps({'STATUS':'fail','MSG':'QR Code ou Barcode not found in the image','CODE':2}))
    quit()

# Function to return information
def get_info(image, code_type):
    if image.type == code_type:
        return image.data.decode('utf-8')
    print(json.dumps({'STATUS':'fail','MSG':'Code other than the requested parameter','CODE':3}))
    quit()

# Get the parameters
# File name
file_name = str(sys.argv[1])
# Expected type
code_type = str(sys.argv[2])

# Save location of images
file_path = ""

# Read the image
img = read_image(file_path+'\\'+file_name)
# Decodes the image
img = decode_image(img)
# Get the information
data = get_info(img, code_type)

print(json.dumps({'STATUS':'success','DATA':data}))
quit()