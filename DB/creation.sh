#!/bin/bash
#set -e  # Detener el script si un comando falla

username='teo'
password='i-am-root'
dbName='olakehace'

mysql -u $username -p$password -e "DROP DATABASE IF EXISTS $dbName;"
mysql -u $username -p$password -e "CREATE DATABASE $dbName;"
mysql -u $username -p$password $dbName < db-creation.sql
mysql -u $username -p$password $dbName < functions.sql
mysql -u $username -p$password $dbName < triggers.sql
mysql -u $username -p$password $dbName < initial-data.sql