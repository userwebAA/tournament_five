-- Création de la base de données
CREATE DATABASE IF NOT EXISTS tournoi_event_five;
USE tournoi_event_five;

-- Table des équipes
CREATE TABLE teams (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    company_name VARCHAR(255) NOT NULL,
    team_leader VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    phone VARCHAR(20) NOT NULL,
    player_count INT NOT NULL,
    contact_address TEXT NOT NULL,
    company_logo VARCHAR(255),
    player_sizes JSON,
    accepts_terms BOOLEAN DEFAULT FALSE,
    accepts_newsletter BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Table des paiements
CREATE TABLE payments (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    team_id BIGINT UNSIGNED NOT NULL,
    amount DECIMAL(10, 2) NOT NULL,
    stripe_payment_id VARCHAR(255) NOT NULL,
    status VARCHAR(50) NOT NULL,
    invoice_number VARCHAR(50) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (team_id) REFERENCES teams(id)
);

-- Index pour améliorer les performances
CREATE INDEX idx_team_email ON teams(email);
CREATE INDEX idx_payment_status ON payments(status);
CREATE INDEX idx_stripe_payment ON payments(stripe_payment_id);

-- Trigger pour mettre à jour updated_at automatiquement
DELIMITER //
CREATE TRIGGER before_teams_update
    BEFORE UPDATE ON teams
    FOR EACH ROW
BEGIN
    SET NEW.updated_at = CURRENT_TIMESTAMP;
END//

CREATE TRIGGER before_payments_update
    BEFORE UPDATE ON payments
    FOR EACH ROW
BEGIN
    SET NEW.updated_at = CURRENT_TIMESTAMP;
END//
DELIMITER ;

-- Procédure stockée pour obtenir les statistiques des inscriptions
DELIMITER //
CREATE PROCEDURE get_registration_stats()
BEGIN
    SELECT 
        COUNT(*) as total_teams,
        SUM(player_count) as total_players,
        SUM(CASE WHEN accepts_newsletter = 1 THEN 1 ELSE 0 END) as newsletter_subscriptions,
        (SELECT COUNT(*) FROM payments WHERE status = 'paid') as paid_registrations
    FROM teams;
END//
DELIMITER ;

-- Vue pour les équipes avec paiement validé
CREATE VIEW paid_teams AS
SELECT 
    t.company_name,
    t.team_leader,
    t.email,
    t.phone,
    t.player_count,
    p.invoice_number,
    p.amount,
    p.created_at as payment_date
FROM teams t
INNER JOIN payments p ON t.id = p.team_id
WHERE p.status = 'paid';

-- Permissions (à adapter selon vos besoins)
GRANT SELECT, INSERT, UPDATE ON tournoi_event_five.* TO 'app_user'@'localhost';
GRANT EXECUTE ON PROCEDURE tournoi_event_five.get_registration_stats TO 'app_user'@'localhost';
