<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Recibo</title>

    <style type="text/css">
        * {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif
        }

        table {
            font-size: x-small;
            border: none;
        }
       table td,th{
            padding: 0.5rem 0.5rem
        }


       thead,.tbody-border{
            border-bottom: 2px solid grey
        }

        tfoot tr td {
            font-weight: bold;
            font-size: x-small;

        }

        .gray {
            background-color: rgb(223, 226, 230)
        }
        .red{
            color: rgb(240, 71, 71);
        }
        .green{
            color: #3b7ddd;
        }
        .blue{
            color: #1cbb8c;
            font-weight: 600;
        }
        table td small {
            color: #495057;
            font-size: 80%;
        }

    </style>

</head>

<body>

    <table width="100%">
        <tr>
            <td valign="top"><img src="{{ asset('frontend/errors/svgs/404.svg') }}" alt="" width="150" /></td>
            <td align="right">
                <h3>Escola de Condução Mucaranga</h3>
                <pre>
                    Sofala

                    Localização detalhada

                    Email : geral@mucaranga.com

                    Contacto : +258 85 689 0404
                    
                    fax :
                </pre>
            </td>
        </tr>

    </table>

    <table width="100%">
        <tr>
            <td><strong>Cliente: </strong> {{ $student->name }}</td>
            <td style="text-align: right"><strong>Recibo:</strong>
                @if ($isExam)
                    #EXM-{{ $invoice->id }}
                @else
                    #PYM-{{ $invoice->id }}
                @endif
            </td>
        </tr>
        <tr>
            <td><strong>Tipo de carta: </strong> {{ $student->veicle_class->name }}</td>
            <td style="text-align: right"><strong>Data do processamento:</strong>
                {{ $invoice->created_at }}
            </td>
        </tr>
        <tr>
            <td><strong>Bilhete de identidade: </strong> {{ $student->id_identity }}</td>
            <td style="text-align: right"><strong>Documento processado por:</strong>
                {{ $invoice->processedBy->name }}
            </td>
        </tr>

    </table>


    <table width="100%">
        <thead  >
            <tr>
                <th>#</th>
                <th>Pagamento</th>
                <th>Forma de pagamento</th>
                @if (!is_null($invoice->bank_invoice_code))
                    <th>Número do recibo bancário</th>
                @endif
                <th>Valor pago (MZN)</th>
            </tr>
        </thead>
        <tbody class="tbody-border">
            <tr >
                <th scope="row">1</th>
                @if ($isExam)


                    <td>{{ $invoice->exam_tpye->name }}</td>



                    @if (is_null($invoice->bank_invoice_code))
                        <td align="right"> Cash directo</td>
                    @else
                        <td align="right"> Pagamento Bancário</td>
                        <td align="right"> {{ $invoice->bank_invoice_code }}</td>
                    @endif
                    <td align="right" class="blue"> +{{ $invoice->exam_tpye->price }} MZN</td>
                @else
                    <td align="right"> {{ $invoice->payment_phase->name }} </td>
                    <td align="right"> Cash directo</td>
                    <td align="right" class="blue"> +{{ $invoice->amount }} MZN</td>
                @endif
            </tr>


        </tbody>

        <tfoot>
            @if (!$isExam)

            <tr>
                <td colspan="2"></td>
                <td align="right" >Dívida : </td>
                <td align="right"  class="red gray"> {{ $student->veicle_class->price - $student->payments->pluck('amount')->sum() }} MZN</td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td align="right">Saldo : </td>
                <td align="right" class="gray green">{{ $student->payments->pluck('amount')->sum() }} MZN</td>
            </tr>
            @endif
        </tfoot>
    </table>
    <table width="100%" style="margin-top: 1.9rem ">
        <tbody>
            <tr>
                <td colspan="4" style="text-align: right">
                    <small> Documento processado pelo computador &copy; Escola de Condução Mucaranga, Lda {{ now()->year }}
                    </small> </td>
            </tr>
        </tbody>
    </table>


</body>

</html>
