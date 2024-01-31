<?php
class Reporte
{
    private const VALID_OPTIONS = [
        'venta' => true,
        'compra' => true,
    ];
    public function generar($datos)
    {
        $reporte = '';
        foreach ($datos as $dato) {

            $isNotValidOption = !isset($this::VALID_OPTIONS[$dato['tipo']]);
            if ($isNotValidOption) {
                continue;
            }
            $reporte .= $this->getReportLine($dato);
        }
        return $reporte;
    }

    private function getReportLine($dato)
    {
        $id = $dato['id'];
        $tipo = $dato['tipo'];
        $items = $dato['items'];
        $total = $this->calcularTotal($items);

        return ucfirst("{$tipo}: {$id}, Total: {$total}\n");
    }

    private function calcularTotal($items)
    {
        $total = 0;
        foreach ($items as $item) {
            $total += $item['precio'] * $item['cantidad'];
        }
        return $total;
    }
}


// <?php
// class Reporte {
//    public function generarReporte($datos) {
//        // Inicializar el reporte
//        $reporte = '';
//        // Procesar los datos
//        foreach ($datos as $dato) {
//            if ($dato['tipo'] == 'venta') {
//                // Calcular el total de la venta
//                $total = 0;
//                foreach ($dato['items'] as $item) {
//                    $total += $item['precio'] * $item['cantidad'];
//                }
//                // Agregar la venta al reporte
//                $reporte .= "Venta: {$dato['id']}, Total: {$total}\n";
//            } elseif ($dato['tipo'] == 'compra') {
//                // Calcular el total de la compra
//                $total = 0;
//                foreach ($dato['items'] as $item) {
//                    $total += $item['precio'] * $item['cantidad'];
//                }
//                // Agregar la compra al reporte
//                $reporte .= "Compra: {$dato['id']}, Total: {$total}\n";
//            }
//        }
//        // Finalizar y devolver el reporte
//        return $reporte;
//    }
// }
