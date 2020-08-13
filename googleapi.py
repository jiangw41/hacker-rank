import gspread
from oauth2client.service_account import ServiceAccountCredentials
import csv


scope = ["https://spreadsheets.google.com/feeds",'https://www.googleapis.com/auth/spreadsheets',"https://www.googleapis.com/auth/drive.file","https://www.googleapis.com/auth/drive"]
credential = ServiceAccountCredentials.from_json_keyfile_name("credential.json", scope)
client = gspread.authorize(credential)
sheet = client.open("permissions").sheet1

with open("permissions.csv", 'r') as csvfile:
    content = csv.reader(csvfile)
    for index, line in enumerate(content, 1):
        sheet.insert_row(list(line), index)
print("spreadsheet written on Google drive")