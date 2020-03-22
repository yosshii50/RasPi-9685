
# Setting Channel 0 PWM on at 0 step, off at 150 step in 0 to 4095 steps at 60 Hz
i2cset -y 1 0x40 6 0
i2cset -y 1 0x40 7 0
i2cset -y 1 0x40 8 102 # 4096 / 20 * 0.5 = 102.4 最小
i2cset -y 1 0x40 9 0

# Setting Channel 0 PWM on at 0 step, off at 150 step in 0 to 4095 steps at 60 Hz
i2cset -y 1 0x40 10 0
i2cset -y 1 0x40 11 0
i2cset -y 1 0x40 12 102 # 4096 / 20 * 0.5 = 102.4 最小
i2cset -y 1 0x40 13 0

sleep 0.5

# Setting Channel 0 PWM on at 3 step, off at 0 step in 0 to 4095 steps at 60 Hz
i2cset -y 1 0x40 8 236
i2cset -y 1 0x40 9 1

# Setting Channel 0 PWM on at 3 step, off at 0 step in 0 to 4095 steps at 60 Hz
i2cset -y 1 0x40 12 236
i2cset -y 1 0x40 13 1

sleep 0.5

# Setting Channel 0 PWM on at 3 step, off at 0 step in 0 to 4095 steps at 60 Hz
i2cset -y 1 0x40 8 40
i2cset -y 1 0x40 9 1

# Setting Channel 0 PWM on at 3 step, off at 0 step in 0 to 4095 steps at 60 Hz
i2cset -y 1 0x40 12 40
i2cset -y 1 0x40 13 1

