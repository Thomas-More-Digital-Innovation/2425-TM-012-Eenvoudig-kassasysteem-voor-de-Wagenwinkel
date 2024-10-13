<x-header header="cash">

    <style>
        .geld-item, .geld-item-munt {
            width: auto; /* Adjust to your preferred width */
            height: 112px; /* Adjust to your preferred height */
            display: inline-block;
            border-radius: 8px; /* Optional: adds rounded corners */
            overflow: hidden; /* Ensures content doesn't overflow */
            position: relative; /* To position the cross */
            cursor: pointer; /* Indicates clickable */
        }

        .geld-item-munt {
            width: auto; /* For smaller coins, adjust width */
            height: 112px; /* For smaller coins, adjust height */
        }

        /* Ensure images retain their aspect ratio */
        .geld-item img, .geld-item-munt img {
            width: 100%;
            height: 100%;
            object-fit: contain; /* Keeps the aspect ratio */
            border-radius: 8px; /* Optional: adds rounded corners */
        }

        /* New style for total text */
        #total {
            font-size: 2rem; /* Change to your preferred size */
            font-weight: bold; /* Makes the text bold */
            color: #000; /* Change color if needed */
        }

        /* Style for the cross icon */
        .cross-icon {
            position: absolute;
            top: 0;
            left: 0; /* Positioning the cross to the top left */
            width: 100%; /* Cover the whole item */
            height: 100%; /* Cover the whole item */
            background: rgba(255, 0, 0, 0.5); /* Semi-transparent red */
            display: none; /* Hidden by default */
            justify-content: center;
            align-items: center;
            cursor: pointer; /* Indicates clickable */
        }

        .cross-icon span {
            color: white; /* Cross color */
            font-size: 2rem; /* Size of the cross */
            line-height: 1; /* Adjust for centering */
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

        <div class="mt-4 flex justify-center">
            <!-- Reset button removed -->
        </div>
    </div>

    <script>
        let total = 0;

        function addAmount(amount, imgSrc) {
            // Update the total
            total += amount;
            document.getElementById('total').innerText = 'Totaal: €' + total.toFixed(2);

            // Create a container for the new money item
            let imgContainer = document.createElement('div');
            imgContainer.className = amount >= 1 ? 'geld-item' : 'geld-item-munt'; // Determine class
            imgContainer.style.width = 'auto';
            imgContainer.style.height = '112px';

            let img = document.createElement('img');
            img.src = imgSrc;
            img.alt = amount + ' euro';
            img.style.width = '100%';
            img.style.height = '100%';
            img.style.objectFit = 'contain';
            img.style.borderRadius = '8px'; // Match rounded corners

            // Create a cross icon
            let crossIcon = document.createElement('div');
            crossIcon.className = 'cross-icon';
            crossIcon.innerHTML = '<span>&times;</span>'; // Cross symbol
            crossIcon.onclick = function (event) {
                event.stopPropagation(); // Prevent triggering parent click
                imgContainer.remove(); // Remove this money item
                total -= amount; // Update total
                document.getElementById('total').innerText = 'Totaal: €' + total.toFixed(2);
            };

            // Append the image and cross icon to the container
            imgContainer.appendChild(img);
            imgContainer.appendChild(crossIcon);

            // Append the container to the display area
            imgContainer.onclick = function () {
                crossIcon.style.display = crossIcon.style.display === 'flex' ? 'none' : 'flex'; // Toggle visibility
            };

            document.getElementById('display').appendChild(imgContainer);
        }

        function reset() {
            total = 0;
            document.getElementById('total').innerText = 'Totaal: €0.00';
            document.getElementById('display').innerHTML = ''; // Clear the display area
        }

        function next() {
            alert('Je totaalbedrag is €' + total.toFixed(2));
        }
    </script>
</x-header>
