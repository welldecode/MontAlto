<div>

    @section('css')
        <link rel="stylesheet" href="/public/assets/css/contato.css"> 
    @endsection
  <main>
    <article>

      <!-- HERO CONTATO -->
      <section class="hero-contato">
        <div class="container">
          <div class="hero-content">
            <span class="hero-badge">
              <ion-icon name="call-outline"></ion-icon>
              Contato
            </span>
            <h1 class="hero-title">
              Entre em <span class="highlight">Contato</span>
            </h1>
            <p class="hero-text">
              Estamos prontos para atender você. Fale conosco através dos nossos canais de comunicação.
            </p>
          </div>
        </div>
      </section>

      <!-- INFORMAÇÕES DE CONTATO -->
      <section class="info-contato">
        <div class="container">
          <div class="contato-grid">

            <div class="contato-card">
              <div class="card-icon">
                <ion-icon name="call-outline"></ion-icon>
              </div>
              <h3 class="card-title">Telefone</h3>
              <div class="card-info">
                <p><strong>Matriz:</strong> (11) 3456-7890</p>
                <p><strong>WhatsApp:</strong> (11) 99999-8888</p>
                <p><strong>Emergência 24h:</strong> (11) 98765-4321</p>
              </div>
              <a href="tel:+551134567890" class="btn-contato">
                <ion-icon name="call-outline"></ion-icon>
                Ligar Agora
              </a>
            </div>

            <div class="contato-card">
              <div class="card-icon">
                <ion-icon name="mail-outline"></ion-icon>
              </div>
              <h3 class="card-title">E-mail</h3>
              <div class="card-info">
                <p><strong>Geral:</strong> contato@montalvo.com.br</p>
                <p><strong>Vendas:</strong> vendas@montalvo.com.br</p>
                <p><strong>Suporte:</strong> suporte@montalvo.com.br</p>
              </div>
              <a href="mailto:contato@montalvo.com.br" class="btn-contato">
                <ion-icon name="mail-outline"></ion-icon>
                Enviar E-mail
              </a>
            </div>

            <div class="contato-card">
              <div class="card-icon">
                <ion-icon name="location-outline"></ion-icon>
              </div>
              <h3 class="card-title">Endereço</h3>
              <div class="card-info">
                <p><strong>Matriz:</strong></p>
                <p>Rua das Flores, 123</p>
                <p>Centro - São Paulo/SP</p>
                <p>CEP: 01234-567</p>
              </div>
              <a href="https://maps.google.com" target="_blank" class="btn-contato">
                <ion-icon name="navigate-outline"></ion-icon>
                Ver no Mapa
              </a>
            </div>

            <div class="contato-card">
              <div class="card-icon">
                <ion-icon name="time-outline"></ion-icon>
              </div>
              <h3 class="card-title">Horário de Funcionamento</h3>
              <div class="card-info">
                <p><strong>Segunda a Sexta:</strong> 08h às 18h</p>
                <p><strong>Sábado:</strong> 08h às 14h</p>
                <p><strong>Domingo:</strong> Fechado</p>
                <p><strong>Emergência:</strong> 24h</p>
              </div>
            </div>

          </div>
        </div>
      </section>

      <!-- FORMULÁRIO DE CONTATO -->
      <section class="formulario-contato">
        <div class="container">
          <div class="form-header">
            <h2 class="section-title">Envie sua Mensagem</h2>
            <p class="form-subtitle">Preencha o formulário e entraremos em contato rapidamente</p>
          </div>

          <div class="form-layout">
            <div class="form-container">
              <form wire:submit="save"  class="contato-form">
                <div class="form-grid">
                  <div class="input-group">
                    <label for="name">Nome Completo</label>
                    <input type="text" wire:model="name" id="name" name="name" placeholder="Seu nome completo" required>
                  </div>

                  <div class="input-group">
                    <label for="email">E-mail</label>
                    <input type="email" wire:model="email"  id="email" name="email" placeholder="seu@email.com" required>
                  </div>

                  <div class="input-group">
                    <label for="telefone">Telefone</label>
                    <input type="tel" id="telefone" wire:model="phone" name="telefone" placeholder="(11) 99999-9999" required>
                  </div>

                  <div class="input-group">
                    <label for="subject">Assunto</label>
                    <select id="subject" wire:model="subject" name="subject" required>
                      <option value="">Selecione um assunto</option>
                      <option value="locacao">Locação de Veículos</option>
                      <option value="seminovos">Seminovos</option>
                      <option value="suporte">Suporte Técnico</option>
                      <option value="reclamacao">Reclamação</option>
                      <option value="sugestao">Sugestão</option>
                      <option value="outros">Outros</option>
                    </select>
                  </div>

                  <div class="input-group full-width">
                    <label for="message">Mensagem</label>
                    <textarea id="message" wire:model="message" name="message" placeholder="Digite sua mensagem aqui..."
                      required></textarea>
                  </div>
                </div>

                <button type="submit" class="btn-enviar">
                  <ion-icon name="send-outline"></ion-icon>
                  Enviar Mensagem
                </button>
              </form>
            </div>

            <div class="form-sidebar">
              <div class="contact-info-card">
                <h3>
                  <ion-icon name="call-outline"></ion-icon>
                  Contato Direto
                </h3>
                <ul class="contact-info-list">
                  <li>
                    <ion-icon name="call"></ion-icon>
                    (11) 3456-7890
                  </li>
                  <li>
                    <ion-icon name="logo-whatsapp"></ion-icon>
                    (11) 99999-8888
                  </li>
                  <li>
                    <ion-icon name="mail"></ion-icon>
                    contato@montalvo.com.br
                  </li>
                  <li>
                    <ion-icon name="location"></ion-icon>
                    Rua das Flores, 123 - Centro
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </section>

    </article>
  </main>


  <!-- MAPA -->
  <section class="mapa-section">
    <div class="container">
      <h2 class="section-title">Nossa Localização</h2>
      <div class="mapa-container">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3657.1975!2d-46.6333824!3d-23.5505199!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjPCsDMzJzAxLjkiUyA0NsKwMzgnMDAuMiJX!5e0!3m2!1spt-BR!2sbr!4v1234567890"
          width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"
          referrerpolicy="no-referrer-when-downgrade">
        </iframe>
      </div>
    </div>
  </section>

  <!-- FAQ -->
  <section class="faq-section">
    <div class="container">
      <div class="faq-header">
        <h2 class="section-title">Perguntas Frequentes</h2>
        <p class="faq-subtitle">Encontre respostas rápidas para as dúvidas mais comuns sobre nossos serviços</p>
      </div>

      <div class="faq-container">
        <div class="faq-item">
          <div class="faq-question">
            <div class="faq-question-content">
              <div class="faq-number">01</div>
              <h3>Quais documentos preciso para alugar um carro?</h3>
            </div>
            <div class="faq-toggle">
              <ion-icon name="chevron-down-outline"></ion-icon>
            </div>
          </div>
          <div class="faq-answer">
            <div class="faq-answer-content">
              <p>Para alugar um veículo você precisa apresentar: CNH válida (categoria B ou superior), documento de
                identidade (RG ou CNH), CPF e cartão de crédito no nome do locatário.</p>
            </div>
          </div>
        </div>

        <div class="faq-item">
          <div class="faq-question">
            <div class="faq-question-content">
              <div class="faq-number">02</div>
              <h3>Qual a idade mínima para locação?</h3>
            </div>
            <div class="faq-toggle">
              <ion-icon name="chevron-down-outline"></ion-icon>
            </div>
          </div>
          <div class="faq-answer">
            <div class="faq-answer-content">
              <p>A idade mínima é de 21 anos e é necessário ter CNH há pelo menos 2 anos. Para condutores entre 21 e 25
                anos, pode haver taxa adicional.</p>
            </div>
          </div>
        </div>

        <div class="faq-item">
          <div class="faq-question">
            <div class="faq-question-content">
              <div class="faq-number">03</div>
              <h3>Posso devolver o carro em local diferente?</h3>
            </div>
            <div class="faq-toggle">
              <ion-icon name="chevron-down-outline"></ion-icon>
            </div>
          </div>
          <div class="faq-answer">
            <div class="faq-answer-content">
              <p>Sim, oferecemos o serviço de devolução em local diferente mediante taxa adicional. Consulte nossa
                equipe para verificar disponibilidade.</p>
            </div>
          </div>
        </div>

        <div class="faq-item">
          <div class="faq-question">
            <div class="faq-question-content">
              <div class="faq-number">04</div>
              <h3>O seguro está incluso na locação?</h3>
            </div>
            <div class="faq-toggle">
              <ion-icon name="chevron-down-outline"></ion-icon>
            </div>
          </div>
          <div class="faq-answer">
            <div class="faq-answer-content">
              <p>Todos os nossos veículos possuem seguro básico incluso. Oferecemos também opções de seguro completo com
                cobertura ampliada.</p>
            </div>
          </div>
        </div>

        <div class="faq-item">
          <div class="faq-question">
            <div class="faq-question-content">
              <div class="faq-number">05</div>
              <h3>Posso cancelar minha reserva?</h3>
            </div>
            <div class="faq-toggle">
              <ion-icon name="chevron-down-outline"></ion-icon>
            </div>
          </div>
          <div class="faq-answer">
            <div class="faq-answer-content">
              <p>Sim, você pode cancelar sua reserva até 24 horas antes da data de retirada sem custos adicionais.
                Cancelamentos com menos de 24h podem ter taxa.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  </article>
  </main>

</div>