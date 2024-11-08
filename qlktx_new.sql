CREATE DATABASE  IF NOT EXISTS `qlktx` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `qlktx`;
-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: localhost    Database: qlktx
-- ------------------------------------------------------
-- Server version	8.0.37

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `lop`
--

DROP TABLE IF EXISTS lop;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE lop (
  ma_lop varchar(10) NOT NULL,
  ten_lop varchar(100) DEFAULT NULL,
  PRIMARY KEY (ma_lop)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lop`
--

LOCK TABLES lop WRITE;
/*!40000 ALTER TABLE lop DISABLE KEYS */;
INSERT INTO lop VALUES ('CNTT','Công nghệ thông tin'),('KDNG','Kinh doanh nông nghiệp'),('KTNN','Kinh tế nông nghiệp'),('LHC','Luật hành chính'),('NNA','Ngôn Ngữ Anh'),('QTKD','Quản trị kinh doanh');
/*!40000 ALTER TABLE lop ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nhanvien`
--

DROP TABLE IF EXISTS nhanvien;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE nhanvien (
  ma_nhan_vien varchar(8) NOT NULL ,
  ho_ten varchar(100) DEFAULT NULL,
  so_dien_thoai varchar(15) DEFAULT NULL,
  ghi_chu text,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (ma_nhan_vien)
) ENGINE=InnoDB   DEFAULT  CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS nhanvien_counter;
CREATE TABLE nhanvien_counter (
  id INT NOT NULL AUTO_INCREMENT,
  current_number INT NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
INSERT INTO nhanvien_counter (current_number) VALUES (1883);
--
-- Dumping data for table `nhanvien`
--

LOCK TABLES nhanvien WRITE;
/*!40000 ALTER TABLE nhanvien DISABLE KEYS */;
INSERT INTO nhanvien VALUES ('G2111881','hoai duc','0898821595','admin','e10adc3949ba59abbe56e057f20f883e'),('G2111882','hoai duc','0898821596','nhan vien','e10adc3949ba59abbe56e057f20f883e');
/*!40000 ALTER TABLE nhanvien ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phong`
--

DROP TABLE IF EXISTS phong;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE phong (
  ma_phong varchar(7) NOT NULL ,
  ten_phong varchar(100) DEFAULT NULL,
  loai_phong varchar(3) DEFAULT NULL,
  dien_tich float DEFAULT NULL,
  so_giuong int DEFAULT NULL,
  gia_thue decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (ma_phong)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phong`
--

LOCK TABLES phong WRITE;
/*!40000 ALTER TABLE phong DISABLE KEYS */;
INSERT INTO phong VALUES ('AC05003','Phòng 3 dãy C5','nam',25.5,2,500000.00),('AC05002','Phòng 2 dãy C5','nam',30,4,450000.00);
/*!40000 ALTER TABLE phong ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sinhvien`
--

DROP TABLE IF EXISTS sinhvien;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE sinhvien (
  ma_sinh_vien varchar(8) NOT NULL,
  ho_ten varchar(100) DEFAULT NULL,
  gioi_tinh varchar(3) DEFAULT NULL,
  so_dien_thoai varchar(15) DEFAULT NULL,
  ma_lop varchar(10) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (ma_sinh_vien),
  KEY ma_lop (ma_lop),
  CONSTRAINT sinhvien_ibfk_1 FOREIGN KEY (ma_lop) REFERENCES lop (ma_lop)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sinhvien`
--

LOCK TABLES sinhvien WRITE;
/*!40000 ALTER TABLE sinhvien DISABLE KEYS */;
INSERT INTO sinhvien VALUES ('B2105638','Nguyen Hoang Thach','nam','0868376526','CNTT',md5('123')),('B2111875','Huynh Van An','nam','0835525253','CNTT',md5('123')),('B2111881','Nguyễn Hoài Đức','nam','0898821595','CNTT',md5('123')),('B2111882','Nguyễn Văn A','nam','0898821598','KDNG',md5('123')),('B2401314','Quách Thúy Quyền','nu','0786789654','LHC',md5('123')),('B2401769','Lê Mỹ Như','nu','0939281902','QTKD',md5('123')),('B2401788','Nguyễn Ngọc Anh Thư','nu','0988172635','QTKD',md5('123')),('B2401796','Chung Thị Hồng Yến','nu','0394987654','QTKD',md5('123')),('B2402119','Nguyễn Ngọc Thảo','nu','0836827463','KTNN',md5('123')),('B2402123','Nguyễn Thị Ngọc Hân','nu','0837261890','KTNN',md5('123')),('B2402215','Huỳnh Huyền Trân','nu','0865342516','KTNN',md5('123')),('B2402234','Nguyễn Ngọc Thảo Vy','nu','0975263456','KTNN',md5('123')),('B2403104','Lê Thị Mỹ Xuyên','nu','0788172639','LHC',md5('123')),('B2408340','Hứa Thị Ngọc Hân','nu','0860762538','NNA',md5('123')),('B2408388','Trần Ngọc Mẫn','nu','0965827390','NNA',md5('123')),('B2408404','Phạm Phan Chúc Ni','nu','0977263547','NNA',md5('123')),('B2408430','Nguyễn Thị Ngọc Trân','nu','0868450022','NNA',md5('123')),('B2408904','Trần Thanh Hà','nu','0976253410','CNTT',md5('123')),('B2408911','Nguyễn Minh Khôi','nam','0976524367','CNTT',md5('123')),('B2408925','Đoàn Khả Nguyên','nam','0912876536','CNTT',md5('123')),('B2408929','Lê Thị Mỹ Tâm','nu','0907998865','CNTT',md5('123'));
/*!40000 ALTER TABLE sinhvien ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `thuephong`
--

DROP TABLE IF EXISTS thuephong;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE thuephong (
  ma_hop_dong int NOT NULL AUTO_INCREMENT,
  ma_sinh_vien varchar(10) DEFAULT NULL,
  ma_phong varchar(7) DEFAULT NULL,
  bat_dau date DEFAULT NULL,
  ket_thuc date DEFAULT NULL,
  tien_dat_coc decimal(10,2) DEFAULT NULL,
  gia_thue_thuc_te decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (ma_hop_dong),
  KEY ma_sinh_vien (ma_sinh_vien),
  KEY ma_phong (ma_phong),
  CONSTRAINT thuephong_ibfk_1 FOREIGN KEY (ma_sinh_vien) REFERENCES sinhvien (ma_sinh_vien),
  CONSTRAINT thuephong_ibfk_2 FOREIGN KEY (ma_phong) REFERENCES phong (ma_phong)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `thuephong`
--

LOCK TABLES thuephong WRITE;
/*!40000 ALTER TABLE thuephong DISABLE KEYS */;
INSERT INTO thuephong VALUES (1,'B2111881','AC05003','2024-11-07','2025-03-05',100000.00,50000.00);
/*!40000 ALTER TABLE thuephong ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tt_thuephong`
--

DROP TABLE IF EXISTS tt_thuephong;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE tt_thuephong (
  ma_hop_dong int NOT NULL,
  thang_nam date NOT NULL,
  so_tien decimal(10,2) DEFAULT NULL,
  ngay_thanh_toan date DEFAULT NULL,
  ma_nhan_vien varchar(8) DEFAULT NULL,
  PRIMARY KEY (ma_hop_dong,thang_nam),
  KEY ma_nhan_vien (ma_nhan_vien),
  CONSTRAINT tt_thuephong_ibfk_1 FOREIGN KEY (ma_hop_dong) REFERENCES thuephong (ma_hop_dong),
  CONSTRAINT tt_thuephong_ibfk_2 FOREIGN KEY (ma_nhan_vien) REFERENCES nhanvien (ma_nhan_vien)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tt_thuephong`
--

LOCK TABLES tt_thuephong WRITE;
/*!40000 ALTER TABLE tt_thuephong DISABLE KEYS */;
/*!40000 ALTER TABLE tt_thuephong ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-11-07 11:59:08
