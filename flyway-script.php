
# bin! Bash
# flyway script
# command to download flyway
wget -qO- https://download.red-gate.com/maven/release/org/flywaydb/enterprise/flyway-commandline/9.22.2/flyway-commandline-9.22.2-linux-x64.tar.gz | tar -xvz && sudo ln -s `pwd`/flyway-9.22.2/flyway /usr/local/bin

# create a symbolic line to make flyway accessible globaly
# Sudo ln -s $|(pwd)/flywayflyway-9.21.1 /usr/local/bin

# change directory to flyway directory 
cd flyway-9.22.2
# remove already sql file in flyway directory
rm -rf sql

# make a new sql directory
sudo mkdir sql

# 4b. command to copy file from aws , cd into flyway folder to use the command below
aws s3 cp s3://dee-data-migration-bucket/V1__nest.sql /home/ec2-user/flyway-9.21.1/sql

# run flyway migrate command using rds Endpoint , database name then username and password 
flyway -url=jdbc:mysql://testdb.c3qgmy74n7ea.eu-west-2.rds.amazonaws.com:3306/adwoadb \
-user=dee \
-password=dee12345 \
-locations=filesystem:sql \
migrate