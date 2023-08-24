<?php

//Fuso-Horário(São Paulo)
date_default_timezone_set('America/Sao_Paulo');

//Traduz os meses
if (date("F") === "January") {
    $mes = "Janeiro";
} else if (date("F") === "February") {
    $mes = "Fevereiro";
} else if (date("F") === "March") {
    $mes = "Março";
} else if (date("F") === "April") {
    $mes = "Abril";
} else if (date("F") === "May") {
    $mes = "Maio";
} else if (date("F") === "June") {
    $mes = "Junho";
} else if (date("F") === "July") {
    $mes = "Julho";
} else if (date("F") === "August") {
    $mes = "Agosto";
} else if (date("F") === "September") {
    $mes = "Setembro";
} else if (date("F") === "October") {
    $mes = "Outubro";
} else if (date("F") === "November") {
    $mes = "Novembro";
} else if (date("F") === "December") {
    $mes = "Dezembro";
}

//Dia de hoje
$today = date("j");

?>