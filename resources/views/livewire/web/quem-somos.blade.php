<div>

    @section('css')
        <link rel="stylesheet" href="/public/assets/css/quem-somos.css">
    @endsection
    <main>
        <article>

            <section class="about-hero">
                <div class="container">
                    <div class="hero-content">
                        <span class="hero-badge">
                            <ion-icon name="calendar-outline"></ion-icon>
                            Desde 1985
                        </span>
                        <h1 class="hero-title">Quem Somos</h1>
                        <p class="hero-subtitle">Tradição e inovação em locação de veículos há mais de 35 anos</p>
                    </div>
                </div>
            </section>

            <section class="company-info">
                <div class="container">
                    <div class="info-grid">
                        <div class="info-text">
                            <h2 class="section-title">Sua Mobilidade, Nossa Especialidade</h2>
                            <p>A <strong>Montalvo Locadora</strong> oferece a maior variedade de veículos para todas as
                                suas necessidades. Desde carros econômicos para o dia a dia até SUVs premium para
                                viagens especiais.</p>
                            <p>Com <strong>mais de 500 veículos</strong> em nossa frota, garantimos que você encontre o
                                carro perfeito para cada ocasião. Todos os nossos veículos passam por rigorosa
                                manutenção e são renovados constantemente.</p>
                            <div class="features-grid">
                                <div class="feature-item">
                                    <ion-icon name="car-sport-outline"></ion-icon>
                                    <h4>Frota Diversificada</h4>
                                    <p>Econômicos, SUVs, Sedans e Utilitários</p>
                                </div>
                                <div class="feature-item">
                                    <ion-icon name="shield-checkmark-outline"></ion-icon>
                                    <h4>Seguro Incluso</h4>
                                    <p>Cobertura completa em todos os veículos</p>
                                </div>
                                <div class="feature-item">
                                    <ion-icon name="time-outline"></ion-icon>
                                    <h4>Entrega Rápida</h4>
                                    <p>Retirada em até 30 minutos</p>
                                </div>
                                <div class="feature-item">
                                    <ion-icon name="card-outline"></ion-icon>
                                    <h4>Preços Justos</h4>
                                    <p>Sem taxas ocultas ou surpresas</p>
                                </div>
                            </div>
                        </div>
                        <div class="info-visual">
                            <div class="car-showcase">
                                <div class="car-card">
                                    <img src="/public/assets/images/car-1.jpg" alt="Carro econômico">
                                    <span class="car-type">Econômico</span>
                                </div>
                                <div class="car-card">
                                    <img src="/public/assets/images/car-2.jpg" alt="SUV">
                                    <span class="car-type">SUV</span>
                                </div>
                                <div class="car-card">
                                    <img src="/public/assets/images/car-3.jpg" alt="Sedan">
                                    <span class="car-type">Sedan</span>
                                </div>
                            </div>
                            <div class="stats-container">
                                <div class="stats-banner">
                                    <div class="stat-highlight">
                                        <span class="stat-big">500+</span>
                                        <span class="stat-text">Veículos Disponíveis</span>
                                    </div>
                                </div>
                                <div class="stats-banner">
                                    <div class="stat-highlight">
                                        <span class="stat-big">35+</span>
                                        <span class="stat-text">Anos de Experiência</span>
                                    </div>
                                </div>
                                <div class="stats-banner">
                                    <div class="stat-highlight">
                                        <span class="stat-big">10k+</span>
                                        <span class="stat-text">Clientes Satisfeitos</span>
                                    </div>
                                </div>
                                <div class="stats-banner">
                                    <div class="stat-highlight">
                                        <span class="stat-big">24/7</span>
                                        <span class="stat-text">Atendimento</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="services-section get-start">
                <div class="container">
                    <h2 class="section-title">Nossos Serviços</h2>
                    <div class="get-start-list">
                        <div class="get-start-card">
                            <div class="card-icon">
                                <ion-icon name="car-outline"></ion-icon>
                            </div>
                            <h3 class="card-title">Locação Diária</h3>
                            <p class="card-text">Veículos para uso diário, fins de semana e viagens curtas com total
                                flexibilidade e comodidade.</p>
                            <a href="{{ route('seminovos') }}" class="card-link">Saiba mais</a>
                        </div>
                        <div class="get-start-card">
                            <div class="card-icon">
                                <ion-icon name="calendar-outline"></ion-icon>
                            </div>
                            <h3 class="card-title">Locação Mensal</h3>
                            <p class="card-text">Soluções flexíveis para locações de médio e longo prazo com condições
                                especiais.</p>
                            <a href="{{ route('seminovos') }}" class="card-link">Saiba mais</a>
                        </div>
                        <div class="get-start-card">
                            <div class="card-icon">
                                <ion-icon name="briefcase-outline"></ion-icon>
                            </div>
                            <h3 class="card-title">Frota Corporativa</h3>
                            <p class="card-text">Gestão completa de frotas para empresas de todos os portes com
                                atendimento personalizado.</p>
                            <a href="{{ route('contato') }}" class="card-link">Saiba mais</a>
                        </div>
                        <div class="get-start-card">
                            <div class="card-icon">
                                <ion-icon name="shield-checkmark-outline"></ion-icon>
                            </div>
                            <h3 class="card-title">Seguro Total</h3>
                            <p class="card-text">Cobertura completa para sua tranquilidade e segurança em todas as
                                locações.</p>
                            <a href="{{ route('contato') }}" class="card-link">Saiba mais</a>
                        </div>
                    </div>
                </div>
            </section>

            <section class="values-section">
                <div class="container">
                    <div class="values-content">
                        <div class="values-text">
                            <h2 class="section-title">Nossos Valores</h2>
                            <div class="value-list">
                                <div class="value-item">
                                    <div class="value-icon">
                                        <ion-icon name="checkmark-circle"></ion-icon>
                                    </div>
                                    <div class="value-content">
                                        <h4>Qualidade</h4>
                                        <p>Frota sempre renovada e em perfeito estado de conservação</p>
                                    </div>
                                </div>
                                <div class="value-item">
                                    <div class="value-icon">
                                        <ion-icon name="people"></ion-icon>
                                    </div>
                                    <div class="value-content">
                                        <h4>Atendimento</h4>
                                        <p>Equipe especializada e atendimento personalizado 24/7</p>
                                    </div>
                                </div>
                                <div class="value-item">
                                    <div class="value-icon">
                                        <ion-icon name="star"></ion-icon>
                                    </div>
                                    <div class="value-content">
                                        <h4>Confiança</h4>
                                        <p>Transparência total em preços e condições contratuais</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="values-highlight">
                            <h3>Por que escolher a Montalvo?</h3>
                            <ul>
                                <li>Mais de 35 anos de tradição no mercado</li>
                                <li>Frota diversificada com veículos 0km a 3 anos</li>
                                <li>Atendimento 24 horas, 7 dias por semana</li>
                                <li>Preços competitivos e condições flexíveis</li>
                                <li>Cobertura de seguro completa</li>
                                <li>Manutenção preventiva rigorosa</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>

            <section class="contact-cta">
                <div class="container">
                    <div class="cta-content">
                        <h2>Pronto para alugar seu próximo veículo?</h2>
                        <p>Entre em contato conosco e descubra as melhores condições do mercado</p>
                        <div class="cta-buttons">
                            <a href="{{ route('reserva') }}" class="btn-primary">
                                <ion-icon name="car"></ion-icon>
                                Fazer Reserva
                            </a>
                            <a href="{{ route('contato') }}" class="btn-secondary">
                                <ion-icon name="call"></ion-icon>
                                Falar Conosco
                            </a>
                        </div>
                    </div>
                </div>
            </section>

        </article>
    </main>

</div>
