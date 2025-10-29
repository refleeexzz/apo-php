<?php

function e($s) {
    return htmlspecialchars(trim((string)$s), ENT_QUOTES, 'UTF-8');
}

$name = e($_POST['name'] ?? '');
$email = e($_POST['email'] ?? '');
$phone = e($_POST['phone'] ?? '');
$address = e($_POST['address'] ?? '');
$objective = nl2br(e($_POST['objective'] ?? ''));
$objective_title = e($_POST['objective_title'] ?? '');

$education_course = $_POST['education_course'] ?? [];
$education_institution = $_POST['education_institution'] ?? [];
$education_period = $_POST['education_period'] ?? [];

$exp_title = $_POST['exp_title'] ?? [];
$exp_company = $_POST['exp_company'] ?? [];
$exp_period = $_POST['exp_period'] ?? [];
$exp_description = $_POST['exp_description'] ?? [];

$skills = $_POST['skills'] ?? [];

// Normalizar arrays e sanitizar
function sanitize_array($arr) {
    $out = [];
    foreach ($arr as $v) {
        $v = trim((string)$v);
        if ($v !== '') $out[] = htmlspecialchars($v, ENT_QUOTES, 'UTF-8');
    }
    return $out;
}

$education_course = sanitize_array($education_course);
$education_institution = sanitize_array($education_institution);
$education_period = sanitize_array($education_period);

$exp_title = sanitize_array($exp_title);
$exp_company = sanitize_array($exp_company);
$exp_period = sanitize_array($exp_period);
$exp_description = sanitize_array($exp_description);

$skills = sanitize_array($skills);

?>
<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Currículo - <?php echo $name ?: 'Sem nome'; ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div class="resume container py-4">
    <header class="resume-header text-center mb-4">
      <h1 class="mb-1"><?php echo $name ?: 'Nome'; ?></h1>
      <?php if ($objective_title): ?>
        <div class="h6 text-muted mb-2"><?php echo $objective_title; ?></div>
      <?php endif; ?>
      <p class="meta small text-muted">
        <?php if($email): ?><span><?php echo $email; ?></span><?php endif; ?>
        <?php if($phone): ?><span> | <?php echo $phone; ?></span><?php endif; ?>
        <?php if($address): ?><span> | <?php echo $address; ?></span><?php endif; ?>
      </p>
    </header>

    <?php if ($objective): ?>
      <section class="card">
        <h2>Objetivo</h2>
        <div class="content"><?php echo $objective; ?></div>
      </section>
    <?php endif; ?>

    <?php if (count($education_course) > 0): ?>
      <section class="card">
        <h2>Educação</h2>
        <?php for ($i = 0; $i < count($education_course); $i++): ?>
          <div class="item">
            <strong><?php echo $education_course[$i]; ?></strong>
            <?php if (!empty($education_institution[$i])): ?> — <?php echo $education_institution[$i]; ?>
            <?php endif; ?>
            <?php if (!empty($education_period[$i])): ?>
              <div class="period"><?php echo $education_period[$i]; ?></div>
            <?php endif; ?>
          </div>
        <?php endfor; ?>
      </section>
    <?php endif; ?>

    <?php if (count($exp_title) > 0): ?>
      <section class="card">
        <h2>Experiência</h2>
        <?php for ($i = 0; $i < count($exp_title); $i++): ?>
          <div class="item">
            <strong><?php echo $exp_title[$i]; ?></strong>
            <?php if (!empty($exp_company[$i])): ?> — <?php echo $exp_company[$i]; ?>
            <?php endif; ?>
            <?php if (!empty($exp_period[$i])): ?>
              <div class="period"><?php echo $exp_period[$i]; ?></div>
            <?php endif; ?>
            <?php if (!empty($exp_description[$i])): ?>
              <div class="desc"><?php echo nl2br($exp_description[$i]); ?></div>
            <?php endif; ?>
          </div>
        <?php endfor; ?>
      </section>
    <?php endif; ?>

    <?php if (count($skills) > 0): ?>
      <section class="card">
        <h2>Habilidades</h2>
        <ul class="skills">
          <?php foreach ($skills as $s): ?>
            <li><?php echo $s; ?></li>
          <?php endforeach; ?>
        </ul>
      </section>
    <?php endif; ?>

    <div class="actions">
      <button onclick="window.print();">Imprimir</button>
      <a href="index.php" class="button">Editar</a>
    </div>
  </div>
</body>
</html>