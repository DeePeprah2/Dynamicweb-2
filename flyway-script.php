
# Download and extract Flyway
sudo wget -qO- https://repo1.maven.org/maven2/org/flywaydb/flyway-commandline/9.20.0/flyway-commandline-9.20.0-linux-x64.tar.gz | tar -xvz

# Create a symbolic link to make Flyway accessible globally
sudo ln -s $(pwd)/flyway-9.20.0/flyway /usr/local/bin

# Create the SQL directory for migrations
sudo mkdir sql

# Download the migration SQL script from AWS S3
aws s3 cp s3://dee-data-migration-bucket/V1__nest.sql sql/

# Run Flyway migration
sudo flyway -url=jdbc:mysql://testdb.c3qgmy74n7ea.eu-west-2.rds.amazonaws.com:3306/adwoadb \
  -user=dee \
  -password=dee12345 \
  -locations=filesystem:sql \
  migrate
