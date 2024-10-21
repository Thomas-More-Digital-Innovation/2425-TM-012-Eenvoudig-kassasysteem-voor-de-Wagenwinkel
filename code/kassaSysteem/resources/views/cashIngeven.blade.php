<x-header header="Cash Ingeven">
    <div class="bg-white w-11/12 md:w-4/5 h-auto min-h-[85vh] rounded-lg p-4 flex flex-col justify-between items-center">
        <div id="selectedMoney" class="flex flex-row bg-gray-200 w-full h-40 rounded-lg mb-4 items-center p-4 gap-4 overflow-x-auto">
        </div>

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

        <div class="flex flex-row justify-between items-center w-full">
            <div>
                <form action="{{ route('soortBetalen') }}" method="GET">
                    @csrf
                    <x-layout.redArrow width="w-[250px] md:w-[391px]"></x-layout.redArrow>
                </form>
            </div>
            <p id="totalGeldWeergave" class="w-full text-center text-4xl font-bold">Gekregen: € 0.00 </p>
            <div>
                <?php
                $price = \App\Helpers\Shopping_cart::getPrice();
                ?>
                <form id="changeForm" action="{{ route('calculate-change') }}" method="GET" onsubmit="return sendTotalGeld();" class="hidden">
                    @csrf
                    <input type="hidden" name="totalGeld" id="totalGeldInput" value="0">
                    <input type="hidden" name="selectedMoneyArray" id="selectedMoneyArrayInput">
                    <x-layout.greenArrow width="w-[250px] md:w-[391px]"></x-layout.greenArrow>
                </form>
                <div id="placeholderDiv" class="w-[250px] md:w-[391px]"></div>
            </div>
        </div>
    </div>

    <script>
        <?php
        $organisation = \App\Helpers\Login::getUser()['organisatie_id'];
        $setting = \App\Http\Controllers\Controller::getSetting($organisation);

        $canPlayAudio = $setting && $setting->actiesMetSpraak == 1;
        ?>
        var organisation = <?php echo json_encode($organisation); ?>;
        var canPlayAudio = <?php echo json_encode($canPlayAudio); ?>;

        let selectedMoneyArray = [];
        let totalGeld = 0;
        const price = {{ $price }};
        var audio = (organisation && canPlayAudio) ? new Audio("{{ asset('assets/audio/clickSound.wav') }}") : null;

        document.querySelectorAll('.geldImage').forEach(img => {
            img.addEventListener('click', function () {
                const geldValue = parseFloat(this.getAttribute('data-value'));
                addMoneyToTop(this.src, geldValue);
                audio.play()
            });


        });

        function addMoneyToTop(imageSrc, geldValue) {
            const selectedMoneyContainer = document.getElementById('selectedMoney');

            const moneyElement = document.createElement('div');
            moneyElement.classList.add('relative', 'inline-block', 'geldInTop', 'cursor-pointer');

            const imgElement = document.createElement('img');
            imgElement.src = imageSrc;
            imgElement.classList.add('h-[100px]');
            imgElement.setAttribute('data-value', geldValue);

            moneyElement.appendChild(imgElement);

            let clickCount = 0;
            moneyElement.addEventListener('click', function () {
                clickCount++;

                if (clickCount === 1) {
                    toggleOverlay(this, geldValue);
                } else if (clickCount === 2) {
                    removeMoney(this);
                    clickCount = 0;
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
            overlayImg.style.pointerEvents = 'none';

            if (geldValue > 2) {
                overlayImg.src = "{{ asset('assets/images/money/remove_bill.png') }}";
            } else {
                overlayImg.src = "{{ asset('assets/images/money/remove_coin.png') }}";
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

        function updateTotalDisplay() {
            document.getElementById('totalGeldWeergave').textContent = `Gekregen: € ${totalGeld.toFixed(2)}`;
            document.getElementById('totalGeldInput').value = totalGeld.toFixed(2);

            if (totalGeld >= price) {
                document.getElementById('changeForm').classList.remove('hidden');
                document.getElementById('placeholderDiv').classList.add('hidden');
            } else {
                document.getElementById('changeForm').classList.add('hidden');
                document.getElementById('placeholderDiv').classList.remove('hidden');
            }
        }

        function sendTotalGeld() {
            document.getElementById('totalGeldInput').value = totalGeld.toFixed(2);
            console.log(selectedMoneyArray)
            document.getElementById('selectedMoneyArrayInput').value = JSON.stringify(selectedMoneyArray);
            return true;
        }
    </script>
</x-header>
