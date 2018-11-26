<nav class="navbar">
    <div class="container-fluid row">
        <h1 class="col-lg-5">Jean FORTEROCHE</h1>
        <h2 class="col-lg-3">Acteur / Ecrivain</h2>
        <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="./index.php">Accueil</a></li>
            <li><a href="?action=posts">Posts</a></li>
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