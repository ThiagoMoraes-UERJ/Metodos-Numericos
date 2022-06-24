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


// #################### METODO DE EULER MODIFICADO ################

/* ******* EXPLICAÇÃO DA FUNÇÃO EULER MODIFICADO CRIADA **************

        $xi   =  X inicial
        $yi   =  y inicial
        $delx =  delta x
        $X    =  x esperado da questão
        $Z    =  NUMERO DA FUNÇÃO 
        
        $i = incremento da quantidade de interação

*/
function eulermodificado($xi, $yi, $delx, $X, $z)
{
    while($xi < $X){
        
        //função preditora 
        $delx2 = $delx/2;
        $X2 = $xi + $delx2;
        $yj = euler($xi, $yi, $delx2, $X2, $z);
        $xj = $xi + $delx2;
        
        //função corretora
        $Y = $yi +  f($xj,$yj,$z) * $delx;
        
        $yi = $Y; 
        $xi = $xi + $delx;
    }
    return $Y;
}
// #################### FIM ################

// #################### TESTE ################

// METODO DE EULER MODIFICADO
echo "<br><br> METODO DE EULER MODIFICADO: <br>";
echo "<br> corretora: <br>";
echo eulermodificado(0, 1.0, 0.1, 0.2, 3);


?>
