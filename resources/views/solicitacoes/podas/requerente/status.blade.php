@guest
<x-guest-layout>

    <div class="container" style="padding-top: 3rem; padding-bottom: 6rem;">
        <div class="form-row justify-content-center">
            <div class="col-md-12">
                <div class="form-row">
                    <div class="col-md-8">
                        <h4 class="card-title">Solicitação de poda/supressão</h4>
                        @can('usuarioInterno', \App\Models\User::class)
                            <h6 class="card-subtitle mb-2 text-muted">Solicitações de poda/supressão > Visualizar solicitação de poda/supressão {{$solicitacao->protocolo}}</h6>
                        @endcan
                    </div>
                    <div class="col-md-4" style="text-align: right; padding-top: 15px;">
                        {{-- <a class="btn my-2" href="{{route('podas.requerente.index')}}" style="cursor: pointer;"><img class="icon-licenciamento btn-voltar" src="{{asset('img/back-svgrepo-com.svg')}}"  alt="Voltar" title="Voltar"></a> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="form-row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="width: 100%;">
                    <div class="card-body">
                        <div class="row">
                                <div class="col-md-12 form-group">
                                    <label for="nome">Nome<span style="color: red; font-weight: bold;">
                                           *</span></label>
                                    <input id="nome" class="form-control" type="text"
                                        value="{{ $solicitacao->requerente->user->name }}" autocomplete="nome" disabled>
                                </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="email">E-mail<span style="color: red; font-weight: bold;">
                                       *</span></label>
                                <input id="email" class="form-control" type="text"
                                    value="{{ $solicitacao->requerente->user->email }}" autocomplete="email" disabled>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="cpf">{{ __('CPF') }}<span style="color: red; font-weight: bold;">
                                       *</span></label>
                                <input id="cpf" class="form-control simple-field-data-mask" type="text"
                                    value="{{ $solicitacao->requerente->cpf }}" autofocus autocomplete="cpf"
                                    data-mask="000.000.000-00" disabled>
                            </div>
                    </div>
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="cep">{{ __('CEP') }}<span style="color: red; font-weight: bold;">*</span></label>
                                    <input id="cep" class="form-control cep" type="text"  value="{{$solicitacao->endereco->cep}}" disabled>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="bairro">{{ __('Bairro') }}<span style="color: red; font-weight: bold;">*</span></label>
                                    <input id="bairro" class="form-control" type="text"  value="{{$solicitacao->endereco->bairro}}" disabled>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label for="rua">{{ __('Rua') }}<span style="color: red; font-weight: bold;">*</span></label>
                                    <input id="rua" class="form-control" type="text"  value="{{$solicitacao->endereco->rua}}" disabled>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="numero">{{ __('Número') }}<span style="color: red; font-weight: bold;">*</span></label>
                                    <input id="numero" class="form-control " type="text"  value="{{$solicitacao->endereco->numero}}" disabled>
                                </div>
                                @php
                                    $areas = App\Models\SolicitacaoPoda::AREA_ENUM;
                                @endphp
                                <div class="col-md-6 form-group">
                                    <label for="area">{{ __('Área') }}<span style="color: red; font-weight: bold;">*</span></label>
                                    <select disabled class="form-control" type="text" name="area" id="area">
                                        <option @if($solicitacao->area == $areas['publica']) selected @endif>Pública</option>
                                        <option @if($solicitacao->area == $areas['privada']) selected @endif>Privada</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="cidade">{{ __('Cidade') }}</label>
                                    <input id="cidade" class="form-control" type="text"  value="Garanhuns" disabled>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="estado">{{ __('Estado') }}</label>
                                    <select id="estado" class="form-control" type="text" disabled >
                                        <option selected value="PE">Pernambuco</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label for="complemento">{{ __('Complemento/Ponto de referência') }}</label>
                                    <input class="form-control" value="{{$solicitacao->endereco->complemento}}" type="text"  id="complemento" disabled/>
                                </div>
                            </div>

                            @if($solicitacao->nome_solicitante != null)
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label for="numero">{{ __('Nome do solicitante') }}</span></label>
                                        <input id="numero" class="form-control " type="text"  value="{{$solicitacao->nome_solicitante}}" disabled>
                                    </div>
                                </div>
                            @endif

                            
                            @if($solicitacao->telefone != null)
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label for="celular">{{ __('Contato') }}</label>
                                        <input id="celular" class="form-control" type="text" name="celular" value="{{ $solicitacao->telefone->numero }}" disabled> 
                                    </div>
                                </div>
                            @endif

                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="comentario">{{ __('Poda de árvores (Qual o motivo da solicitação?)') }}</label>
                                <textarea disabled class="form-control" type="text" id="comentario">{{$solicitacao->comentario}}</textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="motivo_solicitacao">{{ __('Corte de árvore (Qual o motivo da solicitação?)') }}</label>
                                <textarea disabled class="form-control" type="text" id="motivo_solicitacao">{{$solicitacao->motivo_solicitacao}}</textarea>
                            </div>
                        </div>
                        @if($solicitacao->fotos->first() != null)
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label for="imagens">{{ __('Imagens anexadas junto à solicitação') }}</label>
                                </div>
                                @foreach ($solicitacao->fotos as $foto)
                                    <div class="col-md-6">
                                        <div class="card" style="width: 100%;">
                                            <img src="{{route('podas.foto', ['solicitacao' => $solicitacao->id, 'foto' => $foto->id])}}" class="card-img-top" alt="...">
                                            @if ($foto->comentario != null)
                                                <div class="card-body">
                                                    <p class="card-text">{{$foto->comentario}}</p>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                        </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-row">
                    <div class="col-md-12" style="margin-bottom:20px">
                        <div class="card shadow bg-white" style="border-radius:12px; border-width:0px;">
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="col-md-12" style="margin-bottom: 0.5rem">
                                        <h5 class="card-title mb-0"
                                            style="color:#08a02e; font-weight:bold">
                                            Status da solicitação</h5>
                                    </div>
                                    <div class="col-md-12">
                                        @switch($solicitacao->status)
                                            @case(\App\Models\SolicitacaoMuda::STATUS_ENUM['registrada'])
                                                <h5>Solicitação em análise.</h5>
                                            @break
                                            @case(\App\Models\SolicitacaoMuda::STATUS_ENUM['deferido'])
                                                <h5>Solicitação deferida</h5>
                                            @break
                                            @case(\App\Models\SolicitacaoMuda::STATUS_ENUM['indeferido'])
                                                <h5>Solicitação indeferida</h5>
                                                <p>Motivo: {{$solicitacao->motivo_indeferimento}}</p>
                                            @break
                                        @endswitch
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-guest-layout>
@else
<x-app-layout>
    @section('content')
    <div class="container-fluid" style="padding-top: 3rem; padding-bottom: 6rem; padding-left: 10px; padding-right: 20px">
        <div class="form-row justify-content-center">
            <div class="col-md-12">
                <div class="form-row">
                    <div class="col-md-8">
                        <h4 class="card-title">Solicitação de poda/supressão</h4>
                        @can('usuarioInterno', \App\Models\User::class)
                            <h6 class="card-subtitle mb-2 text-muted">Solicitações de poda/supressão > Visualizar solicitação de poda/supressão {{$solicitacao->protocolo}}</h6>
                        @endcan
                    </div>
                    <div class="col-md-4" style="text-align: right; padding-top: 15px;">
                        {{-- <a class="btn my-2" href="{{route('podas.requerente.index')}}" style="cursor: pointer;"><img class="icon-licenciamento btn-voltar" src="{{asset('img/back-svgrepo-com.svg')}}"  alt="Voltar" title="Voltar"></a> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="form-row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="width: 100%;">
                    <div class="card-body">
                        <div class="row">
                                <div class="col-md-12 form-group">
                                    <label for="nome">Nome<span style="color: red; font-weight: bold;">
                                           *</span></label>
                                    <input id="nome" class="form-control" type="text"
                                        value="{{ $solicitacao->requerente->user->name }}" autocomplete="nome" disabled>
                                </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="email">E-mail<span style="color: red; font-weight: bold;">
                                       *</span></label>
                                <input id="email" class="form-control" type="text"
                                    value="{{ $solicitacao->requerente->user->email }}" autocomplete="email" disabled>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="cpf">{{ __('CPF') }}<span style="color: red; font-weight: bold;">
                                       *</span></label>
                                <input id="cpf" class="form-control simple-field-data-mask" type="text"
                                    value="{{ $solicitacao->requerente->cpf }}" autofocus autocomplete="cpf"
                                    data-mask="000.000.000-00" disabled>
                            </div>
                    </div>
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="cep">{{ __('CEP') }}<span style="color: red; font-weight: bold;">*</span></label>
                                    <input id="cep" class="form-control cep" type="text"  value="{{$solicitacao->endereco->cep}}" disabled>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="bairro">{{ __('Bairro') }}<span style="color: red; font-weight: bold;">*</span></label>
                                    <input id="bairro" class="form-control" type="text"  value="{{$solicitacao->endereco->bairro}}" disabled>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label for="rua">{{ __('Rua') }}<span style="color: red; font-weight: bold;">*</span></label>
                                    <input id="rua" class="form-control" type="text"  value="{{$solicitacao->endereco->rua}}" disabled>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="numero">{{ __('Número') }}<span style="color: red; font-weight: bold;">*</span></label>
                                    <input id="numero" class="form-control " type="text"  value="{{$solicitacao->endereco->numero}}" disabled>
                                </div>
                                @php
                                    $areas = App\Models\SolicitacaoPoda::AREA_ENUM;
                                @endphp
                                <div class="col-md-6 form-group">
                                    <label for="area">{{ __('Área') }}<span style="color: red; font-weight: bold;">*</span></label>
                                    <select disabled class="form-control" type="text" name="area" id="area">
                                        <option @if($solicitacao->area == $areas['publica']) selected @endif>Pública</option>
                                        <option @if($solicitacao->area == $areas['privada']) selected @endif>Privada</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="cidade">{{ __('Cidade') }}</label>
                                    <input id="cidade" class="form-control" type="text"  value="Garanhuns" disabled>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="estado">{{ __('Estado') }}</label>
                                    <select id="estado" class="form-control" type="text" disabled >
                                        <option selected value="PE">Pernambuco</option>
                                    </select>
                                </div>
                            </div>

                            @if($solicitacao->nome_solicitante != null)
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label for="numero">{{ __('Nome do solicitante') }}</span></label>
                                        <input id="numero" class="form-control " type="text"  value="{{$solicitacao->nome_solicitante}}" disabled>
                                    </div>
                                </div>
                            @endif

                            @if($solicitacao->telefone != null)
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label for="celular">{{ __('Contato') }}</label>
                                        <input id="celular" class="form-control" type="text" name="celular" value="{{ $solicitacao->telefone->numero }}" disabled> 
                                    </div>
                                </div>
                            @endif

                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label for="complemento">{{ __('Complemento/Ponto de referência') }}</label>
                                    <input class="form-control" value="{{$solicitacao->endereco->complemento}}" type="text"  id="complemento" disabled/>
                                </div>
                            </div>
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="comentario">{{ __('Poda de árvores (Qual o motivo da solicitação?)') }}</label>
                                <textarea disabled class="form-control" type="text" id="comentario">{{$solicitacao->comentario}}</textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="motivo_solicitacao">{{ __('Corte de árvore (Qual o motivo da solicitação?)') }}</label>
                                <textarea disabled class="form-control" type="text" id="motivo_solicitacao">{{$solicitacao->motivo_solicitacao}}</textarea>
                            </div>
                        </div>
                        @if($solicitacao->fotos->first() != null)
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label for="imagens">{{ __('Imagens anexadas junto à solicitação') }}</label>
                                </div>
                                @foreach ($solicitacao->fotos as $foto)
                                    <div class="col-md-6">
                                        <div class="card" style="width: 100%;">
                                            <img src="{{route('podas.foto', ['solicitacao' => $solicitacao->id, 'foto' => $foto->id])}}" class="card-img-top" alt="...">
                                            @if ($foto->comentario != null)
                                                <div class="card-body">
                                                    <p class="card-text">{{$foto->comentario}}</p>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                        </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-row">
                    <div class="col-md-12" style="margin-bottom:20px">
                        <div class="card shadow bg-white" style="border-radius:12px; border-width:0px;">
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="col-md-12" style="margin-bottom: 0.5rem">
                                        <h5 class="card-title mb-0"
                                            style="color:#08a02e; font-weight:bold">
                                            Status da solicitação</h5>
                                    </div>
                                    <div class="col-md-12">
                                        @switch($solicitacao->status)
                                            @case(\App\Models\SolicitacaoPoda::STATUS_ENUM['registrada'])
                                                <h5>Solicitação em análise.</h5>
                                            @break
                                            @case(\App\Models\SolicitacaoPoda::STATUS_ENUM['encaminhada'])
                                                <h5>Solicitação encaminhada</h5>
                                            @break
                                            @case(\App\Models\SolicitacaoPoda::STATUS_ENUM['deferido'])
                                                <h5>Solicitação deferida</h5>
                                                @if ($laudo->solicitacaoPoda->area == 2)
                                                    <br>
                                                    <div class="col-d-12 form-group">
                                                        @if($laudo->licenca)
                                                        <a href="{{route('podas.laudos.licenca', $laudo)}}" target="_blank">Baixar Licença Ambiental</a>
                                                        @endif
                                                    </div>
                                                @endif                                            
                                            @break
                                            @case(\App\Models\SolicitacaoPoda::STATUS_ENUM['indeferido'])
                                                <h5>Solicitação indeferida</h5>
                                                <p>Motivo: {{$solicitacao->motivo_indeferimento}}</p>
                                            @break
                                        @endswitch
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
</x-app-layout>

@endguest
