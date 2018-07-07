<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Filmes: Treta Infinita</title>
        <link rel="shortcut icon" href="favicon.ico">
        <link rel="icon" href="favicon.ico">
        <link rel="stylesheet" type="text/css" href="style/style2.css">
        <?php
        DEFINE("ROOT_PATH", dirname(__FILE__) . "/");
        include ( ROOT_PATH . "/functions/connectionDB.php");
        include ( ROOT_PATH . "/functions/math.php");
        include ( ROOT_PATH . "/functions/insertDB.php");
        //verificação de existencia do arquivo ownerdata
        if(!file_exists(ROOT_PATH ."/functions/Resultado.txt")){
            shell_exec("python C:\\wamp\\www\\ProjetoFinal\\functions\\script.py");
        }
	//transferencia de dados do script python para array associativo
        $rowtransf = 1;
        if (($handle = fopen(ROOT_PATH . "functions/Resultados.txt", "r")) !== FALSE) {
			while (($data = fgetcsv($handle, $lenght = 0, $delimiter = ",", $escape = "\\")) !== FALSE) {
				$num = count($data);
				$csv[] = $data;
				//echo "<p> $num campos na linha $rowtransf: <br /></p>\n";
				$rowtransf++;
			/*      for ($c = 0; $c < $num; $c++) {
					echo $data[$c] . "<br />\n";
				}   */
			}	
		fclose($handle);
		}
	    //print_r($csv);
        $max_index_transf = (count($csv))-1;
        ?>
        <title>Filmes: Treta Infinita</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script>    
    <?php
$sqlmasterDC = "SELECT * FROM filmes2 WHERE franquia = 'DC' ORDER BY ano ";
$resultmasterDC = mysqli_query($pcon, $sqlmasterDC);
$datamasterDC = array();
while ($row = mysqli_fetch_assoc($resultmasterDC)) {
    $datamasterDC[] = $row;
}
$max_indexmasterDC = (count($datamasterDC));
$tempoDC = $max_indexmasterDC - 1;

$sqlmasterMA = "SELECT * FROM filmes2 WHERE franquia = 'MARVEL' ORDER BY ano ";
$resultmasterMA = mysqli_query($pcon, $sqlmasterMA);
$datamasterMA = array();
while ($row = mysqli_fetch_assoc($resultmasterMA)) {
    $datamasterMA[] = $row;
}
$max_indexmasterMA = (count($datamasterMA));
$tempoMA = $max_indexmasterMA -1;
$sqlmasterCO = "SELECT * FROM filmes2 WHERE franquia = 'CONTROLE' ORDER BY ano ";
$resultmaster = mysqli_query($pcon, $sqlmasterCO);
$datamasterCO = array();
while ($row = mysqli_fetch_assoc($resultmasterCO)) {
    $datamasterCO[] = $row;
}
$max_indexmasterCO = (count($datamasterCO));
$tempoCO = $max_indexmasterCO -1;
?>
</script>        
        <style>
            body {
                font: 400 15px/1.8 Lato, sans-serif;
                color: #777;
            }
            h3, h4 {
                margin: 10px 0 30px 0;
                letter-spacing: 10px;      
                font-size: 20px;
                color: #111;
            }
            .container {
                padding: 80px 120px;
            }
            .person {
                border: 10px solid transparent;
                margin-bottom: 25px;
                width: 80%;
                height: 80%;
                opacity: 0.7;
            }
            .person:hover {
                border-color: #f1f1f1;
            }
            .carousel-inner img {
                -webkit-filter: grayscale(90%);
                filter: grayscale(90%); /* make all photos black and white */ 
                width: 100%; /* Set width to 100% */
                margin: auto;
                z-index: -20;
            }
            .carousel-caption h3 {
                color: #fff !important;
            }
            @media (max-width: 600px) {
                .carousel-caption {
                    display: none; /* Hide the carousel text when the screen is less than 600 pixels wide */
                }
            }
            .bg-1 {
                background: #2d2d30;
                color: #bdbdbd;
            }
            .bg-1 h3 {color: #fff;}
            .bg-1 p {font-style: italic;}
            .list-group-item:first-child {
                border-top-right-radius: 0;
                border-top-left-radius: 0;
            }
            .list-group-item:last-child {
                border-bottom-right-radius: 0;
                border-bottom-left-radius: 0;
            }
            .thumbnail {
                padding: 0 0 15px 0;
                border: none;
                border-radius: 0;
            }
            .thumbnail p {
                margin-top: 15px;
                color: #555;
            }
            .btn {
                padding: 10px 20px;
                background-color: #333;
                color: #f1f1f1;
                border-radius: 0;
                transition: .2s;
            }
            .btn:hover, .btn:focus {
                border: 1px solid #333;
                background-color: #fff;
                color: #000;
            }
            .modal-header, h4, .close {
                background-color: #333;
                color: #fff !important;
                text-align: center;
                font-size: 30px;
            }
            .modal-header, .modal-body {
                padding: 40px 50px;
            }
            .nav-tabs li a {
                color: #777;
            }

            .navbar {
                font-family: Montserrat, sans-serif;
                margin-bottom: 0;
                background-color: #2d2d30;
                border: 0;
                font-size: 11px !important;
                letter-spacing: 4px;
                opacity: 0.9;
            }
            .navbar li a, .navbar .navbar-brand { 
                color: #d5d5d5 !important;
            }
            .navbar-brand{
                -webkit-filter: grayscale(90%);
                filter: grayscale(90%);
            }
            .navbar-nav li a:hover {
                color: #fff !important;
            }
            .navbar-nav li.active a {
                color: #fff !important;
                background-color: #29292c !important;
            }
            .navbar-default .navbar-toggle {
                border-color: transparent;
            }
            .open .dropdown-toggle {
                color: #fff;
                background-color: #555 !important;
            }
            .dropdown-menu li a {
                color: #000 !important;
            }
            .dropdown-menu li a:hover {
                background-color: red !important;
            }
            footer {
                background-color: #2d2d30;
                color: #f5f5f5;
                padding: 32px;
            }
            footer a {
                color: #f5f5f5;
            }
            footer a:hover {
                color: #777;
                text-decoration: none;
            }  
            .form-control {
                border-radius: 0;
            }
            textarea {
                resize: none;
            }
            .datat {
                margin: 0 auto;
                float: none;
            }
            .graficos {
                padding-left: 0;
                padding-right: 0;
                margin-left: auto;
                margin-right: auto;
                display: block;
                width: 800px;
            }
        </style>
    </head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">
<!--header-->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">
                    <img src="data/logo.jpeg" alt="log" width="128" height="41">
                </a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#myPage">INÍCIO</a></li>
                    <li><a href="#mot">MOTIVAÇÃO</a></li>
                    <li><a href="#DC_money">GRÁFICOS OBTIDOS</a></li>
                    <li><a href="#dadosobtm">DADOS OBTIDOS</a></li>
                    <li><a href="#datat">TABELA DE DADOS</a></li>
                    <li><a href="#footerA">AUTORES</a></li>
                </ul>
            </div>
        </div>
    </nav>
<!--Carousel-->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="data/foto_m1.jpg" alt="Avengers1" width="1200" height="700">
                <div class="carousel-caption">
                    <h3>MARVEL - The Avengers (2012)</h3>
                    <p>Os heróis mais poderosos da Terra devem se unir e aprender a lutar como uma equipe se eles vão impedir que o pernicioso Loki e seu exército alienígena escravizem a humanidade.</p>
                </div>      
            </div>

            <div class="item">
                <img src="data/foto_dc1.png" alt="JL" width="1200" height="700">
                <div class="carousel-caption">
                    <h3>DC - Justice League (2017)</h3>
                    <p>Alimentado por sua fé restaurada na humanidade e inspirado pelo ato abnegado do Super-Homem, Bruce Wayne pede a ajuda de sua recém-encontrada aliada, Diana Prince, para enfrentar um inimigo ainda maior.</p>
                </div>      
            </div>

            <div class="item">
                <img src="data/foto_m2.png" alt="Avengers3" width="1200" height="700">
                <div class="carousel-caption">
                    <h3>MARVEL - Avengers: Infinity War Part 1 (2018)</h3>
                    <p>Os Vingadores e seus aliados devem estar dispostos a sacrificar tudo em uma tentativa de derrotar o poderoso Thanos antes que sua explosão de devastação e ruína ponha fim ao universo.</p>
                </div>      
            </div>

            <div class="item">
                <img src="data/foto_dc2.jpg" alt="BvsS" width="1200" height="700">
                <div class="carousel-caption">
                    <h3>DC - Batman vs Superman: The Dawn of the Justice (2016)</h3>
                    <p>Temendo que as ações do Super-Homem sejam deixadas sem controle, Batman enfrenta o Homem de Aço, enquanto o mundo luta com o tipo de herói que realmente precisa.</p>
                </div>      
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <!-- Container (Analysis Section) -->
    <div id="mot" class="container text-center">
        <h3>A MOTIVAÇÂO</h3>
        <p><em>Qual é a melhor? DC ou Marvel?</em></p>
        <p>Com o passar do tempo, assistimos, lemos ou ouvimos conteúdo acerca de heróis e seus grandes feitos. Diferente das sagas de outrora, contadas por pessoas ao redor do globo, heróis da idade moderna possuem publicaçoes que remontam a duas principais empresas: Marvel Comics e DC Comics. Tais empresas possuem seus representantes no cinema, aos quais nomeiam como MCU e DCEU. Esta análise visa comparar críticas, orçamentos, renda dos filmes de tais universos. Salientamos como autores do projeto, que este utilizou DataMinning, DataScrapping, Statistic Processment entre outras tecnologias para obter a tão famigerada resposta a questão que todos os nerds tem em mente. Marvel ou DC?</p>
        <br>
    </div>

    <!-- Container (Graph Section1) -->
    <div id ="graph1" class='bg-1'>
        <canvas id='DC_money'></canvas>
        <br />
        <canvas id ="Marvel_money"></canvas>
        <br />
        <canvas id ="DC_critics"></canvas>
        <br />
        <canvas id ="Marvel_critics"></canvas>
        <br />
    </div>

        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">×</button>
                        <h4><span class="glyphicon glyphicon-lock"></span> Tickets</h4>
                    </div>
                    <div class="modal-body">
                        <form role="form">
                            <div class="form-group">
                                <label for="psw"><span class="glyphicon glyphicon-shopping-cart"></span> Tickets, $23 per person</label>
                                <input type="number" class="form-control" id="psw" placeholder="How many?">
                            </div>
                            <div class="form-group">
                                <label for="usrname"><span class="glyphicon glyphicon-user"></span> Send To</label>
                                <input type="text" class="form-control" id="usrname" placeholder="Enter email">
                            </div>
                            <button type="submit" class="btn btn-block">Pay 
                                <span class="glyphicon glyphicon-ok"></span>
                            </button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal">
                            <span class="glyphicon glyphicon-remove"></span> Cancel
                        </button>
                        <p>Need <a href="#">help?</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Container (Contact Section) -->
    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#dadosobt1">Normalização</a></li>
        <li><a data-toggle="tab" href="#menu1">Testes T-Student Intra-Franquias</a></li>
        <li><a data-toggle="tab" href="#menu2">Correlação de Pearson</a></li>
        <li><a data-toggle="tab" href="#menu3">Testes T-Student Inter-Franquias</a></li>
    </ul>

    <div id="dadosobtm" class="tab-content">
        <div id="dadosobt1" class="tab-pane fade in active">
            <div id="subdata1" class="container text-center">
                <h2>Os dados obtidos se encontram normalizados?</h2>
                <p> O teste foi executado através da função shapiro() da biblioteca Scipy do Python, o resultado é a estatística W bicaudal.
                    Partindo da hipótese h0 que os dados são normais com 10% de significância.
                    O tamanho do conjunto da Marvel é 19, e a DC 8. Logo, o W-tabelado para Marvel é 0,901 e para DC 0,818.
                    Como observado nos resultados, todos os testes caem na região de aceitação (W calc menor que W tabelado), logo, todos os dados são normais.</p>
                <br />
                <p><em>Testes Realizados para este caso:</em></p>
                <?php
                for($i=0;$i<=7;$i++){
                        $temp1a = $csv[$i][0];
                        $temp1b = $csv[$i][1];
                        $temp1c = $csv[$i][2];
                        $temp1d = $csv[$i][3];
                        $temp1e = $csv[$i][4];
                        $string1 = "<p>".$csv[$i][0].":".$csv[$i][1].",".$csv[$i][2].", w_calculado->".$csv[$i][3].", probabilidade->".$csv[$i][4]."</p>";                        
                        echo $string1;
                        }
                ?>
            </div>
        </div>
        <div id="menu1" class="tab-pane fade">
            <div id="subdata2" class="container text-center">
                <h2>Testes T-Student Intra-Franquias</h2>
                <p>     Com a premissa de que os dados são normalizados, usaremos a distribuição t-student para realizar as posteriores análises. Com 10% de significância, o t-tabelado
                para Marvel é de 3,61 e da DC 4,5</p>
                <p>     A primeira pergunta é: A opinião dos críticos reflete a opinião do público? h0: 
                Para isso, usaremos três avaliações diferentes: IMDB (público), Rottentomatoes (misto de público e críticos) e Metacritic (apenas críticos)</p>
                <p><em>Marvel Comics:</em></p>
                <p>IMDB vs Metacritic - O resultado t-calculado foi 3,13, logo aceita-se h0 e conclui que sim, a opinião dos críticos representa a do público.</p>
                <p>IMDB vs Rottentomatoes - O resultado t-calculado foi 3,49, logo aceita-se h0 e conclui que sim, a opinião mista representa a do público.</p>
                <p>Metacritic vs Rottentomatoes - O resultado t-calculado foi 5,42, logo rejeita-se h0 e conclui que não é possível afirmar que a opinião mista representa a opinião dos críticos.</p>
                <p><em>DC Comics:</em></p>
                <p>IMDB vs Metacritic - O resultado t-calculado foi 1,89, logo aceita-se h0 e conclui que sim, a opinião dos críticos representa a do público.</p>
                <p>IMDB vs Rottentomatoes - O resultado t-calculado foi 1,03, logo aceita-se h0 e conclui que sim, a opinião mista representa a do público.</p>
                <p>Metacritic vs Rottentomatoes - O resultado t-calculado foi 0,16, logo aceita-se h0 e conclui que sim, a opinião mista representa a dos críticos.</p>
                <br />
                <p><em>Testes Realizados para este caso:</em></p>
                <?php
                for($i=8;$i<14;$i++){
                        $temp2a = $csv[$i][0];
                        $temp2b = $csv[$i][1];
                        $temp2c = $csv[$i][2];
                        $temp2d = $csv[$i][3];
                        $temp2e = $csv[$i][4];
                        $string2 = "<p>".$csv[$i][0].":".$csv[$i][1].",".$csv[$i][2].", t_calculado->".$csv[$i][3].", probabilidade->".$csv[$i][4]."</p>";                        
                        echo $string2;
                        }
                    
                ?>
            </div>
        </div>
        <div id="menu2" class="tab-pane fade">
            <div id="subdata3" class="container text-center">
                <h2>Coeficiente de Correlação de Pearson</h2>
                <p>     Outra resposta interessante que podemos extrair do nosso conjunto é se há alguma relação entre as avaliações e a renda.</p>
                <p>     Para chegarmos a tal conclusão, usaremos o Coeficiente de Correlação de Pearson, que é um valor numérico definido como:</p>
                <p> +1 - forte relação entre os dados, perfeita positiva, ou seja, se um valor aumenta o outro aumenta;</p>
                <p> +0 - as variáveis não dependem uma da outra; </p>
                <p> -1 - forte relação entre os dados, perfeita negativa, ou seja, se um valor aumenta o outro diminui.</p>
                <p><em>Marvel Comics:</em></p>
                <p>IMDB em relação a renda mundial - Coeficiente de Pearson: 0,68 - Indica uma correlação média-alta entre os dados;</p>
                <p>Metacritic em relação a renda mundial - Coeficiente de Pearson: 0,31 - Indica uma correlação média-baixa entre os dados;</p>
                <p>Rottentomatoes em relação a renda mundial - Coeficiente de Pearson: 0,34 - Indica uma correlação média-baixa entre os dados.</p>
                <p><em>DC Comics:</em></p>
                <p>IMDB em relação a renda mundial - Coeficiente de Pearson: 0,24 - Indica uma correlação baixa entre os dados;</p>
                <p>Metacritic em relação a renda mundial - Coeficiente de Pearson: 0,32 - Indica uma correlação média-baixa entre os dados;</p>
                <p>Rottentomatoes em relação a renda mundial - Coeficiente de Pearson: 0,18 - Indica uma correlação baixa entre os dados.</p>
                <br />
                <p><em>Testes Realizados para este caso:</em></p>
                <?php
                for($i=14;$i<20;$i++){
                        $temp3a = $csv[$i][0];
                        $temp3b = $csv[$i][1];
                        $temp3c = $csv[$i][2];
                        $temp3d = $csv[$i][3];
                        $temp3e = $csv[$i][4];
                        $temp3f = $csv[$i][5];
                        $string3 = "<p>".$csv[$i][0].":".$csv[$i][1].",".$csv[$i][2]." e ".$csv[$i][3].", t_calculado->".$csv[$i][4].", probabilidade->".$csv[$i][5]."</p>";                        
                        echo $string3;
                        }
                ?>
            </div>
        </div>>
        <div id="menu3" class="tab-pane fade">
            <div id="subdata4" class="container text-center">
                <h2>    Testes T-Student Inter-Franquias</h2>
                <p>     Finalmente, compararemos as duas franquias, agora, usando um teste t-student unicaudal pois, como as médias da Marvel são maiores, verificaremos
                    se elas são significativamente maiores com 10% de significância. O t-tabelado é de 3,61.</p>
                <p>h0: A média da Marvel é maior que a da DC.</p>
                <p><em>IMDB Marvel vs IMDB DC:</em></p>
                <p> t-calc = 0,25, cai na região de aceitação, logo, aceita-se h0, então as notas IMDB da Marvel são maiores que a da DC com 10%
                    de significância.</p>
                <p><em>Metacritic Marvel vs Metacritic DC:</em></p>
                <p> t-calc = 1,45, cai na região de aceitação, logo, aceita-se h0, então as notas Metacritic da Marvel são maiores que a da DC 
                    com 10% de significância.</p>
                <p><em>Rottentomatoes Marvel vs Rottentomatoes DC:</em></p>
                <p> t-calc = 2,8, cai na região de aceitação, logo, aceita-se h0, então as notas Rottentomatoes da Marvel são maiores que
                    a da DC com 10% de significância.</p>
                <p><em>Renda Marvel vs Renda DC:</em></p>
                <p> t-calc = 0,61, cai na região de aceitação, logo, aceita-se h0, então as rendas da Marvel são maiores que a da DC com 10% de 
                    significância.</p>
                <br />
                <p><em>Testes Realizados para este caso:</em></p>
                <?php
                for($i=20;$i<23;$i++){
                        $temp4a = $csv[$i][0];
                        $temp4b = $csv[$i][1];
                        $temp4c = $csv[$i][2];
                        $temp4d = $csv[$i][3];
                        $temp4e = $csv[$i][4];
                        $string4 = "<p>".$csv[$i][0].":".$csv[$i][1].",".$csv[$i][2].", t_calculado->".$csv[$i][3].", probabilidade->".$csv[$i][4]."</p>";                        
                        echo $string4;
                        }
                ?>
            </div>
        </div>
    </div>
    <div id="datat" class="bg-1">
        <div id="datats" class="container text-center">
        <h2>Tabela de Dados</h2>
        <table class="tab-content">
            <thread>
                <tr>
                    <th>Identificador IMDB</th>
                    <th>Nome do Filme</th>
                    <th>Nota do IMDB</th>
                    <th>Nota do Metacritic</th>
                    <th>Nota do RottenTomatoes</th>
                    <th>WorldWide Income</th>
                    <th>Box Income</th>
                    <th>Orçamento</th>
                    <th>Franquia</th>
                    <th>Ano</th>
                </tr>
            </thread>
            <tbody>
                    <?php
					
					$endi = '<td>';
					$endt = '</td>';
					$countdc = count($datamasterDC);
					$countma = count($datamasterMA);
                    for($dc = 0;$dc<$countdc;$dc++){
                        echo '<tr>';
						echo $endi.$datamasterDC[$dc]['urif'].$endt;
						echo $endi.$datamasterDC[$dc]['filme'].$endt;
						echo $endi.$datamasterDC[$dc]['imdb_rating'].$endt;
						echo $endi.$datamasterDC[$dc]['metacritic_rating'].$endt;
						echo $endi.$datamasterDC[$dc]['rottentomatoes_rating'].$endt;
						echo $endi.$datamasterDC[$dc]['ww_income'].$endt;
						echo $endi.$datamasterDC[$dc]['box_income'].$endt;
						echo $endi.$datamasterDC[$dc]['budget'].$endt;
						echo $endi.$datamasterDC[$dc]['franquia'].$endt;
						echo $endi.$datamasterDC[$dc]['ano'].$endt;
                        echo '</tr>';
                    }
                    for($ma= 0;$ma<$countma;$ma++){
                        echo '<tr>';
                        echo $endi.$datamasterMA[$ma]['urif'].$endt;
						echo $endi.$datamasterMA[$ma]['filme'].$endt;
						echo $endi.$datamasterMA[$ma]['imdb_rating'].$endt;
						echo $endi.$datamasterMA[$ma]['metacritic_rating'].$endt;
						echo $endi.$datamasterMA[$ma]['rottentomatoes_rating'].$endt;
						echo $endi.$datamasterMA[$ma]['ww_income'].$endt;
						echo $endi.$datamasterMA[$ma]['box_income'].$endt;
						echo $endi.$datamasterMA[$ma]['budget'].$endt;
						echo $endi.$datamasterMA[$ma]['franquia'].$endt;
						echo $endi.$datamasterMA[$ma]['ano'].$endt;
                        echo '</tr>';
                    }
                    ?>
            </tbody>            
        </table>
    </div>
    </div>
<!-- Footer -->
<footer id="footerA" class="text-center">
    <a class="up-arrow" href="#myPage" data-toggle="tooltip" title="TO TOP">
        <span class="glyphicon glyphicon-chevron-up"></span>
    </a><br><br>
    <p>Análise Realizada por: Cavassin, Levy e Zé, discentes de CS030-UTFPR-201801, Orientados pelos professores: Luiz Celso Gomes Jr.[DAINF] e José Carlos [DAMAT].</p> 
</footer>
<!--script dos graficos-->
<script>
    var config1 = {
        type: 'line',
        data: {
            labels: [<?php
                for ($i = 0; $i < $max_indexmasterDC; $i++) {
                    if ($i == $tempoDC) {
                        echo"'{$datamasterDC[$i]['filme']}'";
                    } else {
                        echo"'{$datamasterDC[$i]['filme']}',";
                    }
                }//for
                    ?>],
            datasets: [{
                    label: "WorldWide Income",
                    fill:false,
                    backgroundColor: 'rgb(255,255,255)',
                    borderColor: 'rgb(255,255,255)',
                    data: [<?php
                        for ($i = 0; $i < $max_indexmasterDC; $i++) {
                            if ($i == $tempoDC) {
                                echo"{$datamasterDC[$i]['ww_income']}";
                            } else {
                                echo"{$datamasterDC[$i]['ww_income']},";
                            }
                        }//for
                        ?>]
                        },
                        {
                    label: "Box Office",
                    fill:false,
                    backgroundColor: 'rgb(100,100,100)',
                    borderColor: 'rgb(100,100,100)',
                    data: [<?php
                        for ($i=0; $i < $max_indexmasterDC; $i++){
                            if ($i == $tempoDC) {
                                echo"{$datamasterDC[$i]['box_income']}";
                            } else {
                                echo"{$datamasterDC[$i]['box_income']},";
                            }
                        }//for
                        ?>]    
                        },
                        {
                    label: "Orçamento",
                    fill:false,
                    backgroundColor: 'rgb(178,187,91)',
                    borderColor: 'rgb(178,187,91)',
                    data: [<?php
                        for ($i=0; $i < $max_indexmasterDC; $i++){
                            if ($i == $tempoDC) {
                                echo"{$datamasterDC[$i]['budget']}";
                            } else {
                                echo"{$datamasterDC[$i]['budget']},";
                            }
                        }//for
                        ?>]    
                        }
                    ]
                },
            options: {
                responsive: true,
                title: {
                    display:true,
                    text: 'Renda DCEU'
                }   
            }};

    var config2 = {
        type: 'line',
        // The data for our dataset
        data: {
            labels: [<?php
                for ($i = 0; $i < $max_indexmasterMA; $i++) {
                    if ($i == $tempoMA) {
                        echo"'{$datamasterMA[$i]['filme']}'";
                    } else {
                        echo"'{$datamasterMA[$i]['filme']}',";
                    }
                }//for
                    ?>],
            datasets: [{
                    label: "WorldWide Income",
                    fill:false,
                    backgroundColor: 'rgb(255,255,255)',
                    borderColor: 'rgb(255,255,255)',
                    data: [<?php
                        for ($i = 0; $i < $max_indexmasterMA; $i++) {
                            if ($i == $tempoMA) {
                                echo"{$datamasterMA[$i]['ww_income']}";
                            } else {
                                echo"{$datamasterMA[$i]['ww_income']},";
                            }
                        }//for
                        ?>]
                        },
                        {
                    label: "Box Office",
                    fill:false,
                    backgroundColor: 'rgb(100,100,100)',
                    borderColor: 'rgb(100,100,100)',
                    data: [<?php
                        for ($i=0; $i < $max_indexmasterMA; $i++){
                            if ($i == $tempoMA) {
                                echo"{$datamasterMA[$i]['box_income']}";
                            } else {
                                echo"{$datamasterMA[$i]['box_income']},";
                            }
                        }//for
                        ?>]    
                        },
                        {
                    label: "Orçamento",
                    fill:false,
                    backgroundColor: 'rgb(178,187,91)',
                    borderColor: 'rgb(178,187,91)',
                    data: [<?php
                        for ($i=0; $i < $max_indexmasterMA; $i++){
                            if ($i == $tempoMA) {
                                echo"{$datamasterMA[$i]['budget']}";
                            } else {
                                echo"{$datamasterMA[$i]['budget']},";
                            }
                        }//for
                        ?>]    
                        }
                    ]
                },
            options: {
                responsive: true,
                title: {
                    display:true,
                    text: 'Renda MARVEL'
                }  
            }};
        var config3 = {
        type: 'line',
        data: {
            labels: [<?php
                for ($i = 0; $i < $max_indexmasterDC; $i++) {
                    if ($i == $tempoDC) {
                        echo"'{$datamasterDC[$i]['filme']}'";
                    } else {
                        echo"'{$datamasterDC[$i]['filme']}',";
                    }
                }//for
                    ?>],
            datasets: [{
                    label: "Nota IMDB (Nota Usuários)",
                    fill:false,
                    backgroundColor: 'rgb(255,255,255)',
                    borderColor: 'rgb(255,255,255)',
                    data: [<?php
                        for ($i = 0; $i < $max_indexmasterDC; $i++) {
                            if ($i == $tempoDC) {
                                echo"{$datamasterDC[$i]['imdb_rating']}";
                            } else {
                                echo"{$datamasterDC[$i]['imdb_rating']},";
                            }
                        }//for
                        ?>]
                        },
                        {
                    label: "Nota Metacritic (Criticos)",
                    fill:false,
                    backgroundColor: 'rgb(100,100,100)',
                    borderColor: 'rgb(100,100,100)',
                    data: [<?php
                        for ($i=0; $i < $max_indexmasterDC; $i++){
                            if ($i == $tempoDC) {
                                echo"{$datamasterDC[$i]['metacritic_rating']}";
                            } else {
                                echo"{$datamasterDC[$i]['metacritic_rating']},";
                            }
                        }//for
                        ?>]    
                        },
                        {
                    label: "Nota RottenTomatoes (Mista)",
                    fill:false,
                    backgroundColor: 'rgb(178,187,91)',
                    borderColor: 'rgb(178,187,91)',
                    data: [<?php
                        for ($i=0; $i < $max_indexmasterDC; $i++){
                            if ($i == $tempoDC) {
                                echo"{$datamasterDC[$i]['rottentomatoes_rating']}";
                            } else {
                                echo"{$datamasterDC[$i]['rottentomatoes_rating']},";
                            }
                        }//for
                        ?>]    
                        }
                    ]
                },
            options: {
                responsive: true,
                title: {
                    display:true,
                    text: 'Avaliação DCEU'
                }   
            }};
var config4 = {
        type: 'line',
        data: {
            labels: [<?php
                for ($i = 0; $i < $max_indexmasterMA; $i++) {
                    if ($i == $tempoMA) {
                        echo"'{$datamasterMA[$i]['filme']}'";
                    } else {
                        echo"'{$datamasterMA[$i]['filme']}',";
                    }
                }//for
                    ?>],
            datasets: [{
                    label: "Nota IMDB (Nota Usuários)",
                    fill:false,
                    backgroundColor: 'rgb(255,255,255)',
                    borderColor: 'rgb(255,255,255)',
                    data: [<?php
                        for ($i = 0; $i < $max_indexmasterMA; $i++) {
                            if ($i == $tempoMA) {
                                echo"{$datamasterMA[$i]['imdb_rating']}";
                            } else {
                                echo"{$datamasterMA[$i]['imdb_rating']},";
                            }
                        }//for
                        ?>]
                        },
                        {
                    label: "Nota Metacritic (Criticos)",
                    fill:false,
                    backgroundColor: 'rgb(100,100,100)',
                    borderColor: 'rgb(100,100,100)',
                    data: [<?php
                        for ($i=0; $i < $max_indexmasterMA; $i++){
                            if ($i == $tempoMA) {
                                echo"{$datamasterMA[$i]['metacritic_rating']}";
                            } else {
                                echo"{$datamasterMA[$i]['metacritic_rating']},";
                            }
                        }//for
                        ?>]    
                        },
                        {
                    label: "Nota RottenTomatoes (Mista)",
                    fill:false,
                    backgroundColor: 'rgb(178,187,91)',
                    borderColor: 'rgb(178,187,91)',
                    data: [<?php
                        for ($i=0; $i < $max_indexmasterMA; $i++){
                            if ($i == $tempoMA) {
                                echo"{$datamasterMA[$i]['rottentomatoes_rating']}";
                            } else {
                                echo"{$datamasterMA[$i]['rottentomatoes_rating']},";
                            }
                        }//for
                        ?>]    
                        }
                    ]
                },
            options: {
                responsive: true,
                title: {
                    display:true,
                    text: 'Avaliação MCU'
                }   
            }};
    
window.onload = function(){
        var ctx = document.getElementById('DC_money').getContext('2d');
        var dtx = document.getElementById('Marvel_money').getContext('2d');
        var etx = document.getElementById('DC_critics').getContext('2d');
        var ftx = document.getElementById('Marvel_critics').getContext('2d');
        window.myBar = new Chart(ctx, config1);
        window.myBar2 = new Chart(dtx, config2);
        window.myBar3 = new Chart(etx, config3);
        window.myBar4 = new Chart(ftx, config4);
    };
</script>
<!--scirpt de fade-->
<script>
    $(document).ready(function () {
        // Initialize Tooltip
        $('[data-toggle="tooltip"]').tooltip();

        // Add smooth scrolling to all links in navbar + footer link
        $(".navbar a, footer a[href='#myPage']").on('click', function (event) {

            // Make sure this.hash has a value before overriding default behavior
            if (this.hash !== "") {

                // Prevent default anchor click behavior
                event.preventDefault();

                // Store hash
                var hash = this.hash;

                // Using jQuery's animate() method to add smooth page scroll
                // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
                $('html, body').animate({
                    scrollTop: $(hash).offset().top
                }, 900, function () {

                    // Add hash (#) to URL when done scrolling (default click behavior)
                    window.location.hash = hash;
                });
            } // End if
        });
    });
</script>
</body>
</html>