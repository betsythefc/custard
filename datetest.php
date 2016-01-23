<?php
$Date = getdate();
$SingleDigits = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9);

if (in_array($Date[mon], $SingleDigits)) {
	$Month = "0$Date[mon]";
} else {
	$Month = $Date[mon];
}

if (in_array($Date[mday], $SingleDigits)) {
	$Day = "0$Date[mday]";
} else {
	$Day = $Date[mday];
}

if (in_array($Date[hours], $SingleDigits)) {
	$Hours = "0$Date[hours]";
} else {
	$Hours = $Date[hours];
}

if (in_array($Date[minutes], $SingleDigits)) {
	$Minutes = "0$Date[minutes]";
} else {
	$Minutes = $Date[minutes];
}

if (in_array($Date[seconds], $SingleDigits)) {
	$Seconds = "0$Date[seconds]";
} else {
	$Seconds = $Date[seconds];
}

$DateString = "$Date[year]$Month$Day$Hours$Minutes$Seconds";
echo $DateString;
?>
