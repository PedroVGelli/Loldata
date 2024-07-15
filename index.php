<?php
$championUrl = "https://ddragon.leagueoflegends.com/cdn/12.18.1/data/pt_BR/champion.json";

$resposta = file_get_contents($championUrl);
$data = json_decode($resposta, true);

$campeoes = $data['data'];

$championKeys = array_keys($campeoes);
shuffle($championKeys); 
$Campeaoaleatorio = array_slice($championKeys, 0, 10); 
?>

<?php 
require_once '_cabecalho.php'
?>
<body>
    <div class="container">
        <h1>10 Campeões Aleatórios</h1>
        <table>
            <div>
                <tr>
                    <th>Nome</th>
                    <th>Função</th>
                    <th>Imagem</th>
                </tr>
            </div>
            <div>
                <?php foreach ($Campeaoaleatorio as $key): ?>
                    <?php $campeao = $campeoes[$key]; ?>
                    <tr>
                        <td><?php echo $campeao['name']; ?></td>
                        <td><?php echo implode(", ", $campeao['tags']); ?></td>
                        <td>
                            <img src="https://ddragon.leagueoflegends.com/cdn/img/champion/splash/<?php echo $campeao['id']; ?>_0.jpg" alt="<?php echo $campeao['name']; ?>" width="100">
                        </td>
                    </tr>
                <?php endforeach; ?>
            </div>
        </table>
    </div>
</body>
