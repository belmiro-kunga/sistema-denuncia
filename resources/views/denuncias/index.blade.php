<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Sistema de Denúncias</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8">
                <h1>Sistema de Denúncias</h1>
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Nova Denúncia</h2>
                        <form id="denunciaForm" action="{{ route('denuncias.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="mb-3">
                                <label for="categoria" class="form-label">Categoria</label>
                                <select class="form-control" id="categoria" name="categoria_id" required>
                                    <option value="">Selecione uma categoria</option>
                                    @foreach($categorias as $categoria)
                                        <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="descricao" class="form-label">Descrição</label>
                                <textarea class="form-control" id="descricao" name="descricao" rows="4" required></textarea>
                            </div>

                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="anonima" name="anonima">
                                    <label class="form-check-label" for="anonima">
                                        Denúncia Anônima
                                    </label>
                                </div>
                            </div>

                            <div id="denuncianteFields" class="mb-3" style="display: none;">
                                <div class="mb-3">
                                    <label for="nome_denunciante" class="form-label">Nome do Denunciante</label>
                                    <input type="text" class="form-control" id="nome_denunciante" name="nome_denunciante">
                                </div>

                                <div class="mb-3">
                                    <label for="email_denunciante" class="form-label">Email do Denunciante</label>
                                    <input type="email" class="form-control" id="email_denunciante" name="email_denunciante">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="anexos" class="form-label">Anexos</label>
                                <input type="file" class="form-control" id="anexos" name="anexos[]" multiple>
                            </div>

                            <button type="submit" class="btn btn-primary">Enviar Denúncia</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Categorias Disponíveis</h3>
                        <ul class="list-group">
                            @foreach($categorias as $categoria)
                                <li class="list-group-item">
                                    {{ $categoria->nome }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Configuração do CSRF token para requisições AJAX
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Mostrar/ocultar campos do denunciante
        $('#anonima').change(function() {
            if ($(this).is(':checked')) {
                $('#denuncianteFields').hide();
            } else {
                $('#denuncianteFields').show();
            }
        });
    </script>
</body>
</html>
