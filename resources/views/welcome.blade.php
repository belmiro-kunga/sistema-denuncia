@extends('layouts.app')

@section('content')
<!-- Navbar -->
<nav class="bg-white shadow-sm py-4 px-8 flex justify-between items-center">
    <div class="flex items-center gap-2">
        <span class="font-bold text-blue-700 text-lg"><svg class="inline w-5 h-5 mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 3l8 4v5c0 5.25-3.5 10-8 10S4 17.25 4 12V7l8-4z"/></svg>Portal de Denúncias</span>
    </div>
    <ul class="flex gap-6 text-gray-700 font-medium">
        <li><a href="#" class="hover:text-blue-700">Início</a></li>
        <li><a href="#como-funciona" class="hover:text-blue-700">Como Funciona</a></li>
        <li><a href="#categorias" class="hover:text-blue-700">Categorias</a></li>
        <li><a href="#contato" class="hover:text-blue-700">Contato</a></li>
        <li><a href="#acompanhar" class="hover:text-blue-700">Acompanhar Denúncia</a></li>
        <li><a href="#" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Fazer Denúncia</a></li>
    </ul>
</nav>

<!-- Hero Section -->
<section class="bg-blue-600 text-white py-16 px-4">
    <div class="max-w-5xl mx-auto flex flex-col md:flex-row items-center justify-between gap-8">
        <div class="flex-1">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Seu Canal Seguro de Denúncias</h1>
            <p class="mb-6 text-lg">Reporte irregularidades de forma segura, confidencial e anônima. Sua voz é importante para construir um ambiente mais ético e transparente.</p>
            <div class="flex gap-4 mb-6">
                <a href="#" class="bg-white text-blue-700 font-semibold px-6 py-3 rounded shadow hover:bg-blue-50 transition">Fazer Denúncia Agora</a>
                <a href="#acompanhar" class="border border-white px-6 py-3 rounded font-semibold hover:bg-white hover:text-blue-700 transition">Acompanhar Caso</a>
            </div>
        </div>
        <div class="flex-1 max-w-md bg-blue-500 bg-opacity-30 rounded-lg p-8">
            <h2 class="font-bold text-xl mb-4 flex items-center gap-2"><svg class="w-6 h-6 inline" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 11c0-1.104.896-2 2-2s2 .896 2 2-.896 2-2 2-2-.896-2-2z"/><path stroke-linecap="round" stroke-linejoin="round" d="M12 19c-4.418 0-8-3.582-8-8V7l8-4 8 4v4c0 4.418-3.582 8-8 8z"/></svg> Acesso Seguro</h2>
            <ul class="space-y-2">
                <li class="flex items-center gap-2"><span class="text-green-300">&#10003;</span> Criptografia de ponta a ponta</li>
                <li class="flex items-center gap-2"><span class="text-green-300">&#10003;</span> Anonimato garantido</li>
                <li class="flex items-center gap-2"><span class="text-green-300">&#10003;</span> Disponível 24/7</li>
            </ul>
        </div>
    </div>
</section>

<!-- Indicadores -->
<section class="bg-white py-12">
    <div class="max-w-5xl mx-auto grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
        <div>
            <span class="text-3xl font-bold text-blue-700">500+</span>
            <p class="text-gray-600">Denúncias Processadas</p>
        </div>
        <div>
            <span class="text-3xl font-bold text-blue-700">95%</span>
            <p class="text-gray-600">Taxa de Resolução</p>
        </div>
        <div>
            <span class="text-3xl font-bold text-blue-700">24h</span>
            <p class="text-gray-600">Tempo Médio de Resposta</p>
        </div>
        <div>
            <span class="text-3xl font-bold text-blue-700">100%</span>
            <p class="text-gray-600">Confidencialidade</p>
        </div>
    </div>
</section>

<!-- Como Funciona -->
<section id="como-funciona" class="py-16 bg-gray-50">
    <div class="max-w-5xl mx-auto text-center mb-12">
        <h2 class="text-3xl font-bold mb-4">Como Funciona</h2>
        <p class="text-gray-600">Nosso sistema foi desenvolvido para garantir máxima segurança e confidencialidade em todas as etapas do processo de denúncia.</p>
    </div>
    <div class="max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="bg-white rounded-lg shadow p-6">
            <div class="text-blue-600 text-2xl font-bold mb-2">1</div>
            <h3 class="font-semibold mb-2">Relate o Problema</h3>
            <p class="text-gray-600">Descreva a situação de forma detalhada e anexe evidências se necessário. Você pode escolher ser anônimo ou identificar-se.</p>
        </div>
        <div class="bg-white rounded-lg shadow p-6">
            <div class="text-blue-600 text-2xl font-bold mb-2">2</div>
            <h3 class="font-semibold mb-2">Análise Especializada</h3>
            <p class="text-gray-600">Nossa equipe especializada analisa sua denúncia em até 48 horas e inicia o processo de investigação adequado.</p>
        </div>
        <div class="bg-white rounded-lg shadow p-6">
            <div class="text-blue-600 text-2xl font-bold mb-2">3</div>
            <h3 class="font-semibold mb-2">Acompanhamento</h3>
            <p class="text-gray-600">Receba atualizações sobre o andamento do seu caso através do código de protocolo fornecido no momento da denúncia.</p>
        </div>
    </div>
</section>

<!-- Tipos de Denúncia -->
<section id="categorias" class="py-16 bg-white">
    <div class="max-w-5xl mx-auto text-center mb-12">
        <h2 class="text-3xl font-bold mb-4">Tipos de Denúncia</h2>
        <p class="text-gray-600">Selecione a categoria que melhor se adequa à sua situação</p>
    </div>
    <div class="max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
        <div class="bg-gray-100 rounded-lg p-6 hover:bg-blue-50 cursor-pointer">Assédio e Discriminação</div>
        <div class="bg-gray-100 rounded-lg p-6 hover:bg-blue-50 cursor-pointer">Corrupção e Suborno</div>
        <div class="bg-gray-100 rounded-lg p-6 hover:bg-blue-50 cursor-pointer">Conflito de Interesses</div>
        <div class="bg-gray-100 rounded-lg p-6 hover:bg-blue-50 cursor-pointer">Fraude Financeira</div>
        <div class="bg-gray-100 rounded-lg p-6 hover:bg-blue-50 cursor-pointer">Violação de Segurança</div>
        <div class="bg-gray-100 rounded-lg p-6 hover:bg-blue-50 cursor-pointer">Má Conduta Profissional</div>
        <div class="bg-gray-100 rounded-lg p-6 hover:bg-blue-50 cursor-pointer">Outros</div>
    </div>
</section>

<!-- Depoimentos -->
<section class="py-16 bg-gray-50">
    <div class="max-w-5xl mx-auto text-center mb-12">
        <h2 class="text-3xl font-bold mb-4">Depoimentos</h2>
        <p class="text-gray-600">Veja o que nossos usuários falam sobre o sistema</p>
    </div>
    <div class="max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center mb-2">
                <span class="text-yellow-400 text-xl mr-2">★★★★★</span>
            </div>
            <p class="text-gray-700 mb-2">"O sistema me deu a confiança necessária para reportar uma situação que me incomodava há meses. O processo foi totalmente confidencial."</p>
            <span class="text-gray-500 text-sm">Usuário Anônimo<br>Funcionário</span>
        </div>
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center mb-2">
                <span class="text-yellow-400 text-xl mr-2">★★★★★</span>
            </div>
            <p class="text-gray-700 mb-2">"Excelente plataforma! A resposta foi rápida e o acompanhamento constante me tranquilizou durante todo o processo."</p>
            <span class="text-gray-500 text-sm">M. Silva<br>Colaborador</span>
        </div>
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center mb-2">
                <span class="text-yellow-400 text-xl mr-2">★★★★★</span>
            </div>
            <p class="text-gray-700 mb-2">"Interface intuitiva e processo simples. Me senti segura para relatar o problema sem medo de represálias."</p>
            <span class="text-gray-500 text-sm">Usuário Anônimo<br>Terceirizado</span>
        </div>
    </div>
</section>

<!-- Contato -->
<section id="contato" class="py-16 bg-white">
    <div class="max-w-5xl mx-auto text-center mb-12">
        <h2 class="text-3xl font-bold mb-4">Outras Formas de Contato</h2>
        <p class="text-gray-600">Além do portal online, você também pode nos contactar através de</p>
    </div>
    <div class="max-w-3xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">
        <div>
            <div class="flex flex-col items-center">
                <svg class="w-8 h-8 text-blue-600 mb-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H5a2 2 0 01-2-2V5zm0 12a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H5a2 2 0 01-2-2v-2zm12-12a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zm0 12a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
                <span class="font-semibold">Telefone</span>
                <span class="text-gray-600">0800 123 4567<br>24 horas, 7 dias por semana</span>
            </div>
        </div>
        <div>
            <div class="flex flex-col items-center">
                <svg class="w-8 h-8 text-blue-600 mb-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16 12H8m8 0a4 4 0 11-8 0 4 4 0 018 0zm0 0v1a4 4 0 01-8 0v-1m8 0V7a4 4 0 00-8 0v5"/></svg>
                <span class="font-semibold">Email</span>
                <span class="text-gray-600">denuncias@empresa.com<br>Resposta em até 24h</span>
            </div>
        </div>
        <div>
            <div class="flex flex-col items-center">
                <svg class="w-8 h-8 text-blue-600 mb-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 3C7.03 3 3 7.03 3 12c0 4.97 4.03 9 9 9s9-4.03 9-9c0-4.97-4.03-9-9-9zm0 0v9l7 4"/></svg>
                <span class="font-semibold">Portal Web</span>
                <span class="text-gray-600">www.portal-denuncias.com<br>Disponível sempre</span>
            </div>
        </div>
    </div>
</section>

<!-- Rodapé -->
<footer class="bg-blue-700 text-white py-10 mt-8">
    <div class="max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-8">
        <div>
            <h3 class="font-bold mb-2">Portal de Denúncias</h3>
            <p class="text-sm">Seu canal seguro e confidencial para reportar irregularidades e construir um ambiente mais ético.</p>
        </div>
        <div>
            <h3 class="font-bold mb-2">Links Rápidos</h3>
            <ul class="text-sm space-y-1">
                <li><a href="#" class="hover:underline">Início</a></li>
                <li><a href="#como-funciona" class="hover:underline">Como Funciona</a></li>
                <li><a href="#categorias" class="hover:underline">Categorias</a></li>
                <li><a href="#contato" class="hover:underline">Contato</a></li>
            </ul>
        </div>
        <div>
            <h3 class="font-bold mb-2">Suporte</h3>
            <ul class="text-sm space-y-1">
                <li><a href="#" class="hover:underline">FAQ</a></li>
                <li><a href="#" class="hover:underline">Política de Privacidade</a></li>
                <li><a href="#" class="hover:underline">Termos de Uso</a></li>
                <li><a href="#acompanhar" class="hover:underline">Acompanhar Denúncia</a></li>
            </ul>
        </div>
        <div>
            <h3 class="font-bold mb-2">Contato</h3>
            <ul class="text-sm space-y-1">
                <li>0800 123 4567</li>
                <li>denuncias@empresa.com</li>
            </ul>
        </div>
    </div>
    <div class="text-center text-xs text-blue-100 mt-8">© 2025 Portal de Denúncias. Todos os direitos reservados.</div>
</footer>
@endsection
