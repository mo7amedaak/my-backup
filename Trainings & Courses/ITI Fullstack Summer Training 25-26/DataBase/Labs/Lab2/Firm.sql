-- Mapping
-- Sales-Office: NUM(pk) , Location , Emp_ID(fk) , 
-- Employee: ID(pk) , Name , SO_Num(fk)
-- Property: Prop_ID(pk) , SO_Num(fk) , Address , City , State , ZipCode 
-- Owner: Owner_ID(pk) , Owner_Name
-- Property_Owner: Owner_ID(fk) , Prop_ID(fk)


CREATE TABLE Sales_Office (
    NUM INT PRIMARY KEY,
    Location VARCHAR(50),
    Emp_ID INT
);

CREATE TABLE Employee (
    ID INT PRIMARY KEY,
    Name VARCHAR(50),
    SO_Num INT,
    FOREIGN KEY (SO_Num) REFERENCES Sales_Office(NUM)
);

ALTER TABLE Sales_Office
ADD FOREIGN KEY (Emp_ID) REFERENCES Employee(ID);

CREATE TABLE Property (
    Prop_ID INT PRIMARY KEY,
    SO_Num INT,
    Address VARCHAR(50),
    City VARCHAR(50),
    State VARCHAR(50),
    ZipCode VARCHAR(50),
    FOREIGN KEY (SO_Num) REFERENCES Sales_Office(NUM)
);

CREATE TABLE Owner (
    Owner_ID INT PRIMARY KEY,
    Owner_Name VARCHAR(50)
);

CREATE TABLE Property_Owner (
    Owner_ID INT,
    Prop_ID INT,
    PRIMARY KEY (Owner_ID, Prop_ID),
    FOREIGN KEY (Owner_ID) REFERENCES Owner(Owner_ID),
    FOREIGN KEY (Prop_ID) REFERENCES Property(Prop_ID)
);
