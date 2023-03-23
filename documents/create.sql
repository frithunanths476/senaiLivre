CREATE TABLE produtos (
    id int not null auto_increment, 
    id_fornecedor int NOT NULL,
    id_usuario int NOT NULL,
    nome VARCHAR(255) NOT NULL,
    categoria TEXT NOT NULL DEFAULT 0,
    valor float NOT NULL DEFAULT 0,
    peso float NOT NULL,
    validade TIMESTAMP NOT null DEFAULT CURRENT_TIMESTAMP(),

    PRIMARY KEY(id),
    FOREIGN KEY (id_fornecedor) REFERENCES fornecedores(id),
    FOREIGN KEY (id_usuario) REFERENCES usuario(id)
);