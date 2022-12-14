<?php

include_once("../class/UserController.class.php");

//nombre d'utilisateurs
$user = new UserController();
$result = count($user->getUser());

// //nombre de voyages
$nomVoyage = new VoyageController();
$nombVoyage = count($nomVoyage->getVoyage());

//la somme des prix 
$voyage = new VoyageController();
$sumPrice = 0;
foreach ($voyage->getVoyage() as $sum) {
    $sumPrice += $sum['prix'];
}

?>


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title> -->
    <!--Boostrap Icons CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style1.css">


    <!-- <body class="pt-5">  -->
    <div class="container">
        <h3 class="p-0"><i class="fa-solid fa-chart-line"></i>Mes statistiques</h3>
        <h5 class=" borderstyle p-2 text-light  d-flex justify-content-center">Statiques</h5>

        <div class="row g-3">
            <div class="col-lg-4 col-md-6">
                <div class="d-flex p-2">
                    <div>
                        <h1><i class="fa-sharp fa-solid fa-users"></i></h1>
                    </div>
                    <div>
                        <h3><?= $result ?></h3>
                        <h6>User</h6>
                    </div>
                </div>
            </div>


            <div class="col-lg-4 col-md-6">
                <div class="d-flex p-2">
                    <div>
                        <h1><i class="fa-sharp fa-solid fa-route"></i></h1>
                    </div>
                    <div>
                        <h3><?= $nombVoyage ?></h3>
                        <h6>voyages</h6>
                    </div>
                </div>
            </div>


            <div class="col-lg-4 col-md-6">
                <div class="d-flex p-2">
                    <div>
                        <h1><i class="bi bi-currency-euro"></i></h1>
                    </div>
                    <div>
                        <h3><?= $sumPrice ?></h3>
                        <p>prix</p>
                    </div>
                </div>
            </div>


            <div class="col-lg-4 col-md-6">
                <div class="d-flex p-2">
                    <div>
                        <h1><i class="fa-solid fa-sack-dollar"></i></h1>
                    </div>
                    <div>
                        <h3><?= $sumPrice ?> DH</h3>
                        <p>le revenue</p>
                    </div>
                </div>
            </div>



            <div class="col-lg-4 col-md-6">
                <div class="d-flex p-2">
                    <div>
                        <h1><i class="bi bi-currency-euro"></i></h1>
                    </div>
                    <div>
                        <h3>3290.99 DH</h3>
                        <p>chiffre d'affaire</p>
                    </div>
                </div>
            </div>


            <div class="col-lg-4 col-md-6">
                <div class="d-flex p-2">
                    <div>
                        <h1><i class="bi bi-currency-euro"></i></h1>
                    </div>
                    <div>
                        <h3>3290.99 DH</h3>
                        <p>chiffre d'affaire</p>
                    </div>
                </div>
            </div>


        </div>

        <h5 class=" borderstyle p-2 my-3 text-light d-flex justify-content-center "> Graphique Statistique</h5>
        <div class="row">
            <div class="col-lg-6">
                <canvas id="myChart1"></canvas>
            </div>
            <div class="col-lg-6">
                <canvas id="myChart2"></canvas>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script>
            const ctx1 = document.getElementById('myChart1');
            const ctx2 = document.getElementById('myChart2');

            new Chart(ctx1, {
                type: 'bar',
                data: {
                    labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                    datasets: [{
                        label: '# of Votes',
                        data: [12, 19, 3, 5, 2, 3],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
            new Chart(ctx2, {
                type: 'bar',
                data: {
                    labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                    datasets: [{
                        label: '# of Votes',
                        data: [12, 19, 3, 5, 2, 3],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>



    </div>

    <!-- </body>

</html> -->