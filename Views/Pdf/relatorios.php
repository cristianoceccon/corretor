<section class="content-header">

<?php
ob_start();
?>

<h1>Relatório de Clientes</h1>

<?php
$html = ob_get_contents();
ob_end_clean();

require 'vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$mpdf->Output('arquivo53.pdf');

?>

</section>
