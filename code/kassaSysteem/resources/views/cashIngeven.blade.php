<x-header header="Cash Ingeven">
    <div class="bg-white w-11/12 md:w-4/5 h-auto min-h-[85vh] rounded-lg p-4 flex flex-col justify-between items-center">
        <div id="selectedMoney" class="flex flex-row bg-gray-200 w-full h-40 rounded-lg mb-4 items-center p-4 gap-4 overflow-x-auto">
        </div>

        <!-- Money Images for selection -->
        <div class="bg-gray-200 w-full rounded-lg mb-4">
            <div class="flex flex-col gap-5 m-4">
                <div class="flex justify-between">
                    <img class="geldImage w-[20%] h-[20%]" data-value="50" src="{{ asset('assets/images/money/50.png') }}" alt="50 euro">
                    <img class="geldImage w-[20%] h-[20%]" data-value="20" src="{{ asset('assets/images/money/20.png') }}" alt="20 euro">
                    <img class="geldImage w-[10%] h-[10%]" data-value="2" src="{{ asset('assets/images/money/2.png') }}" alt="2 euro">
                    <img class="geldImage w-[10%] h-[10%]" data-value="1" src="{{ asset('assets/images/money/1.png') }}" alt="1 euro">
                    <img class="geldImage w-[10%] h-[10%]" data-value="0.5" src="{{ asset('assets/images/money/_50.png') }}" alt="50 cent">
                </div>
                <div class="flex justify-between">
                    <img class="geldImage w-[20%] h-[20%]" data-value="10" src="{{ asset('assets/images/money/10.png') }}" alt="10 euro">
                    <img class="geldImage w-[20%] h-[20%]" data-value="5" src="{{ asset('assets/images/money/5.png') }}" alt="5 euro">
                    <img class="geldImage w-[10%] h-[10%]" data-value="0.2" src="{{ asset('assets/images/money/_20.png') }}" alt="20 cent">
                    <img class="geldImage w-[10%] h-[10%]" data-value="0.1" src="{{ asset('assets/images/money/_10.png') }}" alt="10 cent">
                    <img class="geldImage w-[10%] h-[10%]" data-value="0.05" src="{{ asset('assets/images/money/_5.png') }}" alt="5 cent">
                </div>
            </div>
        </div>

        <!-- Footer with buttons and total price -->
        <div class="flex flex-row justify-between items-center w-full">
            <div>
                <form action="{{ route('soortBetalen') }}" method="GET">
                    @csrf
                    <x-layout.redArrow width="w-[250px] md:w-[391px]"></x-layout.redArrow>
                </form>
            </div>
            <p id="totalGeldWeergave" class="w-full text-center text-xl font-bold">Gekregen: 0 €</p>

            <!-- Form to calculate change -->
            <div>
                <form action="{{ route('calculate-change') }}" method="GET" onsubmit="return sendTotalGeld();">
                    @csrf
                    <input type="hidden" name="totalGeld" id="totalGeldInput" value="0"> <!-- Hidden input for totalGeld -->
                    <x-layout.greenArrow width="w-[250px] md:w-[391px]"></x-layout.greenArrow>
                </form>
            </div>
        </div>
    </div>

    <script>
        let selectedMoneyArray = [];
        let totalGeld = 0;

        document.querySelectorAll('.geldImage').forEach(img => {
            img.addEventListener('click', function () {
                const geldValue = parseFloat(this.getAttribute('data-value'));
                addMoneyToTop(this.src, geldValue);
            });
        });

        function addMoneyToTop(imageSrc, geldValue) {
            const selectedMoneyContainer = document.getElementById('selectedMoney');

            // Create a container for the selected money image
            const moneyElement = document.createElement('div');
            moneyElement.classList.add('relative', 'inline-block', 'geldInTop', 'cursor-pointer');

            // Create the money image
            const imgElement = document.createElement('img');
            imgElement.src = imageSrc;
            imgElement.classList.add('h-[100px]');
            imgElement.setAttribute('data-value', geldValue);

            moneyElement.appendChild(imgElement);

            // Create a click event for moneyElement
            let clickCount = 0;
            moneyElement.addEventListener('click', function () {
                clickCount++;

                if (clickCount === 1) {
                    toggleOverlay(this, geldValue);
                } else if (clickCount === 2) {
                    removeMoney(this);
                    clickCount = 0; // Reset click count
                }
            });

            selectedMoneyArray.push(geldValue);
            totalGeld += geldValue;
            updateTotalDisplay();

            selectedMoneyContainer.appendChild(moneyElement);
        }

        function toggleOverlay(moneyElement, geldValue) {
            const overlayImg = document.createElement('img');
            overlayImg.classList.add('h-[70%]', 'absolute', 'top-1/2', 'left-1/2', 'transform', '-translate-x-1/2', '-translate-y-1/2');
            overlayImg.style.pointerEvents = 'none'; // Disable events for overlay

            // Choose the appropriate overlay image based on the value
            if (geldValue > 2) {
                overlayImg.src = "{{ asset('assets/images/money/remove_bill.png') }}"; // Bill overlay
            } else {
                overlayImg.src = "{{ asset('assets/images/money/remove_coin.png') }}"; // Coin overlay
            }

            moneyElement.appendChild(overlayImg);
            updateTotalDisplay();
        }

        function removeMoney(moneyElement) {
            const geldValue = parseFloat(moneyElement.firstChild.getAttribute('data-value'));

            totalGeld -= geldValue;

            updateTotalDisplay();

            const index = selectedMoneyArray.indexOf(geldValue);
            if (index > -1) {
                selectedMoneyArray.splice(index, 1);
            }

            moneyElement.remove();
        }

        // Update total money display
        function updateTotalDisplay() {
            document.getElementById('totalGeldWeergave').textContent = `Gekregen: ${totalGeld.toFixed(2)} €`;
            document.getElementById('totalGeldInput').value = totalGeld.toFixed(2); // Update hidden input with totalGeld
        }

        // Function to send totalGeld on form submission
        function sendTotalGeld() {
            // This will ensure the totalGeld is updated in the hidden input before submission
            document.getElementById('totalGeldInput').value = totalGeld.toFixed(2);
            return true; // Allow the form to submit
        }
    </script>
</x-header>
