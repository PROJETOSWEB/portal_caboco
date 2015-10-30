-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 29-Out-2015 às 06:18
-- Versão do servidor: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin_caboco`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `album`
--

CREATE TABLE IF NOT EXISTS `album` (
  `album_id` int(10) unsigned NOT NULL,
  `nome` varchar(100) NOT NULL DEFAULT '',
  `usuario_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `album`
--

INSERT INTO `album` (`album_id`, `nome`, `usuario_id`) VALUES
(5, 'evento xxx', 2),
(6, 'pooo', 1),
(7, 'FESTA ', 1),
(8, 'KSAXASX', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `album_fotos`
--

CREATE TABLE IF NOT EXISTS `album_fotos` (
  `album_fotos_id` int(10) unsigned NOT NULL,
  `data` varchar(45) NOT NULL DEFAULT '',
  `album_id` int(10) unsigned NOT NULL,
  `img` varchar(45) NOT NULL DEFAULT '',
  `legenda` varchar(45) NOT NULL DEFAULT '',
  `capa_album` int(10) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `album_fotos`
--

INSERT INTO `album_fotos` (`album_fotos_id`, `data`, `album_id`, `img`, `legenda`, `capa_album`) VALUES
(1, '02-10-2015', 7, 'hora-de-aventura-destaque.jpg  ', 'Fin- Hora da Aventura', 2),
(2, '02-10-2015', 5, 'hora-de-aventura-finn-5373ac5591bd4.jpg', 'Fin- Hora da Aventura', 2),
(3, '03-10-2015', 8, 'hora-de-aventura-destaque.jpg      ', 'fin e jake', 1),
(4, '01-10-2015', 7, 'foto-festa2.jpg ', 'FOTO FESTA', 1),
(5, '03-10-2015', 7, 'foto-festa3.jpg', 'FESTA 04', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `banner`
--

CREATE TABLE IF NOT EXISTS `banner` (
  `banner_id` int(10) unsigned NOT NULL,
  `data_inicio` date NOT NULL DEFAULT '0000-00-00',
  `data_final` date NOT NULL DEFAULT '0000-00-00',
  `formato` varchar(100) NOT NULL DEFAULT '',
  `titulo` varchar(200) NOT NULL DEFAULT '',
  `link` varchar(45) NOT NULL DEFAULT '',
  `img` varchar(100) NOT NULL DEFAULT '',
  `usuario_id` int(10) unsigned NOT NULL,
  `publicar` int(10) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `banner`
--

INSERT INTO `banner` (`banner_id`, `data_inicio`, `data_final`, `formato`, `titulo`, `link`, `img`, `usuario_id`, `publicar`) VALUES
(5, '2015-10-14', '2015-10-30', 'SQUARE BANNER - HOME', 'BANNER HOME', 'http://', '300x250.gif', 1, 1),
(6, '2015-09-30', '2015-10-29', 'SQUARE BANNER - HOME', 'dsada', 'http://dasdad', 'image_preview300x250.gif', 1, 1),
(8, '2015-10-29', '2015-11-07', 'SUPER BANNER - HOME', 'teste 01', 'http://', 'construmetal-2016-super-banner-728x90.gif', 2, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `blogs`
--

CREATE TABLE IF NOT EXISTS `blogs` (
  `blogs_id` int(10) unsigned NOT NULL,
  `nome` varchar(100) NOT NULL DEFAULT '',
  `titulo` varchar(100) NOT NULL DEFAULT '',
  `link` varchar(45) NOT NULL DEFAULT '',
  `img` varchar(100) NOT NULL DEFAULT '',
  `usuario_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `blogs`
--

INSERT INTO `blogs` (`blogs_id`, `nome`, `titulo`, `link`, `img`, `usuario_id`) VALUES
(2, 'Thiago Maneschy', 'Titulo Teste', 'http://www.carangoavapor.com', 'face01.jpg', 2),
(3, 'Karoline Oliveiraa', 'czxczc', 'http://dhaudhaudhad', 'hora-de-aventura-destaque.jpg', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `editoria`
--

CREATE TABLE IF NOT EXISTS `editoria` (
  `editoria_id` int(10) unsigned NOT NULL,
  `nome` varchar(100) NOT NULL DEFAULT '',
  `cor` varchar(45) NOT NULL DEFAULT '',
  `class` varchar(45) NOT NULL DEFAULT '',
  `bg` varchar(45) NOT NULL DEFAULT ''
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `editoria`
--

INSERT INTO `editoria` (`editoria_id`, `nome`, `cor`, `class`, `bg`) VALUES
(1, 'NOTÍCIAS', 'verde', 'verde-ft', 'verde-bg'),
(2, 'POLÍTICA', 'verde', 'verde-ft', 'verde-bg'),
(3, 'ESPORTE', 'vermelho', 'vermelho-ft', 'vermelho-bg'),
(4, 'ENTRETENIMENTO', 'laranja', 'laranja-ft', 'laranja-bg'),
(5, 'AMAZÔNIA', 'roxo', 'roxo-ft', 'roxo-bg'),
(6, 'POLÍCIA', 'marrom', 'marrom-ft', 'marrom-bg'),
(7, 'CULTURA', 'azul', 'azul-ft', 'azul-bg'),
(8, 'RELIGIÃO', 'amarelo-escuro', 'amarelo-escuro-ft', 'amarelo-escuro-bg'),
(9, 'MUNDO', 'verde', 'verde-ft', 'verde-bg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `noticia`
--

CREATE TABLE IF NOT EXISTS `noticia` (
  `noticia_id` int(10) unsigned NOT NULL,
  `sub_editoriais_id` int(10) unsigned NOT NULL,
  `data_noticia` varchar(45) NOT NULL DEFAULT '',
  `fonte` varchar(100) NOT NULL DEFAULT '',
  `titulo` varchar(100) NOT NULL DEFAULT '',
  `texto` longtext NOT NULL,
  `texto_detalhe` longtext NOT NULL,
  `img` varchar(100) NOT NULL DEFAULT '',
  `legenda` varchar(100) NOT NULL DEFAULT '',
  `posicao_img` varchar(100) NOT NULL DEFAULT '',
  `video` varchar(100) NOT NULL DEFAULT '',
  `legenda_video` varchar(100) NOT NULL DEFAULT '',
  `tags` varchar(200) NOT NULL DEFAULT '',
  `destaque_banner` int(10) unsigned NOT NULL DEFAULT '0',
  `publicar` int(10) unsigned NOT NULL DEFAULT '0',
  `usuario_id` int(10) unsigned NOT NULL,
  `cliks` int(10) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `noticia`
--

INSERT INTO `noticia` (`noticia_id`, `sub_editoriais_id`, `data_noticia`, `fonte`, `titulo`, `texto`, `texto_detalhe`, `img`, `legenda`, `posicao_img`, `video`, `legenda_video`, `tags`, `destaque_banner`, `publicar`, `usuario_id`, `cliks`) VALUES
(4, 41, '14-10-2015', 'G1.com', 'Com Neymar, Dunga terá de sacrificar Oscar, Douglas Costa ou centroavante', 'A presença de um jogador fazendo a função de centroavante, seja ele de origem, como Ricardo Oliveira, ou adaptado, caso de Hulk, não vinha sendo habitual nessa segunda passagem do técnico pela Seleção. No início de seu trabalho, Diego Tardelli e Roberto Firmino se alternaram como parceiros de ataque do craque, num sistema de mais movimentação. É possível que o 4-2-3-1 usado por Dunga nas primeiras duas rodadas das eliminatórias sofra ajustes e volte a ser um 4-4-2. \r\n\r\nA volta de Neymar se dará justamente no clássico diante da Argentina, provavelmente em Buenos Aires, embora a federação local cogite transferir a partida para o interior. A força do adversário e sua necessidade de conquistar a primeira vitória no torneio – tem uma derrota e um empate – certamente vai interferir na decisão de Dunga. Se o brasileiro está mais do que garantido na convocação da semana que vem, por outro lado, Messi, seu amigo de Barcelona, dificilmente estará recuperado de lesão no ligamento colateral interno do joelho esquerdo.', '', 'neymar.jpg', 'teste legenda', '2', '', '', 'Notícia,neymar,seleção', 2, 1, 2, 0),
(5, 15, '14-10-2015', 'G1.com', 'Arthur pede explicações da Eletrobras sobre', 'A presença de um jogador fazendo a função de centroavante, seja ele de origem, como Ricardo Oliveira, ou adaptado, caso de Hulk, não vinha sendo habitual nessa segunda passagem do técnico pela Seleção. No início de seu trabalho, Diego Tardelli e Roberto Firmino se alternaram como parceiros de ataque do craque, num sistema de mais movimentação. É possível que o 4-2-3-1 usado por Dunga nas primeiras duas rodadas das eliminatórias sofra ajustes e volte a ser um 4-4-2. \r\n\r\nA volta de Neymar se dará justamente no clássico diante da Argentina, provavelmente em Buenos Aires, embora a federação local cogite transferir a partida para o interior. A força do adversário e sua necessidade de conquistar a primeira vitória no torneio – tem uma derrota e um empate – certamente vai interferir na decisão de Dunga. Se o brasileiro está mais do que garantido na convocação da semana que vem, por outro lado, Messi, seu amigo de Barcelona, dificilmente estará recuperado de lesão no ligamento colateral interno do joelho esquerdo.', '', 'foto1.jpg', 'teste legenda 01', '3', '', '', 'Notícia', 1, 1, 2, 0),
(6, 27, '14-10-2015', 'G1.com', 'Com Neymar, Dunga terá de sacrificar Oscar, Douglas Costa ou centroavante', 'A presença de um jogador fazendo a função de centroavante, seja ele de origem, como Ricardo Oliveira, ou adaptado, caso de Hulk, não vinha sendo habitual nessa segunda passagem do técnico pela Seleção. No início de seu trabalho, Diego Tardelli e Roberto Firmino se alternaram como parceiros de ataque do craque, num sistema de mais movimentação. É possível que o 4-2-3-1 usado por Dunga nas primeiras duas rodadas das eliminatórias sofra ajustes e volte a ser um 4-4-2. \r\n\r\nA volta de Neymar se dará justamente no clássico diante da Argentina, provavelmente em Buenos Aires, embora a federação local cogite transferir a partida para o interior. A força do adversário e sua necessidade de conquistar a primeira vitória no torneio – tem uma derrota e um empate – certamente vai interferir na decisão de Dunga. Se o brasileiro está mais do que garantido na convocação da semana que vem, por outro lado, Messi, seu amigo de Barcelona, dificilmente estará recuperado de lesão no ligamento colateral interno do joelho esquerdo.', '', 'foto-esporte3.jpg', '', '1', '', '', 'Notícia,ronda', 1, 1, 2, 0),
(7, 17, '14-10-2015', 'G1.com', 'Arthur pede explicações da Eletrobras sobre falta de recursos para o plano de investimentos', 'A decisão do Tribunal de Contas da União de rejeitar as contas da presidente Dilma Rousseff deve ser comemorada por todos os brasileiros que pregam o aprofundamento da democracia e o rigoroso cumprimento das leis. Comprova que não se pode abusar da mentira para vencer as eleições, nem governar na base do jeitinho, da enganação e da fanfarronice.\r\nMostra claramente que quem administra o bem público sem rigor e austeridade não pode continuar exercendo o poder. Deve pedir o chapéu, guardar seus pertences e ir para casa para preservar o que lhe resta de dignidade.\r\nMas estamos diante de um governo cego e alheio à realidade. É difícil acreditar em ato honroso pelo bem do Brasil, porque quem se mantém no cargo apenas pelo projeto de poder do partido não abdica facilmente de seu trono.\r\nIndependente da vontade do PT e da presidente, estamos diante de um fato histórico: o começo do fim do segundo mandato de Dilma Rousseff. Um governo que iniciou manco, sem estratégia, nem planos para o Brasil. Que tinha apenas como objetivo sobreviver.\r\nAgora é a vez do Congresso mostrar sua força e independência confirmando a decisão do TCU. Precisamos, todos nós parlamentares, manifestar ao povo brasileiro que não compactuamos com a corrupção como modelo de governo, que não concordamos com falsidades e mentiras, que não consentimos com a incompetência. E, sobretudo, que um governo feito de mentiras não pode permanecer.', '', 'foto-politica4.jpg', 'LEGENDA', '1', '', '', 'Notícia,POLITICA', 2, 1, 2, 0),
(8, 18, '28-09-2015', 'G1.com', 'Comentarista vê Brasil mais confiante contra Argentina "muito pressionada"', 'A vitória de 3 a 1 do Brasil sobre a Venezuela não foi importante apenas pelos três pontos que colocaram a Seleção na quinta colocação das eliminatórias sul-americanas da Copa de 2018. Para o comentarista Paulo Cesar Vasconcellos, o triunfo na Arena Castelão, no Ceará, foi fundamental para dar confiança aos jogadores comandados pelo técnico Dunga para o compromisso de novembro contra a Argentina, fora de casa.\r\n\r\n- Vai ser um jogo de alta temperatura. No Monumental de Núñez, com uma Argentina que inicia as eliminatórias de maneira frustrante e, até por isso, foi importante a seleção brasileira ter uma vitória convincente contra a Venezuela. A Seleção conseguiu a vitória fazendo boas jogadas, teve uma atuação superior ao jogo contra o Chile e vai encarar uma Argentina absolutamente pressionada. Nesse momento, mais pressionada que o Brasil. E para piorar a situação, dificilmente com o Messi - disse. ', '', 'selcao.jpg', 'teste', '2', '', '', 'Notícia', 1, 1, 2, 0),
(9, 13, '16-10-2015', 'G1.com', 'Em casa,  na Seleção, Lucas Lima revela sonho de enfrentar a Argentina', 'Destaque do Santos, Lucas Lima está cada vez mais ambientado ao clima da Seleção. A vitória de 3 a 1 sobre a Venezuela, em Fortaleza, foi a quarta oportunidade do meia de vestir o uniforme verde e amarelo e ele já faz planos se firmar no grupo comandado por Dunga. E o desejo de permanecer sendo convocado se mistura com o sonho de enfrentar a Argentina, adversário do Brasil fora de casa no dia 13 de novembro, pelas eliminatórias da Copa do Mundo de 2018\r\n\r\n"Em entrevista" ao SporTV, o camisa 20 do Peixe, garantiu que os amistosos contra Costa Rica e Estados Unidos foram importantes na sua adaptação à Seleção e revelou que sempre sonhou jogar um clássico contra os argentinos, uma partida que ele encara como fundamental para mostrar o seu valor para Dunga.\r\n\r\n- Acho que é preciso se adaptar rápido. Os dois amistosos, para mim, foram importantes. A cada partida eu vou me soltando mais e vou melhorar (...). Todo o jogo eu procuro dar o meu melhor para poder me firmar e render mais. Um clássico desse tamanho, desde pequeno, eu sempre sonhei jogar. Se eu tiver uma oportunidade, eu vou procurar fazer o meu melhor para ajudar a Seleção.', '', 'foto-esporte2.jpg', '', '1', '', '', 'Notícia,copa', 2, 1, 2, 0),
(10, 50, '20-10-2015', 'emTempo', 'Preso suspeito de matar sargento da PM em maio deste ano', 'O suspeito foi autuado por homicídio qualificado. Após os procedimentos \r\nna especializada, ele será encaminhado à Cadeia Pública – foto: Márcio \r\nMelo\r\n\r\nRomário Correa Chaves, 21, foi apresentado na manhã desta terça-feira \r\n(20), na sede da Delegacia Especializada em Homicídios e Sequestros \r\n(DEHS), suspeito de ser um dos autores do homicídio do sargento da \r\nPolicia Militar do Amazonas (PM-AM), Elcy Lima da Silva, 29, ocorrido no\r\n dia 6 de maio deste ano, na rua Sardinha, bairro Zona Oeste da cidade.\r\n\r\nO homem foi preso na tarde de ontem (19), após ir até a delegacia de \r\nhomicídios prestar um depoimento sobre o caso, mas foi surpreendido pelo\r\n mandado de prisão.\r\n\r\nSegundo o delgado titular da DEHS, Ivo Martins, o sargento trabalhava \r\ncomo segurança particular de um condômino residencial, localizado no \r\nTarumã, Zona Oeste. Na ocasião do crime, a vítima estava trabalhando \r\nquando percebeu que o suspeito, juntamente com os outros dois comparsas \r\nidentificados como Everton Ricardo Lima, 27, e ‘Garganta ou Carcaça’ \r\nestavam tentando assaltar uma residência na localidade.\r\n\r\nO policial, que estava numa motocicleta de placas e caraterísticas não \r\ndivulgadas, se aproximou do trio e tentou impedir a ação criminosa, mas \r\nacabou sendo atingindo com dois tiros. Os suspeitos fugiram levando a \r\narma e a moto da vítima.\r\n\r\nEm depoimento, Romário diz que está arrependido e conta detalhes do \r\ncrime. “Estávamos fazendo um assalto em uma casa, quando o alarme \r\ndisparou, nesse momento, ele apareceu e, quando estava tentando tirar a \r\narma da cintura, nós formos mais rápidos e atiramos nele, mas estou \r\nmuito arrependido, se pudesse voltar no tempo, não faria isso”, disse o \r\nsuspeito.\r\n\r\nRomário ainda falou que se soubesse que a vítima era policial militar \r\njamais teria atirando nele. “Não sabia que ele era policial, se eu \r\nsoubesse não teria atirado, apenas teria fugido”, concluiu.\r\n\r\nO delegado ainda informou que Everton está sendo procurando pela \r\npolícia, já o outro comparsa provavelmente está morto, entretanto a \r\nmorte ainda não confirmada. O trio era bastante conhecido no bairro pela\r\n prática de assaltos.\r\n\r\nO suspeito foi autuado por homicídio qualificado. Após os procedimentos \r\nna especializada, ele será encaminhado à Cadeia Pública Desembargador \r\nRaimundo Vidal Pessoa, no Centro de Manaus.<br>', '', 'DEHS-Marcio-Melo.jpg', 'DEHS-Marcio-Melo', '2', '', '', 'Notícia,crime,polícia,assasino,drogas,chassina', 1, 1, 2, 0),
(11, 13, '20-10-2015', 'veja.com', 'Pedaladas: Renan dará 45 dias para Dilma se defender', 'Prazo para que Planalto rebata parecer do TCU, que rejeitou as contas do\r\n governo, e rito de comissão de orçamento devem empurrar para o ano que \r\nvem a votação no Congresso do balanço fiscal de 2014 <br>', '', 'alx_montagem-brasil-dilma-renan_original.jpeg', 'Pedaladas: Renan dará 45 dias para Dilma se defender', '1', '', '', 'Notícia,dilma,renan,roubo,pt,tcu,balanço fiscal', 1, 1, 2, 0),
(12, 13, '20-10-2015', 'emTempo', 'Confirmada para dezembro inauguração do primeiro trecho da avenida das Flores', 'O governador José Melo confirmou para dezembro deste ano a inauguração \r\ndo primeiro trecho de 6,5 quilômetros da avenida das Flores. A \r\ninformação foi dada na manhã desta segunda-feira (19), durante \r\nfiscalização ao canteiro de obras do empreendimento, assim como do anel \r\nviário sul.\r\n\r\nO chefe do executivo estadual afirmou que mobilidade urbana e o \r\ntransporte de cargas das empresas do Polo Industrial de Manaus (PIM) \r\nganharão melhorias com a abertura dos novos eixos viários na capital.\r\n\r\nCom investimentos que totalizam R$ 283,4 milhões, as obras abrirão mais \r\nde 20 quilômetros de novas avenidas de grande porte na cidade, criando \r\nalternativas para a locomoção e estabelecendo uma via expressa entre o \r\nDistrito Industrial e o Aeroporto Internacional Eduardo Gomes.\r\n\r\nA avenida das flores foi a primeira a receber a visita do governador e \r\ncomitiva formada por deputados estaduais e o secretário de \r\ninfraestrutura, Gilberto de Deus. “A cidade de Manaus carece de grandes \r\navenidas para que o trânsito possa escoar com mais facilidade. Entre as \r\nobras importantes que estamos trabalhando está a avenida das Flores, que\r\n vai permitir aliviar a Torquato Tapajós, uma vez que ela vai ficar \r\nparalela conectando com a avenida das Torres e oferecendo alternativa ao\r\n trânsito que vem das zonas norte e leste”, destacou o governador.\r\n\r\nO trecho de 6,5 quilômetros da avenida das Flores, que deve ser \r\ninaugurado em dezembro, vai da avenida 7 de abril, no bairro Santa \r\nEtelvina, até o quilômetro 19 da AM-010. Todo o trecho já recebeu a \r\nprimeira camada de asfalto e agora está passando por obras de construção\r\n de meio fio e calçadas.\r\n\r\nCom mais de 11 quilômetros de extensão, a avenida das Flores abrirá nova\r\n rota de escoamento do trânsito na zona norte de Manaus, continuando a \r\navenida Governador José Lindoso (avenida das Torres) e interligando-se a\r\n AM-010 (Manaus-Itacoatiara).\r\n\r\nO investimento é de R$ 202,3 milhões. A nova avenida será conectada aos \r\nanéis viários sul e leste, projeto do Governo que criará um amplo \r\ncorredor de mobilidade urbana que vai interligar o Distrito Industrial \r\nao Aeroporto Internacional Eduardo Gomes, no Tarumã, zona oeste. A \r\nprevisão é que a avenida das Flores seja completamente entregue até o \r\nfinal do ano que vem.\r\n\r\nComemorando o avanço das obras, José Melo afirmou que os projetos são \r\nfundamentais para Manaus. Pela manhã, o governador também vistoriou as \r\nobras do anel viário sul, no bairro do Tarumã, zona oeste da cidade.\r\n\r\n“Nosso aeroporto é o segundo em cargas do país, só perde para Guarulhos,\r\n por conta da movimentação de cargas das empresas do polo industrial e \r\nquando os anéis ficarem prontos todo o tráfego que sai do Distrito \r\nIndustrial no sentido do aeroporto, ou no sentido da zona oeste da \r\ncidade, poderá ser feito por uma via expressa. Vamos desafogar o \r\ntrânsito da população e facilitar esse transporte para as empresas. São \r\nobras fundamentais para a cidade de Manaus”, disse.\r\n\r\nO anel viário sul tem início na avenida Santos Dumont e vai até o \r\ncomplexo José Henriques (Tarumã/Santa Etelvina). Com ele, a Estrada do \r\nTarumã será duplicada e haverá a implantação de 14 baias para paradas de\r\n ônibus. Com investimento da ordem de R$ 81,1 milhões, o projeto prevê \r\nque o anel sul seja implantado em um total de 8,3 quilômetros, uma via \r\nde mão dupla com três pistas de rolamento em cada um dos lados, e \r\npasseios laterais. “Em mais dois verões vamos concluir os anéis \r\nviários”, afirmou José Melo.<br>', '', 'avenida-das-flores-reproduc.jpg', 'Melo na Av. das Flores', '1', '', '', 'Notícia,Av. das Flores,Ponte,Inauguração', 1, 1, 2, 0),
(13, 50, '20-10-2015', 'emTempo', 'Dupla invade casa, rouba e mata idosa de 78 anos a tiros', 'Uma dupla de bandidos, até o momento não identificados, invadiu na \r\nnoite desta terça-feira (20) uma residência localizada na rua Adalberto \r\nVale, beco Salustiana, Betânia, Zona Sul de Manaus, e matou, a tiros, \r\numa idosa de 78 anos. O crime aconteceu por volta da 22h.\r\n \r\n<div>\r\n\r\n \r\n\r\n\r\n</div>\r\n\r\n<span>A senhora, identificada como Maria da Conceição Nascimento\r\n dos Santos, era mãe das proprietárias da casa e estava em Manaus para <a rel="nofollow" target="">exames médicos</a> e tratamento de saúde, visto que morava no interior.</span>\r\n<span>Os bandidos teriam batido na porta da residência e a \r\nsenhora, de forma inocente, abriu para ver quem era, quando foi \r\nsurpreendida pelos homens que <a rel="nofollow" target="">anunciaram</a> o assalto.</span>\r\nEles colocaram a idosa de joelhos na sala e levaram suas filhas para \r\noutro cômodo da casa, roubando em seguida equipamentos eletroeletrônicos\r\n e pertences pessoais da família.\r\n<span>Não <a rel="nofollow" target="">satisfeito</a>,\r\n o bandido que mantinha a idosa sobre a mira de um revolver, atirou duas\r\n vezes em sua cabeça, matando-a sem motivo aparente, já que ela não \r\nteria reagido.</span>\r\nO Instituto Médico Legal (IML) foi acionado por volta das 23h para \r\nremover o corpo. Até o momento da publicação desta matéria, ninguém \r\nhavia sido preso. O caso será investigado pela Delegacia Especializada \r\nem Homicídios e Sequestros (DEHS).<br><br>', '', 'idosa-divulg.jpg', 'Dupla invade casa na Betânia, rouba família e mata idosa de 78 anos, com dois tiros', '1', '', '', 'Notícia,violência,betânia,idosa', 1, 1, 2, 0),
(14, 50, '21-10-2015', 'emTempo', 'Assaltantes invadem residência e fazem moradores reféns, no Dom Pedro', '<span>Henrique Félix Carvalho dos Santos, Pamela Glenda Carvalho\r\n de Brito, ambos de 18 anos, Afrânio de Lima da Silva, 19 e Jeferson \r\nSantos de Oliveira, 20, foram presos após assaltarem uma residência e \r\nmanterem os moradores como reféns, durante 20 minutos. O caso ocorreu na\r\n noite dessa terça-feira (20), localizada na rua Thomas Antônio Gonzaga,\r\n bairro Dom Pedro, Zona Oeste da <a rel="nofollow" target="">cidade</a>.\r\n \r\n</span><div>\r\n\r\n \r\n\r\n\r\n</div>\r\n\r\n<span>De acordo com o tenente da 10ª Companhia Interativa Comunitária (Cicom), Lima Queiroz, a guarnição foi <a rel="nofollow" target="">informada</a>\r\n pelo Centro Integrado de Operações (Ciops), que uma residência, no \r\nbairro Dom Pedro, estava sendo assaltada. Os policiais se deslocaram até\r\n o local <a rel="nofollow" target="">informado</a>, onde se depararam com o bando que estava dentro da residência.</span>\r\n<span>Umas das vítimas, que não teve o nome divulgado, relatou à polícia que os bandidos entraram na residência e, em seguida, <a rel="nofollow" target="">anunciaram</a> o assalto. “Eles apontaram as armas em nossa <a rel="nofollow" target="">direção</a>, e mandavam todos ficarem calados, caso contrário, nos matariam”, disse.</span>\r\n<span>Com os suspeitos, foram apreendidos três revólveres calibre 38, uma TV de 47 <a rel="nofollow" target="">polegadas</a>, um tablet e três aparelhos celulares. O grupo estava colocando todos os pertences das vítimas em um <a rel="nofollow" target="">carro</a> modelo Corsa Classic – cor branca, que&nbsp; também&nbsp; não teve a placa informada -,&nbsp; com restrição de roubo.</span>\r\nO quarteto foi conduzido ao 10° Distrito Integrado de Polícia (DIP), \r\nonde foi autuado por roubo e associação criminosa. Os homens serão \r\nlevados à Cadeia Pública Desembargador Raimundo Vidal Pessoa, no Centro.\r\nJá a Pamela&nbsp; Brito será encaminhada ao Centro de Detenção Provisório Feminino (CDPF), no quilômetro 8 da BR-174.\r\nPor equipe EM TEMPO Online<br><br>', '', 'quatro.png', 'Assaltantes invadem residência e fazem moradores reféns, no Dom Pedro', '2', '', '', 'Notícia,assaltante,refém,dom pedro', 1, 1, 2, 0),
(15, 45, '21-10-2015', 'emTempo', 'Neymar é o único brasileiro entre finalistas do prêmio Bola de Ouro', 'A Fifa divulgou na noite desta segunda-feira (19) os indicados ao \r\nprêmio de melhor jogador do mundo. Dentre os 23 selecionados, o atacante\r\n Neymar é o único brasileiro na disputa pela Bola de Ouro de 2015.\r\n \r\n<div>\r\n\r\n \r\n\r\n\r\n</div>\r\n\r\nOs candidatos foram escolhidos pela Fifa e pela revista ‘France Football’.\r\n<span>Os capitães e técnicos das seleções nacionais e \r\nrepresentantes da mídia escolhidos pela Fifa terão direito a voto. Os \r\ntrês finalistas serão anunciados no dia 30 de novembro. Já o <a rel="nofollow" target="">vencedor</a> será conhecido em 11 de janeiro de 2016, em Zurique, na Suíça.</span>\r\nEste é o segundo ano consecutivo que Neymar aparece como único \r\nbrasileiro dentre os 23 finalistas. Em 2013, além do atacante, o país \r\ntambém foi representado pelo zagueiro Tiago Silva, hoje no Paris \r\nSaint-Germain.\r\nA Alemanha, campeã mundial, e a Argentina, vice, são os países que mais possuem representantes na lista: são três para cada.\r\nEntre os clubes, o que mais tem jogadores indicados ao prêmio é o \r\nBarcelona, com seis jogadores. Real Madrid e Bayern de Munique vêm em \r\nseguida com cinco atletas cada.\r\n<span>Ainda nesta segunda-feira, a Fifa <a rel="nofollow" target="">anunciou</a>\r\n a lista dos dez técnicos que concorrem ao prêmio de melhor do ano. \r\nEntre eles estão Luis Enrique (Barcelona), Pep Guardiola (Bayern \r\nMunique), José Mourinho (Chelsea) e Jorge Sampaoli (Chile), único \r\nfinalista que dirige uma seleção.</span>\r\nVeja a lista dos jogadores indicados\r\n<span>Sergio Agüero (Argentina/Manchester City)<br>\r\nGareth Bale (País de Gales/Real Madrid)<br>\r\nKarim Benzema (França/Real Madrid)<br>\r\nCristiano Ronaldo (Portugal/Real Madrid)<br>\r\nKevin De Bruyne (Bélgica/Wolfsburg/Manchester City)<br>\r\nEden Hazard (Bélgica/Chelsea)<br>\r\nZlatan Ibrahimovic; (Suécia/Paris Saint-Germain)<br>\r\nAndrés Iniesta (Espanha/Barcelona)<br>\r\nToni Kroos (Alemanha/Real Madrid)<br>\r\nRobert Lewandowski (Polônia/Bayern Munique)<br>\r\nJavier Mascherano (Argentina/Barcelona)<br>\r\nLionel Messi (Argentina/Barcelona)<br>\r\nThomas Müller (Alemanha/Bayern Munique)<br>\r\nManuel Neuer (Alemanha/Bayern Munique)<br>\r\nNeymar (Brasil/Barcelona)<br>\r\nPaul Pogba (França/Juventus)<br>\r\nIvan Rakitic; (Croácia/Barcelona)<br>\r\nArjen Robben (Holanda/Bayern Munique)<br>\r\nJames Rodríguez (Colômbia/Real Madrid)<br>\r\nAlexis Sánchez (Chile/Arsenal)<br>\r\nLuis Suárez (Uruguai/Barcelona)<br>\r\nYaya Touré (Costa do Marfim/Manchester City)<br>\r\nArturo Vidal (Chile/Juventus/Bayern Munique)<br>\r\nPor Folhapress</span><br><br>', '', 'Selecaoo_Neymar_divulgacaoo-415x260.jpeg', 'Neymar é o único brasileiro entre finalistas do prêmio Bola de Ouro', '2', '', '', 'Notícia,esporte,neymar,bola de ouro', 1, 1, 2, 0),
(16, 50, '21-10-2015', 'portal do holanda', 'Mulher usava carrinho de bebê para traficar', 'Manaus/AM - Na manhã desta quarta-feira (21) duas \r\nmulheres foram detidas após cumprimento de mandado de prisão na rua \r\nParaguaçu, bairro São José, zona Leste de Manaus.Elas foram \r\nidentificados como Brenda Ferreira Colares, 23, e Walcimara da Cruz \r\nVasconcelos, 19.\r\nDe acordo com informações de policiais civis da Seccional Leste, a \r\ndupla foi presa em flagrante com porções de entorpecentes. Brenda disse \r\nque guardava a droga para Walcimara. A versão foi confirmada para a \r\nsuspeita.<br>', '', 'meninas2.png', 'presa mulher', '3', '', '', 'Notícia,tráfico,carrinho de bebê', 1, 1, 2, 0),
(17, 13, '21-10-2015', 'veja.com', 'CPI da Petrobras: relatórios paralelos de PSDB e PSOL miram Dilma e Cunha', 'O PSDB apresentou nesta quarta-feira um voto em separado na CPI da \r\nPetrobras, no qual defende que a comissão apresente à Mesa Diretora uma \r\ndenúncia contra a presidente Dilma Rousseff por crime de \r\nresponsabilidade, iniciativa que poderia abrir caminho para mais um \r\npedido de impeachment contra a petista. Para o partido, Dilma cometeu \r\ncrimes como improbidade administrativa e se omitiu diante dos sucessivos\r\n atos de corrupção cometidos no escândalo do petrolão. O relatório \r\ntambém defende investigação contra o presidente da Câmara, Eduardo Cunha\r\n (PMDB-RJ).\r\nO partido requer que os indícios de irregularidades praticadas pela \r\npetista sejam encaminhados ao Tribunal Superior Eleitoral (TSE) para \r\nservirem como prova na ação em que a Corte analisa suposto abuso de \r\npoder econômico e político e que, no limite, poderia levar à cassação da\r\n chapa formada por Dilma e pelo seu vice, Michel Temer (PMDB).\r\nEm seu voto, que ainda terá de ser discutido pela CPI da Petrobras, o\r\n PSDB defende a continuidade das investigações contra políticos que já \r\nrespondem a inquéritos no Supremo Tribunal Federal, como o presidente do\r\n Senado, Renan Calheiros (PMDB-AL), o ex-ministro de Minas e Energia e o\r\n senador Edison Lobão (PMDB-MA).\r\nEduardo Cunha, que foi blindado ao longo de toda a CPI, é alvo de um \r\npedido de investigação por suspeitas de crimes como organização \r\ncriminosa, lavagem de dinheiro, corrupção passiva e improbidade \r\nadministrativa. Os tucanos requerem que ele responda no Conselho de \r\nÉtica e Decoro Parlamentar a um processo que pode levar à sua cassação.\r\nO partido mirou ainda na gestão dos ex-presidentes da Petrobras José \r\nSergio Gabrielli e Graça Foster e pediu a instauração de inquéritos \r\npenal e civil contra ambos.\r\nO PSDB também defendeu a instauração de inquérito policial para \r\ninvestigar crimes de organização criminosa, lavagem de dinheiro, \r\ncorrupção passiva, prevaricação, advocacia administrativa e tráfico de \r\ninfluência supostamente praticados pelo ex-presidente Lula, pela \r\npresidente Dilma Rousseff, o ministro Edinho Silva (Secretaria de \r\nComunicação) e os ex-ministros José Dirceu (Casa Civil), Antonio Palocci\r\n (Casa Civil e Fazenda), Guido Mantega (Fazenda), Gilberto Carvalho \r\n(Secretaria-geral) e Ideli Salvatti (Relações Institucionais). Para o \r\npartido, essas autoridades sabiam do esquema de corrupção na Petrobras e\r\n se beneficiaram do propinoduto para atender "interesses \r\npolítico-eleitorais".\r\n"Em termos funcionais, havia um sexto núcleo que estava localizado \r\nexternamente ao ambiente da Petrobras, mas que era responsável pelas \r\ndecisões estratégicas da organização criminosa. Esse sexto núcleo \r\nrecebeu o nome de núcleo estratégico e ficava localizado justamente no \r\nPalácio do Planalto", acusam os tucanos.\r\nSe for acatado o pedido de abertura de inquérito policial, as \r\nsuspeitas contra essas autoridades são investigadas pela polícia e um \r\ndelegado conduz a investigação. Ao final desse processo, caberia ao \r\nMinistério Público propor denúncia criminal. No mesmo voto, os tucanos \r\ntambém afirmaram haver indícios de improbidade administrativa praticada \r\npor Lula, Dirceu, Palocci, Mantega, Gilberto Carvalho, Ideli e Edinho \r\nSilva e pedem a instauração de um inquérito civil contra eles para a \r\ncontinuidade das investigações.\r\nTerceiro relatório - O PSOL também apresentou voto \r\nem separado na CPI da Petrobras por rejeitar as conclusões do relator, o\r\n petista Luiz Sérgio. Ex-ministro do governo Dilma, ele utilizou seu \r\nrelatório final da CPI para atacar as investigações da Lava Jato e para \r\nblindar, além de Dilma, o ex-presidente Lula e os ex-presidentes da \r\nPetrobras Graça Foster e José Sérgio Gabrielli.\r\nO texto do PSOL defende o fim do financiamento privado de campanhas \r\neleitorais, critica a contratação da empresa Kroll, paga para investigar\r\n inconsistências nas declarações de delatores premiados da Lava Jato, e \r\nafirma que a CPI blindou políticos investigados. "Não há nenhum óbice \r\nconstitucional, legal ou regimental para a investigação de \r\nparlamentares", diz o partido.\r\nEm seu voto, o PSOL sugeriu o indiciamento do peemedebista Eduardo \r\nCunha pelos crimes de corrupção passiva, lavagem de dinheiro e \r\norganização criminosa. O presidente da Câmara já foi denunciado pelo \r\nprocurador-geral Rodrigo Janot por corrupção e lavagem e agora é alvo de\r\n um novo inquérito depois que foram descobertas contas secretas na Suíça\r\n em que ele receberia dinheiro de propina.<br><br>', '', 'alx_brasil-cpi-petrobras-20151021-001_original.jpeg', 'CPI da Petrobras: relatórios paralelos de PSDB e PSOL miram Dilma e Cunha', '2', '', '', 'Notícia,política,campanhas eleitorais,CPI,Pretrobras', 1, 1, 2, 0),
(18, 13, '22-10-2015', 'emTempo', 'Mesmo com críticas, deputados aprovam relatório final da CPI da Petrobras', 'Os deputados aprovaram na madrugada desta quinta-feira (22) o \r\nrelatório final da Comissão Parlamentar de Inquérito (CPI) da Petrobras.\r\n Foram 17 votos a favor, 9 contra e 1 abstenção.\r\n \r\n<div>\r\n\r\n \r\n\r\n\r\n</div>\r\n\r\n<span>O <a rel="nofollow" target="">documento</a>\r\n foi criticado por deputados da comissão por não ter avançado e \r\nsolicitado o indiciamento de parlamentares envolvidos no esquema de \r\ncorrupção investigado na <a rel="nofollow" target="">Operação</a> Lava Jato. O relatório lista sugestões de indiciamentos apresentadas pelos quatro sub-relatores do colegiado.</span>\r\nO relator, deputado Luiz Sérgio (PT-RJ), rebateu as críticas e \r\ndefendeu o relatório citando as dificuldades encontradas na condução das\r\n investigações. “Durante as investigações pessoas ficaram caladas, a CPI\r\n que não teve acesso às delações premiadas e que foram vazadas na \r\nmídia”, disse. “Trabalhei [dentro de limites] em um relatório dentro de \r\numa ótica propositiva”, acrescentou.\r\nPara o deputado Ivan Valente (PSOL-SP), a CPI não quis cortar na \r\nprópria carne ao não incluir os nomes de políticos investigados. \r\n“Colocaram que não temos pernas para acompanhar as investigações da Lava\r\n Jato e que não poderíamos ser cobrados por isso. A CPI poderia ter \r\nandando mais rápido com os políticos, porque, aqui, os que estão sendo \r\nprocessados têm foro privilegiado, e tínhamos a prerrogativa de convocar\r\n deputados, senadores, ministros e ir adiante, e nós não fizemos”, \r\ndisse.\r\nO texto aprovado descarta ter havido “corrupção institucionalizada” \r\nna Petrobras. O relator diz ainda que a empresa foi vítima de um cartel \r\nde empresas, além de criticar alguns pontos da investigação da Operação \r\nLava Jato, principalmente na parte que cita ter havido pagamento de \r\npropina disfarçado de doações oficiais a partidos políticos.\r\nEntre outros pontos, o relatório do deputado Luiz Sérgio (PT-RJ) \r\nisentou de responsabilidade em irregularidades na Petrobras o \r\nex-presidente Lula, a então presidenta do Conselho de Administração da \r\nempresa, ministra Dilma Rousseff, e José Sérgio Gabrielli e Graça \r\nFoster, ex-presidentes da Petrobras.\r\n<span>“Por fim, é importante ressaltar um <a rel="nofollow" target="">fato</a>\r\n  tem passado despercebido da população: não há menção dos delatores \r\nsobre o envolvimento dos ex-presidentes da Petrobras José Sérgio \r\nGabrielli e Graça Foster ou de ex-conselheiros da estatal, como a \r\npresidente Dilma Rousseff. Também não há nos <a rel="nofollow" target="">autos</a> da CPI qualquer evidência neste sentido, seja em relação à presidente Dilma ou do ex-presidente Lula.”</span>\r\nO relatório pede ainda a revogação do Decreto nº 2.745/98, que \r\nregulamenta o Processo Licitatório Simplificado da Petrobras. Segundo o \r\nrelator, o decreto permite procedimento simplificado de escolha de \r\nempresas contratadas pela Petrobras e é uma das causas das \r\nirregularidades detectadas na empresa.<br><br>', '', 'Mesmo_com.jpg', '', '1', '', '', 'Notícia,política,CPI,Petrobrás', 1, 1, 2, 0),
(19, 13, '22-10-2015', 'emTempo', 'Em audiência, senadores do Amazonas e Rondônia defendem BR-319', '<span>O embargo do Instituto Brasileiro do Meio Ambiente e dos \r\nRecursos Naturais Renováveis (Ibama) às obras de pavimentação em trechos\r\n mais críticos da BR-319 (Manaus-Porto Velho) realizados pelo \r\nDepartamento <a rel="nofollow" target="">Nacional</a>\r\n de Infraestrutura Terrestre (Dnit-AM), no início do mês, gerou duras \r\nreações de senadores do Amazonas e de Rondônia e um acalorado debate na \r\nComissão de Serviço e Infraestrutura do Senado, que promoveu ontem uma \r\naudiência pública com representantes do Ibama e Dnit para tratar do \r\nassunto.\r\n \r\n</span><div>\r\n\r\n \r\n\r\n\r\n</div>\r\n\r\n<span>A iniciativa gerou resultados positivos. Ainda ontem, após\r\n a reunião, o Dnit oficializou um pedido de levantamento de embargo \r\njunto ao Ibama em favor das obras realizadas na rodovia. Com isso, a <a rel="nofollow" target="">revitalização</a> do local voltaria a acontecer e a estrada poderia ser utilizada na escoação de produtos do Estado.</span>\r\n<span>Desde o começo do mês, as obras que acontecem entre os quilômetros 250 e 655 da BR-319, conhecidos como “<a rel="nofollow" target="">trecho</a>\r\n do meio”, foram embargadas pelo órgão ambiental após graves denúncias \r\nalegando que a vida selvagem na área estava sendo afetada. Com a ordem, o\r\n Dnit paralisou as atividades no local, atrasando o processo de \r\nrevitalização da área.</span>\r\nDurante a audiência pública no Senado, representantes do Dnit e \r\nsenadores da região pediram o levantamento do embargo urgentemente, \r\nalegando que nenhuma nova obra estava sendo feita no local, apenas uma \r\n“manutenção” no percurso que estava desgastado.\r\n<span>Na <a rel="nofollow" target="">opinião</a>\r\n dos senadores, a recomendação de paralisação seria ideológica porque as\r\n obras em andamento não representam risco de desmatamento, como \r\nargumenta o órgão ambiental.</span>\r\n<span>O diretor de Licenciamento Ambiental do Ibama, Thomaz de Toledo, se \r\ncomprometeu a analisar rapidamente o pedido de suspensão da paralisação.<br>\r\nAutor do requerimento para a <a rel="nofollow" target="">realização</a>\r\n da audiência, o senador Acir Gurgacz, do PDT-RO, argumentou que a falta\r\n de comunicação rodoviária dificulta a conexão de Rondônia com o \r\nAmazonas e o resto do Brasil, impedindo a oferta, por exemplo, de \r\nprodutos hortifrutigranjeiros para Manaus.</span>\r\n<span>“Acaba sendo mais <a rel="nofollow" target="">fácil</a>\r\n trazer esses produtos de São Paulo, o que é um absurdo. Vamos levar o \r\ndesenvolvimento com a preservação e não há nada de errado em reabrir a \r\nBR para conservar. É para a sustentabilidade, não para desmatamento ao \r\nlongo da rodovia. É a ligação de Rondônia e Amazonas com o resto da \r\npopulação brasileira”, disse o senador.</span>\r\nO senador Omar Aziz (PSD) disse existir um “descompromisso” do \r\ngoverno federal com a população do Norte porque não busca retirá-la do \r\nisolamento. O ex-governador do Amazonas avalia como incompreensível que \r\nlocais como Boa Vista (RR) tenham mais relacionamento com outros países,\r\n como a Venezuela, do que com o resto do país. Em sua opinião, falta ao \r\nIbama espírito público e nacional.\r\n“Preferem ter uma notícia em um blog dizendo que são \r\npreservacionistas e não têm compromisso público com o Estado, com a \r\npopulação”, criticou Omar.\r\nDurante a audiência pública, o senador de Rondônia Ivo Cassol (PP) \r\nutilizou o caderno especial publicado pelo EM TEMPO na edição do último \r\ndomingo sobre a BR-319, quando bravamente salientou a importância do \r\ndesembargue da estrada. O parlamentou fez referência ao material \r\nproduzido pelo jornalista Emerson Quaresma e fotógrafo Diego Janatã, \r\ncitando as dificuldades para concluir o trajeto que liga os dois \r\nEstados.\r\nComitiva vai viajar pela rodovia\r\nNa próxima terça-feira, uma diligência formada por senadores e \r\nrepresentantes das indústrias do Amazonas e Rondônia sairá de Porto \r\nVelho rumo a Manaus pela BR-319 para fiscalizar e ver a real situação da\r\n estrada. Contando com a presença dos três representantes de Rondônia no\r\n Senado, Acir Gurgacz, Ivo Cassol e Valdir Raupp (PMDB), e da senadora \r\npelo Amazonas, Vanessa Grazziottin (PCdoB), a comitiva quer vivenciar as\r\n dificuldades de quem depende da estrada para se locomover e transportar\r\n sua produção.\r\n<span>Os senadores Omar Aziz (PSD) e Sandra Braga (PMDB) ainda \r\nnão confirmaram presença no evento. Segundo informações repassadas pela \r\nassessoria do senador Acir Gurgacz, Omar se comprometeu de <a rel="nofollow" target="">encontrar</a> a comitiva no município do Careiro Castanho.</span><br><br>', '', 'AmazonasRondoniadefendemBR-319.jpg', 'Em audiência, senadores do Amazonas e Rondônia defendem BR-319', '2', '', '', 'Notícia', 1, 1, 2, 0),
(20, 50, '22-10-2015', 'portal do holanda', 'Com prensa hidráulica, laboratório de drogas é descoberto no São José I', 'Manaus/AM - Três homens foram detidos na noite da \r\núltima quarta-feira (21) após um laboratório de drogas ser descoberto na\r\n rua Urariá, bairro São José I, zona Leste de Manaus. Eles foram \r\nidentificados como Marlon Condera do Nascimento, 21, Rafael Campos de \r\nAraújo, 19, e Rafael Pena Lobato, 19.\r\nPoliciais da Força Tática chegaram até os infratores após uma \r\ndenúncia anônima via linha direta do grupamento. O relato dava conta que\r\n uma pessoa conhecida pela alcunha de “Negão" estaria comandando um \r\nlaboratório de entorpecente no apartamento de uma quitinete do bairro.<br>', '', '011.png', 'Com prensa hidráulica, laboratório de drogas é descoberto no São José I', '2', '', '', 'Notícia', 1, 1, 2, 0),
(21, 50, '22-10-2015', 'portal do holanda', 'PM descobre desmanche de motocicletas no Centro', '<span><b>Manaus/AM </b>- Uma denúncia anônima apresentou o \r\nparadeiro de um homem que recebia motocicletas roubadas e as \r\ndesmanchava. Bruno Mendes Fonseca, 21, foi preso na rua Ramos Ferreira, \r\nbairro Centro, zona Sul de Manaus.</span>\r\nDe acordo com informações de policiais militares da 24ª Companhia \r\nInterativa Comunitária (Cicom), o homem tinha conhecimento que as \r\nmotocicletas que chegavam à sua residência tinham origem roubada, mesmo \r\nassim concordava em desmanchá-las.<br><br>', '', 'moto.png', 'PM descobre casa que servia como desmanche de motocicletas no Centro', '2', '', '', 'Notícia,desmanche,moto', 1, 1, 2, 0),
(22, 13, '22-10-2015', 'veja.com', 'STF nega pedido de Cunha para investigar em sigilo contas na Suíça', 'O ministro Teori Zavascki, do Supremo Tribunal Federal (STF), negou \r\npedido do presidente da Câmara, Eduardo Cunha (PMDB-RJ), para que \r\ntramitassem em sigilo as investigações sobre as contas secretas que ele \r\nmantinha na Suíça e que, segundo o Ministério Público, foram abastecidas\r\n com dinheiro do petrolão. A defesa de Cunha alega que as informações \r\nsobre as contas bancárias foram repassadas a autoridades brasileiras por\r\n meio de um acordo de cooperação internacional e que, por isso, o caso \r\ndeveria ser sigiloso. Os advogados do peemedebista também criticam o que\r\n consideram a exposição do parlamentar e de seus familiares com o pedido\r\n de abertura de inquérito, e atacaram o vazamento das informações que \r\ncomprovariam que Cunha, sua mulher Cláudia Cruz e a filha Danielle Cunha\r\n utilizaram dinheiro desviado da Petrobras para fins particulares.\r\nNa última semana, a Procuradoria-Geral da República (PGR) protocolou \r\nno Supremo Tribunal Federal um novo pedido de abertura de inquérito \r\ncontra Eduardo Cunha. O peemedebista, que agora é alvo de um pedido de \r\ncassação no Conselho de Ética e Decoro Parlamentar, já havia sido \r\ndenunciado pelo procurador-geral, Rodrigo Janot, por suspeita de \r\ncorrupção passiva e lavagem de dinheiro.\r\nNo caso das contas secretas na Suíça, as autoridades de investigação \r\ndo país europeu bloquearam o saldo bancário e remeteram os indícios de \r\nirregularidades ao Ministério Público brasileiro. Parte dos recursos, \r\nsegundo os investigadores, foi utilizado para pagar despesas da esposa \r\ndo parlamentar em uma escola de tênis nos Estados Unidos.\r\nEmbora negue ter recebido propina ou manter contas secretas no \r\nexterior, Eduardo Cunha foi citado diversas vezes por delatores e \r\ninvestigados na Lava Jato. O engenheiro João Augusto Henriques, por \r\nexemplo, apontado pelo Ministério Público como um dos operadores do PMDB\r\n na Lava Jato, foi um dos investigados no petrolão que citou o \r\npeemedebista Cunha como um dos beneficiários de dinheiro em contas \r\nsecretas no exterior.\r\nÀ Justiça, o lobista Julio Camargo, que atuou a favor da empresa Toyo\r\n Setal, afirmou que o deputado pediu 5 milhões de dólares do propinoduto\r\n da Petrobras em um contrato de navios-sonda. O ex-gerente da Área \r\nInternacional da Petrobras Eduardo Musa também afirmou que cabia a Cunha\r\n dar a "palavra final" nas decisões da diretoria Internacional - na \r\népoca, a área era comandada pelo réu no petrolão Jorge Zelada.<br><br>', '', 'Cunha.jpeg', 'STF nega pedido de Cunha para investigar em sigilo contas na Suíça', '1', '', '', 'Notícia', 1, 1, 2, 0),
(23, 46, '22-10-2015', 'ge.com', 'Bolsa Atleta em Manaus ', '<span>O prefeito de Manaus, Arthur Virgílio Neto, em conversa com o\r\nGloboEsporte.com, falou a respeito sobre o drama\r\nvivido pelos esportistas de Manaus que ficaram de fora da Edição 2015 do\r\nPrograma Bolsa Atleta. Na ocasião, Arthur ressaltou que os ajustes\r\nprecisavam ser feitos por conta da Crise Econômica que abala o país, e \r\ncitou a judoca Rita de Cássia, que está em Abu Dhabi para disputar \r\nMundial da modalidade, mas que foi cortada do projeto.&nbsp;<br></span>- Na verdade, o programa não teve cortes, a gente apenas colocou\r\nnos eixos. Uma pessoa ganhava um título qualquer e se credenciava para o Bolsa\r\nAtleta. Estava meio solto, hoje em dia tem que ser um título convincente e se\r\ndestina principalmente a esportes olímpicos. Uma onda de crise, você não pode\r\nficar agora - ganhou um campeonato, por exemplo, o Bergão de Jiu-Jitsu – você vai\r\ne coloca no bolsa atleta. Tem que ter títulos convincentes - explicou.<br><span>Neste ano, apenas 18 atletas fora contemplados pelo projeto. Para \r\nconseguir o auxílio que chega a R$ 4 mil, os esportistas precisaram \r\ncomprovar o ranqueamento entre os melhores da modalidade, além de uma \r\nconvocação oficial\r\nda confederação de cada esporte disponibilizada em plataforma digital. \r\nMas vários foram os nomes de "peso" que ficaram de fora, como é o caso \r\nda judoca Rita de Cássia, que está em Abu Dhabi para o Mundial da\r\ncategoria.<br></span><span>&nbsp;- Não sei qual o critério do programa, mas ela teria de\r\nganhar Abu Dhabi para conseguir a bolsa. <br></span><span>Para Arthur, os cortes são necessários para não afetarem outros\r\nsetores da Prefeitura. Quem quiser ter direito ao benefício precisará se\r\nenquadrar nos termos apresentados pelo órgão.<br></span><span>- Não vai ficar em 18, podemos chegar até a 90, até\r\n100, mas com critérios assim: encaixou no critério vai. Senão começa a entrar o\r\nprimo do amigo do vereador, um sobrinho do prefeito que vai querer se\r\ncredenciar, ai tem outro que toda semana que pedala na Ponta Negra, duas, três\r\nvezes. Aí eu vou gastar dinheiro da educação, da saúde, limpeza pública todo\r\ncom isso, ai não é possível. Tem que ter critérios e transparentes. A pessoa\r\ntem que olhar na parede da secretaria e ver lá pregado o critério - concluiu.<br></span>*Por Matheus Castro, com supervisão de Isabella Pina. <br><br><br>', '', 'artur.png', 'Em meio à crise, prefeito de Manaus fala sobre situação do Bolsa Atleta', '3', '', '', 'Notícia,bolsa atleta,olímpiada', 1, 1, 2, 0),
(24, 22, '22-10-2015', 'ge.com', 'Pista de kart de Manaus terá nova iluminação', '<span>A Fundação\r\nVila Olímpica de Manaus inaugura na noite desta quinta-feira o sistema de\r\niluminação da pista de Kart do complexo esportivo. A solenidade está marcada\r\npara as 19h, na sede da entidade, localizada na Avenida Pedro Teixeira, zona\r\nCentro-Oeste da capital.<br></span><span>A obra\r\nrealizada em parceria entre órgãos públicos e privados teve um investimento de\r\nR$ 80 mil. Além da presença estimada de aproximadamente 1,2 mil pessoas, entre\r\nautoridades, atletas, dirigentes e a comunidade em geral, o evento terá a\r\npresença do piloto Gabriel Silva, único amazonense finalista do Campeonato\r\nBrasileiro de Kart nos últimos 17 anos.<br></span><span>- Essa\r\niluminação é um anseio da própria comunidade, que também será beneficiada com a\r\nação - destacou o diretor-presidente da FVO, Aly Almeida.<br></span>Vale lembrar que pista do complexo será iluminada todos os dias da semana, e a partir desta sexta-feira, o espaço\r\nserá utilizado atletas do kart e da motovelocidade. Para o público que quiser acompanhar o espetáculo, a entrada será gratuita. <br><br><br>', '', 'kart.jpg', 'Pista de kart de Manaus terá nova iluminação inaugurada nesta quinta', '2', '', '', 'Notícia,corrida,kart,motovelocidade,kartódromo', 1, 1, 2, 0),
(25, 48, '22-10-2015', 'G1.com', 'Atirador questionou religião de vítimas antes de disparos nos EUA', 'O autor do massacre na Umpqua Community College foi identificado como Chris Harper Mercer,\r\n de 26 anos. Segundo uma TV local, ele era um estudante da faculdade, \r\ninforma a agência Reuters. No entanto, essa informação não foi \r\nconfirmada oficialmente.<br>\r\n	Mercer aparece com armas em fotos publicadas em uma conta do MySpace \r\nque acredita-se que era dele. Segundo a CNN, ele estava com quatro \r\narmas, três delas pequenas, e com um colete a prova de balas.\r\n\r\n	Outra testemunha disse ao jornal "Roseburg News-Review" que o atirador \r\nperguntou a religião dos estudantes antes de atirar. Kortney Moore, de \r\n18 anos, disse que viu seu professor ser atingido na cabeça e que o \r\natirador disse para todos se deitarem no chão. Depois, o atirador pediu \r\npara as pessoas se levantarem e dizerem suas religiões e, então, começou\r\n a disparar, disse a estudante ao jornal local.<br>', '', 'Atirador.jpg', 'Atirador questionou religião de vítimas antes de disparos nos EUA', '2', '', '', 'Notícia', 1, 1, 2, 0),
(26, 50, '23-10-2015', 'emTempo', 'O colombiano é preso com 140 quilos de drogas, munições e granadas', 'O colombiano Jesus Salvador Oraco, 29, foi preso com 140 quilos de \r\ndroga, munições e granadas, nessa quinta-feira (22), no município de \r\nCodajás (a 240 quilômetros de Manaus).\r\n \r\n<div>\r\n\r\n \r\n\r\n\r\n</div>\r\n\r\nDe acordo com o delegado titular da 78ª Delegacia Interativa de \r\nPolícia (DIP), Thyago Garcez, o colombiano foi preso após denúncias \r\nanônimas.\r\n“Recebemos a informação de que uma quadrilha transportava, em um \r\nbarco, uma grande quantidade de drogas, armas e munições. Montamos \r\ncampana em toda a extensão da área portuária de Codajás e conseguimos \r\nidentificar Jesus, no momento em que ele abastecia a embarcação \r\nutilizada para transportar o entorpecente”, contou.\r\nJesus foi conduzido à unidade policial e confessou que faria o \r\ntransporte de drogas oriundas no Estado do Pará para Manaus. Conforme o \r\ndelegado, o infrator também revelou o lugar onde estava guardada a \r\nmercadoria ilícita, um acampamento às margens do rio, distante cerca de \r\n40 minutos de barco.\r\n<span>Os policiais que participavam da <a rel="nofollow" target="">operação</a>\r\n embarcaram em duas lanchas e realizaram campana durante toda a noite de\r\n quarta-feira e madrugada de quinta, a fim de prender em flagrante os \r\ndemais integrantes do esquema criminoso.</span>\r\n“Por volta das 22h ficamos de tocaia com o intuito de identificar \r\nqualquer rastro ou barulho dos infratores, mas somente durante a \r\nmadrugada, por volta das 5h30, foi possível visualizar pegadas em um \r\nbarranco perto do rio. Entramos na mata e em poucos minutos avistamos o \r\nacampamento, onde encontramos a mercadoria ilícita”, explicou Garcez.\r\n<span>No local foram apreendidos 74 quilos de maconha prensada, 66,3 quilos\r\n de pasta base de cocaína, uma pistola calibre nove milímetros, uma \r\nsubmetralhadora calibre 765, uma escopeta calibre 12 semiautomática, \r\nalém de duas granadas de uso restrito do Exército colombiano.<br>\r\n“Todos os cartuchos estavam carregados de munições”, ressaltou o titular da 78ª DIP.</span>\r\n<span>O delegado afirmou que as investigações em torno do caso irão continuar na região de mata fechada com o intuito de <a rel="nofollow" target="">localizar</a>\r\n outras pessoas ligadas ao crime. Jesus foi autuado em flagrante por \r\ntráfico de drogas, associação para o tráfico e porte ilegal de arma de \r\nfogo de uso restrito. Ele ficará preso na sede da 78ª DIP, à disposição \r\nda Justiça.</span>\r\nCom informações da assessoria<br><br>', '', 'colombiano.png', 'Em Codajás, colombiano é preso com 140 quilos de drogas, além de munições e granadas', '2', '', '', 'Notícia,colombiano,granada,munição', 1, 1, 2, 0);
INSERT INTO `noticia` (`noticia_id`, `sub_editoriais_id`, `data_noticia`, `fonte`, `titulo`, `texto`, `texto_detalhe`, `img`, `legenda`, `posicao_img`, `video`, `legenda_video`, `tags`, `destaque_banner`, `publicar`, `usuario_id`, `cliks`) VALUES
(27, 50, '23-10-2015', 'emTempo', 'Carteiro é encontrado degolado, no Zumbi', 'O carteiro Nelson Dias Pereira Filho, 45, foi encontrado nesta \r\nquinta-feira (22), degolado, pelo filho de 17 anos, na laje de sua \r\nresidência, localizada na rua Jauari, bairro Zumbi 3, Zona Leste. \r\nFamiliares informaram à polícia que em cima do corpo estava um \r\npreservativo lacrado, que os bolsos da bermuda estavam revirados e nada \r\nfoi levado da vítima.\r\n \r\n<div>\r\n\r\n \r\n\r\n\r\n</div>\r\n\r\n<span>De acordo com os policiais militares da 25ª Companhia \r\nInterativa Comunitária (Cicom), o homem foi encontrado por volta das \r\n10h, pelo filho da vítima, um adolescente de 17 anos, que foi até o <a rel="nofollow" target="">pai</a>\r\n para chamá-lo para almoçar. O corpo apresentava o pescoço degolado. \r\nNenhum objeto que possa ter sido usado para desferir o golpe no pescoço \r\ndo carteiro, foi localizado pela família.</span>\r\n<span>Um investigador da Delegacia Especializada de Homicídios e\r\n Sequestros (DEHS), que preferiu não se identificar, disse que \r\nfamiliares relataram que o carteiro chegou <a rel="nofollow" target="">em casa</a>\r\n  ontem, após à meia noite. “A esposa da vítima, uma mulher de 45 anos, \r\nrelatou que ele chegou sozinho, por volta das 0h20 em casa – onde moram o\r\n casal, o filho deles de 17 anos, o <a rel="nofollow" target="">enteado</a>\r\n da vítima de 24 anos e a companheira dele – um pouco embriagado e como \r\nde costume, subiu para a laje dormir”, disse o investigador.</span>\r\n<span>A polícia <a rel="nofollow" target="">informou</a>,\r\n ainda, que há hipótese que uma segunda pessoa tenha entrado na casa e \r\ncometido o homicídio. “Eles alegaram que nada foi levado da vítima. E \r\ndisseram que haviam dois cachorros no pátio da casa que não latiram \r\ndurante a ocorrência do crime. Mas se o <a rel="nofollow" target="">fato</a> ocorreu, outra pessoa pode ter entrado na casa, sem causar estranheza aos animais”, explicou o investigador.</span>\r\nAs imagens da câmera de segurança de estabelecimentos próximos ao \r\nlocal onde ocorreu o crime serão solicitadas para ajudar nas \r\ninvestigações. Todos os familiares da vítima foram notificados a prestar\r\n depoimento à DEHS. Até o fechamento desta edição, nenhum suspeito do \r\ncrime havia sido identificado.\r\nPor Thaís Gama<br><br>', '', 'Carteiro.png', 'Carteiro é encontrado degolado, no Zumbi, Zona Leste', '1', '', '', 'Notícia', 1, 1, 2, 0),
(28, 13, '23-10-2015', 'emTempo', 'Foragido desde de 2013, Pizzolato está de volta ao Brasil', '<span>O ex-diretor do Banco do Brasil, Henrique Pizzolato, acaba\r\n de chegar em Brasília, onde vai começar a cumprir pena com mais de dois\r\n anos de atraso. A aeronave cinza da Polícia Federal pousou no <a rel="nofollow" target="">Aeroporto Internacional</a>\r\n da capital às 8h46. Vestindo um agasalho claro e uma calça de moleton, \r\nPizzolato desceu da aeronave escoltado por agentes da PF. Ele foi \r\ncondenado na Ação Penal 470, o processo do mensalão, por peculato e \r\nlavagem de dinheiro, mas fugiu para a Itália em setembro de 2013, antes \r\ndo fim do julgamento, com um passaporte falso.\r\n \r\n</span><div>\r\n\r\n \r\n\r\n\r\n</div>\r\n\r\n<span>Na capital federal, ele será encaminhado ao Instituto \r\nMédico-Legal, onde fará exame de corpo de delito. Um comboio da Polícia \r\nFederal, com três viaturas descaracterizadas, vai leva-lo durante os \r\ndeslocamentos em Brasília. Ele será escoltado para o IML, na sede da \r\nPolícia Civil, em um dos <a rel="nofollow" target="">automóvel</a> blindado.</span>\r\nDe lá, ele segue para o Complexo Penitenciário da Papuda para acertar\r\n as contas com a justiça brasileira. Na mesma penitenciária, foram \r\nencarcerados outros condenados da Ação Penal 470, como o ex-ministro da \r\nCasa Civil, José Dirceu, o ex-tesoureiro do PT, Delúbio Soares, e o \r\nex-deputado federal pelo PT, José Genoíno.\r\n<span>Pelo menos doze agentes da PF, incluindo um \r\nmédico e um delegado, acompanharão o trajeto do condenado em Brasília. \r\nNo início da manhã, Henrique Pizzolato desembarcou em voo <a rel="nofollow" target="">comercial</a> no Aeroporto Internacional de Guarulhos, <a rel="nofollow" target="">em São Paulo</a>.</span>\r\nA chegada ao Brasil do ex-diretor de Marketing do Banco do Brasil \r\nencerra um capítulo na história da fuga de um dos condenados no processo\r\n do mensalão, que envolveu também vários recursos judiciais e tentativas\r\n do governo brasileiro de trazê-lo de volta ao Brasil.\r\n<span>Pizzolato foi condenado pelo Supremo Tribunal Federal \r\n(STF) a 12 anos e sete meses de prisão por corrupção passiva, lavagem de\r\n dinheiro e peculato, mas, por ter dupla cidadania, fugiu para a Itália \r\nem 2013, com um passaporte falso em nome de um <a rel="nofollow" target="">irmão</a>\r\n morto. O ex-diretor foi o único dos condenados que fugiu. Ele foi preso\r\n em fevereiro do ano passado em Maranello, na Itália, após ter o nome \r\nincluído na lista de procurados internacionais da Interpol.</span>\r\nPor Agência Brasil<br><br>', '', 'Pizzolato.jpg', 'Foragido desde de 2013, Pizzolato está de volta ao Brasil', '1', '', '', 'Notícia,pizzolato,foragido', 1, 1, 2, 0),
(29, 13, '23-10-2015', 'emTempo', 'Rebeca Garcia é nomeada para assumir a Suframa', '<span>A ex-deputada Rebeca Garcia foi indicada para assumir a \r\nsuperintendência da Zona Franca de Manaus (Suframa), nesta quinta-feira \r\n(22), e aguarda apenas a assinatura da presidente Dilma Rouseff para \r\nefetivar a nomeação.<br>\r\n \r\n</span><div>\r\n\r\n \r\n\r\n\r\n</div>\r\nA informação foi confirmada, em nota, pelo Ministério do \r\nDesenvolvimento, Indústria e Comércio Exterior (MDIC).&nbsp; A assinatura \r\ndeve acontecer ainda nesta quinta e será publicada amanhã (23), no \r\nDiário Oficial da União (DOU).\r\n<span>Rebeca disse que nos últimos dias não vinha recebendo ligações de Brasília, mas nesta quinta-feira (22) foi <a rel="nofollow" target="">informada</a>\r\n pelo ministro-chefe da Secretaria de Governo do Brasil, Ricardo \r\nBerzoini, de que seu nome foi o escolhido para assumir a autarquia. A \r\nex-deputada falou que prefere manter a cautela e aguardar a publicação.</span>\r\nPor Joandres Xavier<br><br>', '', 'Rebeca.jpg', 'Rebeca Garcia é nomeada para assumir a Suframa', '2', '', '', 'Notícia,Rebeca Garcia,Suframa', 1, 1, 2, 0),
(30, 50, '23-10-2015', 'd24am.com', 'Trio com 60 quilos de drogas é preso em tocantins', 'Wendes Falcão de Menezes, 29, e o casal Jennifer Dayana Davi Gomes \r\ndos Santos, 18 anos, e Cassiano Cooper Gomes, 20, foram por volta das \r\n19h desta quinta-feira (22), no município de Tonantins (a 865 \r\nquilômetros de Manaus), com 60 quilos de drogas.\r\n \r\n<div>\r\n\r\n \r\n\r\n\r\n</div>\r\n\r\nDe acordo com o delegado titular do Distrito Integrado de Polícia \r\n(DIP) do município, Ericson Tavares, a droga, que tinha como destino à \r\ncapital amazonense, estava dentro de uma lancha que era conduzida por \r\nWendes.\r\n<span>A polícia chegou ao trio após uma denúncia anônima feita a Polícia Militar do município, <a rel="nofollow" target="">informando</a>  que três pessoas estavam com uma grande quantidade de droga no porto da <a rel="nofollow" target="">cidade</a>.<br>\r\nOs policiais foram até ao local, onde foram <a rel="nofollow" target="">informados</a>\r\n que o casal tinha saído há poucos minutos em uma lancha. A equipe \r\nfluvial fez o cerco e conseguiu interceptar os suspeitos. Com eles foram\r\n aprendidos 60 quilos de drogas, entre cocaína e maconha.</span>\r\nSegundo o delegado, as investigações continuam, pois, provavelmente, o\r\n casal não é o dono do entorpecente. “As investigações apontam que eles \r\nsimplesmente levariam a droga para a capital, precisamos chegar aos \r\ndonos da mercadoria”, concluiu Tavares.\r\nO trio foi conduzido à sede da delegacia, onde os envolvidos foram \r\nautuados por tráfico de drogas e associação criminosa. Eles ficarão na \r\ncarceragem à disposição da Justiça.\r\nPor Mara Magalhães<br><br>', '', 'trio.png', 'Trio é preso em Tonantins com 60 quilos de drogas que tinham como destino a capital', '2', '', '', 'Notícia,drogas,tocantins,60kg', 1, 1, 2, 0),
(31, 45, '23-10-2015', 'ge.com', 'Tabloide diz que Messi pode "mudar de ares" e ir para a Inglaterra em 2017', 'Os jornais ingleses “The Sun” e “Daily Mirror” trazem nesta sexta-feira a notícia de que Lionel <a rel="" target="" href="http://globoesporte.globo.com/atleta/messi.html">Messi</a> pode, sim, deixar o <a rel="" target="" href="http://globoesporte.globo.com/equipe/futebol/futebol-internacional/futebol-espanhol/barcelona.html">Barcelona</a>.\r\n Esta grande bomba no mundo do futebol aconteceria em 2017, um ano antes\r\n do fim do contrato entre o clube catalão e o craque argentino. Sua \r\ncláusula de rescisão está avaliada em € 250 milhões (R$ 1,08 bilhão na \r\ncotação atual).<br><br>Segundo a reportagem, <a rel="" target="" href="http://globoesporte.globo.com/equipe/futebol/futebol-internacional/futebol-ingles/manchester-united.html">Manchester United</a>, <a rel="" target="" href="http://globoesporte.globo.com/equipe/futebol/futebol-internacional/futebol-ingles/manchester-city.html">Manchester City</a> e <a rel="" target="" href="http://globoesporte.globo.com/equipe/futebol/futebol-internacional/futebol-ingles/chelsea.html">Chelsea</a>\r\n já conversaram com o entorno do camisa 10 e deixaram claro suas \r\nintenções nas últimas duas semanas, período em que dedicou à recuperação\r\n de uma lesão no joelho. Messi está há 14 anos no Barcelona e já \r\nmanifestou em mais de uma oportunidade o desejo de seguir a carreira na \r\nEspanha.<br><br>Ainda de acordo com a publicação, Messi estaria disposto\r\n a mudar de ideia por conta dos problemas com a Fazenda Espanhola e a \r\nperseguição que vem sofrendo. No início do mês, autoridades pediram \r\nquase dois anos de prisão para o argentino por fraude fiscal.<br><br>', '', 'Messi.jpg', 'Tabloide diz que Messi pode mudar de ares e ir para a Inglaterra em 2017', '1', '', '', 'Notícia,Messi', 1, 1, 2, 0),
(32, 50, '24-10-2015', 'emTempo', 'Corpo é encontrado enterrado, no Tarumã', 'O corpo de um homem ainda não identificado foi encontrado com pelo \r\nmenos dez golpes de faca. A vítima estava enrolada em um lençol, no \r\nramal da Piçarreira, bairro Tarumã, Zona Oeste, por volta das 12h30 \r\ndesta sexta-feira (23). Os golpes atingiram a cabeça, o braço esquerdo e\r\n a coxa esquerda da vítima.\r\n \r\n<div>\r\n\r\n \r\n\r\n\r\n</div>\r\n\r\nDe acordo com a Polícia Civil, o homem aparenta ter entre 50 e 60 \r\nanos, 1,75 metro de altura, cor branca e cabelo loiro. O corpo foi \r\nencontrado pelo engenheiro florestal Gustavo Naressi de Azeredo, 34, em \r\num terreno onde funciona o viveiro ‘Mata Tropical’.\r\nO engenheiro contou que o lugar não tem eletricidade e &nbsp;nem água, \r\nmas, uma vez por ano alguém vai até o local para fazer limpeza. De \r\nacordo com a testemunha, Gustavo&nbsp; mexia na &nbsp;terra, quando percebeu um \r\nbanco de areia embaixo de uma &nbsp;estrutura. Nesse momento, acabou vendo o \r\njoelho &nbsp;da vítima e chamou a&nbsp; polícia.\r\n<span>Alguns moradores disseram que o corpo poderia ser de um \r\ndos vendedores de fruta que ficavam na entrada dos ramais das \r\nproximidades. A reportagem foi até o local <a rel="nofollow" target="">informado</a>, mas nenhum popular reconheceu a vítima.</span>\r\nA testemunhas disse que já é a quarta vez que cortam &nbsp;os arames da \r\nentrada, além de fazerem buracos na terra. O lugar não é muito grande, \r\nmas não tem segurança, o que pode ter favorecido a ocorrência.\r\nAté o momento desta postagem, nenhum suspeito havia sido localizado.&nbsp;\r\n A Delegacia Especializada em Homicídios e Sequestros (DESH) vai \r\ninvestigar o caso.\r\nPor Joandres Xavier<br><br>', '', 'Corpo.png', 'Corpo de homem é encontrado enterrado, no Tarumã', '2', '', '', 'Notícia,facadas,tarumã', 1, 1, 2, 0),
(33, 50, '23-10-2015', 'emTempo', 'Menina de três anos é espancada por ex-companheira da mãe', '<span>A doméstica Jéssica Karoline da Silva Vieira, 24, foi presa na manhã \r\ndesta sexta-feira (23), suspeita de ter espancado a enteada, uma criança\r\n de 3 anos de idade. O crime ocorreu na residência da família localizada\r\n na rua Ginseng, bairro monte das Oliveiras, Zona Norte.&nbsp; A menina foi \r\ninternada com hematomas, corte no rosto e traumatismo craneano.<br>\r\n \r\n</span><div>\r\n\r\n \r\n\r\n\r\n</div>\r\n<br>\r\nJéssica mantinha uma relação conjugal com a mãe da criança, há \r\naproximadamente um ano e cinco meses. A titular da Delegacia \r\nEspecializada em Proteção à Criança e ao Adolescente (DEPCA), Juliana \r\nTuma, contou que Jéssica nega, mas as evidencias são robustas e a \r\nmaterialidade é contundente, com todas as provas apontando para a \r\nautoria da doméstica.\r\n<span>“Na noite do fato, ouviram pancadas muito fortes vindo da \r\nparede do quartinho onde elas moravam, como se estivessem agredindo \r\nalguém. Depois desse episódio, a criança saiu para ir ao hospital. As \r\nagressões ocorreram, provavelmente no dia 8. Os episódios eram \r\nreiterados de agressão.&nbsp; A criança deu entrada no hospital no dia 11. \r\nEssa última agressão brutal que culminou na internação foi <a rel="nofollow" target="">informada</a> pela mãe no dia 12”, disse a delegada.</span>\r\nAs investigações mostram que ocorreram várias agressões.&nbsp; De acordo \r\ncom o laudo médico da criança, o estado de saúde da vítima é gravíssimo,\r\n diagnosticada com traumatismo craneano.\r\n<span>A mãe, identificada apenas como Karen, 21, também dona de casa, relatou que não estava <a rel="nofollow" target="">em casa</a>\r\n e que deixou a criança sobre os cuidados de Jéssica. A polícia \r\ninvestiga uma possível omissão da mãe, mas até o momento, os indícios \r\nnão apontam que ela estivesse no local no dia da agressão. Se ficar \r\nconfirmado a omissão da mãe no caso, ela responderá pelo crime.</span>\r\n<span>Tuma <a rel="nofollow" target="">informou</a>\r\n ainda que nessa quinta-feira (22), a criança ainda estava internada em \r\nestado grave e inconsciente, apresentando fratura na cabeça e corte \r\ninflamado na face.&nbsp; Segundo relatos de testemunhas, as agressões \r\naconteciam com chute. “ A agressora arremessava a criança contra a \r\nparede”.</span>\r\nEm sua defesa, Jéssica disse que não ficava com a menina e não fez \r\nnada com a criança. Quando o casal brigava, Jessica contou que Karen ia \r\nembora atrás da família, mas era expulsa e voltava para casa de \r\nJéssica.&nbsp; “Ela batia na filha dela e eu batia nos meus. Às vezes, apenas\r\n pegava sandalinha e batia na mãozinha dela.&nbsp; Karen me acusa porque \r\nterminei o relacionamento e a família dela também me acusa, mas porque \r\nnunca gostaram de mim. Terminei&nbsp; porque não deu mais certo e, nesse \r\nmomento minha, consciência está limpa,” disse a mulher.\r\nEsse não é o primeiro episódio de violência protagonizado por \r\nJéssica, que também agredia a própria companheira Karen, mãe da criança,\r\n além do próprio filho, segundo a delegada Tuma.\r\n<span>Jéssica foi indiciada por homicídio tentado <a rel="nofollow" target="">qualificado</a>\r\n  e crime de tortura. Ela foi encaminhada ao Centro de Detenção \r\nProvisória Feminino (CDPF), no quilômetro 8 da BR-174.Se a criança vier a\r\n óbito, Jéssica não irá mais <a rel="nofollow" target="">responder</a> pela forma tentada do ato e sim consumada.</span>\r\nPor Joandres Xavier<br><br>', '', 'mulher.png', 'Menina de três anos é espancada por ex-companheira da mãe; estado de saúde é grave', '2', '', '', 'Notícia,criança,agressão', 1, 1, 2, 0),
(34, 50, '28-10-2015', 'd24am.com', 'TESTE DE OPINIAO MANESCHY', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam \r\nnonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat \r\nvolutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation \r\nullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. \r\nDuis autem vel eum iriure dolor in hendrerit in vulputate velit esse \r\nmolestie consequat, vel illum dolore eu feugiat nulla facilisis at vero \r\neros et accumsan et iusto odio dignissim qui blandit praesent luptatum \r\nzzril delenit augue duis dolore te feugait nulla facilisi. Nam liber \r\ntempor cum soluta nobis eleifend option congue nihil imperdiet doming id\r\n quod mazim placerat facer possim assum. Typi non habent claritatem \r\ninsitam; est usus legentis in iis qui facit eorum claritatem. \r\nInvestigationes demonstraverunt lectores legere me lius quod ii legunt \r\nsaepius. Claritas est etiam processus dynamicus, qui sequitur mutationem\r\n consuetudium lectorum. M<br>', '', '109624_697x437_crop_5628f5709cf21.jpg', 'xxxxxxxxxx', '1', '', '', 'Notícia', 1, 1, 2, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sub_editoriais`
--

CREATE TABLE IF NOT EXISTS `sub_editoriais` (
  `sub_editoriais_id` int(10) unsigned NOT NULL,
  `editoria_id` int(10) unsigned NOT NULL,
  `sub_editora` varchar(100) NOT NULL DEFAULT '',
  `usuario_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sub_editoriais`
--

INSERT INTO `sub_editoriais` (`sub_editoriais_id`, `editoria_id`, `sub_editora`, `usuario_id`) VALUES
(13, 1, 'POLÍTICA', 1),
(14, 1, 'MANAUS • AM', 1),
(15, 1, 'BRASIL', 1),
(16, 1, 'CONCURSOS', 1),
(17, 1, 'ELEIÇÕES', 1),
(18, 1, 'MUNDO', 1),
(19, 1, 'SAÚDE', 1),
(20, 1, 'TECNOLOGIA', 1),
(21, 3, 'FITNESS', 1),
(22, 3, 'FÓRMULA 1', 1),
(23, 3, 'LUTAS', 1),
(24, 3, 'TÊNIS', 1),
(25, 3, 'WAKEBOARD', 1),
(26, 3, 'OUTROS ESPORTES', 1),
(27, 4, 'TELEVISÃO', 1),
(28, 4, 'CARNAVAL', 1),
(29, 4, 'CINEMA', 1),
(30, 4, 'COMPORTAMENTO', 1),
(31, 4, 'GOURMET', 1),
(32, 4, 'LITERATURA', 1),
(33, 4, 'MÚSICA', 1),
(34, 4, 'TURISMO', 1),
(35, 4, 'BIZARRO', 1),
(36, 5, 'ANIMAIS', 1),
(37, 5, 'CIÊNCIA', 1),
(38, 5, 'HISTÓRIA', 1),
(39, 5, 'ECO', 1),
(40, 5, 'POVOS', 1),
(41, 7, 'Show & Arte', 1),
(42, 7, 'Moda & Beleza', 1),
(43, 7, 'Parintins', 1),
(44, 4, 'FAMOSOS', 1),
(45, 3, 'futebol', 1),
(46, 3, 'OLIMPíADAS', 1),
(48, 8, 'INTERNACIONAL', 1),
(50, 6, 'MANAUS', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `usuario_id` int(10) unsigned NOT NULL,
  `nome` varchar(100) NOT NULL DEFAULT '',
  `login` varchar(45) NOT NULL DEFAULT '',
  `senha` varchar(45) NOT NULL DEFAULT '',
  `status` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '1- ATIVO 2 - DESATIVADO',
  `email` varchar(100) NOT NULL DEFAULT '',
  `nivel` int(10) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`usuario_id`, `nome`, `login`, `senha`, `status`, `email`, `nivel`) VALUES
(1, 'Administrador Sistema', 'admin', 'admin', 1, 'karolfurletti@gmail.com', 0),
(2, 'Thiago Maneschy', 'thiago', '123', 1, 'udahduhaudhaud', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `videos`
--

CREATE TABLE IF NOT EXISTS `videos` (
  `videos_id` int(10) unsigned NOT NULL,
  `data_video` varchar(45) NOT NULL DEFAULT '',
  `editoria` varchar(100) NOT NULL DEFAULT '',
  `codigo` varchar(100) NOT NULL DEFAULT '',
  `legenda` varchar(100) NOT NULL DEFAULT '',
  `usuario_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `videos`
--

INSERT INTO `videos` (`videos_id`, `data_video`, `editoria`, `codigo`, `legenda`, `usuario_id`) VALUES
(1, '01-10-2015', 'BIZARRO', '887878', 'VIDEO TESTE2', 1),
(2, '15-10-2015', 'ESPORTES', 'LTNaque6_8w', 'teste legenda videos', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`album_id`),
  ADD KEY `fk_album_usuario1_idx` (`usuario_id`);

--
-- Indexes for table `album_fotos`
--
ALTER TABLE `album_fotos`
  ADD PRIMARY KEY (`album_fotos_id`),
  ADD KEY `fk_album_fotos_album1_idx` (`album_id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`banner_id`),
  ADD KEY `fk_banner_usuario1_idx` (`usuario_id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`blogs_id`),
  ADD KEY `fk_blogs_usuario1_idx` (`usuario_id`);

--
-- Indexes for table `editoria`
--
ALTER TABLE `editoria`
  ADD PRIMARY KEY (`editoria_id`);

--
-- Indexes for table `noticia`
--
ALTER TABLE `noticia`
  ADD PRIMARY KEY (`noticia_id`),
  ADD KEY `fk_noticia_sub_editoriais1_idx` (`sub_editoriais_id`),
  ADD KEY `fk_noticia_usuario1_idx` (`usuario_id`);

--
-- Indexes for table `sub_editoriais`
--
ALTER TABLE `sub_editoriais`
  ADD PRIMARY KEY (`sub_editoriais_id`),
  ADD KEY `fk_sub_editoriais_usuario1_idx` (`usuario_id`),
  ADD KEY `fk_sub_editoriais_editoria1_idx` (`editoria_id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usuario_id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`videos_id`),
  ADD KEY `fk_videos_usuario1_idx` (`usuario_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `album_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `album_fotos`
--
ALTER TABLE `album_fotos`
  MODIFY `album_fotos_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `banner_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `blogs_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `editoria`
--
ALTER TABLE `editoria`
  MODIFY `editoria_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `noticia`
--
ALTER TABLE `noticia`
  MODIFY `noticia_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `sub_editoriais`
--
ALTER TABLE `sub_editoriais`
  MODIFY `sub_editoriais_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usuario_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `videos_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `album`
--
ALTER TABLE `album`
  ADD CONSTRAINT `fk_album_usuario1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`usuario_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `album_fotos`
--
ALTER TABLE `album_fotos`
  ADD CONSTRAINT `fk_album_fotos_album1` FOREIGN KEY (`album_id`) REFERENCES `album` (`album_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `banner`
--
ALTER TABLE `banner`
  ADD CONSTRAINT `fk_banner_usuario1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`usuario_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `fk_blogs_usuario1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`usuario_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `noticia`
--
ALTER TABLE `noticia`
  ADD CONSTRAINT `fk_noticia_sub_editoriais1` FOREIGN KEY (`sub_editoriais_id`) REFERENCES `sub_editoriais` (`sub_editoriais_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_noticia_usuario1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`usuario_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `sub_editoriais`
--
ALTER TABLE `sub_editoriais`
  ADD CONSTRAINT `fk_sub_editoriais_editoria1` FOREIGN KEY (`editoria_id`) REFERENCES `editoria` (`editoria_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sub_editoriais_usuario1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`usuario_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `fk_videos_usuario1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`usuario_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
