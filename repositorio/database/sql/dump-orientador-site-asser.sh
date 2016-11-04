#! /bin/bash
# cat lista-profs.txt | sed -e 's/<[^>]*>//g' | sed '/^\s*$/d' > lista-profs-nova.txt

cat lista-profs-nova.txt | while read LINE
do

echo "INSERT INTO orientador (nome) VALUES ('"$LINE"');";
done
