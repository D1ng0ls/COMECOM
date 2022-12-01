/*Inserção de produtos nas categorias*/
/*pessoa jurídica*/
insert into oferta (id_pessoa, data_oferta, titulo, texto, endereco, inicio_oferta, termino_oferta, preco_original, desconto, 
					preco_atual, foto_nome_oferta, categoria, marca) values
('21', current_timestamp(), 'Teste', 'Teste teste teste', 'https://www.youtube.com/watch?v=KuliCkN2oic&list=RDGMEM6ijAnFTG9nX1G-kbWBUCJAVMIPXIgEAGe4U&index=2', '2022-01-01', '2023-01-05', '90', '10',
						'81', '21_eletronicos.webp', 'eletronicos', 'Xiaomi')