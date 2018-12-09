<nav class="navbar">
    <div class="container-fluid row">
        <div class="col-lg-7">
            <h1 class="col-lg-6">Jean FORTEROCHE</h1>
            <h2 class="col-lg-4">Acteur / Ecrivain</h2>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="./index.php">Accueil</a></li>
            <li><a href="?action=posts">Billets</a></li>
            <?php
            if (!empty($_SESSION['username'])) {
                echo '<li><a href="?action=management">Gestion</a></li>';
                echo '<li><a href="?action=disconnect">Déconnexion</a></li>';
            }
            else {
                echo '<li><a href="?action=connect">S\'identifier</a></li>';
            }
            ?>
        </ul>
    </div>
</nav>