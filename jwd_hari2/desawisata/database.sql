CREATE TABLE tb_order(
    order_id INT(11) NOT NULL AUTO_INCREMENT,
    order_nama VARCHAR(100) NOT NULL,
    order_hp VARCHAR(25) NOT NULL,
    order_paket VARCHAR(100),
    order_tambahan VARCHAR(100),
    PRIMARY KEY(order_id)
);

INSERT INTO tb_order (order_id, order_nama, order_hp, order_paket, order_tambahan) VALUES (1, 'Laila', 'Paket 1', '085260608989', 'Tidak ada'), (1, 'Siti', 'Paket 3', '085260609090', 'Tidak ada');