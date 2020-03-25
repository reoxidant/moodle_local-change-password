<?php

$string['pluginname'] = "Восстановленения пароля.";
$string['username'] = 'Имя пользователя:';
$string['criticalerror'] = 'Критическая ошибка! Неверный пароль.';
$string['passwordsdiffer'] = 'Пароли не совпадают друг с другом.';
$string['newpassword'] = 'Новый пароль:';
$string['required'] = 'Обязательное поле:';
$string['oldpassword'] = 'Текущий пароль:';
$string['again'] = 'Повторите';
$string['invalidloginoremail'] = 'Неверное имя пользователя или адрес электронной почты.';
$string['errorpasswordreused'] = 'Этот пароль был    использован прежде, и не допускается к повторному использованию.';
$string['loginsite'] = 'Войдите на сайт.';
$string['errormatchpasswordandusername'] = 'Вы не можете использовать имя своей учетной записи в своем пароле.';
$string['errorminpassworddigits'] = 'Пароль должен состоять не менее из {$a} символов.';
$string['email'] = 'Адрес электронной почты:';
$string['usernameisnotundefined'] = 'Имя пользователя не является неопределенным.';
$string['errormatchpasswordandusername'] = 'Вы не можете использовать имя своей учетной записи в своем пароле.';
$string['errorminpasswordlength'] = 'Пароль должен состоять из не менее {$a} символов длины.';
$string['errormaxpasswordlength'] = 'Пароль должен состоять из не более {$a} символов длины.';
$string['errorminpasswordlower'] = 'Пароль должен состоять из не менее {$a} строчных символов.';
$string['errorminpasswordupper'] = 'Пароль должен состоять из не менее {$a} заглавных символов.';
$string['errorminpasswordnonalphanum'] = 'Пароль должен состоять из не менее {$a} не буквенно-цифровыx символов, таких как *, - или #.';
$string['errormaxconsecutiveidentchars'] = 'Пароль должен состоять из не более {$a} последовательных одинаковых символов.';
$string['emailpasswordconfirmmaybesent'] = '<p>Если вы указали правильное имя пользователя или адрес электронной почты, то вам должно было быть отправлено электронное письмо.</p>
 <p>Письмо содержит простые инструкции для подтверждения и завершения смены пароля.
Если вы по-прежнему испытываете трудности, пожалуйста, свяжитесь с администратором сайта.</p>';
$string['invalidpassword'] = 'Неверный пароль, пожалуйста, повторите попытку.';
$string['mustchangepassword'] = 'Новый пароль должен отличаться от текущего.';
$string['informminpasswordreuselimit'] = 'Пароли могут быть повторно использованы после {$a} раз.';
$string['noresetrecord'] = 'Нет никаких записей об этом запросе на сброс пароля. Пожалуйста, инициируйте новый запрос на сброс пароля.';
$string['resetrecordexpired'] = 'Ссылка для сброса пароля, которую вы использовали, имеет возраст более {$a} минут и она истекла. Пожалуйста, инициируйте новый сброс пароля.';
$string['forgotteninvalidurl'] = 'Неверный URL-адрес сброса пароля';
$string['cannotresetguestpwd'] = 'Вы не можете сбросить пароль гостя';
$string['emailresetconfirmation'] = 'Привет {$a->firstname},

Был запрошен сброс пароля для вашей учетной записи \'{$a->username}\' на сайте {$a->sitename}.

Чтобы подтвердить этот запрос и установить новый пароль для своей учетной записи , пожалуйста
перейдите по следующему веб-адресу:

{$a->link}
(Эта ссылка действительна {$a->resetminutes} минут с момента первого запроса на этот сброс)

Если этот сброс пароля не был запрошен вами, никаких действий не требуется.

Если вам нужна помощь, пожалуйста, свяжитесь с администратором сайта,
{$a->admin}';
$string['emailresetconfirmationsubject'] = '{$a}: запрос на сброс пароля';
$string['emailresetconfirmsent'] = 'На ваш адрес было отправлено электронное письмо по адресу: <b>{$a}</b>.
<br/>Письмо содержит простые инструкции для подтверждения и завершения этой смены пароля. Если вы по-прежнему испытываете трудности, обратитесь к администратору сайта.';
$string['passwordforgotteninstructions2'] = '
    Чтобы сбросить пароль, введите свое имя пользователя или адрес электронной почты ниже.
    Если мы сможем найти вас в базе данных, на ваш электронный адрес будет отправлено электронное письмо с инструкциями, как получить доступ снова.
';
$string['passwordforgotten'] = 'Забытый пароль';
$string['login'] = 'Войдите в свою учетную запись';
$string['participants'] = 'Участники';
$string['usercannotchangepassword'] = 'Вы не можете изменить свой пароль здесь, так как вы являетесь удаленным пользователем.';
$string['passwordchanged'] = 'Пароль был изменен';
$string['changepassword'] = 'Поменять пароль';
$string['forcepasswordchangenotice'] = 'Вы должны изменить свой пароль, чтобы продолжить работу .';
$string['setpasswordinstructions'] = 'Пожалуйста, введите свой новый пароль ниже, а затем сохраните изменения.';
$string['passwordset'] = 'Ваш пароль уже установлен.';
$string['userchangepasswordlink'] = '<br/>Возможно, вы сможете изменить свой пароль по своему усмотрению <a href="{$a->wwwroot}/login/change_password.php">{$a->description}</a> провайдера.';