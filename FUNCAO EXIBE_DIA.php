<!DOCTYPE html>

<html lang="pt-br">
   
<head>

   <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   
      <title>FUNÇÃO EXIBE_DIA</title>
   
         <!--CSS-->
    
         <style type="text/css">
         
         #botao{
            
                display: block;

                float: left;

                width: auto;
            
                max-width: 100%;

                height: 50px;

                line-height: 50px;

                text-align: center;

                font-size: 15pt;

                color: #FFFFFF;

                background-color: rgba(0,0,0,0.5);
            
                padding: 1%;

        }
            
                #botao:hover{

                color: #FFFF00;
            
                cursor: pointer;

        }
            
    </style>

</head>
   
<body>
    
   <!-- PHP -->
    
   <?php
   
      //referência: 01/01/2017 - Domingo => para resto 0 (d-1);

      //referência ano bissexto: 2016 => 16;

      //Alguns comandos comentados são linhas de código para teste da função.

      function processa_dia($day,$month,$year){

         if ($year%4==0)
         {
            
         $extra = 1;
            
         }else{
    
         $extra = 0;
         
         }

         //vetor que referencia a conclusão do mês anterior---------------------------

         $mesref = array(0,31,(28+$extra),31,30,31,30,31,31,30,31,30);

         //posição 0 = mês 1 (m-1);

         //---------------------------------------------------------------------------

         $primeiro_resultado=365*($year-2017) + (int)(($year-2017)/4);

         //echo "$primeiro_resultado \r\n";

         $segundo_resultado = 0;

         for($cont=0;$cont<=($month-1);$cont++)
         {
               
               $segundo_resultado = $segundo_resultado+$mesref[$cont];

               //echo "$segundo_resultado \r\n";
         }

         return ($day+$primeiro_resultado+$segundo_resultado);

         //echo "$resultado_final \r\n";

      }

         //captura o fuso horário local, UTC +/-valor.
   
         //fonte: https://www.php.net/manual/pt_BR/ref.datetime.php .
   
         date_default_timezone_set("America/Fortaleza"); 

         //$datalocal = date("d/m/yy - H:i:s"); ou $datalocal = date("d/m/Y - H:i:s");

         $dia = date("d");

         $mes = date("m");

         $ano = date("Y");

         $resultado_final = processa_dia($dia,$mes,$ano);

         //echo "$resultado_final \r\n";

         $rest=($resultado_final-1)%7;

         $nomedia = array("Domingo","Segunda feira","Terça feira","Quarta feira","Quinta feira","Sexta feira","Sábado");
   
   ?>

   <div id="botao">
   <?php
      echo "$nomedia[$rest]&nbsp $dia/$mes/$ano";
   ?>
   </div>
   
</body>
   
</html>
