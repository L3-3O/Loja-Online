# Regras de Negócio

## Produtos

- Um produto **inativo** não poderá aparecer no catálogo.
- Um produto **sem estoque** não poderá ser comprado.
- A quantidade adicionada ao carrinho **não poderá ser maior** que o estoque disponível.

## Pedidos

- O total do pedido **deverá ser calculado no servidor**.
- O pedido **deverá ser criado antes** do processamento do pagamento.
- Um pedido **somente será considerado pago** após a confirmação do pagamento.
- Um pedido **cancelado não poderá** ser marcado como entregue.

## Clientes

- Somente clientes **identificados (autenticados)** poderão finalizar uma compra.
- O cliente **poderá consultar somente os próprios pedidos**.

## Administração

- Somente administradores **poderão alterar preços e estoque**.