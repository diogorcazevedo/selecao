<?php

function arrayestados()
{

    return [" " => "Unidade da Federação", "AC" => "Acre", "AL" => "Alagoas", "AM" => "Amazonas", "AP" => "Amapá", "BA" => "Bahia", "CE" => "Ceará", "DF" => "Distrito Federal", "ES" => "Espírito Santo", "GO" => "Goiás", "MA" => "Maranhão", "MT" => "Mato Grosso", "MS" => "Mato Grosso do Sul", "MG" => "Minas Gerais", "PA" => "Pará", "PB" => "Paraíba", "PR" => "Paraná", "PE" => "Pernambuco", "PI" => "Piauí", "RJ" => "Rio de Janeiro", "RN" => "Rio Grande do Norte", "RO" => "Rondônia", "RS" => "Rio Grande do Sul", "RR" => "Roraima", "SC" => "Santa Catarina", "SE" => "Sergipe", "SP" => "São Paulo", "TO" => "Tocantins"];

}

function  slipnumbers($id){


    $number = $id.aleatorio();
    $number = substr($number, 0, 7);

    return str_pad($number, 5, "0", STR_PAD_RIGHT);

}

function nossonumero($id){

    $s = date('s');
    $number = $id .$s.aleatorio();
    $number = substr($number, 0, 15);

    return str_pad($number, 5, "0", STR_PAD_LEFT);

}
function aleatorio(){

    $gera = "";


    for($a=0; $a<3; $a++)

    {

        $gera .= rand(0,9);//sorteia 1 numero de 0 a 9

    }

    return $gera;
}

function arrayestadocivil()
{

    return [
        " " 		        => "Informar Estado Civil",
        "solteiro(a)"       => "solteiro",
        "casado(a)"         => "casado(a)",
        "divorciado(a)" 	=> "divorciado(a)",
        "união estável" 	=> "união estável",
        "viúvo(a)" 	        => "viúvo(a)"
    ];

}
function arraycontatos()
{

    return [
        " " 		=> "Informar Motivo",
        "inscrição" => "Dúvida na inscrição",
        "pagamento" => "Pagamento",
        "edital" 	=> "Dúvida Edital",
        "local" 	=> "Local de Prova",
        "outros" 	=> "Outros"
    ];

}


function arrayescolaridade()
{

    return [
        " " 						=> "Informar Motivo",
        "Alfabetizado" 				=> "Alfabetizado",
        "Nível Fundamental" 		=> "Nível Fundamental",
        "Nível médio" 				=> "Nível médio",
        "Nível Técnico" 			=> "Nível Técnico",
        "Nível Superior" 			=> "Nível Superior",
        "Pós-Graduação"				=> "Pós-Graduação",
        "Mestrado"					=> "Mestrado",
        "Doutorado"					=> "Doutorado",
    ];

}
function arrayfilhos()
{

    return [
        " " => "Quantidade de Filhos",
        "0" => "0",
        "1" => "1",
        "2" => "2",
        "3" => "3",
        "4" => "4",
        "5" => "5",
        "6" => "6",
        "7" => "7",
        "8" => "8",
        "9" => "9",
        "10" => "10",
        "11" => "11",
        "12" => "12",
        "13" => "13",
        "14" => "14",
        "15" => "15",
        "16" => "16",
        "17" => "17",
        "18" => "18",
        "19" => "19",
        "20" => "20",
    ];

}
function arrayparcelas()
{

    return [
        "0" => "Parcelas",
        "1" => "1",
        "2" => "2",
        "3" => "3",
    ];

}

function arrayneeds()
{

    return [
        "Prova Ampliada"  => "Prova Ampliada",
        "Ledor" 		  => "Ledor",
        "Transcritor" 	  => "Transcritor",
        "Lactante" 		  => "Lactante",
        "Fácil acesso" 	  => "Fácil acesso",
        "outros" 		  => "Outros"
    ];

}

function arraylocais()
{

    return [
        "1" 		=> "Vitória",
        "2" 	    => "Cachoeiro de Itapemirim",
        "3" 		=> "Linhares",
        "4" 		=> "Recife",
        "5" 		=> "Caruaru",
        "6" 		=> "Petrolina",
        "8" 		=> "Serra Talhada",
        "9" 		=> "Natal",
        "10" 		=> "Mossoró",
        "11" 		=> "João Pessoa",
        "12" 		=> "Campina Grande",
        "13" 		=> "Cajazeiras",
        "14" 		=> "Maceió",

    ];

}

function birthdate($birthdate)
{

    return implode("-",array_reverse(explode("-",$birthdate)));

}

function dt($dt)
{

    return implode("-",array_reverse(explode("/",$dt)));

}


function primeiroNome($nome){
    $nome_usuario = explode(" ", $nome);
    return $nome_usuario['0'];
}

function removerAcentor($string) {

    // matriz de entrada
    $what = array( 'ä','ã','à','á','â','ê','ë','è','é','ï','ì','í','ö','õ','ò','ó','ô','ü','ù','ú','û','À','Á','Ã','Â','Ê','É','Í','Õ','Ó','Ô','Ú','ñ','Ñ','ç','Ç','-','(',')',',',';',':','|','!','"','#','$','%','&','/','=','?','~','^','>','<','ª','º',"'");

    // matriz de saída
    $by   = array( 'a','a','a','a','a','e','e','e','e','i','i','i','o','o','o','o','o','u','u','u','u','A','A','A','A','E','E','I','O','O','O','U','n','n','c','C','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_'," " );

    // devolver a string
    return str_replace($what, $by, $string);
}

function removerUnderline($string) {

    // matriz de entrada
    $what = array( 'ä','ã','à','á','â','ê','ë','è','é','ï','ì','í','ö','õ','ò','ó','ô','ü','ù','ú','û','À','Á','Ã','Â','Ê','É','Í','Õ','Ó','Ô','Ú','ñ','Ñ','ç','Ç','-','(',')',',',';',':','|','!','"','#','$','%','&','/','=','?','~','^','>','<','ª','º',"'");

    // matriz de saída
    $by   = array( 'a','a','a','a','a','e','e','e','e','i','i','i','o','o','o','o','o','u','u','u','u','A','A','A','A','E','E','I','O','O','O','U','n','n','c','C','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_'," " );

    // devolver a string
    return str_replace($what, $by, $string);
}


/*  $view =  \View::make('home.security')->render();
    $pdf = \App::make('dompdf.wrapper');
    $pdf->loadHTML($view);
    $pdf->setPaper('A4', 'landscape');
   return $pdf->download('invoice.pdf');
   // return $pdf->stream();
  */

function mod($dividendo,$divisor)
{
    return round($dividendo - (floor($dividendo/$divisor)*$divisor));
}


function cpf_randon($compontos =1)
{
    $n1 = rand(0,9);
    $n2 = rand(0,9);
    $n3 = rand(0,9);
    $n4 = rand(0,9);
    $n5 = rand(0,9);
    $n6 = rand(0,9);
    $n7 = rand(0,9);
    $n8 = rand(0,9);
    $n9 = rand(0,9);
    $d1 = $n9*2+$n8*3+$n7*4+$n6*5+$n5*6+$n4*7+$n3*8+$n2*9+$n1*10;
    $d1 = 11 - ( mod($d1,11) );
    if ( $d1 >= 10 )
    { $d1 = 0 ;
    }
    $d2 = $d1*2+$n9*3+$n8*4+$n7*5+$n6*6+$n5*7+$n4*8+$n3*9+$n2*10+$n1*11;
    $d2 = 11 - ( mod($d2,11) );
    if ($d2>=10) { $d2 = 0 ;}
    $retorno = '';
    if ($compontos==1) {$retorno = ''.$n1.$n2.$n3.".".$n4.$n5.$n6.".".$n7.$n8.$n9."-".$d1.$d2;}
    else {$retorno = ''.$n1.$n2.$n3.$n4.$n5.$n6.$n7.$n8.$n9.$d1.$d2;}
    return $retorno;
}


/**
 * Converte de numero arabico para romano
 * @param int $numero numero arabico
 * @return string numero romano em letras maiusculas
 */
function numero_romano($numero) {
    if ($numero <= 0 || $numero > 3999) {
        return $numero;
    }

    $n = (int)$numero;
    $y = '';

    // Nivel 1
    while (($n / 1000) >= 1) {
        $y .= 'M';
        $n -= 1000;
    }
    if (($n / 900) >= 1) {
        $y .= 'CM';
        $n -= 900;
    }
    if (($n / 500) >= 1) {
        $y .= 'D';
        $n -= 500;
    }
    if (($n / 400) >= 1) {
        $y .= 'CD';
        $n -= 400;
    }

    // Nivel 2
    while (($n / 100) >= 1) {
        $y .= 'C';
        $n -= 100;
    }
    if (($n / 90) >= 1) {
        $y .= 'XC';
        $n -= 90;
    }
    if (($n / 50) >= 1) {
        $y .= 'L';
        $n -= 50;
    }
    if (($n / 40) >= 1) {
        $y .= 'XL';
        $n -= 40;
    }

    // Nivel 3
    while (($n / 10) >= 1) {
        $y .= 'X';
        $n -= 10;
    }
    if (($n / 9) >= 1) {
        $y .= 'IX';
        $n -= 9;
    }
    if (($n / 5) >= 1) {
        $y .= 'V';
        $n -= 5;
    }
    if (($n / 4) >= 1) {
        $y .= 'IV';
        $n -= 4;
    }

    // Nivel 4
    while ($n >= 1) {
        $y .= 'I';
        $n -= 1;
    }

    return $y;
}

function limpaCPF_CNPJ($valor){
    $valor = trim($valor);
    $valor = str_replace(".", "", $valor);
    $valor = str_replace(",", "", $valor);
    $valor = str_replace("-", "", $valor);
    $valor = str_replace("/", "", $valor);
    return $valor;
}


function validarCPF( $cpf = '' ) {

    $cpf = str_pad(preg_replace('/[^0-9]/', '', $cpf), 11, '0', STR_PAD_LEFT);
    // Verifica se nenhuma das sequências abaixo foi digitada, caso seja, retorna falso
    if ( strlen($cpf) != 11 || $cpf == '00000000000' || $cpf == '11111111111' || $cpf == '22222222222' || $cpf == '33333333333' || $cpf == '44444444444' || $cpf == '55555555555' || $cpf == '66666666666' || $cpf == '77777777777' || $cpf == '88888888888' || $cpf == '99999999999') {
        return FALSE;
    } else { // Calcula os números para verificar se o CPF é verdadeiro
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf{$c} * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf{$c} != $d) {
                return FALSE;
            }
        }
        return TRUE;
    }
}


function resume($var, $limite ){

    if (strlen($var) > $limite)	{
        $var = substr($var, 0, $limite);
        $var = trim($var) . "...";
    }
    return $var;
}

function alternative($number){


    switch ($number){
        case 1:
            $alternative = 'a)';
            break;
        case 2:
            $alternative = 'b)';
            break;
        case 3:
            $alternative = 'c)';
            break;
        case 4:
            $alternative = 'd)';
            break;
        case 5:
            $alternative = 'e)';
            break;
    }

    return $alternative;

}

function status($status){


    switch ($status){
        case 0:
            $mensagem = 'ITEM EM CONSTRUÇÃO';
            break;
        case 1:
            $mensagem = 'ITEM EM PROCESSO DE APROVAÇÃO';
            break;
        case 50:
            $mensagem = 'ITEM PRONTO PARA USO ';
            break;
        case 100:
            $mensagem = 'ITEM LIBERADO PARA DIVULGAÇÃO';
            break;
        default:
            $mensagem = "ITEM EM SEM CLASSIFICAÇÃO";
    }

    return $mensagem;

}

function createTXT($texto,$arquivo){


    //Variável $fp armazena a conexão com o arquivo e o tipo de ação.
    $fp = fopen($arquivo, "a+");

    //Escreve no arquivo aberto.
    fwrite($fp, $texto);

    //Fecha o arquivo.
    fclose($fp);
}

function download($arquivo){
    header("Content-Type: application/force-download");
    header("Content-Type: application/octet-stream;");
    header("Content-Length:".filesize($arquivo));
    header("Content-disposition: attachment; filename=".$arquivo);
    header("Pragma: no-cache");
    header("Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0");
    header("Expires: 0");
    readfile($arquivo);
    flush();
}


function messages(){


        return   [
            //required
            'name.required'        => 'O campo NOME é obrigatório',
            'email.required'       => 'O campo E-MAIL é obrigatório',
            'cpf.required'         => 'O campo CPF  é obrigatório',
            'identity.required'    => 'O campo IDENTIDADE  é obrigatório',
            'dispatcher.required'  => 'O campo ORGÃO EXPEDIDOR  é obrigatório',

            'local.required'            => 'O campo Local de Prova é obrigatório',
            'job_id.required'           => 'é obrigatório escolher cargo',


            'complement.birthdate.required'        => 'O campo DATA DE NASCIMENTO  é obrigatório',
            'complement.phone.required'            => 'O campo TELEFONE  é obrigatório',
            'complement.cel.required'              => 'O campo CELULAR  é obrigatório',
            'complement.gender.required'           => 'O campo SEXO  é obrigatório',
            'complement.maritalstatus.required'    => 'O campo ESTADO CIVIL  é obrigatório',
            'complement.mother.required'           => 'O campo NOME DA MÃE  é obrigatório',
            'complement.father.required'           => 'O campo NOME DO PAI  é obrigatório',
            'complement.nationality.required'      => 'O campo NACIONALIDADE  é obrigatório',
            'complement.naturality.required'       => 'O campo NATURALIDADE  é obrigatório',
            'complement.children.required'         => 'O campo FILHOS  é obrigatório',
            'complement.zipcode.required'          => 'O campo CEP  é obrigatório',
            'complement.address.required'          => 'O campo LOGRADOURO  é obrigatório',
            'complement.neighborhood.required'     => 'O campo BAIRRO  é obrigatório',
            'complement.complement.required'       => 'O campo COMPLEMENTO  é obrigatório',
            'complement.city.required'             => 'O campo CIDADE  é obrigatório',
            'complement.state.required'            => 'O campo ESTADO  é obrigatório',


            //max
            'name.max'             => 'NOME não deve ser maior que 255 DÍGITOS',
            'email.max'            => 'E-MAIL não deve ser maior que 255 DÍGITOS',
            'cpf.size'             => 'O campo CPF deve ter exatamente 14 DÍGITOS - ex 000.000.000-00',
            'dispatcher.max'       => 'ORGÃO EXPEDIDOR não deve ser maior que 20 DÍGITOS (ex: SSP ou DETRAN)',

            'complement.gender.max'                => 'SEXO não deve ser maior que 1 CARACTER - ex M ou F',
            'complement.maritalstatus.max'         => 'ESTADO CIVIL não deve ser maior que 30 DÍGITOS',
            'complement.mother.max'                => 'NOME DA MÃE não deve ser maior que 120 DÍGITOS',
            'complement.father.max'                => 'NOME DO PAI não deve ser maior que 120 DÍGITOS',
            'complement.nationality.max'           => 'NACIONALIDADE não deve ser maior que 40 DÍGITOS',
            'complement.naturality.max'            => 'NATURALIDADE não deve ser maior que 40 DÍGITOS',
            'complement.children.max'              => 'FILHOS não deve ser maior que 3 DÍGITOS',
            'complement.zipcode.size'              => 'O campo CEP deve ter exatamente 10 DÍGITOS - ex 00.000-000',
            'complement.address.max'               => 'LOGRADOURO não deve ser maior que 255 DÍGITOS',
            'complement.neighborhood.max'          => 'BAIRRO não deve ser maior que 50 DÍGITOS',
            'complement.complement.max'            => 'COMPLEMENTO não deve ser maior que 100 DÍGITOS',
            'complement.city.max'                  => 'CIDADE não deve ser maior que 50 DÍGITOS',
            'complement.state.size'                => 'O campo ESTADO deve ter exatamente 2 DÍGITOS - ex RJ',




            'name.regex'                        => 'O campo NOME deve conter somente letras',
            'identity.regex'                    => 'O campo IDENTIDADE não pode conter letras (ex: 334.334.344-34 ou 99/333)',
            'dispatcher.regex'                  => 'O campo ORGÃO EXPEDIDOR deve conter somente letras',
            'complement.mother.regex'              => 'O campo MÃE deve conter somente letras',
            'complement.father.regex'              => 'O campo PAI deve conter somente letras',

        ];
}