<?php

function verify_data() {
    $data = "filmes2";
    $pcon = new mysqli("localhost", "root", "", "t1_beta");
    $sql = "SELECT * FROM filmes2";
    $resultado = $pcon->query($sql) OR trigger_error($pcon->error, E_USER_ERROR);
    $data_array = array();
    while ($row = mysqli_fetch_assoc($resultado)) {
        $data_array[] = $row;
    }
    if (count($data_array) == 0) {
        insertDB("filmes_dc", "DC");
        insertDB("filmes_m", "MARVEL");
        insertDB("filmes_controle", "CONTROLE");
        return 0; //retorna banco criado agora
        //código para remoção de dados inválidos[refazer]
    } else {
        return 1; //retorna banco ja existente
    }
}

function insertDB(string $bancoinicial, string $franchise) {
    include ( ROOT_PATH . "/functions/connectionDB.php");
    $ARRAY_IMDBd = array();
    $SQL2 = 'SELECT urif FROM ' . $bancoinicial;
    //print_r($SQL2);
    $result2 = $pcon->query($SQL2);
    while ($row = mysqli_fetch_assoc($result2)) {
        $ARRAY_IMDBd[] = $row;
    }
    for ($i = 0; $i < count($ARRAY_IMDBd); $i++) {
        $pcon = new mysqli("localhost", "root", "", "t1_beta");
        $tempf1 = $ARRAY_IMDBd[$i];
        $tempf2 = substr($tempf1['urif'], 26);
        $tempf3 = str_replace("/", "", $tempf2);
        $arrContextOprions = array(
            'ssl' => array(
                "verify_peer" => false,
                "verify_peer_name" => false,
            ),
        );
        $imdb = ("http://www.omdbapi.com/?i=" . $tempf3 . "&plot=full&apikey=8d3fc1c1&r=json");
        $imdb_content = file_get_contents($imdb);
        $imdb_json = json_decode($imdb_content);
        $imdb_urif = $tempf1;
        $imdb_urif = array_shift($imdb_urif);
        $imdb_title = $imdb_json->Title;
        $imdb_year = $imdb_json->Year;
        $tempg1 = $imdb_json->BoxOffice;
        $tempg2 = str_replace("$", "", $tempg1);
        $imdb_boxoff = (int) str_replace(",", "", $tempg2);
        $imdb_RATING = $imdb_json->Ratings[0]->Value;
        $imdb_RATING = str_replace("10", "", $imdb_RATING);
        $imdb_RATING = (int) str_replace(".", "", $imdb_RATING);
        $imdb_rotten = $imdb_json->Ratings[1]->Value;
        $imdb_rotten = (int) str_replace("%", "", $imdb_rotten);
        $imdb_metacritic = $imdb_json->Ratings[2]->Value;
        $imdb_metacritic = str_replace("100", "", $imdb_metacritic);
        $imdb_metacritic = (int) str_replace("/", "", $imdb_metacritic);
        $imdb_franchise = $franchise;
        $tmdb = ("https://api.themoviedb.org/3/movie/" . $tempf3 . "?api_key=c2e1a1c5180c0aab18123dcb59102147&language=en-US&external_source=imdb_id");
        $tmdb_content = file_get_contents($tmdb, false, stream_context_create($arrContextOprions));
        $tmdb_json = json_decode($tmdb_content);
        $tmdb_wwinc = (int) $tmdb_json->revenue;
        $tmdb_budget = (int) $tmdb_json->budget;
        print_r($tmdb_budget . '--');
        echo('passou' . $bancoinicial . '/n');
        $SQL_FILMES_D = 'INSERT INTO filmes2 (urif, filme, imdb_rating, metacritic_rating, rottentomatoes_rating, ww_income, box_income, budget, franquia, ano) VALUES (' . "'" . $imdb_urif . "'" . ',' . "'" . $imdb_title . "'" . ',' . $imdb_RATING . ',' . $imdb_metacritic . ',' . $imdb_rotten . ',' . $tmdb_wwinc . ',' . $imdb_boxoff . ',' . $tmdb_budget . ',' . "'" . $imdb_franchise . "'" . ',' . $imdb_year . ')';
        $pcon->query($SQL_FILMES_D);
    }
}
