1. permissions.json contains the raw json string.

2. json2csv.py parses the json string and stores data in permissions.csv file. 

3. json2csv.php is the PHP solution. 

4. googleapi.py uses Google sheets api and it has to be run after json2csv.py. It writes data into a spreadsheet on my Google drive, which can be accessed using the link below:
https://docs.google.com/spreadsheets/d/199TMteOmuvS7thtKAowHjyBnnG4hOO11njLvvL-wQBw/edit?usp=sharing

5. credential.json stores credentials for Google sheets api, which are used by googleapi.py