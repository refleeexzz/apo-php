<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Gerador de Currículo</title>
  <link rel="stylesheet" href="styles.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="script.js" defer></script>
</head>
<body>
  <div class="container">
    <h1>Gerador de Currículo (PHP)</h1>
    <form action="generate.php" method="post" id="cvForm">
      <section class="card">
        <h2>Dados Pessoais</h2>
        <label>Nome
          <input type="text" name="name" required>
        </label>
        <label>Email
          <input type="email" name="email" required>
        </label>
        <label>Telefone
          <input type="text" name="phone">
        </label>
        <label>Endereço
          <input type="text" name="address">
        </label>
        <label>Objetivo
          <textarea name="objective" rows="3"></textarea>
        </label>
      </section>

      <section class="card" id="educationSection">
        <h2>Educação</h2>
        <div class="items">
          <div class="educationItem item">
            <label>Curso
              <input type="text" name="education_course[]">
            </label>
            <label>Instituição
              <input type="text" name="education_institution[]">
            </label>
            <label>Período
              <input type="text" name="education_period[]" placeholder="Ex: 2018 - 2021">
            </label>
            <button type="button" class="removeBtn">Remover</button>
          </div>
        </div>
        <button type="button" id="addEducation">Adicionar Educação</button>
      </section>

      <section class="card" id="experienceSection">
        <h2>Experiência</h2>
        <div class="items">
          <div class="experienceItem item">
            <label>Cargo
              <input type="text" name="exp_title[]">
            </label>
            <label>Empresa
              <input type="text" name="exp_company[]">
            </label>
            <label>Período
              <input type="text" name="exp_period[]" placeholder="Ex: 2022 - Atual">
            </label>
            <label>Descrição
              <textarea name="exp_description[]" rows="2"></textarea>
            </label>
            <button type="button" class="removeBtn">Remover</button>
          </div>
        </div>
        <button type="button" id="addExperience">Adicionar Experiência</button>
      </section>

      <section class="card" id="skillsSection">
        <h2>Habilidades</h2>
        <div class="items">
          <div class="skillItem item">
            <input type="text" name="skills[]" placeholder="Ex: PHP, JavaScript">
            <button type="button" class="removeBtn">Remover</button>
          </div>
        </div>
        <button type="button" id="addSkill">Adicionar Habilidade</button>
      </section>

      <div class="actions">
        <button type="submit">Gerar Currículo</button>
        <button type="reset">Limpar</button>
      </div>
    </form>
  </div>

  <!-- templates (cloned by JS) -->
  <template id="educationTpl">
    <div class="educationItem item">
      <label>Curso
        <input type="text" name="education_course[]">
      </label>
      <label>Instituição
        <input type="text" name="education_institution[]">
      </label>
      <label>Período
        <input type="text" name="education_period[]" placeholder="Ex: 2018 - 2021">
      </label>
      <button type="button" class="removeBtn">Remover</button>
    </div>
  </template>

  <template id="experienceTpl">
    <div class="experienceItem item">
      <label>Cargo
        <input type="text" name="exp_title[]">
      </label>
      <label>Empresa
        <input type="text" name="exp_company[]">
      </label>
      <label>Período
        <input type="text" name="exp_period[]" placeholder="Ex: 2022 - Atual">
      </label>
      <label>Descrição
        <textarea name="exp_description[]" rows="2"></textarea>
      </label>
      <button type="button" class="removeBtn">Remover</button>
    </div>
  </template>

  <template id="skillTpl">
    <div class="skillItem item">
      <input type="text" name="skills[]" placeholder="Ex: PHP, JavaScript">
      <button type="button" class="removeBtn">Remover</button>
    </div>
  </template>

</body>
</html>