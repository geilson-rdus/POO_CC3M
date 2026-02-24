<?php
header('Content-Type: text/html; charset=utf-8');

// Carregar dados do JSON
$dadosGerenciais = json_decode(file_get_contents('data-projecao.json'), true);

// Funções auxiliares
function calcularInstalacaoAgendada($item) {
    return $item['Concluído']['INS'] + $item['Em Exercucao']['INS'] + 
           $item['A Caminho']['INS'] + $item['Na Fila']['INS'] + $item['Improdutivo']['INS'];
}

function calcularTotalConcluido($item) {
    return $item['Concluído']['INS'] + $item['Concluído']['ME'] + 
           $item['Concluído']['REP'] + $item['Concluído']['SERV'];
}

function calcularMediaInstalacao($item) {
    if ($item['Técnicos'] == 0) return '0.0';
    $valor = ($item['Concluído']['INS'] + $item['Concluído']['ME']) / $item['Técnicos'];
    return number_format($valor, 1);
}

function calcularMediaTotal($item) {
    if ($item['Técnicos'] == 0) return '0.0';
    $valor = calcularTotalConcluido($item) / $item['Técnicos'];
    return number_format($valor, 1);
}

function somarInsMe($statusObj) {
    return $statusObj['INS'] + $statusObj['ME'];
}

function somarTodosStatus($statusObj) {
    return $statusObj['INS'] + $statusObj['ME'] + $statusObj['REP'] + $statusObj['SERV'];
}

// Processar dados para gerentes
$dadosTabela = [];
foreach ($dadosGerenciais['gerencial'] as $gerente => $cidades) {
    foreach ($cidades as $cidade => $cidadeData) {
        $dadosTabela[] = [
            'gerente' => $gerente,
            'cidade' => $cidade,
            'data' => $cidadeData
        ];
    }
}

// Calcular totais por gerente
$totaisPorGerente = [];
foreach ($dadosTabela as $item) {
    $gerente = $item['gerente'];
    if (!isset($totaisPorGerente[$gerente])) {
        $totaisPorGerente[$gerente] = [
            'Meta de Instalação' => 0,
            'Projeção de Instalação' => 0,
            'Projeção de Reparo' => 0,
            'Técnicos' => 0,
            'Concluído' => ['INS' => 0, 'ME' => 0, 'REP' => 0, 'SERV' => 0],
            'Em Exercucao' => ['INS' => 0, 'ME' => 0, 'REP' => 0, 'SERV' => 0],
            'A Caminho' => ['INS' => 0, 'ME' => 0, 'REP' => 0, 'SERV' => 0],
            'Na Fila' => ['INS' => 0, 'ME' => 0, 'REP' => 0, 'SERV' => 0],
            'Improdutivo' => ['INS' => 0, 'ME' => 0, 'REP' => 0, 'SERV' => 0]
        ];
    }
    
    $totaisPorGerente[$gerente]['Meta de Instalação'] += $item['data']['Meta de Instalação'];
    $totaisPorGerente[$gerente]['Projeção de Instalação'] += $item['data']['Projeção de Instalação'];
    $totaisPorGerente[$gerente]['Projeção de Reparo'] += $item['data']['Projeção de Reparo'];
    $totaisPorGerente[$gerente]['Técnicos'] += $item['data']['Técnicos'];
    
    foreach (['Concluído', 'Em Exercucao', 'A Caminho', 'Na Fila', 'Improdutivo'] as $status) {
        foreach (['INS', 'ME', 'REP', 'SERV'] as $tipo) {
            $totaisPorGerente[$gerente][$status][$tipo] += $item['data'][$status][$tipo];
        }
    }
}

// Calcular total geral
$totalGeral = [
    'Meta de Instalação' => 0,
    'Projeção de Instalação' => 0,
    'Projeção de Reparo' => 0,
    'Técnicos' => 0,
    'Concluído' => ['INS' => 0, 'ME' => 0, 'REP' => 0, 'SERV' => 0],
    'Em Exercucao' => ['INS' => 0, 'ME' => 0, 'REP' => 0, 'SERV' => 0],
    'A Caminho' => ['INS' => 0, 'ME' => 0, 'REP' => 0, 'SERV' => 0],
    'Na Fila' => ['INS' => 0, 'ME' => 0, 'REP' => 0, 'SERV' => 0],
    'Improdutivo' => ['INS' => 0, 'ME' => 0, 'REP' => 0, 'SERV' => 0]
];

foreach ($dadosTabela as $item) {
    $totalGeral['Meta de Instalação'] += $item['data']['Meta de Instalação'];
    $totalGeral['Projeção de Instalação'] += $item['data']['Projeção de Instalação'];
    $totalGeral['Projeção de Reparo'] += $item['data']['Projeção de Reparo'];
    $totalGeral['Técnicos'] += $item['data']['Técnicos'];
    
    foreach (['Concluído', 'Em Exercucao', 'A Caminho', 'Na Fila', 'Improdutivo'] as $status) {
        foreach (['INS', 'ME', 'REP', 'SERV'] as $tipo) {
            $totalGeral[$status][$tipo] += $item['data'][$status][$tipo];
        }
    }
}

// Processar supervisores
$dadosSupervisores = [];
foreach ($dadosGerenciais['supervisores'] as $supervisor => $supervisorData) {
    $dadosSupervisores[] = [
        'supervisor' => $supervisor,
        'data' => $supervisorData
    ];
}

// Calcular total geral supervisores
$totalGeralSupervisores = [
    'Meta de Instalação' => 0,
    'Projeção de Instalação' => 0,
    'Projeção de Reparo' => 0,
    'Técnicos' => 0,
    'Concluído' => ['INS' => 0, 'ME' => 0, 'REP' => 0, 'SERV' => 0],
    'Em Exercucao' => ['INS' => 0, 'ME' => 0, 'REP' => 0, 'SERV' => 0],
    'A Caminho' => ['INS' => 0, 'ME' => 0, 'REP' => 0, 'SERV' => 0],
    'Na Fila' => ['INS' => 0, 'ME' => 0, 'REP' => 0, 'SERV' => 0],
    'Improdutivo' => ['INS' => 0, 'ME' => 0, 'REP' => 0, 'SERV' => 0]
];

foreach ($dadosSupervisores as $item) {
    $totalGeralSupervisores['Meta de Instalação'] += $item['data']['Meta de Instalação'];
    $totalGeralSupervisores['Projeção de Instalação'] += $item['data']['Projeção de Instalação'];
    $totalGeralSupervisores['Projeção de Reparo'] += $item['data']['Projeção de Reparo'];
    $totalGeralSupervisores['Técnicos'] += $item['data']['Técnicos'];
    
    foreach (['Concluído', 'Em Exercucao', 'A Caminho', 'Na Fila', 'Improdutivo'] as $status) {
        foreach (['INS', 'ME', 'REP', 'SERV'] as $tipo) {
            $totalGeralSupervisores[$status][$tipo] += $item['data'][$status][$tipo];
        }
    }
}

// Processar técnicos
$dadosTecnicos = [];
foreach ($dadosGerenciais['tecnicos'] as $supervisorRegiao => $tecnicos) {
    foreach ($tecnicos as $tecnico => $tecnicoData) {
        $dadosTecnicos[] = [
            'supervisorRegiao' => $supervisorRegiao,
            'tecnico' => $tecnico,
            'data' => $tecnicoData
        ];
    }
}

// Calcular totais por supervisor/região
$totaisPorSupervisorRegiao = [];
foreach ($dadosTecnicos as $item) {
    $supervisorRegiao = $item['supervisorRegiao'];
    if (!isset($totaisPorSupervisorRegiao[$supervisorRegiao])) {
        $totaisPorSupervisorRegiao[$supervisorRegiao] = [
            'EM CAMPO' => 0,
            'META' => 0,
            'Projecao' => 0,
            'Total' => 0,
            'Concluído' => ['INS' => 0, 'ME' => 0, 'REP' => 0, 'SERV' => 0],
            'Em Exercucao' => ['INS' => 0, 'ME' => 0, 'REP' => 0, 'SERV' => 0],
            'A Caminho' => ['INS' => 0, 'ME' => 0, 'REP' => 0, 'SERV' => 0],
            'Na Fila' => ['INS' => 0, 'ME' => 0, 'REP' => 0, 'SERV' => 0],
            'Improdutivo' => ['INS' => 0, 'ME' => 0, 'REP' => 0, 'SERV' => 0]
        ];
    }
    
    $totaisPorSupervisorRegiao[$supervisorRegiao]['EM CAMPO'] += $item['data']['EM CAMPO'];
    $totaisPorSupervisorRegiao[$supervisorRegiao]['META'] += $item['data']['META'];
    $totaisPorSupervisorRegiao[$supervisorRegiao]['Projecao'] += $item['data']['Projecao'];
    $totaisPorSupervisorRegiao[$supervisorRegiao]['Total'] += $item['data']['Total'];
    
    foreach (['Concluído', 'Em Exercucao', 'A Caminho', 'Na Fila', 'Improdutivo'] as $status) {
        foreach (['INS', 'ME', 'REP', 'SERV'] as $tipo) {
            $totaisPorSupervisorRegiao[$supervisorRegiao][$status][$tipo] += $item['data'][$status][$tipo];
        }
    }
}

// ==========================================
// FUNÇÃO PARA GERAR HTML BASE
// ==========================================
function gerarHtmlBase($conteudo, $titulo) {
    return <<<HTML
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>$titulo</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            background-color: #f5f7fa;
            padding: 20px;
        }

        .card {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            overflow: hidden;
        }

        .card-header {
            padding: 20px;
            border-bottom: 1px solid #e9ecef;
        }

        .card-header h6 {
            font-size: 16px;
            font-weight: 600;
            color: #2c3e50;
        }

        .card-body {
            padding: 20px;
        }

        .table-responsive {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 13px;
        }

        th, td {
            padding: 8px 12px;
            text-align: center;
            border: 1px solid #dee2e6;
            white-space: nowrap;
        }

        th {
            font-weight: 600;
            font-size: 12px;
        }

        .texto-vertical {
            writing-mode: vertical-lr;
            transform: rotate(180deg);
            white-space: nowrap;
            vertical-align: middle;
            padding: 5px 2px;
            width: 35px;
        }

        .fw-bold {
            font-weight: bold;
        }

        .bg-dark {
            background-color: #2c3e50;
            color: white;
        }

        .bg-light {
            background-color: #e9ecef;
        }

        .table-dark {
            background-color: #2c3e50;
            color: white;
        }

        .linha-total {
            background-color: #d6d8db;
        }

        .bg-success {
            background-color: #28a745;
            color: white;
        }

        .bg-success-light {
            background-color: #d4edda;
            color: #155724;
        }

        .linha-total .bg-success-light {
            background-color: #b8d9c2;
            color: #0d4420;
        }

        .bg-warning {
            background-color: #ffc107;
            color: #000;
        }

        .bg-warning-light {
            background-color: #fff3cd;
            color: #856404;
        }

        .linha-total .bg-warning-light {
            background-color: #f5e4a3;
            color: #6b5203;
        }

        .bg-info {
            background-color: #ffd966;
            color: #000;
        }

        .bg-info-light {
            background-color: #fff9e6;
            color: #856404;
        }

        .linha-total .bg-info-light {
            background-color: #f5ecca;
            color: #6b5203;
        }

        .bg-primary {
            background-color: #007bff;
            color: white;
        }

        .bg-primary-light {
            background-color: #cce5ff;
            color: #004085;
        }

        .linha-total .bg-primary-light {
            background-color: #a8cbf0;
            color: #003366;
        }

        .bg-danger {
            background-color: #dc3545;
            color: white;
        }

        .bg-danger-light {
            background-color: #f8d7da;
            color: #721c24;
        }

        .linha-total .bg-danger-light {
            background-color: #e6b3ba;
            color: #5a0f17;
        }

        .linha-total .bg-light {
            background-color: #c8cacc;
        }

        .border-bottom-dark {
            border-bottom: 3px solid #2c3e50;
        }
    </style>
</head>
<body>
    $conteudo
</body>
</html>
HTML;
}

// ==========================================
// GERAR HTML TABELA 1 - GERENTES
// ==========================================
ob_start();
?>
<div class="card">
    <div class="card-header">
        <h6>Indicadores por gerência</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th rowspan="2" class="bg-dark"></th>
                        <th rowspan="2" class="bg-dark">Cidade</th>
                        <th rowspan="2" class="bg-dark">Meta<br>Inst.</th>
                        <th rowspan="2" class="bg-dark">Proj.<br>Inst.</th>
                        <th rowspan="2" class="bg-dark">Proj.<br>Rep.</th>
                        <th colspan="4" class="bg-success">Concluído</th>
                        <th colspan="4" class="bg-warning">Em Execução</th>
                        <th colspan="4" class="bg-info">A Caminho</th>
                        <th colspan="4" class="bg-primary">Na Fila</th>
                        <th colspan="4" class="bg-danger">Improdut.</th>
                        <th rowspan="2" class="bg-dark">Téc.</th>
                        <th rowspan="2" class="bg-dark">Inst.<br>Agend.</th>
                        <th rowspan="2" class="bg-dark">Média<br>Inst.</th>
                        <th rowspan="2" class="bg-dark">Média<br>Total</th>
                    </tr>
                    <tr>
                        <th class="bg-success-light">INS</th>
                        <th class="bg-success-light">ME</th>
                        <th class="bg-success-light">REP</th>
                        <th class="bg-success-light">SERV</th>
                        <th class="bg-warning-light">INS</th>
                        <th class="bg-warning-light">ME</th>
                        <th class="bg-warning-light">REP</th>
                        <th class="bg-warning-light">SERV</th>
                        <th class="bg-info-light">INS</th>
                        <th class="bg-info-light">ME</th>
                        <th class="bg-info-light">REP</th>
                        <th class="bg-info-light">SERV</th>
                        <th class="bg-primary-light">INS</th>
                        <th class="bg-primary-light">ME</th>
                        <th class="bg-primary-light">REP</th>
                        <th class="bg-primary-light">SERV</th>
                        <th class="bg-danger-light">INS</th>
                        <th class="bg-danger-light">ME</th>
                        <th class="bg-danger-light">REP</th>
                        <th class="bg-danger-light">SERV</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $gerenteAnterior = null;
                    $contadorGerente = [];
                    
                    foreach ($dadosTabela as $item) {
                        $gerente = $item['gerente'];
                        if (!isset($contadorGerente[$gerente])) {
                            $contadorGerente[$gerente] = 0;
                        }
                        $contadorGerente[$gerente]++;
                    }
                    
                    foreach ($dadosTabela as $index => $item):
                        $gerente = $item['gerente'];
                        $data = $item['data'];
                        
                        $mostrarGerente = ($gerenteAnterior !== $gerente);
                        $ehUltimaLinha = ($index === count($dadosTabela) - 1) || 
                                       ($dadosTabela[$index + 1]['gerente'] !== $gerente);
                    ?>
                    <tr>
                        <?php if ($mostrarGerente): ?>
                        <td rowspan="<?= $contadorGerente[$gerente] + 2 ?>" class="texto-vertical bg-dark">
                            <?= $gerente ?>
                        </td>
                        <?php endif; ?>
                        <td><?= $item['cidade'] ?></td>
                        <td><?= $data['Meta de Instalação'] ?></td>
                        <td><?= $data['Projeção de Instalação'] ?></td>
                        <td><?= $data['Projeção de Reparo'] ?></td>
                        
                        <td class="bg-success-light"><?= $data['Concluído']['INS'] ?></td>
                        <td class="bg-success-light"><?= $data['Concluído']['ME'] ?></td>
                        <td class="bg-success-light"><?= $data['Concluído']['REP'] ?></td>
                        <td class="bg-success-light"><?= $data['Concluído']['SERV'] ?></td>
                        
                        <td class="bg-warning-light"><?= $data['Em Exercucao']['INS'] ?></td>
                        <td class="bg-warning-light"><?= $data['Em Exercucao']['ME'] ?></td>
                        <td class="bg-warning-light"><?= $data['Em Exercucao']['REP'] ?></td>
                        <td class="bg-warning-light"><?= $data['Em Exercucao']['SERV'] ?></td>
                        
                        <td class="bg-info-light"><?= $data['A Caminho']['INS'] ?></td>
                        <td class="bg-info-light"><?= $data['A Caminho']['ME'] ?></td>
                        <td class="bg-info-light"><?= $data['A Caminho']['REP'] ?></td>
                        <td class="bg-info-light"><?= $data['A Caminho']['SERV'] ?></td>
                        
                        <td class="bg-primary-light"><?= $data['Na Fila']['INS'] ?></td>
                        <td class="bg-primary-light"><?= $data['Na Fila']['ME'] ?></td>
                        <td class="bg-primary-light"><?= $data['Na Fila']['REP'] ?></td>
                        <td class="bg-primary-light"><?= $data['Na Fila']['SERV'] ?></td>
                        
                        <td class="bg-danger-light"><?= $data['Improdutivo']['INS'] ?></td>
                        <td class="bg-danger-light"><?= $data['Improdutivo']['ME'] ?></td>
                        <td class="bg-danger-light"><?= $data['Improdutivo']['REP'] ?></td>
                        <td class="bg-danger-light"><?= $data['Improdutivo']['SERV'] ?></td>
                        
                        <td class="bg-light"><?= $data['Técnicos'] ?></td>
                        <td class="bg-light"><?= calcularInstalacaoAgendada($data) ?></td>
                        <td class="bg-light"><?= calcularMediaInstalacao($data) ?></td>
                        <td class="bg-light"><?= calcularMediaTotal($data) ?></td>
                    </tr>
                    
                    <?php if ($ehUltimaLinha): 
                        $total = $totaisPorGerente[$gerente];
                    ?>
                    <tr class="fw-bold linha-total">
                        <td rowspan="2">TOTAL</td>
                        <td rowspan="2"><?= $total['Meta de Instalação'] ?></td>
                        <td rowspan="2"><?= $total['Projeção de Instalação'] ?></td>
                        <td rowspan="2"><?= $total['Projeção de Reparo'] ?></td>
                        
                        <td class="bg-success-light"><?= $total['Concluído']['INS'] ?></td>
                        <td class="bg-success-light"><?= $total['Concluído']['ME'] ?></td>
                        <td rowspan="2" class="bg-success-light"><?= $total['Concluído']['REP'] ?></td>
                        <td rowspan="2" class="bg-success-light"><?= $total['Concluído']['SERV'] ?></td>
                        
                        <td class="bg-warning-light"><?= $total['Em Exercucao']['INS'] ?></td>
                        <td class="bg-warning-light"><?= $total['Em Exercucao']['ME'] ?></td>
                        <td rowspan="2" class="bg-warning-light"><?= $total['Em Exercucao']['REP'] ?></td>
                        <td rowspan="2" class="bg-warning-light"><?= $total['Em Exercucao']['SERV'] ?></td>
                        
                        <td class="bg-info-light"><?= $total['A Caminho']['INS'] ?></td>
                        <td class="bg-info-light"><?= $total['A Caminho']['ME'] ?></td>
                        <td rowspan="2" class="bg-info-light"><?= $total['A Caminho']['REP'] ?></td>
                        <td rowspan="2" class="bg-info-light"><?= $total['A Caminho']['SERV'] ?></td>
                        
                        <td class="bg-primary-light"><?= $total['Na Fila']['INS'] ?></td>
                        <td class="bg-primary-light"><?= $total['Na Fila']['ME'] ?></td>
                        <td rowspan="2" class="bg-primary-light"><?= $total['Na Fila']['REP'] ?></td>
                        <td rowspan="2" class="bg-primary-light"><?= $total['Na Fila']['SERV'] ?></td>
                        
                        <td class="bg-danger-light"><?= $total['Improdutivo']['INS'] ?></td>
                        <td class="bg-danger-light"><?= $total['Improdutivo']['ME'] ?></td>
                        <td rowspan="2" class="bg-danger-light"><?= $total['Improdutivo']['REP'] ?></td>
                        <td rowspan="2" class="bg-danger-light"><?= $total['Improdutivo']['SERV'] ?></td>
                        
                        <td rowspan="2" class="bg-light"><?= $total['Técnicos'] ?></td>
                        <td rowspan="2" class="bg-light"><?= calcularInstalacaoAgendada($total) ?></td>
                        <td rowspan="2" class="bg-light"><?= calcularMediaInstalacao($total) ?></td>
                        <td rowspan="2" class="bg-light"><?= calcularMediaTotal($total) ?></td>
                    </tr>
                    <tr class="fw-bold linha-total">
                        <td colspan="2" class="bg-success-light"><?= somarInsMe($total['Concluído']) ?></td>
                        <td colspan="2" class="bg-warning-light"><?= somarInsMe($total['Em Exercucao']) ?></td>
                        <td colspan="2" class="bg-info-light"><?= somarInsMe($total['A Caminho']) ?></td>
                        <td colspan="2" class="bg-primary-light"><?= somarInsMe($total['Na Fila']) ?></td>
                        <td colspan="2" class="bg-danger-light"><?= somarInsMe($total['Improdutivo']) ?></td>
                    </tr>
                    <?php 
                        endif;
                        $gerenteAnterior = $gerente;
                    endforeach; 
                    ?>
                    
                    <tr class="table-dark fw-bold">
                        <td>TOTAL GERAL</td>
                        <td></td>
                        <td><?= $totalGeral['Meta de Instalação'] ?></td>
                        <td><?= $totalGeral['Projeção de Instalação'] ?></td>
                        <td><?= $totalGeral['Projeção de Reparo'] ?></td>
                        
                        <td><?= $totalGeral['Concluído']['INS'] ?></td>
                        <td><?= $totalGeral['Concluído']['ME'] ?></td>
                        <td><?= $totalGeral['Concluído']['REP'] ?></td>
                        <td><?= $totalGeral['Concluído']['SERV'] ?></td>
                        
                        <td><?= $totalGeral['Em Exercucao']['INS'] ?></td>
                        <td><?= $totalGeral['Em Exercucao']['ME'] ?></td>
                        <td><?= $totalGeral['Em Exercucao']['REP'] ?></td>
                        <td><?= $totalGeral['Em Exercucao']['SERV'] ?></td>
                        
                        <td><?= $totalGeral['A Caminho']['INS'] ?></td>
                        <td><?= $totalGeral['A Caminho']['ME'] ?></td>
                        <td><?= $totalGeral['A Caminho']['REP'] ?></td>
                        <td><?= $totalGeral['A Caminho']['SERV'] ?></td>
                        
                        <td><?= $totalGeral['Na Fila']['INS'] ?></td>
                        <td><?= $totalGeral['Na Fila']['ME'] ?></td>
                        <td><?= $totalGeral['Na Fila']['REP'] ?></td>
                        <td><?= $totalGeral['Na Fila']['SERV'] ?></td>
                        
                        <td><?= $totalGeral['Improdutivo']['INS'] ?></td>
                        <td><?= $totalGeral['Improdutivo']['ME'] ?></td>
                        <td><?= $totalGeral['Improdutivo']['REP'] ?></td>
                        <td><?= $totalGeral['Improdutivo']['SERV'] ?></td>
                        
                        <td><?= $totalGeral['Técnicos'] ?></td>
                        <td><?= calcularInstalacaoAgendada($totalGeral) ?></td>
                        <td><?= calcularMediaInstalacao($totalGeral) ?></td>
                        <td><?= calcularMediaTotal($totalGeral) ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
$htmlTabela1 = gerarHtmlBase(ob_get_clean(), 'Indicadores por gerência');

// ==========================================
// GERAR HTML TABELA 2 - SUPERVISORES
// ==========================================
ob_start();
?>
<div class="card">
    <div class="card-header">
        <h6>Indicadores dos supervisores</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th rowspan="2" class="bg-dark">Supervisor</th>
                        <th rowspan="2" class="bg-dark">Meta<br>Inst.</th>
                        <th rowspan="2" class="bg-dark">Proj.<br>Inst.</th>
                        <th rowspan="2" class="bg-dark">Proj.<br>Rep.</th>
                        <th colspan="4" class="bg-success">Concluído</th>
                        <th colspan="4" class="bg-warning">Em Execução</th>
                        <th colspan="4" class="bg-info">A Caminho</th>
                        <th colspan="4" class="bg-primary">Na Fila</th>
                        <th colspan="4" class="bg-danger">Improdut.</th>
                        <th rowspan="2" class="bg-dark">Téc.</th>
                        <th rowspan="2" class="bg-dark">Inst.<br>Agend.</th>
                        <th rowspan="2" class="bg-dark">Média<br>Inst.</th>
                        <th rowspan="2" class="bg-dark">Média<br>Total</th>
                    </tr>
                    <tr>
                        <th class="bg-success-light">INS</th>
                        <th class="bg-success-light">ME</th>
                        <th class="bg-success-light">REP</th>
                        <th class="bg-success-light">SERV</th>
                        <th class="bg-warning-light">INS</th>
                        <th class="bg-warning-light">ME</th>
                        <th class="bg-warning-light">REP</th>
                        <th class="bg-warning-light">SERV</th>
                        <th class="bg-info-light">INS</th>
                        <th class="bg-info-light">ME</th>
                        <th class="bg-info-light">REP</th>
                        <th class="bg-info-light">SERV</th>
                        <th class="bg-primary-light">INS</th>
                        <th class="bg-primary-light">ME</th>
                        <th class="bg-primary-light">REP</th>
                        <th class="bg-primary-light">SERV</th>
                        <th class="bg-danger-light">INS</th>
                        <th class="bg-danger-light">ME</th>
                        <th class="bg-danger-light">REP</th>
                        <th class="bg-danger-light">SERV</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($dadosSupervisores as $item): 
                        $data = $item['data'];
                    ?>
                    <tr>
                        <td><?= $item['supervisor'] ?></td>
                        <td><?= $data['Meta de Instalação'] ?></td>
                        <td><?= $data['Projeção de Instalação'] ?></td>
                        <td><?= $data['Projeção de Reparo'] ?></td>
                        
                        <td class="bg-success-light"><?= $data['Concluído']['INS'] ?></td>
                        <td class="bg-success-light"><?= $data['Concluído']['ME'] ?></td>
                        <td class="bg-success-light"><?= $data['Concluído']['REP'] ?></td>
                        <td class="bg-success-light"><?= $data['Concluído']['SERV'] ?></td>
                        
                        <td class="bg-warning-light"><?= $data['Em Exercucao']['INS'] ?></td>
                        <td class="bg-warning-light"><?= $data['Em Exercucao']['ME'] ?></td>
                        <td class="bg-warning-light"><?= $data['Em Exercucao']['REP'] ?></td>
                        <td class="bg-warning-light"><?= $data['Em Exercucao']['SERV'] ?></td>
                        
                        <td class="bg-info-light"><?= $data['A Caminho']['INS'] ?></td>
                        <td class="bg-info-light"><?= $data['A Caminho']['ME'] ?></td>
                        <td class="bg-info-light"><?= $data['A Caminho']['REP'] ?></td>
                        <td class="bg-info-light"><?= $data['A Caminho']['SERV'] ?></td>
                        
                        <td class="bg-primary-light"><?= $data['Na Fila']['INS'] ?></td>
                        <td class="bg-primary-light"><?= $data['Na Fila']['ME'] ?></td>
                        <td class="bg-primary-light"><?= $data['Na Fila']['REP'] ?></td>
                        <td class="bg-primary-light"><?= $data['Na Fila']['SERV'] ?></td>
                        
                        <td class="bg-danger-light"><?= $data['Improdutivo']['INS'] ?></td>
                        <td class="bg-danger-light"><?= $data['Improdutivo']['ME'] ?></td>
                        <td class="bg-danger-light"><?= $data['Improdutivo']['REP'] ?></td>
                        <td class="bg-danger-light"><?= $data['Improdutivo']['SERV'] ?></td>
                        
                        <td class="bg-light"><?= $data['Técnicos'] ?></td>
                        <td class="bg-light"><?= calcularInstalacaoAgendada($data) ?></td>
                        <td class="bg-light"><?= calcularMediaInstalacao($data) ?></td>
                        <td class="bg-light"><?= calcularMediaTotal($data) ?></td>
                    </tr>
                    <?php endforeach; ?>
                    
                    <?php if (count($dadosSupervisores) > 0): ?>
                    <tr class="fw-bold linha-total">
                        <td rowspan="2">TOTAL</td>
                        <td rowspan="2"><?= $totalGeralSupervisores['Meta de Instalação'] ?></td>
                        <td rowspan="2"><?= $totalGeralSupervisores['Projeção de Instalação'] ?></td>
                        <td rowspan="2"><?= $totalGeralSupervisores['Projeção de Reparo'] ?></td>
                        
                        <td class="bg-success-light"><?= $totalGeralSupervisores['Concluído']['INS'] ?></td>
                        <td class="bg-success-light"><?= $totalGeralSupervisores['Concluído']['ME'] ?></td>
                        <td rowspan="2" class="bg-success-light"><?= $totalGeralSupervisores['Concluído']['REP'] ?></td>
                        <td rowspan="2" class="bg-success-light"><?= $totalGeralSupervisores['Concluído']['SERV'] ?></td>
                        
                        <td class="bg-warning-light"><?= $totalGeralSupervisores['Em Exercucao']['INS'] ?></td>
                        <td class="bg-warning-light"><?= $totalGeralSupervisores['Em Exercucao']['ME'] ?></td>
                        <td rowspan="2" class="bg-warning-light"><?= $totalGeralSupervisores['Em Exercucao']['REP'] ?></td>
                        <td rowspan="2" class="bg-warning-light"><?= $totalGeralSupervisores['Em Exercucao']['SERV'] ?></td>
                        
                        <td class="bg-info-light"><?= $totalGeralSupervisores['A Caminho']['INS'] ?></td>
                        <td class="bg-info-light"><?= $totalGeralSupervisores['A Caminho']['ME'] ?></td>
                        <td rowspan="2" class="bg-info-light"><?= $totalGeralSupervisores['A Caminho']['REP'] ?></td>
                        <td rowspan="2" class="bg-info-light"><?= $totalGeralSupervisores['A Caminho']['SERV'] ?></td>
                        
                        <td class="bg-primary-light"><?= $totalGeralSupervisores['Na Fila']['INS'] ?></td>
                        <td class="bg-primary-light"><?= $totalGeralSupervisores['Na Fila']['ME'] ?></td>
                        <td rowspan="2" class="bg-primary-light"><?= $totalGeralSupervisores['Na Fila']['REP'] ?></td>
                        <td rowspan="2" class="bg-primary-light"><?= $totalGeralSupervisores['Na Fila']['SERV'] ?></td>
                        
                        <td class="bg-danger-light"><?= $totalGeralSupervisores['Improdutivo']['INS'] ?></td>
                        <td class="bg-danger-light"><?= $totalGeralSupervisores['Improdutivo']['ME'] ?></td>
                        <td rowspan="2" class="bg-danger-light"><?= $totalGeralSupervisores['Improdutivo']['REP'] ?></td>
                        <td rowspan="2" class="bg-danger-light"><?= $totalGeralSupervisores['Improdutivo']['SERV'] ?></td>
                        
                        <td rowspan="2" class="bg-light"><?= $totalGeralSupervisores['Técnicos'] ?></td>
                        <td rowspan="2" class="bg-light"><?= calcularInstalacaoAgendada($totalGeralSupervisores) ?></td>
                        <td rowspan="2" class="bg-light"><?= calcularMediaInstalacao($totalGeralSupervisores) ?></td>
                        <td rowspan="2" class="bg-light"><?= calcularMediaTotal($totalGeralSupervisores) ?></td>
                    </tr>
                    <tr class="fw-bold linha-total">
                        <td colspan="2" class="bg-success-light"><?= somarInsMe($totalGeralSupervisores['Concluído']) ?></td>
                        <td colspan="2" class="bg-warning-light"><?= somarInsMe($totalGeralSupervisores['Em Exercucao']) ?></td>
                        <td colspan="2" class="bg-info-light"><?= somarInsMe($totalGeralSupervisores['A Caminho']) ?></td>
                        <td colspan="2" class="bg-primary-light"><?= somarInsMe($totalGeralSupervisores['Na Fila']) ?></td>
                        <td colspan="2" class="bg-danger-light"><?= somarInsMe($totalGeralSupervisores['Improdutivo']) ?></td>
                    </tr>
                    
                    <tr class="table-dark fw-bold">
                        <td>TOTAL GERAL</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        
                        <td><?= somarTodosStatus($totalGeralSupervisores['Concluído']) ?></td>
                        <td colspan="3"></td>
                        
                        <td><?= somarTodosStatus($totalGeralSupervisores['Em Exercucao']) ?></td>
                        <td colspan="3"></td>
                        
                        <td><?= somarTodosStatus($totalGeralSupervisores['A Caminho']) ?></td>
                        <td colspan="3"></td>
                        
                        <td><?= somarTodosStatus($totalGeralSupervisores['Na Fila']) ?></td>
                        <td colspan="3"></td>
                        
                        <td><?= somarTodosStatus($totalGeralSupervisores['Improdutivo']) ?></td>
                        <td colspan="3"></td>
                        
                        <td><?= $totalGeralSupervisores['Técnicos'] ?></td>
                        <td><?= calcularInstalacaoAgendada($totalGeralSupervisores) ?></td>
                        <td><?= calcularMediaInstalacao($totalGeralSupervisores) ?></td>
                        <td><?= calcularMediaTotal($totalGeralSupervisores) ?></td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
$htmlTabela2 = gerarHtmlBase(ob_get_clean(), 'Indicadores dos supervisores');

// ==========================================
// GERAR HTML TABELA 3 - TÉCNICOS
// ==========================================
ob_start();
?>
<div class="card">
    <div class="card-header">
        <h6>Indicadores dos Técnicos</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th rowspan="2" class="bg-dark"></th>
                        <th rowspan="2" class="bg-dark">Técnico</th>
                        <th rowspan="2" class="bg-dark">SKILL</th>
                        <th rowspan="2" class="bg-dark">EM<br>CAMPO</th>
                        <th rowspan="2" class="bg-dark">META</th>
                        <th rowspan="2" class="bg-dark">Proj.</th>
                        <th rowspan="2" class="bg-dark">Total</th>
                        <th colspan="4" class="bg-success">Concluído</th>
                        <th colspan="4" class="bg-warning">Em Execução</th>
                        <th colspan="4" class="bg-info">A Caminho</th>
                        <th colspan="4" class="bg-primary">Na Fila</th>
                        <th colspan="4" class="bg-danger">Improdut.</th>
                    </tr>
                    <tr>
                        <th class="bg-success-light">INS</th>
                        <th class="bg-success-light">ME</th>
                        <th class="bg-success-light">REP</th>
                        <th class="bg-success-light">SERV</th>
                        <th class="bg-warning-light">INS</th>
                        <th class="bg-warning-light">ME</th>
                        <th class="bg-warning-light">REP</th>
                        <th class="bg-warning-light">SERV</th>
                        <th class="bg-info-light">INS</th>
                        <th class="bg-info-light">ME</th>
                        <th class="bg-info-light">REP</th>
                        <th class="bg-info-light">SERV</th>
                        <th class="bg-primary-light">INS</th>
                        <th class="bg-primary-light">ME</th>
                        <th class="bg-primary-light">REP</th>
                        <th class="bg-primary-light">SERV</th>
                        <th class="bg-danger-light">INS</th>
                        <th class="bg-danger-light">ME</th>
                        <th class="bg-danger-light">REP</th>
                        <th class="bg-danger-light">SERV</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $supervisorAnterior = null;
                    $contadorSupervisor = [];
                    
                    foreach ($dadosTecnicos as $item) {
                        $supervisorRegiao = $item['supervisorRegiao'];
                        if (!isset($contadorSupervisor[$supervisorRegiao])) {
                            $contadorSupervisor[$supervisorRegiao] = 0;
                        }
                        $contadorSupervisor[$supervisorRegiao]++;
                    }
                    
                    foreach ($dadosTecnicos as $index => $item):
                        $supervisorRegiao = $item['supervisorRegiao'];
                        $data = $item['data'];
                        
                        $mostrarSupervisor = ($supervisorAnterior !== $supervisorRegiao);
                        $ehUltimaLinha = ($index === count($dadosTecnicos) - 1) || 
                                       ($dadosTecnicos[$index + 1]['supervisorRegiao'] !== $supervisorRegiao);
                        
                        $partes = explode(' - ', $supervisorRegiao);
                        $textoVertical = isset($partes[1]) ? $partes[1] . '<br>' . $partes[0] : $supervisorRegiao;
                    ?>
                    <tr>
                        <?php if ($mostrarSupervisor): ?>
                        <td rowspan="<?= $contadorSupervisor[$supervisorRegiao] + 1 ?>" class="texto-vertical bg-dark">
                            <?= $textoVertical ?>
                        </td>
                        <?php endif; ?>
                        <td><?= $item['tecnico'] ?></td>
                        <td><?= $data['SKILL'] ?></td>
                        <td><?= $data['EM CAMPO'] ?></td>
                        <td><?= $data['META'] ?></td>
                        <td><?= $data['Projecao'] ?></td>
                        <td><?= $data['Total'] ?></td>
                        
                        <td class="bg-success-light"><?= $data['Concluído']['INS'] ?></td>
                        <td class="bg-success-light"><?= $data['Concluído']['ME'] ?></td>
                        <td class="bg-success-light"><?= $data['Concluído']['REP'] ?></td>
                        <td class="bg-success-light"><?= $data['Concluído']['SERV'] ?></td>
                        
                        <td class="bg-warning-light"><?= $data['Em Exercucao']['INS'] ?></td>
                        <td class="bg-warning-light"><?= $data['Em Exercucao']['ME'] ?></td>
                        <td class="bg-warning-light"><?= $data['Em Exercucao']['REP'] ?></td>
                        <td class="bg-warning-light"><?= $data['Em Exercucao']['SERV'] ?></td>
                        
                        <td class="bg-info-light"><?= $data['A Caminho']['INS'] ?></td>
                        <td class="bg-info-light"><?= $data['A Caminho']['ME'] ?></td>
                        <td class="bg-info-light"><?= $data['A Caminho']['REP'] ?></td>
                        <td class="bg-info-light"><?= $data['A Caminho']['SERV'] ?></td>
                        
                        <td class="bg-primary-light"><?= $data['Na Fila']['INS'] ?></td>
                        <td class="bg-primary-light"><?= $data['Na Fila']['ME'] ?></td>
                        <td class="bg-primary-light"><?= $data['Na Fila']['REP'] ?></td>
                        <td class="bg-primary-light"><?= $data['Na Fila']['SERV'] ?></td>
                        
                        <td class="bg-danger-light"><?= $data['Improdutivo']['INS'] ?></td>
                        <td class="bg-danger-light"><?= $data['Improdutivo']['ME'] ?></td>
                        <td class="bg-danger-light"><?= $data['Improdutivo']['REP'] ?></td>
                        <td class="bg-danger-light"><?= $data['Improdutivo']['SERV'] ?></td>
                    </tr>
                    
                    <?php if ($ehUltimaLinha): 
                        $total = $totaisPorSupervisorRegiao[$supervisorRegiao];
                    ?>
                    <tr class="fw-bold linha-total border-bottom-dark">
                        <td>TOTAL</td>
                        <td></td>
                        <td><?= $total['EM CAMPO'] ?></td>
                        <td><?= $total['META'] ?></td>
                        <td><?= $total['Projecao'] ?></td>
                        <td><?= $total['Total'] ?></td>
                        
                        <td class="bg-success-light"><?= $total['Concluído']['INS'] ?></td>
                        <td class="bg-success-light"><?= $total['Concluído']['ME'] ?></td>
                        <td class="bg-success-light"><?= $total['Concluído']['REP'] ?></td>
                        <td class="bg-success-light"><?= $total['Concluído']['SERV'] ?></td>
                        
                        <td class="bg-warning-light"><?= $total['Em Exercucao']['INS'] ?></td>
                        <td class="bg-warning-light"><?= $total['Em Exercucao']['ME'] ?></td>
                        <td class="bg-warning-light"><?= $total['Em Exercucao']['REP'] ?></td>
                        <td class="bg-warning-light"><?= $total['Em Exercucao']['SERV'] ?></td>
                        
                        <td class="bg-info-light"><?= $total['A Caminho']['INS'] ?></td>
                        <td class="bg-info-light"><?= $total['A Caminho']['ME'] ?></td>
                        <td class="bg-info-light"><?= $total['A Caminho']['REP'] ?></td>
                        <td class="bg-info-light"><?= $total['A Caminho']['SERV'] ?></td>
                        
                        <td class="bg-primary-light"><?= $total['Na Fila']['INS'] ?></td>
                        <td class="bg-primary-light"><?= $total['Na Fila']['ME'] ?></td>
                        <td class="bg-primary-light"><?= $total['Na Fila']['REP'] ?></td>
                        <td class="bg-primary-light"><?= $total['Na Fila']['SERV'] ?></td>
                        
                        <td class="bg-danger-light"><?= $total['Improdutivo']['INS'] ?></td>
                        <td class="bg-danger-light"><?= $total['Improdutivo']['ME'] ?></td>
                        <td class="bg-danger-light"><?= $total['Improdutivo']['REP'] ?></td>
                        <td class="bg-danger-light"><?= $total['Improdutivo']['SERV'] ?></td>
                    </tr>
                    <?php 
                        endif;
                        $supervisorAnterior = $supervisorRegiao;
                    endforeach; 
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
$htmlTabela3 = gerarHtmlBase(ob_get_clean(), 'Indicadores dos Técnicos');

// ==========================================
// FUNÇÃO PARA ENVIAR E GERAR IMAGEM
// ==========================================
function gerarImagem($html, $nomeArquivo) {
    $data = [
        'html' => $html,
        'width' => 1920,  // Largura adequada para tabelas largas
        'format' => 'png',
        'quality' => 90,
        'fullPage' => true
    ];
    
    $ch = curl_init('http://localhost:3002/api/generate-image');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $error = curl_error($ch);
    curl_close($ch);
    
    if ($error) {
        return ['sucesso' => false, 'erro' => "Erro no CURL: $error"];
    }
    
    if ($httpCode === 200) {
        $filepath = __DIR__ . '/' . $nomeArquivo;
        file_put_contents($filepath, $response);
        return [
            'sucesso' => true, 
            'arquivo' => $nomeArquivo,
            'tamanho' => number_format(strlen($response) / 1024, 2) . ' KB'
        ];
    }
    
    return ['sucesso' => false, 'erro' => "Erro HTTP $httpCode", 'resposta' => $response];
}

// ==========================================
// GERAR AS 3 IMAGENS
// ==========================================
echo "<h2>🖼️ Gerando imagens das tabelas...</h2>";
echo "<hr>";

$timestamp = date('Y-m-d_H-i-s');

// Tabela 1 - Gerentes
echo "<h3>📊 Tabela 1: Indicadores por gerência</h3>";
$resultado1 = gerarImagem($htmlTabela1, "tabela_gerentes_$timestamp.png");
if ($resultado1['sucesso']) {
    echo "<p style='color: green;'>✅ Gerada com sucesso!</p>";
    echo "<p>📁 Arquivo: <strong>{$resultado1['arquivo']}</strong></p>";
    echo "<p>📏 Tamanho: {$resultado1['tamanho']}</p>";
    echo "<img src='{$resultado1['arquivo']}' style='max-width: 100%; margin: 20px 0; border: 2px solid #28a745; border-radius: 8px;'>";
} else {
    echo "<p style='color: red;'>❌ Erro: {$resultado1['erro']}</p>";
}

echo "<hr>";

// Tabela 2 - Supervisores
echo "<h3>📊 Tabela 2: Indicadores dos supervisores</h3>";
$resultado2 = gerarImagem($htmlTabela2, "tabela_supervisores_$timestamp.png");
if ($resultado2['sucesso']) {
    echo "<p style='color: green;'>✅ Gerada com sucesso!</p>";
    echo "<p>📁 Arquivo: <strong>{$resultado2['arquivo']}</strong></p>";
    echo "<p>📏 Tamanho: {$resultado2['tamanho']}</p>";
    echo "<img src='{$resultado2['arquivo']}' style='max-width: 100%; margin: 20px 0; border: 2px solid #ffc107; border-radius: 8px;'>";
} else {
    echo "<p style='color: red;'>❌ Erro: {$resultado2['erro']}</p>";
}

echo "<hr>";

// Tabela 3 - Técnicos
echo "<h3>📊 Tabela 3: Indicadores dos Técnicos</h3>";
$resultado3 = gerarImagem($htmlTabela3, "tabela_tecnicos_$timestamp.png");
if ($resultado3['sucesso']) {
    echo "<p style='color: green;'>✅ Gerada com sucesso!</p>";
    echo "<p>📁 Arquivo: <strong>{$resultado3['arquivo']}</strong></p>";
    echo "<p>📏 Tamanho: {$resultado3['tamanho']}</p>";
    echo "<img src='{$resultado3['arquivo']}' style='max-width: 100%; margin: 20px 0; border: 2px solid #007bff; border-radius: 8px;'>";
} else {
    echo "<p style='color: red;'>❌ Erro: {$resultado3['erro']}</p>";
}

echo "<hr>";
echo "<h2 style='color: green;'>✨ Processo concluído!</h2>";
?>
