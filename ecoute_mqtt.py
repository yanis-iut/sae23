import paho.mqtt.client as mqtt
import mysql.connector
import json
import ssl
from datetime import datetime

DB_HOST = "localhost"
DB_USER = "yanis"
DB_PASS = "RT"
DB_NAME = "sae23"


MQTT_BROKER = "mqtt.iut-blagnac.fr"
MQTT_PORT = 8883
MQTT_USER = "student"
MQTT_PASS = "student"


TOPICS = [
	("AM107/by-room/E208/data", 0),
	("AM107/by-room/E001/data", 0),
	("AM107/by-room/B106/data", 0),
	("AM107/by-room/B203/data", 0)
]


def on_connect(client, userdata, flag, rc):
	print("Connecté au broker MQTT des capteurs !")
	client.subscribe(TOPICS)

def on_message(client, userdata, msg):
	try:
		payload = json.loads(msg.payload.decode('utf-8'))
		temperature = payload[0]["température"]

		nom_salle = msg.topic.split("/")[2]
		nom_capteur = f"Capt_{nom_salle}"

		now = datetime.now()
		date_m = now.strftime('%Y-%m-%d')
		heure_m = now.strftime('%H:%M:%S')
		

		conn = mysql.connector.connect(host=DB_HOST, user=DB_USER, password=DB_PASS, database=DB_NAME)
		cursor = conn.cursor()
 
		sql = "INSERT INTO Mesure (data_mesure, heure_mesure, valeur, nom_capteur) VALUES (%s ,%s, %s, %s)"
		cursor.execute(sql, (date_m, heure_m, temperature, nom_capteur))
		conn.commit()

		print(f"[{heure_m}] Succès : {temperature}°C enregistré pour la salle {nom_salle}")

		cursor.close()
		conn.close()

	except Exception as e:
		print(f"Erreur : {e}")

print("Démarrage du script d'écoute ...")
client = mqtt.Client()
client.username_pw_set(MQTT_USER, MQTT_PASS)
client.tls_set(cert_reqs=ssl.CERT_REQUIRED, tls_version=ssl.PROTOCOL_TLS)

client.on_connect = on_connect
client.on_message = on_message

client.connect(MQTT_BROKER, MQTT_PORT, 60)
client.loop_forever()
