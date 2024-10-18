document.getElementById('share-form').addEventListener('submit', function (e) {
    e.preventDefault();
    
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const message = document.getElementById('message').value;
  
    // Validação simples
    if (name && email && message) {
      // Criação do link para envio por e-mail
      const subject = encodeURIComponent("Nova Experiência Compartilhada");
      const body = encodeURIComponent(`Nome: ${name}\nE-mail: ${email}\n\nExperiência:\n${message}`);
      const mailtoLink = `mailto:okschoolplataformadigital@gmail.com?subject=${subject}&body=${body}`;
  
      // Abrir o link mailto
      window.location.href = mailtoLink;
  
      // Exibir mensagem de sucesso
      alert("Sua experiência foi enviada com sucesso!");
    } else {
      alert("Por favor, preencha todos os campos.");
    }
  });
  