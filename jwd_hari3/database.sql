CREATE TABLE tb_order(
    order_id INT(11) NOT NULL AUTO_INCREMENT,
    order_nama VARCHAR(100) NOT NULL,
    order_hp VARCHAR(25) NOT NULL,
    order_paket VARCHAR(100),
    order_tambahan VARCHAR(100),
    PRIMARY KEY(order_id)
);