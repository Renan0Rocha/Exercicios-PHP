<?php

use SebastianBergmann\Timer\Timer;

function calcularMedia(array $numeros)
{
    $media = array_sum($numeros) / count($numeros);
    return $media;
}
function somarPares(array $numeros, $soma = 0)
{
    foreach ($numeros as $pares) {
        if ($pares % 2 == 0) {
            $soma = $soma + $pares;
        }
    }
    return $soma;
}

function segundoMaior(array $numeros, $anterior = 0)
{
    $maior = max($numeros);
    foreach ($numeros as $num) {
        if ($anterior < $num) {
            if ($num < $maior) {
                $anterior = $num;
            }
        }
    }
    return $anterior;
}

function somaDigitos($valor, $soma = 0)
{
    for ($i = 0; $i < strlen($valor); $i++) {
        $soma = $soma + substr($valor, $i, 1);
    }
    return $soma;
}

function matrizPares($numeros)
{
    foreach ($numeros as $par) {
        if ($par % 2 == 0) {
            $matriz[] = $par;
        }
    }
    return $matriz;
}

function validarCpf($cpf)
{
    //Remover caracteres não numéricos
    $cpfFiltrado = preg_replace('/[^0-9]/', '', $cpf);

    //Verificar quantidade de caracteres
    if (strlen($cpfFiltrado) != 11) {
        return false;
    }

    //Verificar sequência repetida
    if (preg_match('/(\d)\1{10}/', $cpfFiltrado)) {
        return false;
    }

    //DIGITO 1
    $ii = 0;
    $soma = 0;
    for ($i = 0; $i < (strlen($cpfFiltrado)) - 2; $i++) {
        $digitosCpf[] = substr($cpfFiltrado, $i, 1);
    }
    for ($c = 10; $c > 1; $c--) {
        $soma = $soma + ($digitosCpf[$ii] * $c);
        $ii++;
    }
    if ($soma % 11 < 2) {
        $digitosCpf[] = 0;
    } else {
        $digitosCpf[] = 11 - ($soma % 11);
    }

    //DIGITO 2
    $ii = 0;
    $soma = 0;
    for ($d = 11; $d > 1; $d--) {
        $soma = $soma + ($digitosCpf[$ii] * $d);
        $ii++;
    }
    if ($soma % 11 < 2) {
        $digitosCpf[] = 0;
    } else {
        $digitosCpf[] = 11 - ($soma % 11);
    }

    if ($cpfFiltrado == implode($digitosCpf)) {
        return true;
    } else {
        return false;
    }
}

function contarTempo(string $data)
{
    $agora = strtotime(date('Y-m-d H:i:s'));
    $tempo = strtotime($data);
    $diferenca = $agora - $tempo;

    $segundos = $diferenca;
    $minutos = round($diferenca / 60);
    $horas = round($diferenca / 3600);
    $dias = round($diferenca / 86400);
    $semanas = round($diferenca / 604800);
    $mes = round($diferenca / 2419200);
    $anos = round($diferenca / 29030400);

    if ($segundos <= 60) {
        return 'Tempo - 00:00:' . $segundos;
    } elseif ($minutos < -60) {
        return $minutos == 1 ? 'Tempo - 00:01:' . '' : 'há ' . $minutos . ' minutos';
    } elseif ($horas < -24) {
        return $horas == 1 ? 'há 1 hora' : 'há ' . $horas . ' horas';
    }
}

function diminuirContador($contador)
{
    $contador--;
    return $contador;
}
