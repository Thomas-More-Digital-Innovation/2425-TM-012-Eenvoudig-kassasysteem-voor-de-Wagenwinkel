<x-header header="Wisselgeld Beheer">
    <div class="bg-white p-5 rounded-lg shadow-lg">
        <div class="bg-gray-200 w-[1133px] h-[560px] p-4 rounded-lg mb-3">
            <div class="grid grid-cols-2 h-full py-5 px-3">
                <div class="flex flex-col">
                    <span class="text-3xl font-semibold ml-2 mb-2">Acties met geluid</span>
                    <label class="switch">
                        <input type="checkbox" wire:model="settings.acties_met_spraak" wire:change="updateSettings('acties_met_spraak')">
                        <span class="slider round"></span>
                    </label>
                </div>
                <div class="flex flex-col">
                    <span class="text-3xl font-semibold ml-2 mb-2">Kleurenblind</span>
                    <label class="switch">
                        <input type="checkbox" wire:model="settings.kleurenblind" wire:change="updateSettings('kleurenblind')">
                        <span class="slider round"></span>
                    </label>
                </div>
                <div class="flex flex-col">
                    <span class="text-3xl font-semibold ml-2 mb-2">Voorraad Aangeven</span>
                    <label class="switch">
                        <input type="checkbox" wire:model="settings.voorraad_aangeven" wire:change="updateSettings('voorraad_aangeven')">
                        <span class="slider round"></span>
                    </label>
                </div>
                <div class="flex flex-col">
                    <span class="text-3xl font-semibold ml-2 mb-2">Wisselgeld Aangeven</span>
                    <label class="switch">
                        <input type="checkbox" wire:model="settings.wisselgeld_aangeven" wire:change="updateSettings('wisselgeld_aangeven')">
                        <span class="slider round"></span>
                    </label>
                </div>
                <div class="flex flex-col">
                    <span class="text-3xl font-semibold ml-2 mb-2">Printer Gebruiken</span>
                    <label class="switch">
                        <input type="checkbox" wire:model="settings.printen_gebruiken" wire:change="updateSettings('printen_gebruiken')">
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>
        </div>
        <div class="flex justify-between w-full gap-3">
            <a href="{{ route('begeleiderSettings') }}" class="w-full">
                <x-layout.redArrow></x-layout.redArrow>
            </a>
            <a href="{{ route('wisselgeld-beheer') }}" class="w-full h-60 bg-green-300 py-8 rounded-md flex justify-evenly items-center">
                <img src="{{ asset('assets/images/wisselgeldIngeven.svg') }}" alt="Winkel Wagen" class="w-[40%]">
            </a>
        </div>
    </div>
</x-header>


<style>
        .switch {
            position: relative;
            display: inline-block;
            width: 70px;
            height: 40px;
            border: 2px solid #cdcdcd;
            border-radius: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #fff1f1;
            -webkit-transition: .4s;
            transition: .4s;
            border-radius: 20px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 32px;
            width: 32px;
            left: 2px;
            bottom: 2px;
            background-color: #649A76;
            -webkit-transition: .4s;
            transition: .4s;
            border-radius: 50%; /* Round the switch knob */
        }

        input:checked + .slider {
            background-color: #e9ffef;
        }

        input:checked + .slider:before {
            -webkit-transform: translateX(30px);
            -ms-transform: translateX(30px);
            transform: translateX(30px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
    </style>

