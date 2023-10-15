TYPE=TRIGGERS
triggers='CREATE DEFINER=`root`@`localhost` TRIGGER `ProductBeforeInsert` BEFORE INSERT ON `products` FOR EACH ROW BEGIN\n	IF NEW.price BETWEEN 1000 and 2000 THEN\n    	SET NEW.discount = 5;\n    ELSEIF NEW.price BETWEEN 2000 AND 3000 THEN\n     	SET NEW.discount = 10;\n    ELSEIF NEW.price > 3000 THEN\n    	SET NEW.discount = 15;\n    END IF;\nEND'
sql_modes=1098907648
definers='root@localhost'
client_cs_names='utf8mb4'
connection_cl_names='utf8mb4_unicode_ci'
db_cl_names='utf8mb4_general_ci'
created=1697192471112402
