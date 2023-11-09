import sys
import json
import PyPDF2

class translatepdfToText:
    def __init__(self, pdf_path, password=None):
        
        self.pdf_path = pdf_path
        
        self.password = password

    def extract_text(self):
        
        with open(self.pdf_path, 'rb') as pdf_file:
            
            pdf_reader = PyPDF2.PdfFileReader(pdf_file)
            
            if pdf_reader.isEncrypted:
                
                pdf_reader.decrypt(self.password)
            
            text = ""
            
            for page_num in range(pdf_reader.numPages):
                
                page = pdf_reader.getPage(page_num)
                
                text += page.extractText()
                
            return text

    @staticmethod
    def loadJsonValues(json_values):
        
        values = json.loads(json_values)
        
        return values

if __name__ == "__main":
    
    if len(sys.argv) != 2:
        
        print("Usage: python pdfToText.py json_data.")
        
        sys.exit(1)

    json_data = sys.argv[1]
    
    pdf_path = translatepdfToText.loadJsonValues(json_data)

    if 'pdf' in pdf_path:
        
        pdf_path = pdf_path['pdf']
        
    else:
        print("The PDF file was not specified in the JSON.")
        
        sys.exit(1)

    password = None

    pdf_converter = translatepdfToText(pdf_path, password)
    
    extracted_text = pdf_converter.extract_text()

    print(extracted_text)
