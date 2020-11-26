<?php 

foreach ($klaidos as $value) {
    if($value != false || $klaidos['errorsFound'] == true){
        die();
    }
}
?>


<body>
    <div class="container my-5">
        <div class="row">
            <div class="col-sm-12 bg-dark text-white" >
                <div class="d-flex justify-content-center" >
                    <h2>Bilietas</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-7 bg-dark text-white " style="border-left: 1px black solid; border-top: 1px solid black;" >
                <h5 class="pb-3">Skrydžio nr: <?=htmlspecialchars($_POST['skrydzioNr'])?><h5>
                <h5 class="pb-3">Išvykimas iš: <?=htmlspecialchars($_POST['isKurSkrendate'])?><h5>
                <h5 class="pb-3">Atvykimas į: <?=htmlspecialchars($_POST['iKurSkrendate'])?> <h5>
            </div>

            <div class="col-sm-5 bg-dark text-white" style="border-left: 1px black solid; border-top: 1px black solid;">
                <h4 style="text-align: center;"><strong>Mokėjimas</strong></h4>
                <h5 style="background-color: darkred; color: white; text-align: center;">!!! Būtinai susimokėti 5 dienos nuo skrydžio!!!</h5>
                <h5><strong>Skrydžio kaina:</strong> <?=htmlspecialchars($_POST['kaina'])?>€</h5>
                <?php
                    if(htmlspecialchars($_POST['bagazas']) >= 20){
                        echo "<h4><strong>Bagažo kaina:</strong> 30€</h4>";
                        $suma = htmlspecialchars($_POST['kaina']) + 30;
                    } else {
                        $suma = htmlspecialchars($_POST['kaina']);
                    }
                ?>
                <h3><strong>Suma:</strong> <?=$suma?>€</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-7 d-flex justify-content-center bg-dark text-white" style="border: 1px black solid;">
                <p><strong>Jūsų komentaras:</strong> <?=htmlspecialchars($_POST['komentaras'])?></p>
            </div>
            <div class="col-sm-5 text-center justify-content-center bg-dark text-white" style="border-top: 1px black solid;">
                <h2>Keleiviai</h2><br>
                <p><?=htmlspecialchars($_POST['vardas'])?> <?=htmlspecialchars($_POST['pavarde'])?> (<?=htmlspecialchars(substr_replace($_POST['asmensKodas'],"",-4))?>****)</p>
            </div>
        </div>
            <!-- <button type="submit" class="btn btn-primary">Spausdinti</button> -->
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
</body>

</html>