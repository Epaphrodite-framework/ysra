import sys
import json
from Crypto.Cipher import AES
from base64 import b64encode, b64decode

class EncryptDecrypt:

    @staticmethod
    def encryptValue(dataToEncrypt, key):
        
        data_to_encrypt = dataToEncrypt.encode()
        
        cipher = AES.new(key, AES.MODE_GCM)
        
        ciphertext, tag = cipher.encrypt_and_digest(data_to_encrypt)
        
        nonce = cipher.nonce
        
        encrypted_data = b64encode(nonce + ciphertext + tag).decode()
        
        return encrypted_data

    @staticmethod
    def decryptValue(dataToDecrypt, key):
        
        decoded_data = b64decode(dataToDecrypt.encode())
        
        nonce = decoded_data[:16]
        
        ciphertext = decoded_data[16:-16]
        
        tag = decoded_data[-16:]
        
        cipher = AES.new(key, AES.MODE_GCM, nonce=nonce)
        
        decrypted_data = cipher.decrypt_and_verify(ciphertext, tag)
        
        return decrypted_data.decode()
    
    @staticmethod
    def loadJsonValues(json_values):
        
        values = json.loads(json_values)
        
        return values

if __name__ == "__main__":

    # This secret key must be 32 bites
    SECRET_KEY = b'Epaphrodite_framework_SECRET_KEY'
    
    json_values = sys.argv[1]

    actions = EncryptDecrypt.loadJsonValues(json_values)

    if len(actions) != 2:
        print("The list of actions must contain two variables")
        sys.exit(1)

    if actions[1] == 'dec':
        result = EncryptDecrypt.decryptValue(actions[0], SECRET_KEY )
    else:
        result = EncryptDecrypt.encryptValue(actions[0], SECRET_KEY )

    print(result)

