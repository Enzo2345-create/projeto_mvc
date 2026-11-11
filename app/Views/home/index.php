<!-- ===================== BARRA SUPERIOR ===================== -->
  <div class="topbar">
    <div class="container d-flex justify-content-between gap-3">
      <span>Diversidade étnico-racial em debate</span>
      <span class="d-none d-md-inline"><a href="#artigos">Artigos</a> · <a href="#noticias">Notícias</a> · <a href="#comunidade">Comunidade</a> · <a href="#desafio">Desafio</a></span>
    </div>
  </div>

  <!-- ===================== MENU ===================== -->
  <nav class="navbar navbar-expand-lg navbar-raizes sticky-top py-3" id="navbar">
    <div class="container">
      <a class="brand-raizes" href="#inicio" aria-label="Raízes, voltar ao início">RAÍZES<span class="dot" aria-hidden="true"></span></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuPrincipal" aria-controls="menuPrincipal" aria-expanded="false" aria-label="Abrir menu">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="menuPrincipal">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item"><a class="nav-link" href="#inicio">Início</a></li>
          <li class="nav-item"><a class="nav-link" href="#artigos">Artigos</a></li>
          <li class="nav-item"><a class="nav-link" href="#noticias">Notícias</a></li>
          <li class="nav-item"><a class="nav-link" href="#comunidade">Comunidade</a></li>
          <li class="nav-item"><a class="nav-link" href="#glossario">Glossário</a></li>
          <li class="nav-item"><a class="nav-link" href="<?= url('user/index') ?>">Usuários</a></li>
        </ul>
        <div class="d-flex align-items-center gap-2 mt-3 mt-lg-0">
          <span class="points-pill" title="Seus pontos"><i class="bi bi-star-fill"></i> <span class="js-meus-pontos">0</span> pts</span>
          <button class="btn btn-raizes-outline btn-sm" data-bs-toggle="modal" data-bs-target="#modalEntrar"><i class="bi bi-box-arrow-in-right me-1"></i>Entrar</button>
        </div>
      </div>
    </div>
  </nav>

  <main>
    <!-- ===================== INÍCIO (CAPA) ===================== -->
    <section class="hero" id="inicio">
      <div class="container">
        <div class="edition-line">
          <span class="kicker">Edição comunitária</span>
          <span class="kicker text-maroon">Nº 01 · 2026</span>
        </div>

        <div class="row g-4 g-lg-5">
          <div class="col-lg-8">
            <figure class="cover reveal">
              <img src="<?= asset('assets/hero.jpg') ?>" alt="Ilustração com uma liderança indígena, uma mulher negra de turbante, um jovem negro e uma mulher de origem asiática diante de um sol dourado e de uma favela do Rio" width="1536" height="1024">
              <figcaption class="cover-tag">Capa</figcaption>
            </figure>
            <div class="reveal">
              <h1>Diversidade não é tema de um dia. <em>É conversa de todo dia.</em></h1>
              <p class="lead mb-4">
                Um espaço seguro para estudantes e professores debaterem, lerem e aprenderem sobre as muitas
                raízes que formam o Brasil — negras, indígenas, asiáticas, ciganas, imigrantes.
              </p>
              <div class="d-flex flex-wrap gap-3 mb-5">
                <a href="#comunidade" class="btn btn-raizes">Entrar na conversa <i class="bi bi-arrow-right ms-2"></i></a>
                <a href="#desafio" class="btn btn-raizes-outline">Fazer o desafio</a>
              </div>
              <div class="row g-0 stats">
                <div class="col-4 stat"><strong data-count="10639">0</strong><span>Lei nº 10.639/2003</span></div>
                <div class="col-4 stat"><strong data-count="5">0</strong><span>categorias de cor ou raça (IBGE)</span></div>
                <div class="col-4 stat"><strong data-count="3">0</strong><span>séculos de escravidão no Brasil</span></div>
              </div>
            </div>
          </div>

          <!-- Em debate: preenchido pelo jv/script.js com os tópicos do fórum -->
          <aside class="col-lg-4">
            <div class="debate-col reveal">
              <h2>Em debate</h2>
              <div id="emDebate"></div>
              <a href="#comunidade" class="link-more d-inline-block mt-4">Todas as discussões <i class="bi bi-arrow-right"></i></a>
            </div>
          </aside>
        </div>
      </div>
    </section>

    <!-- Faixa com os povos -->
    <div class="marquee" aria-label="Povos que formam o Brasil">
      <div class="marquee-track">
        <span>Povos indígenas</span><span class="star">✷</span><span>Afro-brasileiros</span><span class="star">✷</span><span>Quilombolas</span><span class="star">✷</span><span>Asiático-brasileiros</span><span class="star">✷</span><span>Povos ciganos</span><span class="star">✷</span><span>Ribeirinhos</span><span class="star">✷</span><span>Imigrantes e refugiados</span><span class="star">✷</span><span>Povos de terreiro</span><span class="star">✷</span>
        <span aria-hidden="true">Povos indígenas</span><span class="star" aria-hidden="true">✷</span><span aria-hidden="true">Afro-brasileiros</span><span class="star" aria-hidden="true">✷</span><span aria-hidden="true">Quilombolas</span><span class="star" aria-hidden="true">✷</span><span aria-hidden="true">Asiático-brasileiros</span><span class="star" aria-hidden="true">✷</span><span aria-hidden="true">Povos ciganos</span><span class="star" aria-hidden="true">✷</span><span aria-hidden="true">Ribeirinhos</span><span class="star" aria-hidden="true">✷</span><span aria-hidden="true">Imigrantes e refugiados</span><span class="star" aria-hidden="true">✷</span><span aria-hidden="true">Povos de terreiro</span><span class="star" aria-hidden="true">✷</span>
      </div>
    </div>

    <!-- Como funciona -->
    <section class="section" id="sobre">
      <div class="container">
        <div class="section-head reveal">
          <h2 class="section-title">Como funciona</h2>
          <p class="text-soft mb-0" style="max-width: 32rem">Fórum, artigos, notícias e desafios num só lugar, para apoiar a aplicação da Lei 10.639/2003 na escola.</p>
        </div>
        <div class="row g-0 pillars reveal">
          <div class="col-md-6 col-lg-3"><div class="pillar">
            <span class="pillar-num">01</span><span class="kicker">Comunidade</span>
            <h3>Fórum de discussão</h3>
            <p>Publique opiniões, tire dúvidas e participe de debates mediados entre estudantes e professores.</p>
          </div></div>
          <div class="col-md-6 col-lg-3"><div class="pillar">
            <span class="pillar-num">02</span><span class="kicker">Leitura</span>
            <h3>Artigos educativos</h3>
            <p>Textos sobre história, cultura afro-brasileira e indígena e educação antirracista.</p>
          </div></div>
          <div class="col-md-6 col-lg-3"><div class="pillar">
            <span class="pillar-num">03</span><span class="kicker">Atualidade</span>
            <h3>Notícias</h3>
            <p>Acontecimentos, dados e iniciativas sobre diversidade no Brasil e no mundo.</p>
          </div></div>
          <div class="col-md-6 col-lg-3"><div class="pillar">
            <span class="pillar-num">04</span><span class="kicker">Gamificação</span>
            <h3>Pontos e desafios</h3>
            <p>Ganhe pontos ao participar, ler artigos e responder ao desafio do dia.</p>
          </div></div>
        </div>
      </div>
    </section>

    <!-- Citação -->
    <section class="section quote-section">
      <div class="container">
        <div class="row justify-content-center text-center">
          <div class="col-lg-10 reveal">
            <p class="quote-block mb-4">A escola não é um espaço neutro: ela reproduz ou combate os preconceitos presentes na sociedade.</p>
            <p class="kicker text-maroon mb-0">— Inspirado em Nilma Lino Gomes (2017)</p>
          </div>
        </div>
      </div>
    </section>

    <!-- ===================== ARTIGOS ===================== -->
    <section class="section" id="artigos">
      <div class="container">
        <div class="section-head reveal">
          <h2 class="section-title">Artigos</h2>
          <div class="d-flex flex-wrap gap-2" id="filtroArtigos">
            <button class="btn-chip active" data-filter="todos">Todos</button>
            <button class="btn-chip" data-filter="historia">História</button>
            <button class="btn-chip" data-filter="indigena">Povos indígenas</button>
            <button class="btn-chip" data-filter="educacao">Educação antirracista</button>
            <button class="btn-chip" data-filter="imigracao">Imigração</button>
          </div>
        </div>

        <div class="row g-4" id="listaArtigos">
          <!-- Artigo 1 -->
          <div class="col-md-6 col-lg-4 artigo reveal" data-cat="historia">
            <article class="card-raizes">
              <img src="<?= asset('assets/artigo-historia.jpg') ?>" class="card-img-top" alt="Mãos de diferentes tons de pele tecendo juntas um tecido colorido" loading="lazy" width="1024" height="768">
              <div class="card-body-rz">
                <span class="badge-cat badge-historia">História</span>
                <h3>O contexto histórico da formação étnico-racial brasileira</h3>
                <p>Da colonização à abolição sem reparação: como o passado explica as desigualdades de hoje.</p>
                <button class="btn-read" data-artigo="artigo-1">Ler artigo <i class="bi bi-arrow-right"></i></button>
              </div>
            </article>
          </div>
          <!-- Artigo 2 -->
          <div class="col-md-6 col-lg-4 artigo reveal" data-cat="indigena">
            <article class="card-raizes">
              <img src="<?= asset('assets/artigo-indigena.jpg') ?>" class="card-img-top" alt="Menina indígena com pintura corporal lendo um livro sob uma árvore, à beira de um rio" loading="lazy" width="1024" height="768">
              <div class="card-body-rz">
                <span class="badge-cat badge-indigena">Povos indígenas</span>
                <h3>Saberes indígenas e africanos que o Brasil precisa conhecer</h3>
                <p>Muito além da arte: conhecimentos científicos, ecológicos e filosóficos historicamente invisibilizados.</p>
                <button class="btn-read" data-artigo="artigo-2">Ler artigo <i class="bi bi-arrow-right"></i></button>
              </div>
            </article>
          </div>
          <!-- Artigo 3 -->
          <div class="col-md-6 col-lg-4 artigo reveal" data-cat="educacao">
            <article class="card-raizes">
              <img src="<?= asset('assets/artigo-escola.jpg') ?>" class="card-img-top" alt="Professora negra apontando para o mapa da África e da América do Sul enquanto alunos levantam a mão" loading="lazy" width="1024" height="768">
              <div class="card-body-rz">
                <span class="badge-cat badge-educacao">Educação antirracista</span>
                <h3>Lei 10.639/2003: o que diz e por que importa na sua escola</h3>
                <p>A lei tornou obrigatório o ensino de história e cultura afro-brasileira. Mas ela já é realidade?</p>
                <button class="btn-read" data-artigo="artigo-3">Ler artigo <i class="bi bi-arrow-right"></i></button>
              </div>
            </article>
          </div>
          <!-- Artigo 4 -->
          <div class="col-md-6 col-lg-4 artigo reveal" data-cat="historia">
            <article class="card-raizes">
              <div class="card-pattern"><i class="bi bi-people" aria-hidden="true"></i></div>
              <div class="card-body-rz">
                <span class="badge-cat badge-historia">História</span>
                <h3>O mito da “democracia racial”</h3>
                <p>Por que a ideia de convivência harmoniosa entre as raças esconde o preconceito no Brasil.</p>
                <button class="btn-read" data-artigo="artigo-4">Ler artigo <i class="bi bi-arrow-right"></i></button>
              </div>
            </article>
          </div>
          <!-- Artigo 5 -->
          <div class="col-md-6 col-lg-4 artigo reveal" data-cat="imigracao">
            <article class="card-raizes">
              <div class="card-pattern"><i class="bi bi-globe-americas" aria-hidden="true"></i></div>
              <div class="card-body-rz">
                <span class="badge-cat badge-imigracao">Imigração</span>
                <h3>Xenofobia: o debate também é sobre imigrantes</h3>
                <p>Venezuelanos, haitianos, bolivianos, árabes, chineses e povos ciganos também enfrentam preconceito.</p>
                <button class="btn-read" data-artigo="artigo-5">Ler artigo <i class="bi bi-arrow-right"></i></button>
              </div>
            </article>
          </div>
          <!-- Artigo 6 -->
          <div class="col-md-6 col-lg-4 artigo reveal" data-cat="educacao">
            <article class="card-raizes">
              <div class="card-pattern"><i class="bi bi-lightbulb" aria-hidden="true"></i></div>
              <div class="card-body-rz">
                <span class="badge-cat badge-educacao">Educação antirracista</span>
                <h3>Pensamento crítico contra estereótipos</h3>
                <p>Como identificar discriminações no dia a dia e transformar o debate em mudança de atitude.</p>
                <button class="btn-read" data-artigo="artigo-6">Ler artigo <i class="bi bi-arrow-right"></i></button>
              </div>
            </article>
          </div>
        </div>

        <!-- Conteúdo completo dos artigos (exibido no modal) -->
        <div class="d-none">
          <div id="artigo-1" data-titulo="O contexto histórico da formação étnico-racial brasileira" data-img="<?= asset('assets/artigo-historia.jpg') ?>" data-cat="História">
            <p>O processo de colonização iniciado pelos portugueses no século XVI foi determinante para a construção das desigualdades e da hierarquização racial no país. A exploração inicial pautou-se na invasão territorial, no espoliamento cultural e na violência contra os povos originários.</p>
            <p>Com a resistência e o genocídio das populações indígenas, a empresa colonial introduziu o tráfico transatlântico de africanos escravizados. Durante mais de três séculos, a população africana e seus descendentes foram desprovidos de direitos básicos, humanidade e identidade (MUNANGA, 2008).</p>
            <p>Com o fim oficial da escravidão em 1888, a abolição ocorreu sem políticas de reparação, integração social ou acesso à terra e à educação. Dados do IBGE (2022) mostram que as disparidades raciais na educação, na renda e no mercado de trabalho são desdobramentos diretos desse processo histórico.</p>
            <p class="fw-semibold mb-0">Para debater: que marcas desse passado você percebe na sua cidade ou escola?</p>
          </div>
          <div id="artigo-2" data-titulo="Saberes indígenas e africanos que o Brasil precisa conhecer" data-img="<?= asset('assets/artigo-indigena.jpg') ?>" data-cat="Povos indígenas">
            <p>Segundo a UNESCO, a diversidade étnico-racial abrange diferentes sistemas de saberes, cosmovisões e práticas sociais que moldam as relações dos grupos com o território, a saúde, o ensino e o trabalho.</p>
            <p>As matrizes africanas e indígenas contribuíram não apenas artisticamente, mas com conhecimentos científicos, ecológicos e filosóficos, que permanecem nas comunidades tradicionais e foram historicamente invisibilizados.</p>
            <p>Para o IBGE, no contexto da população indígena, “etnia” é uma comunidade definida por afinidades linguísticas, culturais e sociais, correspondendo a um povo com identidade cultural própria.</p>
            <p class="fw-semibold mb-0">Para debater: quais saberes indígenas ou africanos estão presentes no seu dia a dia sem que você perceba?</p>
          </div>
          <div id="artigo-3" data-titulo="Lei 10.639/2003: o que diz e por que importa na sua escola" data-img="<?= asset('assets/artigo-escola.jpg') ?>" data-cat="Educação antirracista">
            <p>A Lei nº 10.639/2003 torna obrigatório o ensino de história e cultura afro-brasileira nas escolas. Embora prevista na legislação, sua implementação prática ainda enfrenta limitações, como a escassez de materiais acessíveis e de espaços digitais pensados para esse fim.</p>
            <p>Estudos no campo da educação antirracista demonstram que o conhecimento da história e da cultura afro-brasileira e indígena contribui para a redução de práticas discriminatórias (MUNANGA, 2008).</p>
            <p>Iniciativas como a Escola Maria Felipa, o Projeto ANANSI (CEERT) e os cursos da plataforma Escolas Conectadas são avanços importantes, mas se voltam principalmente a professores e adultos.</p>
            <p class="fw-semibold mb-0">Para debater: como a sua escola trabalha esse tema ao longo do ano?</p>
          </div>
          <div id="artigo-4" data-titulo="O mito da “democracia racial”" data-cat="História">
            <p>Após a abolição, o Estado brasileiro incentivou teorias de hierarquização racial, como a ideologia do branqueamento, promovendo a imigração europeia para diluir a presença negra na população.</p>
            <p>Depois, difundiu-se a tese da “democracia racial”: a falsa ideia de uma convivência harmoniosa entre as raças, que mascara o preconceito e deslegitima as lutas do movimento negro. É a crença de que a população negra teria as mesmas oportunidades de ascensão que os demais.</p>
            <p>Reconhecer casos de racismo e de injúria racial é o primeiro passo para a conscientização e evita o apagamento da violência sofrida pelos povos indígenas e africanos.</p>
            <p class="fw-semibold mb-0">Para debater: você já ouviu frases como “no Brasil não existe racismo”? Como responder a elas?</p>
          </div>
          <div id="artigo-5" data-titulo="Xenofobia: o debate também é sobre imigrantes" data-cat="Imigração">
            <p>O debate étnico-racial não se restringe aos povos indígenas e aos descendentes de africanos. Ele também envolve etnias tratadas com indiferença no Brasil, como venezuelanos, haitianos, bolivianos, árabes e chineses — muitas vezes atacados nas redes sociais.</p>
            <p>Ainda persistem preconceitos contra os povos ciganos, injustamente associados à vadiagem. Fora do país, a islamofobia na França e atitudes desrespeitosas contra brasileiros, como em jogos de futebol, mostram que o problema é global.</p>
            <p>Mais do que apontar atitudes erradas, é preciso compreender o que leva as pessoas a agirem assim, para que o resultado do debate seja a reflexão e a mudança, e não o ódio.</p>
            <p class="fw-semibold mb-0">Para debater: como acolher colegas imigrantes na sua escola?</p>
          </div>
          <div id="artigo-6" data-titulo="Pensamento crítico contra estereótipos" data-cat="Educação antirracista">
            <p>Estereótipo é uma ideia generalizada e simplificada atribuída a determinado grupo de pessoas. Ele aparece em piadas, apelidos, filmes, propagandas e até em materiais didáticos.</p>
            <p>O pensamento crítico — a capacidade de analisar informações, questionar ideias e formar opiniões de maneira reflexiva — é a principal ferramenta para identificar discriminações no cotidiano, em casa, na rua e na escola.</p>
            <p>A desinformação e os conteúdos preconceituosos nas redes ajudam a manter estereótipos. Checar fontes e ouvir quem vive a experiência faz toda a diferença.</p>
            <p class="fw-semibold mb-0">Para debater: qual estereótipo você já percebeu na TV ou nas redes sociais esta semana?</p>
          </div>
        </div>
      </div>
    </section>

    <!-- ===================== NOTÍCIAS ===================== -->
    <section class="section bg-sand" id="noticias">
      <div class="container">
        <div class="section-head reveal">
          <h2 class="section-title">Notícias</h2>
          <a href="#noticias" class="link-more">Ver todas <i class="bi bi-arrow-right"></i></a>
        </div>
        <div class="row g-4 g-lg-5">
          <div class="col-lg-6 reveal">
            <a href="#comunidade" class="news-featured">
              <img src="<?= asset('assets/artigo-historia.jpg') ?>" alt="" loading="lazy" width="1024" height="768">
              <div class="overlay"></div>
              <div class="content">
                <span class="badge-cat badge-destaque align-self-start mb-3">Destaque</span>
                <h3>Plataforma Raízes é apresentada a estudantes do IF Baiano – Campus Guanambi</h3>
                <p class="mb-0 opacity-75">Projeto Integrador propõe fórum, artigos e gamificação para levar o debate étnico-racial ao dia a dia da escola.</p>
              </div>
            </a>
          </div>
          <div class="col-lg-6 reveal">
            <div class="news-item">
              <div class="news-date"><strong>10</strong><span>nov</span></div>
              <div>
                <span class="badge-cat badge-historia">Brasil</span>
                <h3 class="mt-2"><a href="#">Novembro Negro: escolas promovem semana de debates sobre consciência negra</a></h3>
                <p class="text-soft small mb-0">Atividades valorizam a história e a cultura afro-brasileira em diversas redes de ensino.</p>
              </div>
            </div>
            <div class="news-item">
              <div class="news-date"><strong>04</strong><span>nov</span></div>
              <div>
                <span class="badge-cat badge-educacao">Educação</span>
                <h3 class="mt-2"><a href="#">Escola Maria Felipa é referência em educação afro-brasileira</a></h3>
                <p class="text-soft small mb-0">Idealizada pela professora Bárbara Carine, é a primeira escola afro-brasileira registrada pelo MEC.</p>
              </div>
            </div>
            <div class="news-item">
              <div class="news-date"><strong>28</strong><span>out</span></div>
              <div>
                <span class="badge-cat badge-indigena">Dados</span>
                <h3 class="mt-2"><a href="#">IBGE: desigualdades raciais persistem em educação, renda e trabalho</a></h3>
                <p class="text-soft small mb-0">Indicadores reforçam a necessidade de ações de conscientização e inclusão social.</p>
              </div>
            </div>
            <div class="news-item">
              <div class="news-date"><strong>15</strong><span>out</span></div>
              <div>
                <span class="badge-cat badge-imigracao">Mundo</span>
                <h3 class="mt-2"><a href="#">Imigrantes venezuelanos relatam ataques xenófobos nas redes</a></h3>
                <p class="text-soft small mb-0">Especialistas defendem educação digital para combater o discurso de ódio.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- ===================== COMUNIDADE ===================== -->
    <section class="section" id="comunidade">
      <div class="container">
        <div class="section-head reveal">
          <div>
            <span class="kicker d-block mb-2">Comunidade</span>
            <h2 class="section-title">Discussões</h2>
          </div>
          <button class="btn btn-raizes" data-bs-toggle="modal" data-bs-target="#modalTopico"><i class="bi bi-plus-lg me-2"></i>Novo tópico</button>
        </div>

        <div class="row g-4">
          <!-- Lista de tópicos -->
          <div class="col-lg-8 reveal">
            <div class="forum-card">
              <div class="forum-card-head p-3 p-md-4 d-flex flex-column flex-md-row gap-3">
                <div class="input-group">
                  <span class="input-group-text border-end-0"><i class="bi bi-search"></i></span>
                  <input type="search" class="form-control border-start-0" id="buscaTopico" placeholder="Buscar discussões..." aria-label="Buscar discussões">
                </div>
                <select class="form-select" id="filtroTopico" style="max-width: 240px" aria-label="Filtrar por categoria">
                  <option value="todos">Todas as categorias</option>
                  <option value="historia">História</option>
                  <option value="indigena">Povos indígenas</option>
                  <option value="educacao">Educação antirracista</option>
                  <option value="imigracao">Imigração</option>
                </select>
              </div>
              <div id="listaTopicos"><!-- preenchido pelo jv/script.js --></div>
              <p class="text-center text-soft p-4 mb-0 d-none" id="semTopicos">Nenhuma discussão encontrada.</p>
            </div>
          </div>

          <!-- Barra lateral -->
          <div class="col-lg-4">
            <div class="forum-card p-4 mb-4 reveal">
              <h3 class="box-title mb-3">Ranking da semana</h3>
              <div id="ranking"><!-- preenchido pelo jv/script.js --></div>
            </div>
            <div class="forum-card p-4 reveal">
              <h3 class="box-title mb-3">Combinado da comunidade</h3>
              <ul class="list-unstyled rules text-soft mb-0 d-grid gap-2">
                <li>Respeite todas as pessoas e identidades.</li>
                <li>Discorde de ideias, nunca de pessoas.</li>
                <li>Cite fontes confiáveis ao compartilhar dados.</li>
                <li>Discurso de ódio é removido pela moderação.</li>
                <li>O objetivo é refletir e aprender, não punir.</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- ===================== DESAFIO ===================== -->
    <section class="section pt-0" id="desafio">
      <div class="container">
        <div class="quiz-box reveal">
          <div class="row g-4 g-lg-5 align-items-center">
            <div class="col-lg-5">
              <span class="kicker kicker-gold mb-3">Desafio · 4 perguntas</span>
              <h2 class="mb-3">Quanto você sabe sobre a história étnico-racial do Brasil?</h2>
              <p class="opacity-75 mb-0">Leis, datas e conceitos. Cada resposta certa vale <strong class="text-gold">10 pontos</strong> no ranking.</p>
            </div>
            <div class="col-lg-7">
              <div class="quiz-panel">
                <div class="d-flex justify-content-between small opacity-75 mb-2">
                  <span id="quizContador">Pergunta 1 de 4</span><span><span class="js-meus-pontos">0</span> pts</span>
                </div>
                <div class="progress progress-raizes mb-4"><div class="progress-bar" id="quizBarra" style="width: 25%"></div></div>
                <h3 class="mb-4" id="quizPergunta">Carregando...</h3>
                <div id="quizOpcoes"></div>
                <div class="d-flex justify-content-between align-items-center gap-3 mt-3">
                  <p class="small mb-0 opacity-75" id="quizFeedback"></p>
                  <button class="btn btn-raizes-gold d-none" id="quizProxima">Próxima <i class="bi bi-arrow-right"></i></button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- ===================== GLOSSÁRIO ===================== -->
    <section class="section bg-paper" id="glossario" style="border-top: 4px solid var(--rz-ink)">
      <div class="container">
        <div class="row g-4 g-lg-5">
          <div class="col-lg-4 reveal">
            <span class="kicker d-block mb-2">Glossário</span>
            <h2 class="section-title mb-3">Palavras para entender o debate</h2>
            <p class="text-soft">Conceitos essenciais, baseados em definições do IBGE e da UNESCO.</p>
          </div>
          <div class="col-lg-8 reveal">
            <div class="accordion accordion-raizes" id="accordionGlossario">
              <div class="accordion-item">
                <h3 class="accordion-header"><button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#g1">Etnia</button></h3>
                <div id="g1" class="accordion-collapse collapse show" data-bs-parent="#accordionGlossario"><div class="accordion-body">Grupo de pessoas que compartilha elementos de identificação, como características culturais, sociais, históricas e linguísticas.</div></div>
              </div>
              <div class="accordion-item">
                <h3 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#g2">Raça</button></h3>
                <div id="g2" class="accordion-collapse collapse" data-bs-parent="#accordionGlossario"><div class="accordion-body">Categoria social e histórica usada para classificar pessoas por características percebidas. O IBGE usa a autodeclaração com as categorias branca, preta, parda, amarela e indígena.</div></div>
              </div>
              <div class="accordion-item">
                <h3 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#g3">Diversidade étnico-racial</button></h3>
                <div id="g3" class="accordion-collapse collapse" data-bs-parent="#accordionGlossario"><div class="accordion-body">Existência e convivência de diferentes grupos étnicos e raciais em uma sociedade, considerando suas identidades, histórias, culturas e formas de expressão.</div></div>
              </div>
              <div class="accordion-item">
                <h3 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#g4">Racismo estrutural</button></h3>
                <div id="g4" class="accordion-collapse collapse" data-bs-parent="#accordionGlossario"><div class="accordion-body">Discriminação presente nas estruturas e relações sociais, que contribui para formar e manter desigualdades.</div></div>
              </div>
              <div class="accordion-item">
                <h3 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#g5">Educação antirracista</button></h3>
                <div id="g5" class="accordion-collapse collapse" data-bs-parent="#accordionGlossario"><div class="accordion-body">Prática educacional que busca combater o racismo e valorizar os diferentes grupos étnico-raciais.</div></div>
              </div>
              <div class="accordion-item">
                <h3 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#g6">Estereótipo</button></h3>
                <div id="g6" class="accordion-collapse collapse" data-bs-parent="#accordionGlossario"><div class="accordion-body">Ideia generalizada e simplificada atribuída a determinado grupo de pessoas.</div></div>
              </div>
              <div class="accordion-item">
                <h3 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#g7">Pensamento crítico</button></h3>
                <div id="g7" class="accordion-collapse collapse" data-bs-parent="#accordionGlossario"><div class="accordion-body">Capacidade de analisar informações, questionar ideias e formar opiniões de maneira reflexiva.</div></div>
              </div>
              <div class="accordion-item">
                <h3 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#g8">Gamificação</button></h3>
                <div id="g8" class="accordion-collapse collapse" data-bs-parent="#accordionGlossario"><div class="accordion-body">Uso de elementos de jogos (pontos, rankings, desafios) em atividades que não são jogos, para estimular o engajamento.</div></div>
              </div>
              <div class="accordion-item">
                <h3 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#g9">TICs</button></h3>
                <div id="g9" class="accordion-collapse collapse" data-bs-parent="#accordionGlossario"><div class="accordion-body">Tecnologias da Informação e Comunicação: ferramentas digitais para produzir, armazenar e compartilhar informações.</div></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  <!-- ===================== RODAPÉ ===================== -->
  <div class="stripe-band"></div>
  <footer class="footer">
    <div class="container">
      <div class="row g-4 g-lg-5">
        <div class="col-lg-4">
          <div class="brand mb-3">RAÍZES</div>
          <p class="mb-0">Um espaço para conversar, ler e aprender sobre a diversidade étnico-racial do Brasil — com respeito e escuta. Projeto Integrador I do Curso Técnico em Informática para Internet — IF Baiano, Campus Guanambi.</p>
        </div>
        <div class="col-6 col-lg-2">
          <h5>Explore</h5>
          <ul class="list-unstyled d-grid gap-2">
            <li><a href="#artigos">Artigos</a></li>
            <li><a href="#noticias">Notícias</a></li>
            <li><a href="#comunidade">Comunidade</a></li>
            <li><a href="#desafio">Desafio</a></li>
            <li><a href="#glossario">Glossário</a></li>
          </ul>
        </div>
        <div class="col-6 col-lg-3">
          <h5>Equipe</h5>
          <ul class="list-unstyled d-grid gap-2">
            <li>Artur Rebouças Lima Costa</li>
            <li>Enzo Vinícius da Cruz Chaves</li>
            <li>Gustavo Ribeiro Neves</li>
            <li>Jan Pedro Souza Caires</li>
          </ul>
          <h5 class="mt-4">Orientação</h5>
          <p class="mb-0">Prof. Cleiton de Miranda Brito · Guanambi – BA</p>
        </div>
        <div class="col-lg-3">
          <h5>Combinado da comunidade</h5>
          <p class="mb-0">Discordar faz parte; desrespeitar, não. Racismo é crime no Brasil (Lei 7.716/1989). Conteúdos discriminatórios serão removidos.</p>
        </div>
      </div>
      <hr class="my-4">
      <p class="small mb-0 text-center">© 2026 Raízes · Feito com respeito à diversidade.</p>
    </div>
  </footer>

  <!-- Leitura de artigo -->
  <div class="modal fade" id="modalArtigo" tabindex="-1" aria-labelledby="modalArtigoTitulo" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header border-0 pb-0">
          <span class="badge-cat badge-historia" id="modalArtigoCat"></span>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
        </div>
        <div class="modal-body px-4 pb-4">
          <h2 class="h3 mb-3" id="modalArtigoTitulo"></h2>
          <img src="" alt="" class="modal-article-img mb-4 d-none" id="modalArtigoImg">
          <div class="text-soft" id="modalArtigoTexto"></div>
        </div>
        <div class="modal-footer border-0">
          <a href="#comunidade" class="btn btn-raizes" data-bs-dismiss="modal">Debater no fórum</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Novo tópico -->
  <div class="modal fade" id="modalTopico" tabindex="-1" aria-labelledby="modalTopicoTitulo" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <form class="modal-content" id="formTopico" novalidate>
        <div class="modal-header border-0">
          <h2 class="modal-title h3" id="modalTopicoTitulo">Nova discussão</h2>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="topicoNome" class="form-label fw-semibold">Seu nome</label>
            <input type="text" class="form-control" id="topicoNome" required maxlength="40" placeholder="Ex.: Ana Souza">
            <div class="invalid-feedback">Informe seu nome.</div>
          </div>
          <div class="mb-3">
            <label for="topicoTitulo" class="form-label fw-semibold">Título</label>
            <input type="text" class="form-control" id="topicoTitulo" required maxlength="120" placeholder="Sobre o que você quer conversar?">
            <div class="invalid-feedback">Escreva um título.</div>
          </div>
          <div class="mb-3">
            <label for="topicoCategoria" class="form-label fw-semibold">Categoria</label>
            <select class="form-select" id="topicoCategoria">
              <option value="historia">História</option>
              <option value="indigena">Povos indígenas</option>
              <option value="educacao" selected>Educação antirracista</option>
              <option value="imigracao">Imigração</option>
            </select>
          </div>
          <div>
            <label for="topicoTexto" class="form-label fw-semibold">Mensagem</label>
            <textarea class="form-control" id="topicoTexto" rows="4" required maxlength="600" placeholder="Compartilhe sua ideia com respeito."></textarea>
            <div class="invalid-feedback">Escreva sua mensagem.</div>
          </div>
        </div>
        <div class="modal-footer border-0">
          <button type="button" class="btn btn-raizes-outline" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-raizes">Publicar (+20 pts)</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Entrar -->
  <div class="modal fade" id="modalEntrar" tabindex="-1" aria-labelledby="modalEntrarTitulo" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <form class="modal-content" id="formEntrar">
        <div class="modal-header border-0">
          <h2 class="modal-title h3" id="modalEntrarTitulo">Entrar no Raízes</h2>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="entrarEmail" class="form-label fw-semibold">E-mail</label>
            <input type="email" class="form-control" id="entrarEmail" placeholder="voce@escola.edu.br" required>
          </div>
          <div class="mb-3">
            <label for="entrarSenha" class="form-label fw-semibold">Senha</label>
            <input type="password" class="form-control" id="entrarSenha" required>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="entrarProfessor">
            <label class="form-check-label" for="entrarProfessor">Sou professor(a)</label>
          </div>
        </div>
        <div class="modal-footer border-0">
          <button type="submit" class="btn btn-raizes w-100">Entrar</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Aviso -->
  <div class="toast-container position-fixed bottom-0 end-0 p-3">
    <div class="toast toast-raizes border-0" id="aviso" role="status" aria-live="polite">
      <div class="d-flex">
        <div class="toast-body" id="avisoTexto"></div>
        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Fechar"></button>
      </div>
    </div>
  </div>

  <!-- Scripts -->
