@if(!empty($consultaClimatica))
    <div class="row">
        <div class="previsao">
            <p class="localidade">
                <span class="localidade-cidade">{{ $consultaClimatica['city'] }}</span>
            </p>
            <div class="card-tempo">
                <p class="card-tempo-hoje">{{ $consultaClimatica['date'] }} - {{ $consultaClimatica['time'] }}</p>
                <div class="card-tempo-bloco">
                    <p class="card-tempo-temperatura"><span class="card-tempo-temperatura-temp">{{ $consultaClimatica['temp'] }}º</span></p>
                    <p class="card-tempo-condicao">{{ $consultaClimatica['description'] }}</p>
                </div>
                <div class="card-tempo-caracteristicas">
                    <p class="card-tempo-caracteristica card-tempo-caracteristicas-umidade">
                        <span class="card-tempo-caracteristica-label">Umidade: </span>
                        <span class="card-tempo-caracteristica-valor card-tempo-caracteristicas-umidade-valor">{{ $consultaClimatica['humidity'] }}%</span>
                    </p>
                    <p class="card-tempo-caracteristica card-tempo-caracteristicas-sensacao">
                        <span class="card-tempo-caracteristica-label">Sensação: </span>
                        <span class="card-tempo-caracteristica-valor card-tempo-caracteristicas-sensacao-valor">{{ $consultaClimatica['temp'] }}</span>
                    </p>
                    <p class="card-tempo-caracteristica card-tempo-caracteristicas-vento">
                        <span class="card-tempo-caracteristica-label">Vento: </span>
                        <span class="card-tempo-caracteristica-valor card-tempo-caracteristicas-vento-valor">{{ $consultaClimatica['wind_speedy'] }}</span>
                    </p>
                </div>
            </div>
            <div class="card-tempo-semana">
                @php
                    $previsaoDaSemana = array_slice($consultaClimatica['forecast'], 0, 5);
                @endphp

                @foreach($previsaoDaSemana as $key => $previsao)
                    <div class="card-tempo-semana-dia semana-dia-{{ $key + 1 }}">
                        <p class="card-tempo-semana-dia-data">{{ $previsao['weekday'] }} - {{ $previsao['date'] }}
                            <img src="/hg-images/{{ $previsao['condition'] }}.svg" alt="" height="50">
                        </p>
                        <div class="card-tempo-semana-temp-max">
                            <span>Máx</span>
                            <span class="card-tempo-semana-temp-max-val">{{ $previsao['max'] }}</span>º
                        </div>
                        <div class="card-tempo-semana-temp-min">
                            <span>Mín</span>
                            <span class="card-tempo-semana-temp-min-val">{{ $previsao['min'] }}</span>º
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif