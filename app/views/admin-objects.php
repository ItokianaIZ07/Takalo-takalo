<div class="page-header">
    <div class="page-title">
        <h2>Objets</h2>
        <p>Gérez tous les objets disponibles sur la plateforme</p>
    </div>
    <div class="page-actions">
        <button class="btn btn-secondary">
            <i class="fas fa-filter"></i> Filtrer
        </button>
        <button class="btn btn-primary">
            <i class="fas fa-plus"></i> Ajouter un objet
        </button>
    </div>
</div>

<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-header">
            <div class="stat-icon blue">
                <i class="fas fa-box"></i>
            </div>
            <div class="stat-trend positive">+12%</div>
        </div>
        <div class="stat-value">156</div>
        <div class="stat-label">Objets totaux</div>
    </div>
    
    <div class="stat-card">
        <div class="stat-header">
            <div class="stat-icon green">
                <i class="fas fa-check-circle"></i>
            </div>
            <div class="stat-trend positive">+8%</div>
        </div>
        <div class="stat-value">124</div>
        <div class="stat-label">Objets Echange</div>
    </div>
    
    <div class="stat-card">
        <div class="stat-header">
            <div class="stat-icon red">
                <i class="fas fa-ban"></i>
            </div>
            <div class="stat-trend negative">-5%</div>
        </div>
        <div class="stat-value">10</div>
        <div class="stat-label">Objets non Echange</div>
    </div>
</div>

<div class="objects-grid">
    <?php
    // Exemple de données - À remplacer par vos données réelles depuis la base de données
    $objects = [
        [
            'id' => 1,
            'name' => 'Smartphone iPhone 13 Pro',
            'image' => '/assets/images/test.jpg',
            'description' => 'iPhone 13 Pro 256GB, état impeccable, avec boite originale et accessoires. Écran Super Retina XDR, triple appareil photo.',
            'price' => '850 €',
            'category' => 'Électronique',
            'status' => 'active',
            'owner' => 'Jean Dupont'
        ],
        [
            'id' => 2,
            'name' => 'Vélo de route professionnel',
            'image' => '/assets/images/test.jpg',
            'description' => 'Vélo de course carbone Shimano 105, taille 56cm. Parfait état, peu utilisé. Pneus neufs.',
            'price' => '1 200 €',
            'category' => 'Sport',
            'status' => 'active',
            'owner' => 'Marie Martin'
        ],
        [
            'id' => 3,
            'name' => 'Collection livres Harry Potter',
            'image' => '/assets/images/test.jpg',
            'description' => 'Collection complète des 7 livres Harry Potter en français, édition originale. Excellent état.',
            'price' => '150 €',
            'category' => 'Livres',
            'status' => 'pending',
            'owner' => 'Pierre Leroy'
        ],
        [
            'id' => 4,
            'name' => 'Appareil photo Canon EOS R6',
            'image' => '/assets/images/test.jpg',
            'description' => 'Appareil photo hybride professionnel, capteur 20MP, stabilisateur 8 stops. Objectif 24-105mm inclus.',
            'price' => '2 800 €',
            'category' => 'Photographie',
            'status' => 'active',
            'owner' => 'Sophie Bernard'
        ],
        [
            'id' => 5,
            'name' => 'Montre automatique Seiko',
            'image' => '/assets/images/test.jpg',
            'description' => 'Montre automatique Seiko Presage, cadran bleu, boitier acier. Avec boite et papiers.',
            'price' => '450 €',
            'category' => 'Accessoires',
            'status' => 'completed',
            'owner' => 'Thomas Petit'
        ],
        [
            'id' => 6,
            'name' => 'Console PS5 + jeux',
            'image' => '/assets/images/test.jpg',
            'description' => 'PlayStation 5 édition digitale, 3 manettes, 5 jeux inclus. Garantie 1 an restante.',
            'price' => '550 €',
            'category' => 'Jeux vidéo',
            'status' => 'active',
            'owner' => 'Lucas Moreau'
        ]
    ];
    
    foreach ($objects as $object):
    ?>
    <div class="object-card" data-object-id="<?= $object['id'] ?>">
        <div class="object-image">
            <img src="<?= $object['image'] ?>" alt="<?= $object['name'] ?>" onerror="this.src='/assets/images/placeholder.jpg'">
            <div class="object-status status <?= $object['status'] ?>">
                <?= ucfirst($object['status']) ?>
            </div>
        </div>
        
        <div class="object-content">
            <div class="object-header">
                <h3 class="object-name"><?= $object['name'] ?></h3>
                <div class="object-price"><?= $object['price'] ?></div>
            </div>
            
            <div class="object-meta">
                <span class="object-category">
                    <i class="fas fa-tag"></i> <?= $object['category'] ?>
                </span>
                <span class="object-owner">
                    <i class="fas fa-user"></i> <?= $object['owner'] ?>
                </span>
            </div>
            
            <div class="object-description-toggle">
                <label class="toggle-label">
                    <input type="checkbox" class="description-toggle" data-object-id="<?= $object['id'] ?>">
                    <span class="toggle-text">Afficher description</span>
                </label>
                <div class="object-description" id="description-<?= $object['id'] ?>">
                    <?= $object['description'] ?>
                </div>
            </div>
            
            <div class="object-actions">
                <button class="btn btn-secondary view-details" data-object-id="<?= $object['id'] ?>">
                    <i class="fas fa-eye"></i> Détails
                </button>
                <div class="action-buttons">
                    <button class="icon-btn edit-object" data-object-id="<?= $object['id'] ?>" title="Modifier">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button class="icon-btn delete-object" data-object-id="<?= $object['id'] ?>" title="Supprimer">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<div class="modal" id="deleteModal">
    <div class="modal-content">
        <div class="modal-header">
            <h3>Confirmer la suppression</h3>
            <button class="close-modal">&times;</button>
        </div>
        <div class="modal-body">
            <p>Êtes-vous sûr de vouloir supprimer cet objet ? Cette action est irréversible.</p>
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary cancel-delete">Annuler</button>
            <button class="btn btn-danger confirm-delete">Supprimer</button>
        </div>
    </div>
</div>