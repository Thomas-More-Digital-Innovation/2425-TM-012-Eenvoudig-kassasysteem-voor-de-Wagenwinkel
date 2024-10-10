<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Success</title>
    <script>
        // Functie om te printen
        function printTotal(cartItems) {
            return new Promise((resolve) => {
                const totalAmount = {{ \App\Helpers\Shopping_cart::getPrice() }}; // Totaal bedrag ophalen
                const iframe = document.createElement('iframe');

                iframe.style.position = 'absolute';
                iframe.style.width = '0';
                iframe.style.height = '0';
                iframe.style.border = 'none';
                document.body.appendChild(iframe);

                iframe.onload = function () {
                    const doc = iframe.contentWindow.document;
                    doc.open();
                    doc.write('<html><head><title>Print Totaal</title>');
                    doc.write('<style>');
                    doc.write(`
                        @page {
                            margin: 0; /* Verwijder standaard marges om te voorkomen dat er headers/footers worden afgedrukt */
                        }
                        body {
                            font-family: Arial, sans-serif;
                            width: 250px;
                            margin: 0;
                            padding: 20px;
                            padding-bottom: 30px;
                            font-size: 16px;
                        }
                        h1, h2 {
                            text-align: center;
                            margin: 0;
                            padding: 10px 0;
                        }
                        ul {
                            list-style-type: none;
                            padding: 0;
                            margin: 0;
                        }
                        li {
                            display: flex;
                            justify-content: space-between;
                            padding: 5px 0;
                            font-size: 18px; /* Increase font size */
                        }
                        .footer {
                            margin-top: 20px;
                            text-align: center;
                            font-size: 14px;
                            border-top: 1px solid #000;
                            padding-top: 10px;
                        }
                        .total {
                            font-weight: bold;
                            border-top: 2px solid #000;
                            padding-top: 10px;
                        }
                    `);
                    doc.write('</style></head><body>');
                    doc.write('<h2>De Wagenwinkel</h2>');
                    doc.write('<h3>Winkel Bon</h3>');
                    doc.write('<h4>Bestelling:</h4>');

                    // Print the cart items
                    doc.write('<ul>');
                    cartItems.forEach(item => {
                        doc.write('<li>' + item.aantal + ' x ' + item.naam + '<span>€ ' + (item.actuele_prijs * item.aantal).toFixed(2) + '</span></li>');
                    });
                    doc.write('</ul>');

                    // Display the total amount
                    doc.write('<div class="total">');
                    doc.write('<h4>Totaal Bedrag:' + '</h4>');
                    doc.write('<h4> €' + totalAmount.toFixed(2) + '</h4>');
                    doc.write('</div>');

                    // Footer with thanks message
                    doc.write('<div class="footer">');
                    doc.write('<p>Bedankt voor uw aankoop! :)</p>');
                    doc.write('<p>De Wagenwinkel</p>');
                    doc.write(new Date().toLocaleString('nl-NL', {
                        year: 'numeric',
                        month: 'long',
                        day: 'numeric',
                        hour: '2-digit',
                        minute: '2-digit'
                    }));

                    doc.write('</div>');

                    doc.write('</body></html>');
                    doc.close();

                    iframe.contentWindow.focus();
                    iframe.contentWindow.print();

                    // Remove iframe after printing
                    iframe.onload = null;
                    setTimeout(() => {
                        iframe.parentNode.removeChild(iframe);
                        resolve();
                        document.getElementById('empty-cart-form').submit(); // Leeg het winkelwagentje
                    }, 4000);
                };
            });
        }

        // Start print bij het laden van de pagina
        window.onload = function() {
            const cartItems = @json(\App\Helpers\Shopping_cart::getRecords());
            console.log(cartItems);

            const itemsArray = Array.isArray(cartItems) ? cartItems : Object.values(cartItems);

            printTotal(itemsArray).then(() => {
            });
        };
    </script>
</head>
<body>
<div id="total-amount" style="display: none;">
    {{ \App\Helpers\Shopping_cart::getPrice() }} <!-- Het totaalbedrag wordt hier opgehaald -->
</div>
<!-- Formulier om het winkelwagentje leeg te maken -->
<form id="empty-cart-form" action="{{ route('empty.cart') }}" method="POST">
    @csrf
</form>
{{ $slot }}
@stack('script')
</body>
</html>
