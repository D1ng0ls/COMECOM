/*senha pra usar no site: ab12@@*/
/*pessoa física*/
insert into pessoa (tipo_pessoa, nome, email, senha, cidade, telefone, documento, foto_nome_pessoa) values
('fisica', 'José Cardoso', '23773272.754124135@mail.com', 'ifmfznzvE4ePM', 'Birigui', '10987654321', '85031335546', 'foto1.png'),
('fisica', 'João Tavarez', '9626222.053706646@mail.com', 'ifmfznzvE4ePM', 'Araçatuba', '10987654321', '27275610163', 'foto2.png'),
('fisica', 'Celso Fagundes', '83463595.88413909@mail.com', 'ifmfznzvE4ePM', 'Maranhão', '10987654321', '44499257453', 'foto3.png'),
('fisica', 'Valéria Freitas', '54875745.13186467@mail.com', 'ifmfznzvE4ePM', 'Birigui', '10987654321', '73015669177', 'foto4.png'),
('fisica', 'Joel Santana', '97666476.46560113@mail.com', 'ifmfznzvE4ePM', 'Araçatuba', '10987654321', '65285207765', 'foto5.png'),
('fisica', 'Rogério Ceni', '3776370.589626818@mail.com', 'ifmfznzvE4ePM', 'Araçatuba', '10987654321', '38493900903', 'foto6.png'),
('fisica', 'Zezim da baixada', '27139054.3681273@mail.com', 'ifmfznzvE4ePM', 'Araçatuba', '10987654321', '00903577024', 'foto7.png'),
('fisica', 'xXFabinhoXx', '4491876.571409692@mail.com', 'ifmfznzvE4ePM', 'Birigui', '10987654321', '80205922793', 'foto8.png'),
('fisica', 'COMOTIRAASLETRAGRANDE', '37024088.6193373@mail.com', 'ifmfznzvE4ePM', 'Birigui', '10987654321', '68408261496', 'foto9.png'),
('fisica', 'Jéssica Oliveira', '39763772.03793328@mail.com', 'ifmfznzvE4ePM', 'Gabriel Monteiro', '10987654321', '35117093971', 'foto10.png'),
('fisica', 'Amandinha Joga10', '78208783.38176677@mail.com', 'ifmfznzvE4ePM', 'Bilac', '10987654321', '20718874885', 'foto11.png'),
('fisica', 'Glauber dos Santos', '94866242.42985252@mail.com', 'ifmfznzvE4ePM', 'Bilac', '10987654321', '40908356067', 'foto12.png'),
('fisica', 'José Eduardo de Carvalho', '74239823.3280976@mail.com', 'ifmfznzvE4ePM', 'Gabriel Monteiro', '10987654321', '40117337441', 'foto13.png'),
('fisica', 'Ronaldo de Azevedo', '2184486.692247335@mail.com', 'ifmfznzvE4ePM', 'Bilac', '10987654321', '37496889654', 'foto14.png'),
('fisica', 'Ana Tereza', '14171551.135563627@mail.com', 'ifmfznzvE4ePM', 'Brasilia', '10987654321', '76314385135', 'foto15.png'),
('fisica', 'Luana Maravilha', '39020170.55212299@mail.com', 'ifmfznzvE4ePM', 'Birigui', '10987654321', '36532739041', 'foto16.png'),
('fisica', 'Fabiola de Castro', '46123731.81756412@mail.com', 'ifmfznzvE4ePM', 'Jandaia', '10987654321', '55457941163', 'foto17.png'),
('fisica', 'Raposo', '67837933.20530683@mail.com', 'ifmfznzvE4ePM', 'Belém', '10987654321', '19678678523', 'foto18.png'),
('fisica', 'Amélia Rodrigues', '62990986.027727485@mail.com', 'ifmfznzvE4ePM', 'Aparecida do Oeste', '10987654321', '23273856477', 'foto19.png'),
('fisica', 'Lucas Marengo10', '95940606.1902659@mail.com', 'ifmfznzvE4ePM', 'Birigui', '10987654321', '97991369349', 'foto20.png');

select*from pessoa;

/*pessoa jurídica*/
insert into pessoa (tipo_pessoa, nome, email, senha, cidade, telefone, documento, qnt_lojas, foto_nome_pessoa) values
('juridica', 'Magazine Luiza', '89973002.99630097@mail.com', 'ifmfznzvE4ePM', 'birigui', '10987654321', '90489500040','13'),
('juridica', 'Golden Celulares', '26293829.636277888@mail.com', 'ifmfznzvE4ePM', 'birigui', '10987654321', '36007579887','11'),
('juridica', 'Ponto Frio', '46396945.73158433@mail.com', 'ifmfznzvE4ePM', 'birigui', '10987654321', '15102867802','23'),
('juridica', 'Birigames', '44040530.57227787@mail.com', 'ifmfznzvE4ePM', 'birigui', '10987654321', '88806972999','23'),
('juridica', 'Kabum', '77326425.94404261@mail.com', 'ifmfznzvE4ePM', 'birigui', '10987654321', '37953929356','2'),
('juridica', 'Pichau', '71075450.31490992@mail.com', 'ifmfznzvE4ePM', 'birigui', '10987654321', '57338306529','17'),
('juridica', 'Gigabyte', '90307702.62499015@mail.com', 'ifmfznzvE4ePM', 'birigui', '10987654321', '54066411677','13'),
('juridica', 'Ricardo Eletro', '85193625.68332992@mail.com', 'ifmfznzvE4ePM', 'birigui', '10987654321', '53349225262','24'),
('juridica', 'Ta em shock?', '80123922.12229627@mail.com', 'ifmfznzvE4ePM', 'birigui', '10987654321', '79893565306','27'),
('juridica', 'Rogério Celulares', '70360413.79456052@mail.com', 'ifmfznzvE4ePM', 'birigui', '10987654321', '75758498851','11'),
/* eletronicos */
('juridica', 'Hortifrute Concórdia', '25078031.16892704@mail.com', 'ifmfznzvE4ePM', 'birigui', '10987654321', '90330850457','1'),
('juridica', 'Amigão Supermercados', '9037304.798226146@mail.com', 'ifmfznzvE4ePM', 'birigui', '10987654321', '71897062245','1'),
('juridica', 'Bandeirantes Supermercados', '25905061.525108572@mail.com', 'ifmfznzvE4ePM', 'birigui', '10987654321', '55108294661','16'),
('juridica', 'Ponto da Economia', '99369439.59517449@mail.com', 'ifmfznzvE4ePM', 'birigui', '10987654321', '65546994529','2'),
('juridica', 'Mercado Maneiro', '97834232.57350652@mail.com', 'ifmfznzvE4ePM', 'birigui', '10987654321', '24076943731','17'),
('juridica', 'Açogue do Zé', '28210593.206616983@mail.com', 'ifmfznzvE4ePM', 'birigui', '10987654321', '00515509041','4'),
('juridica', 'Mercearia Águia', '83808914.9545856@mail.com', 'ifmfznzvE4ePM', 'birigui', '10987654321', '90966943727','22'),
('juridica', 'Empório da Verdura', '14755216.172797695@mail.com', 'ifmfznzvE4ePM', 'birigui', '10987654321', '10374516669','8'),
('juridica', 'All Face', '32088335.971108194@mail.com', 'ifmfznzvE4ePM', 'birigui', '10987654321', '33130140587','6'),
('juridica', 'Zeri Bolos', '37398388.90465832@mail.com', 'ifmfznzvE4ePM', 'birigui', '10987654321', '21710597934','7'),
/* mercado */
('juridica', 'Tramontina', '59547086.23421183@mail.com', 'ifmfznzvE4ePM', 'birigui', '10987654321', '46164500468','3'),
('juridica', 'Makita', '44238479.9308381@mail.com', 'ifmfznzvE4ePM', 'birigui', '10987654321', '52760869641','30'),
('juridica', 'Black+Decker', '49508919.763056956@mail.com', 'ifmfznzvE4ePM', 'birigui', '10987654321', '86445212367','29'),
('juridica', 'Shein', '79461931.34507233@mail.com', 'ifmfznzvE4ePM', 'birigui', '10987654321', '21922322620','4'),
('juridica', 'Casas Bahia', '44387813.33610363@mail.com', 'ifmfznzvE4ePM', 'birigui', '10987654321', '17305567720','7'),
('juridica', 'Havan', '88868637.85991222@mail.com', 'ifmfznzvE4ePM', 'birigui', '10987654321', '99817415537','9'),
('juridica', 'Lojas CEM', '46945969.365377754@mail.com', 'ifmfznzvE4ePM', 'birigui', '10987654321', '97504444745','22'),
('juridica', 'Riachuelo', '5116949.846934171@mail.com', 'ifmfznzvE4ePM', 'birigui', '10987654321', '29581176867','5'),
('juridica', 'Hering', '43209168.863023125@mail.com', 'ifmfznzvE4ePM', 'birigui', '10987654321', '78366265561','10'),
('juridica', 'Caedu', '66797489.910285816@mail.com', 'ifmfznzvE4ePM', 'birigui', '10987654321', '55765948587','26'),
/* moda e casa */
('juridica', 'Igui Rações', '9186560.209593026@mail.com', 'ifmfznzvE4ePM', 'birigui', '10987654321', '56531057230','4'),
('juridica', 'Cobasi', '95397066.38508032@mail.com', 'ifmfznzvE4ePM', 'birigui', '10987654321', '17827899626','23'),
('juridica', 'Pantal', '13386726.092538381@mail.com', 'ifmfznzvE4ePM', 'birigui', '10987654321', '91308694911','6'),
('juridica', 'Tutticão Pet Center', '86496226.10341184@mail.com', 'ifmfznzvE4ePM', 'birigui', '10987654321', '75328961833','3'),
('juridica', 'Cãolinas Pet Banho e Tosa', '25950771.376503833@mail.com', 'ifmfznzvE4ePM', 'birigui', '10987654321', '23454608706','7'),
('juridica', 'Faro Fino', '87182690.93249579@mail.com', 'ifmfznzvE4ePM', 'birigui', '10987654321', '61495481690','7'),
('juridica', 'Help dog', '85487294.27848978@mail.com', 'ifmfznzvE4ePM', 'birigui', '10987654321', '06378417949','6'),
('juridica', 'Medicina Animal', '12798286.647793442@mail.com', 'ifmfznzvE4ePM', 'birigui', '10987654321', '19280190650','27'),
('juridica', 'Cuidados Pet', '53339004.96999599@mail.com', 'ifmfznzvE4ePM', 'birigui', '10987654321', '75966724699','7'),
('juridica', 'Pet & Repet', '2181932.2837892966@mail.com', 'ifmfznzvE4ePM', 'birigui', '10987654321', '30610437340','1')
/* petshop */