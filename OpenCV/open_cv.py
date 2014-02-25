import cv2
import os
import re
import numpy as np
import sys
import json


images = []
labels = []

def load_image(path):
	return cv2.imread(path, cv2.IMREAD_GRAYSCALE)

for path in os.listdir("./uploads"):
	user_id = re.match("[0-9]", path)
	if user_id != None:
		user_id = user_id.group()
	else:
		continue;
	image = load_image("./uploads/" + path)

	if image == None:
		print(json.dumps({error: "Could not load image " + path}))
	images.append(np.asarray(image, dtype=np.uint8))
	labels.append(user_id)


labels = np.asarray(labels, dtype=np.int32)
faceRecognizer = cv2.createEigenFaceRecognizer();
faceRecognizer.train(np.asarray(images), labels)


#Load file to predict
prediction_image = load_image(sys.argv[1])
prediction = faceRecognizer.predict(prediction_image)

print(json.dumps(prediction))