<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <title>{{ $header }}</title>
    <style>
        .deuteranopia-filter{
            filter: contrast(0.8) brightness(1.1) hue-rotate(-25deg);
        }
    </style>
</head>
<body class="bg-blue-400 h-screen flex items-center justify-center relative deuteranopia-filter">
{{ $slot }}
@stack('script')
@livewireScripts
</body>
</html>

<script>
    <?php
    $organisation = \App\Helpers\Login::getUser()['organisatie_id'];
    $setting = \App\Http\Controllers\Controller::getSetting($organisation);

    $cankleurenBlind = $setting && $setting->kleurenBlind == 1;
    $canPlayAudio = $setting && $setting->actiesMetSpraak == 1;
    ?>
    var cankleurenBlind = <?php echo json_encode($cankleurenBlind); ?>;
    var organisation = <?php echo json_encode($organisation); ?>;
    var canPlayAudio = <?php echo json_encode($canPlayAudio); ?>;

    if (cankleurenBlind) {
        document.body.classList.add('deuteranopia-filter');
    } else {
        document.body.classList.remove('deuteranopia-filter');
    }

    const isCalculateChangePage = window.location.pathname.includes('cashIngeven'); // Adjust this based on the actual path
    const isVerkoopLijnPage = window.location.pathname.includes('verkooplijst');

    console.log(isCalculateChangePage);
    document.addEventListener('click', function(event) {
        if(!isCalculateChangePage && !isVerkoopLijnPage){
            const anchor = event.target.closest('a');
            const button = event.target.closest('button');

            var audio = (organisation && canPlayAudio) ? new Audio("{{ asset('assets/audio/clickSound.wav') }}") : null;

            if (anchor || button) {
                event.preventDefault();

                if (audio) {
                    audio.play().then(() => {
                        console.log('Sound played successfully');
                        setTimeout(() => {
                            if (anchor) {
                                window.location = anchor.href;
                            } else if (button) {
                                if (button.type === 'submit') {
                                    button.closest('form').submit();
                                } else {
                                    console.log('Button action executed');
                                }
                            }
                        }, 300);
                    }).catch(error => {
                        console.error('Error playing sound:', error);
                        if (anchor) {
                            window.location = anchor.href;
                        } else if (button) {
                            if (button.type === 'submit') {
                                button.closest('form').submit();
                            } else {
                                console.log('Button action executed');
                            }
                        }
                    });
                } else {
                    if (anchor) {
                        window.location = anchor.href;
                    } else if (button) {
                        if (button.type === 'submit') {
                            button.closest('form').submit();
                        } else {
                            console.log('Button action executed without sound');
                        }
                    }
                }
            } else {
                if (audio) {
                    audio.play();
                }
            }
        }

    });
</script>

