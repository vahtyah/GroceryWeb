TYPE=TRIGGERS
triggers='CREATE DEFINER=`root`@`localhost` TRIGGER `DeleteProductOnWarehouseDelet` BEFORE DELETE ON `warehouses` FOR EACH ROW BEGIN\n    DELETE FROM products WHERE products.warehouse_id = OLD.id;\nEND'
sql_modes=1098907648
definers='root@localhost'
client_cs_names='utf8mb4'
connection_cl_names='utf8mb4_unicode_ci'
db_cl_names='utf8mb4_general_ci'
created=1697617199795792
