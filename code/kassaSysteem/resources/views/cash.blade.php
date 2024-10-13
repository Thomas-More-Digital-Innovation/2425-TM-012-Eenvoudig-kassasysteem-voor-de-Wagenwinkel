<x-header header="cash">

    <style>
        .geld-item, .geld-item-munt {
            width: auto;
            height: 112px;
            display: inline-block;
            border-radius: 8px;
            overflow: hidden;
            position: relative;
            cursor: pointer;
        }

        .geld-item-munt {
            width: auto;
            height: 112px;
        }

        .geld-item img, .geld-item-munt img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            border-radius: 8px;
        }

        #total {
            font-size: 2rem;
            font-weight: bold;
            color: #000;
        }

        .cross-icon {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 0, 0, 0.5);
            display: none;
            justify-content: center;
            align-items: center;
            cursor: pointer;
        }

        .cross-icon span {
            color: white;
            font-size: 2rem;
            line-height: 1;
        }
    </style>

    <div class="bg-white p-4 rounded-lg shadow-lg">
        <div class="bg-gray-200 p-3 rounded-lg mb-3">
            <div class="grid grid-cols-5 gap-4" id="display">

            </div>
        </div>

        <div class="bg-gray-200 p-3 rounded-lg mb-3">
            <div class="grid grid-cols-5 gap-4">
                <div class="geld-item" onclick="addAmount(5, 'https://kassasysteem.test/assets/images/money/5.png')">
                    <img src="https://kassasysteem.test/assets/images/money/5.png" alt="5 euro">
                </div>
                <div class="geld-item" onclick="addAmount(10, 'https://kassasysteem.test/assets/images/money/10.png')">
                    <img src="https://kassasysteem.test/assets/images/money/10.png" alt="10 euro">
                </div>
                <div class="geld-item" onclick="addAmount(20, 'https://kassasysteem.test/assets/images/money/20.png')">
                    <img src="https://kassasysteem.test/assets/images/money/20.png" alt="20 euro">
                </div>
                <div class="geld-item" onclick="addAmount(50, 'https://kassasysteem.test/assets/images/money/50.png')">
                    <img src="https://kassasysteem.test/assets/images/money/50.png" alt="50 euro">
                </div>
                <div class="geld-item-munt" onclick="addAmount(2, 'https://kassasysteem.test/assets/images/money/2.png')">
                    <img src="https://kassasysteem.test/assets/images/money/2.png" alt="2 euro">
                </div>
                <div class="geld-item-munt" onclick="addAmount(1, 'https://kassasysteem.test/assets/images/money/1.png')">
                    <img src="https://kassasysteem.test/assets/images/money/1.png" alt="1 euro">
                </div>
                <div class="geld-item-munt" onclick="addAmount(0.5, 'https://kassasysteem.test/assets/images/money/_50.png')">
                    <img src="https://kassasysteem.test/assets/images/money/_50.png" alt="0.50 euro">
                </div>
                <div class="geld-item-munt" onclick="addAmount(0.2, 'https://kassasysteem.test/assets/images/money/_20.png')">
                    <img src="https://kassasysteem.test/assets/images/money/_20.png" alt="0.20 euro">
                </div>
                <div class="geld-item-munt" onclick="addAmount(0.1, 'https://kassasysteem.test/assets/images/money/_10.png')">
                    <img src="https://kassasysteem.test/assets/images/money/_10.png" alt="0.10 euro">
                </div>
                <div class="geld-item-munt" onclick="addAmount(0.05, 'https://kassasysteem.test/assets/images/money/_5.png')">
                    <img src="https://kassasysteem.test/assets/images/money/_5.png" alt="0.05 euro">
                </div>
            </div>
        </div>

        <div class="flex justify-between items-center space-x-8">
            <a href="{{ route('soortBetalen') }}">
                <x-layout.redArrow width="w-80"></x-layout.redArrow>
            </a>

            <p id="total">Totaal: €0.00</p>
            <a href="{{ route('calculateChange') }}">
                <x-layout.greenArrow width="w-80"></x-layout.greenArrow>
            </a>
        </div>


    </div>

    <script>
        let total = 0;

        function addAmount(amount, imgSrc) {
            total += amount;
            document.getElementById('total').innerText = 'Totaal: €' + total.toFixed(2);

            let imgContainer = document.createElement('div');
            imgContainer.className = amount >= 1 ? 'geld-item' : 'geld-item-munt';
            imgContainer.style.width = 'auto';
            imgContainer.style.height = '112px';

            let img = document.createElement('img');
            img.src = imgSrc;
            img.alt = amount + ' euro';
            img.style.width = '100%';
            img.style.height = '100%';
            img.style.objectFit = 'contain';
            img.style.borderRadius = '8px';

            let crossIcon = document.createElement('div');
            crossIcon.className = 'cross-icon';
            crossIcon.innerHTML = '<span>&times;</span>';
            crossIcon.onclick = function (event) {
                event.stopPropagation();
                imgContainer.remove();
                total -= amount;
                document.getElementById('total').innerText = 'Totaal: €' + total.toFixed(2);
            };

            imgContainer.appendChild(img);
            imgContainer.appendChild(crossIcon);

            imgContainer.onclick = function () {
                crossIcon.style.display = crossIcon.style.display === 'flex' ? 'none' : 'flex';
            };

            document.getElementById('display').appendChild(imgContainer);
        }

        function reset() {
            total = 0;
            document.getElementById('total').innerText = 'Totaal: €0.00';
            document.getElementById('display').innerHTML = '';
        }

        function next() {
            alert('Je totaalbedrag is €' + total.toFixed(2));
        }
    </script>
</x-header>
