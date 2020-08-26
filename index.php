<?php
//Создает XML-строку и XML-документ при помощи DOM 
$dom = new DomDocument('1.0', 'UTF-8'); 

//добавление корня - <tv> 
$tv = $dom->appendChild($dom->createElement('tv')); 
 
for ($i = 1; $i <= 10; $i++) {
	//добавление элемента <channel> в <tv> 
	$channel = $tv->appendChild($dom->createElement('channel'));

	//создание аттрибута id
	$domAttributeChannel = $dom->createAttribute('id');
	//добавление зняечения в аттрибут id
	$domAttributeChannel->value = $i;
	//вставка атрибута id в тег channel
	$channel->appendChild($domAttributeChannel); 
	
	for ($j = 1; $j <= 2; $j++) {
		// добавление элемента <display-name1> в <channel> 
		$display_name = $channel->appendChild($dom->createElement('display-name'));
		$domAttributeDisplayName = $dom->createAttribute('lang');
		if ($j == 1) {
			$domAttributeDisplayName->value = 'uk';
		} else {
			$domAttributeDisplayName->value = 'en';
		};
		$display_name->appendChild($domAttributeDisplayName);
		//добавление элемента текстового узла <display-name> в <display-name>
		$display_name->appendChild($dom->createTextNode('Channel 1'));
	};
 
	// добавление элемента <icon> в <channel> 
	$icon = $channel->appendChild($dom->createElement('icon'));
	$domAttributeIcon = $dom->createAttribute('src');
	if ($i > 0 and $i <= 9) {
		$item = 'http://localhost/ch00'.$i.'.png';
	} else if ($i >= 10 and $i < 100) {
		$item = 'http://localhost/ch0'.$i.'.png';
	} else {
		$item = 'http://localhost/ch'.$i.'.png';
	};
	$domAttributeIcon->value = $item;
	$icon->appendChild($domAttributeIcon);
};


//генерация xml 
$dom->formatOutput = true; // установка атрибута formatOutput
                           // domDocument в значение true 

// save XML as string or file 
$test1 = $dom->saveXML(); // передача строки в test1 
$dom->save('test1.xml'); // сохранение файла 

echo ($test1);
?>