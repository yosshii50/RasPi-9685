
#set sleep bit while preserving other bits and ensuring that restart bit is set to 0 when writing to register
#他のビットを保持しながらスリープビットを設定し、レジスタへの書き込み時にリスタートビットが0に設定されるようにする
i2cset -y 1 0x40 0x00 16

#Setting frequency to 60 Hz. Calcualting prescale value prescale=round( 25000000/(4096 * frequency)) - 1 from frequency as 101(PCA9685 clock is at 25MHz or 25000000 Hz)
#周波数を60 Hzに設定します。プリスケール値 round（25000000 /（4096 * 60Hz )) -1 = 101 としての周波数から1を計算（PCA9685クロックは25MHzまたは25000000 Hz）
#周波数を50 Hzに設定します。プリスケール値 round（25000000 /（4096 * 50Hz )) -1 = 121 としての周波数から1を計算（PCA9685クロックは25MHzまたは25000000 Hz）
i2cset -y 1 0x40 0xFE 121 # PWM出力をプログラムするプリスケーラ周波数（デフォルトは200 Hz）
i2cset -y 1 0x40 0x00 0x00

i2cset -y 1 0x40 0x00 128

