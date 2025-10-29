$(function(){
  const $form = $('#cvForm');

  function updatePreview() {
    $('#previewName').text($('#name').val() || 'Nome Completo');
    $('#previewObjectiveTitle').text($('#objective_title').val() || 'Cargo desejado');
    const obj = $('#objective').val() || 'Lorem ipsum exore st amet, consectetuer adipiscing elit, sed diam nonummy nibh';
    $('#previewObjective').text(obj);

    // Update contact info in preview
    const email = $('#email').val() || '';
    const phone = $('#phone').val() || '';
    const address = $('#address').val() || '';
    let contactHtml = '';
    if (email) contactHtml += `<span><i class='bi bi-envelope'></i> ${escapeHtml(email)}</span><br>`;
    if (phone) contactHtml += `<span><i class='bi bi-telephone'></i> ${escapeHtml(phone)}</span><br>`;
    if (address) contactHtml += `<span><i class='bi bi-geo-alt'></i> ${escapeHtml(address)}</span>`;
    $('#previewContact').html(contactHtml);
    
    const educ = [];
    $('input[name="education_course[]"]').each(function(i){
      const course = $(this).val().trim();
      const inst = $('input[name="education_institution[]"]').eq(i).val() || '';
      const period = $('input[name="education_period[]"]').eq(i).val() || '';
      if (course) educ.push({course, inst, period});
    });
    if (educ.length) {
      const html = educ.map(e=>`<div class=\"mb-2\"><strong>${escapeHtml(e.course)}</strong><br>${escapeHtml(e.inst)}<br><small class=\"text-muted\">${escapeHtml(e.period)}</small></div>`).join('');
      $('#previewEducation').html(html);
    } else {
      $('#previewEducation').html('Nome da Instituição<br><small class="text-muted">Ano – Ano</small>');
    }

    
    const exps = [];
    $('input[name="exp_title[]"]').each(function(i){
      const title = $(this).val().trim();
      const company = $('input[name="exp_company[]"]').eq(i).val() || '';
      const period = $('input[name="exp_period[]"]').eq(i).val() || '';
      const desc = $('textarea[name="exp_description[]"]').eq(i).val() || '';
      if (title) exps.push({title, company, period, desc});
    });
    if (exps.length) {
      const html = exps.map(e => `
        <div class=\"mb-3\">
          <div class=\"d-flex justify-content-between\"><strong>${escapeHtml(e.title)}</strong><small class=\"text-muted\">${escapeHtml(e.period)}</small></div>
          <div class=\"text-muted\">${escapeHtml(e.company)}</div>
          ${e.desc ? `<div class=\"mt-2\">${escapeHtml(e.desc)}</div>` : ''}
        </div>
      `).join('');
      $('#previewExperience').html(html);
    } else {
      $('#previewExperience').html('<strong>Cargo</strong><br>Nome da Empresa<br><small class="text-muted">Ano – Ano</small>');
    }

    
    const skills = [];
    $('input[name="skills[]"]').each(function(){
      const v = $(this).val().trim();
      if (v) skills.push(v);
    });
    if (!skills.length) {
      const maybe = $('input[placeholder*="PHP"]').first().val() || '';
      maybe.split(',').map(s=>s.trim()).forEach(s=>{ if (s) skills.push(s); });
    }
    if (skills.length) {
      $('#previewSkills').empty();
      skills.forEach(s=>{
        const el = $(`<span class=\"badge bg-light text-dark\"></span>`).text(s);
        $('#previewSkills').append(el);
      });
    } else {
      $('#previewSkills').html('<span class="badge bg-light text-dark">Concaca</span> <span class="badge bg-light text-dark">degus</span>');
    }
  }

  function escapeHtml(text) {
    return $('<div>').text(text).html();
  }

  $form.on('input change', 'input, textarea', updatePreview);
  $form.on('reset', function(){
    setTimeout(updatePreview, 10);
  });

  $('#addExperience').on('click', function(){
    const tpl = $('#experienceTpl').prop('content');
    $('#experienceSection .items').append($(tpl).children().clone());
    updatePreview();
  });

  $('#addEducation').on('click', function(){
    const tpl = $('#educationTpl').prop('content');
    $('#educationSection .items').append($(tpl).children().clone());
    updatePreview();
  });

  $('#addSkill').on('click', function(){
    const tpl = $('#skillSingleTpl').prop('content');
    $('#skillsSection .items').append($(tpl).children().clone());
    updatePreview();
  });

  $(document).on('click', '.removeBtn', function(){
    const parent = $(this).closest('.item');
    if (!parent.length) return;
    const container = parent.parent();
    if (container.children('.item').length === 1) {
      parent.find('input, textarea').val('');
    } else {
      parent.remove();
    }
    updatePreview();
  });

  // Foto: preview instantâneo
  $('#photoInput').on('change', function(e){
    const file = e.target.files[0];
    if (file && file.type.match(/^image\//)) {
      const reader = new FileReader();
      reader.onload = function(ev) {
        $('#previewAvatar').html(`<img src="${ev.target.result}" alt="Foto" style="width:72px;height:72px;object-fit:cover;border-radius:50%;">`);
      };
      reader.readAsDataURL(file);
    } else {
      $('#previewAvatar').html('');
    }
  });

  updatePreview();
});