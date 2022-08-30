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
                    <li class="nav-item"><a class="nav-link" href="laskusivu.php">CO2-Laskuri</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <section class="about-section text-center" id="about">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8">
                    <h1 class="text-white mb-12">Lomake</h1>
                </div>
                <p>

                </p>
            </div>
        </div>
    </section>

    <!-- Palaa Etusivulle -->
    <section class="signup-section text-center" id="projects">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8">
                    <h2 class="text-white mb-12">Palaa etusivulle</h2>
                    <br>
                    <p>
                        <a class="btn btn-info" href="laskusivu.php" role="button">Palaa</a>
                    </p>
                    <br>
                    <p>
                        <a class="btn btn-secondary" href="naytaData.php" role="button">Näytä data</a>
                    </p>
                </div>
                <p>

                </p>
                <p>

                </p>
            </div>
        </div>
    </section>


    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "lisatehtava";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $kilsa = $_POST["kilsat"];
    $paastot = $_POST["paastot"];
    $ajomaara = date('Y-m-d', strtotime($_POST['ajomaara']));



    $sql = "INSERT INTO lomake (Paivamaara, Kilometrit, Paastot)
    VALUES ('$ajomaara', $kilsa, $paastot)";

    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Viesti tallennettu onnistuneesti!")</script>';
    } else {
        echo '<script>alert("Virhe! Et täyttänyt kaikkia kenttiä tai päivämäärä on väärin!")</script>';
    }

    $conn->close();
    ?>

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