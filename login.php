<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BidFlow - Sistema Integrado CRM Gestão de Vendas e Gestão de Licitações</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .hero-gradient {
            background: linear-gradient(135deg, #1e40af 0%, #3b82f6 100%);
        }

        .feature-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        .fade-in {
            animation: fadeIn 1s ease-in;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body class="bg-gray-50">
    <!-- Header/Navigation -->
    <header class="bg-white shadow-sm fixed w-full top-0 z-50">
        <nav class="container mx-auto px-6 py-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center">
                    <img src="crm/imagens/logo-1080-fb.png" alt="Logo BidFlow" class="h-12">
                </div>
                <div class="hidden md:flex space-x-8">
                    <a href="#features" class="text-gray-700 hover:text-blue-800 font-medium">Funcionalidades</a>
                    <a href="#benefits" class="text-gray-700 hover:text-blue-800 font-medium">Benefícios</a>
                    <a href="#customization" class="text-gray-700 hover:text-blue-800 font-medium">Personalização</a>
                    <a href="#testimonials" class="text-gray-700 hover:text-blue-800 font-medium">Depoimentos</a>
                    <a href="#modules" class="text-gray-700 hover:text-blue-800 font-medium">Módulos</a>
                    <a href="#contact" class="text-gray-700 hover:text-blue-800 font-medium">Contato</a>
                </div>
                <a href="login.php"
                    class="bg-blue-800 text-white px-6 py-2 rounded-lg hover:bg-blue-900 transition font-medium">
                    Acessar Sistema
                </a>
            </div>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero-gradient pt-32 pb-20 px-6 fade-in">
        <div class="container mx-auto text-center text-white">
            <h1 class="text-5xl md:text-6xl font-bold mb-6 leading-tight">
                O Fluxo Certo para a Sua Vitória
            </h1>
            <p class="text-xl md:text-2xl mb-8 max-w-3xl mx-auto opacity-90">
                Sistema integrado de gestão de vendas e CRM com IA para impulsionar seus resultados comerciais -
                licitações públicas, vendas B2B e mais
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="login.php"
                    class="bg-white text-blue-800 px-8 py-4 rounded-lg font-semibold text-lg hover:bg-gray-100 transition shadow-lg">
                    Começar Agora
                </a>
                <a href="#features"
                    class="bg-transparent border-2 border-white text-white px-8 py-4 rounded-lg font-semibold text-lg hover:bg-white hover:text-blue-800 transition">
                    Conhecer Recursos
                </a>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-20 px-6">
        <div class="container mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Funcionalidades Completas</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Tudo que você precisa para gerenciar vendas, licitações e relacionamento com clientes em um único
                    lugar
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <div class="feature-card bg-white p-8 rounded-xl shadow-md">
                    <div class="bg-blue-100 w-16 h-16 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-blue-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-3">Gestão de Oportunidades</h3>
                    <p class="text-gray-600">
                        Acompanhe licitações, propostas comerciais, prazos e documentação de forma organizada. Receba
                        notificações automáticas e nunca perca uma oportunidade.
                    </p>
                </div>

                <div class="feature-card bg-white p-8 rounded-xl shadow-md">
                    <div class="bg-green-100 w-16 h-16 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-green-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-3">CRM Inteligente</h3>
                    <p class="text-gray-600">
                        Funil de vendas completo, controle de leads, propostas e histórico de interações. Gerencie todo
                        o ciclo comercial do início ao fechamento.
                    </p>
                </div>

                <div class="feature-card bg-white p-8 rounded-xl shadow-md">
                    <div class="bg-purple-100 w-16 h-16 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-purple-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-3">Relatórios & Analytics</h3>
                    <p class="text-gray-600">
                        Dashboards completos com métricas de desempenho, taxa de conversão e análise de oportunidades em
                        tempo real para decisões estratégicas.
                    </p>
                </div>

                <div class="feature-card bg-white p-8 rounded-xl shadow-md border-2 border-yellow-400">
                    <div class="bg-yellow-100 w-16 h-16 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-yellow-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z">
                            </path>
                        </svg>
                    </div>
                    <div
                        class="bg-yellow-100 text-yellow-800 text-xs font-bold px-2 py-1 rounded-full inline-block mb-3">
                        IA INTEGRADA</div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-3">Inteligência Artificial</h3>
                    <p class="text-gray-600">
                        Análise automatizada de editais, geração de recursos, intensão de recurso, pedidos de
                        esclarecimento, impugnações e muito mais com IA.
                    </p>
                </div>

                <div class="feature-card bg-white p-8 rounded-xl shadow-md">
                    <div class="bg-orange-100 w-16 h-16 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-orange-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-3">Notificações Inteligentes</h3>
                    <p class="text-gray-600">
                        Alertas automáticos por email e sistema para prazos, novas oportunidades e mudanças de status.
                        Mantenha o controle total.
                    </p>
                </div>

                <div class="feature-card bg-white p-8 rounded-xl shadow-md">
                    <div class="bg-red-100 w-16 h-16 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-red-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-3">Segurança Total</h3>
                    <p class="text-gray-600">
                        Controle de acesso por perfil, auditoria de ações e proteção de dados sensíveis com criptografia
                        para garantir confidencialidade.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- AI Features Highlight Section -->
    <section class="bg-gradient-to-br from-yellow-50 to-orange-50 py-20 px-6">
        <div class="container mx-auto">
            <div class="text-center mb-12">
                <div
                    class="inline-block bg-yellow-100 text-yellow-800 px-4 py-2 rounded-full text-sm font-semibold mb-4">
                    🤖 TECNOLOGIA DE IA
                </div>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                    Inteligência Artificial a Seu Favor
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Economize horas de trabalho com análise e elaboração automatizada de documentos para licitações
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
                <div class="bg-white p-6 rounded-xl shadow-md">
                    <div class="flex items-center gap-3 mb-3">
                        <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <h3 class="text-lg font-bold text-gray-900">Análise de Editais</h3>
                    </div>
                    <p class="text-gray-600 text-sm">IA analisa automaticamente editais, identificando pontos críticos,
                        requisitos e oportunidades</p>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-md">
                    <div class="flex items-center gap-3 mb-3">
                        <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <h3 class="text-lg font-bold text-gray-900">Elaboração de Recursos</h3>
                    </div>
                    <p class="text-gray-600 text-sm">Geração automática de recursos administrativos com fundamentação
                        técnica e legal</p>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-md">
                    <div class="flex items-center gap-3 mb-3">
                        <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <h3 class="text-lg font-bold text-gray-900">Intensão de Recurso</h3>
                    </div>
                    <p class="text-gray-600 text-sm">Cria automaticamente intensões de recurso conforme normas e prazos
                        legais</p>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-md">
                    <div class="flex items-center gap-3 mb-3">
                        <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <h3 class="text-lg font-bold text-gray-900">Pedidos de Esclarecimento</h3>
                    </div>
                    <p class="text-gray-600 text-sm">Elabora pedidos de esclarecimento técnicos sobre pontos complexos
                        ou ambíguos</p>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-md">
                    <div class="flex items-center gap-3 mb-3">
                        <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <h3 class="text-lg font-bold text-gray-900">Impugnações</h3>
                    </div>
                    <p class="text-gray-600 text-sm">Gera impugnações fundamentadas para contestar irregularidades em
                        editais</p>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-md">
                    <div class="flex items-center gap-3 mb-3">
                        <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <h3 class="text-lg font-bold text-gray-900">Outros Documentos</h3>
                    </div>
                    <p class="text-gray-600 text-sm">Geração de contropropostas, justificativas técnicas e demais
                        documentos processuais</p>
                </div>
            </div>

            <div class="bg-white p-8 rounded-2xl shadow-lg text-center">
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Acelere Seu Processo de Análise</h3>
                <p class="text-gray-600 mb-6">
                    A IA do BidFlow reduz em até 80% o tempo gasto na análise de editais e elaboração de documentos,
                    permitindo que sua equipe foque em estratégia e relacionamento com clientes.
                </p>
                <div class="text-4xl font-bold text-yellow-600">80% mais rápido</div>
            </div>
        </div>
    </section>

    <!-- Benefits Section -->
    <section id="benefits" class="bg-white py-20 px-6">
        <div class="container mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Por Que Escolher o BidFlow?</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Desenvolvido para empresas que buscam excelência em gestão comercial e vendas estratégicas
                </p>
            </div>

            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <div class="space-y-6">
                        <div class="flex gap-4">
                            <div class="flex-shrink-0">
                                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                                    <svg class="w-6 h-6 text-blue-800" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-900 mb-2">Aumente Suas Taxas de Fechamento</h3>
                                <p class="text-gray-600">Organize propostas, acompanhe prazos e nunca perca
                                    oportunidades importantes de vendas ou licitações</p>
                            </div>
                        </div>

                        <div class="flex gap-4">
                            <div class="flex-shrink-0">
                                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                                    <svg class="w-6 h-6 text-blue-800" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-900 mb-2">Economize Tempo e Recursos</h3>
                                <p class="text-gray-600">Automatize processos repetitivos e concentre sua equipe em
                                    atividades estratégicas que geram resultados</p>
                            </div>
                        </div>

                        <div class="flex gap-4">
                            <div class="flex-shrink-0">
                                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                                    <svg class="w-6 h-6 text-blue-800" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-900 mb-2">Decisões Baseadas em Dados</h3>
                                <p class="text-gray-600">Relatórios detalhados ajudam a identificar padrões e melhorar
                                    estratégias comerciais continuamente</p>
                            </div>
                        </div>

                        <div class="flex gap-4">
                            <div class="flex-shrink-0">
                                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                                    <svg class="w-6 h-6 text-blue-800" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-900 mb-2">Equipe Sempre Alinhada</h3>
                                <p class="text-gray-600">Informações centralizadas garantem que todos trabalhem com os
                                    mesmos dados atualizados em tempo real</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-blue-800 to-blue-900 p-12 rounded-2xl text-white">
                    <h3 class="text-3xl font-bold mb-6">Resultados Comprovados</h3>
                    <div class="space-y-6">
                        <div>
                            <div class="text-5xl font-bold mb-2">+40%</div>
                            <p class="text-blue-200">Aumento na taxa de conversão de propostas comerciais</p>
                        </div>
                        <div>
                            <div class="text-5xl font-bold mb-2">-60%</div>
                            <p class="text-blue-200">Redução no tempo de gestão de processos de vendas</p>
                        </div>
                        <div>
                            <div class="text-5xl font-bold mb-2">100%</div>
                            <p class="text-blue-200">Controle sobre prazos e oportunidades comerciais</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Customization Section -->
    <section id="customization" class="py-20 px-6 bg-gradient-to-br from-purple-50 to-blue-50">
        <div class="container mx-auto">
            <div class="text-center mb-16">
                <div
                    class="inline-block bg-purple-100 text-purple-800 px-4 py-2 rounded-full text-sm font-semibold mb-4">
                    SOLUÇÃO PERSONALIZADA
                </div>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                    Sistema Sob Medida para Seu Negócio
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    O BidFlow pode e é totalmente personalizado de acordo com as necessidades específicas do seu cliente
                    e segmento de atuação
                </p>
            </div>

            <div class="grid md:grid-cols-2 gap-8 mb-12">
                <div class="bg-white p-8 rounded-2xl shadow-lg">
                    <div class="flex items-start gap-4 mb-4">
                        <div class="bg-purple-100 p-3 rounded-lg">
                            <svg class="w-8 h-8 text-purple-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-gray-900 mb-3">Fluxos Personalizados</h3>
                            <p class="text-gray-600">
                                Adapte os processos de trabalho, etapas do funil de vendas, status de oportunidades e
                                workflows conforme a metodologia da sua empresa.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-8 rounded-2xl shadow-lg">
                    <div class="flex items-start gap-4 mb-4">
                        <div class="bg-blue-100 p-3 rounded-lg">
                            <svg class="w-8 h-8 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-gray-900 mb-3">Interface Adaptável</h3>
                            <p class="text-gray-600">
                                Personalize cores, logotipo, nome do sistema e elementos visuais para refletir a
                                identidade da sua marca e criar uma experiência única.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-8 rounded-2xl shadow-lg">
                    <div class="flex items-start gap-4 mb-4">
                        <div class="bg-green-100 p-3 rounded-lg">
                            <svg class="w-8 h-8 text-green-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-gray-900 mb-3">Campos Customizados</h3>
                            <p class="text-gray-600">
                                Adicione campos específicos para capturar informações relevantes ao seu segmento, desde
                                dados técnicos até métricas personalizadas de negócio.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-8 rounded-2xl shadow-lg">
                    <div class="flex items-start gap-4 mb-4">
                        <div class="bg-orange-100 p-3 rounded-lg">
                            <svg class="w-8 h-8 text-orange-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-gray-900 mb-3">Integrações Sob Demanda</h3>
                            <p class="text-gray-600">
                                Conecte o BidFlow aos sistemas que você já utiliza: ERP, e-mail marketing, ferramentas
                                de comunicação, plataformas governamentais e mais.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-gradient-to-r from-purple-600 to-blue-600 p-10 rounded-2xl text-white text-center">
                <h3 class="text-3xl font-bold mb-4">Sua Necessidade, Nossa Solução</h3>
                <p class="text-lg mb-6 opacity-90 max-w-2xl mx-auto">
                    Cada empresa tem desafios únicos. O BidFlow é desenvolvido para se moldar perfeitamente ao seu
                    processo de trabalho, não o contrário. Entre em contato e conte-nos sobre suas necessidades
                    específicas.
                </p>
                <a href="https://wa.me/5581988881820?text=Ol%C3%A1%2C%20gostaria%20de%20saber%20mais%20sobre%20o%20BidFlow"
                    target="_blank"
                    class="inline-block bg-white text-purple-700 px-8 py-4 rounded-lg font-semibold text-lg hover:bg-gray-100 transition shadow-lg">
                    Falar pelo WhatsApp
                </a>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="bg-white py-20 px-6">
        <div class="container mx-auto">
            <div class="text-center mb-16">
                <div class="inline-block bg-green-100 text-green-800 px-4 py-2 rounded-full text-sm font-semibold mb-4">
                    ⭐ DEPOIMENTOS
                </div>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                    O Que Nossos Clientes Dizem
                </h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Veja como o BidFlow está transformando a gestão comercial de empresas em todo o Brasil
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8 mb-12">
                <!-- Depoimento 1 -->
                <div class="bg-gray-50 p-8 rounded-2xl shadow-lg">
                    <div class="flex gap-1 mb-4">
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                            </path>
                        </svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                            </path>
                        </svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                            </path>
                        </svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                            </path>
                        </svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                            </path>
                        </svg>
                    </div>
                    <p class="text-gray-700 mb-6 italic">
                        "O BidFlow revolucionou nossa forma de trabalhar com licitações. A IA para análise de editais
                        economiza horas do nosso time. Aumentamos nossa taxa de vitória em 35% no primeiro ano!"
                    </p>
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                            <span class="text-blue-800 font-bold text-lg">GM</span>
                        </div>
                        <div>
                            <p class="font-bold text-gray-900">Gustavo Monteiro</p>
                            <p class="text-sm text-gray-600">Diretora Comercial - Servklin Serviços Ambientais</p>
                        </div>
                    </div>
                </div>

                <!-- Depoimento 2 -->
                <div class="bg-gray-50 p-8 rounded-2xl shadow-lg">
                    <div class="flex gap-1 mb-4">
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                            </path>
                        </svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                            </path>
                        </svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                            </path>
                        </svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                            </path>
                        </svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                            </path>
                        </svg>
                    </div>
                    <p class="text-gray-700 mb-6 italic">
                        "Sistema intuitivo e completo. O CRM integrado com gestão de licitações é exatamente o que
                        precisavamos. A equipe comercial está muito mais produtiva e organizada."
                    </p>
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                            <span class="text-green-800 font-bold text-lg">RA</span>
                        </div>
                        <div>
                            <p class="font-bold text-gray-900">Rubens Arantes Júnior</p>
                            <p class="text-sm text-gray-600">CEO - FR Produtos Médicos</p>
                        </div>
                    </div>
                </div>

                <!-- Depoimento 3 -->
                <div class="bg-gray-50 p-8 rounded-2xl shadow-lg">
                    <div class="flex gap-1 mb-4">
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                            </path>
                        </svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                            </path>
                        </svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                            </path>
                        </svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                            </path>
                        </svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                            </path>
                        </svg>
                    </div>
                    <p class="text-gray-700 mb-6 italic">
                        "A funcionalidade de geração automática de recursos e impugnações é incrível. Reduzimos
                        significativamente o tempo de resposta e melhoramos a qualidade técnica dos documentos."
                    </p>
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center">
                            <span class="text-purple-800 font-bold text-lg">PC</span>
                        </div>
                        <div>
                            <p class="font-bold text-gray-900">Priscilla Cabral</p>
                            <p class="text-sm text-gray-600">Gerente de Licitações - Grupo Cabral Comercio e Serviços
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-gradient-to-r from-green-500 to-teal-500 p-10 rounded-2xl text-white text-center">
                <h3 class="text-3xl font-bold mb-4">Faça Parte dos Nossos Cases de Sucesso</h3>
                <p class="text-lg mb-6 opacity-90 max-w-2xl mx-auto">
                    Junte-se a centenas de empresas que já transformaram sua gestão comercial com o BidFlow
                </p>
                <a href="https://wa.me/5581988881820?text=Ol%C3%A1%2C%20gostaria%20de%20agendar%20uma%20demonstra%C3%A7%C3%A3o%20do%20BidFlow"
                    target="_blank"
                    class="inline-block bg-white text-green-700 px-8 py-4 rounded-lg font-semibold text-lg hover:bg-gray-100 transition shadow-lg">
                    Agendar Demonstração
                </a>
            </div>
        </div>
    </section>

    <!-- Modules Section -->
    <section id="modules" class="py-20 px-6 bg-gray-50">
        <div class="container mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Dois Módulos Poderosos</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Integrados mas independentes, para atender todas as suas necessidades comerciais
                </p>
            </div>

            <div class="grid md:grid-cols-2 gap-8">
                <div class="bg-gradient-to-br from-blue-50 to-blue-100 p-10 rounded-2xl">
                    <div class="bg-blue-800 w-16 h-16 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-3xl font-bold text-gray-900 mb-4">Gestão de Licitações e Vendas</h3>
                    <p class="text-gray-700 mb-6">
                        Módulo completo para acompanhamento de licitações públicas, editais, propostas comerciais,
                        gestão de documentos, controle de prazos e histórico de participações.
                    </p>
                    <ul class="space-y-3">
                        <li class="flex items-start gap-3">
                            <svg class="w-6 h-6 text-blue-800 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-gray-700">Cadastro de editais, licitações e oportunidades
                                comerciais</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-6 h-6 text-blue-800 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-gray-700">Alertas automáticos de prazos críticos e vencimentos</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-6 h-6 text-blue-800 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-gray-700">Gestão de documentação, anexos e propostas técnicas</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-6 h-6 text-blue-800 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-gray-700">Relatórios de desempenho e taxa de sucesso em vendas</span>
                        </li>
                    </ul>
                </div>

                <div class="bg-gradient-to-br from-green-50 to-green-100 p-10 rounded-2xl">
                    <div class="bg-green-700 w-16 h-16 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-3xl font-bold text-gray-900 mb-4">CRM - Funil de Vendas</h3>
                    <p class="text-gray-700 mb-6">
                        Sistema completo de relacionamento com clientes, desde a prospecção até o pós-venda, com funil
                        de vendas visual e gestão completa do ciclo comercial.
                    </p>
                    <ul class="space-y-3">
                        <li class="flex items-start gap-3">
                            <svg class="w-6 h-6 text-green-700 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-gray-700">Gestão completa de leads, prospects e oportunidades</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-6 h-6 text-green-700 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-gray-700">Funil visual com etapas personalizáveis por segmento</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-6 h-6 text-green-700 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-gray-700">Histórico completo de interações e follow-ups</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-6 h-6 text-green-700 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-gray-700">Indicadores e métricas de performance comercial</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section id="contact" class="hero-gradient py-20 px-6">
        <div class="container mx-auto text-center">
            <h2 class="text-4xl md:text-5xl font-bold text-white mb-6">
                Pronto para Transformar Sua Gestão Comercial?
            </h2>
            <p class="text-xl text-white opacity-90 mb-8 max-w-2xl mx-auto">
                Entre em contato e descubra como o BidFlow pode impulsionar seus resultados em vendas, licitações e
                relacionamento com clientes
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="login.php"
                    class="bg-white text-blue-800 px-8 py-4 rounded-lg font-semibold text-lg hover:bg-gray-100 transition shadow-lg">
                    Acessar Sistema
                </a>
                <a href="https://wa.me/5581988881820?text=Ol%C3%A1%2C%20gostaria%20de%20saber%20mais%20sobre%20o%20BidFlow"
                    target="_blank"
                    class="bg-green-500 text-white px-8 py-4 rounded-lg font-semibold text-lg hover:bg-green-600 transition shadow-lg flex items-center justify-center gap-2">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" />
                    </svg>
                    Falar pelo WhatsApp
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-300 py-12 px-6">
        <div class="container mx-auto">
            <div class="grid md:grid-cols-3 gap-8">
                <div>
                    <img src="crm/imagens/logo-1080-fb.png" alt="Logo BidFlow" class="h-12 mb-4">
                    <p class="text-sm">
                        Sistema integrado de gestão de vendas e CRM com IA desenvolvido para empresas que buscam
                        excelência em vendas estratégicas, licitações e relacionamento comercial.
                    </p>
                </div>
                <div>
                    <h4 class="text-white font-semibold mb-4">Links Rápidos</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#features" class="hover:text-white transition">Funcionalidades</a></li>
                        <li><a href="#benefits" class="hover:text-white transition">Benefícios</a></li>
                        <li><a href="#customization" class="hover:text-white transition">Personalização</a></li>
                        <li><a href="#testimonials" class="hover:text-white transition">Depoimentos</a></li>
                        <li><a href="#modules" class="hover:text-white transition">Módulos</a></li>
                        <li><a href="login.php" class="hover:text-white transition">Acessar Sistema</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-white font-semibold mb-4">Contato</h4>
                    <ul class="space-y-2 text-sm">
                        <li>
                            <a href="https://wa.me/5581988881820" target="_blank"
                                class="hover:text-white transition flex items-center gap-2">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" />
                                </svg>
                                WhatsApp: (81) 98888-1820
                            </a>
                        </li>
                        <li>Email: contato@bidflow.com.br</li>
                        <li>Website: www.bidflow.com.br</li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-sm">
                <p>&copy; 2026 BidFlow. Todos os direitos reservados. Powered by BidFlow.</p>
            </div>
        </div>
    </footer>

    <script>
        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>
</body>

</html>