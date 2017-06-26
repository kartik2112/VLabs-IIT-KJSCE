import numpy as np
import argparse
import cv2
import pytesseract
import sys
import os
import csv
from matplotlib import pyplot as plt
from PIL import Image
from PIL import ImageFilter
from PIL import ImageEnhance
import codecs

filename = "unnamed.jpg"
image = cv2.imread(filename)

gray = cv2.cvtColor(image, cv2.COLOR_BGR2GRAY)
gray = cv2.bitwise_not(gray)

cv2.imshow(gray)
cv2.waitKey(1000)