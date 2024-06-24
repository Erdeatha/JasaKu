<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* Centering the search form */
        @media (min-width: 768px) {
            .centered-search {
                position: absolute;
                left: 50%;
                transform: translateX(-50%);
            }

            #searchInput {
                width: 500px;
            }
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <!-- Logo -->
            <a class="navbar-brand" href="/">
                <img src="/assets/images/logo-jasaku.png" alt="Logo" class="d-inline-block align-text-top" style="width: 40px; height: auto">
                Jasaku
            </a>

            <!-- Centered Input untuk Pencarian -->
            <form id="searchForm" class="d-flex centered-search mt-2">
                <input type="text" id="searchInput" class="form-control" placeholder="Perlu apa Anda hari ini?" style="border-radius:10px 0 0 10px; border-width: 1px 0 1px 1px; border-color:grey; border-style: solid">
                <button id="searchButton" class="btn btn-outline-secondary" type="button" style="border-radius:0 10px 10px 0">
                    <i class="fas fa-search"></i>
                </button>
            </form>

            <!-- Hamburger Menu untuk Tampilan Mobile -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Right side of navbar -->
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/notifikasi">
                            <i class="fas fa-bell text-dark"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/ditandai">
                            <i class="fas fa-bookmark text-dark"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-envelope text-dark"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/profil">
                            <i class="fas fa-user text-dark"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Your custom JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchForm = document.getElementById('searchForm');
            const searchButton = document.getElementById('searchButton');
            const searchInput = document.getElementById('searchInput');
            const jasaItems = document.querySelectorAll('.jasa-item');
            const noResultsMessage = document.getElementById('noResultsMessage');
            const searchAgainButton = document.getElementById('searchAgainButton');
            const navbarToggler = document.querySelector('.navbar-toggler');
            const navbarCollapse = document.querySelector('.navbar-collapse');
            const carousel = document.getElementById('iklanCarousel');

            // Event listener for form submit
            searchForm.addEventListener('submit', function(e) {
                e.preventDefault();
                const searchText = searchInput.value.trim().toLowerCase();
                filterJasa(searchText);
            });

            // Event listener for search button click
            searchButton.addEventListener('click', function() {
                const searchText = searchInput.value.trim().toLowerCase();
                filterJasa(searchText);
            });

            // Event listener for Enter key press in search input
            searchInput.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    const searchText = searchInput.value.trim().toLowerCase();
                    filterJasa(searchText);
                }
            });

            // Event listener for "Cari Lagi" button
            searchAgainButton.addEventListener('click', function() {
                searchInput.focus();
            });

            // Function to filter jasa items
            function filterJasa(searchText) {
                let hasVisibleItems = false;
                jasaItems.forEach(item => {
                    const itemName = item.querySelector('.card-title').textContent.toLowerCase();
                    const searchMatch = itemName.includes(searchText);
                    item.style.display = searchMatch ? 'block' : 'none';
                    if (searchMatch) {
                        hasVisibleItems = true;
                    }
                });
                noResultsMessage.style.display = hasVisibleItems ? 'none' : 'block';
                carousel.style.display = 'none';
            }

            document.addEventListener('click', function(event) {
                const isClickInsideNavbar = event.target.closest('.navbar-collapse') !== null;
                const isClickInsideToggler = event.target.closest('.navbar-toggler') !== null;
                const isMenuOpen = navbarCollapse.classList.contains('show');

                if (!isClickInsideNavbar && !isClickInsideToggler && isMenuOpen) {
                    bootstrap.Collapse.getInstance(navbarCollapse).hide();
                }
            });

            navbarToggler.addEventListener('click', function() {
                const isMenuOpen = navbarCollapse.classList.contains('show');
                if (isMenuOpen) {
                    bootstrap.Collapse.getInstance(navbarCollapse).hide();
                } else {
                    bootstrap.Collapse.getInstance(navbarCollapse).show();
                }
            });
        });
    </script>

</body>

</html>