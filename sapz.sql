CREATE TABLE paciente(
codigoPaciente INTEGER PRIMARY KEY AUTO_INCREMENT NOT NULL,
nomePaciente VARCHAR(50) NOT NULL,
nascimentoPaciente DATE NOT NULL,
sexoPaciente VARCHAR(20) NOT NULL,
responsavelPaciente VARCHAR(50),
dddResponsavel VARCHAR(2),
telefoneResponsavel VARCHAR(8)
);
CREATE TABLE login(
codigoLogin INTEGER PRIMARY KEY AUTO_INCREMENT NOT NULL,
usuario varchar(10),
senha varchar(10)

);

CREATE TABLE atendimento(
codigoAtendimento INTEGER AUTO_INCREMENT,
codigoPaciente INTEGER,
senhaAtendimento INTEGER NOT NULL,
dataAtendimento DATE NOT NULL,
horaAtendimento TIME NOT NULL,
guicheAtendimento VARCHAR(2) NOT NULL,
convenioAtendimento VARCHAR(50) NOT NULL,
desdobramentoAtendimento VARCHAR(200),
PRIMARY KEY(codigoAtendimento, codigoPaciente),
FOREIGN KEY(codigoPaciente) REFERENCES paciente(codigoPaciente)
);

INSERT INTO login(usuario,
senha)VALUES('admin',
'123'
);

SELECT COUNT( a.codigoAtendimento ) 
FROM atendimento a
INNER JOIN paciente p ON p.codigoPaciente = a.codigoPaciente
WHERE p.sexoPaciente =  'F'
