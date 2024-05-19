DROP DATABASE IF EXISTS proyectodw;
CREATE DATABASE proyectodw;
use proyectodw;
CREATE TABLE artista (
    id_artista INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre varchar(100),
    id_tipo_arte INT,
    fecha_nac DATE,
    id_pais INT,
    descripcion varchar(500)
);
CREATE TABLE tipo_arte (
    id_tipo_arte INT NOT NULL auto_increment PRIMARY KEY,
    tipo VARCHAR(100)
);
CREATE TABLE pais (
    id_pais INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre_pais varchar(100)
);
CREATE TABLE obra (
    id_obra integer auto_increment not null primary key,
    id_artista integer not null,
    id_tipo_arte integer not null,
    nombre_obra varchar(100) default 'Sin título',
    anio int,
    descripcion TEXT
);
ALTER TABLE artista
ADD CONSTRAINT FK_artista_tipoarte FOREIGN KEY (id_tipo_arte) REFERENCES tipo_arte(id_tipo_arte);
ALTER TABLE artista
ADD CONSTRAINT FK_artista_pais FOREIGN KEY (id_pais) REFERENCES pais(id_pais);
ALTER TABLE obra
ADD CONSTRAINT FK_obra_artista FOREIGN KEY (id_artista) REFERENCES artista(id_artista);
ALTER TABLE obra
ADD CONSTRAINT FK_obra_tipoarte FOREIGN KEY (id_tipo_arte) REFERENCES tipo_arte(id_tipo_arte);
CREATE TABLE usuario (
    id_usuario int auto_increment not null primary key,
    nombre_usr varchar(255) not null,
    email varchar(100) not null,
    nombre varchar(100) not null,
    apellido varchar(100),
    fecha_nac date default CURRENT_DATE(),
    password varchar(60) not null,
    passphrase varchar(100),
    pass_ans varchar(30),
    activo bool default TRUE
);
CREATE TABLE compra (
    id_compra INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    id_usuario INT NOT NULL,
    id_obra INT NOT NULL,
    cantidad INT,
    nota VARCHAR(100)
);
CREATE TABLE inventario (
    id_inventario INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    id_obra INT NOT NULL,
    cantidad INT,
    costo DECIMAL(17, 2)
);
ALTER TABLE inventario
ADD CONSTRAINT FK_inventario_obra FOREIGN KEY (id_obra) REFERENCES obra(id_obra);
ALTER TABLE compra
ADD CONSTRAINT FK_compra_usuario FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario);
ALTER TABLE compra
ADD CONSTRAINT FK_compra_obra FOREIGN KEY (id_obra) REFERENCES obra(id_obra);
INSERT INTO tipo_arte (tipo)
VALUES ('Arquitectura'),
    ('Cine'),
    ('Danza'),
    ('Escultura'),
    ('Literatura'),
    ('Música'),
    ('Pintura');
INSERT INTO pais (nombre_pais)
VALUES ('Argentina'),
    ('Bolivia'),
    ('Brasil'),
    ('Chile'),
    ('Colombia'),
    ('Costa Rica'),
    ('Cuba'),
    ('Ecuador'),
    ('El Salvador'),
    ('Guatemala'),
    ('Haití'),
    ('Honduras'),
    ('México'),
    ('Nicaragua'),
    ('Panamá'),
    ('Paraguay'),
    ('Perú'),
    ('República Dominicana'),
    ('Uruguay'),
    ('Venezuela');
INSERT INTO artista (
        nombre,
        id_pais,
        descripcion,
        id_tipo_arte,
        fecha_nac
    )
VALUES (
        'Lina Bo Bardi',
        3,
        'Conocida por su trabajo innovador y humanista, incluyendo el diseño del Museo de Arte de São Paulo.',
        1,
        '1914-12-5'
    ),
    (
        'Lucía Puenzo',
        1,
        'Directora, guionista y productora conocida por su enfoque en historias íntimas y provocativas.',
        2,
        '1976-11-28'
    ),
    (
        'Lucrecia Martel',
        1,
        'Directora de cine conocida por sus películas surrealistas y provocativas.',
        2,
        '1966-12-14'
    ),
    (
        'María Novaro',
        13,
        'Directora y guionista conocida por sus películas que exploran la vida cotidiana y las relaciones humanas.',
        2,
        '1950-09-11'
    ),
    (
        'Ana María Stekelman',
        1,
        'Bailarina y coreógrafa conocida por su trabajo en el ballet contemporáneo y la danza teatro.',
        3,
        '1944-09-16'
    ),
    (
        'Blanca Li',
        13,
        'Bailarina y coreógrafa conocida por su versatilidad y su capacidad para combinar diferentes estilos de danza.',
        3,
        '1964-01-12'
    ),
    (
        'Carmen Beuchat',
        4,
        'Bailarina y coreógrafa conocida por su trabajo en la danza contemporánea y la performance.',
        3,
        '1941-12-27'
    ),
    (
        'Lygia Clark',
        3,
        'Escultora pionera en el arte contemporáneo, reconocida por su trabajo con el arte cinético y el arte participativo.',
        4,
        '1920-10-23'
    ),
    (
        'Marisol Escobar',
        20,
        'Escultora conocida por sus obras figurativas y su uso de materiales mixtos.',
        4,
        '1930-05-22'
    ),
    (
        'Clarice Lispector',
        3,
        'Escritora conocida por su estilo único y sus novelas introspectivas y experimentales.',
        5,
        '1920-12-10'
    ),
    (
        'Diamela Eltit',
        4,
        'Escritora y académica conocida por sus novelas que exploran temas sociales y políticos en Chile.',
        5,
        '1947-08-24'
    ),
    (
        'Gioconda Belli',
        14,
        'Poeta y novelista conocida por sus obras que exploran temas políticos y feministas.',
        5,
        '1948-12-09'
    ),
    (
        'Isabel Allende',
        4,
        'Escritora conocida por sus novelas que exploran la historia y la cultura latinoamericana, como "La casa de los espíritus".',
        5,
        '1942-08-02'
    ),
    (
        'Laura Esquivel',
        13,
        'Escritora conocida por su novela "Como agua para chocolate", que combina realismo mágico con gastronomía y amor.',
        5,
        '1950-09-30'
    ),
    (
        'Mercedes Sosa',
        1,
        'Cantante y activista conocida como "La voz de América Latina", famosa por su música folclórica y sus letras comprometidas.',
        6,
        '1935-07-09'
    ),
    (
        'Mon Laferte',
        4,
        'Cantante y compositora conocida por su estilo ecléctico que fusiona diversos géneros musicales con letras profundas y emotivas.',
        6,
        '1983-05-02'
    ),
    (
        'Susana Baca',
        17,
        'Cantante y compositora conocida por su interpretación del folklore afroperuano y su defensa de la cultura afrodescendiente.',
        6,
        '1944-05-24'
    ),
    (
        'Tania Libertad',
        17,
        'Cantante conocida por su versatilidad y su interpretación de diversos géneros musicales, incluyendo el bolero, la música folclórica y el jazz.',
        6,
        '1952-10-24'
    ),
    (
        'Violeta Parra',
        4,
        'Cantautora, folclorista y artista visual, conocida por su contribución al folclore chileno y latinoamericano.',
        6,
        '1917-10-04'
    ),
    (
        'Frida Kahlo',
        13,
        'Pintora surrealista conocida por sus autorretratos y su estilo único.',
        7,
        '1907-07-06'
    ),
    (
        'Leonora Carrington',
        13,
        'Artista surrealista conocida por sus pinturas, esculturas y escritos que exploran lo mágico y lo surreal.',
        7,
        '1917-04-06'
    ),
    (
        'Remedios Varo',
        13,
        'Pintora surrealista conocida por sus obras fantásticas y misteriosas.',
        7,
        '1908-12-16'
    ),
    (
        'Tarsila do Amaral',
        3,
        'Figura clave del modernismo brasileño, conocida por sus obras que representan la identidad y la cultura brasileña.',
        7,
        '1886-09-01'
    );
INSERT INTO artista (nombre, id_pais, descripcion, id_tipo_arte)
VALUES (
        'Carla Juaçaba',
        3,
        'Arquitecta conocida por sus proyectos que integran la arquitectura con la naturaleza y el entorno.',
        1
    ),
    (
        'Rozana Montiel',
        13,
        'Arquitecta conocida por su enfoque en proyectos comunitarios y de vivienda social.',
        1
    ),
    (
        'Tatiana Bilbao',
        13,
        'Arquitecta reconocida por su enfoque en el diseño sostenible y socialmente responsable.',
        1
    ),
    (
        'Beatriz Seigner',
        3,
        'Directora y guionista conocida por sus películas que exploran temas sociales y culturales.',
        2
    ),
    (
        'Juliana Rojas',
        3,
        'Directora y guionista conocida por su trabajo en el cine independiente brasileño.',
        2
    ),
    (
        'Laura Roatta',
        19,
        'Bailarina y coreógrafa conocida por su trabajo en la danza contemporánea y la improvisación.',
        3
    ),
    (
        'Doris Salcedo',
        5,
        'Escultora conocida por sus obras que abordan temas como la violencia, la memoria y la pérdida.',
        4
    ),
    (
        'Nury González',
        4,
        'Escultora conocida por sus obras que exploran temas de género y memoria histórica en Cuba.',
        4
    ),
    (
        'Teresa Margolles',
        13,
        'Artista conocida por su trabajo escultórico que aborda temas de violencia y pérdida en México.',
        4
    ),
    (
        'Frida Baranek',
        3,
        'Artista contemporánea conocida por su trabajo escultórico que aborda temas políticos y ambientales.',
        4
    );
INSERT INTO obra (
        id_artista,
        nombre_obra,
        id_tipo_arte,
        anio,
        descripcion
    )
VALUES (
        19,
        "Cantos Campesinos",
        6,
        1956,
        "Cantos Campesinos es una recopilación de canciones que Violeta Parra grabó en los estudios Chant Du Monde en París en 1956. La obra incluye piezas folclóricas chilenas tradicionales y composiciones propias, reflejando su profundo compromiso con la preservación y difusión de la música rural chilena. Este álbum captura la esencia del folclore chileno a través de canciones que abordan temas religiosos, sociales y cotidianos con una rica herencia cultural."
    ),
    (
        19,
        "Antología",
        6,
        1962,
        "Esta antología presenta una colección de canciones que exploran la evolución del estilo musical y poético de Violeta Parra. Incluye tanto composiciones propias como adaptaciones de canciones tradicionales chilenas. Parra emplea la 'décima' y otros elementos del folclore chileno, destacando su habilidad para fusionar poesía y música en una expresión artística auténtica y profunda."
    ),
    (
        32,
        "La Carne Muerta Nunca se Abriga",
        4,
        1999,
        "Esta obra de Teresa Margolles consiste en una instalación que aborda la violencia y la muerte en la sociedad mexicana. Utiliza materiales que han estado en contacto con cadáveres, como telas empapadas en fluidos corporales. La obra desafía al espectador a confrontar la realidad de la violencia y la muerte, cuestionando la indiferencia y la deshumanización en torno a estos temas."
    ),
    (
        26,
        "Jinhua Architecture Park",
        1,
        2006,
        "Este proyecto arquitectónico, situado en Jinhua, China, es parte de un parque de arquitectura que incluye trabajos de varios arquitectos internacionales. La obra de Bilbao en este parque se caracteriza por su diseño innovador que integra elementos naturales y construidos, reflejando su enfoque en la sostenibilidad y la relación entre el espacio y la naturaleza."
    ),
    (
        26,
        "Casa Observatorio",
        1,
        2011,
        "La 'Casa Observatorio' es una estructura diseñada para la observación astronómica y la meditación, ubicada en el paisaje natural de México. Su diseño geométrico y materiales locales crean una conexión profunda con el entorno, ofreciendo un espacio introspectivo que permite una experiencia contemplativa única."
    ),
    (
        26,
        "Bioinnova",
        1,
        2013,
        "'Bioinnova' es un edificio de oficinas y laboratorios ubicado en Monterrey, México, que refleja los principios de sostenibilidad y eficiencia energética. El diseño de Bilbao se centra en la integración de la vegetación y el uso de materiales reciclados, creando un ambiente de trabajo que fomenta la innovación y la conexión con la naturaleza."
    ),
    (
        23,
        "Abaporu",
        7,
        1928,
        "'Abaporu' es una de las pinturas más icónicas de Tarsila do Amaral y del modernismo brasileño. La obra representa una figura humana con un cuerpo desproporcionadamente grande y una pequeña cabeza, acompañada por un cactus. Este cuadro inspiró el movimiento antropofágico, que promovía la idea de 'devorar' influencias extranjeras y transformarlas en algo único y brasileño."
    ),
    (
        23,
        "A Família",
        7,
        1925,
        "'A Família' presenta una composición que muestra una familia estilizada en un entorno vibrante y colorido, característico del estilo de Tarsila. La pintura refleja la influencia del cubismo y el surrealismo, así como el interés de la artista por las raíces culturales brasileñas."
    ),
    (
        18,
        "Por Ti y Por Mí",
        6,
        1998,
        "Este álbum de Tania Libertad incluye una mezcla de boleros y canciones románticas interpretadas con su distintiva voz y emotividad. La obra destaca por su calidad vocal y la capacidad de la artista para transmitir profundas emociones a través de su interpretación."
    ),
    (
        18,
        "Boleros",
        6,
        2000,
        "En este álbum, Tania Libertad rinde homenaje al género del bolero, interpretando clásicos de la música romántica latinoamericana. Su interpretación se caracteriza por una entrega apasionada y un respeto profundo por las raíces de este género musical."
    ),
    (
        22,
        "La Despedida",
        7,
        1958,
        "En 'La Despedida', Remedios Varo nos sumerge en un mundo surrealista lleno de misterio y emoción. La obra representa una escena de partida, donde figuras enigmáticas se reúnen en un paisaje fantástico, cargado de simbolismo y movimiento. Varo captura la esencia de la transición y la transformación, invitando al espectador a reflexionar sobre el ciclo eterno de la vida y la muerte."
    ),
    (
        22,
        "La Creación de las Aves",
        7,
        1957,
        "'La Creación de las Aves' es una obra que nos transporta a un universo de maravilla y asombro. En esta pintura surrealista, Remedios Varo da vida a un paisaje mágico donde las aves toman vuelo en un acto de creación y liberación. Con su estilo meticuloso y detallado, Varo nos invita a explorar un mundo donde la imaginación no tiene límites y la belleza se encuentra en cada rincón."
    ),
    (
        31,
        "Nido de Pensamientos",
        4,
        2019,
        "'Nido de Pensamientos' es una obra literaria que nos sumerge en un viaje introspectivo y poético. A través de palabras cuidadosamente tejidas, Nury González nos invita a explorar los recovecos de la mente humana, donde los pensamientos se entrelazan como hilos en un nido. Con una prosa lírica y evocadora, la autora nos transporta a un mundo de sueños y reflexiones, donde la imaginación es libre de volar."
    ),
    (
        31,
        "Exilios",
        7,
        2012,
        "En 'Exilios', Nury González nos ofrece una mirada íntima y conmovedora sobre las experiencias de aquellos que se ven obligados a dejar su hogar en busca de un nuevo comienzo. A través de relatos emotivos y personajes vívidos, la autora nos lleva en un viaje a través de tierras desconocidas y emociones profundas, explorando temas de pérdida, identidad y esperanza en medio de la adversidad."
    ),
    (
        16,
        "Norma",
        6,
        2018,
        "'Norma' es un álbum que encapsula la esencia y la voz única de Mon Laferte. Con una mezcla ecléctica de géneros musicales que van desde el pop hasta el rock y el folclore latinoamericano, Laferte nos lleva en un viaje emocional a través de canciones que exploran temas de amor, desamor y empoderamiento. Su voz poderosa y emotiva, combinada con letras profundas y melódicas, hacen de 'Norma' una experiencia auditiva inolvidable."
    ),
    (
        16,
        "La Trenza",
        6,
        2017,
        "'La Trenza' es el cuarto álbum de estudio de Mon Laferte. Fue lanzado en 2017 y recibió elogios de la crítica y el público por su diversidad musical y letras profundas. El álbum fusiona diferentes géneros como el pop, rock, folk y bolero, mostrando la versatilidad artística de Laferte. Canciones destacadas incluyen 'Amárrame' y 'Mi buen amor', que se convirtieron en éxitos internacionales y contribuyeron a la creciente popularidad de Laferte en la escena musical latina."
    ),
    (
        15,
        "Cantora I",
        6,
        2009,
        "'Cantora I' es un álbum emblemático en la carrera de Mercedes Sosa. Este trabajo recopilatorio presenta una selección de algunas de sus canciones más destacadas, donde su voz potente y emotiva resuena con fuerza, llevando consigo la riqueza cultural y la pasión de la música folclórica argentina y latinoamericana."
    ),
    (
        15,
        "30 Años",
        6,
        1993,
        "'30 Años' es un álbum conmemorativo que celebra tres décadas de la prolífica carrera de Mercedes Sosa. En este trabajo, la reconocida cantante argentina revisita algunos de sus éxitos más memorables, ofreciendo una mirada retrospectiva a su evolución artística y su impacto en la música popular latinoamericana."
    ),
    (
        4,
        "Tesoros",
        2,
        2017,
        "'Tesoros' es una película dirigida por María Novaro que nos transporta a las hermosas costas de México. La historia sigue a un grupo de niños que se embarcan en una emocionante aventura en busca de un tesoro perdido, explorando temas de amistad, valentía y descubrimiento en medio de paisajes impresionantes y misterios ocultos."
    ),
    (
        4,
        "Danzón",
        2,
        1991,
        "'Danzón' es una película dirigida por María Novaro que captura la esencia y la belleza del baile tradicional mexicano. La historia sigue a una mujer que encuentra en el danzón una vía de escape y conexión en medio de las complejidades de la vida cotidiana. Con una mezcla de romance, nostalgia y melodías envolventes, la película ofrece una mirada íntima a la cultura y la pasión del danzón."
    ),
    (
        8,
        "Bichos",
        4,
        1960,
        "'Bichos' es una serie de esculturas interactivas creadas por Lygia Clark durante la década de 1960. Estas obras están compuestas por estructuras modulares que los espectadores pueden manipular y transformar según su voluntad, lo que convierte a los espectadores en participantes activos en la creación artística. Cada 'Bicho' es una experiencia sensorial y táctil que desafía la noción tradicional de arte como objeto estático y fomenta una relación más directa y dinámica entre el espectador y la obra. Esta serie es representativa del enfoque innovador y experimental de Lygia Clark en la creación de arte participativo y de vanguardia."
    ),
    (
        8,
        "Caminhando",
        4,
        1963,
        "'Caminhando' es una obra de performance creada por Lygia Clark en la década de 1960 como parte de su serie de acciones participativas. En esta obra, Clark invitaba a los participantes a unirse a ella en una caminata por la ciudad, donde experimentaban una serie de actividades sensoriales y táctiles diseñadas para promover la conciencia del cuerpo y la interacción con el entorno urbano. Durante la caminata, los participantes se comprometían en acciones simples pero significativas, como tocar objetos, observar el paisaje y participar en juegos de percepción. 'Caminhando' fue una de las muchas obras de Clark que desafiaron las convenciones tradicionales del arte y fomentaron una experiencia artística más participativa y experimental."
    ),
    (
        3,
        "La Mujer Rubia",
        2,
        2008,
        "'La Mujer Rubia' es una película dirigida por Lucrecia Martel que examina las complejidades de la vida urbana en Argentina. La historia sigue a una mujer en busca de respuestas después de un encuentro inesperado con un desconocido. Con su estilo distintivo y su exploración de temas sociales y psicológicos, Martel ofrece una mirada provocativa y evocadora a las tensiones y contradicciones de la sociedad contemporánea."
    ),
    (
        2,
        "Wakolda",
        2,
        2013,
        "'Wakolda' es una película dirigida por Lucía Puenzo que aborda temas de identidad, manipulación y poder en el contexto de la Argentina de la década de 1960. La historia sigue a una familia que se cruza con un médico alemán enigmático, cuyas verdaderas intenciones despiertan sospechas y paranoia. Con un enfoque cinematográfico cautivador y una narrativa intensa, Puenzo ofrece una mirada inquietante a los horrores del pasado y sus repercusiones en el presente."
    ),
    (
        2,
        "Los Invisibles",
        5,
        2021,
        "'Los Invisibles' es un libro escrito por Lucía Puenzo que explora las complejidades de la migración y la identidad en el contexto contemporáneo. La historia sigue a un joven argentino que cruza ilegalmente la frontera entre Argentina y Bolivia en busca de una vida mejor. Con su enfoque sensible y humanista, Puenzo ofrece una mirada conmovedora a las vidas de aquellos que viven en las sombras de la sociedad."
    ),
    (
        21,
        "Spider",
        7,
        1967,
        "'Spider' es una escultura emblemática de Leonora Carrington, una de las artistas surrealistas más destacadas del siglo XX. Esta obra representa una araña gigante con simbolismo surrealista, que se encuentra entre las imágenes recurrentes en el trabajo de Carrington. La araña, con su presencia imponente y enigmática, invita a reflexionar sobre temas como la feminidad, el poder y lo inconsciente."
    ),
    (
        21,
        "Peacocks of Chen",
        7,
        1971,
        "'Peacocks of Chen' es una pintura surrealista de Leonora Carrington que transporta al espectador a un mundo de fantasía y misterio. En esta obra, Carrington fusiona elementos surrealistas con referencias culturales y mitológicas, creando una narrativa visual intrigante y evocadora. Los pavos reales, con sus colores vibrantes y su presencia majestuosa, dominan el lienzo, invitando al espectador a adentrarse en el universo imaginativo de la artista."
    ),
    (
        14,
        "Malinche",
        5,
        2006,
        "'Malinche' es una novela de Laura Esquivel que reinterpreta la figura histórica de Malinche, una mujer indígena que desempeñó un papel crucial como intérprete y consejera durante la conquista española de México. A través de la voz de Malinche, Esquivel nos ofrece una visión única de la historia, explorando temas de identidad, poder y traición en el contexto de la conquista y la colonización."
    ),
    (
        14,
        "A Lupita le gustaba planchar",
        5,
        1989,
        "'Lupita le gustaba planchar' es una novela de Laura Esquivel que narra la historia de Lupita, una mujer cuya vida gira en torno a su trabajo doméstico como planchadora. A través de las rutinas diarias de Lupita, Esquivel aborda temas de amor, sacrificio y empoderamiento femenino, ofreciendo una mirada conmovedora y poética a la vida de una mujer común en la Ciudad de México."
    ),
    (
        13,
        "Violeta",
        5,
        2006,
        "'Violeta' es una novela de Isabel Allende que rinde homenaje a la figura legendaria de Violeta Parra, una destacada cantautora y folclorista chilena. A través de una narrativa rica y emotiva, Allende nos sumerge en la vida y el legado de Parra, explorando su música, sus amores y su compromiso con la justicia social en el contexto de la historia de Chile."
    ),
    (
        13,
        "La Ciudad de las Bestias",
        5,
        2002,
        "'La Ciudad de las Bestias' es una novela de aventuras de Isabel Allende que sigue las peripecias de un joven en una expedición por la selva amazónica. A través de su viaje, el protagonista se encuentra con misteriosas criaturas, antiguas leyendas y peligros inesperados, descubriendo los secretos ocultos del Amazonas y enfrentándose a desafíos tanto físicos como espirituales. Con su prosa vívida y su capacidad para mezclar elementos de realidad y fantasía, Allende ofrece una historia emocionante que invita a la reflexión sobre la relación entre la humanidad y la naturaleza."
    ),
    (
        12,
        "Las Fiebres de la Memoria",
        5,
        2000,
        "'Las Fiebres de la Memoria' es una novela de Gioconda Belli que explora las complejidades del amor, la identidad y la historia personal en el contexto de Nicaragua. A través de la historia de una mujer que regresa a su país natal después de años en el exilio, Belli nos sumerge en los recuerdos y las emociones de la protagonista, ofreciendo una mirada íntima y conmovedora a la experiencia de vivir en tiempos de cambio y conflicto."
    ),
    (
        12,
        "El País de las Mujeres",
        5,
        2010,
        "'El País de las Mujeres' es una novela de Gioconda Belli que presenta un mundo imaginario donde las mujeres tienen el control total sobre la sociedad. En esta obra de ficción especulativa, Belli explora temas de género, poder y libertad a través de la historia de una mujer que desafía las normas establecidas y lucha por un cambio radical en la estructura social."
    ),
    (
        20,
        "Las Dos Fridas",
        7,
        1939,
        "'Las Dos Fridas' es una de las obras más icónicas de Frida Kahlo, que representa dos versiones de sí misma sentadas juntas y conectadas por el corazón. Esta pintura simboliza la dualidad de la identidad de Kahlo, así como su doloroso proceso de autoexploración y autorrevelación. A través de su estilo surrealista y su rica simbología, Kahlo nos invita a reflexionar sobre temas de identidad, amor y sufrimiento."
    ),
    (
        20,
        "El Ciervo Herido",
        7,
        1946,
        "'El Ciervo Herido' es una obra surrealista de Frida Kahlo que representa un ciervo con el torso humano y una flecha atravesando su cuerpo. Esta pintura, cargada de simbolismo, ha sido interpretada como una expresión del dolor físico y emocional de Kahlo, así como una exploración de su relación con el sufrimiento y la naturaleza. A través de su estilo visualmente impactante, Kahlo nos invita a reflexionar sobre la fragilidad y la fuerza del espíritu humano."
    ),
    (
        33,
        "Labirinto",
        4,
        1991,
        "'Labirinto' es una obra de Frida Baranek que consiste en una serie de estructuras escultóricas de formas geométricas, creadas a partir de materiales industriales como hierro y aluminio. Estas esculturas están dispuestas de manera que invitan al espectador a explorar y experimentar con diferentes perspectivas y espacios, creando una experiencia inmersiva que desafía la percepción del entorno."
    ),
    (
        33,
        "Espaço em Suspensão",
        4,
        2002,
        "'Espaço em Suspensão' es una obra de Frida Baranek que se caracteriza por su uso innovador de materiales industriales y su enfoque en la relación entre la forma y el espacio. La obra consiste en una serie de estructuras suspendidas que parecen desafiar la gravedad, creando una sensación de movimiento y fluidez en el espacio. Con esta obra, Baranek explora conceptos de equilibrio, tensión y armonía, invitando al espectador a reflexionar sobre la naturaleza de la realidad y la percepción."
    ),
    (
        30,
        "Shibboleth",
        4,
        2007,
        "'Shibboleth' es una instalación de Doris Salcedo realizada en la Tate Modern de Londres en 2007. Consiste en una grieta alargada y estrecha que recorre el suelo de la galería, hecha mediante la apertura de una fisura en el hormigón. Esta grieta simboliza las divisiones sociales y políticas, así como las heridas históricas que persisten en la sociedad contemporánea. Con esta obra, Salcedo invita a reflexionar sobre temas como la exclusión, la discriminación y la marginalización, y cuestiona las estructuras de poder y control que perpetúan la injusticia y el sufrimiento."
    ),
    (
        30,
        "Casa de árbol",
        4,
        2002,
        "'Casa de árbol' es una instalación en la que Salcedo utiliza muebles de madera destruidos y los fusiona con partes de un árbol, creando una pieza que reflexiona sobre la violencia y la memoria."
    ),
    (
        11,
        "Sumar",
        5,
        2018,
        "'Sumar' es una novela de Diamela Eltit que explora temas como la violencia, el género y la política a través de la historia de una mujer que se enfrenta a la represión y la opresión."
    ),
    (
        11,
        "Jamás el fuego nunca",
        5,
        2007,
        "'Jamás el fuego nunca' es una novela que aborda la violencia política y la represión en Chile durante la dictadura de Pinochet, explorando las experiencias de una comunidad marginalizada."
    ),
    (
        10,
        "La manzana en la obscuridad",
        5,
        1961,
        "La novela sigue la historia de Martim, un hombre que, después de un accidente, pierde la vista y se enfrenta a la oscuridad tanto literal como metafóricamente."
    ),
    (
        10,
        "La hora de la estrella",
        5,
        1977,
        "Esta novela es la última escrita por Lispector antes de su muerte. Narra la historia de Macabéa, una joven nordestina que vive en la pobreza en Río de Janeiro."
    ),
    (
        7,
        "Quasar",
        3,
        1984,
        "'Quasar' es una obra coreográfica creada por Carmen Beuchat en 1984. Esta pieza de danza contemporánea se caracteriza por su exploración de movimientos fluidos y abstractos, que evocan imágenes y sensaciones cósmicas. Beuchat utiliza la danza como un medio para expresar conceptos abstractos relacionados con el universo, el tiempo y el espacio, creando una experiencia artística que invita al espectador a reflexionar sobre la naturaleza del cosmos y la existencia humana. 'Quasar' es representativa del enfoque innovador y experimental de Carmen Beuchat en la creación de danza contemporánea."
    ),
    (
        24,
        "Río Bonito House",
        1,
        2016,
        "La Casa Río Bonito es un proyecto residencial ubicado en Brasil. Destaca por su integración con el entorno natural y su diseño minimalista."
    ),
    (
        24,
        "Capilla Nossa Senhora de Fátima",
        1,
        2013,
        "La Capilla Nossa Senhora de Fátima es una obra arquitectónica diseñada por Carla Juacaba en 2013 en Brumadinho, Brasil. Esta capilla se caracteriza por su diseño minimalista y su integración armoniosa con el entorno natural. Construida principalmente con materiales locales como piedra y madera, la capilla presenta una estructura abierta y ventilada que permite la entrada de luz natural y la conexión con el paisaje circundante. El diseño de Juacaba enfatiza la simplicidad y la espiritualidad, creando un espacio sereno y contemplativo para la práctica religiosa y la reflexión personal. La Capilla Nossa Senhora de Fátima es un ejemplo destacado del enfoque de Carla Juacaba en la arquitectura contemporánea, que busca una relación armoniosa entre el hombre, la arquitectura y la naturaleza."
    ),
    (
        27,
        "Los silencios",
        2,
        2018,
        "'Los silencios' es una película que cuenta la historia de una madre y sus dos hijos que escapan del conflicto armado en Colombia y se refugian en una isla flotante en la Amazonía."
    ),
    (
        27,
        "Bollywood Dream",
        2,
        2016,
        "'Bollywood Dream' es una película que sigue la historia de una familia brasileña de origen indio que emigra a la India en busca de sus raíces culturales."
    );
INSERT INTO obra (
        id_artista,
        nombre_obra,
        id_tipo_arte,
        descripcion
    )
VALUES (
        1,
        "CasaCor",
        1,
        "'CasaCor' es una obra que destaca el enfoque innovador y visionario de Lina Bo Bardi en el diseño de espacios arquitectónicos. Esta instalación, posiblemente presentada en el contexto de la exhibición de arquitectura y diseño CasaCor, refleja la capacidad de Bo Bardi para fusionar la funcionalidad con la estética, creando ambientes que inspiran e involucran a quienes los habitan."
    ),
    (
        1,
        "Helicoidal Wooden Staircase",
        1,
        "La 'Helicoidal Wooden Staircase' es una obra arquitectónica emblemática diseñada por Lina Bo Bardi. Esta escalera, con su forma helicoidal única y su materialidad cálida de madera, se convierte en un elemento escultural dentro del espacio arquitectónico. Además de su función utilitaria, la escalera se convierte en una pieza central que define la experiencia espacial y visual en el entorno construido."
    ),
    (
        9,
        "Raíces de Venezuela",
        4,
        "'Raíces de Venezuela' es una serie de esculturas creadas por Marisol Escobal que representan elementos simbólicos de la cultura venezolana y su conexión con la tierra y la naturaleza. Estas esculturas están elaboradas en diferentes materiales como madera, piedra y metal, y muestran figuras humanas, animales y símbolos tradicionales venezolanos. Cada obra de la serie 'Raíces de Venezuela' refleja la pasión de Escobal por su país y su deseo de preservar y celebrar la identidad cultural venezolana a través del arte escultórico."
    ),
    (
        9,
        "Mujer de Barro",
        4,
        "'Mujer de Barro' es una escultura de gran tamaño creada por Marisol Escobal que representa la figura de una mujer en una pose poderosa y expresiva. La escultura está tallada en barro, un material que se asocia con la tradición artística y cultural de Venezuela. La obra de Escobal se caracteriza por su exploración de la forma humana y su conexión con la tierra y la naturaleza, temas que se reflejan en esta escultura. La 'Mujer de Barro' es un ejemplo del enfoque de Escobal en la representación de la feminidad y la fuerza a través de su arte escultórico."
    ),
    (
        25,
        "Casa Patinadores",
        1,
        "'Casa Patinadores' es más que una estructura arquitectónica; es un espacio diseñado para la comunidad de patinadores urbanos. Con líneas fluidas y espacios abiertos, este proyecto desafía las convenciones tradicionales de la arquitectura residencial, ofreciendo un lugar donde la creatividad y la actividad física se fusionan. La casa se convierte en un lienzo en movimiento, donde los patinadores pueden expresarse libremente y explorar nuevas formas de interacción con el entorno construido."
    ),
    (
        17,
        "Vestida de Vida",
        6,
        "'Vestida de Vida' es una canción que envuelve al oyente en una atmósfera de nostalgia y celebración. Susana Baca, con su voz cálida y emotiva, teje una historia de amor y resiliencia a través de letras que evocan imágenes vívidas de la vida cotidiana en América Latina. La música, impregnada de ritmos afroperuanos y melodías envolventes, transporta al oyente a un mundo de emociones profundas y conexiones humanas universales."
    ),
    (
        29,
        "Resonancia",
        3,
        "'Resonancia' es una actuación de danza contemporánea en la que Laura Roatta interpreta una exploración de las emociones humanas a través del movimiento del cuerpo. En esta pieza, Roatta utiliza una combinación de movimientos fluidos y expresivos para transmitir una variedad de estados emocionales, desde la alegría hasta la melancolía y la angustia. A través de su actuación, Roatta invita al público a reflexionar sobre la naturaleza de la experiencia humana y la conexión entre el cuerpo, la mente y el alma. 'Resonancia' es un ejemplo del talento y la expresividad de Laura Roatta como bailarina de danza contemporánea."
    ),
    (
        6,
        "Robot",
        3,
        "Esta obra es una representación de danza contemporánea que explora la relación entre humanos y tecnología, especialmente a través del uso de robots como parte del espectáculo."
    ),
    (
        32,
        "Arte Contemporáneo",
        4,
        "Teresa Margolles es conocida por su trabajo que examina la violencia, la muerte y la pérdida. Utiliza materiales provenientes de morgues y escenas de crímenes, creando obras que invitan a la reflexión sobre las consecuencias sociales y personales de la violencia. Su arte contemporáneo busca visibilizar las historias de los más vulnerables y provocar una respuesta emocional en el espectador."
    );