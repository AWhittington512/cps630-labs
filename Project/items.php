<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Items</title>
    <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>🛒</text></svg>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDgEhxoik76va_nhG6KsA4DTa5JBr_Iz0I&callback=initMap"></script>

    <?php
        include "phpScripts/DBConnect.php";
        include "phpScripts/Product.php";
        include "phpScripts/RenderList.php";
    ?>
</head>
<body>
    <div>
        <nav class="navbar navbar-expand-lg navbar-light p-2 bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.html"><img src="scs-logo.png" style="width: 80px"></a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto">
                        <a href="#" class="nav-item nav-link ms-2">Home</a>
                        <a href="./about.html" class="nav-item nav-link ms-2">About Us</a>
                        <a href="#" class="nav-item nav-link ms-2">Reviews</a>
                        <a href="#" class="nav-item nav-link ms-2">Services</a>
                        <a class="btn btn-primary ms-2" data-bs-toggle="modal" href="#logInModal" role="button">Log In</a>
                        <a href="#" class="nav-item nav-link ms-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-fill" viewBox="0 0 16 16"><path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5z"/></svg></a>
                    </div>
                </div>
            </div>
        </nav>
        <div class="nav bg-dark-subtle d-flex py-2 px-3 align-items-center">
            <a onclick="getLocation()" href="#" class="me-3 text-muted text-decoration-none"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16"><path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/></svg>
                <small id="postalCode">Find your location</small>
            </a>
            <a href="#" data-bs-toggle="modal" data-bs-target="#storeSelect" class="me-3 text-muted text-decoration-none"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-building" viewBox="0 0 16 16"><path d="M4 2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1ZM4 5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1ZM7.5 5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1ZM4.5 8a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Z"/><path d="M2 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V1Zm11 0H3v14h3v-2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5V15h3V1Z"/></svg>
                <small id="storeLocation">No store selected</small>
            </a>
        </div>
        <div class="modal fade" id="storeSelect" tabindex="-1" aria-labelledby="storeSelectLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5 lead" id="storeSelectLabel">Select your preferred store</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-4" data-bs-dismiss="modal">
                        <div class="store card mb-3">
                            <div class="card-body">
                              <h5 class="store-name card-title">Queen St W, Toronto</h5>
                              <p class="card-text">Phone number: 416-128-3280</p>
                              <button class="store btn btn-primary stretched-link" onclick="selectStore()">Select this store</button>
                            </div>
                        </div>
                        <div class="store card mb-3" data-bs-dismiss="modal">
                            <div class="card-body">
                              <h5 class="store-name card-title">CF Markville, Markham</h5>
                              <p class="card-text">Phone number: 416-124-1199</p>
                              <button class="store btn btn-primary stretched-link" onclick="selectStore()">Select this store</button>
                            </div>
                        </div>
                        <div class="store card mb-3" data-bs-dismiss="modal">
                            <div class="card-body">
                              <h5 class="store-name card-title">Square One Shopping Centre, Mississauga</h5>
                              <p class="card-text">Phone number: 416-927-5682</p>
                              <button class="store btn btn-primary stretched-link" onclick="selectStore()">Select this store</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>          
        <div class="modal fade" id="logInModal" aria-hidden="true" aria-labelledby="logInModalLabel" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 lead">Log in to your account</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <form>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" name="password" aria-describedby="emailHelp" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="remember-me">
                            <label class="form-check-label" for="remember-me">Remember me</label>
                        </div>
                            <button type="submit" class="btn btn-outline-success d-block m-auto my-2">Log In</button>
                            <button class="btn btn-outline-primary d-block m-auto my-2" data-bs-target="#signUpModal" data-bs-toggle="modal">Sign Up</button>
                    </form>
                </div>
            </div>
            </div>
        </div>

        <div class="modal fade" id="signUpModal" aria-hidden="true" aria-labelledby="signUpModalLabel" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 lead">Create an account</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <form>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="name" class="form-control" id="name" name="name" aria-describedby="userName" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="telephone" class="form-label">Phone</label>
                            <input type="tel" class="form-control" id="telephone" name="phone" aria-describedby="phoneNumber" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" required>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" name="address" aria-describedby="userAddress">
                        </div>
                        <button type="submit" class="btn btn-outline-primary d-block m-auto my-2">Sign Up</button>
                        <div class="form-text text-center">
                            Already have an account?
                            <a class="link-primary" href="logInModal" data-bs-target="#logInModal" data-bs-toggle="modal">Log In</a>
                        </div>
                    </form>
                </div>
            </div>
            </div>
        </div>
        <div class="container">
            <h1>Items</h1>

            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" href="#">All</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#tops">Tops</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#outer">Outerwear</a>
                </li>
            </ul>

            <div id="itemList" class="container text-center">
                <?php
                    $result = $connection->query("select * from Item");
                    $items = [];
                    if ($result) {
                        while ($item = $result->fetch_assoc()) {
                            //echo ("{$item['ItemName']}, {$item['ItemPrice']}<br>");
                            $items[] = new Product($item['ItemName'], $item['ItemPrice'], $item['Picture_URL']);
                        }
                    }

                    $output = "<div class='row align-items-center gap-3'>";
                    foreach ($items as $item) {
                        $output .= $item->renderHtml();
                    }

                    $output .= "</div>";

                    echo ($output);
                ?>
            </div>
        </div>
    </div>
</body>

<script>
    async function codeAddress(apiUrl) {
        fetch(apiUrl)
        .then(response => response.json())
        .then(data => {
            console.log(data)
            var city = data.address.city
            var postal = data.address.postcode
            findStores(city, postal)
        })
        .catch(error => {
            document.getElementById('postalCode').innerHTML = "Location not found"
        });
    }

    function findStores(city, postcode) {
        document.getElementById('postalCode').innerHTML = postcode
        switch(city) {
            case 'Toronto':
                document.getElementById('storeLocation').innerHTML = "Queen St W, Toronto"
                break
            case 'Markham': 
                document.getElementById('storeLocation').innerHTML = "CF Markville, Markham"
                break
            case 'Mississauga': 
                document.getElementById('storeLocation').innerHTML = "Square One Shopping Centre, Mississauga"
            default:
                document.getElementById('storeLocation').innerHTML = "No store selected"
        }
    }

    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(getCoords);
        }
        else {
            alert("Geolocation is not supported by this browser");
        }
    }

    function getCoords(position) {
        var address = position.coords.latitude + ',' + position.coords.longitude;
        var apiUrl = `https://geocode.maps.co/reverse?lat=${position.coords.latitude}&lon=${position.coords.longitude}`
        codeAddress(apiUrl);
    }
    
    function selectStore() {
        const selectButtons = document.querySelectorAll('.store');

        selectButtons.forEach(button => {
        button.addEventListener('click', () => {
            const storeName = button.closest('.store').querySelector('.store-name').textContent;
            
            document.getElementById('storeLocation').innerHTML = storeName;
        });
        });
    }
</script>

</html>