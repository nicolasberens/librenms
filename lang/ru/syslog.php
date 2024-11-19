<?php

return [
    'title' => 'Syslog',
    'severity' => [
        '0' => 'Аварийное состояние',
        '1' => 'Тревога',
        '2' => 'Критическое',
        '3' => 'Ошибка',
        '4' => 'Предупреждение',
        '5' => 'Уведомление',
        '6' => 'Информационное',
        '7' => 'Отладка',
    ],
    'facility' => [
        '0' => 'Сообщения ядра',
        '1' => 'Сообщения уровня пользователя',
        '2' => 'Система почты',
        '3' => 'Системные демоны',
        '4' => 'Сообщения безопасности/авторизации',
        '5' => 'Сообщения, генерируемые внутренне syslogd',
        '6' => 'Подсистема линейного принтера',
        '7' => 'Подсистема сетевых новостей',
        '8' => 'Подсистема UUCP',
        '9' => 'Демон времени',
        '10' => 'Сообщения безопасности/авторизации',
        '11' => 'Демон FTP',
        '12' => 'Подсистема NTP',
        '13' => 'Аудит журналов',
        '14' => 'Предупреждение журналов',
        '15' => 'Демон времени (заметка 2)',
        '16' => 'Локальное использование 0 (local0)',
        '17' => 'Локальное использование 1 (local1)',
        '18' => 'Локальное использование 2 (local2)',
        '19' => 'Локальное использование 3 (local3)',
        '20' => 'Локальное использование 4 (local4)',
        '21' => 'Локальное использование 5 (local5)',
        '22' => 'Локальное использование 6 (local6)',
        '23' => 'Локальное использование 7 (local7)',
    ],
];
