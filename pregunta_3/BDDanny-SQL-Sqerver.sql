USE master;
GO

IF DB_ID('examen_1') IS NOT NULL
BEGIN
    PRINT 'Database examen_1 already exists.';
END
ELSE
BEGIN
    CREATE DATABASE examen_1;
    PRINT 'Database examen_1 created successfully.';
END
GO

USE examen_1;
GO

-- Table structure for table 'cliente'
IF OBJECT_ID('cliente', 'U') IS NOT NULL
    DROP TABLE cliente;
GO

CREATE TABLE cliente (
    id_cliente NVARCHAR(35) NOT NULL,
    id_usuario_ci INT NOT NULL,
    PRIMARY KEY (id_cliente),
    CONSTRAINT FK_cliente_usuario FOREIGN KEY (id_usuario_ci) REFERENCES usuario (id_usuario_ci)
);
GO

-- Dumping data for table 'cliente'
INSERT INTO cliente VALUES ('cliente_2', 2145784), ('cliente_3', 9876543), ('cliente_1', 9908645);
GO

-- Table structure for table 'cuenta_bancaria'
IF OBJECT_ID('cuenta_bancaria', 'U') IS NOT NULL
    DROP TABLE cuenta_bancaria;
GO

CREATE TABLE cuenta_bancaria (
    id_cuenta_bancaria NVARCHAR(35) NOT NULL,
    id_cliente NVARCHAR(35) NOT NULL,
    tipo NVARCHAR(35) NOT NULL,
    saldo FLOAT NOT NULL,
    PRIMARY KEY (id_cuenta_bancaria),
    CONSTRAINT FK_cuenta_bancaria_cliente FOREIGN KEY (id_cliente) REFERENCES cliente (id_cliente)
);
GO

-- Dumping data for table 'cuenta_bancaria'
INSERT INTO cuenta_bancaria VALUES ('cuenta_1', 'cliente_1', 'Cuenta de ahorros', 2400.54),
                                   ('cuenta_2', 'cliente_1', 'Cuenta corriente', 1500),
                                   ('cuenta_3', 'cliente_2', 'Cuenta de inversión', 45200),
                                   ('cuenta_4', 'cliente_3', 'Cuenta de ahorros', 350.25),
                                   ('cuenta_5', 'cliente_3', 'Cuenta corriente', 18000);
GO

-- Table structure for table 'departamento'
IF OBJECT_ID('departamento', 'U') IS NOT NULL
    DROP TABLE departamento;
GO

CREATE TABLE departamento (
    id_departamento NVARCHAR(35) NOT NULL,
    id_director_bancario NVARCHAR(35) NOT NULL,
    tipo NVARCHAR(35) NOT NULL,
    monto FLOAT NOT NULL,
    PRIMARY KEY (id_departamento),
    CONSTRAINT FK_departamento_director_bancario FOREIGN KEY (id_director_bancario) REFERENCES director_bancario (id_director_bancario)
);
GO

-- Dumping data for table 'departamento'
INSERT INTO departamento VALUES ('dpto_1', 'dirBanc_1', 'Departamento de Operaciones', 54000.54),
                                 ('dpto_2', 'dirBanc_1', 'Departamento de Crédito y Préstamos', 7000050),
                                 ('dpto_3', 'dirBanc_2', 'Departamento de Crédito y Préstamos', 50000);
GO

-- Table structure for table 'director_bancario'
IF OBJECT_ID('director_bancario', 'U') IS NOT NULL
    DROP TABLE director_bancario;
GO

CREATE TABLE director_bancario (
    id_director_bancario NVARCHAR(35) NOT NULL,
    id_usuario_ci INT NOT NULL,
    PRIMARY KEY (id_director_bancario),
    CONSTRAINT FK_director_bancario_usuario FOREIGN KEY (id_usuario_ci) REFERENCES usuario (id_usuario_ci)
);
GO

-- Dumping data for table 'director_bancario'
INSERT INTO director_bancario VALUES ('dirBanc_1', 1234567), ('dirBanc_2', 7778889);
GO

-- Table structure for table 'usuario'
IF OBJECT_ID('usuario', 'U') IS NOT NULL
    DROP TABLE usuario;
GO

CREATE TABLE usuario (
    id_usuario_ci INT NOT NULL,
    nombre NVARCHAR(45) NOT NULL,
    apellido_pat NVARCHAR(45) NULL,
    apellido_mat NVARCHAR(45) NULL,
    fecha_nacimiento DATE NOT NULL,
    contraseña NVARCHAR(45) NOT NULL,
    PRIMARY KEY (id_usuario_ci)
);
GO

-- Dumping data for table 'usuario'
INSERT INTO usuario VALUES (1234567, 'María', 'González', 'Pérez', '1990-12-15', '123456'),
                            (2145784, 'Armandño', 'Paredes', 'Feliz', '2002-01-08', '123456'),
                            (7778889, 'Pedro', 'Santana', 'García', '1995-09-28', '123456'),
                            (9876543, 'Ana', 'López', 'Ramírez', '2000-03-10', '123456'),
                            (9908645, 'Yeferzon', 'Gutierritos', 'Feliz', '1998-05-04', '123456');
GO
