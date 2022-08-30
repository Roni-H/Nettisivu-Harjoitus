<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Husqvarna</title>
    <link rel="icon" type="image/x-icon" href="assets/pikkukuva.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body id="page-top">
    <!--ALOITUS-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#page-top" style="background: -webkit-linear-gradient(#ff0000, #ffffff);  -webkit-background-clip: text;  -webkit-text-fill-color: transparent;">Husqvarna</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Valikko
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="index.html">Etusivu</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">Diagrammi</a></li>
                    <li class="nav-item"><a class="nav-link" href="#projects">Hiilidioksidipäästöt</a></li>
                    <li class="nav-item"><a class="nav-link" href="#taulukko">Taulukko</a></li>
                    <li class="nav-item"><a class="nav-link" href="#sql">Lomake</a></li>
                    <li class="nav-item"><a class="nav-link" href="#signup">Ota yhteyttä</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <section class="about-section text-center" id="about">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8">
                    <h1 class="text-white mb-12">CO2-Laskuri</h1>
                </div>
                <p>

                </p>
            </div>
        </div>
    </section>
    <!-- 1. LASKU-->
    <nav class="navbar navbar-expand-lg signup-section text-center" id="about">
        <div class="container px-4 px-lg-5">
            <canvas id="myChart" style="width:100%;max-width:1450px;background-color:rgba(102, 102, 102, 0.98);border-radius:2.5em;"></canvas>
            <script>
                var xValues = ["2012", "2013", "2014", "2015", "2016", "2017", "2018", "2019", "2020", "2021", "2022"];
                var yValues = [7, 8, 8, 9, 9, 9, 10, 12, 13, 14, 15];
                /*var xValues = [5000, 10000, 15000, 20000, 25000, 30000, 35000, 40000, 45000, 50000, 55000];
                var yValues = [20, 40, 60, 80, 100, 120, 140, 160, 180, 200, 220];*/

                new Chart("myChart", {
                    type: "line",
                    data: {
                        labels: xValues,
                        datasets: [{
                            fill: false,
                            lineTension: 0,
                            backgroundColor: "rgba(200,28,28,1.0)",
                            borderColor: "rgba(216,28,28,0.8)",
                            data: yValues
                        }]
                    },
                    options: {
                        legend: {
                            display: false
                        },
                        scales: {
                            yAxes: [{
                                ticks: {
                                    min: 6,
                                    max: 16
                                }
                            }],
                        }
                    }
                });
            </script>

            <div class="container">
                <div class="row">
                    <div class="col-sm">
                        <div>
                            <p style="color:white">Auton CO2 päästöluokka: </p>
                            <p id="minunCO2paastoLuokka" style="color:white">0</p>
                            <p style="color:white">g/km</p>
                            <input onchange="laskukaava()" type="range" min="0" max="300" value="0" step="20" class="slider" id="co2">

                            <p style="color:white">Vuotuinen ajomääräsi: </p>
                            <div class="response-container">
                                <p id="minunVuotuinenAjomaara" style="color:white">5000</p>
                                <p style="color:white">Km</p>
                            </div>
                            <input onchange="laskukaava()" type="range" min="5000" max="50000" value="5000" step="2500" id="km">
                        </div>

                        <div>
                            <h5 style="color:white">Autosi päästää yhteiseen ilmakehäämme: </h5>
                            <h5 id="vastaus" style="color:#4BFF1B">0</h5>
                            <h5 style="color:white">kiloa hiilidioksidia vuodessa.</h5>
                        </div>

                        <script>
                            function laskukaava() {
                                // Nostetaan lukua aina kun slideria siirretään
                                var co2paastot = document.getElementById("co2");
                                var co2Nayta = document.getElementById("minunCO2paastoLuokka")
                                co2Nayta.innerHTML = co2paastot.value;

                                var kmPerVuosi = document.getElementById("km")
                                var AjomaaraNayta = document.getElementById("minunVuotuinenAjomaara")
                                AjomaaraNayta.innerHTML = kmPerVuosi.value;

                                //Laskukaava
                                var vastaus = (co2paastot.value / 100) * (kmPerVuosi.value * 0.1);

                                /*CO2-päästö oli vuoden vuoden 2021 lopussa 147,1 g/km*/
                                if (vastaus > 147.1) {
                                    document.getElementById("vastaus").innerHTML = `<font color="#FF0000">${vastaus}</font>`;
                                } else {
                                    document.getElementById("vastaus").innerHTML = `<font color="#55FF00">${vastaus}</font>`;
                                }

                                //_.round(vastaus, 1);
                            }
                            window.onload = laskukaava;
                        </script>

                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- 2. About-->
    <section class="about-section text-center" id="projects">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8">
                    <h2 class="text-white mb-12">Hiilidioksidipäästöt</h2>
                    <p class="text-white-50">
                        Hiilidioksidipäästöt syntyvät palamisreaktioissa, joista lopputuotteena on muun muassa hiilidioksidikaasua.
                        Hiilidioksidipäästöt ovat lisääntyneet fossiilisten polttoaineiden käytön lisääntymisen mukana.
                    </p>
                </div>
                <p>

                </p>
                <p>

                </p>
            </div>
        </div>
    </section>

    <!-- Projects-->

    <section class="projects-section bg-light" id="taulukko">
        <div class="container px-4 px-lg-5">

            <style>
                table {
                    border: 2px solid black;
                    text-align: center;
                    height: 40px;
                    width: auto;
                }

                th,
                td {
                    border: 1px solid black;
                    height: 40px;
                    width: 120px;
                }
            </style>

            <h1>Vertailu Taulukko</h1><br><br>

            <table>
                <tr>
                    <!--Ajoneuvo merkki-->
                    <th>Toyota Crown (Bensiini)</th>
                    <td>108 g/km</td>
                    <td>108 g/km</td>
                    <td>108 g/km</td>
                    <td>108 g/km</td>
                </tr>
                <tr>
                    <th>Toyota Camry (Hypridi)</th>
                    <td>60 g/km</td>
                    <td>60 g/km</td>
                    <td>60 g/km</td>
                    <td>60 g/km</td>
                </tr>
                <tr>
                    <th>Toyota Avensis (Diesel)</th>
                    <td>72 g/km</td>
                    <td>72 g/km</td>
                    <td>72 g/km</td>
                    <td>72 g/km</td>
                </tr>

                <td></td>
                <th>5000km</th>
                <th>10000km</th>
                <th>15000km</th>
                <th>20000km</th>
            </table>

        </div>
    </section>

    <!-- Lisätehtävä-->

    <section class="projects-section bg-light" id="sql">
        <div class="container px-4 px-lg-5">
            <h1>Lomake</h1>

            <form action="sql.php" method="post">
                Ajopäivämäärä : <br><input type="text" name="ajomaara" placeholder="esim. 2021-05-21"><br><br>

                Ajetut-km : <br><input type="text" name="kilsat"><br><br>
                Kulutettujen hiilidioksidipäästöjen määrä :<br> <input type="text" name="paastot"><br><br>
                <input type="submit" value="Lähetä">
            </form>

        </div>
    </section>

    <!-- 3. Signup-->
    <section class="signup-section" id="signup">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5">
                <div class="col-md-10 col-lg-8 mx-auto text-center">
                    <i class="far fa-paper-plane fa-2x mb-2 text-white"></i>
                    <h2 class="text-white mb-5">Tilaa saadaksesi päivitykset!</h2>
                    <!-- * * * * * * * * * * * * * * *-->
                    <!-- * * SB Forms Contact Form * *-->
                    <!-- * * * * * * * * * * * * * * *-->
                    <!-- This form is pre-integrated with SB Forms.-->
                    <!-- To make this form functional, sign up at-->
                    <!-- https://startbootstrap.com/solution/contact-forms-->
                    <!-- to get an API token!-->
                    <form class="form-signup" id="contactForm" data-sb-form-api-token="API_TOKEN">
                        <!-- Email address input-->
                        <div class="row input-group-newsletter">
                            <div class="col"><input class="form-control" id="emailAddress" type="email" placeholder="Aseta sähköpostiosoite..." aria-label="Enter email address..." data-sb-validations="required,email" /></div>
                            <div class="col-auto"><button class="btn btn-primary disabled" id="submitButton" type="submit">Ilmoita minulle!</button></div>
                        </div>
                        <div class="invalid-feedback mt-2" data-sb-feedback="emailAddress:required">Sähköposti
                            vaaditaan.</div>
                        <div class="invalid-feedback mt-2" data-sb-feedback="emailAddress:email">Sähköposti ei kelpaa.
                        </div>
                        <div class="d-none" id="submitSuccessMessage">
                            <div class="text-center mb-3 mt-2 text-white">
                                <div class="fw-bolder">Lomakkeen lähetys onnistui!</div>
                                Aktivoidaksesi tämän lomakkeen, rekisteröidy osoitteessa
                                <br />
                                <a href="https://www.husqvarna.com/fi-fi/">Rekisteröidy</a>
                            </div>
                        </div>
                        <div class="d-none" id="submitErrorMessage">
                            <div class="text-center text-danger mb-3 mt-2">Virhe lähettäessä viestiä!</div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>




    <!-- Contact-->
    <section class="contact-section bg-black">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5">
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-map-marked-alt text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">Osoite</h4>
                            <hr class="my-4 mx-auto" />
                            <div class="small text-black-50">Tiemaankatu 7, Huitsinevada</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-envelope text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">Gmail</h4>
                            <hr class="my-4 mx-auto" />
                            <div class="small text-black-50"><a href="#!">husqvarna@gmail.com</a></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-mobile-alt text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">Puhelin</h4>
                            <hr class="my-4 mx-auto" />
                            <div class="small text-black-50">+358 (044) 123-4567</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="social d-flex justify-content-center">
                <a class="mx-2" href="https://twitter.com/husqvarnausa"><i class="fab fa-twitter"></i></a>
                <a class="mx-2" href="https://fi-fi.facebook.com/husqvarnasuomi/"><i class="fab fa-facebook-f"></i></a>
                <a class="mx-2" href="https://www.instagram.com/accounts/login/?next=/husqvarna.motorcycles/"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="footer bg-black small text-center text-white-50">
        <div class="container px-4 px-lg-5">Copyright &copy; Husqvarna 2022</div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts_lasku.js"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>