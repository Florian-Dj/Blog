<nav class="navbar col-md-12">
    <div class="container-fluid col-md-10 col-lg-9 col-md-offset-2 col-lg-offset-3">
        <ul class="nav navbar-nav col-md-6 col-md-offset-1">
            <li class="active"><a href="?action=index">Accueil</a></li>
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