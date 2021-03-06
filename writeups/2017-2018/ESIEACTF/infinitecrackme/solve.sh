#! /bin/bash
passphrase=""
unzip infinitecrackme.zip
number=$(ls -l | grep chall | wc -l)
number=`expr $number - 1`
for i in `seq 0 $number`; do
  file="chall""$i"
  ltrace -o output ./$file "test" > /dev/null
  flag=$(cat output | grep strcmp | cut -d' ' -f2 | cut -d'"' -f2)
  echo $flag
  passphrase="$passphrase""$flag"
done
echo -n $passphrase > output
echo " "
echo "ESE{""$(md5sum output | cut -d' ' -f1)""}"
rm output
rm chall*
