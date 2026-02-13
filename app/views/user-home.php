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

    <!-- Stats dynamiques -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-header">
                <div class="stat-icon blue"><i class="fas fa-box"></i></div>
            </div>
            <div class="stat-value"><?= $stats['objets_possedes'] ?? 0 ?></div>
            <div class="stat-label">Objets possédés</div>
        </div>

        <div class="stat-card">
            <div class="stat-header">
                <div class="stat-icon green"><i class="fas fa-right-left"></i></div>
            </div>
            <div class="stat-value"><?= $stats['echanges_realises'] ?? 0 ?></div>
            <div class="stat-label">Échanges réalisés</div>
        </div>

        <div class="stat-card">
            <div class="stat-header">
                <div class="stat-icon orange"><i class="fas fa-clock"></i></div>
            </div>
            <div class="stat-value"><?= $stats['echanges_attente'] ?? 0 ?></div>
            <div class="stat-label">Échanges en attente</div>
        </div>
    </div>

    <!-- Section table avec objets dynamiques -->
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
                    <?php if (!empty($stats['derniers_objets'])): ?>
                        <?php foreach ($stats['derniers_objets'] as $objet): ?>
                        <tr>
                            <td>
                                <div class="item-name">
                                    <div class="item-icon">
                                        <?php
                                        // Icône selon la catégorie
                                        $icon = 'fa-box';
                                        $categorie = strtolower($objet['categorie'] ?? '');
                                        if (strpos($categorie, 'ordinateur') !== false || strpos($categorie, 'mac') !== false) {
                                            $icon = 'fa-laptop';
                                        } elseif (strpos($categorie, 'téléphone') !== false || strpos($categorie, 'iphone') !== false || strpos($categorie, 'samsung') !== false) {
                                            $icon = 'fa-mobile-alt';
                                        } elseif (strpos($categorie, 'vélo') !== false || strpos($categorie, 'vtt') !== false) {
                                            $icon = 'fa-bicycle';
                                        } else {
                                            $icon = 'fa-box';
                                        }
                                        ?>
                                        <i class="fas <?= $icon ?>"></i>
                                    </div>
                                    <?= htmlspecialchars($objet['nomObjet']) ?>
                                </div>
                            </td>
                            <td><?= htmlspecialchars($objet['categorie'] ?? 'Non catégorisé') ?></td>
                            <td><span class="status active"><?= htmlspecialchars($objet['statut']) ?></span></td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="3" style="text-align: center; padding: 30px;">
                                Aucun objet trouvé. <a href="#">Ajouter un objet</a>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>