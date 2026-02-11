
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Sistem Informasi Politeknik Mardira Indonesia</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon_poltek.png" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" type="text/css" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <style>
            #dataList {
                background: white;
                list-style: none;
                padding: 0;
                margin-top: 5px;
                border-radius: 5px;
                color: #333;
                max-height: 200px;
                overflow-y: auto;
                position: absolute; /* Supaya melayang di atas elemen lain */
                width: 90%;
                z-index: 1000;
                box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            }
            #dataList li {
                padding: 10px 15px;
                border-bottom: 1px solid #eee;
                cursor: pointer;
                text-align: left;
            }
            #dataList li:hover {
                background-color: #f8f9fa;
            }
        </style>
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-light bg-light static-top">
            <div class="container">
                <a class="navbar-brand" href="#">
                  <img src="assets/Brand poltek.jpeg" alt="Bootstrap" width="300" height="90">
                </a>
                <a class="btn btn-primary" href="{{ route('login') }}">Sign in</a>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container position-relative">
                <div class="row justify-content-center">
                    <div class="col-xl-6">
                        <div class="text-center text-white">
                            <!-- Page heading-->
                            <h1 class="mb-5">Info Mahasiswa Politeknik Mardira Indonesia</h1>
                            <!-- Signup form-->
                            <!-- * * * * * * * * * * * * * * *-->
                            <!-- * * SB Forms Contact Form * *-->
                            <!-- * * * * * * * * * * * * * * *-->
                            <!-- This form is pre-integrated with SB Forms.-->
                            <!-- To make this form functional, sign up at-->
                            <!-- https://startbootstrap.com/solution/contact-forms-->
                            <!-- to get an API token!-->
                            <form class="form-subscribe" id="contactForm" data-sb-form-api-token="API_TOKEN">
                                <!-- Email address input-->
                                <div class="row">
                                    <div class="col">
                                        <input class="form-control form-control-lg" type="text" id="searchInput" placeholder="Cari data mahasiswa..." autocomplete="off">
                                        <ul id="dataList" class="list-group position-absolute w-100" style="z-index: 1000; display: none; color: black;"></ul> 
                                    </div>
                                    <div id="detailMhs" class="mt-4 d-none">
                                        <div class="card bg-light text-dark">
                                            <div class="card-header fw-bold">Detail Mahasiswa</div>
                                            <div class="card-body p-0">
                                                <table class="table table-sm table-bordered mb-0">
                                                    <tbody id="detailBody">
                                                        </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Icons Grid-->
        <!-- Footer-->
        <footer class="footer bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 h-100 text-center text-lg-start my-auto">
                        <ul class="list-inline mb-2">
                            <li class="list-inline-item"><a href="#!">About</a></li>
                            <li class="list-inline-item">⋅</li>
                            <li class="list-inline-item"><a href="#!">Contact</a></li>
                            <li class="list-inline-item">⋅</li>
                            <li class="list-inline-item"><a href="#!">Terms of Use</a></li>
                            <li class="list-inline-item">⋅</li>
                            <li class="list-inline-item"><a href="#!">Privacy Policy</a></li>
                        </ul>
                        <p class="text-muted small mb-4 mb-lg-0">&copy; Your Website 2026. Poltek IT enngineer.</p>
                    </div>
                    <div class="col-lg-6 h-100 text-center text-lg-end my-auto">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item me-4">
                                <a href="#!"><i class="bi-facebook fs-3"></i></a>
                            </li>
                            <li class="list-inline-item me-4">
                                <a href="#!"><i class="bi-twitter fs-3"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#!"><i class="bi-instagram fs-3"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <script>
            const searchInput = document.getElementById('searchInput');
            const dataList = document.getElementById('dataList');
            const detailMhs = document.getElementById('detailMhs');
            const detailBody = document.getElementById('detailBody');

            searchInput.addEventListener('input', function() {
                const query = this.value;
                if (query.length > 1) {
                    fetch(`search.php?keyword=${query}`)
                        .then(response => response.json())
                        .then(data => {
                            dataList.innerHTML = '';
                            dataList.style.display = 'block';
                            
                            data.forEach(item => {
                                const li = document.createElement('li');
                                li.className = 'list-group-item list-group-item-action text-start';
                                li.style.cursor = 'pointer';
                                li.textContent = item.nama;
                                
                                // KETIKA NAMA DIKLIK
                                li.onclick = () => {
                                    showDetail(item);
                                    dataList.style.display = 'none';
                                    searchInput.value = item.nama;
                                };
                                dataList.appendChild(li);
                            });
                        });
                } else {
                    dataList.style.display = 'none';
                }
            });

            function showDetail(item) {
                // Tampilkan div detail
                detailMhs.classList.remove('d-none');
                
                // Isi tabel detail dengan data dari database
                detailBody.innerHTML = `
                    <tr><th class="w-25">Nama</th><td>${item.nama}</td></tr>
                    <tr><th>NIM</th><td>${item.nim}</td></tr>
                    <tr><th>Univ</th><td>${item.univ}</td></tr>
                    <tr><th>Gender</th><td>${item.jenis_kelamin}</td></tr>
                    <tr><th>Status</th><td>
                        <span class="badge ${item.status === 'Aktif' ? 'bg-success' : 'bg-danger'}">
                            ${item.status}
                        </span>
                    </td></tr>
                `;
            }
        </script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
