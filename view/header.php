<header>
    <div id="title_header">
        <h1>Jean FORTEROCHE</h1>
        <h2>Acteur / Ecrivain</h2>
    </div>
    <nav>
        <ul>
            <li><a href="./index.php">Accueil</a></li>
            <li><a href="?action=posts">Posts</a></li>
            <?php
                if (!empty($_SESSION['username'])) {
                    echo '<li><a href="?action=disconnect">Déconnexion</a></li>';
                }
                else {
                    echo '<li><a href="?action=connect">S\'identifier</a></li>';
                }
            ?>
        </ul>
    </nav>
</header>