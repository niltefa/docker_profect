#!/bin/bash
HOURS=2
BACKUPDIR=/etc/repte/backups/

# Realiza una copia de seguridad de todos los contenedores de MySQL
CONTAINER=$(docker ps --format '{{.Names}}:{{.Image}}' | grep 'mysql' | cut -d":" -f1)
echo $CONTAINER

if [ ! -d $BACKUPDIR ]; then
    mkdir -p $BACKUPDIR
fi

for i in $CONTAINER; do
    MYSQL_DATABASE=Repte
    MYSQL_PWD=$(docker exec $i env | grep MYSQL_ROOT_PASSWORD | cut -d"=" -f2)

    docker exec -e MYSQL_DATABASE=$MYSQL_DATABASE -e MYSQL_PWD=$MYSQL_PWD \
        $i /usr/bin/mysqldump -u root $MYSQL_DATABASE \
        | gzip > $BACKUPDIR/$i-$MYSQL_DATABASE-$(date +"%Y%m%d%H%M").sql.gz

    find $BACKUPDIR -name "$i*.gz" -mmin +$HOURS -delete
done

echo "Backup for Databases completed"

