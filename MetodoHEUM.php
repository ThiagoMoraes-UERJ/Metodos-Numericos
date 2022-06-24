<?php

// #################### FUNÇÕES Y' = f() ################

function f($x,$y, $z)
{   
    if($z == 1){
        //função 1
        return sin($y) - 3*$x ;
    }
    else if($z == 2){
        //função 2
        return -$y + 1 - $x;
    }
    else if($z == 3){
        //função 3
        return pow($x, 3) * exp((-2) * $x) - 2 * $y;
    }
    return 0;
}
// #################### METODO DE EULER ################
/* ******* EXPLICAÇÃO DA FUNÇÃO EULER CRIADA **************

        $xi   =  X inicial
        $yi   =  y inicial
        $delx =  delta x
        $X    =  x esperado da questão
        $Z    =  NUMERO DA FUNÇÃO 

*/
function euler($xi, $yi, $delx, $X, $z)
{
    while($xi < $X){
        
        $Y = $yi + f($xi,$yi,$z) * $delx;
        
        $yi = $Y; 
        $xi = $xi + $delx;
    }
    return $Y;
}

// #################### FIM ################



// #################### METODO DE HEUM ################

/* ******* EXPLICAÇÃO DA FUNÇÃO HEUM CRIADA **************

        $xi   =  X inicial
        $yi   =  y inicial
        $delx =  delta x
        $X    =  x esperado da questão
        $Z    =  NUMERO DA FUNÇÃO 
        $j    =  quantidade interação dentro da corretora 
        
        $i = incremento da quantidade de interação

*/
function heum($xi, $yi, $delx, $X, $z, $j)
{
    $i = 0;
    while($xi < $X){
        
        //função preditora 
        $yj = euler($xi, $yi, $delx, $X, $z);
        $xj = $xi + $delx;
        
        while( $i < $j ){
        //função corretora
        $Y = $yi + (f($xi,$yi,$z) + f($xj,$yj,$z)) / 2 * $delx;
        $yj = $Y;
        $i = $i + 1;
        }
        
        $yi = $Y; 
        $xi = $xi + $delx;
    }
    return $Y;
}
// #################### FIM ################

// #################### TESTE ################
// METODO DE HEUM
echo "<br><br> METODO DE HEUM: <br>";
echo "<br> corretora: <br>";
echo heum(0, 3, 0.1, 0.1, 2, 2);

?>
