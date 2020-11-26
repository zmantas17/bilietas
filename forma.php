    <?php 
    $klaidos = [
        "skrydzioNr" => false,
        "asmensKodas" => false,
        "vardas"=> false,
        "pavarde" => false,
        "isKur" => false,
        "iKur" => false,
        "kaina" => false,
        "bagazas" => false,
        "komentaras" => false,
        "errorsFound" => true
    ];
    if(!empty($_POST)){
        if(empty($_POST["skrydzioNr"])){
            $klaidos["skrydzioNr"] = "Neužpildytas skrydžio nr";
        }
        if(empty($_POST["asmensKodas"])){
            $klaidos["asmensKodas"] = "Neužpildytas asmens kodas";
        }
        if(strlen($_POST["asmensKodas"]) != 11){
            $klaidos["asmensKodas"] = "Asmens kodas turi atitikti Lietuvišką formatą";
        }
        if(empty($_POST["vardas"])){
            $klaidos["vardas"] = "Neužpildytas vardas";
        }
        if(strlen($_POST["vardas"]) > 100){
            $klaidos["vardas"] = "Vardas turi būti iki 100 simbolių";
        }
        if(empty($_POST["pavarde"])){
            $klaidos["pavarde"] = "Neužpildyta pavarde";
        }
        if(strlen($_POST['pavarde']) > 100){
            $klaidos["pavarde"] = "Pavardė turi būti iki 100 simbolių";
        }
        if(empty($_POST["isKurSkrendate"])){
            $klaidos["isKur"] = "Nepasirinkote iš kur skrendate";
        }
        if(empty($_POST["iKurSkrendate"])){
            $klaidos["iKur"] = "Nepasirinkote į kur skrendate";
        }
        if(empty($_POST["kaina"])){
            $klaidos["kaina"] = "Nepasirinkote kainos";
        }
        if(empty($_POST["bagazas"])){
            $klaidos["bagazas"] = "Nepasirinktas bagažo kiekis";
        }
        if(empty($_POST["komentaras"])){
            $klaidos["komentaras"] = "Neužpildytas komentaras";
        }
        else if(strlen($_POST["komentaras"]) < 50 || strlen($_POST["komentaras"]) > 1000){
            $klaidos["komentaras"] = "Komentaras turi būti nuo 50 iki 1000 simbolių.";
        }
        if(!empty($_POST["skrydzioNr"]) && !empty($_POST["asmensKodas"]) && !empty($_POST['vardas']) 
        && !empty($_POST['pavarde']) && !empty($_POST['isKurSkrendate']) && !empty($_POST['iKurSkrendate']) 
        && !empty($_POST['kaina']) && !empty($_POST['bagazas']) && !empty($_POST['komentaras'])){
            $klaidos["errorsFound"] = false;
        }

    }
    ?>
    <div class="container">
        <?php 
            foreach ($klaidos as $key => $value) {
                if($value != false && $key != "errorsFound"){
                    echo('<div class="alert alert-danger" role="alert">'.$value.'</div>');
                }
            }
        ?>
        <form action="index.php" method="POST">
            <div class="form-group">
                <label for="skrydzioNr">Skrydžio numeriai</label>
                <select id="skrydzioNr" name="skrydzioNr" class="form-control">
                    <option selected disabled>Pasirinkimai ...</option>
                    <?php
                    foreach ($skrydziai as $skrydzioNr) {
                        echo "<option value=\"$skrydzioNr\">$skrydzioNr</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="asmensKodas">Asmens kodas</label>
                <input type="number" name = "asmensKodas" class="form-control" id="asmensKodas">
            </div>
            <div class="row">
                <div class="col">
                    <label for="vardas">Vardas</label>
                    <input type="text" name = "vardas" class="form-control" id="vardas">
                </div>
                <div class="col">
                    <label for="pavarde">Pavardė</label>
                    <input type="text" name = "pavarde" class="form-control" id="pavarde">
                </div>
            </div><br>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="isKurSkrendate">Iš kur skrendate</label>
                    <select id="isKurSkrendate" name = "isKurSkrendate" class="form-control">
                        <option selected disabled>Pasirinkimai...</option>
                        <?php
                        foreach ($skrydziaiIs as $isKurSkrendate) {
                            echo "<option value=\"$isKurSkrendate\">$isKurSkrendate</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="iKurSkrendate">Į kur skrendate</label>
                    <select id="iKurSkrendate" name = "iKurSkrendate" class="form-control">
                        <option selected disabled>Pasirinkimai...</option>
                        <?php
                        foreach ($skrydziaiI as $iKurSkrendate) {
                            echo "<option value=\"$iKurSkrendate\">$iKurSkrendate</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="kaina">Kaina</label>
                    <input type="number" name = "kaina" class="form-control" id="kaina">
                </div>
                <div class="form-group col-md-8">
                    <label for="bagazas">Bagažas</label>
                    <select id="bagazas" name = "bagazas" class="form-control">
                        <option selected disabled>Pasirinkimai ...</option>
                        <?php
                        foreach ($bagazai as $key => $bagazas) {
                            echo "<option value=\"$key\">$bagazas</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="komentaras">Komentaras</label>
                <textarea class="form-control" name="komentaras" id="komentaras" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Spausdinti</button>
        </form>
    </div>