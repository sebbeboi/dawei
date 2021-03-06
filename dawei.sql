CREATE DATABASE dawei;
USE dawei;

CREATE TABLE categories(
categories_id int(8) PRIMARY KEY AUTO_INCREMENT,
categories_name varchar(32)
);

INSERT INTO categories (categories_id,categories_name) VALUES 
(1,"Kycklingrätter"),
(2,"Kötträtter"),
(3,"Fläskrätter"),
(4,"Fiskrätter"),
(5,"Soppor"),
(6,"Efterrätter")
;

CREATE TABLE Dishes	(	
dishes_id int(8) PRIMARY KEY AUTO_INCREMENT,
dishes_name varchar(32),	
dishes_price float	,
dishes_category_id int(8),	
dishes_description text(500),
dishes_hot int(1),	
dishes_vegan int(1),
dishes_img varchar(32),
FOREIGN KEY (dishes_category_id) REFERENCES categories(categories_id)
);

CREATE TABLE Drinks (
Drinks_id int(8) PRIMARY KEY AUTO_INCREMENT,
Drinks_name varchar(32),
Drinks_price float,
Drinks_description text(500),
Drinks_img varchar(32)
);


INSERT INTO dishes (dishes_name,dishes_price,dishes_description,dishes_hot)
VALUES
("SOM TAM",89,"Stark, sur och söt rätt med papayasallad, limejuice, vitlök, chili, rostade nötter, longbeans, tomat, gurka och morot. Serveras med stickyrice.",2),
("YAM NUA",79,"Wokad stark och syrlig hackad fläskfilé med chili, vitlök, limeblad, rödlök, citrongräs, rostat ris, färsk mynta och koriander.",3),
("GENG KEOWAN MOO",129,"Stark, sur och söt rätt med papayasallad, tigerräkor, bläckfisk,limejuice, vitlök, chili, rostade nötter, longbeans, tomat, gurka och morot serveras med stickyrice.",2),
("SOM TAM TALEY",99,"Kokosmjölksoppa på kycklingfilé, limejuice, galangalrot, svamp, tomat, gul lök, chillipeppar, limeblad, citrongräs & koriander.",1),
("LAAB MOO",109,"(tillagas och serveras i rykande het gjutjärnspanna på traditionellt sätt) Fräst kycklingfilé i ostronsås, chili, vitlök, longbeans, sockerärtor, paprika,grönpeppar och färsk holybasil.",3),
("MOON HOTPAN",159,"Biff i Thailändsk Royalcurry med kokosmjölk, potatis, gul lök och jordnötter.",2),
("KAO PAD GAI",59,"Wokade äggnudlar med kycklingfilé, ostronsås, cashewnötter, gul lök, broccoli, sockerärtor, svamp, paprika, morötter och färsk sweetbasil.",1),
("NUA PAD NAMAN HOI",69,"Traditionell risnudelwok i tamarindsås på fläskfilé, ägg, tofu, lime, rödlök, nötter, riven morot, teblad och böngroddar (Thaikryddor: Såser finns på bordet, välj styrka själv!).",1),
("PAD THAI",89,"Biff i stark röd thaicurry med katchairot, longbeans, färsk grönpeppar, bambuskott, eggplant, chili, vitlök och koriander.",2)
;

UPDATE dishes SET dishes_img = CONCAT("dish" , dishes_id , ".png");


INSERT INTO Drinks (Drinks_name,Drinks_price,Drinks_description,Drinks_img)
VALUES
("Coca-Cola",29,"Coca-Cola är en kolsyrad läskedryck med colasmak","drink1.png"),
("Fanta",29,"Läskdryck med smak av apelsin","drink2.png"),
("Pepsi",29,"Pepsi-Cola, är en kolsyrad läskedryck med smak om cola","drink3.png");






CREATE TABLE Reviews (
reviews_id int(8) PRIMARY KEY AUTO_INCREMENT,
reviews_stars int(1),
reviews_text text(500),
reviews_author varchar(32),
reviews_ip varchar(32)
);

