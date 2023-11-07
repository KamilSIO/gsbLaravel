<!-- Division pour le sommaire -->
<nav class="menuLeft">
    <ul class="menu-ul">
        <li class="menu-item"><a href="index.php">retour</a></li>

        <li class="menu-item">
            Visiteur :<br>
            <?php echo $_SESSION['prenom'] . "  " . $_SESSION['nom'] ?>
        </li>

        <li class="menu-item">
            <a href="index.php?uc=etatFrais&action=selectionnerMois" title="Consultation de mes fiches de frais">Mes
                fiches de frais</a>
        </li>

        <li class="menu-item">
            <a href="index.php?uc=cumulfrais&action=cumulfrais" title="Calcul de mes frais">Cumul des frais</a>
        </li>

        <li class="menu-item">
            <a href="index.php?uc=cumulfrais&action=idtypeFrais" title="Frais en fonction du type">mission 1b</a>
        </li>

        <li class="menu-item">
            <a href="index.php?uc=cumulfrais&action=selectionnerMoiss" title="Frais en fonction du type">mission 1c</a>
        </li>

        <li class="menu-item">
            <a href="index.php?uc=cumulfrais&action=listeId" title="Frais en fonction du type">mission 1d</a>
        </li>

        <li class="menu-item">
            <a href="index.php?uc=cumulfrais&action=insertion" title="Frais en fonction du type">mission 1e</a>
        </li>

        <li class="menu-item">
            <a href="index.php?uc=connexion&action=deconnexion" title="Se déconnecter">Déconnexion</a>
        </li>

        
    </ul>
</nav>
<section class="content">


