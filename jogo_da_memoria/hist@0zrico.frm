TYPE=VIEW
query=select `jogo_da_memoria`.`history`.`nome_player` AS `Nome`,`jogo_da_memoria`.`history`.`tabuleiro` AS `Tabuleiro`,`jogo_da_memoria`.`history`.`modalidade` AS `Modalidade`,`jogo_da_memoria`.`history`.`tempo_gasto` AS `Tempo gasto`,`jogo_da_memoria`.`history`.`resultado` AS `Resultado`,`jogo_da_memoria`.`history`.`data_hora` AS `Data e hora` from `jogo_da_memoria`.`history` order by `jogo_da_memoria`.`history`.`data_hora` desc
md5=5d50d184c7f52b77f175b75a7baa2cd8
updatable=1
algorithm=0
definer_user=root
definer_host=localhost
suid=2
with_check_option=0
timestamp=0001670294037301843
create-version=2
source=SELECT nome_player Nome, tabuleiro Tabuleiro, modalidade Modalidade, tempo_gasto \'Tempo gasto\', resultado Resultado, data_hora \'Data e hora\' FROM `history`\nORDER BY data_hora DESC
client_cs_name=utf8mb4
connection_cl_name=utf8mb4_unicode_ci
view_body_utf8=select `jogo_da_memoria`.`history`.`nome_player` AS `Nome`,`jogo_da_memoria`.`history`.`tabuleiro` AS `Tabuleiro`,`jogo_da_memoria`.`history`.`modalidade` AS `Modalidade`,`jogo_da_memoria`.`history`.`tempo_gasto` AS `Tempo gasto`,`jogo_da_memoria`.`history`.`resultado` AS `Resultado`,`jogo_da_memoria`.`history`.`data_hora` AS `Data e hora` from `jogo_da_memoria`.`history` order by `jogo_da_memoria`.`history`.`data_hora` desc
mariadb-version=100427
