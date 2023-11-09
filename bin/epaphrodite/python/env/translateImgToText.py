import sys
import json
import pytesseract
from PIL import Image

class ImageProcessor:
    def __init__(self, img_path):
        
        self.img_path = img_path

    def getImgContent(self):
        try:
            image = Image.open(self.img_path)
            
            texte_extrait = pytesseract.image_to_string(image)
            
            return texte_extrait
        
        except Exception as e:
            
            return "Error when extracting text from the image : " + str(e)

    @staticmethod
    def loadJsonValues(json_values):
        
        values = json.loads(json_values)
        
        return values

if __name__ == '__main__':
    
    if len(sys.argv) != 2:
        
        print("Usage: python imgToText.py <image_json_path>")
        
        sys.exit(1)

    json_data = sys.argv[1]

    data = ImageProcessor.loadJsonValues(json_data)
    
    img_path = data.get("img")

    image_processor = ImageProcessor(img_path)

    text_extract = image_processor.getImgContent()

    print(text_extract)
