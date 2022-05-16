<?php
use PHPMailer/PHPMailer/PHPMailer;
use PHPMailer/PHPMailer/Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';

$mail = new PHPMailer(true);
$mail->CharSet = 'UTF-8';
$mail->setLanguage('ru','phpmailer/language');
$mail->IsHTML(true);

//от кого письмо
$mail->setFrom('');

//кому отправить
$mail->addAddress('');

//тема письма
$mail->Subject = 'Карта лояльнсти клиента';

//тело сообщения
$body = '<h1>Данные клиента</h1>'

if(trim(!empty($_POST['lastname']))){
    $body.='<p><strong>Фамилия:</strong> '.$_POST['lastname'].'</p>';
}

if(trim(!empty($_POST['firstname']))){
    $body.='<p><strong>Имя:</strong> '.$_POST['firstname'].'</p>';
}

if(trim(!empty($_POST['secondname']))){
    $body.='<p><strong>Отчество:</strong> '.$_POST['secondname'].'</p>';
}

if(trim(!empty($_POST['date']))){
    $body.='<p><strong>Дата рождения:</strong> '.$_POST['date'].'</p>';
}

if(trim(!empty($_POST['mtel']))){
    $body.='<p><strong>Контактный номер:</strong> '.$_POST['mtel'].'</p>';
}

if(trim(!empty($_POST['email']))){
    $body.='<p><strong>Email:</strong> '.$_POST['email'].'</p>';
}

if(trim(!empty($_POST['checkbox']))){
    $body.='<p><strong>Как узнали:</strong> '.$_POST['checkbox'].'</p>';
}

//отправка формы

if(!$mail->send()){
    $message = 'Ошибка';
} else {
    $message = 'Данные отправлены'
}

$response = ['message' => $message];

header('Content-type: application/json');
echo json_encode($response);

// $to = ""; // емайл получателя данных из формы 
// $tema = "Карта лояльности "; // тема полученного емайла 
// $lastname = "Фамилия".$_POST['lastname']."<br>";//присвоить переменной значение, полученное из формы lastname=lastname
// $firstname = "Имя: ".$_POST['firstname']."<br>";//присвоить переменной значение, полученное из формы firstname=firstname
// $secondname = "Отчество".$_POST['secondname']."<br>";//присвоить переменной значение, полученное из формы secondname=secondname
// $date = "Дата рождения".$_POST['date']."<br>";//присвоить переменной значение, полученное из формы date=date
// $mtel = "Контактный номер".$_POST['mtel']."<br>";//присвоить переменной значение, полученное из формы mtel=mtel
// $email = "Email".$_POST['email']."<br>";//присвоить переменной значение, полученное из формы email=email
// $checkbox = "Как узнали?".$_POST['checkbox']."<br>"; //присвоить переменой значение, полученное из формы checkbox=checkbox
// $headers = 'MIME-Version: 1.0' . "\r\n"; // заголовок соответствует формату плюс символ перевода строки
// $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n"; // указывает на тип посылаемого контента
// mail($to, $tema, $lastname, $firstname, $secondname, $date, $mtel, $email, $checkbox, $headers); //отправляет получателю на емайл значения переменных
// header('Location: ');
?>