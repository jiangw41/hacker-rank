import json
import csv

permissions_file = open("permissions.csv", "w")
permissions_writer = csv.writer(permissions_file)
header = ["view_grades", "change_grades", "add_grades", "delete_grades", "view_classes",
          "change_classes", "add_classes", "delete_classes"]
permissions_writer.writerow([""] + header)


def check_permissions(permission_list):
    return [1 if permission in permission_list else 0 for permission in header]


with open("permissions.json") as f:
    data = json.load(f)
for person in data:
    permissions_writer.writerow([person] + check_permissions(data[person]))

print("permissions.csv file created in the same folder")
