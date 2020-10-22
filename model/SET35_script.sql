-- 
-- tout dabord Focus sur la table EQUIPIER
--
--
CREATE TABLE EQUIPIER (
    codeEq      VARCHAR(5) NOT NULL , 
    surnomEq    VARCHAR(15) NOT NULL , 
    nomEq       VARCHAR(50) , 
    fonctionEq  VARCHAR(15) NOT NULL , 
    PRIMARY KEY (codeEq)	
);
INSERT INTO EQUIPIER VALUES
    ( 'BOSS'  , 'Gourou' 	, 'MARCON Emmanuel'	, 'Directeur' ) ,
    ( 'DAN'   , 'Dantel' 	, 'CASTOR Jean'	, 'Commercial' ) , 
    ( 'DID'   , 'Didi' 	, 'LAMBROUY Didier' , 'Commercial' ) , 
    ( 'PAT'   , 'Patou' 	, NULL			, 'Moniteur' ) , 
    ( 'FRED'  , 'Fredo' 	, NULL			, 'Moniteur' ) , 
    ( 'WIL'   , 'Will' 	, 'SOVÉ Willy'	, 'Moniteur' ) , 
    ( 'KIM'   , 'Kimi' 	, 'GAGA Géralde'	, 'e-commerce' ) , 
    ( 'ADJ'   , 'Isa' 	, 'FONFEC Sophie'	, 'e-commerce' ) , 
    ( 'FAN'   , 'Fany' 	, NULL			, 'e-commerce' ) ;

--
--
-- Et voici le reste du script
--
CREATE TABLE QUESTION (
    idQuest INT NOT NULL , 
    libQuest VARCHAR(100) NOT NULL ,
    PRIMARY KEY (idQuest)	
);
CREATE TABLE QDP (
    codeEq VARCHAR(5) NOT NULL , 
    idQuest INT NOT NULL , 
    reponse  VARCHAR(500) , 
    PRIMARY KEY (codeEq , idQuest) , 
    FOREIGN KEY (codeEq) REFERENCES EQUIPIER(codeEq) , 
    FOREIGN KEY (idQuest) REFERENCES QUESTION(idQuest)
);
--
-- data pour finir
INSERT INTO QUESTION   VALUES
    ( 1  , "Ma qualité préférée chez les autres."  ) ,
    ( 2  , "Mon idée du bonheur. "  ) ,
    ( 3  , "La couleur que je préfère."  ) ,
    ( 4  , "Le plat que je préfère."  ) ,
    ( 5  , "En quoi je voudrais être réincarné.e."  ); 
INSERT INTO QDP   VALUES
    ( "BOSS" , 1  , "Présider et décider"  ) ,
    ( "BOSS" , 2  , "Etre roi de ce pays"  ) ,
    ( "BOSS" , 3  , "Jaune sable"  ) ,
    ( "BOSS" , 4  , "La dinde de la cour"  ) ,
    ( "BOSS" , 5  , "Louis XIV"  ) ;


CREATE TABLE DUREE (
    codeDuree VARCHAR(2) NOT NULL , 
    libDuree VARCHAR(10) NOT NULL, 
    PRIMARY KEY (codeDuree)
);

CREATE TABLE CATPROD (
    categoProd VARCHAR(2) NOT NULL , 
    libDuree VARCHAR(20) NOT NULL, 
    PRIMARY KEY (categoProd)
);

CREATE TABLE TARIFICATION (
    codeDuree VARCHAR(2) NOT NULL , 
    categoProd VARCHAR(2) NOT NULL , 
    prixLocation DECIMAL(5,2) NOT NULL,
    PRIMARY KEY (codeDuree, categoProd),
    CONSTRAINT FK_Tarification_1 FOREIGN KEY (codeDuree) REFERENCES DUREE(codeDuree),
    CONSTRAINT FK_Tarification_2 FOREIGN KEY (categoProd) REFERENCES CATPROD(categoProd)
);

INSERT INTO DUREE VALUES 
("1h", "1 heure"),
('2h','2 heures'),
('3h', '3 heures'),
('4h','4 heures'),
('1j','1 jour'),
('2j','2 jours'),
('3j','3 jours'),
('4j','4 jours'),
('5j','5 jours'),
('6j','6 jours');

INSERT INTO CATPROD VALUES
('PS','Planche de surf'),
('BB','Bodyboard'),
('CO','Combinaison');

INSERT INTO TARIFICATION VALUES
('1h','PS',10),
('2h','PS',15),
('3h','PS',20),
('4h','PS',25),
('1j','PS',35),
('2j','PS',45),
('3j','PS',55),
('4j','PS',65),
('5j','PS',75),
('6j','PS',85),

('1h','BB',7),
('2h','BB',10),
('3h','BB',15),
('4h','BB',20),
('1j','BB',25),
('2j','BB',35),
('3j','BB',45),
('4j','BB',55),
('5j','BB',65),
('6j','BB',75),

('1h','CO',7),
('2h','CO',10),
('3h','CO',15),
('4h','CO',20),
('1j','CO',25),
('2j','CO',35),
('3j','CO',45),
('4j','CO',55),
('5j','CO',65),
('6j','CO',75);