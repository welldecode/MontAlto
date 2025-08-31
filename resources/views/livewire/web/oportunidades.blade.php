<div>

    @section('css')
        <link rel="stylesheet" href="/public/assets/css/oportunidades.css">
    @endsection
  <main>
    <article>

      <!-- HERO OPORTUNIDADES -->
      <section class="hero-oportunidades">
        <div class="container">
          <div class="hero-content">
            <span class="hero-badge">
              <ion-icon name="briefcase-outline"></ion-icon>
              Oportunidades
            </span>
            <h1 class="hero-title">
              Trabalhe <span class="highlight">Conosco</span>
            </h1>
            <p class="hero-text">
              Faça parte da nossa equipe e construa uma carreira sólida no setor de locação de veículos
            </p>
          </div>
        </div>
      </section>

      <!-- POR QUE TRABALHAR CONOSCO -->
      <section class="por-que-trabalhar">
        <div class="container">
          <h2 class="section-title">Por que trabalhar na Montalvo?</h2>
          
          <div class="beneficios-grid">
            <div class="beneficio-card">
              <div class="card-icon">
                <ion-icon name="trending-up-outline"></ion-icon>
              </div>
              <h3 class="card-title">Crescimento Profissional</h3>
              <p class="card-text">Oportunidades reais de crescimento e desenvolvimento de carreira em uma empresa consolidada no mercado.</p>
            </div>

            <div class="beneficio-card">
              <div class="card-icon">
                <ion-icon name="people-outline"></ion-icon>
              </div>
              <h3 class="card-title">Ambiente Colaborativo</h3>
              <p class="card-text">Trabalhe em um ambiente acolhedor, com equipe unida e focada em resultados.</p>
            </div>

            <div class="beneficio-card">
              <div class="card-icon">
                <ion-icon name="school-outline"></ion-icon>
              </div>
              <h3 class="card-title">Capacitação Contínua</h3>
              <p class="card-text">Investimos no desenvolvimento dos nossos colaboradores com treinamentos e cursos.</p>
            </div>

            <div class="beneficio-card">
              <div class="card-icon">
                <ion-icon name="gift-outline"></ion-icon>
              </div>
              <h3 class="card-title">Benefícios Atrativos</h3>
              <p class="card-text">Pacote completo de benefícios incluindo plano de saúde, vale alimentação e muito mais.</p>
            </div>
          </div>
        </div>
      </section>

      <!-- VAGAS DISPONÍVEIS -->
      <section class="vagas-disponiveis">
        <div class="container">
          <h2 class="section-title">Vagas Disponíveis</h2>
          
          <div class="vagas-lista">
            <div class="vaga-card">
              <div class="vaga-header">
                <h3 class="vaga-titulo">Consultor de Vendas</h3>
                <div class="vaga-tipo">CLT</div>
              </div>
              <div class="vaga-info">
                <div class="info-item">
                  <ion-icon name="location-outline"></ion-icon>
                  <span>São Paulo - SP</span>
                </div>
                <div class="info-item">
                  <ion-icon name="time-outline"></ion-icon>
                  <span>Integral</span>
                </div>
                <div class="info-item">
                  <ion-icon name="school-outline"></ion-icon>
                  <span>Ensino Médio</span>
                </div>
              </div>
              <p class="vaga-descricao">
                Buscamos profissional proativo para atendimento ao cliente, vendas e locação de veículos. 
                Experiência em vendas será um diferencial.
              </p>
              <div class="vaga-requisitos">
                <h4>Requisitos:</h4>
                <ul>
                  <li>Ensino médio completo</li>
                  <li>Experiência em atendimento ao cliente</li>
                  <li>Boa comunicação</li>
                  <li>CNH categoria B</li>
                </ul>
              </div>
              <button class="btn-candidatar">Candidatar-se</button>
            </div>

            <div class="vaga-card">
              <div class="vaga-header">
                <h3 class="vaga-titulo">Mecânico Automotivo</h3>
                <div class="vaga-tipo">CLT</div>
              </div>
              <div class="vaga-info">
                <div class="info-item">
                  <ion-icon name="location-outline"></ion-icon>
                  <span>São Paulo - SP</span>
                </div>
                <div class="info-item">
                  <ion-icon name="time-outline"></ion-icon>
                  <span>Integral</span>
                </div>
                <div class="info-item">
                  <ion-icon name="school-outline"></ion-icon>
                  <span>Técnico</span>
                </div>
              </div>
              <p class="vaga-descricao">
                Profissional para manutenção preventiva e corretiva da frota de veículos. 
                Experiência comprovada em mecânica automotiva.
              </p>
              <div class="vaga-requisitos">
                <h4>Requisitos:</h4>
                <ul>
                  <li>Curso técnico em mecânica</li>
                  <li>Experiência mínima de 2 anos</li>
                  <li>Conhecimento em sistemas automotivos</li>
                  <li>CNH categoria B</li>
                </ul>
              </div>
              <button class="btn-candidatar">Candidatar-se</button>
            </div>

            <div class="vaga-card">
              <div class="vaga-header">
                <h3 class="vaga-titulo">Assistente Administrativo</h3>
                <div class="vaga-tipo">CLT</div>
              </div>
              <div class="vaga-info">
                <div class="info-item">
                  <ion-icon name="location-outline"></ion-icon>
                  <span>São Paulo - SP</span>
                </div>
                <div class="info-item">
                  <ion-icon name="time-outline"></ion-icon>
                  <span>Integral</span>
                </div>
                <div class="info-item">
                  <ion-icon name="school-outline"></ion-icon>
                  <span>Superior</span>
                </div>
              </div>
              <p class="vaga-descricao">
                Profissional para apoio administrativo, controle de documentos, atendimento telefônico 
                e suporte às operações da empresa.
              </p>
              <div class="vaga-requisitos">
                <h4>Requisitos:</h4>
                <ul>
                  <li>Superior completo ou cursando</li>
                  <li>Conhecimento em pacote Office</li>
                  <li>Experiência administrativa</li>
                  <li>Organização e proatividade</li>
                </ul>
              </div>
              <button class="btn-candidatar">Candidatar-se</button>
            </div>
          </div>
        </div>
      </section>

      <!-- PROCESSO SELETIVO -->
      <section class="processo-seletivo">
        <div class="container">
          <h2 class="section-title">Como funciona nosso processo seletivo</h2>
          
          <div class="processo-steps">
            <div class="step-item">
              <div class="step-number">1</div>
              <div class="step-content">
                <h3>Candidatura</h3>
                <p>Envie seu currículo através do nosso formulário ou e-mail</p>
              </div>
            </div>

            <div class="step-item">
              <div class="step-number">2</div>
              <div class="step-content">
                <h3>Análise</h3>
                <p>Nossa equipe de RH analisa seu perfil e experiências</p>
              </div>
            </div>

            <div class="step-item">
              <div class="step-number">3</div>
              <div class="step-content">
                <h3>Entrevista</h3>
                <p>Entrevista presencial ou online com nossos gestores</p>
              </div>
            </div>

            <div class="step-item">
              <div class="step-number">4</div>
              <div class="step-content">
                <h3>Contratação</h3>
                <p>Aprovação e início das atividades na Montalvo</p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- FORMULÁRIO DE CANDIDATURA -->
      <section class="formulario-candidatura">
        <div class="container">
          <div class="form-container">
            <h2 class="section-title">Candidate-se Agora</h2>
            <p class="form-subtitle">Não encontrou a vaga ideal? Envie seu currículo e entraremos em contato quando surgir uma oportunidade para seu perfil.</p>
            
            <form wire:submit="save"  class="candidatura-form">
              <div class="form-grid">
                <div class="input-group">
                  <label for="name">Nome Completo</label>
                  <input type="text" wire:model="name" id="name" name="name" required>
                </div>

                <div class="input-group">
                  <label for="email">E-mail</label>
                  <input type="email" id="email" wire:model="email" name="email" required>
                </div>

                <div class="input-group">
                  <label for="phone">Telefone</label>
                  <input type="tel" id="phone" wire:model="phone" name="phone" required>
                </div>

                <div class="input-group">
                  <label for="subject">Cargo de Interesse</label>
                  <select id="subject" wire:model="subject" name="subject" required>
                    <option value="">Selecione um cargo</option>
                    <option value="consultor-vendas">Consultor de Vendas</option>
                    <option value="mecanico">Mecânico Automotivo</option>
                    <option value="administrativo">Assistente Administrativo</option>
                    <option value="outros">Outros</option>
                  </select>
                </div>

                <div class="input-group full-width">
                  <label for="message">Experiência Profissional</label>
                  <textarea id="message" name="message" wire:model="message" rows="4" placeholder="Descreva brevemente sua experiência profissional"></textarea>
                </div>

                <div class="input-group full-width">
                  <label>Currículo (PDF)</label>
                  <div class="file-upload-wrapper">
                    <input type="file" id="link_path" name="link_path" wire:model="link_path"  accept=".pdf" required>
                    <label for="link_path" class="file-upload-label">
                      <ion-icon name="cloud-upload-outline"></ion-icon>
                      <span class="file-text">Clique para selecionar o arquivo PDF</span>
                    </label>
                  </div>
                </div>
              </div>

              <button type="submit" class="btn-enviar">
                <ion-icon name="send-outline"></ion-icon>
                Enviar Candidatura
              </button>
            </form>
          </div>
        </div>
      </section>

    </article>
  </main>
</div>