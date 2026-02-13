<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Takalo-takalo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Ton CSS -->
    <link rel="stylesheet" href="/assets/css/user-model.css">
</head>
<body>

<!-- Header fixe (titre + user seulement) -->
<header class="app-header">
    <div class="header-left">
        <i class="fas fa-exchange-alt logo-icon"></i>
        <div class="site-title">Takalo<span>takalo</span></div>
    </div>
    <div class="user-profile" id="userProfile">
        <div class="user-avatar">U</div>
        <div class="user-name"><?php echo $user["username"] ?? "Utilisateur"; ?></div>

        <div class="profile-dropdown" id="profileDropdown">
            <a href="/logout" class="dropdown-item">
                <i class="fas fa-sign-out-alt"></i>
                Déconnexion
            </a>
        </div>
    </div>
</header>

<!-- Sidebar (navigation gauche) -->
<aside class="sidebar">
    <ul class="sidebar-nav">
        <li class="sidebar-item active">
            <i class="fas fa-box"></i>
            <span>Mes objets</span>
        </li>
        <li class="sidebar-item">
            <i class="fas fa-right-left"></i>
            <span>Faire un échange</span>
        </li>
        <li class="sidebar-item">
            <i class="fas fa-users"></i>
            <span>Objets des utilisateurs</span>
        </li>
    </ul>
</aside>

<!-- Contenu principal -->
<main class="main-content">
    <div class="container">

        <div class="page-header">
            <div class="page-title">
                <h2>Mes objets</h2>
                <p>Liste des objets que tu possèdes actuellement</p>
            </div>
            <div class="page-actions">
                <button class="btn btn-primary">
                    <i class="fas fa-plus"></i> Ajouter un objet
                </button>
            </div>
        </div>

        <!-- Stats -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon blue"><i class="fas fa-box"></i></div>
                </div>
                <div class="stat-value">12</div>
                <div class="stat-label">Objets possédés</div>
            </div>

            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon green"><i class="fas fa-right-left"></i></div>
                </div>
                <div class="stat-value">3</div>
                <div class="stat-label">Échanges réalisés</div>
            </div>

            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon orange"><i class="fas fa-clock"></i></div>
                </div>
                <div class="stat-value">2</div>
                <div class="stat-label">Échanges en attente</div>
            </div>
        </div>

        <!-- Section table -->
        <div class="section">
            <div class="section-header">
                <h3 class="section-title">Derniers objets ajoutés</h3>
            </div>

            <div class="table-container">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Objet</th>
                            <th>Catégorie</th>
                            <th>Statut</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="item-name">
                                    <div class="item-icon"><i class="fas fa-mobile-alt"></i></div>
                                    Téléphone
                                </div>
                            </td>
                            <td>Électronique</td>
                            <td><span class="status active">Disponible</span></td>
                        </tr>
                        <tr>
                            <td>
                                <div class="item-name">
                                    <div class="item-icon"><i class="fas fa-book"></i></div>
                                    Livre
                                </div>
                            </td>
                            <td>Culture</td>
                            <td><span class="status pending">En échange</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</main>

</body>
</html>
