<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Gerador de Currículo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="styles.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" defer></script>
  <script src="script.js" defer></script>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-primary bg-transparent px-3 mb-4">
    <div class="container">
      <a class="navbar-brand btn btn-primary rounded-pill px-4 py-2 text-white" href="#">MeuCurrículo</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navMenu">
        <ul class="navbar-nav">
          <li class="nav-item"><a class="nav-link" href="#">Início</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Sobre</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Contato</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container">
    <div class="row gy-4">
  <div class="col-lg-7 form-column">
        <h1 class="mb-4">Gerador de Currículos</h1>
        <form action="generate.php" method="post" id="cvForm">
          <div class="card p-4 mb-3">
            <div class="mb-3">
              <label class="form-label">Foto</label>
              <input class="form-control" type="file" id="photoInput" accept="image/*">
              <label class="form-label">Nome completo</label>
              <input class="form-control" type="text" name="name" id="name">
            </div>
            <div class="mb-3">
              <label class="form-label">E-mail</label>
              <input class="form-control" type="email" name="email" id="email">
            </div>
            <div class="mb-3">
              <label class="form-label">Telefone</label>
              <input class="form-control" type="text" name="phone" id="phone">
            </div>
            <div class="mb-3">
              <label class="form-label">Endereço</label>
              <input class="form-control" type="text" name="address" id="address">
            </div>
            <div class="mb-3">
              <label class="form-label">Cargo desejado</label>
              <input class="form-control" type="text" name="objective_title" id="objective_title">
            </div>
            <div class="mb-3">
              <label class="form-label">Resumo profissional</label>
              <textarea class="form-control" name="objective" id="objective" rows="3"></textarea>
            </div>
            <div id="educationSection" class="mb-3">
              <label class="form-label">Formação acadêmica</label>
              <div class="items">
                <div class="educationItem item mb-3 p-3 border rounded">
                  <input class="form-control mb-2" type="text" name="education_course[]" placeholder="Curso">
                  <input class="form-control mb-2" type="text" name="education_institution[]" placeholder="Instituição">
                  <input class="form-control mb-2" type="text" name="education_period[]" placeholder="Período (Ex: 2018 - 2021)">
                  <div class="mt-2 text-end"><button type="button" class="btn btn-sm btn-outline-danger removeBtn">Remover</button></div>
                </div>
              </div>
              <button type="button" id="addEducation" class="btn btn-sm btn-outline-primary mt-2">Adicionar Formação</button>
            </div>
            <div id="experienceSection" class="mb-3">
                <label class="form-label">Experiência</label>
                <div class="items">
                  <div class="experienceItem item mb-3 p-3 border rounded">
                    <input class="form-control mb-2" type="text" name="exp_title[]" placeholder="Cargo">
                    <input class="form-control mb-2" type="text" name="exp_company[]" placeholder="Empresa">
                    <input class="form-control mb-2" type="text" name="exp_period[]" placeholder="Período (Ex: 2022 - Atual)">
                    <textarea class="form-control" name="exp_description[]" rows="2" placeholder="Descrição"></textarea>
                    <div class="mt-2 text-end"><button type="button" class="btn btn-sm btn-outline-danger removeBtn">Remover</button></div>
                  </div>
                </div>
                <button type="button" id="addExperience" class="btn btn-sm btn-outline-primary mt-2">Adicionar Experiência</button>
              </div>
            
              <div id="skillsSection" class="mb-3">
                <label class="form-label">Habilidades</label>
                <div class="items">
                  <div class="skillItem item mb-2">
                    <input class="form-control d-inline-block w-75 me-2" type="text" name="skills[]" placeholder="Ex: PHP">
                    <button type="button" class="btn btn-sm btn-outline-danger removeBtn">Remover</button>
                  </div>
                </div>
                <button type="button" id="addSkill" class="btn btn-sm btn-outline-primary mt-2">Adicionar Habilidade</button>
              </div>
            </div>

          <div class="d-flex gap-2 mt-2">
            <button type="submit" class="btn btn-primary">Gerar Currículo</button>
            <button type="reset" class="btn btn-outline-secondary">Limpar</button>
          </div>
        </form>
      </div>

  <div class="col-lg-5 preview-column">
        <div class="card p-4 preview-card" id="previewCard">
          <div class="d-flex align-items-center mb-3">
            <div class="avatar-placeholder me-3" id="previewAvatar"></div>
            <div>
              <h4 id="previewName">Nome Completo</h4>
              <div class="text-muted" id="previewObjectiveTitle">Cargo desejado</div>
            </div>
          </div>

          <h5 class="mt-3">Resumo</h5>
          <p id="previewObjective" class="text-muted small">Lorem ipsum exore st amet, consectetuer adipiscing elit, sed diam nonummy nibh</p>

          <h5 class="mt-3">Formação</h5>
          <div id="previewEducation" class="text-muted small mb-2">Nome da Instituição<br><small class="text-muted">Ano – Ano</small></div>

          <h5 class="mt-3">Experiência</h5>
          <div id="previewExperience" class="text-muted small mb-2">
            <strong>Cargo</strong><br>
            Nome da Empresa<br>
            <small class="text-muted">Ano – Ano</small>
          </div>

          <h5 class="mt-3">Habilidades</h5>
          <div id="previewSkills" class="d-flex flex-wrap gap-2">
            <span class="badge bg-light text-dark">Concaca</span>
            <span class="badge bg-light text-dark">degus</span>
            <span class="badge bg-light text-dark">coneste</span>
          </div>
        </div>
      </div>
    </div>
  </div>

  <template id="skillTpl">
    <div class="skillItem item">
      <input type="text" name="skills[]" placeholder="Ex: PHP, JavaScript">
      <button type="button" class="removeBtn">Remover</button>
    </div>
  </template>

  <template id="experienceTpl">
    <div class="experienceItem item mb-3 p-3 border rounded">
      <input class="form-control mb-2" type="text" name="exp_title[]" placeholder="Cargo">
      <input class="form-control mb-2" type="text" name="exp_company[]" placeholder="Empresa">
      <input class="form-control mb-2" type="text" name="exp_period[]" placeholder="Período (Ex: 2022 - Atual)">
      <textarea class="form-control" name="exp_description[]" rows="2" placeholder="Descrição"></textarea>
      <div class="mt-2 text-end"><button type="button" class="btn btn-sm btn-outline-danger removeBtn">Remover</button></div>
    </div>
  </template>

  <template id="educationTpl">
    <div class="educationItem item mb-3 p-3 border rounded">
      <input class="form-control mb-2" type="text" name="education_course[]" placeholder="Curso">
      <input class="form-control mb-2" type="text" name="education_institution[]" placeholder="Instituição">
      <input class="form-control mb-2" type="text" name="education_period[]" placeholder="Período (Ex: 2018 - 2021)">
      <div class="mt-2 text-end"><button type="button" class="btn btn-sm btn-outline-danger removeBtn">Remover</button></div>
    </div>
  </template>

  <template id="skillSingleTpl">
    <div class="skillItem item mb-2">
      <input class="form-control d-inline-block w-75 me-2" type="text" name="skills[]" placeholder="Ex: PHP">
      <button type="button" class="btn btn-sm btn-outline-danger removeBtn">Remover</button>
    </div>
  </template>

</body>
</html>