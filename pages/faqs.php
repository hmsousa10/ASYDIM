<?php include "../includes/config.inc.php"; ?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ASYDIM — Ajuda & FAQ</title>
    <meta name="description" content="Questões frequentes sobre a ASYDIM">
    <meta name="keywords" content="Porto, Formações, Centro de formações, Vila Nova de Gaia, Asydim, FAQ">
    <meta name="author" content="Hugo Sousa">

    <link rel="stylesheet" href="<?php echo $arrConfig['url_site'] ?>/assets/styles.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="<?php echo $arrConfig['url_site'] . '/tailwind.config.js' ?>"></script>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
</head>

<body>
    <?php include "../components/header.php"; ?>

    <section class="section-padding" style="padding-top: 140px; background: var(--color-surface);">
        <div class="container-md">
            <div class="text-center reveal" style="margin-bottom: 60px;">
                <span class="section-label">Suporte</span>
                <h1 class="section-title">Questões <span class="text-emerald">Frequentes</span></h1>
                <p class="section-subtitle" style="margin: 16px auto 0;">Encontre respostas rápidas sobre os nossos serviços.</p>
            </div>

            <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px;">
                <!-- Sobre a Plataforma -->
                <div class="faq-category reveal reveal-delay-1">
                    <button class="faq-category-header" onclick="toggleCategory(this)">
                        <span>Sobre a Plataforma</span>
                        <span class="arrow">▾</span>
                    </button>
                    <div class="faq-items" style="display:none;">
                        <div class="faq-item">
                            <button class="faq-question" onclick="toggleFaq(this)">
                                <span>O que é a ASYDIM?</span>
                                <span class="arrow">▾</span>
                            </button>
                            <div class="faq-answer">
                                <p>A nossa plataforma funciona como intermédio entre formadores e alunos. Os formadores podem criar turmas, que os alunos podem depois pesquisar e inscrever-se. A ASYDIM é uma plataforma que permite aos formadores terem uma fonte de rendimento extra, e aos alunos terem uma fonte de aprendizagem extra, online e simples.</p>
                            </div>
                        </div>
                        <div class="faq-item">
                            <button class="faq-question" onclick="toggleFaq(this)">
                                <span>Como funciona o sistema de pagamento?</span>
                                <span class="arrow">▾</span>
                            </button>
                            <div class="faq-answer">
                                <p>O pagamento é feito na plataforma. Foi utilizado o Stripe onde é possível tornar o pagamento mais seguro.</p>
                            </div>
                        </div>
                        <div class="faq-item">
                            <button class="faq-question" onclick="toggleFaq(this)">
                                <span>Posso inscrever-me em várias formações?</span>
                                <span class="arrow">▾</span>
                            </button>
                            <div class="faq-answer">
                                <p>Sim, mas não se esqueça que tem uma data de início e um fim. E convém acabar sempre as formações para poder aprender ao máximo.</p>
                            </div>
                        </div>
                        <div class="faq-item">
                            <button class="faq-question" onclick="toggleFaq(this)">
                                <span>Esqueci-me da minha palavra-passe</span>
                                <span class="arrow">▾</span>
                            </button>
                            <div class="faq-answer">
                                <p>Se esqueceu a sua palavra-passe, pode utilizar a opção de recuperação de senha na página de login. Um email com instruções será enviado para o endereço de email associado à sua conta.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Gestão de Energia -->
                <div class="faq-category reveal reveal-delay-2">
                    <button class="faq-category-header" onclick="toggleCategory(this)">
                        <span>Gestão de Energia</span>
                        <span class="arrow">▾</span>
                    </button>
                    <div class="faq-items" style="display:none;">
                        <div class="faq-item">
                            <button class="faq-question" onclick="toggleFaq(this)">
                                <span>Tipos de Contratos</span>
                                <span class="arrow">▾</span>
                            </button>
                            <div class="faq-answer">
                                <p><strong>Contrato Fixo:</strong> preço fixo para a duração total do contrato. <strong>Contrato Indexado:</strong> o valor acompanha a flutuação do mercado, maior risco mas potencialmente mais poupanças. <strong>Contrato Misto:</strong> tarifas negociadas por ciclo horário e mediante previsões de consumo.</p>
                            </div>
                        </div>
                        <div class="faq-item">
                            <button class="faq-question" onclick="toggleFaq(this)">
                                <span>Importância do Energy Procurement</span>
                                <span class="arrow">▾</span>
                            </button>
                            <div class="faq-answer">
                                <p>Uma estratégia bem definida de energy procurement traz mais previsibilidade: minimiza riscos de mudanças não previstas, taxas escondidas e custos não planeados; acesso a informação detalhada e fruto de pesquisa cuidada.</p>
                            </div>
                        </div>
                        <div class="faq-item">
                            <button class="faq-question" onclick="toggleFaq(this)">
                                <span>A minha empresa pode beneficiar?</span>
                                <span class="arrow">▾</span>
                            </button>
                            <div class="faq-answer">
                                <p>Serviços de Energy Procurement podem beneficiar quase todos os negócios, independentemente da dimensão. Recorrendo ao serviço prestado pela ASYDIM pode controlar ativamente os seus custos energéticos.</p>
                            </div>
                        </div>
                        <div class="faq-item">
                            <button class="faq-question" onclick="toggleFaq(this)">
                                <span>Por quê contratar a ASYDIM?</span>
                                <span class="arrow">▾</span>
                            </button>
                            <div class="faq-answer">
                                <p>Não somos um agente! Estamos facilmente contactáveis e temos equipas multidisciplinares que olham para a área de energia numa perspetiva global.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Energias Renováveis -->
                <div class="faq-category reveal reveal-delay-3">
                    <button class="faq-category-header" onclick="toggleCategory(this)">
                        <span>Energias Renováveis</span>
                        <span class="arrow">▾</span>
                    </button>
                    <div class="faq-items" style="display:none;">
                        <div class="faq-item">
                            <button class="faq-question" onclick="toggleFaq(this)">
                                <span>O que é o Autoconsumo Coletivo?</span>
                                <span class="arrow">▾</span>
                            </button>
                            <div class="faq-answer">
                                <p>Produção de eletricidade renovável para consumo próprio: Instalação de uma UPAC. A legislação prevê autoconsumo coletivo em rede interna e com uso da rede elétrica de serviço público. Adequação da UPAC ao consumo local para redução da fatura energética.</p>
                            </div>
                        </div>
                        <div class="faq-item">
                            <button class="faq-question" onclick="toggleFaq(this)">
                                <span>Tipos de centrais fotovoltaicas</span>
                                <span class="arrow">▾</span>
                            </button>
                            <div class="faq-answer">
                                <p><strong>UPAC</strong> (Unidade De Produção para Autoconsumo): sistema para autoconsumo na empresa com dimensionamento otimizado. <strong>UPP</strong> (Unidade de Pequena Produção): venda total da energia à RESP. <strong>Projetos especiais:</strong> potências superiores a 1MW com licenciamento diferente.</p>
                            </div>
                        </div>
                        <div class="faq-item">
                            <button class="faq-question" onclick="toggleFaq(this)">
                                <span>Vida útil de um sistema fotovoltaico</span>
                                <span class="arrow">▾</span>
                            </button>
                            <div class="faq-answer">
                                <p>Tipicamente, um sistema de produção de energia a partir de fontes renováveis tem uma vida útil de no mínimo 25 anos. A escolha dos equipamentos e a adequada manutenção são fundamentais para garantir longevidade e eficiência.</p>
                            </div>
                        </div>
                        <div class="faq-item">
                            <button class="faq-question" onclick="toggleFaq(this)">
                                <span>Produz energia com chuva?</span>
                                <span class="arrow">▾</span>
                            </button>
                            <div class="faq-answer">
                                <p>Os painéis solares ainda funcionarão mesmo com chuva ou quando a luz for refletida pelas nuvens. A chuva até pode ajudar, já que remove poeira e sujidade dos painéis.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include "../components/footer.php"; ?>

    <script>
        function toggleCategory(btn) {
            const items = btn.nextElementSibling;
            const arrow = btn.querySelector('.arrow');
            const isOpen = items.style.display !== 'none';

            items.style.display = isOpen ? 'none' : 'block';
            btn.classList.toggle('open');
        }

        function toggleFaq(btn) {
            const answer = btn.nextElementSibling;
            const isOpen = answer.classList.contains('open');

            answer.classList.toggle('open');
            btn.classList.toggle('open');
        }
    </script>

    <style>
        @media (max-width: 768px) {
            .faq-category { margin-bottom: 16px; }
            div[style*="grid-template-columns: repeat(3"] {
                grid-template-columns: 1fr !important;
            }
        }
    </style>
</body>

</html>