
# flyway script
# command to download flyway
wget -q- https://download.red-gate.com/maven/release/org/flywaydb/enterprise/flyway-commandline/9.21.1/flyway-commandline-9.21.1-linux-x64.tar.gz | tar -xvz && sudo ln -s `pwd`/flyway-9.21.1/flyway /usr/local/bin 

# change directory to flyway directory 
cd flyway-9.21.1

# remove already sql file in flyway directory
rm -rf sql

# make a new sql directory
mkdir sql

# command to copy file from aws , cd into flyway folder to use the command below
aws s3 cp s3://dee-data-migration-bucket/V1__nest.sql /home/ec2-user/flyway-9.21.1/sql
