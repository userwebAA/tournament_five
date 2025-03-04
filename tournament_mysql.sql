-- MySQL dump
-- Generated from PostgreSQL database

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- Table structure for table `cache`
CREATE TABLE `cache` (
    `key` varchar(255) NOT NULL,
    `value` text NOT NULL,
    `expiration` int NOT NULL,
    PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table structure for table `cache_locks`
CREATE TABLE `cache_locks` (
    `key` varchar(255) NOT NULL,
    `owner` varchar(255) NOT NULL,
    `expiration` int NOT NULL,
    PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table structure for table `failed_jobs`
CREATE TABLE `failed_jobs` (
    `id` bigint NOT NULL AUTO_INCREMENT,
    `uuid` varchar(255) NOT NULL,
    `connection` text NOT NULL,
    `queue` text NOT NULL,
    `payload` text NOT NULL,
    `exception` text NOT NULL,
    `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table structure for table `job_batches`
CREATE TABLE `job_batches` (
    `id` varchar(255) NOT NULL,
    `name` varchar(255) NOT NULL,
    `total_jobs` int NOT NULL,
    `pending_jobs` int NOT NULL,
    `failed_jobs` int NOT NULL,
    `failed_job_ids` text NOT NULL,
    `options` text,
    `cancelled_at` int,
    `created_at` int NOT NULL,
    `finished_at` int,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table structure for table `jobs`
CREATE TABLE `jobs` (
    `id` bigint NOT NULL AUTO_INCREMENT,
    `queue` varchar(255) NOT NULL,
    `payload` text NOT NULL,
    `attempts` smallint NOT NULL,
    `reserved_at` int,
    `available_at` int NOT NULL,
    `created_at` int NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table structure for table `migrations`
CREATE TABLE `migrations` (
    `id` int NOT NULL AUTO_INCREMENT,
    `migration` varchar(255) NOT NULL,
    `batch` int NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table structure for table `password_reset_tokens`
CREATE TABLE `password_reset_tokens` (
    `email` varchar(255) NOT NULL,
    `token` varchar(255) NOT NULL,
    `created_at` timestamp NULL,
    PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table structure for table `payments`
CREATE TABLE `payments` (
    `id` bigint NOT NULL AUTO_INCREMENT,
    `team_id` bigint NOT NULL,
    `amount` decimal(10,2) NOT NULL,
    `payment_method` varchar(255),
    `payment_id` varchar(255),
    `status` varchar(255),
    `stripe_id` varchar(255),
    `created_at` timestamp NULL,
    `updated_at` timestamp NULL,
    `session_id` varchar(255),
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table structure for table `teams`
CREATE TABLE `teams` (
    `id` bigint NOT NULL AUTO_INCREMENT,
    `name` varchar(255) NOT NULL,
    `company_name` varchar(255) NOT NULL,
    `address` text,
    `email` varchar(255) NOT NULL,
    `phone` varchar(255),
    `players_count` int,
    `description` text,
    `logo` varchar(255),
    `sizes` json,
    `stripe_id` varchar(255),
    `status` varchar(255),
    `deleted_at` timestamp NULL,
    `created_at` timestamp NULL,
    `updated_at` timestamp NULL,
    `is_validated` tinyint(1) DEFAULT '0',
    `is_waiting` tinyint(1) DEFAULT '0',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

SET FOREIGN_KEY_CHECKS = 1;
