<?php
session_start();
if(!isset($_SESSION["admin"]) || $_SESSION["admin"] == null){
    header("Location : /");
}

$title = isset($titlePage) ? $titlePage : "Takalotakalo-Page";
$content = isset($contentPage) || $contentPage !== null ? $contentPage : "404";
$contentPath = __DIR__ . '/' . $content . '.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php if($content == "404") { ?>
        <link rel="stylesheet" href="/assets/css/style-404.css">
    <?php }else { ?>
        <link rel="stylesheet" href="/assets/css/adminModel.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <?php } ?>
    <title>TakaloAdmin-<?= $title ?></title>
</head>
<body>
<header class="header">
        <div class="top-bar">
            <div class="logo">
                <i class="fas fa-exchange-alt"></i>
                <h1>Takala<span>takalo</span> Admin</h1>
            </div>
            
            <div class="user-menu">
                <div class="notification">
                    <i class="far fa-bell"></i>
                    <span class="notification-badge">3</span>
                </div>
                
                <div class="user-profile">
                    <div class="user-avatar">AD</div>
                    <div class="user-name">Admin User</div>
                </div>
            </div>
        </div>
        
        <nav class="main-nav">
            <ul class="nav-list">
                <li class="nav-item active" data-page="dashboard">
                    <i class="fas fa-home"></i>
                    <span>Tableau de bord</span>
                </li>
                <li class="nav-item" data-page="categories">
                    <i class="fas fa-list"></i>
                    <span>Catégories</span>
                </li>
                <li class="nav-item" data-page="objects">
                    <i class="fas fa-box"></i>
                    <span>Objets</span>
                </li>
                <li class="nav-item" data-page="transactions">
                    <i class="fas fa-exchange-alt"></i>
                    <span>Transactions</span>
                </li>
                <li class="nav-item" data-page="users">
                    <i class="fas fa-users"></i>
                    <span>Utilisateurs</span>
                </li>
                <li class="nav-item" data-page="reports">
                    <i class="fas fa-chart-bar"></i>
                    <span>Rapports</span>
                </li>
            </ul>
        </nav>
    </header>
    <main class="container">
        <?php include $contentPath ?>
    </main>
    <footer class="footer">
        <p>© 2023 Takalotakalo Admin. Plateforme d'échange et de vente. Tous droits réservés.</p>
        <p style="margin-top: 10px; font-size: 13px;">
            <a href="#" style="color: var(--primary-color); margin: 0 10px;">Confidentialité</a> | 
            <a href="#" style="color: var(--primary-color); margin: 0 10px;">Conditions d'utilisation</a> | 
            <a href="#" style="color: var(--primary-color); margin: 0 10px;">Support</a>
        </p>
    </footer>
</body>
</html>