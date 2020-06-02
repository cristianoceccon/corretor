<h1 style="text-align:center;">Relatório de pedidos</h1>

    <table>
        <tr>
            <td><strong>Status do pedido: </strong><?= $status?></td>
        </tr>

        <tr>
            <td><strong>Tipo de cliente: </strong><?= $client_type?></td>
        </tr>

        <tr>
            <td><strong>Data inicial: </strong><?= $initial_date?></td>
        </tr>

        <tr>
            <td><strong>Data final: </strong><?= $final_date?></td>
        </tr>

    </table>

    <table style="margin-top:10px;" width="100%" cellspacing="0" cellpadding="2">
            
        <thead>
            <tr>
                <th style=" padding:5px;border:1px solid #DDDDDD;background-color:#E9ECEF;">Nº PEDIDO</th>
                <th style="border:1px solid #DDDDDD;background-color:#E9ECEF;">DATA DO PEDIDO</th>
                <th style="border:1px solid #DDDDDD;background-color:#E9ECEF;">COMPRADOR</th>
                <th style="border:1px solid #DDDDDD;background-color:#E9ECEF;">STATUS</th>
                <th style="border:1px solid #DDDDDD;background-color:#E9ECEF;">VALOR</th>
            </tr>
        </thead>

        <?php foreach($info as $item){
            $status = '';
            $total += $item['total_amount'];
            
            foreach($orderStatus->getList() as $os){
                if($os['code'] == $item['payment_status']){
                    $status = $os['name'];
                }
            }
        ?>
            <tr>
                <td style="padding:7px;border:1px solid #DDDDDD;text-align:center;">
                    <?= $item['id']?>
                </td>

                <td style="border:1px solid #DDDDDD;text-align:center;">
                <?= date("d/m/Y", strtotime($item['date_added']))?>
                </td>

                <td style="border:1px solid #DDDDDD;text-align:left;">
                    <?= $item['user']?>
                </td>

                <td style="border:1px solid #DDDDDD;text-align:center;">
                    <?= $status?>
                </td>

                <td style="border:1px solid #DDDDDD;text-align:left;">
                    R$ <?= number_format($item['total_amount'], '2', ',', '.')?>
                </td>

            </tr>

        <?php }?>

        <tr>
            <td colspan="4"></td>
            <td style="text-align:right;">
            <br><strong>Total: </strong>R$ <?= number_format($total, '2', ',', '.')?>
                </td>
        </tr>

    </table>