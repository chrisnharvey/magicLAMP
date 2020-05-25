MAGICLAMP_VERSION="0"

if [ -f /home/magicLAMP/.magiclamprc ]; then
    . /home/magicLAMP/.magiclamprc
fi

# Update to 1.3
if [ $MAGICLAMP_VERSION \< "1.3" ]; then
    rm -f /home/magicLAMP/.zshrc
    cp /usr/src/magicLAMP/.zshrc /home/magicLAMP/.zshrc
    chown magicLAMP:magicLAMP /home/magicLAMP/.zshrc

    echo "MAGICLAMP_VERSION=\"1.3\"" > /home/magicLAMP/.magiclamprc
fi

