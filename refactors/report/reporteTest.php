<?php

include 'reporte.php';

use PHPUnit\Framework\TestCase;

class ReporteTest extends TestCase
{
    protected $reporte;

    public function setUp(): void
    {
        parent::setUp();
        $this->reporte = new Reporte();
    }

    public function testGenerarReporte_Venta()
    {
        $datos = [
            [
                'tipo' => 'venta',
                'id' => 1,
                'items' => [
                    ['precio' => 10, 'cantidad' => 2],
                    ['precio' => 5, 'cantidad' => 3]
                ]
            ]
        ];

        $expected = "Venta: 1, Total: 35\n";
        $result = $this->reporte->generar($datos);
        $this->assertEquals($expected, $result);
    }

    public function testGenerarReporte_Compra()
    {
        $datos = [
            [
                'tipo' => 'compra',
                'id' => 1,
                'items' => [
                    ['precio' => 3, 'cantidad' => 2],
                    ['precio' => 5, 'cantidad' => 3]
                ]
            ]
        ];

        $expected = "Compra: 1, Total: 21\n";
        $result = $this->reporte->generar($datos);
        $this->assertEquals($expected, $result);
    }

    public function testGenerarReporte_Other()
    {
        $datos = [
            [
                'tipo' => 'other',
                'id' => 1,
                'items' => [
                    ['precio' => 10, 'cantidad' => 2],
                    ['precio' => 5, 'cantidad' => 3]
                ]
            ]
        ];

        $expected = "";
        $result = $this->reporte->generar($datos);
        $this->assertEquals($expected, $result);
    }
    public function testGenerarReporte_Mixed() {
        $datos = [
            [
                'tipo' => 'venta',
                'id' => 1,
                'items' => [
                    ['precio' => 1, 'cantidad' => 2],
                    ['precio' => 2, 'cantidad' => 3]
                ]
            ],
            [
                'tipo' => 'compra',
                'id' => 1,
                'items' => [
                    ['precio' => 3, 'cantidad' => 2],
                    ['precio' => 1, 'cantidad' => 3]
                ]
            ]
        ];

        $expected = "Venta: 1, Total: 8\nCompra: 1, Total: 9\n";
        $result = $this->reporte->generar($datos);
        $this->assertEquals($expected, $result);


    }
}