<nav class="navbar">
    <div class="container-fluid row col-lg-5 col-lg-offset-4">
        <ul class="nav navbar-nav col-lg-12">
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