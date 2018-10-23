<header>
    <div id="title_header">
        <h1>Jean FORTEROCHE</h1>
        <h2>Acteur / Ecrivain</h2>
    </div>

    <nav>
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="posts.php">Posts</a></li>
            <?php
                session_start();
                if (!empty($_SESSION['identifiant'])) {
                    echo '<li><a href="disconnect.php">Déconnexion</a></li>';
                }
                else {
                    echo '<li><a href="connect.php">S\'identifier</a></li>';
                }
            ?>
        </ul>
    </nav>

</header>
