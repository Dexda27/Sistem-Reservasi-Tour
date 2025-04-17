-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
-- -----------------------------------------------------
-- Schema reservasi_tour
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema reservasi_tour
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `reservasi_tour` DEFAULT CHARACTER SET utf8mb4 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`timestamps`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`timestamps` (
  `create_time` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` TIMESTAMP NULL);

USE `reservasi_tour` ;

-- -----------------------------------------------------
-- Table `reservasi_tour`.`role`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `reservasi_tour`.`role` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `role` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `reservasi_tour`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `reservasi_tour`.`user` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nama` VARCHAR(100) NULL DEFAULT NULL,
  `username` VARCHAR(100) NULL DEFAULT NULL,
  `password` VARCHAR(60) NULL DEFAULT NULL,
  `email` VARCHAR(255) NULL DEFAULT NULL,
  `role_id` INT NULL DEFAULT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `username` (`username` ASC) VISIBLE,
  INDEX `id_role` (`role_id` ASC) VISIBLE,
  CONSTRAINT `user_ibfk_1`
    FOREIGN KEY (`role_id`)
    REFERENCES `reservasi_tour`.`role` (`id`)
    ON DELETE SET NULL
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `reservasi_tour`.`bahasa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `reservasi_tour`.`bahasa` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nama_bahasa` VARCHAR(50) NOT NULL,
  `harga_bahasa` DOUBLE NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` INT NULL DEFAULT NULL,
  `updated_by` INT NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_bahasa_user1_idx` (`created_by` ASC) VISIBLE,
  INDEX `fk_bahasa_user2_idx` (`updated_by` ASC) VISIBLE,
  CONSTRAINT `fk_bahasa_user1`
    FOREIGN KEY (`created_by`)
    REFERENCES `reservasi_tour`.`user` (`id`)
    ON DELETE SET NULL
    ON UPDATE CASCADE,
  CONSTRAINT `fk_bahasa_user2`
    FOREIGN KEY (`updated_by`)
    REFERENCES `reservasi_tour`.`user` (`id`)
    ON DELETE SET NULL
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;

CREATE TABLE `custom_reservasi` (
  `reservasi_id` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- -----------------------------------------------------
-- Table `reservasi_tour`.`guide`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `reservasi_tour`.`guide` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `guide_name` VARCHAR(100) NULL,
  `no_telp` VARCHAR(15) NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` INT NULL DEFAULT NULL,
  `updated_by` INT NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_guide_user1_idx` (`created_by` ASC) VISIBLE,
  INDEX `fk_guide_user2_idx` (`updated_by` ASC) VISIBLE,
  CONSTRAINT `fk_guide_user1`
    FOREIGN KEY (`created_by`)
    REFERENCES `reservasi_tour`.`user` (`id`)
    ON DELETE SET NULL
    ON UPDATE CASCADE,
  CONSTRAINT `fk_guide_user2`
    FOREIGN KEY (`updated_by`)
    REFERENCES `reservasi_tour`.`user` (`id`)
    ON DELETE SET NULL
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `reservasi_tour`.`kendaraan`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `reservasi_tour`.`kendaraan` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nomor_kendaraan` VARCHAR(10) NOT NULL,
  `jenis_kendaraan` VARCHAR(100) NULL DEFAULT NULL,
  `kapasitas` INT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` INT NULL DEFAULT NULL,
  `updated_by` INT NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_kendaraan_user1_idx` (`created_by` ASC) VISIBLE,
  INDEX `fk_kendaraan_user2_idx` (`updated_by` ASC) VISIBLE,
  CONSTRAINT `fk_kendaraan_user1`
    FOREIGN KEY (`created_by`)
    REFERENCES `reservasi_tour`.`user` (`id`)
    ON DELETE SET NULL
    ON UPDATE CASCADE,
  CONSTRAINT `fk_kendaraan_user2`
    FOREIGN KEY (`updated_by`)
    REFERENCES `reservasi_tour`.`user` (`id`)
    ON DELETE SET NULL
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `reservasi_tour`.`vendor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `reservasi_tour`.`vendor` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nama_vendor` VARCHAR(255) NULL,
  `contact` VARCHAR(100) NULL,
  `bank` VARCHAR(100) NULL DEFAULT NULL,
  `no_rekening` VARCHAR(50) NULL DEFAULT NULL,
  `account_name` VARCHAR(100) NULL DEFAULT NULL,
  `validity_period` DATE NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` INT NULL DEFAULT NULL,
  `updated_by` INT NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_vendor_user1_idx` (`created_by` ASC) VISIBLE,
  INDEX `fk_vendor_user2_idx` (`updated_by` ASC) VISIBLE,
  CONSTRAINT `fk_vendor_user1`
    FOREIGN KEY (`created_by`)
    REFERENCES `reservasi_tour`.`user` (`id`)
    ON DELETE SET NULL
    ON UPDATE CASCADE,
  CONSTRAINT `fk_vendor_user2`
    FOREIGN KEY (`updated_by`)
    REFERENCES `reservasi_tour`.`user` (`id`)
    ON DELETE SET NULL
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `reservasi_tour`.`produk`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `reservasi_tour`.`produk` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nama_produk` VARCHAR(255) NULL DEFAULT NULL,
  `harga` DOUBLE NULL DEFAULT NULL,
  `area` VARCHAR(100) NULL DEFAULT NULL,
  `deskripsi` TEXT NULL,
  `tipe_produk` ENUM('transport', 'hotel', 'restaurant', 'tourist_attraction', 'etc') NULL DEFAULT 'etc',
  `vendor_id` INT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` INT NULL DEFAULT NULL,
  `updated_by` INT NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_produk_user1_idx` (`created_by` ASC) VISIBLE,
  INDEX `fk_produk_user2_idx` (`updated_by` ASC) VISIBLE,
  CONSTRAINT `produk_ibfk_1`
    FOREIGN KEY (`vendor_id`)
    REFERENCES `reservasi_tour`.`vendor` (`id`)
    ON DELETE SET NULL
    ON UPDATE CASCADE,
  CONSTRAINT `fk_produk_user1`
    FOREIGN KEY (`created_by`)
    REFERENCES `reservasi_tour`.`user` (`id`)
    ON DELETE SET NULL
    ON UPDATE CASCADE,
  CONSTRAINT `fk_produk_user2`
    FOREIGN KEY (`updated_by`)
    REFERENCES `reservasi_tour`.`user` (`id`)
    ON DELETE SET NULL
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `reservasi_tour`.`program`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `reservasi_tour`.`program` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nama_program` VARCHAR(255) NOT NULL,
  `deskripsi` TEXT NULL DEFAULT NULL,
  `durasi` INT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` INT NULL DEFAULT NULL,
  `updated_by` INT NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_program_user1_idx` (`created_by` ASC) VISIBLE,
  INDEX `fk_program_user2_idx` (`updated_by` ASC) VISIBLE,
  CONSTRAINT `fk_program_user1`
    FOREIGN KEY (`created_by`)
    REFERENCES `reservasi_tour`.`user` (`id`)
    ON DELETE SET NULL
    ON UPDATE CASCADE,
  CONSTRAINT `fk_program_user2`
    FOREIGN KEY (`updated_by`)
    REFERENCES `reservasi_tour`.`user` (`id`)
    ON DELETE SET NULL
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `reservasi_tour`.`sopir`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `reservasi_tour`.`sopir` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nama_sopir` VARCHAR(100) NOT NULL,
  `no_telp` VARCHAR(15) NULL DEFAULT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` INT NULL DEFAULT NULL,
  `updated_by` INT NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_sopir_user1_idx` (`created_by` ASC) VISIBLE,
  INDEX `fk_sopir_user2_idx` (`updated_by` ASC) VISIBLE,
  CONSTRAINT `fk_sopir_user1`
    FOREIGN KEY (`created_by`)
    REFERENCES `reservasi_tour`.`user` (`id`)
    ON DELETE SET NULL
    ON UPDATE CASCADE,
  CONSTRAINT `fk_sopir_user2`
    FOREIGN KEY (`updated_by`)
    REFERENCES `reservasi_tour`.`user` (`id`)
    ON DELETE SET NULL
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `reservasi_tour`.`reservasi`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `reservasi_tour`.`reservasi` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `dob` DATE NULL DEFAULT NULL,
  `date` DATE NULL DEFAULT NULL,
  `program_id` INT NULL DEFAULT NULL,
  `pax` INT NULL DEFAULT NULL,
  `agent` VARCHAR(255) NULL DEFAULT NULL,
  `guest_name` varchar(100) NOT NULL,
  `tour_code` VARCHAR(50) NULL DEFAULT NULL,
  `contact` VARCHAR(100) NULL DEFAULT NULL,
  `activity` VARCHAR(255) NULL DEFAULT NULL,
  `hotel` VARCHAR(100) NULL DEFAULT NULL,
  `flight_arrival_code` VARCHAR(10) NULL DEFAULT NULL,
  `eta` TIME NULL DEFAULT NULL,
  `flight_departure_code` VARCHAR(10) NULL DEFAULT NULL,
  `etd` TIME NULL DEFAULT NULL,
  `pickup` TIME NULL DEFAULT NULL,
  `guide_id` INT NULL DEFAULT NULL,
  `transport_id` INT NULL DEFAULT NULL,
  `sopir_id` INT NULL DEFAULT NULL,
  `remarks` TEXT NULL DEFAULT NULL,
  `bahasa_id` INT NULL,
  `created_by` INT NULL DEFAULT NULL,
  `updated_by` INT NULL DEFAULT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  INDEX `input_by` (`created_by` ASC) VISIBLE,
  INDEX `edit_by` (`updated_by` ASC) VISIBLE,
  INDEX `guide_id` (`guide_id` ASC) VISIBLE,
  INDEX `transport_id` (`transport_id` ASC) VISIBLE,
  INDEX `supir_id` (`sopir_id` ASC) VISIBLE,
  INDEX `fk_reservasi_bahasa1_idx` (`bahasa_id` ASC) VISIBLE,
  INDEX `reservasi_ibfk_5_idx` (`program_id` ASC) VISIBLE,
  CONSTRAINT `reservasi_ibfk_1`
    FOREIGN KEY (`created_by`)
    REFERENCES `reservasi_tour`.`user` (`id`)
    ON DELETE SET NULL
    ON UPDATE CASCADE,
  CONSTRAINT `reservasi_ibfk_2`
    FOREIGN KEY (`updated_by`)
    REFERENCES `reservasi_tour`.`user` (`id`)
    ON DELETE SET NULL
    ON UPDATE CASCADE,
  CONSTRAINT `reservasi_ibfk_4`
    FOREIGN KEY (`guide_id`)
    REFERENCES `reservasi_tour`.`guide` (`id`)
    ON DELETE SET NULL
    ON UPDATE CASCADE,
  CONSTRAINT `reservasi_ibfk_5`
    FOREIGN KEY (`program_id`)
    REFERENCES `reservasi_tour`.`program` (`id`)
    ON DELETE SET NULL
    ON UPDATE CASCADE,
  CONSTRAINT `reservasi_ibfk_6`
    FOREIGN KEY (`transport_id`)
    REFERENCES `reservasi_tour`.`kendaraan` (`id`)
    ON DELETE SET NULL
    ON UPDATE CASCADE,
  CONSTRAINT `reservasi_ibfk_7`
    FOREIGN KEY (`sopir_id`)
    REFERENCES `reservasi_tour`.`sopir` (`id`)
    ON DELETE SET NULL
    ON UPDATE CASCADE,
  CONSTRAINT `fk_reservasi_bahasa1`
    FOREIGN KEY (`bahasa_id`)
    REFERENCES `reservasi_tour`.`bahasa` (`id`)
    ON DELETE SET NULL
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `reservasi_tour`.`tagihan`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `reservasi_tour`.`tagihan` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `total` DOUBLE NULL DEFAULT NULL,
  `status` ENUM('pending', 'paid', 'overdue') NULL DEFAULT NULL,
  `deskripsi` TEXT NULL,
  `reservasi_id` INT UNSIGNED NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  INDEX `fk_tagihan_reservasi1_idx` (`reservasi_id` ASC) VISIBLE,
  CONSTRAINT `fk_tagihan_reservasi1`
    FOREIGN KEY (`reservasi_id`)
    REFERENCES `reservasi_tour`.`reservasi` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `reservasi_tour`.`program_has_produk`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `reservasi_tour`.`program_has_produk` (
  `program_id` INT NOT NULL,
  `produk_id` INT NOT NULL,
  PRIMARY KEY (`program_id`, `produk_id`),
  INDEX `fk_program_has_produk_produk1_idx` (`produk_id` ASC) VISIBLE,
  INDEX `fk_program_has_produk_program1_idx` (`program_id` ASC) VISIBLE,
  CONSTRAINT `fk_program_has_produk_program1`
    FOREIGN KEY (`program_id`)
    REFERENCES `reservasi_tour`.`program` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_program_has_produk_produk1`
    FOREIGN KEY (`produk_id`)
    REFERENCES `reservasi_tour`.`produk` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `reservasi_tour`.`guide_has_bahasa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `reservasi_tour`.`guide_has_bahasa` (
  `guide_id` INT NOT NULL,
  `bahasa_id` INT NOT NULL,
  PRIMARY KEY (`guide_id`, `bahasa_id`),
  INDEX `fk_guide_has_bahasa_bahasa1_idx` (`bahasa_id` ASC) VISIBLE,
  INDEX `fk_guide_has_bahasa_guide1_idx` (`guide_id` ASC) VISIBLE,
  CONSTRAINT `fk_guide_has_bahasa_guide1`
    FOREIGN KEY (`guide_id`)
    REFERENCES `reservasi_tour`.`guide` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_guide_has_bahasa_bahasa1`
    FOREIGN KEY (`bahasa_id`)
    REFERENCES `reservasi_tour`.`bahasa` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
