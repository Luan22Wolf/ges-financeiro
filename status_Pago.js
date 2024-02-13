document.addEventListener("DOMContentLoaded", function() {
    // Seleciona todos os links de check
    var checkLinks = document.querySelectorAll('.check');

    // Adiciona um ouvinte de eventos de clique para cada link de check
    checkLinks.forEach(function(link) {
      link.addEventListener('click', function(event) {
        event.preventDefault(); // Impede o comportamento padrão do link

        // Verifica se o ícone atual é de "fi-br-check" ou "fi-br-x"
        var icon = link.querySelector('i');
        if (icon.classList.contains('fi-br-check')) {
          // Se o ícone atual for de check, troca para o ícone de "X"
          icon.classList.remove('fi-br-check');
          icon.classList.add('fi-br-x');
        } else if (icon.classList.contains('fi-br-x')) {
          // Se o ícone atual for de "X", troca para o ícone de check
          icon.classList.remove('fi-br-x');
          icon.classList.add('fi-br-check');
        }
      });
    });
  });
