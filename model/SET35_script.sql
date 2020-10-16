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



