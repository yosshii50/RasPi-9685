<?php

//file_put_contents("sample.txt", "HELLO WORLD");

//$file = './people.txt';

// �t�@�C�����I�[�v�����Ċ����̃R���e���c���擾���܂�
//$current = file_get_contents($file);

// �V�����l�����t�@�C���ɒǉ����܂�
//$current .= "John Smith\n";

// ���ʂ��t�@�C���ɏ����o���܂�
//file_put_contents($file, $current);


//$cmd = 'ls -la > ls.txt';
$cmd = 'sudo ./init.sh';
//$cmd = 'i2cset -y 1 0x40 12 236';
exec($cmd);
 

?>
