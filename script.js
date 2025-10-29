// script.js - jQuery para adicionar/remover campos dinamicamente
$(function(){
  // Adicionar educação
  $('#addEducation').on('click', function(){
    const tpl = $('#educationTpl').prop('content');
    $('#educationSection .items').append($(tpl).children().clone());
  });

  // Adicionar experiência
  $('#addExperience').on('click', function(){
    const tpl = $('#experienceTpl').prop('content');
    $('#experienceSection .items').append($(tpl).children().clone());
  });

  // Adicionar habilidade
  $('#addSkill').on('click', function(){
    const tpl = $('#skillTpl').prop('content');
    $('#skillsSection .items').append($(tpl).children().clone());
  });

  // Delegação para remover itens
  $(document).on('click', '.removeBtn', function(){
    const parent = $(this).closest('.item');
    // Se for último item de uma seção, apenas limpar os inputs
    const container = parent.parent();
    if (container.children('.item').length === 1) {
      parent.find('input, textarea').val('');
    } else {
      parent.remove();
    }
  });

});