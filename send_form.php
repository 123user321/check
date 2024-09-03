<?php
if(count($_POST)==5){
	//Прием полей
	$fio='';if(isset($_POST['fio'])){$fio=htmlspecialchars(stripslashes(strip_tags(trim($_POST['fio']))));}
	$email='';if(isset($_POST['email'])){$email=htmlspecialchars(stripslashes(strip_tags(trim($_POST['email']))));}
	$tema='';if(isset($_POST['tema'])){$tema=htmlspecialchars(stripslashes(strip_tags(trim($_POST['tema']))));}
	$mes='';if(isset($_POST['mes'])){$mes=htmlspecialchars(stripslashes(strip_tags(trim($_POST['mes']))));}
	
	//Проверка полей
	$err=array();//Массив для ошибок
	if(empty($fio) || mb_strlen($fio,'UTF-8')>40){$err[]='Некорректное ИФО (более 40 символов)';}
	if(!preg_match("/^[a-z0-9][a-z0-9\.-_]*[a-z0-9]*@([a-z0-9]+([a-z0-9-]*[a-z0-9]+)*\.)+[a-z]+/i",$email)){$err[]='Некорректный E-mail';}
	if(empty($tema) || mb_strlen($tema,'UTF-8')>30){$err[]='Некорректная тема (более 30 символов)';}
	if(empty($mes) || mb_strlen($mes,'UTF-8')>350){$err[]='Некорректное сообщение (более 350 символов)';}
	
	if(count($err)>0){//Количество ел. в массиве больше 0 (есть ошибки)
		echo '<p class="mes_err"><b>Исправьте следующие ошибки:</b></p>';
		$i=0;$c=count($err);while($i<$c){
			echo '<p class="mes_err">- '.$err[$i].'</p>';
		$i++;}
	}else{//если нет ошибок - отправляем сообщением админу
		$from="=?utf-8?B?".base64_encode('kwo-master.com')."?="." <info@kwo-master.com>";
		$headers="From: ".$from."\r\nReply-To: ".$from."\r\nContent-type: text/html; charset=utf-8\r\n";
		$subject="=?utf-8?B?".base64_encode($tema)."?=";
		if(mail('kwomaster7@gmail.com',$subject,$mes,$headers)){echo '<p class="mes_ok">Сообщение отправлено!</p>';}
	}
}