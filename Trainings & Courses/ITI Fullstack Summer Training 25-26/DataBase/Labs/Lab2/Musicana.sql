-- Mapping
-- Musican: name, ID(pk) , City , Street , Phone-Number
-- Musican-instrument: ID(pk) , Inst-name(pk)
-- instrument: inst-name(pk) , inst-key
-- Album: title(pk) , ID(pk) , ID(fk) , cr-data  
-- Song: Lable(pk) , Author , title(fk) , Id(fk)
-- Musican-Song: ID(fk) , Lable(fk) 


-- Musican
CREATE TABLE Musican (
  ID INT PRIMARY KEY,
  Name VARCHAR(50),
  City VARCHAR(50),
  Street VARCHAR(50),
  Phone_Number VARCHAR(20)
);

-- Instrument
CREATE TABLE Instrument (
  inst_name VARCHAR(50) PRIMARY KEY,
  inst_key INT
);

-- Musican-instrument 
CREATE TABLE Musican_Instrument (
  ID INT,
  Inst_name VARCHAR(50),
  PRIMARY KEY (ID, Inst_name),
  FOREIGN KEY (ID) REFERENCES Musican(ID),
  FOREIGN KEY (Inst_name) REFERENCES Instrument(inst_name)
);

-- Album
CREATE TABLE Album (
  Title VARCHAR(50) PRIMARY KEY,
  ID INT,
  CR_Date DATE,
  FOREIGN KEY (ID) REFERENCES Musican(ID)
);

-- Song
CREATE TABLE Song (
  Lable VARCHAR(50) PRIMARY KEY,
  Author VARCHAR(50),
  Title VARCHAR(50),
  ID INT,
  FOREIGN KEY (Title) REFERENCES Album(Title),
  FOREIGN KEY (ID) REFERENCES Musican(ID)
);

-- Musican-Song 
CREATE TABLE Musican_Song (
  ID INT,
  Lable VARCHAR(50),
  FOREIGN KEY (ID) REFERENCES Musican(ID),
  FOREIGN KEY (Lable) REFERENCES Song(Lable)
);
