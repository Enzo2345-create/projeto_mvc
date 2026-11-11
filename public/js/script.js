/* =========================================================
   RAÍZES — Interações da página
   (Fórum, pontos, artigos, quiz e animações)
   Os dados ficam salvos no navegador (localStorage).
   Para um fórum real, troque o localStorage por chamadas
   ao back-end (PHP/Python + MySQL).
   ========================================================= */
(function () {
  "use strict";

  const CATEGORIAS = {
    historia: "História",
    indigena: "Povos indígenas",
    educacao: "Educação antirracista",
    imigracao: "Imigração",
  };

  /* ---------- Armazenamento ---------- */
  const store = {
    get(chave, padrao) {
      try { const v = localStorage.getItem("raizes_" + chave); return v ? JSON.parse(v) : padrao; }
      catch (e) { return padrao; }
    },
    set(chave, valor) {
      try { localStorage.setItem("raizes_" + chave, JSON.stringify(valor)); } catch (e) { /* ignorado */ }
    },
  };

  /* ---------- Utilidades ---------- */
  const $ = (sel, ctx = document) => ctx.querySelector(sel);
  const $$ = (sel, ctx = document) => Array.from(ctx.querySelectorAll(sel));

  function escapeHTML(texto) {
    const div = document.createElement("div");
    div.textContent = texto;
    return div.innerHTML;
  }

  function iniciais(nome) {
    return nome.replace(/[^\p{L}\s]/gu, "").trim().split(/\s+/).filter(Boolean).slice(0, 2).map((p) => p[0]).join("").toUpperCase() || "?";
  }

  function aviso(mensagem) {
    $("#avisoTexto").textContent = mensagem;
    bootstrap.Toast.getOrCreateInstance($("#aviso"), { delay: 2600 }).show();
  }

  /* ---------- Pontos (gamificação) ---------- */
  let meusPontos = store.get("pontos", 0);
  function atualizarPontos(ganho, motivo) {
    if (ganho) {
      meusPontos += ganho;
      store.set("pontos", meusPontos);
      aviso(`+${ganho} pontos! ${motivo || ""}`.trim());
    }
    $$(".js-meus-pontos").forEach((el) => (el.textContent = meusPontos));
    renderRanking();
  }

  /* ---------- Fórum ---------- */
  const TOPICOS_INICIAIS = [
    { id: 1, autor: "Marina Santos", titulo: "Como responder quando alguém diz que “racismo é mimimi”?", texto: "Ouvi isso no grupo da turma e fiquei sem saber o que dizer. Quais argumentos e dados vocês usariam?", cat: "educacao", respostas: 14, curtidas: 32, quando: "há 2 horas" },
    { id: 2, autor: "Prof. Carlos Lima", titulo: "Sugestões de livros de autores negros para o Ensino Médio", texto: "Estou montando uma lista para o clube de leitura. Quem tiver indicações, compartilhe aqui!", cat: "educacao", respostas: 21, curtidas: 45, quando: "há 5 horas" },
    { id: 3, autor: "Yara Pataxó", titulo: "Povos indígenas não são “coisa do passado”", texto: "Quero conversar sobre como os livros didáticos ainda mostram os indígenas só no período colonial.", cat: "indigena", respostas: 9, curtidas: 27, quando: "ontem" },
    { id: 4, autor: "Lucas Oliveira", titulo: "O que a abolição de 1888 deixou de fazer?", texto: "Estudando para a prova percebi que não houve nenhuma reparação. Que consequências isso tem hoje?", cat: "historia", respostas: 7, curtidas: 18, quando: "há 2 dias" },
    { id: 5, autor: "Daniela Rojas", titulo: "Sou venezuelana e quero contar minha experiência na escola", texto: "Cheguei ao Brasil há dois anos. Algumas coisas foram difíceis, outras muito acolhedoras.", cat: "imigracao", respostas: 12, curtidas: 39, quando: "há 3 dias" },
  ];

  let topicos = store.get("topicos", TOPICOS_INICIAIS);
  let curtidos = store.get("curtidos", []);

  function renderTopicos() {
    const busca = $("#buscaTopico").value.trim().toLowerCase();
    const filtro = $("#filtroTopico").value;
    const lista = topicos.filter((t) =>
      (filtro === "todos" || t.cat === filtro) &&
      (t.titulo.toLowerCase().includes(busca) || t.texto.toLowerCase().includes(busca))
    );

    $("#listaTopicos").innerHTML = lista.map((t, i) => {
      const curtido = curtidos.includes(t.id);
      return `
        <div class="topic">
          <div class="avatar av-${(i % 4) + 1}" aria-hidden="true">${escapeHTML(iniciais(t.autor))}</div>
          <div class="flex-grow-1">
            <span class="badge-cat badge-${t.cat}">${CATEGORIAS[t.cat]}</span>
            <h4 class="mt-2">${escapeHTML(t.titulo)}</h4>
            <p class="text-soft small mb-2">${escapeHTML(t.texto)}</p>
            <div class="topic-meta d-flex flex-wrap gap-3 align-items-center">
              <span><i class="bi bi-person"></i> ${escapeHTML(t.autor)}</span>
              <span><i class="bi bi-clock"></i> ${escapeHTML(t.quando)}</span>
              <button class="btn-like ${curtido ? "liked" : ""}" data-curtir="${t.id}" aria-pressed="${curtido}">
                <i class="bi ${curtido ? "bi-heart-fill" : "bi-heart"}"></i> ${t.curtidas}
              </button>
            </div>
          </div>
          <div class="topic-stats d-none d-sm-block"><strong>${t.respostas}</strong>respostas</div>
        </div>`;
    }).join("");

    $("#semTopicos").classList.toggle("d-none", lista.length > 0);
    renderEmDebate();
  }

  /* ---------- Capa: "Em debate" (4 tópicos mais recentes) ---------- */
  function renderEmDebate() {
    $("#emDebate").innerHTML = topicos.slice(0, 4).map((t, i) => `
      <article class="debate-item">
        <span class="debate-num">${String(i + 1).padStart(2, "0")}</span>
        <div>
          <span class="badge-cat badge-${t.cat}">${CATEGORIAS[t.cat]}</span>
          <h3><a href="#comunidade">${escapeHTML(t.titulo)}</a></h3>
          <span class="debate-meta"><i class="bi bi-chat"></i> ${t.respostas} ${t.respostas === 1 ? "resposta" : "respostas"}</span>
        </div>
      </article>`).join("");
  }

  $("#listaTopicos").addEventListener("click", (e) => {
    const botao = e.target.closest("[data-curtir]");
    if (!botao) return;
    const id = Number(botao.dataset.curtir);
    const topico = topicos.find((t) => t.id === id);
    if (curtidos.includes(id)) {
      curtidos = curtidos.filter((c) => c !== id);
      topico.curtidas--;
    } else {
      curtidos.push(id);
      topico.curtidas++;
    }
    store.set("curtidos", curtidos);
    store.set("topicos", topicos);
    renderTopicos();
  });

  $("#buscaTopico").addEventListener("input", renderTopicos);
  $("#filtroTopico").addEventListener("change", renderTopicos);

  $("#formTopico").addEventListener("submit", (e) => {
    e.preventDefault();
    const form = e.currentTarget;
    if (!form.checkValidity()) { form.classList.add("was-validated"); return; }
    topicos.unshift({
      id: Date.now(),
      autor: $("#topicoNome").value.trim(),
      titulo: $("#topicoTitulo").value.trim(),
      texto: $("#topicoTexto").value.trim(),
      cat: $("#topicoCategoria").value,
      respostas: 0,
      curtidas: 0,
      quando: "agora",
    });
    store.set("topicos", topicos);
    store.set("nome", $("#topicoNome").value.trim());
    form.reset();
    form.classList.remove("was-validated");
    bootstrap.Modal.getInstance($("#modalTopico")).hide();
    $("#filtroTopico").value = "todos";
    $("#buscaTopico").value = "";
    renderTopicos();
    atualizarPontos(20, "Discussão publicada.");
  });

  $("#modalTopico").addEventListener("show.bs.modal", () => {
    const nome = store.get("nome", "");
    if (nome) $("#topicoNome").value = nome;
  });

  /* ---------- Ranking ---------- */
  function renderRanking() {
    const nome = store.get("nome", "");
    const pessoas = [
      { nome: "Marina Santos", pontos: 340 },
      { nome: "Yara Pataxó", pontos: 295 },
      { nome: "Prof. Carlos Lima", pontos: 260 },
      { nome: "Daniela Rojas", pontos: 180 },
      { nome: nome ? nome + " (você)" : "Você", pontos: meusPontos, eu: true },
    ].sort((a, b) => b.pontos - a.pontos);

    $("#ranking").innerHTML = pessoas.map((p, i) => `
      <div class="rank-item ${p.eu ? "fw-semibold" : ""}">
        <span class="rank-pos">${i + 1}</span>
        <div class="avatar av-${(i % 4) + 1}" style="flex-basis:36px;width:36px;height:36px;font-size:.8rem">${escapeHTML(iniciais(p.nome))}</div>
        <span class="flex-grow-1 small">${escapeHTML(p.nome)}</span>
        <span class="points-pill">${p.pontos}</span>
      </div>`).join("");
  }

  /* ---------- Artigos: filtro e leitura ---------- */
  $("#filtroArtigos").addEventListener("click", (e) => {
    const chip = e.target.closest("[data-filter]");
    if (!chip) return;
    $$("#filtroArtigos .btn-chip").forEach((b) => b.classList.toggle("active", b === chip));
    const filtro = chip.dataset.filter;
    $$("#listaArtigos .artigo").forEach((card) => {
      card.classList.toggle("d-none", filtro !== "todos" && card.dataset.cat !== filtro);
    });
  });

  const lidos = new Set(store.get("lidos", []));
  $$("[data-artigo]").forEach((botao) => {
    botao.addEventListener("click", () => {
      const fonte = document.getElementById(botao.dataset.artigo);
      $("#modalArtigoTitulo").textContent = fonte.dataset.titulo;
      $("#modalArtigoCat").textContent = fonte.dataset.cat;
      $("#modalArtigoTexto").innerHTML = fonte.innerHTML;
      const img = $("#modalArtigoImg");
      if (fonte.dataset.img) { img.src = fonte.dataset.img; img.alt = fonte.dataset.titulo; img.classList.remove("d-none"); }
      else { img.classList.add("d-none"); img.removeAttribute("src"); }
      bootstrap.Modal.getOrCreateInstance($("#modalArtigo")).show();
      if (!lidos.has(fonte.id)) {
        lidos.add(fonte.id);
        store.set("lidos", Array.from(lidos));
        setTimeout(() => atualizarPontos(5, "Artigo lido."), 400);
      }
    });
  });

  /* ---------- Desafio (quiz) ---------- */
  const PERGUNTAS = [
    { p: "Qual lei tornou obrigatório o ensino de história e cultura afro-brasileira nas escolas?", o: ["Lei nº 8.069/1990", "Lei nº 10.639/2003", "Lei nº 12.711/2012", "Lei nº 9.394/1996"], c: 1 },
    { p: "Em que ano ocorreu o fim oficial da escravidão no Brasil?", o: ["1822", "1889", "1888", "1850"], c: 2 },
    { p: "Quais são as categorias de cor ou raça usadas pelo IBGE?", o: ["Branca, negra e indígena", "Branca, preta, parda, amarela e indígena", "Clara, morena e escura", "Europeia, africana e asiática"], c: 1 },
    { p: "O que é o “mito da democracia racial”?", o: ["A ideia falsa de que no Brasil todas as raças convivem em harmonia e com as mesmas oportunidades", "Uma lei que garante igualdade nas eleições", "Um movimento de valorização da cultura indígena", "Uma teoria que comprova o fim do racismo"], c: 0 },
  ];
  let atual = 0;

  function renderPergunta() {
    const q = PERGUNTAS[atual];
    $("#quizContador").textContent = `Pergunta ${atual + 1} de ${PERGUNTAS.length}`;
    $("#quizBarra").style.width = `${((atual + 1) / PERGUNTAS.length) * 100}%`;
    $("#quizPergunta").textContent = q.p;
    $("#quizFeedback").textContent = "";
    $("#quizProxima").classList.add("d-none");
    $("#quizOpcoes").innerHTML = q.o.map((op, i) => `<button class="quiz-option" data-op="${i}">${escapeHTML(op)}</button>`).join("");
  }

  $("#quizOpcoes").addEventListener("click", (e) => {
    const botao = e.target.closest("[data-op]");
    if (!botao) return;
    const q = PERGUNTAS[atual];
    const escolha = Number(botao.dataset.op);
    $$("#quizOpcoes .quiz-option").forEach((b, i) => {
      b.disabled = true;
      if (i === q.c) b.classList.add("correct");
    });
    if (escolha === q.c) {
      $("#quizFeedback").textContent = "Resposta certa!";
      atualizarPontos(10, "Resposta certa.");
    } else {
      botao.classList.add("wrong");
      $("#quizFeedback").textContent = "Quase! Veja a resposta correta em verde.";
    }
    const botaoProxima = $("#quizProxima");
    botaoProxima.innerHTML = atual < PERGUNTAS.length - 1 ? 'Próxima <i class="bi bi-arrow-right"></i>' : 'Recomeçar <i class="bi bi-arrow-repeat"></i>';
    botaoProxima.classList.remove("d-none");
  });

  $("#quizProxima").addEventListener("click", () => {
    atual = (atual + 1) % PERGUNTAS.length;
    renderPergunta();
  });

  /* ---------- Entrar (demonstração) ---------- */
  /* ---------- Navbar ao rolar ---------- */
  const navbar = $("#navbar");
  const aoRolar = () => navbar.classList.toggle("scrolled", window.scrollY > 10);
  window.addEventListener("scroll", aoRolar, { passive: true });
  aoRolar();

  // Fecha o menu no celular ao clicar em um link
  $$("#menuPrincipal .nav-link").forEach((link) => {
    link.addEventListener("click", () => {
      const menu = bootstrap.Collapse.getInstance($("#menuPrincipal"));
      if (menu) menu.hide();
    });
  });

  /* ---------- Animações de entrada e contadores ---------- */
  const observer = new IntersectionObserver((entradas) => {
    entradas.forEach((entrada) => {
      if (!entrada.isIntersecting) return;
      entrada.target.classList.add("visible");
      observer.unobserve(entrada.target);
    });
  }, { threshold: 0.12 });
  $$(".reveal").forEach((el) => observer.observe(el));

  $$("[data-count]").forEach((el) => {
    const alvo = Number(el.dataset.count);
    const formatar = (n) => (alvo > 9999 ? n.toLocaleString("pt-BR").replace(/\./g, ".") : String(n));
    let inicio = null;
    const passo = (t) => {
      if (!inicio) inicio = t;
      const progresso = Math.min((t - inicio) / 1400, 1);
      el.textContent = formatar(Math.round(alvo * (1 - Math.pow(1 - progresso, 3))));
      if (progresso < 1) requestAnimationFrame(passo);
    };
    requestAnimationFrame(passo);
  });

  /* ---------- Início ---------- */
  renderTopicos();
  renderPergunta();
  atualizarPontos(0);
})();
