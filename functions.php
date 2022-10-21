<?php

namespace SRC;

class Funcoes
{
    /*

    Desenvolva uma função que receba como parâmetro o ano e retorne o século ao qual este ano faz parte. O primeiro século começa no ano 1 e termina no ano 100, o segundo século começa no ano 101 e termina no 200.

	Exemplos para teste:

	Ano 1905 = século 20
	Ano 1700 = século 17

     * */
    public function SeculoAno(int $year): int {
        if(strlen((string)$year)<3){
            return 1;
        }else if(substr((string)$year, -2) == "00"){
            $century = (int)substr($year, 0, -2);
            return $century;
        }else{
            $century = (int)substr($year, 0, -2) + 1;
            return $century;
        }
    }   






	
	
	/*

    Desenvolva uma função que receba como parâmetro um número inteiro e retorne o numero primo imediatamente anterior ao número recebido

    Exemplo para teste:

    Numero = 10 resposta = 7
    Número = 29 resposta = 23

     * */
    public function PrimoAnterior(int $number): int {
        while($number!=0){
            $numberOfDivisions = 0;
            $number--;
            for($j = $number; $j >= 1; $j--){
                if (($number % $j) == 0) {
                    $numberOfDivisions++;
                }
            }
            if ($numberOfDivisions == 2){
                return $number;
            }
        }
    }










    /*

    Desenvolva uma função que receba como parâmetro um array multidimensional de números inteiros e retorne como resposta o segundo maior número.

    Exemplo para teste:

	Array multidimensional = array (
	array(25,22,18),
	array(10,15,13),
	array(24,5,2),
	array(80,17,15)
	);

	resposta = 25

     * */
    public function SegundoMaior(array $arr): int {
        $bigest = 0;
        $secondBigest = 0;
        foreach($arr as $array){
            foreach($array as $value){
                $intValue = intval($value);
                if($intValue>=$bigest){
                    $secondBigest = $bigest;
                    $bigest=$intValue;
                }else if(($intValue>=$secondBigest)&&($intValue<$bigest)){
                    $secondBigest = $intValue;
                }
            }
        }
        return $secondBigest;
    }
	
	
	
	
	
	
	

    /*
   Desenvolva uma função que receba como parâmetro um array de números inteiros e responda com TRUE or FALSE se é possível obter uma sequencia crescente removendo apenas um elemento do array.

	Exemplos para teste 

	Obs.:-  É Importante  realizar todos os testes abaixo para garantir o funcionamento correto.
         -  Sequencias com apenas um elemento são consideradas crescentes

    [1, 3, 2, 1]  false
    [1, 3, 2]  true
    [1, 2, 1, 2]  false
    [3, 6, 5, 8, 10, 20, 15] false
    [1, 1, 2, 3, 4, 4] false
    [1, 4, 10, 4, 2] false
    [10, 1, 2, 3, 4, 5] true
    [1, 1, 1, 2, 3] false
    [0, -2, 5, 6] true
    [1, 2, 3, 4, 5, 3, 5, 6] false
    [40, 50, 60, 10, 20, 30] false
    [1, 1] true
    [1, 2, 5, 3, 5] true
    [1, 2, 5, 5, 5] false
    [10, 1, 2, 3, 4, 5, 6, 1] false
    [1, 2, 3, 4, 3, 6] true
    [1, 2, 3, 4, 99, 5, 6] true
    [123, -17, -5, 1, 2, 3, 12, 43, 45] true
    [3, 5, 67, 98, 3] true

     * */
    
	public function SequenciaCrescente(array $arr): boolean {
        $valid = false;
        $bkp = $arr;
        foreach($arr as $key => $value){
            unset($arr[$key]);
            $arrayToValid = array_values($arr);
            if(isArrayValid($arrayToValid)){
                $valid = true;
            }
            $arr = $bkp;
        }
        return $valid;
    }
    
    function isArrayValid(Array $array): bool{
        $size = count($array);
        if ($size > 1) {
            $i = 1;
            while ($i < $size) {
                 if (($array[$i-1] >= $array[$i])) {
                    return false;    
                 }
                 $i++;
            }
            return true; 
        }else{
            return true;
        }
    }
}
