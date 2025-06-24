@extends('layouts.app')

@section('content')
<div class="flex flex-col md:flex-row min-h-screen bg-gray-100">
    <!-- Sidebar -->
    <aside class="w-full md:w-64 bg-white border-r border-gray-200 flex flex-col">
        <div class="p-6 border-b border-gray-200">
            <h2 class="text-xl font-bold text-gray-800">Sistema de Denúncias</h2>
            <span class="text-xs text-gray-500">Gestão Corporativa</span>
        </div>
        <nav class="flex-1 p-4">
            <ul class="space-y-2">
                <li><a href="#" class="flex items-center px-3 py-2 rounded-lg bg-blue-50 text-blue-700 font-semibold"><svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0h6"/></svg> Dashboard</a></li>
                <li><a href="#" class="flex items-center px-3 py-2 rounded-lg text-gray-700 hover:bg-gray-100"><svg class="w-5 h-5 mr-2 text-gray-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 17v-6a2 2 0 012-2h2a2 2 0 012 2v6m-6 0h6"/></svg> Denúncias</a></li>
                <li><a href="#" class="flex items-center px-3 py-2 rounded-lg text-gray-700 hover:bg-gray-100"><svg class="w-5 h-5 mr-2 text-gray-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M5.121 17.804A13.937 13.937 0 0112 15c2.21 0 4.304.534 6.121 1.804M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg> Usuários</a></li>
                <li><a href="#" class="flex items-center px-3 py-2 rounded-lg text-gray-700 hover:bg-gray-100"><svg class="w-5 h-5 mr-2 text-gray-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 17v-6a2 2 0 012-2h2a2 2 0 012 2v6m-6 0h6"/></svg> Relatórios</a></li>
                <li><a href="#" class="flex items-center px-3 py-2 rounded-lg text-gray-700 hover:bg-gray-100"><svg class="w-5 h-5 mr-2 text-gray-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4"/></svg> Configurações</a></li>
            </ul>
        </nav>
    </aside>
    <!-- Main Content -->
    <main class="flex-1 p-4 md:p-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-lg shadow p-6 flex items-center">
                <div class="flex-1">
                    <div class="text-gray-500 text-sm">Total de Denúncias</div>
                    <div class="text-3xl font-bold text-gray-800">{{ $totalDenuncias ?? 0 }}</div>
                </div>
                <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M8 6h13M8 12h13M8 18h13M3 6h.01M3 12h.01M3 18h.01"/></svg>
            </div>
            <div class="bg-white rounded-lg shadow p-6 flex items-center">
                <div class="flex-1">
                    <div class="text-gray-500 text-sm">Denúncias Abertas</div>
                    <div class="text-3xl font-bold text-gray-800">{{ $denunciasAbertas ?? 0 }}</div>
                </div>
                <svg class="w-8 h-8 text-yellow-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 9v2m0 4h.01M21 12c0 4.97-4.03 9-9 9s-9-4.03-9-9 4.03-9 9-9 9 4.03 9 9z"/></svg>
            </div>
            <div class="bg-white rounded-lg shadow p-6 flex items-center">
                <div class="flex-1">
                    <div class="text-gray-500 text-sm">Casos Resolvidos</div>
                    <div class="text-3xl font-bold text-gray-800">{{ $casosResolvidos ?? 0 }}</div>
                </div>
                <svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M5 13l4 4L19 7"/></svg>
            </div>
            <div class="bg-white rounded-lg shadow p-6 flex items-center">
                <div class="flex-1">
                    <div class="text-gray-500 text-sm">Usuários Ativos</div>
                    <div class="text-3xl font-bold text-gray-800">{{ $usuariosAtivos ?? 0 }}</div>
                </div>
                <svg class="w-8 h-8 text-purple-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87M16 3.13a4 4 0 010 7.75M8 3.13a4 4 0 000 7.75"/></svg>
            </div>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Denúncias Recentes -->
            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="text-lg font-semibold mb-4">Denúncias Recentes</h3>
                <ul class="space-y-4">
                    @foreach($denunciasRecentes ?? [] as $denuncia)
                        <li class="border-l-4 pl-4 @if($denuncia['status'] === 'Em Investigação') border-yellow-400 @elseif($denuncia['status'] === 'Aberto') border-red-400 @elseif($denuncia['status'] === 'Resolvido') border-green-400 @else border-gray-300 @endif">
                            <div class="font-semibold text-gray-800">{{ $denuncia['titulo'] }}</div>
                            <div class="text-sm text-gray-500">{{ $denuncia['categoria'] }} • {{ $denuncia['data'] }}</div>
                            <span class="inline-block mt-1 px-2 py-0.5 rounded text-xs font-semibold @if($denuncia['status'] === 'Em Investigação') bg-yellow-100 text-yellow-800 @elseif($denuncia['status'] === 'Aberto') bg-red-100 text-red-800 @elseif($denuncia['status'] === 'Resolvido') bg-green-100 text-green-800 @else bg-gray-100 text-gray-800 @endif">{{ $denuncia['status'] }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
            <!-- Distribuição por Categoria -->
            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="text-lg font-semibold mb-4">Distribuição por Categoria</h3>
                <ul class="space-y-3">
                    @foreach($distribuicaoCategorias ?? [] as $cat)
                        <li class="flex items-center justify-between">
                            <span>{{ $cat['nome'] }}</span>
                            <div class="flex items-center w-40">
                                <div class="h-2 rounded bg-blue-200 w-full mr-2">
                                    <div class="h-2 rounded bg-blue-500" style="width: {{ $cat['quantidade'] * 8 }}px; max-width: 100%;"></div>
                                </div>
                                <span class="text-xs text-gray-700 font-semibold">{{ $cat['quantidade'] }}</span>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </main>
</div>
@endsection 